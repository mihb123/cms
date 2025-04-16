<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google" content="notranslate">
  <title>事業所マップ｜Life Star</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css">
  <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/scss/font/font.css?20220803-1015')}}" />
  <link rel=" stylesheet" href="{{ asset('frontend/jigyosho/issets/scss/mapdatalist.css?20220803-1015')}}" />
  <link rel=" stylesheet" href="{{ asset('frontend/jigyosho/js/leaflet/leaflet.css')}}" />
  <link rel=" stylesheet" type="text/css" href="{{ asset('frontend/jigyosho/css/header_footer.css?20220803-1015')}}">
  <link rel="stylesheet" href="{{ asset('frontend/jigyosho/css/map_search.css?20220803-1015')}}" />
  <link href=" https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/library/owlcarousel/assets/owl.theme.default.min.css')}}" />
  <link rel=" stylesheet" href="{{ asset('frontend/jigyosho/issets/library/owlcarousel/assets/owl.carousel.min.css')}}" />
  <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('frontend/jigyosho/js/mapbox/1.8.1/mapbox-gl.css')}}">
  <link rel=" stylesheet" href="{{ asset('frontend/jigyosho/css/map.css?20220527-1035') }}">
  <link rel="shortcut icon" type="image/x-icon"  href="{{ asset('frontend/jigyosho/img/favicon.ico') }}">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="/android-chrome-192x192.png">
</head>
<body>
  @include('jigyosho::partials.header_map_search')

  @yield('content')

  <!-- Scripts -->
  <script src="{{ asset('frontend/jigyosho/issets/library/vendors/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/library/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/hover.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/checkbox.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/handlebanner.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/eventBanner.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/resize.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/issets/script/ownCarosel.js') }}"></script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
  <script src="{{ asset('frontend/jigyosho/js/map_search.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/js/leaflet/leaflet.js')}}"></script>
  <script src="{{ asset('frontend/jigyosho/js/mapbox/1.8.1/mapbox-gl.js')}}"></script>
  <script src="{{ asset('frontend/jigyosho/js/mapbox/mapbox-gl-circle.min.js')}}"></script>
  <script src="{{ asset('frontend/jigyosho/js/header_footer.js') }}"></script>
  <script src="{{ asset('frontend/jigyosho/js/map.js') }}"></script>
</body>
</html>
