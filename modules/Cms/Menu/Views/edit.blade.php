<div class="row mt-3 p-3">
    <div class="col-lg-3">
        <div class="kt-portlet ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        カテゴリ一覧
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                @include('menu::common.form_edit')
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        メニュー一覧
                    </h3>
                </div>
            </div>

            <form class="kt-form" id="node-form" action="{{ route('menu.update', $menu['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="save_sitemap" value="on">
                <div class="row" id="kt_sortable_portlets">
                    <div class="col-lg-9 p-4">
                        @if($menu['content'])
                            @foreach ($menu['content'] as $key => $item)
                                @if (isset($tag[$item]))
                                    <div class="kt-portlet kt-portlet--mobile kt-portlet--sortable">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <input type="text" hidden name="menus[]" value="{{ $tag[$item]['id'] }}"> {!! $tag[$item]['title']  ?? ''!!}
                                            </div>
                                        </div>
                                    </div>
                                @elseif (isset($post[$item]))
                                    <div class="kt-portlet kt-portlet--mobile kt-portlet--sortable">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <input type="text" hidden name="menus[]" value="{{ $post[$item]['id'] }}"> {!! $post[$item]['title'] ?? ''!!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if($menu['sitemap'])
                            @foreach($menu['sitemap'] as $key => $sitemap)
                                <div class="block mt-2 ui-menu menu{{ $key }}">
                                    <div class="card card-info">
                                        <div class="card-header bg-gradient">
                                            <h3 class="card-title">ブロック</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool btn-remove-blocks">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: block;border: 1px solid #dedede">
                                            <div class="block-content">
                                                <div class="form-group">
                                                    <label>タイトル</label>
                                                    <input class="form-control title" type="text" name="menu_sitemap[{{$key}}][title]" value="{!! $sitemap['title'] ?? '' !!}">
                                                </div>
                                                <div class="form-group">
                                                    <label>url</label>
                                                    <input class="form-control url" type="text" name="menu_sitemap[{{$key}}][url]" value="{!! $sitemap['url'] ?? '' !!}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <div class="text-right mt-3">
                                <a href="#" class="add-new-link" data-menu="0" data-level="0">新しいアイテムを追加する</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 p-4">
                        <div class="form-group">
                            <label class="mr-4">設定</label>
                            <input data-switch="true" type="checkbox" <?= $menu['status'] ? 'checked' : '' ?> name="status" data-on-color="brand" id="kt_notify_url">
                        </div>
                        <div class="kt-portlet__body">
                            <button type="submit" class="float-right btn btn-default btn-sm">
                                メニューを更新する
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
