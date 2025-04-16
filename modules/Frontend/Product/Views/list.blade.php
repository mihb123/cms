<?php //@extends('homepage::layout')  //edited by a.u 2024.09.21 ?>
@extends('homepage::layout_noindex')
@section('content')
    <div class="container">
        <div class="main-content-wrap">
            <div class="main-content-left">
                <div class="cms4-list-title">
                    <span class="text-jp">{{ $category->title ?? '新着順' }}</span>
                    <span class="text-en">Things that make you feel at ease in body and mind</span>
                </div>

                <div class="bc-with-date">
                    <div class="mitori-breadcrumb">
                        <a href="#">定番のカテゴリ</a> <span class="divi">/</span>
                        <span class="current">{{ $category->title ?? '新着順' }}</span>
                    </div>
                    @if (isset($category) && $category)
                        <div class="meta-date">
                            {{ handleDayMonthFomart($category->updated_at) }}
                            ({{ getDayOffWeek($category->updated_at) }})
                            {{ handleHourFomart($category->updated_at) }}
                            更新
                        </div>
                    @endif
                </div>
                <h1 class="list-title">【{{ $category->title ?? '新着順' }} 一覧】</h1>

                <h2 class="mitori-title">
                    @if (isset($category) && $category)
                        <span>{{ $category->title ?? '' }}</span>
                        <img src="{{ $category->avatar ? getLink('media' . '/' . $category->avatar->path) : '' }}"
                            alt="" style="width: 25px" />
                    @else
                        <span>新着順</span>
                        <img src="{{ asset('frontend/assets/images/mitori/new-icon.png') }}">
                    @endif
                </h2>

                <div class="kc-filter">
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
                                    <div class="title-inner">キーワード</div>
                                    <div class="filter-inner-body">
                                        <div class="mitori-list-filter product-filter">
                                            <div class="filter-item-wrap has-dropdown">
                                                <div class="filter-item-dropdown">
                                                    @foreach ($category->keyWords as $categoryKeywords)
                                                        @if ($categoryKeywords->keyWords)
                                                            <a href="{{ isset($param['type']) ? route('product.list', ['category' => $item->title, 'type' => $param['type']]) : route('product.list', ['category' => $category->title, 'keyWord' => $categoryKeywords->keyWords->title_user]) }}"
                                                                class="dropdown-item">{{ $categoryKeywords->keyWords->title_user ?? '' }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cms4-list-products">
                    @foreach ($data as $key => $item)
                        <!-- cms4 product item -->
                        <a class="cms4-product-item"
                            href="{{ $item->url ? $item->url : route('product.detail', $item->id) }}">
                            <div class="thumb">
                                <img src="{{ $item->avatar ? getLink('media' . '/' . $item->avatar->path) : '' }}"
                                    alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">
                                    {{ $item->title ?? '' }}
                                </h3>
                                @if (isset($item->FactoryProduct) && isset($item->FactoryProduct->factory))
                                    <div class="cat">{{ $item->FactoryProduct->factory->title }}</div>
                                @endif
                            </div>
                            <span class="arrow-right"><img src="{{ asset('frontend/assets/images/arrow-right.svg') }}"
                                    alt="" /></span>
                        </a>
                        <!-- end cms4 product item -->
                    @endforeach
                </div>

                {{ $data->withQueryString()->links('pagination::default') }}

                @if (!empty($data) && $data->count() >= 15)
                    <div class="backtop-backpage">
                        <a href="#" class="back-to-top">
                            <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt="" />
                            <span>ページの先頭へ戻る</span>
                        </a>
                        <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                            <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt="" />
                            <span>前のページへもどる</span>
                        </a>
                    </div>
                @endif
                @if ($category->destinationGuide)
                    <a class="cta-product" href="{{ $category->destinationGuide->url ?? '' }}">
                        <span class="pr d-pc-none d-tb-none">ーPRー</span>
                        <div class="thumb">
                            <img src="{{ $category->destinationGuide->avatar ? getLink('media' . '/' . $category->destinationGuide->avatar->path) : '' }}"
                                alt="" />
                        </div>
                        <div class="caption">
                            <div class="title">{{ $category->destinationGuide->title ?? '' }}</div>
                            <div class="location">{!! $category->destinationGuide->description ?? '' !!}</div>
                        </div>
                        <span class="arrow d-pc-none d-tb-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                viewBox="0 0 6.935 10.758">
                                <path id="path9429"
                                    d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                    transform="translate(-1.976 -291.965)" fill="#fff"></path>
                            </svg>
                        </span>
                    </a>
                @endif
                <div class="cms4-features-articles">
                    <h2 class="fa-title-1">特集・記事</h2>
                    @include($module . '::partials.section_features_articles')
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
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
@endsection
