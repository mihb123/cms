
<img class="step-number" src="{{ asset('frontend/assets/images/calculate/step-3.svg') }}" alt="" />
<div class="header-box">
    <div class="thumb">
        <img class="nurse" src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
    </div>
    <div class="caption">
        <div class="sub">本人<small>の</small><span class="big">介護保険負担割合<span class="last">は</span></span></div>
        <h2 class="title">何割負担ですか？</h2>
        <div class="help-group d-tb-none">
            <button class="cal-help-button">
                <img src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
                <span>わからない</span>
            </button>
            <div class="help-popup popup">
                <div class="help-popup-body">
                    <button class="close-help-popup">
                        <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
                    </button>
                    <div class="help-popup-header">
                        <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                        <span>介護保険負担割合<small>とは？</small></span>
                    </div>
                    <div class="help-popup-content">
                        <div class="content-left">
                            <p>
                                <b>「介護保険負担割合証」にご自身の負担割合の記載があります。</b>
                            </p>
                            <p>
                                なお、「介護保険負担割合証」は「介護保険証」とは別の用紙となっており、新しく介護保険の要介護認定を申請された方は、認定後に介護保険証と共に、運営主体である役所（区市町村）から送られてきます。
                            </p>
                            <p>
                                また、既に介護認定を受けている方は、毎年7月中旬頃に1年間有効な「介護保険負担割合証」が届く仕組みとなっています。
                            </p>
                        </div>
                        <div class="content-right">
                            <img class="d-sp-none" src="{{ asset('frontend/assets/images/calculate/help-step-3.png') }}" alt="" />
                            <img class="d-pc-none d-tb-none" src="{{ asset('frontend/assets/images/calculate/help-step-3-sp.png') }}" alt="" />
                            <span class="note">作成：　株式会社パーソナルライフジャパン</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="step3-group">

    <div class="step2-options">
        <div class="radio-group-2">
            @if(!empty($listPercentageBurden))
                @foreach ($listPercentageBurden as $key => $percentageBurden)
                    @if(!empty($percentageBurden->percentage))
                        <label class="custom-radio-2">
                            <input type="checkbox" name="step3" {{ $key == 0 ? 'checked' : '' }} data-name="{{ $percentageBurden->percentage->title ?? '' }}" value="{{ $percentageBurden->percentage->percentage ?? '' }}" />
                            <span class="radio-item-2">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.87" height="35.503" viewBox="0 0 37.87 35.503">
                                    <defs>
                                        <filter id="Path_5440" x="0" y="0" width="37.87" height="35.503" filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha"/>
                                        <feGaussianBlur stdDeviation="3" result="blur"/>
                                        <feFlood flood-color="#fff" flood-opacity="0.502"/>
                                        <feComposite operator="in" in2="blur"/>
                                        <feComposite in="SourceGraphic"/>
                                        </filter>
                                    </defs>
                                    <g id="_6-Check" data-name="6-Check" transform="translate(-23 -53.158)">
                                        <g transform="matrix(1, 0, 0, 1, 23, 53.16)" filter="url(#Path_5440)">
                                        <path id="Path_5440-2" data-name="Path 5440" d="M41.063,76.662a.436.436,0,0,1-.32-.14l-8.627-9.332a.436.436,0,0,1,.32-.732h4.153a.436.436,0,0,1,.329.15L39.8,69.925A16.519,16.519,0,0,1,41.774,66.8a29.354,29.354,0,0,1,9.455-7.589.436.436,0,0,1,.473.728,28.5,28.5,0,0,0-4.149,4.3,32.04,32.04,0,0,0-6.067,12.1.436.436,0,0,1-.423.331Z" transform="translate(-23 -53.16)" fill="#fff"/>
                                        </g>
                                    </g>
                                </svg>
                                <span>{{ $percentageBurden->percentage->title ?? '' }}</span>
                            </span>
                        </label>
                        @endif
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="help-group d-pc-none d-sp-none">
    <button class="cal-help-button">
        <img src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
        <span>わからない</span>
    </button>
    <div class="help-popup popup">
        <div class="help-popup-body">
            <button class="close-help-popup">
                <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
            </button>
            <div class="help-popup-header">
                <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                <span>介護保険負担割合<small>とは？</small></span>
            </div>
            <div class="help-popup-content">
                <div class="content-left">
                    <p>
                        <b>「介護保険負担割合証」にご自身の負担割合の記載があります。</b>
                    </p>
                    <p>
                        なお、「介護保険負担割合証」は「介護保険証」とは別の用紙となっており、新しく介護保険の要介護認定を申請された方は、認定後に介護保険証と共に、運営主体である役所（区市町村）から送られてきます。
                    </p>
                    <p>
                        また、既に介護認定を受けている方は、毎年7月中旬頃に1年間有効な「介護保険負担割合証」が届く仕組みとなっています。
                    </p>
                </div>
                <div class="content-right">
                    <img class="d-sp-none" src="{{ asset('frontend/assets/images/calculate/help-step-3.png') }}" alt="" />
                    <img class="d-pc-none d-tb-none" src="{{ asset('frontend/assets/images/calculate/help-step-3-sp.png') }}" alt="" />
                    <span class="note">作成：　株式会社パーソナルライフジャパン</span>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#step-4" class="next-step">
    <img src="{{ asset('frontend/assets/images/calculate/move.svg') }}" alt="" />
</a>
