@extends('homepage::layout')

@section('content')
    <div class="mitori-layout-2 detail {{ $pagAfter }}">
        <div class="main-content-wrap">
            @if ($page != 1)
                <div class="white-box">
                    <div class="slogan-mitory-fixed detail d-pc-none d-tb-none">
                        <div class="slogan-text">私の看取り体験談</div>
                        <div class="md-filter-wrap">
                            <button class="md-filter">
                                <span>もくじ一覧</span>
                                <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}" alt="" />
                                <img class="arrow-down-3" src="{{ asset('frontend/assets/images/arrow-down-3.svg') }}"
                                    alt="" />
                            </button>
                            <div class="md-overlay"></div>
                            <div class="md-list-links">
                                @if (isset($familyNew->familyMember))
                                    <div class="person-box">
                                        <div class="avatar">
                                            @if (isset($familyNew->familyMember->avatar->path))
                                                <img src="{{ getLink('media' . '/' . $familyNew->familyMember->avatar->path) }}"
                                                    alt="" />
                                            @endif
                                        </div>
                                        <div class="info">
                                            <div class="name">{{ $familyNew->familyMember->name ?? '' }} <span
                                                    class="ms">さん</span> <span class="sex">（女性）</span></div>
                                            <div class="meta">
                                                <span>{{ $familyNew->patient_relationship }}</span>
                                                <span>{{ $familyNew->familyMember->birthday }}歳</span>
                                                <span>{{ $familyNew->tag->title ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-icon-text">
                                        <span>もくじ一覧</span>
                                        <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}"
                                            alt="" />
                                    </div>
                                    <ul class="md-link-items">
                                        @if (isset($listContent) && $listContent)
                                            @foreach ($listContent as $key => $content)
                                                <li>
                                                    {{--                                                <a href="{{ route('mitori-taiken.detail', [ $familyNew['id'], 'page' => $key + 1]) }}"> --}}
                                                    <a class="mitori-link" href="#content-{{ $key + 1 }}">
                                                        <span>{{ $content['title-japan'] ?? '' }}</span>
                                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg"
                                                            width="7" height="10.859" viewBox="0 0 7 10.859">
                                                            <path id="path9429"
                                                                d="M2.8,291.965a.772.772,0,0,0-.508,1.368l4.726,4.049-4.726,4.047a.772.772,0,1,0,1,1.169l5.411-4.63a.772.772,0,0,0,0-1.175L3.294,292.16a.772.772,0,0,0-.495-.195Z"
                                                                transform="translate(-1.976 -291.965)" fill="#c1c1c1" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div class="close-wrap">
                                        <a href="#" class="close-md">
                                            <img src="./assets/images/close-menu.png" alt="" />
                                            <span>閉じる</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="detail-top-title d-sp-none">私の看取り体験談</div>
                    <div class="detail-top-sub-title d-sp-none">{{ $familyNew->title }}</div>
                    <div class="md-filter-wrap d-sp-none">
                        <button class="md-filter">
                            <span>もくじ一覧</span>
                            <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}" alt="" />
                            <img class="arrow-down-3" src="{{ asset('frontend/assets/images/arrow-down-3.svg') }}"
                                alt="" />
                        </button>
                        <div class="md-overlay"></div>
                        <div class="md-list-links">
                            <a href="javascript:;" class="close-md">
                                <img src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                                <span>閉じる</span>
                            </a>
                            @if (isset($familyNew->familyMember))
                                <div class="sub-title">～ 家族が語る 最期の物語り ～</div>
                                <div class="title">{{ $familyNew->title }}</div>
                                <div class="person-box">
                                    <div class="avatar">
                                        @if (isset($familyNew->familyMember->avatar->path))
                                            <img src="{{ getLink('media' . '/' . $familyNew->familyMember->avatar->path) }}"
                                                alt="" />
                                        @endif
                                    </div>
                                    <div class="info">
                                        <div class="name">{{ $familyNew->familyMember->name ?? '' }} <span
                                                class="ms">さん</span> <span class="sex">（女性）</span></div>
                                        <div class="meta">
                                            <span>{{ $familyNew->patient_relationship }}</span>
                                            <span>{{ $familyNew->patient_birthday }}歳</span>
                                            <span>{{ $familyNew->tag->title ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="list-icon-text">
                                <span>もくじ一覧</span>
                                <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}"
                                    alt="" />
                            </div>
                            <ul class="md-link-items">
                                @if (isset($listContent) && $listContent)
                                    @foreach ($listContent as $key => $content)
                                        <li>
                                            {{-- <a href="{{ route('mitori-taiken.detail', [ $familyNew['id'], 'page' => $key + 1]) }}"> --}}
                                            <a class="mitori-link" href="#content-{{ $key + 1 }}">
                                                <span>{{ $content['title-japan'] ?? '' }}</span>
                                                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="7"
                                                    height="10.859" viewBox="0 0 7 10.859">
                                                    <path id="path9429"
                                                        d="M2.8,291.965a.772.772,0,0,0-.508,1.368l4.726,4.049-4.726,4.047a.772.772,0,1,0,1,1.169l5.411-4.63a.772.772,0,0,0,0-1.175L3.294,292.16a.772.772,0,0,0-.495-.195Z"
                                                        transform="translate(-1.976 -291.965)" fill="#c1c1c1" />
                                                </svg>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @if (isset($familyNew->familyMember))
                        <div class="person-care">
                            <div class="person-box">
                                <div class="avatar">
                                    @if (isset($familyNew->familyMember->avatar->path))
                                        <img src="{{ getLink('media' . '/' . $familyNew->familyMember->avatar->path) }}"
                                            alt="" />
                                    @endif
                                </div>
                                <div class="info">
                                    <div class="name">{{ $familyNew->familyMember->name ?? '' }} <span
                                            class="ms">さん</span> <span
                                            class="sex">（{{ getGender()[$familyNew->familyMember->gender] }}）</span>
                                    </div>
                                    <div class="meta">
                                        <span>{{ $familyNew->patient_relationship }}</span>
                                        <span>{{ $familyNew->patient_birthday }}歳</span>
                                        <span>{{ $familyNew->tag->title ?? '' }}</span>
                                        <span>{{ $familyNew->treatment_place ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($data) && $data)
                        <div class="mitori-detail-wrap">
                            @foreach ($data as $key => $content)
                                <div class="mitori-detail-main-item">
                                    <h3 class="m-item-title active">
                                        <span class="icon"><img src="{{ $content['banner_image'] ?? '' }}"
                                                style="width:30px;" alt="" /></span>
                                        {{ $content['title-japan'] ?? '' }}
                                    </h3>
                                    <div class="content">
                                        {!! $content['content'] ?? '' !!}
                                    </div>
                                    <a href="javascript:;" class="mitori-backtop d-pc-none d-tb-none">
                                        <img src="{{ asset('frontend/assets/images/mitori-backtop.png') }}"
                                            alt="" />
                                    </a>
                                </div>
                            @endforeach

                            @if ($page != 1)
                                <a class="mitori-detail-item mitori-back-item"
                                    href="{{ route('mitori-taiken.detail', [$familyNew['id'], 'page' => $page - 1]) }}">
                                    <img class="arrow-back" src="{{ asset('frontend/assets/images/arrow-left-c.svg') }}"
                                        alt="" />
                                    <h3 class="m-item-title">
                                        <span class="icon"><img
                                                src="{{ $listContent[$page - 2]['banner_image'] ?? '' }}"
                                                style="width:30px;" alt="" /></span>
                                        <div class="title-wrap">
                                            <span>{{ $listContent[$page - 2]['title-japan'] ?? '' }}</span>
                                            <span
                                                class="title-en">{{ $listContent[$page - 2]['title-english'] ?? '' }}</span>
                                        </div>
                                    </h3>
                                </a>
                            @endif

                            {{ $data->withQueryString()->links('pagination::default') }}

                            <div class="backtop-backpage">
                                <a href="javascript:;" class="back-to-top">
                                    <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt="" />
                                    <span>ページの先頭へ戻る</span>
                                </a>
                                <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                                    <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt="" />
                                    <span>前のページへもどる</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="main-content-left">
                    <div class="white-box">
                        <div class="mitori-detail-top">
                            <span class="text-ja">私の看取り体験談</span>
                            <span class="text-en d-sp-none">Last Shirahama Trip and Sushi</span>
                            <div class="md-filter-wrap d-sp-none">
                                <button class="md-filter">
                                    <span>もくじ一覧</span>
                                    <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}"
                                        alt="" />
                                    <img class="arrow-down-3"
                                        src="{{ asset('frontend/assets/images/arrow-down-3.svg') }}" alt="" />
                                </button>
                                <div class="md-overlay"></div>
                                <div class="md-list-links">
                                    <a href="javascript:;" class="close-md">
                                        <img src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                                        <span>閉じる</span>
                                    </a>
                                    @if (isset($familyNew->familyMember))
                                        <div class="sub-title">～ 家族が語る 最期の物語り ～</div>
                                        <div class="title">{{ $familyNew->title }}</div>
                                        <div class="person-box">
                                            <div class="avatar">
                                                @if (isset($familyNew->familyMember->avatar->path))
                                                    <img src="{{ getLink('media' . '/' . $familyNew->familyMember->avatar->path) }}"
                                                        alt="" />
                                                @endif
                                            </div>
                                            <div class="info">
                                                <div class="name">{{ $familyNew->familyMember->name ?? '' }} <span
                                                        class="ms">さん</span> <span class="sex">（女性）</span></div>
                                                <div class="meta">
                                                    <span>{{ $familyNew->patient_relationship }}</span>
                                                    <span>{{ $familyNew->familyMember->birthday }}歳</span>
                                                    <span>{{ $familyNew->tag->title ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="list-icon-text">
                                        <span>もくじ一覧</span>
                                        <img class="menu-3" src="{{ asset('frontend/assets/images/menu-3.svg') }}"
                                            alt="" />
                                    </div>
                                    <ul class="md-link-items">
                                        @if (isset($listContent) && $listContent)
                                            @foreach ($listContent as $key => $content)
                                                <li>
                                                    {{--                                                <a href="{{ route('mitori-taiken.detail', [ $familyNew['id'], 'page' => $key + 1]) }}"> --}}
                                                    <a class="mitori-link" href="#content-{{ $key + 1 }}">
                                                        <span>{{ $content['title-japan'] ?? '' }}</span>
                                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg"
                                                            width="7" height="10.859" viewBox="0 0 7 10.859">
                                                            <path id="path9429"
                                                                d="M2.8,291.965a.772.772,0,0,0-.508,1.368l4.726,4.049-4.726,4.047a.772.772,0,1,0,1,1.169l5.411-4.63a.772.772,0,0,0,0-1.175L3.294,292.16a.772.772,0,0,0-.495-.195Z"
                                                                transform="translate(-1.976 -291.965)" fill="#c1c1c1" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mitori-detail-top-text d-pc-none d-tb-none">
                            <div class="title-en">Stories of each family</div>
                            <div class="sub-title">～ 家族が語る 最期の物語り ～</div>
                            <div class="title">{{ $familyNew->title }}</div>
                        </div>
                        <div class="mitori-detail-shushi d-sp-none">
                            <h1 class="title">{{ $familyNew->title }}</h1>
                            <div class="text-en">Last Shirahama Trip and Sushi</div>
                            <div class="thumb">
                                @if (isset($familyNew->avatar->path))
                                    <img src="{{ getLink('media' . '/' . $familyNew->avatar->path) }}" alt="" />
                                @endif
                            </div>
                            <?php // <div class="date">掲載日：{{ handleDateFormat($familyNew->created_at) }}</div>   //edited by a,u #271 非表示化 2024.08.24 ?>
                        </div>
                        <div class="person-care">
                            <div class="title d-sp-none">
                                <span class="m-text">看取った方</span>
                                <span class="white-space"></span>
                                <!-- <span class="slogan-inner">{{ $familyNew->title }}</span> -->
                            </div>
                            @if (isset($familyNew->familyMember))
                                <div class="person-box">
                                    <img class="check-mark d-sp-none"
                                        src="{{ asset('frontend/assets/images/check-mark.svg') }}" alt="" />
                                    <img class="check-mark d-pc-none d-tb-none"
                                        src="{{ asset('frontend/assets/images/check-mark-sp.svg') }}" alt="" />
                                    <div class="avatar">
                                        @if (isset($familyNew->familyMember->avatar->path))
                                            <img src="{{ getLink('media' . '/' . $familyNew->familyMember->avatar->path) }}"
                                                alt="" />
                                        @endif
                                    </div>
                                    <div class="info">
                                        <div class="title d-pc-none d-tb-none">看取り体験者 <span
                                                class="sex d-pc-none d-tb-none">（{{ getGender()[$familyNew->familyMember->gender] }}）</span>
                                        </div>
                                        <div class="name">
                                            <span class="name-group">
                                                <span class="na">{{ $familyNew->familyMember->name ?? '' }}</span>
                                                <span class="ms">さん</span>
                                                <span
                                                    class="sex d-sp-none">（{{ getGender()[$familyNew->familyMember->gender] }}）</span>
                                            </span>
                                        </div>
                                        <div class="meta">
                                            <span>{{ $familyNew->familyMember->birthday }}歳</span>
                                            <span>{{ $familyNew->familyMember->summary ?? '' }}</span>
                                            <span>{{ $familyNew->familyMember->address ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mitori-detail-middle d-pc-none d-tb-none">
                                <div class="thumb">
                                    @if (isset($familyNew->avatar->path))
                                        <img src="{{ getLink('media' . '/' . $familyNew->avatar->path) }}"
                                            alt="" />
                                    @endif
                                </div>
                                <?php //<div class="date">掲載日：{{ handleDateFormat($familyNew->created_at) }}</div>　//edited by a,u #271 非表示化 2024.08.24 ?>
                            </div>
                        </div>

                        <div class="person-taken-care">
                            <div class="title"><span>看取られた方</span></div>
                            <div class="taken-header">
                                <img class="icon" src="{{ asset('frontend/assets/images/flower-icon.png') }}"
                                    alt="">
                                <div class="name">{{ $familyNew->patient_relationship ?? '' }}</div>
                                <div class="name-en">{{ $familyNew->patient_relationship_en ?? '' }}</div>
                            </div>
                            <div class="person-info">
                                <div class="info-row">
                                    <span class="label">享年</span>
                                    <span class="value">{{ $familyNew->patient_birthday }}歳</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">主な疾患</span>
                                    <span class="value">{{ $familyNew->tag->title ?? '' }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">闘病期間</span>
                                    <span class="value">{{ $familyNew->disease_year_start . '年' }}
                                        {{ $familyNew->disease_month_start . 'ヶ月' }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">最期を迎えた場所</span>
                                    <span class="value">{{ $familyNew->treatment_place ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                        @if (isset($data) && $data)
                            <div class="mitori-detail-wrap">
                                @foreach ($data as $key => $content)
                                    @if ($key == 0)
                                        <div class="mitori-detail-main-item" id="content-{{ $key + 1 }}">
                                            <h3 class="m-item-title active">
                                                <span class="icon"><img src="{{ $content['banner_image'] ?? '' }}"
                                                        style="width:30px;" alt="" /></span>
                                                {{ $content['title-japan'] ?? '' }}
                                            </h3>
                                            <div class="content">
                                                {!! $content['content'] ?? '' !!}
                                            </div>
                                        </div>
                                    @else
                                        <div class="mitori-detail-item" id="content-{{ $key + 1 }}">
                                            <h3 class="m-item-title">
                                                <span class="icon"><img src="{{ $content['banner_image'] ?? '' }}"
                                                        style="width:30px;" alt="" /></span>
                                                <div class="title-wrap">
                                                    <span>{{ $content['title-japan'] ?? '' }}</span>
                                                    <span class="title-en">{{ $content['title-english'] ?? '' }}</span>
                                                </div>
                                                <img class="arrow-down"
                                                    src="{{ asset('frontend/assets/images/arrow-down-cicle.svg') }}"
                                                    alt="" />
                                            </h3>
                                            <div class="acc-body" style="display: none;">
                                                {!! $content['content'] ?? '' !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <a href="javascript:;" class="mitori-backtop d-pc-none d-tb-none">
                                    <img src="{{ asset('frontend/assets/images/mitori-backtop.png') }}" alt="" />
                                </a>
                                @if ($page != 1)
                                    <a class="mitori-detail-item mitori-back-item"
                                        href="{{ route('mitori-taiken.detail', [$familyNew['id'], 'page' => $page - 1]) }}">
                                        <img class="arrow-back"
                                            src="{{ asset('frontend/assets/images/arrow-left-c.svg') }}"
                                            alt="" />
                                        <h3 class="m-item-title">
                                            <span class="icon"><img
                                                    src="{{ $listContent[$page - 2]['banner_image'] ?? '' }}"
                                                    style="width:30px;" alt="" /></span>
                                            <div class="title-wrap">
                                                <span>{{ $listContent[$page - 2]['title-japan'] ?? '' }}</span>
                                                <span
                                                    class="title-en">{{ $listContent[$page - 2]['title-english'] ?? '' }}</span>
                                            </div>
                                        </h3>
                                    </a>
                                @endif

                                {{-- {{ $data->withQueryString()->links('pagination::default') }} --}}

                                <div class="backtop-backpage d-sp-none">
                                    <a href="javascript:;" class="back-to-top">
                                        <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt="" />
                                        <span>ページの先頭へ戻る</span>
                                    </a>
                                    <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                                        <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt="" />
                                        <span>前のページへもどる</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            @include('homepage::sidebar.index')
        </div>
    </div>
@endsection
