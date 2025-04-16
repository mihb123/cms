<li class="has-submenu">
    <a href="#"><span>{!! $listMenu['categories'][$item]->title ?? '' !!}</span>
        <img class="icon" src="{{ asset('frontend/assets/images/arrow-down-menu.svg') }}" alt=""/>
    </a>
    @if (isset($listMenu['categoryTags'][$item]))
        @include('homepage::header.tag')
    @elseif(isset($listMenu['catePost'][$item]))
        @include('homepage::header.posts')
    @endif
</li>
