<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('favicon.png?version=2') }}" rel="shortcut icon">
    <title>@yield('title') - {{ env('BACKEND_SITENAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    @include('common.style')
    @stack('styles')
</head>
