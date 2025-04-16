<div class="list-features-articles">
    @if (isset($listProductNewsFeatures) && $listProductNewsFeatures)
        @foreach ($listProductNewsFeatures as $keyNewFeatures => $newsFeatures)
            @if ($keyNewFeatures == 0)
                <a href="{{ $newsFeatures->url ?? '' }}" class="cms4-featured-article">
                    <div class="thumb">
                        <img src="{{ $newsFeatures->avatar ? getLink('media' . '/' . $newsFeatures->avatar->path) : '' }}"
                            alt="" />
                    </div>
                    <div class="caption">
                        <h3 class="title">
                            {{ $newsFeatures->title ?? '' }}
                        </h3>
                    </div>
                    <span class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                            viewBox="0 0 6.935 10.758">
                            <path id="path9429"
                                d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                transform="translate(-1.976 -291.965)" fill="#fff"></path>
                        </svg>
                    </span>
                </a>
            @endif
        @endforeach
        <div class="list-inner-articles">
            @foreach ($listProductNewsFeatures as $keyNewFeatures => $newsFeatures)
                @if ($keyNewFeatures != 0)
                    <a class="cms4-fa-item" href="{{ $newsFeatures->url ?? '' }}">
                        <div class="thumb">
                            <img src="{{ $newsFeatures->avatar ? getLink('media' . '/' . $newsFeatures->avatar->path) : '' }}"
                                alt="" />
                        </div>
                        <div class="caption">
                            <h3 class="title">{{ $newsFeatures->title ?? '' }}</h3>
                        </div>
                        <span class="arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="22"
                                viewBox="0 0 6.935 10.758">
                                <path id="path9429"
                                    d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                    transform="translate(-1.976 -291.965)" fill="#F0A9B9"></path>
                            </svg>
                        </span>
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>
@if ($banner)
    @foreach ($banner as $key => $item)
        <div class="cms4-ads">
            @php
                $width = $item->width_image ? 'width:' . $item->width_image . 'px;' : '';
                $height = $item->height_image ? 'height:' . $item->height_image . 'px;' : '';
            @endphp
            <span class="pr">-PR-</span>
            <a href="{{ $item->url ?? '' }}">
                <img style="{{ $width . ' ' . $height }}"
                    src="{{ $item->avatar ? getLink('media' . '/' . $item->avatar->path) : '' }}" alt="" />
            </a>
        </div>
    @endforeach
@endif
@push('style')
    <style>
        .cms4-ads {
            margin-top: 10px;
        }

        .cms4-ads a {
            max-width: 80%;
            height: auto;
        }
    </style>
@endpush
