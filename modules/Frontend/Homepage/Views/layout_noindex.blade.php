<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”robots” content=”noindex”>　<!-- //added by a.u 2024.09.21 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="終末期ケア専門のwebサイトです。「ご本人とご家族の暮らしが、より平穏で、心身共の苦痛が限りなく低減された日々であって欲しい」そんな願いから “最期までより良く生きる” をテーマに運営しています。">
    <title>LifeStar- 終末期ケア専門サイト@yield('title')</title>
    <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
    <link href="{{ asset('frontend/assets/css/style.css?' . date("YmdHi", filemtime(public_path('frontend/assets/css/style.css')))) }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon"  href="{{ asset('frontend/assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DTJ6FEC52E"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-DTJ6FEC52E');
    </script>
</head>
<body class="{{ $class ?? 'sm:bg--pink' }}">
    <div class="top--line d-sp-none"></div>
    <!-- Header -->
    @include('homepage::header.index')
    <!-- End Header -->
    <div class="main-content {{ $home ?? '' }}">
        <div class="container {{ $classProduct ?? '' }}">
            @yield('content')
        </div>
        <!-- Footer -->
        @include('homepage::partials.footer')
        <!-- End Footer -->
    </div>
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/main.js?'.date("YmdHi", filemtime(public_path('frontend/assets/js/main.js')))) }}" type="text/javascript"></script>
    @stack('style')
    @stack('scripts')
</body>
</html>
