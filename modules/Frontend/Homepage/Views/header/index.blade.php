<header class="main-header {{ isset($calculate) ? 'calculate-header' : '' }}">
    <div class="container">
        <div class="header-top">
            <a href="/" class="logo">
                <img class="d-sp-none" src="{{ asset('frontend/assets/images/LSlogo-pctb.svg') }}" style="width:200px; margin-top:7px; margin-left:10px;" alt="" />
                <img class="d-pc-none d-tb-none logo-normal" src="{{ asset('frontend/assets/images/LSlogo-sp.svg') }}"
                     style="width:160px; " alt="">
                <img class="d-pc-none d-tb-none logo-sticky" src="{{ asset('frontend/assets/images/logo-sticky.svg') }}"
                     alt="">
            </a>
            @if ($listMenu && isset($listMenu['menu']->content))
                <div class="humberger-wrap">
                    <button class="humberger-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                            <g id="Component_447_176" data-name="Component 447 – 176" transform="translate(1 1)">
                                <line id="Line_212" data-name="Line 212" x2="15" transform="translate(0 12)"
                                    fill="none" stroke="#d6d6d6" stroke-linecap="round" stroke-width="2" />
                                <line id="Line_214" data-name="Line 214" x2="15" transform="translate(0 6)"
                                    fill="none" stroke="#d6d6d6" stroke-linecap="round" stroke-width="2" />
                                <line id="Line_213" data-name="Line 213" x2="15" fill="none" stroke="#d6d6d6"
                                    stroke-linecap="round" stroke-width="2" />
                            </g>
                        </svg>
                    </button>
                    <div class="humberger-menu">
                        <div class="humberger-overlay"></div>
                        <div class="main-menu">
                            <div class="menu-header">
                                <img src="{{ asset('frontend/assets/images/star-2.png') }}" class="star"
                                    alt="" />
                                <div class="menu-left">
                                    <div class="text-icon">
                                        <span class="text">Menu</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14"
                                                viewBox="0 0 15 14">
                                                <g id="Group_1501" data-name="Group 1501"
                                                    transform="translate(-1450.5 -48.5)">
                                                    <line id="Line_212" data-name="Line 212" x2="15"
                                                        transform="translate(1450.5 61.5)" fill="none"
                                                        stroke="#dcdcdc" stroke-width="2" />
                                                    <line id="Line_214" data-name="Line 214" x2="15"
                                                        transform="translate(1450.5 55.5)" fill="none"
                                                        stroke="#dcdcdc" stroke-width="2" />
                                                    <line id="Line_213" data-name="Line 213" x2="15"
                                                        transform="translate(1450.5 49.5)" fill="none"
                                                        stroke="#dcdcdc" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="text-en">Services we offer</div>
                                </div>
                                <div class="menu-right">
                                    <a href="#" class="close-menu">
                                        <img src="{{ asset('frontend/assets/images/close-menu.png') }}"
                                            alt="" />
                                        <span>閉じる</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-body">
                                <div class="menu-services">
                                    <div class="menu-title">コンテンツ</div>
                                    <ul class="header-menu">
                                        @foreach ($listMenu['menu']->content as $key => $item)
                                            @if (isset($listMenu['categories'][$item]))
                                                @include('homepage::header.menu')
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @include('homepage::header.sitemap')
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if (isset($calculate))
            <div class="calculate-slogan d-sp-none">
                <div class="slogan">
                    <span class="small-text">介護サービス費</span>
                    <span class="large-text">自動計算ページ</span>
                    <img class="icon" src="{{ asset('frontend/assets/images/calculate/pig-icon.svg') }}"
                        alt="" />
                </div>
            </div>
            <div class="calculate-slogan-en d-sp-none">Don't worry.We are always there for you.</div>
        @elseif (isset($tag))
            @if (empty($hideMenu))
                <div class="slogan-tag-details d-sp-none">
                    <div class="slogan-wrap">
                        <span class="star">
                            <img src="{{ asset('frontend/assets/images/healthcare.svg') }}" alt="" />
                        </span>
                        <div class="slogan-text">
                            <span class="text-1">病気の経過と終末期</span>
                            <span class="text-en">Disease course and terminal stage.</span>
                        </div>
                    </div>
                </div>
                <div class="header-slogin-sp d-pc-none d-tb-none">
                    <div class="slogan-wrap">
                        <img src="{{ asset('frontend/assets/images/healthcare.svg') }}" alt="" />
                        <div class="slogan-text">
                            <div class="text-ja">
                                <span>病気の経過と終末期</span>
                            </div>
                            <div class="text-en">Disease course and terminal stage.</div>
                        </div>
                    </div>
                </div>
                <div class="tag-detail-header-fixed">
                    <div class="text-group">
                        <span class="text-ja">病気<small>の</small>経過<small>と</small>終末期</span>
                        <span class="text-en">Disease course and terminal stage</span>
                    </div>
                    <span class="tag-name">#{!! $tag->title ?? '' !!}</span>
                    <div class="tag-filter-wrap">
                        <button class="tag-filter-2"><img src="{{ asset('/frontend/assets/images/plus-button.svg') }}"
                                alt="" /></button>
                        <div class="tag-overlay"></div>
                        <div class="tag-top-wrap">
                            <button class="close-filter">
                                <img src="{{ asset('frontend/assets/images/close-filter.svg') }}"
                                    alt="" /></button>
                            <div class="tag-header-basic">
                                <div class="tag-filter">
                                    <svg id="grip-solid-horizontal_1_" xmlns="http://www.w3.org/2000/svg"
                                        width="12.873" height="9.655" viewBox="0 0 12.873 9.655">
                                        <path id="Path_5380" data-name="Path 5380"
                                            d="M12.068,349.763H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                            transform="translate(0 -340.108)" fill="#a1a1a1" />
                                        <path id="Path_5381" data-name="Path 5381"
                                            d="M12.068,204.7H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                            transform="translate(0 -199.067)" fill="#a1a1a1" />
                                        <path id="Path_5382" data-name="Path 5382"
                                            d="M12.068,59.634H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                            transform="translate(0 -58.025)" fill="#a1a1a1" />
                                    </svg>
                                    もくじ一覧
                                </div>
                                <div class="tag-title-inner">
                                    <div class="title">{!! $tag->title ?? '' !!}</div>
                                    <div class="title-en">{{ $tag->title_english ?? '' }}</div>
                                </div>
                                <ul class="tag-top-list">
                                    @if (isset($tag->news) && $tag->news->content)
                                        @foreach ($tag->news->content as $key => $content)
                                            <li>
                                                {{--                                            <a href="{{ route('tag.detail', [ $tag['id'], 'page' => $key + 1]) }}"> --}}
                                                <a href="#content-{{ $key + 1 }}">
                                                    {{ $content['title-japan'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="kc-slogan-bottom">
                                    <div class="slogan-wrap">
                                        <span class="star">
                                            <img src="{{ asset('frontend/assets/images/healthcare.svg') }}"
                                                alt="" />
                                        </span>
                                        <div class="slogan-text">
                                            <span class="text-1">病気<span>の</span>経過<span>と</span>終末期</span>
                                            <span class="text-en">Disease course and terminal stage.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @elseif(isset($moduleMitoriTaiken) && !isset($sloganMitori))
            <div class="slogan-mitori d-sp-none">
                <div class="slogan-wrap">
                    <div class="slogan-text">
                        <span class="text-1">私の看取り体験談</span>
                        <span class="text-en">Stories of each family</span>
                    </div>
                </div>
            </div>
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="text-ja">
                    <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    <span>家族で看取る<span>「穏やかな最期」</span></span>
                </div>
                <div class="text-en">Peaceful end-of-life care" with family members</div>
            </div>
            <div class="slogan-mitory-fixed d-pc-none d-tb-none">
                <div class="slogan-text">私の看取り体験談</div>
            </div>
        @elseif (isset($notification))
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="text-ja">
                    <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    <span>家族で看取る<span>「穏やかな最期」</span></span>
                </div>
                <div class="text-en">Peaceful end-of-life care" with family members</div>
            </div>
        @elseif(isset($sloganMitori))
            <div class="slogan-tag-details d-sp-none">
                <div class="slogan-wrap">
                    <span class="star">
                        <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    </span>
                    <div class="slogan-text">
                        <span class="text-1">家族が語る「それぞれの最期」</span>
                        <span class="text-en">Families talk about "their respective endingsmembers</span>
                    </div>
                    <span class="flower">
                        <img src="{{ asset('frontend/assets/images/mitori/flower.png') }}" alt="" />
                    </span>
                </div>
            </div>
            <!-- <div class="slogan-mitori d-sp-none">
                <div class="slogan-wrap">
                    <div class="slogan-text">
                        <span class="text-1">私の看取り体験談</span>
                        <span class="text-en">Stories of each family</span>
                    </div>
                </div>
            </div> -->
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="text-ja">
                    <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    <span>家族で看取る<span>「穏やかな最期」</span></span>
                </div>
                <div class="text-en">Peaceful end-of-life care" with family members</div>
            </div>
            <div class="slogan-mitory-fixed detail d-pc-none d-tb-none">
                <div class="slogan-text">私の看取り体験談</div>
                <div class="md-filter-wrap">
                    <button class="md-filter">
                        <span>もくじ一覧</span>
                        <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}" alt="" />
                        <img class="arrow-down-3" src="{{ asset('frontend/assets/images/arrow-down-3.svg') }}"
                            alt="" />
                    </button>
                    <div class="md-overlay"></div>
                    <div class="md-list-links">
                        @if (isset($familyNew->familyMember))
                            <div class="person-box">
                                <div class="avatar">
                                    @if (isset($familyNew->familyMember->avatar->path))
                                        <img src="{{ getImageThumb($familyNew->familyMember->avatar->path) }}"
                                            alt="" />
                                    @endif
                                </div>
                                <div class="info">
                                    <div class="name">{{ $familyNew->familyMember->name ?? '' }} <span
                                            class="ms">さん</span> <span class="sex">（女性）</span></div>
                                    <div class="meta">
                                        <span>{{ $familyNew->patient_relationship }}</span>
                                        <span>{{ $familyNew->familyMember->birthday }}歳</span>
                                        <span>{{ $familyNew->tag->title ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="list-icon-text">
                            <span>もくじ一覧</span>
                            <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}"
                                alt="" />
                        </div>
                        <ul class="md-link-items">
                            @if (isset($listContent) && $listContent)
                                @foreach ($listContent as $key => $content)
                                    <li>
                                        {{--                                        <a href="{{ route('mitori-taiken.detail', [ $familyNew['id'], 'page' => $key + 1]) }}"> --}}
                                        <a class="mitori-link" href="#content-{{ $key + 1 }}">
                                            <span>{{ $content['title-japan'] ?? '' }}</span>
                                            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="7"
                                                height="10.859" viewBox="0 0 7 10.859">
                                                <path id="path9429"
                                                    d="M2.8,291.965a.772.772,0,0,0-.508,1.368l4.726,4.049-4.726,4.047a.772.772,0,1,0,1,1.169l5.411-4.63a.772.772,0,0,0,0-1.175L3.294,292.16a.772.772,0,0,0-.495-.195Z"
                                                    transform="translate(-1.976 -291.965)" fill="#c1c1c1" />
                                            </svg>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="close-wrap">
                            <a href="#" class="close-md">
                                <img src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                                <span>閉じる</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (isset($posts))
            <div class="header-slogan d-sp-none">
                <div class="slogan-wrap">
                    <span class="star">
                        <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    </span>
                    <div class="slogan-text">
                        @if (isset($postsTopic))
                            <span class="text-1"><span>お役立ち</span>トピックス記事</span>
                        @else
                            <span class="text-1"><span>家族で看取る</span>「穏やかな最期」</span>
                        @endif
                        <span class="text-en">Peaceful end-of-life care" with family members</span>
                    </div>
                </div>
            </div>
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="slogan-wrap">
                    <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                    <div class="slogan-text">
                        <div class="text-ja"><span>お役立ち<span>トピックス記事</span></span></div>
                        <div class="text-en">Peaceful end-of-life care" with family members</div>
                    </div>
                </div>
            </div>
            <div class="header-sp-fixed d-pc-none d-tb-none">
                <span class="title">{{ $posts->title ?? '記事一覧' }}</span>
            </div>
        @elseif(isset($usefulDetail))
            <div class="header-slogan d-sp-none">
                <div class="slogan-wrap">
                    <span class="star">
                        <img src="{{ asset('frontend/assets/images/hand.png') }}" alt="" />
                    </span>
                    <div class="slogan-text">
                        <span class="text-1">生きる人々 ささえる人々</span>
                        <span class="text-en">People who live and support today.</span>
                    </div>
                </div>
            </div>
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="slogan-wrap">
                    <img src="{{ asset('frontend/assets/images/hand.png') }}" width="29px" alt="" />
                    <div class="slogan-text">
                        <div class="text-ja"><span>生きる人々 ささえる人々</span></div>
                        <div class="text-en">Peaceful end-of-life care" with family members</div>
                    </div>
                </div>
            </div>
            <div class="header-sp-fixed d-pc-none d-tb-none">
                <span class="title">{{ $result->title }}</span>
            </div>
        @elseif (isset($postsUseful))
            <div class="header-slogan d-sp-none">
                <div class="slogan-wrap">
                    <span class="star">
                        <img src="{{ asset('frontend/assets/images/hand.png') }}" alt="" />
                    </span>
                    <div class="slogan-text">
                        <span class="text-1">生きる人々 ささえる人々</span>
                        <span class="text-en">People who live and support today.</span>
                    </div>
                </div>
            </div>
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="slogan-wrap">
                    <img src="{{ asset('frontend/assets/images/hand.png') }}" width="29px" alt="" />
                    <div class="slogan-text">
                        <div class="text-ja"><span>生きる人々 ささえる人々</span></div>
                        <div class="text-en">Peaceful end-of-life care" with family members</div>
                    </div>
                </div>
            </div>
            <div class="header-sp-fixed d-pc-none d-tb-none">
                <span class="title">記事一覧</span>
            </div>
        @elseif(isset($moduleProduct))
            <div class="header-slogan d-sp-none">
                <div class="slogan-wrap">
                    <span class="star">
                        <img src="{{ asset('frontend/assets/images/cms4/flower.png') }}" alt="" />
                    </span>
                    <div class="slogan-text">
                        <span class="text-1">身体<span>や</span>こころ<span>を</span>楽に<span>してくれるもの</span></span>
                        <span class="text-en">Things that make you feel at ease in body and mind</span>
                    </div>
                </div>
            </div>
            <div class="header-slogin-sp d-pc-none d-tb-none">
                <div class="slogan-wrap">
                    <img src="{{ asset('frontend/assets/images/cms4/flower.png') }}" width="36px"
                        alt="" />
                    <div class="slogan-text">
                        <div class="text-ja">身体<span>や</span>こころ<span>を</span>楽に<span>してくれるもの</span></div>
                        <div class="text-en">Things that make you feel at ease in body and mind</div>
                    </div>
                </div>
            </div>
            <div class="header-sp-fixed header-slogin-sp d-pc-none d-tb-none">
                <div class="slogan-wrap">
                    <img src="{{ asset('frontend/assets/images/cms4/flower.png') }}" width="36px"
                        alt="" />
                    <div class="slogan-text">
                        <div class="text-ja">身体<span>や</span>こころ<span>を</span>楽に<span>してくれるもの</span></div>
                        <div class="text-en">Things that make you feel at ease in body and mind</div>
                    </div>
                </div>
            </div>
        @else
            <div class="slogan-top-page">
                <div class="slogan-wrap">
                    <div class="text-group">
                        <span class="star d-sp-none">
                            <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                        </span>
                        <span class="slogan-text-1">治療の継続が難しくなっても</span>
                        <span class="slogan-text-2">今日もより<br class="d-pc-none d-tb-none">良く生きる</span>
                    </div>
                    <span class="doctor-icon">
                        @include('homepage::svg.doctor-icon')
                    </span>
                </div>
                <div class="slogan-en">Don't worry. <br class="d-pc-none d-tb-none">We are always there for you.</div>
            </div>
        @endif
    </div>
</header>
