@extends('backend::layout')
@section('title', 'Admin')
@section('description', 'Admin listing')
@section('content:class', 'no-padding')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{ __('module_admin.manage.title') }}
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('admin.create')
                            <a href="{{ route('admin.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                {{ __($_module . '::messages.add') }}
                            </a>
                        @end
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                <thead>
                    <tr>
                        <th>{{ __('backend::messages.name') }}</th>
                        <th>{{ __('backend::messages.email') }}</th>
                        <th>{{ __('backend::messages.roles') }}</th>
                        <th>{{ __('backend::messages.status') }}</th>
                        <th>アクション</th>
                    </tr>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            var filter = '';
            var table = $("#example").DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                "lengthChange": false,
                "info": false,
                ajax: {
                    type: 'GET',
                    url: cedu.route('/admin/ajax'),
                    data: (data) => {
                        data.type = filter;
                    }
                },
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search"
                },
                lengthMenu: [ 20, 50, 75, 100 ],
                pageLength: 20,
                columns: [
                    {data: "name", orderable: true},
                    {data: "email", orderable: true},
                    {data: "roles", orderable: true},
                    {data: "status", orderable: true},
                    {data: "action", orderable: false},
                ]
            });

            $('[data-type]').click(function() {
                filter = $(this).data('type');
                table.ajax.reload();
            });
        });
    </script>
@endpush
