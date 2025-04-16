<script type="text/javascript">
    window.cedu = {};
    window.cedu.env = {};
    window.cedu.lang = 'vi';
    window.cedu.config = {};
    window.cedu.backend = "{{ url(config('backend.route')) }}";
    window.cedu.frontend = "{{ url('') }}";
    window.cedu.csrf = '{{ csrf_token() }}';
    window.cedu.user = {!! json_encode(Auth::user()) !!};
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<script src="{{ asset('cms/theme_metronic/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/custom/login/login-general.js') }}" type="text/javascript"></script>
