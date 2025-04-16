@extends('backend::layout')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="fa fa-school"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                {{ __('メニュー一覧') }}
            </h3>
        </div>
    </div>
    @if(!isset($siteMap))
        @include('sitemap::manage.create')
    @else
        @include('sitemap::manage.edit')
    @end
</div>
<style>
    .card-footer {
        background-color: unset;
    }

    .card-header {
        cursor: pointer;
        margin: 0;
        padding: 0;
        border-bottom: 0;
        border-radius: 0;
        background-color: #f7f8fa;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #ebedf2;
        border-radius: 0.25rem;
    }

    .accordion .card .card-header .card-title {
        width: 100%;
    }

    .kt-checkbox-list {
        max-height: 300px;
        overflow-y: scroll;
    }

    .kt-checkbox {
        font-size: 1.2rem;
    }

    .kt-portlet__head.ui-sortable-handle::after {
        color: #74788d;
        content: "";
        display: flex;
        align-items: center;
        font-size: 1rem;
        font-family: "LineAwesome";
        text-decoration: inherit;
        text-rendering: optimizeLegibility;
        text-transform: none;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
    }

    .kt-portlet .kt-portlet__head {
        min-height: 40px;
    }
</style>
@endsection
@push('scripts')
<link href="{{ asset('cms/theme_metronic/plugins/custom/jquery-ui/jquery-ui.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('cms/theme_metronic/plugins/custom/jquery-ui/jquery-ui.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/components/portlets/draggable.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/components/extended/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
    $('#select-all-tagGroup').click(function(event) {
        if (this.checked) {
            $('#tagGroup :checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('#tagGroup :checkbox').each(function() {
                this.checked = false;
            });
        }
    });

    $('#select-all-postsGroup').click(function(event) {
        if (this.checked) {
            $('#postsGroup :checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('#postsGroup :checkbox').each(function() {
                this.checked = false;
            });
        }
    });


    $(".droppable-area1, .droppable-area2").sortable({
        connectWith: ".connected-sortable",
        stack: '.connected-sortable ul'
    })
</script>
@endpush