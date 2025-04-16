<div class="cms4-top-section top-section-1">
    <div class="cms4-section-title">１日１日<span class="small">の</span>暮らしを支えてくれるものたち</div>
    <div class="cms4-section-inner">
        <div class="cms4-section-inner-title">定番のカテゴリの</div>
        <div class="top-product-swiper swiper has-flick">
            <div class="swiper-wrapper">
                @foreach($listProductCategory as $key => $category)
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="top-product-item">
                                <a href="{{ route('product.list', ['category' => $category->title]) }}">
                                    <div class="thumb">
                                        <div class="ratio ratio-1:1">
                                            <img src="{{ $category->avatar ? getLink('media'. '/' . $category->avatar->path) : '' }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="pro-title">{{ $category->title ?? ''}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="cms4-section-inner">
        <div class="cms4-section-inner-title">特集・記事</div>
        @include($module.'::partials.section_features_articles')
    </div>
</div>
