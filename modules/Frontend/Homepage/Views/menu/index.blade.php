@if($listMenu && isset($listMenu['menu']->content))
    @if ($listMenu['menu']->status)
        <div class="kc-tab top">
            <!-- Tab menu -->
            <div class="@if(count($listMenu['menu']->content) > 7) has-flick @endif">
                <div class="tab-menu-scroll">
                    <div class="tab-menu">
                        <ul class="tab-menu--list tab-nav d-pc-none">
                            @foreach ($listMenu['menu']->content as $key => $item)
                                @if (isset($listMenu['categories'][$item]))
                                    @php
                                        $route =  route('posts.category', $item);
                                        if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                            $route =  route('tag.list', $item);
                                        }
                                    @endphp
                                    <li class="{{$key + 1 == 1 ? 'active' : '' }}" data-tab-id="menu-tab-{{$key + 1}}">
                                        <a href="{{ $route}}">{!! $listMenu['categories'][$item]->title !!}</a>
                                        <span class="caret">
                                            <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}" alt="" />
                                            <span class="d-pc-none d-tb-none max-w-100">
                                                @include("homepage::svg.arrow-down-2")
                                            </span>
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="swiper menu-tab-slider tab-menu--list tab-nav d-tb-none d-sp-none">
                            <div class="swiper-wrapper">
                                @foreach ($listMenu['menu']->content as $key => $item)
                                    @if (isset($listMenu['categories'][$item]))
                                        @php
                                            $route =  route('posts.category', $item);
                                            if (!empty($listMenu['categoryTags']) && !empty($listMenu['categoryTags'][$item])) {
                                                $route =  route('tag.list', $item);
                                            }
                                        @endphp
                                        <div class="swiper-slide nav-item {{$key + 1 == 1 ? 'active' : '' }}" data-tab-id="menu-tab-{{$key + 1}}">
                                            <a href="{{$route}}">{!! $listMenu['categories'][$item]->title !!}</a>
                                            <span class="caret">
                                                <img class="d-sp-none" src="{{ asset('frontend/assets/images/arrow-down.svg') }}" alt="" />
                                                <span class="d-pc-none d-tb-none max-w-100">
                                                    @include("homepage::svg.arrow-down-2")
                                                </span>
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="/info/about.php" class="tab-menu--about-button d-tb-none d-sp-none">
                        <span class="text-ja">私たちについて   ></span>
                        <span class="text-en">About us, our company</span>
                    </a>
                </div>
            </div>
            <!-- End Tab menu -->
            <!-- Tab content -->
            <div class="tab-content-wrap">
                <div class="outside-text">知る</div>
                <div class="tab-content">
                    <div class="tab-content-left">
                    @foreach ($listMenu['menu']->content as $key => $item)
                        @if (isset($listMenu['categoryTags'][$item]))
                            <!-- Tab menu item tag -->
                            @include('homepage::menu.tag')
                            <!-- End Tab menu item tag -->
                        @elseif(isset($listMenu['catePost'][$item]))
                            <!-- Tab menu item tag -->
                            @include('homepage::menu.posts')
                            <!-- End Tab menu item tag -->
                            @endif
                        @endforeach
                    </div>

                    <div class="tab-content-right d-tb-none d-sp-none">
                        <!-- testimonials box -->
                        <a class="testimonials-box" href="{{ route('mitori-taiken.index') }}">
                            <div class="speech-bubble">
                                <span>家族が語る</span>
                                <span>看取りの話</span>
                            </div>
                            <h3 class="title">
                                私の看取り体験談
                            </h3>
                            <div class="sub-title-en">Stories of each family</div>
                            <img class="people" src="{{ asset('frontend/assets/images/people.png') }}" alt="">
                            <div class="desc">
                                大切な家族を看取った方々が自分自身の言葉で看取りを振り返り、上手くできたことやもっとこうすれば良かったことなどを、リアルな体験談としてシェアをしてくれています。
                            </div>
                            <div class="psychological-care">
                                <img class="house" src="{{ asset('frontend/assets/images/house-cleaning.png') }}" alt=""/>
                                <img class="beds" src="{{ asset('frontend/assets/images/beds.png') }}" alt=""/>
                                <span class="text">Psychological care</span>
                            </div>
                            <div class="text-center">
                                <span href="" class="read-more">体験談を読んでみる</span>
                            </div>
                            <span href="#" class="arrow-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                     viewBox="0 0 6.935 10.758">
                                    <path id="path9429"
                                          d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                          transform="translate(-1.976 -291.965)" fill="#fff"/>
                                </svg>
                            </span>
                        </a>
                        <!-- testimonials box -->
                    </div>
                </div>
            </div>
            <!-- End Tab content -->
        </div>
    @endif
@endif

