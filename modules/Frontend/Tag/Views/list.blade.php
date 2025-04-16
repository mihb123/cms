@extends('homepage::layout')
@section('content')
    <div class="container">
        <div class="main-content-wrap">
            <div class="main-content-left cms2-list">
                <div class="bc-with-date d-pc-none d-tb-none" >
                    <div class="mitori-breadcrumb">
                        <a href="/">TOP </a> <span class="divi">/</span>
{{--                        <span class="current">{{ $category->title ?? '' }}カテゴリ一覧</span>--}}
                        <span class="current">病気別一覧</span>
                    </div>
                    <div class="meta-date">
                        {{ handleDayMonthFomart($category->updated_at) }}
                        ({{ getDayOffWeek($category->updated_at) }})
                        {{ handleHourFomart($category->updated_at) }}更新
                    </div>
                </div>

                <h1 class="list-title">【病気別一覧】</h1>

                <div class="tag-search">
                    <div class="tag-search-overlay"></div>
                    <div class="tag-search-mark"></div>
                    <form class="tag-search-form" action="{{ route('tag.list', $category->id) }}" method="GET">
                        <input type="text" class="tag-search-field" name="keyWord" placeholder="病名を入力" value="{{ $_GET["keyWord"] ?? '' }}"/>
                        <button type="submit"><img src="{{ asset('frontend/assets/images/search-icon.svg') }}" alt="" /></button>
                    </form>
                </div>

                <div class="cms2-list-tags">
                    <div class="sub-body">
                        @if ($category)
                            @if($tagGroups)
                                @foreach ($tagGroups as $keyGroup => $tags)
                                    @if(isset($nameGroup[$keyGroup]))
                                        <div class="sub-tag-title">{{ $nameGroup[$keyGroup] ?: '' }}</div>
                                        <div class="sub-list-tags">
                                            @foreach($tags as $key => $item)
                                                @if ($item)
                                                    <a href="{{ route('tag.detail', $item->id) }}" class="tag-item"><span>#</span>{!! $item->title ?? '' !!}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="text-center cms2-no-data">
                                    該当の病患がありませんでした
                                </div>
                            @endif
                        @else
                            <div class="text-center">
                                該当の病患がありませんでした
                            </div>
                        @endif
                    </div>
                </div>

                <div class="request-tag @if(isset($_GET['keyWord'])) text-center @endif">
                    <a href="/info/inquiry.php">その他の疾患のご依頼はこちら</a>
                </div>

                <div class="backtop-backpage center d-sp-none">
                    <a href="#" class="back-to-top">
                        <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt=""/>
                        <span>ページの先頭へ戻る</span>
                    </a>
                    <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                        <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt=""/>
                        <span>前のページへもどる</span>
                    </a>
                </div>
                <?php /*
                <div class="tag-related">
                    <div class="title">関連記事</div>
                    <div class="list-tag-related">
                        <a class="rel-item" href="#">
                            家族が担うこと
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                                <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#F8AABB"></path>
                            </svg>
                        </a>
                        <a class="rel-item" href="#">
                            看取る場所
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                                <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#F8AABB"></path>
                            </svg>
                        </a>
                        <a class="rel-item" href="#">
                            すぐ手続きすべきこと
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                                <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#F8AABB"></path>
                            </svg>
                        </a>
                        <a class="rel-item" href="#">
                            かかる費用
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                                <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#F8AABB"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="cms12-recommend d-sp-none d-tb-none">
                    <h2 class="title">【あわせて読みたい記事】</h2>
                    <div class="cms1-list-news">
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="#">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/cms1/cms1-news-1.png') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">セカンドオピニオンを探す</h3>
                                <div class="meta">
                                    <span class="author">医師　N.Makishi</span>
                                    <span class="post-date">4/29(金) 14:22</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="#">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/cms1/cms1-news-2.png') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">告知はどうすべきか</h3>
                                <div class="meta">
                                    <span class="author">医師　N.Makishi</span>
                                    <span class="post-date">4/29(金) 14:22</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="#">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/cms1/cms1-news-3.png') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">家族の負担を知る</h3>
                                <div class="meta">
                                    <span class="author">医師　N.Makishi</span>
                                    <span class="post-date">4/29(金) 14:22</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="#">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/cms1/cms1-news-4.png') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">家族にできること</h3>
                                <div class="meta">
                                    <span class="author">医師　N.Makishi</span>
                                    <span class="post-date">4/29(金) 14:22</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                        <!-- cms1 item -->
                        <a class="cms1-news-item" href="#">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/cms1/cms1-news-5png') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h3 class="title">看取る場所の決め方看取る場所の決め方看取る場所の決め方看取る場所の決め方看取る場所の決め看取る場所の決め方</h3>
                                <div class="meta">
                                    <span class="author">医師　N.Makishi</span>
                                    <span class="post-date">4/29(金) 14:22</span>
                                </div>
                            </div>
                            <span class="arrow">></span>
                        </a>
                        <!-- end cms1 item -->
                    </div>
                </div>
                */?>


            </div>

            <div class="sidebar">
                @include('homepage::sidebar.area')
                @include('homepage::sidebar.testimonials_box')
                <!-- Temporary support for "useful news" by a.u 2024.07.14  line:194 style="display:none;"-->
                <div class="sidebar--area">
                <?php //<div class="sidebar--area" style="display:none;"> ?>
                    @if ($listUseful)
                        @include('homepage::partials.news_widget_item')
                    @endif
                </div>
{{--                @include('homepage::sidebar.second_opinion')--}}
            </div>
        </div>
    </div>
@endsection
