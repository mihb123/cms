<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend::common.style')
    @stack('styles')
    @include('backend::common.script')
    @FilemanagerScript
</head>
