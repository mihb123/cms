@extends('homepage::layout')

@section('content')
    <h1 class="blog-title">News Release</h1>
    <div class="main-content-wrap">
        <div class="main-content-left blog-left">
            <div class="blog-box">
                <div class="blog-header">
                    <div class="year-filter">
                        <span class="current"><span class="big">{{ $currentYear }}</span>年 <img class="arrow-down" src="{{ asset('frontend/assets/images/arrow-down.svg') }}" alt=""></span>
                        <ul class="year-dropdown">
                            @for($i = 0; $i <= 10; $i++)
                                @php $year = date('Y')-$i; @endphp
                                @if(2024 <= $year)
                                <li><a href="{{route('notification.index', ['year' => $year])}}">{{ date('Y')-$i }}年</a></li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div class="blog-header--title">お知らせ一覧</div>
                </div>

                <div class="blog-list">
                    @forelse ($listNoticeYear as $key => $notice)
                        <a class="blog-item" href="{{ route('notification.detail', $notice->id)}}">
                           <?php //<time class="entry-pub" datetime="{{ handleDateFormat($notice->created_at) }}">{{ handleDateFormat($notice->created_at) }}</time> //「お知らせ」の投稿を「更新日時」の降順で表示変更 (@ edited by a.u  2024.11.01)  ?>
                            <time class="entry-pub" datetime="{{ handleDateFormat($notice->sort) }}">{{ handleDateFormat($notice->sort) }}</time>
                            <span class="entry-cat"><span class="entry-cat-inner" style ="{{ $notice->noticeCategory->color ? 'background:'.$notice->noticeCategory->color : '' }}">{{ $notice->noticeCategory->title ?? '' }}</span></span>
                            <span class="entry-ttl">{{ $notice->title }}</span>
                        </a>
                    @empty
                        該当するデータがありません。
                    @endforelse
                </div>
                {{ $listNoticeYear->withQueryString()->links('pagination::default') }}
            </div>
        </div>
        <div class="sidebar blog">
            <div class="widget--years">
                <h3 class="widget-title">過去のお知らせ <span class="text-en">Past notifications</span></h3>
                <ul class="list-years">
                    @for($i = 0; $i <= 10; $i++)
                        @php $year = date('Y')-$i; @endphp
                        @if(2024 <= $year)
                        <li class=""><a href="{{route('notification.index', ['year' => date('Y') - $i ])}}">{{ date('Y')-$i}}<span>年</span></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
