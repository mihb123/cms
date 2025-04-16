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
                @include('sitemap::common.form_edit')
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
           
            <form class="kt-form" id="node-form" action="{{ route('sitemap-manage.update', $siteMap['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="save_sitemap" value="on">
                <div class="row" id="kt_sortable_portlets">
                    <div class="col-lg-9 p-4">
                        @if($siteMap['content'])
                            @foreach ($siteMap['content'] as $key => $item)                   
                                @if (isset($name[$item]))
                                    <div class="kt-portlet kt-portlet--mobile kt-portlet--sortable">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <input type="text" hidden name="sitemap[]" value="{{ $name[$item]['id'] }}"> {{ $name[$item]['title'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endif                           
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-3 p-4">
                        <div class="form-group">
                            <label class="mr-4">オフメニュー</label>                                                          
                            <input data-switch="true" type="checkbox" <?= $siteMap['status'] ? 'checked' : '' ?> name="status" data-on-color="brand" id="kt_notify_url">                              
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
