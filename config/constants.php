<?php
$rand = rand(1, 100000);
$listCalculate = [
    '1' => "One's Home",
    '2' => 'Care Facility'
];
$calculate = [
    "One's Home" => "自宅",
    'Care Facility' => '施設'
];
$fixedPrice = [
    "1" => "はい",
    '2' => 'いいえ'
];

$listBorder = [
    "1" => "四角", // square
    '2' => '角丸四角', // square border
    '3' => '楕円' // circle
];

$listPositionBanner = [
    '1' => "バナー_ TOP", // Position Top
    '2' => 'バナー_製品一覧ページ', // Position list
    '3' => 'バナー_製品詳細ページ' // Position detail
];

$listPositionPostTopic = [
    '1' => 'バナー_ TOP',
    '2' => 'バナー_製品詳細ページ'
];

return [
    "lang_default" => "vi",
    "lang_vi" => "vi",
    "lang_en" => "en",
    "max_size_file_upload" => 5000000,
    "asset_version" =>  env('ASSET_VERSION', $rand),
    "action_edit" => 0,
    "action_view" => 1,
    "action_delete" => 2,
    "action_create" => 3,
    "action_change_pass" => 4,
    "action_change_permision" => 5,
    "status_deleted" => -1,
    "status_draft" => 2,
    "status_verified" => 1,
    "position_top" => 1,
    "position_product" => 2,
    "sess_lang_key" => "sessionLanguage",
    "sess_lang_key_frontend" => "sessionLanguageFrontend",
    "prefix_api" => env('PREFIX_API', 'api'),
    "default_date_moment" => 'YYYY-MM-DD',
    "regex_phone_register" => '/(0)[0-9]{9}/',
    "log_common_helper" => 'log_common_helper',
    "dot_html" => '.html',
    "THUMB_WIDTH" => 200,
    "THUMB_HEIGHT" => 200,
    "MEDIA_MAX_WIDTH" => 1920,
    "MEDIA_MAX_HEIGHT" => 1920,
    "DEFAULT_DATE_FULL_DB" => 'Y-m-d H:i:s',
    "type_topic" => '1',
    "type_articles" => '2',
    'date_format' => 'Y.m.d',
    'day_month_format' => 'm/d',
    'hour_format' => 'H:i',
    'gender_male' => '1',
    'gender_female' => '2',
    'gender' => '3',
    'family_topic' => '1',
    'family_news' => '2',
    'post_top' => '1',
    'post_no_top' => '2',
    'auto_pagination' => '<a>ページ分け</a>',
    'listCalculate' => $listCalculate,
    'calculate' => $calculate,
    'fixedPrice' => $fixedPrice,
    'listBorder' => $listBorder,
    'listPositionBanner' => $listPositionBanner,
    'listPositionPostTopic' => $listPositionPostTopic,
];
