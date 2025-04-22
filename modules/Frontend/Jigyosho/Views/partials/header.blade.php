<header>
    <div class="header">
        <div class="menu-wrap">
            <div class="container">
                <div class="top--line d-sp-none"></div>
                <div class="box-menu">
                    <div class="lifestar-head--text">
                        <span class="life-star">Life Star-laravel</span>
                        <span class="description">（ﾗｲﾌｽﾀｰ）では、療養生活を送るすべての方々の医療･介護･暮らしの支援事業者の検索が可能です</span>
                    </div>
                    <div class="menu">
                        <!-- Logo -->
                        <a href="/" class="menu__logo">
                            <!-- <div class="doctor-icon"> -->
                                <img class="pc doctor-icon" src="{{ asset('frontend/jigyosho/issets/images/illust-docter.svg') }}" alt="Doctor Illustration" />
                            <!-- </div> -->
                                <img class="pc" src="{{ asset('frontend/jigyosho/issets/images/LSlogo-pctb.svg') }}" alt="Logo PC" />
                                <img class="sp" src="{{ asset('frontend/jigyosho/issets/images/LSlogo-sp.svg') }}" alt="Logo SP" />
                        </a>

                        <!-- Menu Tabs -->
                        <div class="menu-tab">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="menu-tab__item"></div>
                            @endfor
                        </div>

                        <!-- Menu Button -->
                        <div class="menu-btn">
                            <div class="menu-btn__hamburgers">
                                <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/nav-humberger-pink.svg') }}" alt="Hamburger Icon" />
                                <p class="menu-btn__hamburgers-text">Menu</p>
                                <div class="menu-btn__hamburgers-arrow">
                                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_menu/arrow-right.svg') }}" alt="Arrow Right" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-nav-custom">
                        <div class="background-rect"></div>
                        <div class="top-bar"></div>
                        <div class="left-bar"></div>
                        <div class="text-content">
                            療養生活を支えてくれる医療･介護･暮らしの支援事業者を探す
                        </div>
                    </div>
                    <!-- Navigation Menu -->
                    <div class="box-nav">
                        <div class="nav">
                            <div class="nav-title">
                                <p class="nav-title__text">ご用意しているもの</p>
                            </div>

                            <div class="box-option">
                                <!-- User's Guide -->
                                <div class="nav-option">
                                    <div class="nav-option-left">
                                        <div class="nav-option-left__img">
                                            <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/support.svg') }}" alt="Support Icon" />
                                        </div>
                                        <p class="nav-option-left__text--blue">User's Guide</p>
                                    </div>
                                    <div class="nav-option-right">
                                        <a href="{{ asset('frontend/jigyosho/guide.php') }}">
                                            <p class="nav-option-right__title--blue">サイトのご利用方法</p>
                                        </a>
                                        <p class="nav-option-right__detail--pink">使い方をわかりやすくご説明</p>
                                    </div>
                                </div>

                                <!-- Home Care -->
                                <div class="nav-option nav-option-third">
                                    <div class="nav-option-left">
                                        <div class="nav-option-left__img">
                                            <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Shape.svg') }}" alt="Shape Icon" />
                                        </div>
                                        <p class="nav-option-left__text--blue">Home care</p>
                                    </div>
                                    <div class="nav-option-right">
                                        <p class="nav-option-right__title--pink">地域の支援者をさがす</p>
                                        <p class="nav-option-right__detail--pink">あなたの町に在宅療養の支援者がきっといます</p>
                                    </div>
                                </div>

                                <!-- Dynamic Menu Items -->
                                <div class="nav-two">
                                    @php
                                        $menuItems = [
                                            ['url' => '訪問医師', 'title' => '医師', 'subtitle' => '訪問', 'detail' => 'Home Health Care Doctors', 'icon' => 'stethoscope.svg'],
                                            ['url' => '訪問看護師', 'title' => '看護師', 'subtitle' => '訪問', 'detail' => 'Home Nursing', 'icon' => 'nurse.svg'],
                                            ['url' => '訪問介護士', 'title' => '介護士', 'subtitle' => '訪問', 'detail' => 'Home Care', 'icon' => 'carer.svg'],
                                            ['url' => '訪問入浴', 'title' => '入浴', 'subtitle' => '訪問', 'detail' => 'Home-visit Bathing', 'icon' => 'Home-visit Bathing.svg'],
                                            ['url' => '公共の相談所', 'title' => '公共相談所', 'subtitle' => '介護の', 'detail' => 'Home Care Counseling Center', 'icon' => 'Home-Care-Counseling-Center.svg'],
                                            ['url' => '専門相談員（無料）', 'title' => '専門相談員', 'subtitle' => '介護の', 'detail' => 'Care manager', 'icon' => 'Care-manager.svg'],
                                            ['url' => '訪問リハビリ', 'title' => 'リハビリ', 'subtitle' => '訪問', 'detail' => 'Home Visits Rehabilitation', 'icon' => 'Home-Visits-Rehabilitation.svg'],
                                            ['url' => '福祉用具（ベッド他）', 'title' => '福祉用具', 'subtitle' => '（レンタル）<br>（販売）', 'detail' => 'Assistive products', 'icon' => 'Assistive-products.svg'],
                                            ['url' => '訪問薬局', 'title' => '薬局', 'subtitle' => '訪問', 'detail' => 'Home-visit pharmacy', 'icon' => 'Home-visit pharmacy.svg'],
                                            ['url' => 'あん摩・鍼灸', 'title' => 'あん摩・鍼灸', 'subtitle' => '', 'detail' => 'Masseuse, Acupuncture and Moxibustion', 'icon' => 'Masseuse-Acupuncture-and-Moxibustion.svg'],
                                            ['url' => '夜間対応訪問介護', 'title' => '介護', 'subtitle' => '夜間対応型 訪問', 'detail' => 'Nighttime home-visit care', 'icon' => 'Nighttime-home-visit-care.svg'],
                                            ['url' => '定期巡回', 'title' => '看護 介護', 'subtitle' => '定期巡回・随時対応 訪問', 'detail' => 'Routine home care and nursing care', 'icon' => 'Routine-home-care-and-nursing-care.svg'],
                                        ];
                                    @endphp

                                    @foreach ($menuItems as $item)
                                        <a class="nav-item" href="{{ asset("../jigyosho/TopNarrow-1?search_category={$item['url']}") }}">
                                            <div class="data-menu">
                                                <div class="nav-item__line"></div>
                                                <div class="nav-item__content">
                                                    <p class="nav-item__content-title">
                                                        @if ($item['subtitle'])
                                                            <span class="nav-item__content-title--middle">{!! $item['subtitle'] !!}</span>
                                                        @endif
                                                        <span class="nav-item__content-title--big">{{ $item['title'] }}</span>
                                                    </p>
                                                    <p class="nav-item__content-detail">{{ $item['detail'] }}</p>
                                                </div>
                                            </div>
                                            <div class="nav-item__icon">
                                                <img src="{{ asset("frontend/jigyosho/issets/images/icon_nav/{$item['icon']}") }}" alt="{{ $item['detail'] }}" />
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Close Button -->
                            <div class="box-option-close">
                                <div class="box-option-close__circle">
                                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/close.svg') }}" alt="Close Icon" />
                                </div>
                                <div class="box-option-close__text">
                                    <p>閉じる</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>