<?php

namespace Modules\Frontend\Jigyosho\Services;

use Modules\Frontend\Jigyosho\Repositories\MapDataRepository;
use Illuminate\Support\Facades\Http;


class MapService
{
    protected $mapDataRepository;

    public function __construct(MapDataRepository $mapDataRepository)
    {
        $this->mapDataRepository = $mapDataRepository;
    }

    public function getMapData($param)
    {
        $search_category = $param['search_category'] ?? '訪問医師';
        $address_2 = $param['address_2'] ?? '千代田区';
        if(isset($param['address_3']) && strlen($param['address_3']) > 0) {
            $address_3 = trim($param['address_3']);
            $address_3_onMap = $address_3 . " 付近";
        } else {
            $address_3 = '';                
        };
        $dist = $param['dist'] ?? '10';
        $svc_type = $this->mapSearchCategoryToSvcType($search_category);
        if (empty($search_category) || empty($address_2)) {
            return response()->json(['error' => 'Missing required parameters: search_category and address_2 are required'], 400);
        }
        $address_2_onMap = $address_2;
        if (empty($address_3)) {
            $officeInfo = $this->mapDataRepository->getPublicOfficeInfo($address_2);
            if ($officeInfo) {
                $zipCode_array = preg_split("/-/", $officeInfo->zipcode);
                $zipCode_1 = $zipCode_array[0] ?? '';
                $zipCode_2 = $zipCode_array[1] ?? '';
                $address_3 = trim(substr($officeInfo->address, strlen($address_2)));
                $address_2_onMap = '';
                $address_3_onMap = $officeInfo->building . '付近';
                $lat = $officeInfo->lat;
                $lng = $officeInfo->lng;
            } else {
                throw new \Exception("No public office info found for address_2: $address_2");
            }
        } else {
            $address = $address_2 . $address_3;
            $url = 'https://msearch.gsi.go.jp/address-search/AddressSearch?q=' . urlencode($address);
            $response = Http::get($url);
            $data = $response->json();
            if (isset($data[0]['geometry']['coordinates'])) {
                $latlng = $data[0]['geometry']['coordinates'];
                $lat = $latlng[1];
                $lng = $latlng[0];
            } else {
                throw new \Exception("Failed to get coordinates for address: $address");
            }
        }
        
        switch ($svc_type) {
            case 'clo':
                $res = $this->mapDataRepository->getCloData($lat, $lng, $dist, $address_2);
                break;
            case '居':
                $res = $this->mapDataRepository->getKyoData($lat, $lng, $dist, $address_2, $svc_type);
                break;
            case 'doc':
                $res = $this->mapDataRepository->getDocData($lat, $lng, $dist, $address_2);
                break;
            case 'phm':
                $res = $this->mapDataRepository->getPhmData($lat, $lng, $dist, $address_2);
                break;
            case 'msg':
                $res = $this->mapDataRepository->getMsgData($lat, $lng, $dist, $address_2);
                break;
            case '用':
                $res = $this->mapDataRepository->getYogData($lat, $lng, $dist, $address_2);
                break;
            default:
                $res = $this->mapDataRepository->getGeneralData($lat, $lng, $dist, $address_2, $svc_type);
                break;
        }
        if(empty($res)) {
            return response()->json(['error' => 'No data found for the given parameters'], 404);
        };
        $iconClass = $this->checkIconClass($search_category);
        return ['data' => $res, 'lat' => $lat, 'lng' => $lng, 'address_2' => $address_2, 'address_2_onMap' => $address_2_onMap, 'address_3_onMap' => $address_3_onMap, 'address_3' => $address_3, 'iconClass' => $iconClass, 'dist' => $dist, 'search_category' => $search_category];
    }

    private function checkIconClass($search_category)
    {
        $mapping = [
        '公共の相談所' => 'marker_clo',
        '専門相談員（無料）' => 'marker_kyo',
        '訪問医師' => 'marker_doc',
        '訪問介護士' => 'marker_kai',
        '訪問看護師' => 'marker_kan',
        '訪問リハビリ' => 'marker_rih',
        '福祉用具（ベッド他）' => 'marker_yog',
        '訪問入浴' => 'marker_nyu',
        '訪問薬局' => 'marker_phm',
        '定期巡回' => 'marker_tei',
        '訪問介護夜間対応' => 'marker_yak',
        '訪問マッサージ' => 'marker_msg',
        ];

        if (isset($mapping[$search_category])) {
            return $mapping[$search_category];
        }

        response()->json(['error' => 'Invalid search category'], 400);
    }

    private function mapSearchCategoryToSvcType($search_category)
    {
        $mapping = [
            '公共の相談所' => 'clo',
            '専門相談員（無料）' => '居',
            '訪問医師' => 'doc',
            '訪問介護士' => '介',
            '訪問看護師' => '看',
            '訪問リハビリ' => 'リ',
            '福祉用具（ベッド他）' => '用',
            '訪問入浴' => '入',
            '訪問薬局' => 'phm',
            '訪問介護夜間対応' => '夜',
            '定期巡回' => '定',
            '訪問マッサージ' => 'msg',
        ];

        if (isset($mapping[$search_category])) {
            return $mapping[$search_category];
        }

        response()->json(['error' => 'Invalid search category'], 400);
    }

    public function getPopupData($search_category, $data)
    {
        $rows = $data['rows'] ?? $data;
        $yog_patern1 = $data['yog_patern1'] ?? [];
        $yog_patern3 = $data['yog_patern3'] ?? [];
        $svc_type = $this->mapSearchCategoryToSvcType($search_category);
        $pref = 13;
        $subdir = 'jigyosho';
        $icon_lat = [];
        $icon_lng = [];
        $icon_pop_cont = [];
        $icon_category = "<span class=\"icon-category\">[" . htmlspecialchars($search_category) . "]</span><br>";
        foreach ($rows as $index => $row) {
            $lat_field = 'locat_latitd';
            $lng_field = 'locat_longtd';
            $name_field = 'inst_nm';
            $id_field = 'sral_no';
            $link_base = "/public_counseling/?sral_no=";
            $extra_content = '';

            if ($svc_type == "clo") {
                // Counseling: defaults are fine
            } elseif ($svc_type == "doc") {
                $id_field = 'inst_cd';
                $link_base = "/home_doctor/?inst_cd=";
            } elseif ($svc_type == "phm") {
                $id_field = 'inst_cd';
                $link_base = "/home_pharmacist/?inst_cd=";
            } elseif ($svc_type == "msg") {
                $id_field = 'item_nm';
                $link_base = "/home_masseur/?item_nm=";
                $treat_str = "<span class=\"icon-msg-type\">施術種別：</span><span>";
                if (!empty($row->hari_med_treat_mng)) {
                    $treat_str .= "「はり」";
                }
                if (!empty($row->kyu_med_treat_mng)) {
                    $treat_str .= "「灸」";
                }
                if (!empty($row->shiatsu_med_treat_mng)) {
                    $treat_str .= "「あん摩」";
                }
                $treat_str .= "</span><br>";
                $extra_content = $treat_str;
            } else {
                $lat_field = 'offc_locat_latitd';
                $lng_field = 'offc_locat_longtd';
                $name_field = 'offc_name';
                $id_field = 'offc_no';

                if ($row->svc_type == "貸" || $row->svc_type == "販") {
                    $svc_type_tai = '貸';
                    $svc_type_han = '販';
                    if (in_array($row->offc_no, $yog_patern3)) {
                        $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"../" . $subdir . "/welfareequipment_rent/?offc_no=" . $row->offc_no . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_tai) . "\" style=\"text-decoration: underline; color: blue;\">ﾚﾝﾀﾙ</a><span class=\"icon-link-yog-title\">  OR  </span><a href=\"../" . $subdir . "/welfareequipment_sales/?offc_no=" . $row->offc_no . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_han) . "\" style=\"text-decoration: underline; color: blue;\">販売</a></div>";
                    } elseif (in_array($row->offc_no, $yog_patern1)) {
                        $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"../" . $subdir . "/welfareequipment_sales/?offc_no=" . $row->offc_no . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_han) . "\" style=\"text-decoration: underline; color: blue;\">販売</a></div>";
                    } else {
                        $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"../" . $subdir . "/welfareequipment_rent/?offc_no=" . $row->offc_no . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_tai) . "\" style=\"text-decoration: underline; color: blue;\">レンタル</a></div>";
                    }
                } else {
                    $link_base = $this->getLinkBaseForSearchCategory($search_category);
                    $icon_link = "<div class=\"icon-link\"><a href=\"../" . $subdir . $link_base . "?offc_no=" . $row->offc_no . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                }                
            }
            
            $icon_lat[$index] = (float) $row->$lat_field;
            $icon_lng[$index] = (float) $row->$lng_field;
            $icon_title = htmlspecialchars($row->$name_field);
            $icon_office_name = "<span>" . $icon_title . "</span><br>";
            
            if (!isset($icon_link)) {
                $icon_link = "<div class=\"icon-link\"><a href=\"../" . $subdir . $link_base . $row->$id_field . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
            }            
            $icon_pop_cont[$index] = $icon_category . $icon_office_name . $extra_content . $icon_link;
        }
        return ['icon_lat' => $icon_lat, 'icon_lng' => $icon_lng, 'icon_pop_cont' => $icon_pop_cont];
    }

    private function getLinkBaseForSearchCategory($search_category)
    {
        switch ($search_category) {
            case '専門相談員（無料）':
                return "/consultation/";
            case '訪問介護士':
                return "/home_care/";
            case '訪問看護師':
                return "/home_nurse/";
            case '訪問リハビリ':
                return "/home_rehabilitation/";
            case '訪問入浴':
                return "/bathing_care/";
            case '定期巡回':
                return "/nurseandcarer/";
            case '訪問介護夜間対応':
                return "/night_caregiver/";
            default:
                return "/officedetails.html";
        }
    }

    public function getAllData()
    {                                                         // debug result:
        $dataClo = $this->mapDataRepository->getAllCloData(); // 662 units
        $dataKyo = $this->mapDataRepository->getAllKyoData(); // 29 units
        $dataDoc = $this->mapDataRepository->getAllDocData(); // 68 units
        $dataPhm = $this->mapDataRepository->getAllPhmData(); // 5001 units
        $dataMsg = $this->mapDataRepository->getAllMsgData(); // 950 units
        $dataGeneral = $this->mapDataRepository->getAllGeneralData(); // 3000 units
        $dataYog = $this->mapDataRepository->getAllYogData(); // 6 units
        
        $total = count($dataClo) + count($dataKyo) + count($dataDoc) + count($dataPhm) + count($dataMsg) + count($dataGeneral) + count($dataYog);
        return $total;        
    }
}
