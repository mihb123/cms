<?php //@extends('homepage::layout')  //edited by a.u 2024.09.21 ?>
@extends('homepage::layout_noindex')
@section('title', '製品の管理')
@section('content')
    <div class="main-content-wrap cms4-detail">
        <div class="main-content-left">
            <h1 class="product-title">
                <span style="font-weight: bold">{{ $product->title ?? '' }}</span>
            </h1>
            <h2 class="product-title">
                @if ($product->star == 1)
                    <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                @endif
                <span>{!! $product->description ?? '' !!}</span>
            </h2>
            <div class="cms4-media">
                <div class="media-left">

                    <div class="large-image">
                        <img class="image"
                            src="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}"
                            alt="" />
                        <div class="zoom-wrap">
                            <button class="btn-cms4-zoom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.188" height="9.187"
                                    viewBox="0 0 9.188 9.187">
                                    <g id="zoom-in_1_" data-name="zoom-in (1)" transform="translate(-0.994 -0.985)">
                                        <path id="Path_3829" data-name="Path 3829"
                                            d="M10.093,9.649,7.532,7.087a.306.306,0,0,0-.433,0,3.2,3.2,0,1,1,.618-.868.306.306,0,0,0,.551.268,3.829,3.829,0,1,0-.96,1.241L9.66,10.082a.306.306,0,1,0,.433-.433Z"
                                            transform="translate(0 0)" />
                                        <path id="Path_3830" data-name="Path 3830"
                                            d="M8.99,10.98a.306.306,0,0,0,.306-.306V9.3h1.378a.306.306,0,1,0,0-.612H9.3V7.306a.306.306,0,1,0-.612,0V8.684H7.306a.306.306,0,1,0,0,.612H8.684v1.378A.306.306,0,0,0,8.99,10.98Z"
                                            transform="translate(-4.167 -4.174)" />
                                    </g>
                                </svg>
                                <span>拡大</span>
                            </button>

                            <!-- zoom popup -->
                            <div class="zoom-popup">
                                <div class="zoom-popup-overlay"></div>
                                <div class="zoom-content">
                                    <div class="zoom-content-top">
                                        <a href="#" class="popup-logo d-sp-none"><img
                                                src="{{ asset('frontend/assets/images/cms4/popup-logo.svg') }}"
                                                alt="" /></a>
                                        <span class="title d-pc-none d-tb-none">製品画像</span>
                                        <button class="close-popup"><img
                                                src="{{ asset('frontend/assets/images/close-menu.png') }}" alt="" />
                                            閉じる</button>
                                    </div>
                                    <div class="media-zoom">
                                        <div class="media-zoom-wrap">
                                            <div class="p-info-sp d-pc-none d-tb-none">
                                                <span class="label">商品名：</span><span
                                                    class="value">{{ $product->title ?? '' }}</span>
                                            </div>
                                            <div class="media-zoom-header">
                                                @if (isset($product->factoryProduct) && isset($product->factoryProduct->factory))
                                                    <a href="{{ $product->factoryProduct->factory->url_image ?? '' }}"
                                                        target="_blank">
                                                        <img src="{{ $product->factoryProduct->factory ? getLink('media' . '/' . $product->factoryProduct->factory->avatar->path) : '' }}"
                                                            alt="" />
                                                    </a>
                                                @endif
                                                <ul class="product-info d-sp-none">
                                                    <li class="info-item"><span class="label">商品名：</span><span
                                                            class="value">{{ $product->title ?? '' }}</span></li>
                                                    <li class="info-item">
                                                        <span class="label">メーカー：</span>
                                                        @if (isset($product->factoryProduct) && isset($product->factoryProduct->factory))
                                                            <span
                                                                class="value">{{ $product->factoryProduct->factory->title ?? '' }}</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-zoom-main-slider">
                                                <div class="item">
                                                    <div class="large-media-item">
                                                        <img src="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}"
                                                            alt="" />
                                                    </div>
                                                </div>
                                                @foreach ($product->image_slider as $key => $image)
                                                    <div class="item">
                                                        <div class="large-media-item">
                                                            <img src="{{ $image->path ? getLink('media' . '/' . $image->path) : '' }}"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                    <div class="media-zoom-footer">
                                        <div class="media-zoom-footer-slider">
                                            <div class="item">
                                                <div class="thumb-media-item">
                                                    <img src="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}"
                                                        alt="" />
                                                </div>
                                            </div>
                                            @foreach ($product->image_slider as $key => $image)
                                                <div class="item">
                                                    <div class="thumb-media-item">
                                                        <img src="{{ $image->path ? getLink('media' . '/' . $image->path) : '' }}"
                                                            alt="" />
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="zoom-content-footer">
                                        <div class="help-group1">
                                            <img class="d-sp-none"
                                                src="{{ asset('frontend/assets/images/cms4/help-icon.svg') }}"
                                                alt="" />
                                            <img class="d-pc-none d-tb-none"
                                                src="{{ asset('frontend/assets/images/cms4/help-icon-sp.svg') }}"
                                                alt="" />
                                            <div class="caption">
                                                <div class="title">Life Star 無料webサービス</div>
                                                <div class="sub-title">優良事業者を無料でお探しいたします</div>
                                            </div>
                                        </div>

                                        <div class="help-button-wrap">
                                            <a href="/info/contact.php" class="help-button">
                                                <div class="button-wrap">
                                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="19"
                                                        height="18.998" viewBox="0 0 19 18.998">
                                                        <defs>
                                                            <filter id="Path_3863" x="0" y="0" width="19"
                                                                height="18.998" filterUnits="userSpaceOnUse">
                                                                <feOffset dy="1" input="SourceAlpha" />
                                                                <feGaussianBlur stdDeviation="1" result="blur" />
                                                                <feFlood flood-opacity="0.051" />
                                                                <feComposite operator="in" in2="blur" />
                                                                <feComposite in="SourceGraphic" />
                                                            </filter>
                                                        </defs>
                                                        <g id="external" transform="translate(3 2)">
                                                            <g transform="matrix(1, 0, 0, 1, -3, -2)"
                                                                filter="url(#Path_3863)">
                                                                <path id="Path_3863-2" data-name="Path 3863"
                                                                    d="M23.265,2.094c-.393-.163-.164-.06-6.358-.093a1.182,1.182,0,1,0,0,2.363h3.055l-8.616,8.616a1.181,1.181,0,1,0,1.671,1.671l8.616-8.615V9.09A1.182,1.182,0,0,0,24,9.09c-.031-6.224.072-5.967-.091-6.358a1.182,1.182,0,0,0-.64-.638Z"
                                                                    transform="translate(-8 0)" fill="#fff" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="red-text">
                                                        <span class="text-1">親切<small>に</small>対応</span><br>
                                                        <span class="text-2">してくれる</span>
                                                    </span>
                                                    <span class="main-text">
                                                        <span>事業者を</span><br>
                                                        探してもらう
                                                    </span>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="help-button-wrap">
                                            <a href="/info/contact.php " class="help-button">
                                                <div class="button-wrap">
                                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="19"
                                                        height="18.998" viewBox="0 0 19 18.998">
                                                        <defs>
                                                            <filter id="Path_3863" x="0" y="0" width="19"
                                                                height="18.998" filterUnits="userSpaceOnUse">
                                                                <feOffset dy="1" input="SourceAlpha" />
                                                                <feGaussianBlur stdDeviation="1" result="blur" />
                                                                <feFlood flood-opacity="0.051" />
                                                                <feComposite operator="in" in2="blur" />
                                                                <feComposite in="SourceGraphic" />
                                                            </filter>
                                                        </defs>
                                                        <g id="external" transform="translate(3 2)">
                                                            <g transform="matrix(1, 0, 0, 1, -3, -2)"
                                                                filter="url(#Path_3863)">
                                                                <path id="Path_3863-2" data-name="Path 3863"
                                                                    d="M23.265,2.094c-.393-.163-.164-.06-6.358-.093a1.182,1.182,0,1,0,0,2.363h3.055l-8.616,8.616a1.181,1.181,0,1,0,1.671,1.671l8.616-8.615V9.09A1.182,1.182,0,0,0,24,9.09c-.031-6.224.072-5.967-.091-6.358a1.182,1.182,0,0,0-.64-.638Z"
                                                                    transform="translate(-8 0)" fill="#fff" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="red-text">
                                                        <span class="text-1">すぐ納品</span><br>
                                                        <span class="text-2">してくれる</span>
                                                    </span>
                                                    <span class="main-text">
                                                        <span>事業者を</span><br>
                                                        探してもらう
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end zoom popup -->
                        </div>
                    </div>
                </div>
                <div class="media-right">
                    <div class="brand">
                        @if (isset($product->factoryProduct) && isset($product->factoryProduct->factory))
                            <a href="{{ $product->factoryProduct->factory->url_image ?? '' }}" target="_blank">
                                @php
                                    $width = $product->factoryProduct->factory->width_image
                                        ? 'width:' . $product->factoryProduct->factory->width_image . 'px;'
                                        : '';
                                    $height = $product->factoryProduct->factory->height_image
                                        ? 'height:' . $product->factoryProduct->factory->height_image . 'px;'
                                        : '';
                                    $max_with = 'max-width:unset;';
                                @endphp
                                <img style="{{ $width . ' ' . $height . ' ' . $max_with }}"
                                    src="{{ $product->factoryProduct->factory ? getLink('media' . '/' . $product->factoryProduct->factory->avatar->path) : '' }}"
                                    alt="" />
                            </a>
                        @endif
                    </div>
                    <div class="media-thumb-scroll-sp">
                        <div class="media-thumb">
                            <div class="thumb active"
                                data-image="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}">
                                <img
                                    src="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}" />
                            </div>
                            @foreach ($product->image_slider as $key => $image)
                                <div class="thumb"
                                    data-image="{{ $image->path ? getLink('media' . '/' . $image->path) : '' }}">
                                    <img src="{{ $image->path ? getLink('media' . '/' . $image->path) : '' }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="note">
                        {!! $product->note ?? '' !!}
                    </div>
                </div>
            </div>

            <div class="cms4-detail-tab kc-tab">
                <ul class="tab-nav">
                    <li class="active" data-tab-id="cms4-detail-tab-1">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/cms4/arrow-active.svg') }}" alt="" />
                            <span>製品の情報</span>
                        </a>
                    </li>
                    <li data-tab-id="cms4-detail-tab-2">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/cms4/arrow-active.svg') }}" alt="" />
                            <span>近隣の取扱い店</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="kc-tab-content show" id="cms4-detail-tab-1">
                        @if ($product->content)
                            @foreach ($product->content as $key => $item)
                                <div class="tab-1-description">
                                    <h3 class="tab-1-title">{{ $item['title'] ?? '' }}</h3>
                                    <div class="pro-desc">
                                        {!! $item['content'] ?? '' !!}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if (isset($product->factoryProduct) && isset($product->factoryProduct->factory))
                            <div class="company-website">
                                <h3 class="title"><span>メーカー公式サイト</span></h3>
                                <div class="desc">{{ $product->factoryProduct->factory->description }}</div>
                                <div class="list-webs">
                                    @if ($product->factoryProduct->factory->content)
                                        @foreach ($product->factoryProduct->factory->content as $keyFactory => $content)
                                            @if (isset($content['url']) && isset($content['title']))
                                                <a target="_blank"
                                                    href="{{ $content['url'] ?? '' }}">{{ $content['title'] ?? '' }}<img
                                                        src="{{ asset('frontend/assets/images/external-link-2.svg') }}"
                                                        alt="" /></a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- List Company -->
                    @include($module . '::partials.section_company')
                    <!-- end List Company-->
                </div>
            </div>
            @if (!empty($productsRelated))
                <div class="cms4-detail-section ">
                    <div class="cms4-section-title">この製品に関連する製品</div>
                    <div class="top-product-slider owl-carousel has-flick">
                        @foreach ($productsRelated as $key => $product)
                            <div class="item">
                                <div class="top-product-item">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        <div class="thumb">
                                            <div class="ratio ratio-1:1">
                                                <img src="{{ $product->avatar ? getLink('media' . '/' . $product->avatar->path) : '' }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="pro-title">{{ $product->title }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="cms4-detail-section">
                <div class="cms4-section-inner-title">特集・記事</div>
                @include($module . '::partials.section_features_articles')
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            @include('homepage::sidebar.area')
            @include('homepage::sidebar.testimonials_box')
            <!-- testimonials box -->
            <div class="sidebar--area">
                @if ($listUseful)
                    @include('homepage::partials.news_widget_item')
                @endif
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="cms4-cta-fixed d-pc-none d-tb-none">
            <a href="#" class="kc-cta-button hotline">
                <span class="text">電話<small>する</small></span>
                <svg id="telephone" xmlns="http://www.w3.org/2000/svg" width="19" height="19.001"
                    viewBox="0 0 19 19.001">
                    <g id="Group_4903" data-name="Group 4903">
                        <path id="Path_5385" data-name="Path 5385"
                            d="M14.451,56.882a1.331,1.331,0,0,0-2.013,0c-.471.467-.941.933-1.4,1.408a.277.277,0,0,1-.387.071c-.3-.166-.629-.3-.921-.482a14.6,14.6,0,0,1-3.519-3.2,8.337,8.337,0,0,1-1.261-2.02.289.289,0,0,1,.071-.372c.471-.455.929-.921,1.392-1.388a1.336,1.336,0,0,0,0-2.06c-.368-.372-.735-.735-1.1-1.107s-.755-.763-1.139-1.139a1.34,1.34,0,0,0-2.013,0c-.474.467-.929.945-1.412,1.4a2.291,2.291,0,0,0-.72,1.546,6.55,6.55,0,0,0,.506,2.819,17.13,17.13,0,0,0,3.041,5.065A18.815,18.815,0,0,0,9.8,62.3a9.012,9.012,0,0,0,3.452,1,2.53,2.53,0,0,0,2.171-.826c.4-.451.858-.862,1.285-1.293a1.345,1.345,0,0,0,.008-2.048Q15.586,58.007,14.451,56.882Z"
                            transform="translate(-0.006 -44.313)" fill="#fff" />
                        <path id="Path_5386" data-name="Path 5386"
                            d="M242.14,101.622l1.459-.249A6.549,6.549,0,0,0,238.06,96l-.206,1.467a5.061,5.061,0,0,1,4.286,4.155Z"
                            transform="translate(-228.45 -92.204)" fill="#fff" />
                        <path id="Path_5387" data-name="Path 5387"
                            d="M249.128,3.076A10.758,10.758,0,0,0,242.96,0l-.206,1.467a9.387,9.387,0,0,1,7.943,7.7l1.459-.249A10.837,10.837,0,0,0,249.128,3.076Z"
                            transform="translate(-233.156)" fill="#fff" />
                    </g>
                </svg>
            </a>
            <a href="#" class="kc-cta-button estimate">
                <span class="text">見積り<small>（無料）</small></span>
            </a>
            <a href="#" class="kc-cta-button email">
                <span class="text">相談<small>する</small></span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19.059"
                    height="23" viewBox="0 0 19.059 23">
                    <defs>
                        <filter id="email_2_" x="0" y="0" width="19.059" height="23" filterUnits="userSpaceOnUse">
                            <feOffset dy="1" input="SourceAlpha" />
                            <feGaussianBlur result="blur" />
                            <feFlood flood-color="#fd9cbe" />
                            <feComposite operator="in" in2="blur" />
                            <feComposite in="SourceGraphic" />
                        </filter>
                    </defs>
                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#email_2_)">
                        <path id="email_2_2" data-name="email (2)"
                            d="M20.67,14.289H6.694A1.844,1.844,0,0,0,5,16.244v8.8A1.844,1.844,0,0,0,6.694,27H20.67a1.844,1.844,0,0,0,1.694-1.956v-8.8A1.844,1.844,0,0,0,20.67,14.289Zm-13.976.978H20.67a.316.316,0,0,1,.148.024L13.958,21.72a.373.373,0,0,1-.529,0L6.546,15.291a.316.316,0,0,1,.148-.024Zm-.847,9.778v-8.8a1.2,1.2,0,0,1,.042-.293l5.04,4.693-5.04,4.693a1.4,1.4,0,0,1-.042-.293Zm14.823.978H6.694A.316.316,0,0,1,6.546,26l5.061-4.742,1.292,1.2a1.178,1.178,0,0,0,1.609,0l1.292-1.2L20.861,26A.636.636,0,0,1,20.67,26.022Zm.847-.978a1.4,1.4,0,0,1-.042.293l-5.04-4.693,5.019-4.693a1.4,1.4,0,0,1,.042.293v8.8ZM23.932,7.3,22.661,8.764a.373.373,0,0,1-.593,0,.524.524,0,0,1,0-.684l.551-.636H17.282a.494.494,0,0,1,0-.978h5.336l-.551-.636a.524.524,0,0,1,0-.684.373.373,0,0,1,.593,0l1.271,1.467A.524.524,0,0,1,23.932,7.3Zm-.72,3.569a.461.461,0,0,1-.424.489H17.452l.551.636a.524.524,0,0,1,0,.684.373.373,0,0,1-.593,0l-1.271-1.467a.524.524,0,0,1,0-.684l1.271-1.467a.373.373,0,0,1,.593,0,.524.524,0,0,1,0,.684l-.551.636h5.336A.461.461,0,0,1,23.212,10.867Z"
                            transform="translate(-5 -5)" fill="#fff" />
                    </g>
                </svg>
                <span class="pp">無料です</span>
            </a>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .cms4-store-item .item-left .rank-address {
            align-items: unset;
        }

        .cms4-store-item .item-left .desc {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            overflow: hidden;
        }

        .cms4-store-item .item-left .tags .tag:nth-of-type(1),
        .cms4-store-item .item-left .tags .tag:nth-of-type(2),
        .cms4-store-item .item-left .tags .tag {
            border-radius: unset;
        }
    </style>
@endpush
