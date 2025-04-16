<div class="header-submenu submenu-style-1">
    <div class="sub-overlay"></div>
    <div class="sub-wrap">
        <div class="sub-header">
            <span>カテゴリ</span>
            <a class="close-sub" href="#">
                <img src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                <span class="text">閉じる</span>
            </a>
        </div>
        <div class="sub-body">
            <div class="bg-white">
                <ul>
                    @if (isset($listMenu['catePost'][$item]) && count($listMenu['catePost'][$item]) > 0)
                        @foreach ($listMenu['catePost'][$item] as $key => $menuPost)
                            <li>
                                <a href="{{ route('posts.detail', ['id' => $menuPost->id]) . '?category=' . $item }}">
                                    <span>{!! formatTextByCharNumAndLine($menuPost->title, null, 12, null, false) ?? '' !!}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10.859"
                                        viewBox="0 0 7 10.859">
                                        <path id="path9429"
                                            d="M2.8,291.965a.772.772,0,0,0-.508,1.368l4.726,4.049-4.726,4.047a.772.772,0,1,0,1,1.169l5.411-4.63a.772.772,0,0,0,0-1.175L3.294,292.16a.772.772,0,0,0-.495-.195Z"
                                            transform="translate(-1.976 -291.965)" fill="#f8aabb" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="read-more">
                    <a href="{{ route('posts.category', $item) }}">
                        <span>もっと見る</span>
                        <img src="{{ asset('frontend/assets/images/external-link-2.svg') }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
