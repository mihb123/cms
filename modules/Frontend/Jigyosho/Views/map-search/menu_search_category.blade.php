<div class="menu__search_category">
  <div class="menu__search_category-container">
    <div class="box-menu__people-img">
      <img src="{{asset('frontend/jigyosho/img/LS_icon_Dr.svg')}}" alt="" />
    </div>
    <div class="banner-info-form">
      <!-- icon search start -->
      <div class="banner-search">
        <!-- select start -->
        <div id="select-category-select" class="banner-form-select">
          <p id="select-category-text" class="banner-form-select__text">
            {{ $search_category ?? "選んでください"}}
          </p>

          <div class="banner-form-select__icon">
            <img src="{{asset('frontend/jigyosho/issets/images/arrow-bottom.svg')}}" alt="" />
          </div>

          <div class="banner-list-select" onkeyup="change_ctgry();">
            <ul class="banner-checkboxs">
              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip  banner-checkbox-item" value="公共の相談所" type="checkbox" name="checkbox-banner" id="checkbox-1" onclick="selectOnlyThis(this)" data-checkbox="false" />

                <label class="banner-label" for="checkbox-1">
                  <span class="banner-label--middle">公共の相談所</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="専門相談員（無料）" type="checkbox" name="checkbox-banner" id="checkbox-2" onclick="selectOnlyThis(this)" data-checkbox="false" />

                <label class="banner-label" for="checkbox-2">
                  <span class="banner-label--middle">専門相談員</span>
                  <span class="banner-label--small"> （無料）</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問医師" type="checkbox" name="checkbox-banner" id="checkbox-3" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-3">
                  <span class="banner-label--middle">訪問医師</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問介護士" type="checkbox" name="checkbox-banner" id="checkbox-4" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-4">
                  <span class="banner-label--middle">訪問介護士</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問看護師" type="checkbox" name="checkbox-banner" id="checkbox-5" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-5">
                  <span class="banner-label--middle">訪問看護師</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問リハビリ" type="checkbox" name="checkbox-banner" id="checkbox-6" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-6">
                  <span class="banner-label--middle">訪問リハビリ</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="福祉用具（ベッド他）" type="checkbox" name="checkbox-banner" id="checkbox-7" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-7">
                  <span class="banner-label--middle">福祉用具</span>
                  <span class="banner-label--small"> （ベッド他）</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問入浴" type="checkbox" name="checkbox-banner" id="checkbox-8" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-8">
                  <span class="banner-label--middle">訪問入浴</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問薬局" type="checkbox" name="checkbox-banner" id="checkbox-9" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-9">
                  <span class="banner-label--middle">訪問薬局</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問介護夜間対応" type="checkbox" name="checkbox-banner" id="checkbox-10" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-10">
                  <span class="banner-label--small">訪問介護</span>
                  <span class="banner-label--middle">夜間対応</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="定期巡回" type="checkbox" name="checkbox-banner" id="checkbox-11" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-11">
                  <span class="banner-label--middle">定期巡回</span>
                </label>
              </li>

              <li class="banner-checkboxs__item">
                <input class="banner-checkboxs__item-ip banner-checkbox-item" value="訪問マッサージ" type="checkbox" name="checkbox-banner" id="checkbox-12" onclick="selectOnlyThis(this)" data-checkbox="false" />
                <label class="banner-label" for="checkbox-12">
                  <span class="banner-label--middle">訪問マッサージ</span>
                </label>
              </li>
            </ul>

            <div class="select-btn">
              <div class="select-btn__item--pink" onclick="ctgry_search({{$dist}});">
                <p　id="ctgry_search" class="select-btn__text--white">決定</p>
              </div>
              <div class="select-btn__item--pink">
                <p class="select-btn__text--white" onclick="cancel_ctgry('{{$search_category}}');">キャンセル</p>
              </div>
            </div>
          </div>
        </div>
        <!-- select end -->
      </div>
    </div>
  </div>
</div>
