<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>事業者検索（医療・介護）｜Life Star</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/jigyosho/fonts/font.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/scss/mapdatalist.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/scss/style.css') }}?20220803-1015" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/jigyosho/css/header_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/library/owlcarousel/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/jigyosho/issets/library/owlcarousel/assets/owl.carousel.min.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
    @include('jigyosho::partials.header')
    
    <div class="container">
        @yield('content')
    </div>

    @include('jigyosho::partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('frontend/jigyosho/issets/library/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/library/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/library/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/hover.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/checkbox.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/handlebanner.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/eventBanner.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/resize.js') }}"></script>
    <script src="{{ asset('frontend/jigyosho/issets/script/ownCarosel.js') }}"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
    <script src="{{ asset('frontend/jigyosho/js/header_footer.js') }}"></script>
</body>
</html>

