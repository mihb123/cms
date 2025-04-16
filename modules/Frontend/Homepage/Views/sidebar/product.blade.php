<div class="widget top-product">
    <div class="widget--header">
        <h3 class="title">身体<span>や</span>心<span>を</span>楽にしてくれるもの</h3>
    </div>
    <div class="widget--body">
        <div class="caption-top">
            <h3 class="title">プロが選ぶ暮らしの中で身体や心を楽にしてくれるもの達をご紹介</h3>
            <div class="sub-title">身体を支えてくれる道具や気分を楽にしてくれる様々な製品やサービスがあります</div>
            <div class="text-right">
                <a class="view-more" href="{{ route('product.home') }}">
                    <span class="icon"><img src="{{ asset('frontend/assets/images/g2291.png') }}"></span>
                    <span class="text">製品の一覧ページへ </span>
                    <svg class="icon-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="17" height="18.998" viewBox="0 0 17 18.998">
                        <defs>
                            <filter id="Path_3863" x="0" y="0" width="17" height="18.998"
                                filterUnits="userSpaceOnUse">
                                <feOffset dy="1" input="SourceAlpha" />
                                <feGaussianBlur stdDeviation="1" result="blur" />
                                <feFlood flood-opacity="0.051" />
                                <feComposite operator="in" in2="blur" />
                                <feComposite in="SourceGraphic" />
                            </filter>
                        </defs>
                        <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_3863)">
                            <path id="Path_3863-2" data-name="Path 3863"
                                d="M21.379,2.094C21.046,1.931,21.24,2.033,16,2a1.1,1.1,0,0,0-1,1.182,1.1,1.1,0,0,0,1,1.182h2.585l-7.29,8.616a1.338,1.338,0,0,0,0,1.671.9.9,0,0,0,1.414,0L20,6.035V9.09a1.014,1.014,0,1,0,2,0c-.026-6.224.061-5.967-.077-6.358a1.107,1.107,0,0,0-.542-.638Z"
                                transform="translate(-8 0)" fill="#1d3994" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        @foreach ($listProductGroup as $key => $productGroup)
            <div class="list-top-product">
                <div class="title">
                    {{ $productGroup->title ?? '' }}
                </div>
                <div class="top-product-slider wg owl-carousel has-flick is-bottom">
                    @if ($productGroup->listCategory)
                        @foreach ($productGroup->listCategory as $keyCat => $category)
                            <div class="item">
                                <div class="top-product-item">
                                    <a href="{{ route('product.list', ['category' => $category->title]) }}">
                                        <div class="thumb">
                                            <div class="ratio ratio-1:1">
                                                <img src="{{ $category->avatar ? getLink('media' . '/' . $category->avatar->path) : '' }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="pro-title">{{ $category->title ?? '' }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach

        <div class="useful-topics-articles">
            <h3 class="title">
                <span class="text-jp">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28"
                        height="24.25" viewBox="0 0 28 24.25">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#f3b9c6" />
                                <stop offset="1" stop-color="#feb2c2" />
                            </linearGradient>
                            <filter id="Polygon_25" x="0" y="0" width="28" height="24.25"
                                filterUnits="userSpaceOnUse">
                                <feOffset dy="3" input="SourceAlpha" />
                                <feGaussianBlur stdDeviation="3" result="blur" />
                                <feFlood flood-opacity="0.161" />
                                <feComposite operator="in" in2="blur" />
                                <feComposite in="SourceGraphic" />
                            </filter>
                        </defs>
                        <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Polygon_25)">
                            <path id="Polygon_25-2" data-name="Polygon 25" d="M5,0l5,6.25H0Z"
                                transform="translate(19 12.25) rotate(180)" fill="url(#linear-gradient)" />
                        </g>
                    </svg>
                    <span>お役立ちトピックス記事</span>
                </span>
                <span class="text-en">Useful Topics Articles</span>
            </h3>
            <div class="list-useful-topics">
                @foreach ($listTopic as $key => $topic)
                    <a class="useful-topics-item" href="{{ route('posts-topic.detail', $topic->id) }}">
                        <div class="thumb">
                            <img src="{{ isset($topic->avatar) && $topic->avatar ? getLink('media' . '/' . $topic->avatar->path) : '' }}"
                                alt="" />
                        </div>
                        <div class="title">
                            {{ $topic->title ?? '' }}
                        </div>
                        <img class="external-icon" src="{{ asset('frontend/assets/images/external-icon-3.svg') }}"
                            alt="" />
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
