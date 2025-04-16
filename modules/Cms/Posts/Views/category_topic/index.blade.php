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
                {{ __('投稿カテゴリー') }}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">

                    <a href="{{ route('posts-topic-category.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        @lang('tag::messages.create_new')
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
                    <th>{{ __('posts::messages.title') }}</th>
                    <th>{{ __('posts::messages.sort') }}</th>
                    <th>{{ __('posts::messages.status') }}</th>
                    <th>{{ __('posts::messages.created_at') }}</th>
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
                url: cedu.route('/posts-topic-category/ajax'),
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
            lengthMenu: [20, 50, 75, 100],
            pageLength: 20,
            columns: [{
                    data: "title",
                    orderable: false
                },
                {
                    data: "sort",
                    orderable: false
                },
                {
                    data: "status",
                    orderable: true
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