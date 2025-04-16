<div class="{{ $mitoriTaikenList ?? "main-content-left" }}" id="cms3-news">
    <h2 class="mitori-title">
        <span>{{ isset($name) && $name ? $name :'新着順'}}</span>
        @if(isset($name) && !$name)
            <img src="{{ asset('frontend/assets/images/mitori/new-icon.png') }}"/>
        @endif
    </h2>
    <div class="mitori-filter">
        <div class="filter-button">
            <button class="js-filter">
                他の条件で絞り込む
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" viewBox="0 0 10 7">
                    <path id="Path_2932" data-name="Path 2932" d="M5,0l5,7H0Z" transform="translate(10 7) rotate(180)"
                          fill="#333"/>
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
                                <a class="mitori-filter-item" href="{{route('mitori-taiken.list')}}">
                                    <div class="mitori-title">
                                        <span>新着順</span> <img src="{{ asset('frontend/assets/images/mitori/new-icon.png') }}" alt=""/>
                                    </div>
                                    <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" width="10"
                                         height="15.513" viewBox="0 0 10 15.513">
                                        <path id="path9429"
                                              d="M3.152,291.965a1.1,1.1,0,0,0-.726,1.954L9.177,299.7l-6.752,5.782a1.1,1.1,0,1,0,1.433,1.67l7.73-6.614a1.1,1.1,0,0,0,0-1.679l-7.73-6.62a1.1,1.1,0,0,0-.707-.278Z"
                                              transform="translate(-1.976 -291.965)" fill="#f8aabb"/>
                                    </svg>
                                </a>
                                @foreach($listCategory as $key => $category)
                                    <a class="mitori-filter-item"
                                       href="{{route('mitori-taiken.list', ['category' => $category->title])}}">
                                        <div class="mitori-title">
                                            <span>{{$category->title}}</span>
                                            @if(isset($category->avatar->path))
                                                <img src="{{ getImageThumb($category->avatar->path) }}" alt=""/>
                                            @endif
                                        </div>
                                        <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" width="10"
                                             height="15.513" viewBox="0 0 10 15.513">
                                            <path id="path9429"
                                                  d="M3.152,291.965a1.1,1.1,0,0,0-.726,1.954L9.177,299.7l-6.752,5.782a1.1,1.1,0,1,0,1.433,1.67l7.73-6.614a1.1,1.1,0,0,0,0-1.679l-7.73-6.62a1.1,1.1,0,0,0-.707-.278Z"
                                                  transform="translate(-1.976 -291.965)" fill="#f8aabb"/>
                                        </svg>
                                    </a>
                                @endforeach
                                <div class="mitori-filter-item tag">
                                    <div class="mitori-title">
                                        <span>病気の種類</span>
                                        <img src="{{ asset('frontend/assets/images/book.png') }}" alt=""/>
                                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" width="15.513"
                                             height="10" viewBox="0 0 15.513 10">
                                            <g id="layer1" transform="translate(307.478 -1.976) rotate(90)">
                                                <path id="path9429"
                                                      d="M3.152,291.965a1.1,1.1,0,0,0-.726,1.954L9.177,299.7l-6.752,5.782a1.1,1.1,0,1,0,1.433,1.67l7.73-6.614a1.1,1.1,0,0,0,0-1.679l-7.73-6.62a1.1,1.1,0,0,0-.707-.278Z"
                                                      transform="translate(0 0)" fill="#f8aabb"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="sub-body">
                                        @foreach ($listTagGroup as $key => $tagGroup)
                                            <div class="sub-tag-title">{{ $tagGroup->title ?? ''}}</div>
                                            <div class="sub-list-tags">
                                                @if(isset($tagGroup->listTag))
                                                    @foreach ($tagGroup->listTag as $keyGroup => $tag)
                                                        <a href="{{route('mitori-taiken.list', ['keyword' => $tag->title])}}"
                                                           class="tag-item"><span>#</span>{{ $tag->title ?? '' }}</a>
                                                    @endforeach
                                                @endif
                                            </div>
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
    <div class="list-mitori list-mitori-top">
        @foreach ($listNews as $key => $news)
            <div class="mitori-item">
                <div class="item-left">
                    <div class="top">
                        <a href="{{ route('mitori-taiken.detail', $news->id )}}" class="d-flex">
                            <img class="member-avatar" src="{{ $news->familyMember ? getImageThumb($news->familyMember->avatar->path) : '' }}"
                                 alt=""/>
                            <div class="title">
                                {{ $news->title ?? ''}}
                            </div>
                        </a>
                    </div>
                    <div class="bottom">
                        <a class="name"
                           href="{{ route('mitori-taiken.detail', $news->id )}}">{{ $news->familyMember->name ?? ''}}
                            <span>さん</span></a>
                        <div class="p-bottom">
                            <div class="rela">{{ $news->patient_relationship ?? ''}}</div>
                            <div
                                class="tag">{{ $news->tag && isset($news->tag->title) ? '#'.$news->tag->title  : '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="item-right">
                    <img class="sushi" src="{{ getImageThumb($news->avatar->path) }}" alt=""/>
                    <a href="{{ route('mitori-taiken.detail', $news->id )}}" class="ex-link">
                        <img src="{{ asset('frontend/assets/images/external-icon-3.svg') }}" alt=""/>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <?php /*
    <div class="view-more view-all-mitori text-center">
        <a href="{{ route('mitori-taiken.list') }}" class="link-icon">
            <span class="text">もっと見る</span>
            <img src="{{ asset('frontend/assets/images/external-link-2.svg') }}" alt=""/>
        </a>
    </div>
    */?>
    {{ $listNews->withQueryString()->links('pagination::default') }}

    @if(isset($mitoriTaiken))
        <div class="list-tags-bottom">
            <h2 class="mitori-title">
                <span>病気の種類から探す</span>
                <img src="{{ asset('frontend/assets/images/book.png') }}" alt=""/>
            </h2>
            <div class="sub-body">
                @foreach ($listTagGroup as $key => $tagGroup)
                    <div class="sub-tag-title">{{ $tagGroup->title ?? ''}}</div>
                    <div class="sub-list-tags">
                        @if(isset($tagGroup->listTag))
                            @foreach ($tagGroup->listTag as $keyGroup => $tag)
                                <a href="{{route('mitori-taiken.list', ['keyword' => $tag->title])}}"
                                   class="tag-item"><span>#</span>{{ $tag->title ?? '' }}</a>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="backtop-backpage d-sp-none">
            <a href="#" class="back-to-top">
                <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt=""/>
                <span>ページの先頭へ戻る</span>
            </a>
            <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt=""/>
                <span>前のページへもどる</span>
            </a>
        </div>
    @endif
</div>
@push('scripts')
    <script>
        @if(isset($_GET['page']))
        $('html, body').animate({
            scrollTop: $("#cms3-news").offset().top
        }, 100);
        @endif
    </script>
@endpush
