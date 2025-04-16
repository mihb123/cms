@extends('homepage::layout')
@section('content')
<div class="main-content-wrap cms12-detail-content is-detail">
    <div class="main-content-left">
        <div class="box-content">

            <div class="entry-content">
                <h1 class="cms1-detail-title">{{ $result->title ?? '' }}</h1>

                <div class="meta">
                    <div class="date">
                    <?php 
                         /*  //「お役立ち記事」で表示する日付を「作成日時」から管理画面上のソート用「更新日時」に変更 (@ edited by a.u  2024.11.06) 
                        {{ handleDayMonthFomart($result->updated_at) }}
                        ({{ getDayOffWeek($result->updated_at) }})
                        {{ handleHourFomart($result->updated_at) }}更新
                        */
                     ?>
                         {{ handleDayMonthFomart($result->sort) }}
                        ({{ getDayOffWeek($result->sort) }})
                        {{ handleHourFomart($result->sort) }}更新                    
                    </div>
                    <div class="company-logo">
                        @if(isset($result->icon->path))
                            <a href="{{ $result->url }}"><img src="{{ getLink('media'. '/' . $result->icon->path) }}" alt=""></a>
                        @endif
                    </div>
                </div>
                @foreach($data as $key => $value)
                    {!! $value !!}
                @endforeach

            </div>

            <div class="cms1-author">{{ $result->creator ? $result->creator->name : '' }}　＝ 文</div>
            {{ $data ? $data->withQueryString()->links('pagination::default') : '' }}
            @if ($listPostsRelated)
                <div class="cms12-recommend" style="background-color: #FFF; margin-bottom: 20px">
                    <h2 class="title">【あわせて読みたい記事】</h2>
                    @foreach($listPostsRelated as $key => $post)
                        <a class="cms1-news-item" href="{{ route('posts-useful.detail', $post->id) }}">
                            <div class="thumb">
                                <img src="{{ $post->avatar ? getLink('media'. '/' . $post->avatar->path) : ''}}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">{{ $post->title ?? '' }}</h3>
                                <div class="meta">
                                    <span class="author">{{ $post->creator->name ?? '' }}</span>
                                    <?php  //「お役立ち記事」で表示する日付を「作成日時」から管理画面上のソート用「更新日時」に変更 (@ edited by a.u  2024.11.06) 
                                    //<span class="post-date">{{ handleDayMonthFomart($post->created_at) }}({{ getDayOffWeek($post->created_at) }}) {{ handleHourFomart($post->created_at) }}</span>
                                    ?>
                                    <span class="post-date">{{ handleDayMonthFomart($post->sort) }}({{ getDayOffWeek($post->sort) }}) {{ handleHourFomart($post->sort) }}</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                    @endforeach
                </div>
            @endif

{{--            <div class="cms12-share">--}}
{{--                <a href="#" target="_blank"><img width="25px" height="25px" src="{{ asset('frontend/assets/images/tw-icon.svg') }}" alt="" /></a>--}}
{{--                <a href="#" target="_blank"><img width="25px" height="25px" src="{{ asset('frontend/assets/images/fb-icon.svg') }}" alt="" /></a>--}}
{{--            </div>--}}

        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('homepage::sidebar.testimonials_box')
        <div class="sidebar--area">
            @if ($listUseful)
                @include('homepage::partials.news_widget_item')
            @endif
        </div>
{{--        @include('homepage::sidebar.second_opinion')--}}
        @include('homepage::sidebar.product')
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
