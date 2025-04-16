<div class="menu-other">
    <div class="menu-title">Pickup</div>
    <ul class="header-menu">
        @if($listMenu && isset($listMenu['menu']->sitemap) && $listMenu['menu']->sitemap)
            @foreach ($listMenu['menu']->sitemap as $key => $sitemap)
                <li>
                    <a href="{{ $sitemap['url'] }}"><span>{!! $sitemap['title'] !!}</span> <img class="icon" src="{{ asset('frontend/assets/images/external-menu.svg') }}" alt="" /></a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
