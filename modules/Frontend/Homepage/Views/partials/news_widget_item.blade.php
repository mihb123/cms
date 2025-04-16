
 <!-- Temporary support for "useful news" by a.u 2024.07.10  line:3 style="display:none;"-->
<?php //<div class="news-widget widget" style="display: none;"> ?>
<div class="news-widget widget">
    <div class="widget--header">
        <h3 class="title">お役立ち<span>記事</span></h3>
        <div class="sub-title">（参考記事と動画）</div>
        @if(!empty($is_sp))
            <span class="text-en d-tb-none in-center ">Useful Articles</span>
        @endif
    </div>
    <div class="widget--body">
        <div class="news-header">
            <div class="icon">
                @if(!empty($is_sp))
                    <img src="{{ asset('frontend/assets/images/news-icon-sp.svg') }}" alt="" />
                @else
                    <img src="{{ asset('frontend/assets/images/news-icon.png') }}" alt="" />
                @endif
            </div>
            <div class="caption">
                <div class="title">生きる人々 ささえる人々</div>
                <div class="title-en">People who live and support today</div>
            </div>
        </div>
        <div class="news-desc">
            人生の最晩年期を生きる人々とその人生を支える人々には、様々な物語や出来事があります。
            ご家族やご本人に役立つ記事をお届けしてまいります。
        </div>
        <div class="list-news-widget">
            @foreach ($listUseful as $key => $useful)
                <div class="widget-news-item">
                    <div class="thumb">
                        <a href="{{ route('posts-useful.detail', $useful->id) }}">
                            <img src="{{ isset($useful->avatar) && $useful->avatar ? getImageThumb($useful->avatar->path) : '' }}" alt="" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4 class="title">
                            <a href="{{ route('posts-useful.detail', $useful->id) }}">{{ $useful->title ?? '' }}</a>
                        </h4>
                        <div class="meta">
                            @if($useful->creator)
                                <span class="author">{{$useful->creator->name ?? '' }}</span>
                            @endif
                           <?php /*  //「お役立ち記事」で表示する日付を「作成日時」から管理画面上のソート用「更新日時」に変更 (@ edited by a.u  2024.11.06) 
                            <span class="post-date">{{ handleDayMonthFomart($useful->created_at) }}({{ getDayOffWeek($useful->created_at) }}) {{ handleHourFomart($useful->created_at) }}</span>
                            */ ?>
                            <span class="post-date">{{ handleDayMonthFomart($useful->sort) }}({{ getDayOffWeek($useful->sort) }}) {{ handleHourFomart($useful->sort) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="news-view-more">
            <a href="{{ route('posts-useful.list') }}">
                <span>もっと記事を見る</span>
                <svg class="icon-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="18.998" viewBox="0 0 17 18.998">
                    <defs>
                        <filter id="Path_3863" x="0" y="0" width="17" height="18.998" filterUnits="userSpaceOnUse">
                            <feOffset dy="1" input="SourceAlpha"></feOffset>
                            <feGaussianBlur stdDeviation="1" result="blur"></feGaussianBlur>
                            <feFlood flood-opacity="0.051"></feFlood>
                            <feComposite operator="in" in2="blur"></feComposite>
                            <feComposite in="SourceGraphic"></feComposite>
                        </filter>
                    </defs>
                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_3863)">
                        <path id="Path_3863-2" data-name="Path 3863" d="M21.379,2.094C21.046,1.931,21.24,2.033,16,2a1.1,1.1,0,0,0-1,1.182,1.1,1.1,0,0,0,1,1.182h2.585l-7.29,8.616a1.338,1.338,0,0,0,0,1.671.9.9,0,0,0,1.414,0L20,6.035V9.09a1.014,1.014,0,1,0,2,0c-.026-6.224.061-5.967-.077-6.358a1.107,1.107,0,0,0-.542-.638Z" transform="translate(-8 0)" fill="#1d3994"></path>
                    </g>
                </svg>
            </a>
        </div>
    </div>
</div>
