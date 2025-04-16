@foreach($listProductGroup as $key => $productGroup)
<div class="list-top-product">
    <div class="title">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="24.25" viewBox="0 0 28 24.25">
            <defs>
                <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#f3b9c6"/>
                    <stop offset="1" stop-color="#feb2c2"/>
                </linearGradient>
                <filter id="Polygon_25" x="0" y="0" width="28" height="24.25" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
            </defs>
            <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Polygon_25)">
                <path id="Polygon_25-2" data-name="Polygon 25" d="M5,0l5,6.25H0Z" transform="translate(19 12.25) rotate(180)" fill="url(#linear-gradient)"/>
            </g>
        </svg>
        {{ $productGroup->title ?? '' }}
    </div>
    <div class="top-product-slider owl-carousel has-flick">
        @if($productGroup->listCategory)
            @foreach($productGroup->listCategory as $keyCat => $category)
                <div class="item">
                    <div class="top-product-item">
                        <a href="{{ route('product.list', ['category' => $category->title]) }}">
                            <div class="thumb">
                                <div class="ratio ratio-1:1">
                                    <img src="{{ $category->avatar ? getLink('media'. '/' . $category->avatar->path) : '' }}" alt="" />
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
