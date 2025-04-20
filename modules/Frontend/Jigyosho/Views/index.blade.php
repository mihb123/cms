@extends('jigyosho::layout')

@section('title', 'Homepage - Life Star')

@section('content')

  <div class="top-img-container">
    <div class="top-img"></div>
  </div>
  <!-- section01 start-->
  <div class="section-1">
    <div class="container">
      <div class="search-option-text">Search by area</div>
      <div style="display: flex">
        <div class="search-option-logo__text top-text">［Tokyo-東京］</div>
        <div class="dropdown-option-text">
          <div class="dropdown-option-text-1">東京都の療養支援事業者数</div>
          <div class="dropdown-option-text-2">
            <div>4,830</div>
            <div>件</div>
          </div>
        </div>
      </div>
      <div class="search-option">
        <div class="address-title-option">
          <div class="search-option-title option-address__toggle-dropdown active">
            <div class="search-option-title__text-box item--show1 ">
              <span class="search-option-title__text--big">エリアから探す</span>
              <span class="search-option-title__text--middle">（東京都）</span>
            </div>
            <svg class="triangle-indicator" width="41" height="20" viewBox="0 0 41 20">
              <path d="M0,0H41L20.5,19Z" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="search-option-title option-address__toggle-map">
            <div class="search-option-title__text-box item--show1">
              <span class="search-option-title__text--big">地図から探す</span><span
                class="search-option-title__text--middle">（東京都）</span>
            </div>
            <svg class="triangle-indicator" width="41" height="20" viewBox="0 0 41 20">
              <path d="M0,0H41L20.5,19Z" fill="#ffb1bf" />
            </svg>
          </div>
        </div>
        <div class="search-option-logo">
          <div class="search-option-logo__img-box">
            <!-- <img class="search-option-logo__img-box--pc" src="{{ asset('frontend/jigyosho/issets/images/select01/Group 298.svg') }}" alt="" /> -->
            <img class="search-option-logo__img-box--pc"
              src="{{ asset('frontend/jigyosho/issets/images/select01/Group 300.svg') }}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- title add end -->


    <div class="option-address-container">
      <div class="layer-dropdown-and-map blur-part2"></div>
      <p class="text-address">
        ご自宅のあるエリアから自宅療養を支えてくれる人たちを探す
      </p>
      <div class="option-address">
        <!-- list checkbox banner one start-->
        <div class="option-address__toggle">
          <div class="option-address__item item--show1">
            <div class="option-address__img">
              <img src="{{ asset('frontend/jigyosho/issets/images/select01/img1.svg') }}" alt="" />
            </div>
            <div class="option-address__text">
              <span class="option-address__text--middle">区</span>
              <span class="option-address__text--small">（23区）</span>
            </div>
          </div>

          <div class="option-address__arrow-icon item--show1" id="arrow-one">
            <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
          </div>

          <div class="option-address__check-box option-address__check-box--position1">
            <div class="option-address__checkboxs">
              @foreach (array_chunk($districts, 8) as $column)
                <div class="option-address__col option-address__col-one">
                  @foreach ($column as $index => $district)
                    @php
                      $checkboxId = 'option1-checkbox' . ($loop->parent->index * 8 + $index + 1);
                    @endphp
                    <p class="option-address__checkboxs-item">
                      <input class="banner-checkboxs__item-ip" type="checkbox" name="cb_addr21"
                        id="{{ $checkboxId }}" />
                      <label class="banner-label" for="{{ $checkboxId }}">
                        <span class="banner-label--middle">{{ $district }}</span>
                      </label>
                    </p>
                  @endforeach
                </div>
              @endforeach
            </div>

            <div class="select-btn2">
              <div class="select-btn2__arrow-icon">
                <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
              </div>
              <div class="select-btn2__item--pink select-round disabled" id="select-round-one" position="position1">
                <p class="select-btn2__text--white">決定</p>
              </div>
              <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op1"
                onclick="clearOption(this)">
                <p class="select-btn2__text--pink">リセット</p>
              </div>
            </div>
          </div>
        </div>
        <!-- list checkbox banner one end-->

        <!-- list checkbox banner two start-->
        <div class="option-address__toggle">
          <div class="option-address__item item--show2">
            <div class="option-address__img">
              <img src="{{ asset('frontend/jigyosho/issets/images/select01/img2.svg') }}" alt="" />
            </div>
            <div class="option-address__text">
              <span class="option-address__text--middle">市</span>
              <span class="option-address__text--small">（26市）</span>
            </div>
          </div>

          <div class="option-address__arrow-icon item--show2" id="arrow-two">
            <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
          </div>

          <div class="option-address__check-box option-address__check-box--position2">
            <div class="option-address__checkboxs">
              @foreach (array_chunk($cities, 9) as $column)
                <div class="option-address__col option-address__col-one">
                  @foreach ($column as $index => $city)
                    @php
                      $checkboxId = 'option2-checkbox' . ($loop->parent->index * 9 + $index + 1);
                    @endphp
                    <p class="option-address__checkboxs-item">
                      <input class="banner-checkboxs__item-ip" type="checkbox" name="cb_addr21"
                        id="{{ $checkboxId }}" />
                      <label class="banner-label" for="{{ $checkboxId }}">
                        <span class="banner-label--middle"> {{ $city }}</span>
                      </label>
                    </p>
                  @endforeach
                </div>
              @endforeach
            </div>

            <div class="select-btn2">
              <div class="select-btn2__arrow-icon">
                <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
              </div>
              <div class="select-btn2__item--pink select-round disabled" id="select-round-two" position="position1">
                <p class="select-btn2__text--white">決定</p>
              </div>
              <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op1"
                onclick="clearOption(this)">
                <p class="select-btn2__text--pink">リセット</p>
              </div>
            </div>
          </div>
        </div>
        <!-- list checkbox banner two end-->

        <!-- list checkbox banner three start-->
        <div class="option-address__toggle">
          <div class="option-address__item item--show3">
            <div class="option-address__img">
              <img src="{{ asset('frontend/jigyosho/issets/images/select01/img3.svg') }}" alt="" />
            </div>
            <div class="option-address__text">
              <span class="option-address__text--middle">町</span>
              <span class="option-address__text--small">（5町）</span>
            </div>
          </div>

          <div class="option-address__arrow-icon item--show3" id="arrow-three">
            <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
          </div>

          <div class="option-address__check-box option-address__check-box--position3">
            <div class="option-address__checkboxs">
              @foreach (array_chunk($towns, 2) as $column)
                <div class="option-address__col option-address__col-seven">
                  @foreach ($column as $index => $town)
                    @php
                      $checkboxId = 'option7-checkbox' . ($loop->parent->index * 2 + $index + 1);
                    @endphp
                    <p class="option-address__checkboxs-item">
                      <input class="banner-checkboxs__item-ip" type="checkbox" name="cb_addr21"
                        id="{{ $checkboxId }}" />
                      <label class="banner-label" for="{{ $checkboxId }}">
                        <span class="banner-label--middle">{{ $town }}</span>
                      </label>
                    </p>
                  @endforeach
                </div>
              @endforeach
            </div>

            <div class="select-btn2">
              <div class="select-btn2__arrow-icon">
                <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
              </div>

              <div class="select-btn2__item--pink select-round disabled" id="select-round-three" position="position3">
                <p class="select-btn2__text--white">決定</p>
              </div>
              <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op3"
                onclick="clearOption(this)">
                <p class="select-btn2__text--pink">リセット</p>
              </div>
            </div>
          </div>
        </div>
        <!-- list checkbox banner three end-->


        <!-- list checkbox banner four start-->
        <div class="option-address__toggle">
          <div class="option-address__item item--show4">
            <div class="option-address__img">
              <img src="{{ asset('frontend/jigyosho/issets/images/select01/img4.svg') }}" alt="" />
            </div>
            <div class="option-address__text">
              <span class="option-address__text--middle">村</span>
              <span class="option-address__text--small">（8村）</span>
            </div>
          </div>

          <div class="option-address__arrow-icon item--show4" id="arrow-four">
            <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
          </div>

          <div class="option-address__check-box option-address__check-box--position4">
            <div class="option-address__checkboxs">
              @foreach (array_chunk($villages, 3) as $column)
                <div class="option-address__col option-address__col-ten">
                  @foreach ($column as $index => $village)
                    @php
                      $checkboxId = 'option10-checkbox' . ($loop->parent->index * 3 + $index + 1);
                    @endphp
                    <p class="option-address__checkboxs-item">
                      <input class="banner-checkboxs__item-ip" type="checkbox" name="cb_addr21"
                        id="{{ $checkboxId }}" />
                      <label class="banner-label" for="{{ $checkboxId }}">
                        <span class="banner-label--middle">{{ $village }}</span>
                      </label>
                    </p>
                  @endforeach
                </div>
              @endforeach
            </div>

            <div class="select-btn2">
              <div class="select-btn2__arrow-icon">
                <img src="{{ asset('frontend/jigyosho/issets/images/arrow-right.svg') }}" alt="" />
              </div>

              <div class="select-btn2__item--pink select-round disabled" id="select-round-four" position="position4">
                <p class="select-btn2__text--white">決定</p>
              </div>
              <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op4"
                onclick="clearOption(this)">
                <p class="select-btn2__text--pink">リセット</p>
              </div>
            </div>
          </div>
        </div>
        <!-- list checkbox banner four end-->
      </div>
      @include('jigyosho::partials.clckbl_map')
      <div class="search-map-or-dropdown-result">
        <label class="title">選択中のエリア</label>
        <div class="search-map-or-dropdown-result-container">
          <div class="search-box">
            <svg class="search-btn" id="search" xmlns="http://www.w3.org/2000/svg" width="24.003" height="24"
              viewBox="0 0 24.003 24">
              <path id="Path_2543" data-name="Path 2543"
                d="M9.661,19.347a9.637,9.637,0,0,0,5.922-2.034L21.969,23.7a1.2,1.2,0,0,0,1.7-1.7l-6.386-6.386a9.655,9.655,0,1,0-7.62,3.732ZM4.53,4.561a7.256,7.256,0,1,1,0,10.262h0A7.23,7.23,0,0,1,4.493,4.6l.037-.037Z"
                transform="translate(0 -0.035)" fill="#0867bf" />
            </svg>
            <div class="selected-tags">
            </div>
            <select name="reChosen" id="reChosen-id" class="reChosen-dropdown" size="5">
              @foreach ($address2List as $index => $address2Item)
                <option value="{{ $address2Item }}">{{ $address2Item }}</option>
              @endforeach
            </select>
          </div>
          <input class="search-input-section" id="search-input-section-id" type="text" placeholder="続きの住所を入力">
        </div>
      </div>
    </div>
    @include('jigyosho::partials.area-popup')


    <div class="search-option" id="search-option-category-parent">
      <div id="search-option-category">
        {{-- <div class="layer-category blur-part1"></div> --}}
        <div class="vertical-line"></div>
        <div class="search-option-title option-category__toggle">
          <div class="search-option-title__text-box item--show1 ">
            <span class="search-option-title__text--big">サポートの分類から探す</span>
          </div>
          <svg class="triangle-indicator" width="41" height="20" viewBox="0 0 41 20">
            <path d="M0,0H41L20.5,19Z" fill="#ffb1bf" />
          </svg>
        </div>
        <span class="search-option-description">Search by Support Category</span>
        <div class="search-option-logo">
          <div class="search-option-logo__img-box">
            <!-- <img class="search-option-logo__img-box--pc" src="{{ asset('frontend/jigyosho/issets/images/select01/Group 298.svg') }}" alt="" /> -->
            <img class="search-option-logo__img-box--pc logoEnable"
              src="{{ asset('frontend/jigyosho/issets/images/select03/Group 299.svg') }}" alt="" />
            <svg class="search-option-logo__img-box--pc-enabled" xmlns="http://www.w3.org/2000/svg" width="64"
              height="64" viewBox="0 0 64 64">
              <g id="Group_1462" data-name="Group 1462" transform="translate(-365 -661)">
                <g id="Ellipse_113" data-name="Ellipse 113" transform="translate(365 661)" fill="#fddbe1"
                  stroke="#fff" stroke-width="2">
                  <circle cx="32" cy="32" r="32" stroke="none" />
                  <circle cx="32" cy="32" r="31" fill="none" />
                </g>
                <text id="Tokyo" transform="translate(397 683)" fill="#8b8b8b" font-size="11"
                  font-family="SourceHanSansJP-Regular, Source Han Sans JP">
                  <tspan x="-15.433" y="0">Tokyo</tspan>
                </text>
                <text id="東京都" transform="translate(397 703)" fill="#5b5a5a" font-size="16"
                  font-family="SourceHanSerif-Regular, Source Han Serif">
                  <tspan x="-24" y="0">東京都</tspan>
                </text>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="option-category-container">
    <div class="layer-category blur-part1"></div>
    <div class="option-category-row">
      <div class="option-category-label">相談所）</div>
      <ul class="option-category-row-list-item">
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">公共の相談所</span>
            <br>
            <span class="option-category-row-item-data-2">お近くの総合相談所</span>
          </div>
          <input type="radio" value="公共の相談所" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Community Support Center.png') }}"
            alt="" class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">専門相談員</span><span
              class="option-category-row-item-data-1-description">（無料）</span>
            <br>
            <span class="option-category-row-item-data-2">親身になって在宅介護相談</span>
          </div>
          <input type="radio" value="専門相談員（無料）" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-In-home care.png') }}" alt=""
            class="">
        </li>
      </ul>
    </div>

    <div class="option-category-row">
      <div class="option-category-label">医療系）</div>
      <ul class="option-category-row-list-item">
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問医師</span>
            <br>
            <span class="option-category-row-item-data-2">自宅まで来てくれるお医者さま</span>
          </div>
          <input type="radio" value="訪問医師" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Visiting-doctor.png') }}" alt=""
            class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問看護師</span>
            <br>
            <span class="option-category-row-item-data-2">自宅まで来てくれる看護師さん</span>
          </div>
          <input type="radio" value="訪問看護師" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Home health nurse.png') }}" alt=""
            class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問リハビリ</span>
            <br>
            <span class="option-category-row-item-data-2">自宅でもリハビリができます</span>
          </div>
          <input type="radio" value="訪問リハビリ" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Visiting-rehabilitation.png') }}"
            alt="" class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問薬局</span>
            <br>
            <span class="option-category-row-item-data-2">自宅までお薬を届けてくれます</span>
          </div>
          <input type="radio" value="訪問薬局" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Visiting-pharmacy.png') }}" alt=""
            class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">あん摩・鍼灸</span>
            <br>
            <span class="option-category-row-item-data-2">自宅での施術が可能です</span>
          </div>
          <input type="radio" value="あん摩・鍼灸" name="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Home-massage.png') }}" alt=""
            class="">
        </li>
      </ul>
    </div>

    <div class="option-category-row">
      <div class="option-category-label">介護系）</div>
      <ul class="option-category-row-list-item">
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問介護士</span>
            <br>
            <span class="option-category-row-item-data-2">自宅まで来てくれる介護士さん</span>
          </div>
          <input type="radio" value="訪問介護士" class="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-home-care-worker.png') }}" alt=""
            class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">訪問入浴</span>
            <br>
            <span class="option-category-row-item-data-2">自宅に来て入浴をサポート</span>
          </div>
          <input type="radio" value="訪問入浴" class="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Home-visit-bath.png') }}" alt=""
            class="">
        </li>
        <li class="option-category-row-item">
          <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991"
              height="21.469" viewBox="0 0 25.991 21.469">
              <path id="check_1_" data-name="check (1)"
                d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="option-category-row-item-data">
            <span class="option-category-row-item-data-1">福祉用具</span><span
              class="option-category-row-item-data-1-description">（ベッド他）</span>
            <br>
            <span class="option-category-row-item-data-2">ベッドや車いす,杖や手すり</span>
          </div>
          <input type="radio" value="福祉用具（ベッド他）" class="category-option" style="display:none;">
          <img class="option-category-row-item-img"
            src="{{ asset('frontend/jigyosho/issets/images/sidebar/icon-Visiting-doctor.png') }}" alt=""
            class="">
        </li>
      </ul>
    </div>
    <input type="text" value="" id="from-tab" hidden>
  </div>
  </div>
  </div>
  <!-- section01 end-->
  </div>
  @include('jigyosho::partials.popup')
  {{-- @include('jigyosho::partials.confirm-action') --}}
@endsection
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // toggle select
    $('#reChosen-id').on('change', function() {
      const selectedValue = $(this).val();
      $('#selected-area').val(selectedValue);
    });

    // update search input popup and back
    $('#search-input-section-id').on('keyup', function() {
      $('#type-address').val($(this).val());
    });
    $('#type-address').on('keyup', function() {
      $('#search-input-section-id').val($(this).val());
    });

    $(document).on('click', (e) => {
      if (!$(e.target).closest('.search-box .tag-items, #reChosen-id').length) {
        $('.reChosen-dropdown').hide();
      }
    });

    $('input[name="cb_addr21"]').on('change', function() {
      let selectedId = '';
      if (!$(this).is(':checked')) {
        $('#selected-area').val('');
      } else {
        selectedId = $(this).attr('id');
        removeActiveClickMap();
      }
      updateAddressPop(selectedId);
    });

    $('.click-map').on('click', function() {
      const $this = $(this);
      removeActiveClickMap();
      $this.addClass('activeClickMap');

      const pathId = $this.find('path').attr('id');
      updateMapPop(pathId);

      const textValue = $this.find('text').text().trim();
      if (!textValue) return;

      $('#selected-area').val(textValue);
      removeAddressOption();

      $('.text-address, #clickable-map, .layer-category').hide();
      $('.search-map-or-dropdown-result').show();

      $('.option-address-container').css({
        paddingTop: '4%',
        paddingBottom: '0',
        backgroundColor: '#FDF4F4'
      });

      $('#search-option-category').addClass('category-enabled');
      $('#search-option-category-parent').addClass('active');
      $('#from-tab').val('option-address__toggle-map');
    });

    const optionCategoryRowItem = $('.option-category-row-item');
    optionCategoryRowItem.each(function() {
      $(this).on('click', function() {
        const radio = $(this).find('input[type="radio"]');
        const rowItemImg = $(this).find('.option-category-row-item-img');
        const checkIcon = $(this).find('.check-icon');
        // Reset all items
        resetCategoryOption();
        if ($('#selected-area').val() == '') {
          showPopupArea();
          addressPopActive();
        }
        checkIcon.show();
        rowItemImg.css({
          width: '60%',
          height: 'auto',
          right: '-20%',
          top: '-130%'
        }).addClass('no-hover');
        radio.prop('checked', true);
        $('#selected-category').val(radio.val());
      });
    });

    const $titles = $('.search-option-title');
    let text = $(".dropdown-option-text");

    $titles.on('click', function() {
      if ($(this).is('.option-address__toggle-dropdown, .option-address__toggle-map')) {
        $titles.removeClass('active');
        hideAreaLayer();
        deactiveCategory();
        $(this).addClass('active');
        showAddressOption();
        showMapOption();

        // Show or hide the dropdown text
        if ($(this).is('.option-address__toggle-dropdown.active')) {
          text.show();
        } else {
          text.hide();
        }
      }
    });

    $('.option-category__toggle').on('click', function() {
      activeCategory();
      removeActiveArea();
      showAreaLayer();
    });

    const selectedCategory = document.getElementById('selected-category');
    ['selected-area', 'selected-category'].forEach(id => {
      const input = document.getElementById(id);
      let currentValue = input.value;

      Object.defineProperty(input, 'value', {
        set: function(val) {
          currentValue = val;
          this.setAttribute('value', val);
          if (id === 'selected-area') {
            if (val !== '') {
              document.querySelectorAll('.selected-tags').forEach(item => {
                item.innerHTML = '';
                var newTag = document.createElement('span');
                newTag.className = 'tag-items-default';
                newTag.innerText += '東京都';
                item.appendChild(newTag);
                var newTag = document.createElement('span');
                newTag.className = 'tag-items';
                if (item === document.querySelector('.popup .selected-tags')) {
                  newTag.innerHTML += '<button type="button">' + val + '</button>';
                } else {
                  newTag.innerHTML += '<button onclick="toggleSelect()" type="button">' + val +
                    '<svg class="close-tag" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><path id="close_1_" data-name="close (1)" d="M8.283,7.136l5.451-5.451A.907.907,0,0,0,12.451.4L7,5.853,1.549.4A.907.907,0,0,0,.266,1.684L5.717,7.136.266,12.587A.907.907,0,1,0,1.549,13.87L7,8.419l5.451,5.451a.907.907,0,0,0,1.283-1.283Zm0,0" transform="translate(0 -0.136)" fill="#7a7a7a"/></svg></button>';
                }
                item.appendChild(newTag);
              });
              document.querySelector('.option-category-container').style.backgroundColor = '#f5f5f5';
              if (selectedCategory.value !== '') {
                showPopup();
              }
            }
          } else if (id === 'selected-category') {
            const input = document.querySelector(`input[type="radio"][value="${val}"]`);
            if (!input) return null;
            const parent = input.closest('.option-category-row-item');
            if (!parent) return null;

            const data1 = parent.querySelector('.option-category-row-item-data-1')?.textContent.trim() ||
              '';
            const description = parent.querySelector('.option-category-row-item-data-1-description')
              ?.textContent.trim() || '';
            const data2 = parent.querySelector('.option-category-row-item-data-2')?.textContent.trim() ||
              '';
            const imgSrc = parent.querySelector('img.option-category-row-item-img')?.getAttribute(
              'src') || '';
            document.querySelector('ul.checkbox-list').innerHTML = '';
            const newLi = document.createElement('li');
            newLi.className = 'checkbox-item';
            newLi.innerHTML = `
            <div class="square-box">
                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991" height="21.469" viewBox="0 0 25.991 21.469">
                    <path id="check_1_" data-name="check (1)"
                        d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z"
                        transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
                </svg>
            </div>
            <div class="checkbox-item-data">
                <span class="checkbox-item-data-1">${data1}</span>
                <span class="checkbox-item-data-1-description">${description}</span>
                <br>
                <span class="checkbox-item-data-2">${data2}</span>
            </div>
            <input type="checkbox" value="${val}" style="display:none;">
            <img src="${imgSrc}" alt="">
        `;
            document.querySelector('ul.checkbox-list').appendChild(newLi);
            if (document.getElementById('selected-area').value !== '') {
              showPopup();
            }
          }
        },
        get: function() {
          return currentValue;
        }
      });
    });
  });
</script>
