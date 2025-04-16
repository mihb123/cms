<!DOCTYPE html>
<html lang="en">
    @include('common.head')
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading @yield('body:class')">
        @yield('content')
        @include('common.script')

        @stack('scripts')
    </body>
</html>
