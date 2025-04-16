@extends('backend::layout')

@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-product"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{ __('product::messages.manage.product-news-title') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('product-news.create') }}"
                            class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            @lang('product::messages.create_new')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab content -->
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                <thead>
                <tr>
                    <th style="width: 50%">{{ __('product::messages.title_product_new') }}</th>
                    <th style="width: 20%">{{ __('product::messages.sort') }}</th>
                    <th style="width: 5%">{{ __('product::messages.display') }}</th>
                    <th style="width: 20%">{{ __('product::messages.created_at') }}</th>
                    <th style="width: 10%">アクション</th>
                </tr>
                </thead>
                <tbody></tbody>
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
                ajax: {
                    type: 'GET',
                    url: cedu.route('/product-news/ajax'),
                    data: (data) => {
                        data.tab = filter;
                    }
                },
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "検索文字を入力",
                    url: 'https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json'
                },
                lengthMenu: [ 20, 50, 75, 100 ],
                pageLength: 20,
                columns: [
                    {data: "title", orderable: false},
                    {data: "sort", orderable: true},
                    {data: "display", orderable: true},
                    {data: "created_at", orderable: true},
                    {data: "action", orderable: false},
                ]
            });
            $('[data-tab]').click(function() {
                filter = $(this).data('tab');
                table.ajax.reload();
            });

        });
    </script>

@endpush
