<?php
namespace Modules\Frontend\Jigyosho\Repositories;

use Illuminate\Support\Facades\DB;

class MapDataRepository
{
    protected $tbl_publickOfficeInfo = 'publick_office_info_13';
    protected $tbl_infMng = 'swms_mhlw_inf_mng_13';
    protected $tbl_infMng_kyo = 'swms_mhlw_inf_mng_kyo_13';
    protected $tbl_infMng_yog = 'swms_mhlw_inf_mng_yog_13';
    protected $tbl_dtlLoctn = 'swms_mhlw_dtl_loctn_13';
    protected $tbl_dtlLoctn_kyo = 'swms_mhlw_dtl_loctn_kyo_13';
    protected $tbl_dtlLoctn_yog = 'swms_mhlw_dtl_loctn_yog_13';
    protected $tbl_snrCtznCnslCntr = 'swms_snr_ctzn_cnsl_cntr_13';
    protected $tbl_vst_doc = 'swms_vst_doc_13';
    protected $tbl_medInstMdcl = 'swms_med_inst_lst_mdcl_13';
    protected $tbl_medInstTblPhrmcy = 'swms_med_inst_tbl_phrmcy_13';
    protected $tbl_hariKyuAnma = 'swms_hari_kyu_anma_13';

    public function getPublicOfficeInfo($address_2)
    {
        return DB::table($this->tbl_publickOfficeInfo)
            ->select('building', 'zipcode', 'address', 'lat', 'lng')
            ->where('name', $address_2)
            ->first();
    }

    public function getCloData($lat, $lng, $dist, $address_2)
    {
        return DB::table($this->tbl_snrCtznCnslCntr)
            ->selectRaw("sral_no, inst_nm, locat_latitd, locat_longtd,
                         (6371 * acos(cos(radians(?)) * cos(radians(locat_latitd)) *
                         cos(radians(locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->whereNotNull('addrs')
            ->where('mncplty_name', $address_2)
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }

    public function getKyoData($lat, $lng, $dist, $address_2, $svc_type)
    {
        return DB::table($this->tbl_dtlLoctn_kyo . ' AS tbl_1')
            ->join($this->tbl_infMng_kyo . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->selectRaw("tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2,
                         offc_locat_latitd, offc_locat_longtd,
                         (6371 * acos(cos(radians(?)) * cos(radians(offc_locat_latitd)) *
                         cos(radians(offc_locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(offc_locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->where('tbl_1.svc_type', $svc_type)
            ->whereNotNull('offc_locat_1')
            ->where('tbl_1.offc_city_cd', $address_2)
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }

    public function getDocData($lat, $lng, $dist, $address_2)
    {
        return DB::table($this->tbl_vst_doc . ' as tbl_1')
            ->join($this->tbl_medInstMdcl . ' as tbl_2', 'tbl_1.inst_cd', '=', 'tbl_2.inst_cd')
            ->whereNotNull('tbl_2.addrs')
            ->where('tbl_2.area_blng', 'like', '%' . $address_2 . '%')
            ->select(
                'tbl_1.inst_cd',
                'tbl_2.inst_nm',
                'tbl_2.locat_latitd',
                'tbl_2.locat_longtd',
                DB::raw("(6371 * acos(cos(radians($lat)) * cos(radians(tbl_2.locat_latitd)) * cos(radians(tbl_2.locat_longtd) - radians($lng)) + sin(radians($lat)) * sin(radians(tbl_2.locat_latitd)))) as distance")
            )
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }

    public function getPhmData($lat, $lng, $dist, $address_2)
    {
        return DB::table($this->tbl_medInstTblPhrmcy)
            ->selectRaw("inst_cd, inst_nm, locat_latitd, locat_longtd, tel, addrs,
                         (6371 * acos(cos(radians(?)) * cos(radians(locat_latitd)) *
                         cos(radians(locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->whereNotNull('addrs')
            ->where('area_blng', 'LIKE', "%$address_2%")
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }

    public function getMsgData($lat, $lng, $dist, $address_2)
    {
        return DB::table($this->tbl_hariKyuAnma)
            ->selectRaw("item_nm, inst_nm, locat_latitd, locat_longtd, tel, addrs,
                         hari_med_treat_mng, kyu_med_treat_mng, anma_med_treat_mng,
                         (6371 * acos(cos(radians(?)) * cos(radians(locat_latitd)) *
                         cos(radians(locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->whereNotNull('addrs')
            ->where('vist_spec_flg', '○')
            ->where('area_blng', 'LIKE', "%$address_2%")
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }

    public function getGeneralData($lat, $lng, $dist, $address_2, $svc_type)
    {
        return DB::table($this->tbl_dtlLoctn . ' AS tbl_1')
            ->join($this->tbl_infMng . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->selectRaw("tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2,
                         offc_locat_latitd, offc_locat_longtd,
                         (6371 * acos(cos(radians(?)) * cos(radians(offc_locat_latitd)) *
                         cos(radians(offc_locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(offc_locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->where('tbl_1.svc_type', $svc_type)
            ->whereNotNull('offc_locat_1')
            ->where('tbl_1.offc_city_cd', $address_2)
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get();
    }
    public function getYogData($lat, $lng, $dist, $address_2)
    {
        $svc_type_han = '販';
        $rows_han = DB::table($this->tbl_dtlLoctn_yog . ' AS tbl_1')
            ->join($this->tbl_infMng_yog . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->selectRaw("tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2,
                         offc_locat_latitd, offc_locat_longtd,
                         (6371 * acos(cos(radians(?)) * cos(radians(offc_locat_latitd)) *
                         cos(radians(offc_locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(offc_locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->where('tbl_1.svc_type', $svc_type_han)
            ->whereNotNull('offc_locat_1')
            ->where('tbl_1.offc_city_cd', $address_2)
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get()
            ->toArray();

        $svc_type_tai = '貸';
        $rows_tai = DB::table($this->tbl_dtlLoctn_yog . ' AS tbl_1')
            ->join($this->tbl_infMng_yog . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->selectRaw("tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2,
                         offc_locat_latitd, offc_locat_longtd,
                         (6371 * acos(cos(radians(?)) * cos(radians(offc_locat_latitd)) *
                         cos(radians(offc_locat_longtd) - radians(?)) + sin(radians(?)) *
                         sin(radians(offc_locat_latitd)))) AS distance", [$lat, $lng, $lat])
            ->where('tbl_1.svc_type', $svc_type_tai)
            ->whereNotNull('offc_locat_1')
            ->where('tbl_1.offc_city_cd', $address_2)
            ->having('distance', '<=', $dist)
            ->orderBy('distance')
            ->get()
            ->toArray();

        $yog_patern1 = [];
        $yog_patern3 = [];
        $rows_tai_adjusted = $rows_tai;

        foreach ($rows_han as $index => $row_han) {
            $offc_no_han = (string) $row_han->offc_no;
            $yog_patern1[] = $offc_no_han;

            foreach ($rows_tai as $tai_index => $row_tai) {
                if ($offc_no_han === (string) $row_tai->offc_no) {
                    $yog_patern3[] = $offc_no_han;
                    unset($rows_tai_adjusted[$tai_index]);
                    break;
                }
            }
        }

        $rows_tai_adjusted = array_values($rows_tai_adjusted);
        $rows = array_merge($rows_han, $rows_tai_adjusted);

        return [
            'rows' => $rows,
            'yog_patern1' => $yog_patern1,
            'yog_patern3' => $yog_patern3,
        ];
    }

    public function countAllYogData()
    {
        $svc_type_han = '販';
        $rows_han = DB::table($this->tbl_dtlLoctn_yog . ' AS tbl_1')
            ->join($this->tbl_infMng_yog . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->where('tbl_1.svc_type', $svc_type_han)
            ->whereNotNull('offc_locat_1')
            ->get()
            ->toArray();

        $svc_type_tai = '貸';
        $rows_tai = DB::table($this->tbl_dtlLoctn_yog . ' AS tbl_1')
            ->join($this->tbl_infMng_yog . ' AS tbl_2', function ($join) {
                $join->on('tbl_1.offc_no', '=', 'tbl_2.offc_no')
                    ->on('tbl_1.svc_type', '=', 'tbl_2.svc_type');
            })
            ->where('tbl_1.svc_type', $svc_type_tai)
            ->whereNotNull('offc_locat_1')
            ->get()
            ->toArray();
        $rows_tai_adjusted = $rows_tai;

        // Adjust rows to avoid duplication
        foreach ($rows_han as $index => $row_han) {
            $offc_no_han = (string) $row_han->offc_no;
            foreach ($rows_tai as $tai_index => $row_tai) {
                if ($offc_no_han === (string) $row_tai->offc_no) {
                    unset($rows_tai_adjusted[$tai_index]);
                    break;
                }
            }
        }
        $rows = array_merge($rows_han, $rows_tai_adjusted);
        return count($rows);
    }

    public function countAllDataExceptYog()
    {
        $total = 0;

        // snrCtznCnslCntr
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_snrCtznCnslCntr}
        WHERE addrs IS NOT NULL
    ")->total;

        // vst_doc + medInstMdcl
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_vst_doc} AS tbl_1
        INNER JOIN {$this->tbl_medInstMdcl} AS tbl_2
            ON tbl_1.inst_cd = tbl_2.inst_cd
        WHERE tbl_2.addrs IS NOT NULL
    ")->total;

        // medInstTblPhrmcy
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_medInstTblPhrmcy}
        WHERE addrs IS NOT NULL
    ")->total;

        // hariKyuAnma
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_hariKyuAnma}
        WHERE addrs IS NOT NULL AND vist_spec_flg = '○'
    ")->total;

        // general (inf_mng)
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_dtlLoctn} AS tbl_1
        INNER JOIN {$this->tbl_infMng} AS tbl_2
            ON tbl_1.offc_no = tbl_2.offc_no
            AND tbl_1.svc_type = tbl_2.svc_type
        WHERE offc_locat_1 IS NOT NULL
    ")->total;

        // kyo
        $total += DB::selectOne("
        SELECT COUNT(*) AS total
        FROM {$this->tbl_dtlLoctn_kyo} AS tbl_1
        INNER JOIN {$this->tbl_infMng_kyo} AS tbl_2
            ON tbl_1.offc_no = tbl_2.offc_no
            AND tbl_1.svc_type = tbl_2.svc_type
        WHERE offc_locat_1 IS NOT NULL
    ")->total;
        return $total;
    }
}