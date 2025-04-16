<title>@yield('title') - {{ env('BACKEND_SITENAME') }}</title>
<link href="{{ asset('favicon.ico?version=' . config("constants.asset_version")) }}" rel="shortcut icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
<link href="{{ asset('cms/css/summernote.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/theme_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/theme_metronic/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/theme_metronic/plugins/custom/jstree/jstree.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/theme_metronic/plugins/global/plugins.bundle.css?version=' . config("constants.asset_version")) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/theme_metronic/css/style.bundle.css?version=' . config("constants.asset_version")) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/css/override.css?version=' . config("constants.asset_version")) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

