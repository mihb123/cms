@extends('backend::layout')

@section('title', 'Permissions')
@section('description', 'Permissions listing')

@section('content:class', 'no-padding')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-user-settings"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('backend::messages.list_perms')
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table id="example" class="table table-condensed table-bordered table-hover responsive">
                <tbody>
                <tr>
                    <th class="text-center">#</th>
                    <th>@lang('backend::messages.module')</th>
                    @foreach($roles['columns'] as $column)
                        <th class="text-center">{{ ucfirst($column) }}</th>
                    @endforeach
                </tr>
                @php $i = 1; @endphp
                @foreach($roles['modules'] as $module => $perms)
                    <tr>
                        <td class="text-center">{{ $i++ }}.</td>
                        <td>{{ ucfirst($module) }}</td>
                        @foreach($roles['columns'] as $column)
                            <td class="text-center">
                                @isset($perms[$column])
                                    <span class="text-green" style="font-size:18px;color:#1dc9b7"><i class="fa fa-check-circle"></i></span>
                                @else
                                    <span class="text-gray" style="font-size:18px;color:dimgrey"><i class="fa fa-minus-circle"></i></span>
                                    @end
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>

{{--    <div class="tab-content">--}}
{{--        <div role="tabpanel" class="tab-pane active fade in" id="tab-info">--}}
{{--            <div class="tab-content">--}}
{{--                <div class="panel infolist"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Tab content -->--}}
{{--        <div class="tab-content">--}}
{{--            <div role="tabpanel" class="tab-pane active" id="tab-general">--}}
{{--                <div class="tab-content">--}}
{{--                    <div class="panel infolist">--}}
{{--                        <div class="panel-body">--}}
{{--                            <!-- Show datatables -->--}}
{{--                            <div class="box-body no-padding">--}}
{{--                                --}}
{{--                            </div>--}}
{{--                            <!-- End: Show datatables -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('admin/plugins/datatables/datatables.min.js') }}"></script>
    <script>
    /**
     * DataTable handle
     * @file config/index
     */
    $(function () {
        $("#example1").DataTable({
            processing: false,
            serverSide: false,
            paging: false,
            language: {
                lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search"
            }
        });
    });
    </script>
@endpush