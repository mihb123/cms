@if (isset($listSiteMap['siteMapManages']) && $listSiteMap['siteMapManages']->status)
    <div class="site-map">
        <h2 class="tab-title">
            <span>
                主要な記事一覧
                <span class="text-en d-pc-none d-tb-none">Main article list</span>
            </span>
        </h2>
        <div class="sitemap-content">
            <div class="sitemap-content-top">
                <h3 class="title">大切な家族が 余命宣告を受けた時</h3>
                <div class="title-en">When a loved one is told that his or her life is limited</div>
            </div>
            <div class="sitemap-list">
                @foreach($listSiteMap['siteMapManages']->content as $key => $item)
                    @if(isset($listSiteMap['siteMap'][$item]))
                        <div class="sitemap-col">
                            <div class="st-list-title">
                                <img class="pattern" src="{{ asset('frontend/assets/images/pattern.svg') }}" alt="">
                                <span>{{ $listSiteMap['siteMap'][$item]->title }}</span>
                            </div>
                            <ul class="st-list-links">
                                @if ($listSiteMap['siteMap'][$item]->content)
                                    @foreach ($listSiteMap['siteMap'][$item]->content as $keySiteMap => $value)
                                        <li><a href="{{ $value['url'] ?? '' }}">{{ $value['title'] ?? '' }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
