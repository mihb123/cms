<div class="header-submenu submenu-style-2">
    <div class="sub-overlay"></div>
    <div class="sub-wrap">
        <div class="sub-header">
            <span>病気の種類から探す <img src="{{ asset('frontend/assets/images/book.png') }}" alt=""></span>
            <a class="close-sub" href="#">
                <img src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                <span class="text">閉じる</span>
            </a>
        </div>
        <div class="sub-body">
            @if(isset($listMenu['categoryTags'][$item]))
                @foreach ($listMenu['categoryTags'][$item] as $key => $menuTag)
                    @if($menuTag)
                        <div class="sub-tag-title">{{ $menuTag['title_japan'] ?? ''}} </div>
                        <div class="sub-list-tags">
                            @if(isset($listMenu['tagGroups'][$item][$menuTag['id']]))
                                @foreach($listMenu['tagGroups'][$item][$menuTag['id']] as $keyTag => $tag)
                                    @if($tag)
                                        <a href="{{ route('tag.detail', $tag['id']) }}" class="tag-item"><span>#</span>{!!  $tag['title']  !!}</a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>

