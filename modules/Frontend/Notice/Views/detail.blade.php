@extends('homepage::layout')

@section('content')

<h2 class="blog-title">詳細</h2>
<div class="main-content-wrap">
    <div class="main-content-left blog-left">
        <div class="blog-box blog-details">
            <div class="blog-header d-pc-none d-tb-none">
                <div class="blog-header--title">通知内容</div>
            </div>

            <div class="blog-content">
                <div class="meta">
                    <span class="entry-cat"><span class="entry-cat-inner" style="{{ $notice->noticeCategory->color ? 'background:'.$notice->noticeCategory->color : '' }}">{{ $notice->noticeCategory->title ?? '' }}</span></span>
                </div>
                <h1 class="blog-detail-title">{{ $notice->title ?? '' }}</h1>
                <?php //<time class="entry-pub" datetime="{{ handleDateFormat($notice->created_at) }}">{{ handleDateFormat($notice->created_at) }}</time> //「お知らせ」の投稿を「更新日時」の降順で表示変更 (@ edited by a.u  2024.11.01)  ?>
                <time class="entry-pub" datetime="{{ handleDateFormat($notice->sort) }}">{{ handleDateFormat($notice->sort) }}</time>
                <div class="blog-content-box">
                    {!! $notice->content !!}
                </div>
                <div class="back-blog-list">
                    <a href="{{ route('notification.index') }}"><img src="{{ asset('frontend/assets/images/backpage.png') }}" alt="" /> <span>お知らせ一覧へ戻る</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar blog">
        <div class="widget--years">
            <h3 class="widget-title">過去のお知らせ <span class="text-en">Past notifications</span></h3>
            <ul class="list-years">
                @for($i = 0; $i <= 10; $i++)
                @php $year = date('Y')-$i; @endphp
                    @if(2024 <= $year)
                        <li class="{{ $i!=0 ? '' : 'active' }}"><a href="{{route('notification.index', ['year' => date('Y') - $i])}}">{{ date('Y')-$i}}<span>年</span></a></li>
                    @endif
                @endfor
            </ul>
        </div>
    </div>
</div>

@endsection
