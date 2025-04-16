@if ($paginator->hasPages())
    <div class="tag-name-bottom"><span>{{ $tag->title ?? ''}}</span></div>
    <div class="single-pagination">
        @if (!$paginator->onFirstPage())
            @if (isset($paginationContent[$paginator->currentPage() - 1]))
                <div class="pagi-item">
                    <a class="prev-button" href="{{$paginator->url($paginator->currentPage() - 1)}}">
                        <span class="sub-title">前のページ</span>
                        <div class="pagi-box prev">
                            <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="14.201" height="22.029"
                                 viewBox="0 0 14.201 22.029">
                                <path id="path9429"
                                      d="M14.507,291.965a1.567,1.567,0,0,1,1.031,2.775L5.95,302.954l9.588,8.21a1.567,1.567,0,1,1-2.035,2.372L2.526,304.145a1.567,1.567,0,0,1,0-2.384l10.977-9.4a1.565,1.565,0,0,1,1-.4Z"
                                      transform="translate(-1.976 -291.965)" fill="#f0a9b9"/>
                            </svg>
                            <div class="text-group square-left">
                                <span class="text-ja">{{ $paginationContent[$paginator->currentPage() - 1]['title-japan'] ?? '' }}  </span>
                                <span class="text-en">/ {{ $paginationContent[$paginator->currentPage() - 1]['title-english'] ?? '' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @else
            @if (isset($paginationContent[$paginator->lastPage()]))
                <div class="pagi-item">
                    <a class="prev-button" href="{{$paginator->url($paginator->lastPage())}}">
                        <span class="sub-title">前のページ</span>
                        <div class="pagi-box prev">
                            <svg class="prev-icon" xmlns="http://www.w3.org/2000/svg" width="14.201" height="22.029"
                                 viewBox="0 0 14.201 22.029">
                                <path id="path9429"
                                      d="M14.507,291.965a1.567,1.567,0,0,1,1.031,2.775L5.95,302.954l9.588,8.21a1.567,1.567,0,1,1-2.035,2.372L2.526,304.145a1.567,1.567,0,0,1,0-2.384l10.977-9.4a1.565,1.565,0,0,1,1-.4Z"
                                      transform="translate(-1.976 -291.965)" fill="#f0a9b9"/>
                            </svg>
                            <div class="text-group square-left">
                                <span class="text-ja">{{ $paginationContent[$paginator->lastPage()]['title-japan'] ?? '' }}  </span>
                                <span class="text-en">/ {{ $paginationContent[$paginator->lastPage()]['title-english'] ?? '' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endif
        @if ($paginator->hasMorePages())
            @if (isset($paginationContent[$paginator->currentPage() + 1]))
                <div class="pagi-item">
                    <a class="next-button" href="{{ $paginator->nextPageUrl() }}">
                        <span class="sub-title">次のページ</span>
                        <div class="pagi-box next">
                            <div class="text-group square-left">
                                <span class="text-ja">{{ $paginationContent[$paginator->currentPage() + 1]['title-japan'] ?? '' }}  </span>
                                <span class="text-en">/ {{ $paginationContent[$paginator->currentPage() + 1]['title-english'] ?? '' }}</span>
                            </div>
                            <svg class="next-icon" xmlns="http://www.w3.org/2000/svg" width="14.2" height="22.029"
                                 viewBox="0 0 14.2 22.029">
                                <path id="path9429"
                                      d="M3.646,291.965a1.567,1.567,0,0,0-1.031,2.775l9.587,8.214-9.587,8.21a1.567,1.567,0,1,0,2.035,2.372l10.977-9.392a1.567,1.567,0,0,0,0-2.384L4.65,292.36a1.565,1.565,0,0,0-1-.4Z"
                                      transform="translate(-1.976 -291.965)" fill="#f0a9b9"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif
        @else
            @if (isset($paginationContent[1]))
                <div class="pagi-item">
                    <a class="next-button" href="{{$paginator->url(1)}}">
                        <span class="sub-title">次のページ</span>
                        <div class="pagi-box next">
                            <div class="text-group square-left">
                                <span class="text-ja">{{ $paginationContent[1]['title-japan'] ?? '' }}  </span>
                                <span class="text-en">/ {{ $paginationContent[1]['title-english'] ?? '' }}</span>
                            </div>
                            <svg class="next-icon" xmlns="http://www.w3.org/2000/svg" width="14.2" height="22.029"
                                 viewBox="0 0 14.2 22.029">
                                <path id="path9429"
                                      d="M3.646,291.965a1.567,1.567,0,0,0-1.031,2.775l9.587,8.214-9.587,8.21a1.567,1.567,0,1,0,2.035,2.372l10.977-9.392a1.567,1.567,0,0,0,0-2.384L4.65,292.36a1.565,1.565,0,0,0-1-.4Z"
                                      transform="translate(-1.976 -291.965)" fill="#f0a9b9"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif
        @endif
    </div>

    <div class="kc-pagination {{ $pagiClass ?? '' }}">
        <div class="paginate">
            @if ($paginator->onFirstPage())
                <a href="#" class="page-number page-prev disabled">
                    〈 前へ
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="page-number page-prev ">
                    〈 前へ
                </a>
            @endif
            @if ($paginator->currentPage() > 2)
                @if ($paginator->currentPage() > 3)
                    <a href="javascript;" class="page-number disabled">...</a>
                @endif
            @endif

            @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->currentPage() + 2, $paginator->lastPage()); $i++)
                @if ($i == $paginator->currentPage())
                    <a href="javascript;" class="page-number current-page">{{ $i }}</a>
                @else
                    <a href="{{ $paginator->url($i) }}" class="page-number">{{ $i }}</a>
                @endif
            @endfor

            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <a href="javascript;" class="page-number disabled">...</a>
                @endif
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-number">{{ $paginator->lastPage() }}</a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-number page-next">
                    次へ 〉
                </a>
            @else
                <a href="#" class="page-number page-next">
                    次へ 〉
                </a>
            @endif

        </div>
        <div class="page-count"><span class="current">{{ $paginator->currentPage() }}</span> / {{$paginator->lastPage()}}
            ページ
        </div>
    </div>

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
@endif

