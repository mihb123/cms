<div class="bottom-links d-tb-none">
    @if($listMenu && isset($listMenu['menu']->sitemap) && $listMenu['menu']->sitemap)
        @foreach ($listMenu['menu']->sitemap as $key => $sitemap)
            <a href="{{ $sitemap['url'] }}">{{$sitemap['title']}}</a>
        @endforeach
    @endif
</div>
