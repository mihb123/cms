@extends('backend::layout')
@section('title', __('投稿カテゴリー'))
@section('content:class', 'no-padding')

@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-tag"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                {{ __('取扱い店') }}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('company.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                    <th>{{ __('product::messages.name_company') }}</th>
                    <th>{{ __('product::messages.created_at') }}</th>
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
    $(function() {
        var filter = '';
        var table = $("#example").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'GET',
                url: cedu.route('/company/ajax'),
                data: (data) => {
                    data.tab = filter;
                }
            },
            language: {
                lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "検索文字を入力",
                "sProcessing": "処理中...",
                "sLengthMenu": "_MENU_ 件表示",
                "sZeroRecords": "データはありません。",
                "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                "sInfoPostFix": "",
                "sSearch": "検索:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "先頭",
                    "sPrevious": "前",
                    "sNext": "次",
                    "sLast": "最終"
                }
            },
            lengthMenu: [20, 50, 75, 100],
            pageLength: 20,
            columns: [{
                    data: "name",
                    orderable: false
                },
                {
                    data: "created_at",
                    orderable: true
                },
                {
                    data: "action",
                    orderable: false
                },
            ]
        });
        $('[data-tab]').click(function() {
            filter = $(this).data('tab');
            table.ajax.reload();
        });
    });
</script>
@endpush
