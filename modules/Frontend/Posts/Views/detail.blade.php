@extends('homepage::layout')
@section('content')
    <div class="relative tab-menu-container @if(count($listMenu['menu']->content) > 7) has-flick @endif">
        <div class="tab-menu-scroll">
            <div class="tab-menu">
                <ul class="tab-menu--list tab-nav d-pc-none">
                    @foreach ($listMenu['menu']->content as $key => $item)
                        @if (isset($listMenu['categories'][$item]))
                            @php
                                $route =  route('posts.category', $item);
                                if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                    $route =  route('tag.list', $item);
                                }
                            @endphp
                            <li class="{{ $category->id == $listMenu['categories'][$item]->id ? 'active' : '' }}" data-tab-id="menu-tab-{{$key + 1}}">
                                <a href="{{$route}}">{!! $listMenu['categories'][$item]->title !!}</a>
                                <span class="caret">
                                    <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}" alt="" />
                                    <span class="d-pc-none d-tb-none max-w-100">
                                        @include("homepage::svg.arrow-down-2")
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
                                $route =  route('posts.category', $item);
                                if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                    $route =  route('tag.list', $item);
                                }
                            @endphp
                                <div class="swiper-slide nav-item {{ $category->id == $listMenu['categories'][$item]->id ? 'active' : '' }}" data-tab-id="menu-tab-{{$key + 1}}">
                                    <a href="{{$route}}">{!! formatTextByCharNumAndLine($listMenu['categories'][$item]->title, null, 8, 2, true) ?? '' !!}</a>
                                    <span class="caret">
                                        <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}" alt="" />
                                        <span class="d-pc-none d-tb-none max-w-100">
                                            @include("homepage::svg.arrow-down-2")
                                        </span>
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="https://lifestar.co.jp/about.php" class="tab-menu--about-button d-tb-none d-sp-none">
                <span class="text-ja">私たちについて   ></span>
                <span class="text-en">About us, our company</span>
            </a>
        </div>
    </div>

    <div class="main-content-wrap cms1-detail-content is-detail">
        <div class="main-content-left">
            <div class="box-content">
                <div class="bc-with-date">
                    <div class="mitori-breadcrumb">
                        <a href="#">{!! formatTextByCharNumAndLine($category->title, null, 21, null, false) ?? '' !!}</a> <span class="divi">/</span>
                        <span class="current">{!! formatTextByCharNumAndLine($category->title, null, 21, null, false) ?? '' !!}カテゴリ一覧</span>
                    </div>
                    <div class="meta-date">
                        {{ handleDayMonthFomart($posts->updated_at) }}
                        ({{ getDayOffWeek($posts->updated_at) }})
                        {{ handleHourFomart($posts->updated_at) }}更新
                    </div>
                </div>

                <div class="entry-content">
                    <h1 class="cms1-detail-title">{{ $posts->title ?? '' }}</h1>
                    <div class="cms1-detail-title-en">{{ $posts->title_english ?? '' }}</div>
                    @if ($posts->creator)
                        <div class="nurse-box in-detail">
                            <div class="nurse-header">
                                @if(isset($posts->creator->avatar->path))
                                    <div class="avatar">
                                        <img src="{{ getLink('media'. '/' . $posts->creator->avatar->path) }}" alt="">
                                    </div>

                                @endif
                                <div class="info">
                                    <div class="name">{{ $posts->creator->name ?? '' }}</div>
                                    <div class="job">{{ $posts->creator->summary ?? '' }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach($data as $key => $value)
                        {!! $value !!}
                    @endforeach
                </div>

                <div class="cms1-author">{{ $posts->creator ? $posts->creator->name : '' }}　＝ 文</div>

                {{ $data ? $data->withQueryString()->links('pagination::default') : '' }}

                <div class="cms1-related">
                    <h2 class="related-title">【あわせて読みたい記事】</h2>
                    <div class="cms1-list-news">
                        @foreach($listPostsRelated as $key => $item)
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="{{ route('posts.detail', [ $item->id, 'category' => $category->id]) }}">
                            <div class="thumb">
                                <img src="{{ getLink('media'. '/' . $item->avatar->path) }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">{{ $item->title ?? '' }}</h3>
                                <div class="meta">
                                    @if ($item->creator)
                                        <span class="author">{{ $item->creator->name ?? '' }}</span>
                                    @endif
                                    <span class="post-date">
                                        {{ handleDayMonthFomart($item->created_at) }}
                                        ({{ getDayOffWeek($item->created_at) }})
                                        {{ handleHourFomart($item->created_at) }}
                                    </span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                        @endforeach
                    </div>
                </div>

                <div class="view-all-with-share">
                    <div class="view-all d-sp-none" style="width: 100%">
                        <a href="{{ route('posts.category', $category->id) }}">{!! formatTextByCharNumAndLine($category->title, null, 42, null, false)  ?? ''  !!} 記事の一覧を見る <img src="{{ asset('frontend/assets/images/ex-icon-2.svg') }}" alt="" /></a>
                    </div>
{{--                    <div class="share">--}}
{{--                        <a href="#" target="_blank"><img width="25px" height="25px" src="{{ asset('frontend/assets/images/tw-icon.svg') }}" alt="" /></a>--}}
{{--                        <a href="#" target="_blank"><img width="25px" height="25px" src="{{ asset('frontend/assets/images/fb-icon.svg') }}" alt="" /></a>--}}
{{--                    </div>--}}
                </div>

            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('homepage::sidebar.testimonials_box')
            <!-- Temporary support for "useful news" by a.u 2024.07.14  line:148 style="display:none;"-->
            <div class="sidebar--area">
            <?php //<div class="sidebar--area" style="display:none;"> ?>
                @if ($listUseful)
                    @include('homepage::partials.news_widget_item')
                @endif
            </div>

{{--            @include('homepage::sidebar.second_opinion')--}}

            @include('homepage::sidebar.product')

        </div>
        <!-- End Sidebar -->
    </div>
@endsection
@push('style')
    <style>
        .cms1-detail-content .entry-content p {
            line-break: anywhere;
        }
        .tab-menu-scroll {
            box-shadow: none;
        }
    </style>
@endpush
