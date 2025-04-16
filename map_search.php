<?php
session_start();
/*---------------------------------------------------------------------*/

$docrt = $_SERVER['DOCUMENT_ROOT'] . "/jigyosho";
require_once './const_def_db.php';
$db = new constDefDb();

const QUERY_DIST_MHLW = "ACOS(COS(RADIANTS( :lat ) ) * COS(RADIANTS(offc_locat_latitd)) * COS(RADIANTS(offc_locat_longtd) - RADIANTS( :long)) + SIN(RADIANTS(:lat)) * SIN(RADIANTS(offc_locat_latitd)))) `distance`";
const QUERY_DIST = "ACOS(COS(RADIANTS( :lat ) ) * COS(RADIANTS(locat_latitd) ) * COS(RADIANTS(locat_longtd) - RADIANTS( :long)) + SIN(RADIANTS(:lat)) * SIN(RADIANTS(locat_latitd)))) `distance`";

date_default_timezone_set('Asia/Tokyo');
$time = time();
$rows_cnt = 0;
$serch_cnt = 0;

$city_file = "./json/city_13.json";
$address_1 = "東京都";
$pref = "13";
$subdir = '';

$_SESSION['address_1'] = $address_1;

$search_categories = ['公共の相談所', '専門相談員（無料）', '訪問医師', '訪問介護士', '訪問看護師', '訪問リハビリ', '福祉用具（ベッド他）', '訪問入浴', '訪問薬局', '訪問介護夜間対応', '定期巡回', '訪問マッサージ'];

$dist_flg_1 = "";
$dist_flg_2 = "";
$dist_flg_3 = "";

$lat = 0;
$lng = 0;

$yog_patern1 = array();
$yog_patern3 = array();


if (isset($_GET['search_category'])) {
    if (strlen($_GET['search_category']) > 0) {
        $search_category = $_GET['search_category'];
        $_SESSION['search_category'] = $search_category;
    }
}

if (isset($_GET['address_2'])) {
    if (strlen($_GET['address_2']) > 0) {
        $address_2 = trim($_GET['address_2']);
        $address = $address_2;
        $address_2_onMap = $address_2;
        $_SESSION['address_2'] = $address_2;
    }
}
if (isset($_GET['address_3'])) {
    if (strlen($_GET['address_3']) > 0) {
        $address_3 = trim($_GET['address_3']);
        $address = $address . $_GET['address_3'];
        //if( strpos($address_3, $adress_2) === false ) {
        //    $address_3_onMap = substr($address_3, strlen($address_2));
        //} else {
        $address_3_onMap = $address_3 . "&nbsp;付近";
        //}
    }
}
if (isset($_GET['dist'])) {
    if (strlen($_GET['dist']) > 0) {
        $dist = $_GET['dist'];
    }
}
if (isset($_GET['lat'])) {
    if (strlen($_GET['lat']) > 0) {
        $current_lat = $_GET['lat'];
    }
}
if (isset($_GET['lng'])) {
    if (strlen($_GET['lng']) > 0) {
        $current_lng = $_GET['lng'];
    }
}

if (($dist == "10") || strlen($dist) <= 0) {
    $dist_flg_2 = "checked";
} elseif ($dist == "5") {
    $dist_flg_1 = "checked";
} else {
    $dist_flg_3 = "checked";
}

$svc_type = "";
$menu_service_img = '';
$menu_service_text = '';
switch ($search_category) {

    case '公共の相談所':
        $svc_type = 'clo';
        //$menu_service_img = '';
        //$menu_service_text = '公共の相談所';
        //$search_category_img = "./pin_public_counseling.png";
        break;
    case '専門相談員（無料）':
// query test 
// SELECT t1.offc_no, t1.svc_type, t2.offc_name, t1.offc_locat_1, t1.offc_locat_2,
// t1.offc_locat_latitd, t1.offc_locat_longtd,
// (6371 * acos(cos(radians(35.725499)) * cos(radians(t1.offc_locat_latitd)) *
// cos(radians(t1.offc_locat_longtd) - radians(139.538159)) +
// sin(radians(35.725499)) * sin(radians(t1.offc_locat_latitd)))) AS distance
// FROM swms_mhlw_dtl_loctn_kyo_13 AS t1
// INNER JOIN swms_mhlw_inf_mng_kyo_13 AS t2
// ON t1.offc_no = t2.offc_no
// AND t1.svc_type = t2.svc_type
// WHERE t1.svc_type = '居'
// AND t1.offc_city_cd = '西東京市'
// AND t1.offc_locat_1 IS NOT NULL
// HAVING distance <= 10
// ORDER BY distance
        $svc_type = '居';
        //$search_category_img = "./pin_public_counseling.png";
        break;
    case '訪問医師':
        $svc_type = 'doc';
        break;
    case '訪問介護士':
        $svc_type = '介';
        break;
    case '訪問看護師':
        $svc_type = '看';
        break;
    case '訪問リハビリ':
        $svc_type = 'リ';
        break;
    case '福祉用具（ベッド他）':
        $svc_type = '用';
        break;
    case '訪問入浴':
        $svc_type = '入';
        break;
    case '訪問薬局':
        $svc_type = 'phm';
        break;
    case '訪問介護夜間対応':
        $svc_type = '夜';
        break;
    case '定期巡回':
        $svc_type = '定';
        break;
    case '訪問マッサージ':
        $svc_type = 'msg';
        break;
}
$_SESSION['svc_type'] = $svc_type;

const prefix = 'swms_';
$tbl_publickOfficeInfo = "publick_office_info_13";
$tbl_infMng =  prefix . "mhlw_inf_mng_13";
$tbl_infMng_kyo =  prefix . "mhlw_inf_mng_kyo_13";
$tbl_infMng_yog =  prefix . "mhlw_inf_mng_yog_13";
$tbl_dtlLoctn =  prefix . "mhlw_dtl_loctn_13";
$tbl_dtlLoctn_kyo =  prefix . "mhlw_dtl_loctn_kyo_13";
$tbl_dtlLoctn_yog =  prefix . "mhlw_dtl_loctn_yog_13";
$tbl_snrCtznCnslCntr =  prefix . "snr_ctzn_cnsl_cntr_13";
$tbl_vst_doc = prefix . "vst_doc_13";
$tbl_medInstMdcl = prefix . "med_inst_lst_mdcl_13";
$tbl_medInstTblPhrmcy  = prefix . "med_inst_tbl_phrmcy_13";
$tbl_hariKyuAnma  = prefix . "hari_kyu_anma_13";

try {
    $dbh = new PDO($db->getDsn(), $db->getUser(), $db->getPassword());

    if (isset($address_3) == false or strlen($address_3) <= 0) {
        $stmt = $dbh->prepare("SELECT building, zipcode, address, lat, lng " .
            "FROM {$tbl_publickOfficeInfo} " .
            "WHERE name = :address_2 ");
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);

        if ($rows_cnt > 0) {

            $zipCode_array = array();
            foreach ($rows as $row) {

                $zipCode_array = preg_split("/-./", $row['zipcode']);
                $zipCode_1 = $zipCode_array[0];
                $zipCode_2 = $zipCode_array[1];
                $address_3 = trim(substr($row['address'], strlen($address_2)));
                $address_2_onMap = "";
                $address_3_onMap =  $row['building'] . "付近";
                $lat = $row['lat'];
                $lng = $row['lng'];
                break;
            }
        }
    } else {
        //URL設定
        $url = 'https://msearch.gsi.go.jp/address-search/AddressSearch?q=' . urlencode($address);

        //API接続
        $file = file_get_contents($url);

        //戻り値を整形
        $data = json_decode($file);
        $latlng = $data[0]->geometry->coordinates;
        if ($latlng) {
            $lat = $latlng[1];
            $lng = $latlng[0];
        }
    }

    if ($svc_type == "clo") {
        // 公共の相談所 (高齢者相談センター)
        // Query public counseling centers within a specified distance from the given latitude and longitude
        $stmt = $dbh->prepare(
            "SELECT sral_no, inst_nm, locat_latitd, locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(locat_latitd)) * cos(radians(locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_snrCtznCnslCntr} " .
            "WHERE addrs IS NOT NULL AND mncplty_name = :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } elseif ($svc_type == "居") {
        // 専門相談員（無料） (居宅介護支援)
        // Query in-home care support offices within a specified distance
        $stmt = $dbh->prepare(
            "SELECT tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2, offc_locat_latitd, offc_locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(offc_locat_latitd)) * cos(radians(offc_locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(offc_locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_dtlLoctn_kyo} AS tbl_1 " .
            "JOIN {$tbl_infMng_kyo} AS tbl_2 ON (tbl_1.offc_no = tbl_2.offc_no AND tbl_1.svc_type = tbl_2.svc_type) " .
            "WHERE tbl_1.svc_type = :svc_type AND offc_locat_1 IS NOT NULL AND tbl_1.offc_city_cd = :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':svc_type', $svc_type, PDO::PARAM_STR);
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } elseif ($svc_type == "doc") {
        // 訪問医師
        // Query visiting doctors within a specified distance, matching area broadly
        $stmt = $dbh->prepare(
            "SELECT tbl_1.inst_cd, tbl_2.inst_nm, tbl_2.locat_latitd, tbl_2.locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(tbl_2.locat_latitd)) * cos(radians(tbl_2.locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(tbl_2.locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_vst_doc} AS tbl_1 " .
            "JOIN {$tbl_medInstMdcl} AS tbl_2 ON (tbl_1.inst_cd = tbl_2.inst_cd) " .
            "WHERE tbl_2.addrs IS NOT NULL AND tbl_2.area_blng LIKE :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $address_2_like = "%" . $address_2 . "%";
        $stmt->bindParam(':address_2', $address_2_like, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } elseif ($svc_type == "phm") {
        // 訪問薬局
        // Query visiting pharmacies within a specified distance, matching area broadly
        $stmt = $dbh->prepare(
            "SELECT inst_cd, inst_nm, locat_latitd, locat_longtd, tel, addrs, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(locat_latitd)) * cos(radians(locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_medInstTblPhrmcy} " .
            "WHERE addrs IS NOT NULL AND area_blng LIKE :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $address_2_like = "%" . $address_2 . "%";
        $stmt->bindParam(':address_2', $address_2_like, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } elseif ($svc_type == "msg") {
        // 訪問マッサージ (はり灸あん摩)
        // Query visiting massage/acupuncture services within a specified distance, matching area broadly
        $stmt = $dbh->prepare(
            "SELECT item_nm, inst_nm, locat_latitd, locat_longtd, tel, addrs, hari_med_treat_mng, kyu_med_treat_mng, anma_med_treat_mng, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(locat_latitd)) * cos(radians(locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_hariKyuAnma} " .
            "WHERE addrs IS NOT NULL AND vist_spec_flg = '○' AND area_blng LIKE :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $address_2_like = "%" . $address_2 . "%";
        $stmt->bindParam(':address_2', $address_2_like, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } elseif ($svc_type != "用") {
        // 訪問看護・訪問介護・訪問リハビリ・訪問入浴・定期巡回・夜間介護
        // Query various visiting care services within a specified distance
        $stmt = $dbh->prepare(
            "SELECT tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2, offc_locat_latitd, offc_locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(offc_locat_latitd)) * cos(radians(offc_locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(offc_locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_dtlLoctn} AS tbl_1 " .
            "JOIN {$tbl_infMng} AS tbl_2 ON (tbl_1.offc_no = tbl_2.offc_no AND tbl_1.svc_type = tbl_2.svc_type) " .
            "WHERE tbl_1.svc_type = :svc_type AND offc_locat_1 IS NOT NULL AND tbl_1.offc_city_cd = :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':svc_type', $svc_type, PDO::PARAM_STR);
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $rows_cnt = count($rows);
    } else {
        // 福祉用具（ベッド他）
        // Query welfare equipment services, separating "販" (sales) and "貸" (rental) and merging results
    
        // Query for "販" (sales)
        $svc_type_han = "販";
        $stmt = $dbh->prepare(
            "SELECT tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2, offc_locat_latitd, offc_locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(offc_locat_latitd)) * cos(radians(offc_locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(offc_locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_dtlLoctn_yog} AS tbl_1 " .
            "JOIN {$tbl_infMng_yog} AS tbl_2 ON (tbl_1.offc_no = tbl_2.offc_no AND tbl_1.svc_type = tbl_2.svc_type) " .
            "WHERE tbl_1.svc_type = :svc_type AND offc_locat_1 IS NOT NULL AND tbl_1.offc_city_cd = :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':svc_type', $svc_type_han, PDO::PARAM_STR);
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows_han = $stmt->fetchAll();
    
        // Query for "貸" (rental)
        $svc_type_tai = "貸";
        $stmt = $dbh->prepare(
            "SELECT tbl_1.offc_no, tbl_1.svc_type, offc_name, offc_locat_1, offc_locat_2, offc_locat_latitd, offc_locat_longtd, " .
            "( 6371 * acos( cos(radians(:lat)) * cos(radians(offc_locat_latitd)) * cos(radians(offc_locat_longtd) - radians(:lng)) + sin(radians(:lat)) * sin(radians(offc_locat_latitd)) ) ) AS distance " .
            "FROM {$tbl_dtlLoctn_yog} AS tbl_1 " .
            "JOIN {$tbl_infMng_yog} AS tbl_2 ON (tbl_1.offc_no = tbl_2.offc_no AND tbl_1.svc_type = tbl_2.svc_type) " .
            "WHERE tbl_1.svc_type = :svc_type AND offc_locat_1 IS NOT NULL AND tbl_1.offc_city_cd = :address_2 " .
            "HAVING distance <= :dist " .
            "ORDER BY distance"
        );
        $stmt->bindParam(':svc_type', $svc_type_tai, PDO::PARAM_STR);
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':dist', $dist, PDO::PARAM_STR);
        $stmt->bindParam(':address_2', $address_2, PDO::PARAM_STR);
        $stmt->execute();
        $rows_tai = $stmt->fetchAll();
    
        // Extract office numbers for "販" and "貸"
        $offc_nos_han = array_column($rows_han, 'offc_no');
        $offc_nos_tai = array_column($rows_tai, 'offc_no');
    
        // Identify offices offering both "販" and "貸" for use in popup display
        $yog_patern3 = array_intersect($offc_nos_han, $offc_nos_tai);
    
        // All offices offering "販" for use in popup display
        $yog_patern1 = $offc_nos_han;
    
        // Filter $rows_tai to include only offices that offer "貸" but not "販"
        $rows_tai_unique = array_filter($rows_tai, function ($row) use ($offc_nos_han) {
            return !in_array($row['offc_no'], $offc_nos_han);
        });
    
        // Merge all "販" offices with "貸"-only offices
        $rows = array_merge($rows_han, $rows_tai_unique);
        $rows_cnt = count($rows);
    }
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

if ($rows_cnt > 0) {

    switch ($search_category) {

        case '公共の相談所':

            $iconClass = "marker_clo";
            break;

        case '専門相談員（無料）':

            $iconClass = "marker_kyo";
            break;

        case '訪問医師':

            $iconClass = "marker_doc";
            break;

        case '訪問介護士':

            $iconClass = "marker_kai";
            break;

        case '訪問看護師':

            $iconClass = "marker_kan";
            break;

        case '訪問リハビリ':

            $iconClass = "marker_rih";
            break;

        case '福祉用具（ベッド他）':

            $iconClass = "marker_yog";
            break;

        case '訪問入浴':

            $iconClass = "marker_nyu";
            break;

        case '訪問薬局':

            $iconClass = "marker_phm";
            break;

        case '定期巡回':

            $iconClass = "marker_tei";
            break;

        case '訪問介護夜間対応':

            $iconClass = "marker_yak";
            break;

        case '訪問マッサージ':

            $iconClass = "marker_msg";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google" content="notranslate">
  <title>事業所マップ｜Life Star</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css">
  <link rel="stylesheet" href="./issets/scss/font/font.css?20220803-1015" />
  <link rel="stylesheet" href="./issets/scss/mapdatalist.css?20220803-1015" />
  <link rel="stylesheet" type="text/css" href="./css/header_footer.css?20220803-1015">
  <?php  //追加 (@ edited by a.u  2023.08.02)  
    ?>
  <link rel="stylesheet" href="./css/map_search.css?20220803-1015" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="./issets/library/owlcarousel/assets/owl.theme.default.min.css" />
  <link rel="stylesheet" href="./issets/library/owlcarousel/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="./js/mapbox/1.8.1/mapbox-gl.css">
  <link rel="stylesheet" href="./css/map.css?20220527-1035">
  <?php require_once $docrt . '/head_tag_elements.php'; ?>
</head>

<body>
  <?php require_once './header_search.php'; ?>
  <form id="swms_form" name="swms_form">
    <div class="menu__search_category">
      <div class="menu__search_category-container">
        <div class="box-menu__people-img"><img src="./img/LS_icon_Dr.svg" alt="" /></div>
        <div class="banner-info-form">
          <!-- icon search start -->
          <div class="banner-search">
            <!-- select start -->
            <div id="select-category-select" class="banner-form-select">
              <p id="select-category-text" class="banner-form-select__text">
                <?= $search_category ? $search_category : "選んでください" ?>
              </p>

              <div class="banner-form-select__icon">
                <img src="./issets/images/arrow-bottom.svg" alt="" />
              </div>

              <div class="banner-list-select" onkeyup="change_ctgry();">
                <ul class="banner-checkboxs">
                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip  banner-checkbox-item" value="公共の相談所" type="checkbox"
                      name="checkbox-banner" id="checkbox-1" onclick="selectOnlyThis(this)" data-checkbox="false" />

                    <label class="banner-label" for="checkbox-1">
                      <span class="banner-label--middle">公共の相談所</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="専門相談員（無料）" type="checkbox"
                      name="checkbox-banner" id="checkbox-2" onclick="selectOnlyThis(this)" data-checkbox="false" />

                    <label class="banner-label" for="checkbox-2">
                      <span class="banner-label--middle">専門相談員</span>
                      <span class="banner-label--small"> （無料）</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問医師" type="checkbox"
                      name="checkbox-banner" id="checkbox-3" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-3">
                      <span class="banner-label--middle">訪問医師</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問介護士" type="checkbox"
                      name="checkbox-banner" id="checkbox-4" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-4">
                      <span class="banner-label--middle">訪問介護士</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問看護師" type="checkbox"
                      name="checkbox-banner" id="checkbox-5" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-5">
                      <span class="banner-label--middle">訪問看護師</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問リハビリ" type="checkbox"
                      name="checkbox-banner" id="checkbox-6" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-6">
                      <span class="banner-label--middle">訪問リハビリ</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="福祉用具（ベッド他）" type="checkbox"
                      name="checkbox-banner" id="checkbox-7" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-7">
                      <span class="banner-label--middle">福祉用具</span>
                      <span class="banner-label--small"> （ベッド他）</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問入浴" type="checkbox"
                      name="checkbox-banner" id="checkbox-8" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-8">
                      <span class="banner-label--middle">訪問入浴</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問薬局" type="checkbox"
                      name="checkbox-banner" id="checkbox-9" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-9">
                      <span class="banner-label--middle">訪問薬局</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問介護夜間対応" type="checkbox"
                      name="checkbox-banner" id="checkbox-10" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-10">
                      <span class="banner-label--small">訪問介護</span>
                      <span class="banner-label--middle">夜間対応</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="定期巡回" type="checkbox"
                      name="checkbox-banner" id="checkbox-11" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-11">
                      <span class="banner-label--middle">定期巡回</span>
                    </label>
                  </li>

                  <li class="banner-checkboxs__item">
                    <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問マッサージ" type="checkbox"
                      name="checkbox-banner" id="checkbox-12" onclick="selectOnlyThis(this)" data-checkbox="false" />
                    <label class="banner-label" for="checkbox-12">
                      <span class="banner-label--middle">訪問マッサージ</span>
                    </label>
                  </li>
                </ul>

                <div class="select-btn">
                  <div class="select-btn__item--pink" onclick="ctgry_search('<?= $dist ?>');">
                    <p　id="ctgry_search" class="select-btn__text--white">決定</p>
                  </div>
                  <div class="select-btn__item--pink">
                    <p class="select-btn__text--white" onclick="cancel_ctgry('<?= $search_category ?>');">キャンセル</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- select end -->
          </div>
        </div>
      </div>
    </div>
    <!-- menu__search_category end -->



    <!-- banner start -->
    <div class="banner">
      <!-- content banner start -->
      <div class="banner__container">

        <div id="Map-search-view">
          <!--++ Map-search-view ++-->
        </div>

        <!--Address box-->
        <div class="map-tool-box">
          <ul class="map-tool-box-container">
            <li class="map-tool-title">
              <img src="./officedetails/images/mark-blue.png" alt="marker" />
            </li>
            <li class="map-tool-address"><?php //〒< ?= $zipCode ? ><br> 
                                                        ?>【<?= $address_1 ?>】
              <?= $address_2_onMap ?><br>&nbsp;<?= $address_3_onMap ?>
            </li>
            <li class="map-tool-button">
              <label for="trigger" class="open_button">
                検索地を変更
              </label>
            </li>
          </ul>
        </div>
        <!--End Address box-->
        <?php require_once './map_search_menu.php'; ?>
      </div><!-- banner__container" END -->
    </div><!-- banner END -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    <?php
// Initialize counter and arrays to store icon data
$cnt = 0;
$icon_lat = array();
$icon_lng = array();
$icon_title = array();
$icon_pop_cont = array();

// Define common strings for icon content
$icon_category = "<span class=\"icon-category\">[" . $search_category . "]</span><br>";
$icon_office_name = "<span>";
$icon_link = "<div class=\"icon-link\"><a href=\"./officedetails.html\" class=\"icon-link\">詳しく見る >></a> </div>";

// Process data based on service type ($svc_type)
if ($svc_type == "clo") {
    // Handle public counseling centers (e.g., Elderly Counseling Centers)
    foreach ($rows as $row) {
        $cnt++;
        $icon_lat[$cnt] = (float) $row['locat_latitd']; // Latitude
        $icon_lng[$cnt] = (float) $row['locat_longtd']; // Longitude
        $icon_title[$cnt] = htmlspecialchars($row['inst_nm']); // Institution name, escaped for safety
        $icon_office_name = "<span>" . $icon_title[$cnt] . "</span><br>";
        $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/public_counseling.php/?sral_no=" . $row['sral_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
        $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $icon_link; // Combine for popup content
    }
} elseif ($svc_type == "doc") {
    // Handle visiting doctors
    foreach ($rows as $row) {
        $cnt++;
        $icon_lat[$cnt] = (float) $row['locat_latitd'];
        $icon_lng[$cnt] = (float) $row['locat_longtd'];
        $icon_title[$cnt] = htmlspecialchars($row['inst_nm']);
        $icon_office_name = "<span>" . $icon_title[$cnt] . "</span><br>";
        $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_doctor.php/?inst_cd=" . $row['inst_cd'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
        $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $icon_link;
    }
} elseif ($svc_type == "phm") {
    // Handle visiting pharmacies
    foreach ($rows as $row) {
        $cnt++;
        $icon_lat[$cnt] = (float) $row['locat_latitd'];
        $icon_lng[$cnt] = (float) $row['locat_longtd'];
        $icon_title[$cnt] = htmlspecialchars($row['inst_nm']);
        $icon_office_name = "<span>" . $icon_title[$cnt] . "</span><br>";
        $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_pharmacist.php/?inst_cd=" . $row['inst_cd'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
        $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $icon_link;
    }
} elseif ($svc_type == "msg") {
    // Handle visiting massage services (e.g., acupuncture, moxibustion, anma)
    foreach ($rows as $row) {
        $cnt++;
        $icon_lat[$cnt] = (float) $row['locat_latitd'];
        $icon_lng[$cnt] = (float) $row['locat_longtd'];
        $icon_title[$cnt] = htmlspecialchars($row['inst_nm']);
        
        // Build treatment type string
        $hri_mng = htmlspecialchars($row['hari_med_treat_mng']); // Acupuncture
        $kyu_mng = htmlspecialchars($row['kyu_med_treat_mng']);  // Moxibustion
        $anma_mng = htmlspecialchars($row['anma_med_treat_mng']); // Anma massage
        $treat_str = "<span class=\"icon-msg-type\">施術種別：</span><span>";
        if (strlen($hri_mng) > 0) {
            $treat_str .= "「はり」";
        }
        if (strlen($kyu_mng) > 0) {
            $treat_str .= "「灸」";
        }
        if (strlen($anma_mng) > 0) {
            $treat_str .= "「あん摩」";
        }
        $treat_str .= "</span><br>";

        $icon_office_name = "<span>" . $icon_title[$cnt] . "</span><br>";
        $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_masseur.php/?item_nm=" . $row['item_nm'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
        $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $treat_str . $icon_link;
    }
} else {
    // Handle other service types
    foreach ($rows as $row) {
        $cnt++;
        $icon_lat[$cnt] = (float) $row['offc_locat_latitd'];
        $icon_lng[$cnt] = (float) $row['offc_locat_longtd'];
        $icon_title[$cnt] = htmlspecialchars($row['offc_name']);
        $icon_office_name = "<span>" . $icon_title[$cnt] . "</span><br>";

        if ($row['svc_type'] == "貸" || $row['svc_type'] == "販") {
            // Handle welfare equipment rental or sales
            $svc_type_tai = '貸'; // Rental
            $svc_type_han = '販'; // Sales

            if (in_array($row['offc_no'], $yog_patern3)) {
                // Both rental and sales options
                $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"." . $subdir . "/welfareequipment_rent.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_tai) . "\" style=\"text-decoration: underline; color: blue;\">ﾚﾝﾀﾙ</a><span class=\"icon-link-yog-title\">  OR  </span><a href=\"./welfareequipment_sales.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_han) . "\" style=\"text-decoration: underline; color: blue;\">販売</a></div>";
            } elseif (in_array($row['offc_no'], $yog_patern1)) {
                // Sales only
                $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"." . $subdir . "/welfareequipment_sales.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_han) . "\" style=\"text-decoration: underline; color: blue;\">販売</a></div>";
            } else {
                // Rental only
                $icon_link = "<div class=\"icon-link-yog\"><span class=\"icon-link-yog-title\">詳しく見る >>  </span><a href=\"." . $subdir . "/welfareequipment_rent.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "&svc_type=" . urlencode($svc_type_tai) . "\" style=\"text-decoration: underline; color: blue;\">レンタル</a></div>";
            }
            $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $icon_link;
        } else {
            // Determine link based on search category
            switch ($_SESSION['search_category']) {
                case '専門相談員（無料）':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/consultation.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '訪問介護士':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_care.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '訪問看護師':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_nurse.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '訪問リハビリ':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/home_rehabilitation.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '訪問入浴':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/bathing_care.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '定期巡回':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/nurseandcarer.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
                case '訪問介護夜間対応':
                    $icon_link = "<div class=\"icon-link\"><a href=\"." . $subdir . "/night_caregiver.php/?offc_no=" . $row['offc_no'] . "&pref=" . $pref . "\" class=\"icon-link\">詳しく見る >></a> </div>";
                    break;
            }
            $icon_pop_cont[$cnt] = $icon_category . $icon_office_name . $icon_link;
        }
    }
}
?>


    $(function() {
      var ctgry = "<?php echo $search_category ?>";
      clear_ctgry();
      change_ctgry(ctgry);

    });

    function load(path) {
      alert("Hello!!");
      return new Promise(function(resolve, reject) {
        var req = new XMLHttpRequest();
        req.open("get", path, true);
        req.responseType = "arraybuffer";
        req.onload = () => {
          if (req.status == 200) {
            resolve(req.response);
          } else {
            reject("file cannot load");
          }
        }
        req.send();
      });
    }

    jQuery(document).ready(function() {
        var address = "<?php echo $address_2 . $address_3 ?>";
        var search_category = "<?php echo $search_category ?>";
        <?php if (isset($address_3) && strlen($address_3) > 0) { ?>
        var lat = "";
        var lng = "";

        $.ajax({
          url: 'https://msearch.gsi.go.jp/address-search/AddressSearch?q=' + address,
        }).done(function(res, textStatus, jqXHR) {

            if (res.length) {

              var latlng = res[0].geometry.coordinates;
              //経度：Longitude
              lng = res[0].geometry.coordinates[0];

              //緯度：Latitude
              lat = res[0].geometry.coordinates[1];



              //DEBUG
              //alert("(1) lng :" + lng + " lat :" + lat);
            }
            <?php } else { ?>
            var lat = "<?php echo $lat ?>";
            var lng = "<?php echo $lng ?>";

            <?php } ?>

            var map = new mapboxgl.Map({
              container: 'Map-search-view',
              hash: true,
              style: './json/style.json', //style.jsonへのパス
              center: [lng, lat],
              zoom: 12.41,
              maxZoom: 17.99,
              minZoom: 4,
              localIdeographFontFamily: false
              //localIdeographFontFamily: ['MS Gothic', 'Hiragino Kaku Gothic Pro', 'sans-serif']
            });
            
            var lnglat_crrnt = map.getCenter();
            new mapboxgl.Marker()
              .setLngLat(lnglat_crrnt)
              .addTo(map);

            map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
            map.addControl(new mapboxgl.ScaleControl());

            var markers = new Array(<?php echo $cnt  ?>);

            //DEBUG
            //alert("lng :" + lng + " lat :" + lat);


            <?php $cnt_icons = $cnt; ?>
            <?php for ($i = 0; $i <= $cnt_icons; $i++) : ?>

            //修正 (@ edited by BnK  2022.12.10) START
            <?php //if ( strlen($icon_lat[$i]) > 0 && strlen($icon_lng[$i]) > 0 ) :
                        ?>
            <?php if (isset($icon_lat[$i]) && (strlen($icon_lat[$i]) > 0 && strlen($icon_lng[$i]) > 0)) : ?>
            //修正 (@ edited by BnK  2022.12.10) END 

            var el = document.createElement('div_' + '<?php echo $i ?>');

            el.className = "<?php echo $iconClass ?>";
            //el.id = '{$iconClass}_' + '{$i}';
            //el.style.backgroundImage = '{$iconUrl}';
            lnglat = [<?php echo $icon_lng[$i] ?>, <?php echo $icon_lat[$i] ?>];

            //DEBUG
            //alert('$icon_lat[$i] =' +  '<?php echo $icon_lat[$i]  ?>');

            var popup = new mapboxgl.Popup({
              anchor: 'bottom',
              closeButton: true,
              closeOnClick: true,
              focusAfterOpen: true
            });
            popup.setHTML('<?php echo $icon_pop_cont[$i] ?>');

            //Mapピンのマウスオーバー時の反応範囲の調整：offset値を追加　(@ edited by a.u  2022.10.16) 
            //markers[<?php echo $i ?>] = new mapboxgl.Marker(el, {anchor: 'bottom'}).setLngLat(lnglat).setPopup(popup).addTo(map);
            markers[<?php echo $i ?>] = new mapboxgl.Marker(el, {
              anchor: 'top',
              offset: [0, 0]
            }).setLngLat(lnglat).setPopup(popup).addTo(map);

            var markerDiv = markers[<?php echo $i ?>].getElement();
            markerDiv.addEventListener('mouseenter', () => {
              markers[<?php echo $i ?>].togglePopup();
            });
            //markerDiv.addEventListener('mouseleave', () => {markers[<?php //echo $i 
            ?
            >

          ].togglePopup();
        });
      //markerDiv.addEventListener('mouseleave', function( event ) {
      // 		setTimeout(function() {
      //	        markers[<?php //echo $i 
      ?
      >
    ].closePopup();
    //	    }, 2000);
    //}, false);

    <?php endif; ?>
    <?php endfor; ?>

    // 10km: 半径単位(m)
    <?php if ($dist == "10") : ?>
    var myCircle = new MapboxCircle(lnglat_crrnt, 10000, {
      editable: false,
      strokeColor: '#0055FF',
      strokeWeight: 1.0,
      fillColor: 'null'
    }).addTo(map);

    // 16km: 半径単位(m)
    <?php elseif ($dist == "16") : ?>
    var myCircle = new MapboxCircle(lnglat_crrnt, 16000, {
      editable: false,
      strokeColor: '#0055FF',
      strokeWeight: 1.0,
      fillColor: 'null'
    }).addTo(map);

    // 5km: 半径単位(m)
    <?php else : ?>
    //DEBUG
    //alert("5km: 半径単位(m)： " + "{$_SESSION['dist']}" + " 緯度経度：" + lnglat);
    var myCircle = new MapboxCircle(lnglat_crrnt, 5000, {
    editable: false,
    strokeColor: '#0055FF',
    strokeWeight: 1.0,
    fillColor: 'null'
    }).addTo(map);
    <?php endif; ?>

    });

    });
    </script>
  </form>



  <script src="./issets/library/vendors/jquery.min.js"></script>
  <script src="./issets/script/hover.js"></script>
  <script src="./issets/script/eventBanner.js"></script>
  <script src="./issets/script/resize.js"> </script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
  <script src="./js/map_search.js"></script>
  <script src="./js/leaflet/leaflet.js"></script>
  <script src="./js/mapbox/1.8.1/mapbox-gl.js"></script>
  <script src="./js/mapbox/mapbox-gl-circle.min.js"></script>

  <script src="./js/header_footer.js"></script>
</body>

</html>