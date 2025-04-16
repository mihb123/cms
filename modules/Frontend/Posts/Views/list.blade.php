@extends('homepage::layout')
@section('content')
    <div class="relative tab-menu-container @if (count($listMenu['menu']->content) > 7) has-flick @endif">
        <div class="tab-menu-scroll">
            <div class="tab-menu">
                <ul class="tab-menu--list tab-nav d-pc-none">
                    @foreach ($listMenu['menu']->content as $key => $item)
                        @if (isset($listMenu['categories'][$item]))
                            @php
                                $route = route('posts.category', $item);
                                if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                    $route = route('tag.list', $item);
                                }
                            @endphp
                            <li class="{{ $category->id == $listMenu['categories'][$item]->id ? 'active' : '' }}"
                                data-tab-id="menu-tab-{{ $key + 1 }}">
                                <a href="{{ $route }}">{!! $listMenu['categories'][$item]->title !!}</a>
                                <span class="caret">
                                    <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}"
                                        alt="" />
                                    <span class="d-pc-none d-tb-none max-w-100">
                                        @include('homepage::svg.arrow-down-2')
                                    </span>
                                </span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="swiper menu-tab-slider tab-menu--list tab-nav d-tb-none d-sp-none">
                    <div class="swiper-wrapper">
                        @foreach ($listMenu['menu']->content as $key => $item)
                            @if (isset($listMenu['categories'][$item]))
                                @php
                                    $route = route('posts.category', $item);
                                    if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                        $route = route('tag.list', $item);
                                    }
                                @endphp
                                <div class="swiper-slide nav-item {{ $category->id == $listMenu['categories'][$item]->id ? 'active' : '' }}"
                                    data-tab-id="menu-tab-{{ $key + 1 }}">
                                    <a href="{{ $route }}">{!! formatTextByCharNumAndLine($listMenu['categories'][$item]->title,15,8,2,true) !!}</a>
                                    <span class="caret">
                                        <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}"
                                            alt="" />
                                        <span class="d-pc-none d-tb-none max-w-100">
                                            @include('homepage::svg.arrow-down-2')
                                        </span>
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="https://lifestar.co.jp/about.php" class="tab-menu--about-button d-tb-none d-sp-none">
                <span class="text-ja">私たちについて ></span>
                <span class="text-en">About us, our company</span>
            </a>
        </div>
    </div>
    <div class="main-content-wrap cms1-detail-content">
        <div class="main-content-left">
            <div class="box-content">
                <div class="bc-with-date">
                    <div class="mitori-breadcrumb">
                        <a href="#">{!! formatTextByCharNumAndLine($category->title, null, 21, null, false) ?? ''!!}</a> <span class="divi">/</span>
                        <span class="current">{!! formatTextByCharNumAndLine($category->title, null, 21, null, false) ?? ''!!}カテゴリ一覧</span>
                    </div>
                    @if ($postSoft)
                        <div class="meta-date">
                            {{ handleDayMonthFomart($postSoft->updated_at) }}
                            ({{ getDayOffWeek($postSoft->updated_at) }})
                            {{ handleHourFomart($postSoft->updated_at) }}更新
                        </div>
                    @endif
                </div>
                <h1 class="list-title">【記事の一覧】<span class="value d-sp-none">：{{ $group->title_japan ?? '新着順' }}</span></h1>

{{--//非表示化 (@ edited by a.u  2024.8.02) start 
                <div class="kc-filter d-sp-none">
                    <div class="filter-button">
                        <button class="js-filter">
                            他の条件で絞り込む
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" viewBox="0 0 10 7">
                                <path id="Path_2932" data-name="Path 2932" d="M5,0l5,7H0Z"
                                    transform="translate(10 7) rotate(180)" fill="#333" />
                            </svg>
                        </button>
                        <div class="filter-wrap">
                            <div class="header">
                                <div class="title">絞り込み</div>
                                <button class="close-filter">閉じる</button>
                            </div>
                            <div class="filter-body">
                                <div class="filter-inter-wrap">
                                    <div class="title-inner">カテゴリ</div>
                                    <div class="filter-inner-body">
                                        <div class="mitori-list-filter">
                                            <a class="mitori-filter-item"
                                                href="{{ route('posts.category', $category->id) }}">
                                                <div class="mitori-title">
                                                    <span>新着順</span>
                                                    <img src="{{ asset('frontend/assets/images/mitori/new-icon.png') }}"
                                                        alt="" />
                                                </div>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    height="15.513" viewBox="0 0 10 15.513">
                                                    <path id="path9429"
                                                        d="M3.152,291.965a1.1,1.1,0,0,0-.726,1.954L9.177,299.7l-6.752,5.782a1.1,1.1,0,1,0,1.433,1.67l7.73-6.614a1.1,1.1,0,0,0,0-1.679l-7.73-6.62a1.1,1.1,0,0,0-.707-.278Z"
                                                        transform="translate(-1.976 -291.965)" fill="#f8aabb" />
                                                </svg>
                                            </a>
                                            @foreach ($listGroup as $key => $group)
                                                <a class="mitori-filter-item"
                                                    href="{{ route('posts.group', [$group->id, 'category' => $category->id]) }}">
                                                    <div class="mitori-title">
                                                        <span>{{ $group->title_japan ?? '' }}</span>
                                                        <img src="{{ $group->avatar ? getLink('media' . '/' . $group->avatar->path) : '' }}"
                                                            alt="" />
                                                    </div>
                                                    <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                                        width="10" height="15.513" viewBox="0 0 10 15.513">
                                                        <path id="path9429"
                                                            d="M3.152,291.965a1.1,1.1,0,0,0-.726,1.954L9.177,299.7l-6.752,5.782a1.1,1.1,0,1,0,1.433,1.67l7.73-6.614a1.1,1.1,0,0,0,0-1.679l-7.73-6.62a1.1,1.1,0,0,0-.707-.278Z"
                                                            transform="translate(-1.976 -291.965)" fill="#f8aabb" />
                                                    </svg>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
//非表示化 (@ edited by a.u  2024.8.02) end --}}
                
                @if (!empty($listPost))
                    <div class="cms1-list-news">
                        <!-- cms1 item -->
                        @foreach ($listPost as $key => $post)
                        @if ($post->status=='1')
                            <a class="cms1-news-item"
                                href="{{ route('posts.detail', [$post->id, 'category' => $category->id]) }}">
                                <div class="thumb">
                                    <img src="{{ getLink('media' . '/' . $post->avatar->path) ?? '' }}" alt="" />
                                </div>
                                <div class="caption">
                                    <h3 class="title">{{ $post->title ?? '' }}</h3>
                                    <div class="meta">
                                        {{-- <span class="author">{{ $post->creator->name ?? '' }}</span> --}}
                                        <span class="author">{{ $post->article_type ?? '' }}</span>
                                        <span class="post-date">
                                            {{ handleDayMonthFomart($post->updated_at) }}({{ getDayOffWeek($post->updated_at) }})
                                            {{ handleHourFomart($post->updated_at) }}</span>
                                    </div>
                                </div>
                                <span class="arrow">></span>
                            </a>
                        @endif
                        @endforeach
                        <!-- end cms1 item -->
                    </div>
                    {{ $listPost->withQueryString()->links('pagination::default') }}

                    <div class="backtop-backpage center d-sp-none">
                        @if (count($listPost) > 9)
                            <a href="#" class="back-to-top">
                                <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt="" />
                                <span>ページの先頭へ戻る</span>
                            </a>
                        @endif
                        <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                            <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt="" />
                            <span>前のページへもどる</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('homepage::sidebar.testimonials_box')
        <!-- Temporary support for "useful news" by a.u 2024.07.20  line:185 style="display:none;"-->
            <div class="sidebar--area">
            <?php //<div class="sidebar--area" style="display:none;"> ?>
                @if ($listUseful)
                    @include('homepage::partials.news_widget_item')
                @endif
            </div>
        </div>
        <!-- End Sidebar -->
    </div>
@endsection
@push('style')
    <style>
        .tab-menu-scroll {
            box-shadow: none;
        }
    </style>
@endpush
