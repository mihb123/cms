@extends('homepage::layout')
@section('content')
<div class="main-content-wrap cms12-detail-content is-detail">
    <div class="main-content-left">
        <div class="box-content">

            <div class="entry-content">
                <h1 class="cms1-detail-title">{{ $posts->title ?? '' }}</h1>

                <div class="meta">
                    <div class="date">
                        {{ handleDayMonthFomart($posts->updated_at) }}
                        ({{ getDayOffWeek($posts->updated_at) }})
                        {{ handleHourFomart($posts->updated_at) }}更新
                    </div>
                    <div class="company-logo">
                        @if(isset($posts->icon->path))
                            <img src="{{ getLink('media'. '/' . $posts->icon->path) }}" alt="">
                        @endif
                    </div>
                </div>
                @foreach($data as $key => $value)
                    {!! $value !!}
                @endforeach
            </div>

            <div class="cms1-author">{{ $posts->creator ? $posts->creator->name : '' }}　＝ 文</div>
            {{ $data ? $data->withQueryString()->links('pagination::default') : '' }}
            @if ($listPostsRelated)
                <div class="cms12-recommend">
                    <h2 class="title">【あわせて読みたい記事】</h2>
                    @foreach($listPostsRelated as $key => $post)
                        <a class="cms1-news-item" href="{{ route('posts-topic.detail', $post->id) }}">
                            <div class="thumb">
                                <img src="{{ $post->avatar ? getLink('media'. '/' . $post->avatar->path) : ''}}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">{{ $post->title ?? '' }}</h3>
                                <div class="meta">
                                    <span class="author">{{ $post->creator->name ?? '' }}</span>
                                    <span class="post-date">{{ handleDayMonthFomart($post->created_at) }}({{ getDayOffWeek($post->created_at) }}) {{ handleHourFomart($post->created_at) }}</span>
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
        <!-- Temporary support for "useful news" by a.u 2024.07.14  line:63 style="display:none;"-->
        <div class="sidebar--area">
        <?php //<div class="sidebar--area" style="display:none;"> ?>
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
