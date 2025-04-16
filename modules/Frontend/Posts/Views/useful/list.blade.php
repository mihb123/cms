@extends('homepage::layout')
@section('content')
    <div class="main-content-wrap cms12-detail-content">
        <div class="main-content-left">
            <div class="box-content">
                <h1 class="list-title">【記事一覧】<span class="value d-sp-none">：{{ $nameCategory ?: '新着順' }}</span></h1>
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
                                            <a class="mitori-filter-item" href="{{ route('posts-useful.list') }}">
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

                                            @foreach ($listCategory as $key => $category)
                                                <a class="mitori-filter-item"
                                                    href="{{ route('posts-useful.list', ['category' => $category->title]) }}">
                                                    <div class="mitori-title">
                                                        <span>{{ $category->title ?? '' }}</span>
                                                        <img src="{{ $category->avatar ? getLink('media' . '/' . $category->avatar->path) : '' }}"
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

                @if ($listPost)
                    <div class="cms1-list-news">
                        <!-- cms1 item -->
                        @foreach ($listPost as $key => $post)
                            <a class="cms1-news-item" href="{{ route('posts-useful.detail', $post->id) }}">
                                <div class="thumb">
                                    <img src="{{ getImageThumb($post->avatar->path) }}" alt="" />
                                </div>
                                <div class="caption">
                                    <h3 class="title">{{ $post->title ?? '' }}</h3>
                                    <div class="meta">
                                        <span class="author">{{ $post->creator->name ?? '' }}</span>
                                        <?php
                                        /*  //「お役立ち記事」で表示する日付を「作成日時」から管理画面上のソート用「更新日時」に変更 (@ edited by a.u  2024.11.06) 
                                        <span
                                            class="post-date">{{ handleDayMonthFomart($post->created_at) }}({{ getDayOffWeek($post->created_at) }})
                                            {{ handleHourFomart($post->created_at) }}</span>
                                         */ ?>
                                        <span
                                            class="post-date">{{ handleDayMonthFomart($post->sort) }}({{ getDayOffWeek($post->sort) }})
                                            {{ handleHourFomart($post->sort) }}</span>
                                    </div>
                                </div>
                                <span class="arrow">></span>
                            </a>
                        @endforeach
                        <!-- end cms1 item -->
                    </div>
                    {{ $listPost->withQueryString()->links('pagination::default') }}
                @endif
                {{-- @if ($listPostsRelated) --}}
                {{--                    <div class="cms12-recommend"> --}}
                {{--                        <h2 class="title">【あわせて読みたい記事】</h2> --}}
                {{--                        @foreach ($listPostsRelated as $key => $post) --}}
                {{--                            <a class="cms1-news-item" href="{{ route('posts-useful.detail', $post->id) }}"> --}}
                {{--                                <div class="thumb"> --}}
                {{--                                    <img src="{{ $post->avatar ? getLink('media'. '/' . $post->avatar->path) : ''  }}" alt="" /> --}}
                {{--                                </div> --}}
                {{--                                <div class="caption"> --}}
                {{--                                    <h3 class="title">{{ $post->title ?? '' }}</h3> --}}
                {{--                                    <div class="meta"> --}}
                {{--                                        <span class="author">{{ $post->creator->name ?? '' }}</span> --}}
                {{--                                        <span class="post-date">{{ handleDayMonthFomart($post->created_at) }}({{ getDayOffWeek($post->created_at) }}) {{ handleHourFomart($post->created_at) }}</span> --}}
                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                                <span class="arrow">></span> --}}
                {{--                            </a> --}}
                {{--                        @endforeach --}}
                {{--                    </div> --}}
                {{-- @endif --}}
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('homepage::sidebar.area')
            @include('homepage::sidebar.testimonials_box')

            <div class="sidebar--area">
                @if ($listUseful)
                    @include('homepage::partials.news_widget_item')
                @endif
            </div>
            {{--            @include('homepage::sidebar.second_opinion') --}}
            <div class="widget top-product">
                <div class="widget--header">
                    <h3 class="title">身体<span>や</span>心<span>を</span>楽にしてくれるもの</h3>
                </div>
                <div class="widget--body">
                    <div class="useful-topics-articles">
                        <h3 class="title">
                            <span class="text-jp">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="28" height="24.25" viewBox="0 0 28 24.25">
                                    <defs>
                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                            gradientUnits="objectBoundingBox">
                                            <stop offset="0" stop-color="#f3b9c6" />
                                            <stop offset="1" stop-color="#feb2c2" />
                                        </linearGradient>
                                        <filter id="Polygon_25" x="0" y="0" width="28" height="24.25"
                                            filterUnits="userSpaceOnUse">
                                            <feOffset dy="3" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="3" result="blur" />
                                            <feFlood flood-opacity="0.161" />
                                            <feComposite operator="in" in2="blur" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Polygon_25)">
                                        <path id="Polygon_25-2" data-name="Polygon 25" d="M5,0l5,6.25H0Z"
                                            transform="translate(19 12.25) rotate(180)" fill="url(#linear-gradient)" />
                                    </g>
                                </svg>
                                <span>お役立ちトピックス記事</span>
                            </span>
                            <span class="text-en">Useful Topics Articles</span>
                        </h3>
                        <div class="list-useful-topics">
                            @foreach ($listTopic as $key => $topic)
                                <a class="useful-topics-item" href="{{ route('posts-topic.detail', $topic->id) }}">
                                    <div class="thumb">
                                        <img src="{{ isset($topic->avatar) && $topic->avatar ? getLink('media' . '/' . $topic->avatar->path) : '' }}"
                                            alt="" />
                                    </div>
                                    <div class="title">
                                        {{ $topic->title ?? '' }}
                                    </div>
                                    <img class="external-icon"
                                        src="{{ asset('frontend/assets/images/external-icon-3.svg') }}" alt="" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
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
