<script type="text/javascript">
    window.cedu = {};
    window.cedu.lang = 'vi';
    window.cedu.env = {};
    window.cedu.config = {};
    window.cedu.backend = "{{ url(config('backend.route')) }}";
    window.cedu.frontend = "{{ url('') }}";
    window.cedu.url = function(url) {
        return window.cedu.frontend + url
    };
    window.cedu.route = function(url) {
        return window.cedu.backend + url
    };
    window.cedu.back = function() {
        window.history.back();
    };

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

<script src="{{ asset('cms/theme_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/crud/datatables/data-sources/javascript.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/app.min.js?version=' . config("constants.asset_version")) }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/plugins/custom/flot/flot.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/base64.js?version=' . config("constants.asset_version")) }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/components/extended/bootstrap-notify.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/override.js?version=' . config("constants.asset_version")) }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/plugins/custom/jstree/jstree.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/js/jquery-sortable-min.js') }}" type="text/javascript"></script>