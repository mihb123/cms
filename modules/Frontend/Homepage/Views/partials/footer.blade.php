<footer class="main-footer">
    <div class="container">
        <div class="main-footer-wrap">
            <!-- Site Map -->
            @include('homepage::partials.site_map')
            <!-- End Site Map -->

            <div class="backtop-backpage-2 d-pc-none d-tb-none">
                <a href="{{ url('/') }}" class="back-to-page">
                    <img src="{{ asset('frontend/assets/images/backpage.svg') }}" alt="">
                    <span>TOPページへもどる</span>
                </a>
                <a href="#" class="back-to-top">
                    <img src="{{ asset('frontend/assets/images/back-top.svg') }}" alt="">
                    <span>ページの先頭へ戻る</span>
                </a>
            </div>

            <div class="top-slogan-bottom d-pc-none d-sp-none">
                最期までより良く生きられる社会を<br>
                皆さんと ご一緒に。
            </div>

            <div class="logo-footer">
                <img class="d-sp-none" src="{{ asset('frontend/assets/images/LSlogo-sp.svg') }}" style="width:200px;" alt="">
                <img class="d-pc-none d-tb-none" src="{{ asset('frontend/assets/images/logo-white.svg') }}" alt="" />
            </div>
            <div class="footer-slogan-en d-pc-none">
                <span class="text">
                    <img class="star-tb" src="{{ asset('frontend/assets/images/stairs.svg') }}" alt="" />
                    Together with you, let us build a society where people can live better until the end of their lives.
                </span>
            </div>
            <div class="list-staff-img">
                <img class="d-sp-none" src="{{ asset('frontend/assets/images/footer-staff.png') }}" alt="staff" />
{{--                <object type="image/svg+xml" class="d-sp-none" data="{{ asset('frontend/assets/images/list-staff.svg') }}" ></object>--}}
                <object type="image/svg+xml" class="d-pc-none d-tb-none" data="{{ asset('frontend/assets/images/list-staff-sp.svg') }}" ></object>
{{--            <a class="twitter-icon d-tb-none d-sp-none" href="#">
            <img src="{{ asset('frontend/assets/images/twitter.png') }}" width="36px" height="36px" alt="" />
                </a>
--}}
            </div>
            <div class="list-links">
                <div class="list-links--col">
                    <div class="menu-footer">
                        <h3 class="title">サービスのご案内</h3>
                        <ul>
                            <li><a href="/info/guide/lifestar.php">>  Life Star .co.jpについて</a></li>
                            <li><a href="/info/guide.php">>  ご利用方法のご案内</a></li>
                            <li></li>
                            <li><a href="/info/partners.php">>  パートナー企業制度</a></li>
                            <li><a href="/info/aboutadvertisements.php">>  広告掲載について</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list-links--col">
                    <div class="menu-footer">
                        <h3 class="title">企業情報</h3>
                        <ul>
                            <li><a href="/info/about.php">>  会社概要</a></li>
                            <li><a href="/info/about/purpose.php">>  事業の目的</a></li>
                            <li><a href="/info/about/issues.php">>  取り組む課題</a></li>
                            <li><a href="/info/about/basicpolicy.php">>  基本方針</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list-links--col">
                    <div class="menu-footer">
                        <h3 class="title">ご本人とご家族の憲章</h3>
                        <ul>
                            <li><a href="/info/charter.php#charter_personal">>  ご本人の権利憲章</a></li>
                            <li><a href="/info/charter.php#charter_family">>  ご家族の権利憲章</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list-links--col">
                    <div class="menu-footer">
                        <h3 class="title">プライバシーポリシー</h3>
                        <ul>
                            <li><a href="/info/about/privacypolicy.php#summary7-line-1">>  個人情報保護方針</a></li>
                            <li><a href="/info/about/privacypolicy.php#summary7">>  個人情報の取り扱い</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list-links--col last-column">
                    <div class="menu-footer">
                        <h3 class="title">その他</h3>
                        <ul>
                            <li><a href="/info/contribution.php">>  ご寄付について</a></li>
                            <li><a href="/info/tokushoho.php">>  特定商取引法に関する表記</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sponsor -->
            <div class="sponsor d-pc-none d-sp-none">
                @if(isset($listPartner))
                    <h2 class="title">ご協賛</h2>
                    <div class="sponsor-box">
                        <div class="title-box">より良い最期を過ごせる社会を企業の皆様と一緒に。　Life Starゴールドパートナー。</div>
                        <div class="sponsor-list">
                            @foreach($listPartner as $key => $partner)
                                @if(isset($partner->avatar->path))
                                    <a href="{{ $partner->url }}" class="sponsor-item">
                                        <img src="{{ getImageThumb($partner->avatar->path) }}" alt="" />
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="sponsor-note">
                        <span>※</span>
                        <span>お名前の掲載は、ご協賛金額により自動で表示の大きさや位置が変わる設定となっております。<br>
                            あらかじめご了承くださいますようお願い申し上げます。</span>
                    </div>
                    <div class="register-sponsor"><a href="/info/inquiry.php" target="_blank">ご協賛のお申し込みフォームはこちら ＞</a></div>
                @endif
            </div>
            <!-- End Sponsor -->
            <!-- Notice -->
            <div class="notice">
                <h3 class="title">
                    お知らせ
                </h3>
                <div class="list-notices">
                    @if(isset($listNotice) && $listNotice)
                        @foreach ($listNotice as $key => $notice)
                            <a class="notice-item" href="{{ route('notification.detail', $notice->id)}}">
                                <div class="meta">
                                    <span class="cat" style ="{{ $notice->noticeCategory->color ? 'background:'.$notice->noticeCategory->color : '' }}">{{ isset($notice->noticeCategory) && $notice->noticeCategory ? $notice->noticeCategory['title']: ''}}</span>
                                    <?php //<span class="date">{{ handleDateFormat($notice->created_at) }}</span> //「お知らせ」の投稿を「更新日時」の降順で表示変更 (@ edited by a.u  2024.11.01)  ?>
                                    <span class="date">{{ handleDateFormat($notice->sort) }}</span>
                                </div>
                                <h3 class="title">{{ $notice->title }}</h3>
                                <span class="arrow-right">≫</span>
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="more-notice text-right">
                    <a href="{{ route('notification.index') }}" class="link-with-icon">
                        <span class="text">お知らせ一覧</span>
                        <img src="{{ asset('frontend/assets/images/list-icon.svg') }}" alt="" />
                    </a>
                </div>
            </div>
            <!-- End Notice -->

            <!-- Contact -->
                @include('homepage::partials.contact_us')
            <!-- End Contact -->
{{--        <div class="text-center d-pc-none d-tb-none footer-twitter">
                <a class="twitter-icon" href="#">
                    <img src="{{ asset('frontend/assets/images/twitter.png') }}" width="28px" height="28px" alt="" />
                </a>
            </div>
--}}
            <div class="footer-slogan-ja d-pc-none d-tb-none">
                最期までより良く生きられる社会を<br>
                皆さんと ご一緒に。
            </div>

            <div class="copyright-sp d-pc-none">
                ©Personal Life Japan 2022, All rights reserved
            </div>

            <div class="d-pc-none footer-operating">
                Web Direction / Engineering : Aki Ueki, Ei Gyu<br>
                Photography : Yasuo Ishi, Miku Fujita<br>
                Follw Staff  : Chiharu Kawakita<br>
                Design / Illustration : Yuta Sudou<br>
                Model : 7A
            </div>
        </div>
    </div>
    <div class="copyright d-sp-none"><span>© Life Star .co.jp</span></div>
</footer>
