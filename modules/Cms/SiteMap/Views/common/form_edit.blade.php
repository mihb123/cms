@if(isset($siteMap) && $siteMap['content'])
    <form class="kt-form" id="node-form" action="{{ route('sitemap-manage.update', $siteMap['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                            @foreach ($listSiteMap as $key => $item)
                                <label class="kt-checkbox kt-checkbox--success">
                                    <input type="checkbox" name="sitemap[]" 
                                        <?= isset($siteMap['content']) && in_array($item['id'], $siteMap['content']) ? 'checked': '' ?> 
                                        value="{{ $item['id']}}"> {{ $item['title']}}
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
@endif