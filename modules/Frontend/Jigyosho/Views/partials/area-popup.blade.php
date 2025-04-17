@verbatim
  <style>
    .popup-area-layer {
      display: none;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 50px;
      left: 50%;
      transform: translate(-50%, 0%);
      width: 1349px;
      height: auto;
      background-color: rgba(0, 0, 0, 0.81);
      border-radius: 10px;
      z-index: 101;
    }

    .popup-container {
      position: relative;
      margin: 117px auto;
    }

    @media (min-width: 1050px) {
      .popup-container {
        width: 992px;
      }
    }

    .popup-close-btn {
      position: absolute;
      top: 0px;
      right: 8px;
      cursor: pointer;
    }

    .custom-box {
      position: relative;
      width: 469px;
      height: 73px;
      border-radius: 5px;
      background-color: #cf577e;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.161);
      overflow: visible;
    }

    .gradient-bg {
      position: absolute;
      top: -4px;
      left: -6px;
      width: 468px;
      height: 70px;
      border-radius: 5px;
      background: linear-gradient(to bottom, #e15884 0%, #f06793 6.7%, #fa87ad 57.7%, #ff9abb 87.9%, #ff8eb3 100%);
      display: flex;
      align-items: center;
      padding-left: 38px;
    }

    .label-text {
      font-family: 'Source Han Sans', sans-serif;
      font-size: 27px;
      color: #fffcfd;
    }

    .triangles {
      position: absolute;
      bottom: -22px;
      left: 0;
      width: 100%;
      height: 25px;
    }

    .triangle {
      position: absolute;
      width: 0;
      height: 0;
      border-left: 11px solid transparent;
      border-right: 11px solid transparent;
    }

    .triangle.pink {
      border-top: 19px solid #cf577e;
      bottom: 0;
    }

    .triangle.light-pink {
      border-top: 19px solid #ff90b4;
    }
  </style>
@endverbatim
<div id="popup-area-layer" class="popup-area-layer">
  <div class="popup-container">
    <div class="popup-close-btn" onclick="hidePopupArea()">
      <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
    </div>
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
        <div class="address-title-option" style="position: relative;">
          <div class="custom-box" style="position: absolute; top: -97px; left: 39%;">
            <div class="gradient-bg">
              <span class="label-text">検索するエリアを選んでください</span>
            </div>
            <div class="triangles">
              <div class="triangle pink" style="left: 54px;  bottom: 4px;"></div>
              <div class="triangle light-pink" style="left: 54px; bottom: 11px;"></div>
              <div class="triangle pink" style="left: 145px;  bottom: 4px;"></div>
              <div class="triangle light-pink" style="left: 145px; bottom: 11px;"></div>
            </div>
          </div>
          <div class="search-option-title option-address__toggle-dropdown address_popup_area active">
            <div class="search-option-title__text-box item--show1 ">
              <span class="search-option-title__text--big">エリアから探す</span>
              <span class="search-option-title__text--middle">（東京都）</span>
            </div>
            <svg class="triangle-indicator" width="41" height="20" viewBox="0 0 41 20">
              <path d="M0,0H41L20.5,19Z" fill="#ffb1bf" />
            </svg>
          </div>
          <div class="search-option-title option-address__toggle-map map_popup_area">
            <div class="search-option-title__text-box item--show1">
              <span class="search-option-title__text--big">地図から探す</span>
              <span class="search-option-title__text--middle">（東京都）</span>
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
    <div class="container">
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
                <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op1">
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
                <div class="select-btn2__item--pink select-round disabled" id="select-round-two"
                  position="position1">
                  <p class="select-btn2__text--white">決定</p>
                </div>
                <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op1">
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

                <div class="select-btn2__item--pink select-round disabled" id="select-round-three"
                  position="position3">
                  <p class="select-btn2__text--white">決定</p>
                </div>
                <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op3">
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

                <div class="select-btn2__item--pink select-round disabled" id="select-round-four"
                  position="position4">
                  <p class="select-btn2__text--white">決定</p>
                </div>
                <div class="select-btn2__item--white select-btn__item--outline" id="clear-checkbox-op4">
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
              <svg class="search-btn" id="search" xmlns="http://www.w3.org/2000/svg" width="24.003"
                height="24" viewBox="0 0 24.003 24">
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
    </div>
  </div>
</div>

<script>
  function showPopupArea() {
    document.getElementById("popup-area-layer").style.display = "flex";
  }

  function hidePopupArea() {
    document.getElementById("popup-area-layer").style.display = "none";
  }
</script>
