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
                <form class="kt-form" id="node-form" action="{{ route('sitemap-manage.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="accordion accordion-toggle-arrow" id="accordionExample4">
                        <div class="card">
                            <div class="card-header" id="headingOne4">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#tagGroup" aria-expanded="false" aria-controls="tagGroup">
                                    <i class="flaticon2-layers-1"></i> カテゴリグループタグ
                                </div>
                            </div>

                            <div id="tagGroup" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample4">
                                <div class="card-body">
                                    <div class="kt-checkbox-list">
                                        @foreach ($listSiteMap as $key => $siteMap)
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="sitemap[]" value="{{ $siteMap['id']}}"> {{ $siteMap['title']}}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer" style="display: block;">
                                    <div class="item-list-footer">
                                        <label class="float-right btn btn-sm btn-default">
                                            <input type="checkbox" id="select-all-tagGroup"> 全てを選択する
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <button type="submit" class="float-right btn btn-default btn-sm">
                            メニューに追加する
                        </button>
                    </div>
                </form>
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
        </div>
    </div>
</div>
