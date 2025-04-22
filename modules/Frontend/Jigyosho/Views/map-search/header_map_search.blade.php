<div class="header">
  <div class="menu-wrap ">
    <!-- menu start -->
    <div class="container">
      <div class="box-menu">
        <!-- menu start -->
        <div class="menu">
          <!-- logo start -->
          <a href="/" class="menu__logo">
            <img class="pc" src="{{ asset('frontend/jigyosho/issets/images/LSlogo-pctb.svg')}}" alt="" />
            <img class="sp" src="{{ asset('frontend/jigyosho/issets/images/LSlogo-sp.svg')}}" alt="" />
          </a>
          <!-- logo end -->

          <!-- item menu start -->
          <div class="menu-tab">
            <div class="menu-tab__item">

            </div>
            <div class="menu-tab__item">

            </div>
            <div class="menu-tab__item">

            </div>
            <div class="menu-tab__item">

            </div>
          </div>
          <!-- item menu end -->

          <!-- btn menu start -->

          <div class="menu-btn">

            <!-- btn hamburger start -->
            <div class="menu-btn__hamburgers">
              <div class="menu-btn__hamburgers-icon">
                <!-- <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/nav-humberger.svg') }}" alt=""> -->
                <div class="menu-btn__nav-item"></div>
                <div class="menu-btn__nav-item"></div>
                <div class="menu-btn__nav-item"></div>
              </div>
              <p class="menu-btn__hamburgers-text">メニュー</p>
              <div class="menu-btn__hamburgers-arrow">
                <img src="{{ asset('frontend/jigyosho/issets/images/icon_menu/arrow-right.svg') }}" alt="" />
              </div>
            </div>
            <!-- btn hamburger end -->
          </div>
          <!-- btn menu end -->
        </div>
        <!-- menu end -->

        <!-- nav menu show start -->
        <div class="box-nav">
          <div class="nav">
            <div class="nav-title">
              <p class="nav-title__text">ご用意しているもの</p>
            </div>

            <!-- box option start -->
            <div class="box-option">
              <!-- start option -->
              <div class="nav-option">
                <div class="nav-option-left">
                  <div class="nav-option-left__img">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/support.svg') }}" alt="" />
                  </div>
                  <p class="nav-option-left__text--blue">User's Guide</p>
                </div>

                <div class="nav-option-right">

                  <a href="../info/guide.php" target="">
                    <p class="nav-option-right__title--blue">
                      サイトのご利用方法
                    </p>
                  </a>
                  <p class="nav-option-right__detail--pink">
                    使い方をわかりやすくご説明
                  </p>
                </div>
              </div>
              <!-- start end -->

              <!-- start option -->
              <div class="nav-option nav-option-third">
                <div class="nav-option-left">
                  <div class="nav-option-left__img">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Shape.svg') }}" alt="" />
                  </div>
                  <p class="nav-option-left__text--blue">Home care</p>
                </div>

                <div class="nav-option-right">
                  <p class="nav-option-right__title--pink">
                    地域の支援者をさがす
                  </p>
                  <p class="nav-option-right__detail--pink">
                    あなたの町に在宅療養の支援者がきっといます
                  </p>
                </div>

                <div class="nav-option-search">
                </div>
              </div>
              <!-- start end -->

              <!-- option type2 start -->
              <div class="nav-two">

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問医師">/変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問医師">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">医師</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home Health Care Doctors
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/stethoscope.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問看護師">/ 変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問看護師">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">看護師</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home Nursing
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/nurse.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問介護士"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問介護士">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">介護士</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home Care
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/carer.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問入浴"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問入浴">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">入浴</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home-visit Bathing
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Home-visit Bathing.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=公共相談所"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=公共の相談所">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">介護の</span>
                        <span class="nav-item__content-title--big">公共相談所</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home Care Counseling Center
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Home-Care-Counseling-Center.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=専門相談員"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=専門相談員（無料）">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">介護の</span>
                        <span class="nav-item__content-title--big">専門相談員</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Care manager
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Care-manager.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問リハビリ"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問リハビリ">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">リハビリ</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home Visits Rehabilitation
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Home-Visits-Rehabilitation.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=福祉用具（ベッド他）"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=福祉用具（ベッド他）">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--big">福祉用具</span>
                        <span class="nav-item__content-title--small">（レンタル）<br>（ 販売 ）</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Assistive products
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Assistive-products.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=訪問薬局"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=訪問薬局">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">薬局</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Home-visit pharmacy
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Home-visit pharmacy.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php  //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=あん摩・鍼灸"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=あん摩・鍼灸">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--big">あん摩・鍼灸</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Masseuse,Acupuncture and Moxibustion
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Masseuse-Acupuncture-and-Moxibustion.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php  //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=夜間対応訪問介護"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=夜間対応訪問介護">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">夜間対応型 訪問</span>
                        <span class="nav-item__content-title--big">介護</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Nighttime home-visit care
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Nighttime-home-visit-care.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

                <!-- start item two  -->
                <?php  //<a class="nav-item" href="https://test01.lifestar.co.jp/TopNarrow-1?search_category=定期巡回"> //変更 (@ edited by a.u  2023.7.20)  ?>
                <a class="nav-item" href="../jigyosho/TopNarrow-1?search_category=定期巡回">
                  <div class="data-menu">
                    <div class="nav-item__line"></div>
                    <div class="nav-item__content">
                      <span class="nav-item__content-title--middle" style="display: block">定期巡回・随時対応</span>
                      <p class="nav-item__content-title">
                        <span class="nav-item__content-title--middle">訪問</span>
                        <span class="nav-item__content-title--big">看護 介護</span>
                      </p>
                      <p class="nav-item__content-detail">
                        Routine home care and nursing care
                      </p>
                    </div>
                  </div>
                  <div class="nav-item__icon">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/Routine-home-care-and-nursing-care.svg') }}" alt="" />
                  </div>
                </a>
                <!-- end item two  -->

              </div>
              <!-- option type2 end -->
            </div>
            <!-- box option end -->

            <!-- nav close start -->
            <div class="box-option-close">
              <div class="box-option-close__circle">
                <img src="{{ asset('frontend/jigyosho/issets/images/icon_nav/close.svg') }}" alt="" />
              </div>
              <div class="box-option-close__text">
                <p>閉じる</p>
              </div>
            </div>

            <!-- nav close end -->
          </div>
        </div>

        <!-- nav menu show end -->
      </div>
    </div>
    <!-- menu end -->
  </div>
</div>
