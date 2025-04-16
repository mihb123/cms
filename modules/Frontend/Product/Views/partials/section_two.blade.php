<div class="cms4-top-section top-section-2">
    <div class="cms4-section-title"><span class="small">身体と心を</span> <span>支えてくれる</span> もの･サービス</div>
    <div class="cms4-tab kc-tab">
        <div class="tab-scroll">
            <ul class="tab-nav">
                <li class="active" data-tab-id="cms4-tab-1">
                    <a href="#">すべて</a>
                </li>
                @foreach ($listProductCategoryNews as $key => $categoryNew)
                    <li data-tab-id="cms4-tab-{{ $categoryNew->id }}">
                        <a href="#">{!! $categoryNew->title !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="kc-tab-content show" id="cms4-tab-1">
                @include($module . '::partials.ajax.list_product_tab_default')
            </div>

            @foreach ($listProductCategoryNews as $key => $categoryNew)
                <div class="kc-tab-content" id="cms4-tab-{{ $categoryNew->id }}">
                    @include($module . '::partials.ajax.list_product_tab')
                </div>
            @endforeach
        </div>
    </div>
</div>
