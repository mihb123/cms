@extends('homepage::layout')
@section('content')
    <div class="main-content-wrap">
        <div class="main-content-left">
            @if(isset($page) && $page == 1)
                <div class="tag-details-top">
                    <div class="nurse-header">
                        @if(isset($tag->news) && $tag->news->creator)
                            <div class="avatar">
                                @if (isset($tag->news->creator->avatar) && $tag->news->creator->avatar)
                                    <img src="{{ getImageThumb($tag->news->creator->avatar->path) }}" alt="">
                                @endif
                            </div>
                            <div class="info">
                                <div class="name">{{ $tag->news->creator->name ?? ''}}</div>
                                <div class="job">{{ $tag->news->creator->summary ?? ''}} {{ $tag->news->creator->gender ? getGenderTag()[$tag->news->creator->gender] : ''}}</div>
                            </div>
                        @endif
                    </div>
                    <div class="tag-title">
                        <div class="title">{!!  $tag->title ?? '' !!}</div>
                        <div class="title-en">{{ $tag->title_english ?? ''}}</div>
                    </div>
                    <div class="tag-filter-wrap d-sp-none">
                        <button class="tag-filter">
                            <svg id="grip-solid-horizontal_1_" xmlns="http://www.w3.org/2000/svg" width="12.873"
                                 height="9.655"
                                 viewBox="0 0 12.873 9.655">
                                <path id="Path_5380" data-name="Path 5380"
                                      d="M12.068,349.763H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                      transform="translate(0 -340.108)" fill="#a1a1a1"/>
                                <path id="Path_5381" data-name="Path 5381"
                                      d="M12.068,204.7H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                      transform="translate(0 -199.067)" fill="#a1a1a1"/>
                                <path id="Path_5382" data-name="Path 5382"
                                      d="M12.068,59.634H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                      transform="translate(0 -58.025)" fill="#a1a1a1"/>
                            </svg>
                            もくじ一覧
                        </button>
                    </div>

{{--                    <div class="tag-header-basic is-sp d-pc-none d-tb-none">--}}
{{--                        <span class="stt-name">もくじ一覧</span>--}}
{{--                        <ul class="tag-top-list">--}}
{{--                            @if (isset($tag->news) && $tag->news->content)--}}
{{--                                @foreach ($tag->news->content as $key => $content)--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('tag.detail', [ $tag['id'], 'page' => $key + 1]) }}">{{ $content['title-japan'] }}</a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                    <div class="tag-top-wrap d-sp-none">
                        <div class="content-left">
                            <ul class="tag-top-list">
                                @if (isset($tag->news) && $tag->news->content)
                                    @foreach ($tag->news->content as $key => $content)
                                        <li class="square-left">
{{--                                            <a href="{{ route('tag.detail', [ $tag['id'], 'page' => $key + 1]) }}">--}}
                                            <a href="#content-{{ $key + 1 }}">
                                                {{ $content['title-japan'] }}
                                                <span class="text-en">/ {{ $content['title-english'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="thumbnail">
                            @if(isset($tag->avatar->path))
                                <img src="{{ getImageThumb($tag->avatar->path) }}" alt=""/>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="tag-details-top page-after">
                    <div class="nurse-header">
                        @if(isset($tag->news) && $tag->news->creator)
                            <div class="avatar">
                                @if (isset($tag->news->creator->avatar) && $tag->news->creator->avatar)
                                    <img src="{{ getImageThumb($tag->news->creator->avatar->path) }}" alt="">
                                @endif
                            </div>
                            <div class="info">
                                <div class="name">{{$tag->news->creator->name ?? ''}}</div>
                                <div class="job">{{$tag->news->creator->summary ?? ''}}</div>
                            </div>
                        @endif
                    </div>
                    <div class="tag-title">
                        <div class="title">{!!  $tag->title ?? '' !!}</div>
                        <div class="title-en">{{ $tag->summary ?? ''}}</div>
                        <div class="tag-filter-wrap">
                            <button class="tag-filter-2">
                                <span class="button-group">
                                    <svg id="grip-solid-horizontal_1_" xmlns="http://www.w3.org/2000/svg" width="12.873"
                                         height="9.655" viewBox="0 0 12.873 9.655">
                                        <path id="Path_5380" data-name="Path 5380"
                                              d="M12.068,349.763H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                              transform="translate(0 -340.108)" fill="#a1a1a1"/>
                                        <path id="Path_5381" data-name="Path 5381"
                                              d="M12.068,204.7H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                              transform="translate(0 -199.067)" fill="#a1a1a1"/>
                                        <path id="Path_5382" data-name="Path 5382"
                                              d="M12.068,59.634H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                              transform="translate(0 -58.025)" fill="#a1a1a1"/>
                                    </svg>
                                    もくじ一覧
                                </span>
                                <span class="plus">
                                    <img src="{{ asset('frontend/assets/images/plus-color.svg') }}" alt=""/>
                                </span>
                            </button>
                            <div class="tag-overlay"></div>
                            <div class="tag-top-wrap">
                                <button class="close-filter">
                                    <img src="{{ asset('frontend/assets/images/close-filter.svg') }}" alt=""/></button>
                                <div class="tag-header-basic">
                                    <div class="tag-filter">
                                        <svg id="grip-solid-horizontal_1_" xmlns="http://www.w3.org/2000/svg"
                                             width="12.873"
                                             height="9.655" viewBox="0 0 12.873 9.655">
                                            <path id="Path_5380" data-name="Path 5380"
                                                  d="M12.068,349.763H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                                  transform="translate(0 -340.108)" fill="#a1a1a1"/>
                                            <path id="Path_5381" data-name="Path 5381"
                                                  d="M12.068,204.7H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                                  transform="translate(0 -199.067)" fill="#a1a1a1"/>
                                            <path id="Path_5382" data-name="Path 5382"
                                                  d="M12.068,59.634H.8a.8.8,0,1,1,0-1.609H12.068a.8.8,0,1,1,0,1.609Z"
                                                  transform="translate(0 -58.025)" fill="#a1a1a1"/>
                                        </svg>
                                        もくじ一覧
                                    </div>
                                    <div class="tag-title-inner">
                                        <div class="title">{!!  $tag->title ?? '' !!}</div>
                                        <div class="title-en">{{ $tag->title_english ?? ''}}</div>
                                    </div>
                                    <ul class="tag-top-list">
                                        @if (isset($tag->news) && $tag->news->content)
                                            @foreach ($tag->news->content as $key => $content)
                                                <li>
                                                    <a href="{{ route('tag.detail', [ $tag['id'], 'page' => $key + 1]) }}">
                                                        {{ $content['title-japan'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div class="kc-slogan-bottom">
                                        <div class="slogan-wrap">
                                            <span class="star">
                                                <img src="{{ asset('frontend/assets/images/healthcare.svg') }}" alt=""/>
                                            </span>
                                            <div class="slogan-text">
                                                <span class="text-1">病気<span>の</span>経過<span>と</span>終末期</span>
                                                <span class="text-en">Disease course and terminal stage.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($data) && $data)
                <div class="stt-name-sp d-pc-none d-tb-none"><span>もくじ一覧</span></div>
                <div class="tag-detail-box-wrap">
                @foreach ($data as $key => $content)
                    <div class="tag-detail-box" id="content-{{$key + 1}}">
                        <div class="tag-box-header-sp d-pc-none d-tb-none">
                            <a class="tag-box-toggle" href="#"><span>{{ $content['title-japan'] }}</span></a>
                        </div>
                        <div class="tag-box-header d-sp-none">
                            <h2 class="box-title square-left">
                                {{ $content['title-japan'] }} <span class="sub">-　{!!  $tag->title ?? '' !!}</span>
                            </h2>
                            @if(isset($tag->avatar->path))
                                {{--                                <img class="double-line d-sp-none" src="{{ getImageThumb($tag->avatar->path) }}"--}}
                                {{--                                     alt=""/>--}}
                            @endif
                        </div>
                        <div class="tag-box-body-js">
                            <div class="tag-box-header d-pc-none d-tb-none">
                                <h2 class="box-title square-left">
                                    {{ $content['title-japan'] }} <span class="sub">-　{!!  $tag->title ?? '' !!}</span>
                                </h2>
                            </div>
                            <div class="tag-box-body">
    {{--                            <div class="double-line-sp text-center d-pc-none d-tb-none">--}}
    {{--                                @if(isset($tag->avatar->path))--}}
    {{--                                    <img src="{{ getImageThumb($tag->avatar->path) }}" alt=""/>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
                                <div class="text-content">
                                    @if(isset($content['level']) && $content['level'])
                                        @foreach ($content['level'] as $keyLevel => $level)
                                            @if(isset($level['name']) && $level['name'])
                                                <h3 style="border-left:5px solid {{isset($level['color']) && $level['color'] ? $level['color']: ''}}">{{ $level['name'] }}</h3>
                                            @endif

                                            {!! $level['content']!!}

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                <div class="tag-name-bottom"><span>{!!  $tag->title ?? '' !!}</span></div>

                <div class="kc-slogan-bottom">
                    <div class="slogan-wrap">
                        <span class="star">
                            <img src="{{ asset('frontend/assets/images/healthcare.svg') }}" alt=""/>
                        </span>
                        <div class="slogan-text">
                            <span class="text-1">病気<span>の</span>経過<span>と</span>終末期</span>
                            <span class="text-en">Disease course and terminal stage.</span>
                        </div>
                    </div>
                </div>

                <div class="detail-scroll-top text-center d-sp-none">
                    <a href="#" class="scroll-to-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.574" height="25.837" viewBox="0 0 30.574 25.837">
                            <g id="upload" transform="translate(-6 -22.256)">
                                <path id="Path_2849" data-name="Path 2849"
                                      d="M17.445,10.822a1.11,1.11,0,0,0-1.576,0L10.322,16.37A1.114,1.114,0,0,0,11.9,17.945l3.65-3.661V27.7a1.11,1.11,0,0,0,2.219,0V14.284l3.65,3.661a1.114,1.114,0,1,0,1.576-1.576Z"
                                      transform="translate(4.79 19.285)" fill="#d4d4d4"/>
                                <path id="Path_2850" data-name="Path 2850"
                                      d="M34.184,5H6.39a1.332,1.332,0,1,0,0,2.662H34.184a1.332,1.332,0,1,0,0-2.662Z"
                                      transform="translate(1 17.256)" fill="#d4d4d4"/>
                            </g>
                        </svg>
                        ページの先頭へ戻る
                    </a>
                </div>
{{--                {{ $data->withQueryString()->links('pagination::custom_tag',['paginationContent' => $paginationContent, 'tag' => $tag ]) }}--}}
            @endif
        </div>
        @include('homepage::partials.sidebar_tag')
    </div>

    <button class="d-pc-none d-tb-none tag-fixed-scrollTop">
        <img src="{{ asset("frontend/assets/images/tag-details/tsuiju-botton.svg") }}" alt="" />
    </button>
@endsection
@push("scripts")
    @if(!empty(request()->get('page')))
        <script>
            if($(window).width() < 768) {
                $('html, body').animate({
                    scrollTop: $(".tag-detail-box").offset().top - 136
                }, 1000);
            }
        </script>
    @endif
    <script>
        $(".tag-details-top .tag-top-list a").on("click", function (e) {
            e.preventDefault();
            var tab_id = $(this).attr('href');
            if($(tab_id).length > 0){
                $('html, body').animate({
                    scrollTop: $(tab_id).offset().top - 10
                }, 1000);
            }
        })
    </script>
@endpush
