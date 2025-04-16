@foreach ($listCompany as $key => $item)
    <div class="cms4-store-item">
        <div class="item-left">
            <div class="store-item-header">
                <div class="rank-address">
                    @if ($listCompany->currentPage() != 1)
                        <span
                            class="rank">{{ $listCompany->perPage() * $listCompany->currentPage() + $key + 1 - 10 }}</span>
                    @else
                        <span class="rank">{{ $key + 1 }}</span>
                    @endif
                    <span class="address">
                        <span class="city"><span style="color: #2b2b2b; font-weight:bold">{{ $item->name }}
                            </span>{{ ' | ' . $item->city }}</span>
                    </span>
                </div>
                <?php /*
                <div class="title">
                    @if(!empty($item['content']))
                        @foreach ($item['content'] as $key => $content)
                            @if ($content['title'])
                                <a href="{{ $content['url'] ?? '' }}">{{ $content['title'] ?? '' }}</a></br>
                            @endif
                        @endforeach
                    @endif
                </div>
                */
                ?>
                <div class="type-group">
                    @if (!empty($item->productOption))
                        @foreach ($item->productOption as $keyProductOption => $productOption)
                            @if ($productOption['product_id'] == $product->id && $productOption['category_id'] == $product->category->category_id)
                                {!! $productOption['content'] ?? '' !!}
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tags">
                @if ($item->listService)
                    @foreach ($item->listService as $keyService => $service)
                        @php
                            $borders = '';
                            if (!empty($service) && $service->borders == 2) {
                                $borders = 'border-radius: 3px;';
                            } elseif (!empty($service) && $service->borders == 3) {
                                $borders = 'border-radius: 11px;';
                            }
                        @endphp
                        <span class="tag"
                            style="{{ $service->color ? 'background-color:' . $service->color . ';' : '' }} {{ $borders }}">{{ $service->title ?? '' }}</span>
                    @endforeach
                @endif
            </div>
            <div class="desc">
                {!! $item->summary ?? '' !!}
            </div>
        </div>
        @if (!empty($item->url_home_page) && empty($item->url_info))
            <div class="button-group">
                <a class="cms4-button-1" href="{{ $item->url_home_page }}">
                    <img src="{{ asset('frontend/assets/images/arrow-button-1.png') }}" alt="" />
                    <span class="text">
                        事業者<small>の</small><br class="d-tb-none">
                        詳<small>しい</small>情報<small>を</small>見る
                    </span>
                </a>
            </div>
        @else
            <div class="button-group">
                @if (!empty($item->url_info))
                    <a class="cms4-button-2" href="{{ $item->url_info }}">
                        <img src="{{ asset('frontend/assets/images/arrow-button-1.png') }}" alt=""
                            width="15px" /><br class="d-tb-none d-sp-none">
                        <span class="text">事業者<br class="d-tb-none"><small>の</small>情報</span>
                    </a>
                @else
                    <span class="cms4-button--disabled">
                        <img class="d-tb-none" src="{{ asset('frontend/assets/images/sp-product-button-2.png') }}" />
                        <img class="d-sp-none d-pc-none"
                            src="{{ asset('frontend/assets/images/tb-product-button-2.png') }}" />
                    </span>
                @endif

                @if (!empty($item->url_home_page))
                    <a class="cms4-button-3" href="{{ $item->url_home_page }}">
                        <img src="{{ asset('frontend/assets/images/arrow-button-2.png') }}" alt=""
                            width="15px" /><br class="d-tb-none d-sp-none">
                        <span class="text">事業者<small>の</small><br class="d-tb-none"><span
                                class="small-2">ホームページ</span></span>
                    </a>
                @else
                    <span class="cms4-button--disabled">
                        <img class="d-tb-none" src="{{ asset('frontend/assets/images/sp-product-button-3.png') }}" />
                        <img class="d-sp-none d-pc-none"
                            src="{{ asset('frontend/assets/images/tb-product-button-3.png') }}" />
                    </span>
                @endif
            </div>
        @endif
    </div>
@endforeach
</div>

@if ($listCompany && count($listCompany) >= 10)
    <div class="more-button text-center">
        <a href="javascript:;"
            onclick="showCompanyByService('{{ $page + 1 }}','{{ $product->id }}','{{ $id_service }}','{{ route('product.showCompanyByService') }}')"
            class="cms4-more-button">
            <img src="{{ asset('frontend/assets/images/arrow-down2.svg') }}" alt="" />
            <span class="count">他<span
                    class="large">{{ $listCompany->total() - $listCompany->perPage() * $listCompany->currentPage() }}</span>件</span>
            <span>もっと見る</span>
        </a>
    </div>
@endif
