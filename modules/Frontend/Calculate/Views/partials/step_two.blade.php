<img class="step-number" src="{{ asset('frontend/assets/images/calculate/step-2.svg') }}" alt="" />

<div class="header-box">
    <div class="thumb">
        <img class="nurse" src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
    </div>
    <div class="caption">
        <div class="sub">役所<span>（介護保険課）</span>から受けた</div>
        <h2 class="title">要介護認定<small>は</small>ありますか？</h2>
        <div class="help-group d-tb-none">
            <button class="cal-help-button">
                <img src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
                <span>わからない</span>
            </button>
            <div class="help-popup">
                <div class="help-popup-body">
                    <button class="close-help-popup">
                        <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
                    </button>
                    <div class="help-popup-header">
                        <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                        <span>要介護認定<small>とは？</small></span>
                    </div>
                    <div class="help-popup-content">
                        <div class="content-left">
                            <p>
                                介護保険の運営主体である役所（区市町村）が、本人からの介護保険認定申請の要請を受けて調査し、心身の状態から全８段階で介護度を判定し認定する制度です。
                            </p>
                            <p>
                                本人の要介護認定の区分を確認するためには<b>「介護保険被保険者証」の「要介護状態区分等」の欄に記載されている内容を確認します。</b>
                            </p>
                        </div>
                        <div class="content-right">
                            <img src="{{ asset('frontend/assets/images/calculate/help-step-2.png') }}" alt="" />
                            <span class="note">作成：　株式会社パーソナルライフジャパン</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="no-value step2-options">
    <div class="radio-group-2">
        <label class="custom-radio-2">
            <input id="" type="radio" name="step2" value="no" />
            <span class="radio-item-2">
                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.87" height="35.503" viewBox="0 0 37.87 35.503">
                    <defs>
                        <filter id="Path_5440" x="0" y="0" width="37.87" height="35.503" filterUnits="userSpaceOnUse">
                            <feOffset dy="3" input="SourceAlpha" />
                            <feGaussianBlur stdDeviation="3" result="blur" />
                            <feFlood flood-color="#fff" flood-opacity="0.502" />
                            <feComposite operator="in" in2="blur" />
                            <feComposite in="SourceGraphic" />
                        </filter>
                    </defs>
                    <g id="_6-Check" data-name="6-Check" transform="translate(-23 -53.158)">
                        <g transform="matrix(1, 0, 0, 1, 23, 53.16)" filter="url(#Path_5440)">
                            <path id="Path_5440-2" data-name="Path 5440" d="M41.063,76.662a.436.436,0,0,1-.32-.14l-8.627-9.332a.436.436,0,0,1,.32-.732h4.153a.436.436,0,0,1,.329.15L39.8,69.925A16.519,16.519,0,0,1,41.774,66.8a29.354,29.354,0,0,1,9.455-7.589.436.436,0,0,1,.473.728,28.5,28.5,0,0,0-4.149,4.3,32.04,32.04,0,0,0-6.067,12.1.436.436,0,0,1-.423.331Z" transform="translate(-23 -53.16)" fill="#fff" />
                        </g>
                    </g>
                </svg>
                <span>ない</span>
            </span>
        </label>
    </div>
</div>

<div class="step2-group">
    @if(!empty($listCalculateGroup))
        @foreach ($listCalculateGroup as $key => $calculateGroup)
            @if(!empty($calculateGroup->group))
            <div class="step2-options">
                <div class="option-title">
                    <span>{{ $calculateGroup->group->title_japan }}</span>
                </div>
                <div class="radio-group-2">
                    @if(!empty($calculateGroup->group->categoryCalculate))
                        @foreach ($calculateGroup->group->categoryCalculate as $keyCategory => $categoryCalculate)
                        <label class="custom-radio-2">
                            <input id="" type="radio" name="step2" data-group="{{$calculateGroup->group->id}}" data-calculate = "{{$calculate_id}}" value="{{ $categoryCalculate->id ?? ''}}" />
                            <span class="radio-item-2">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.87" height="35.503" viewBox="0 0 37.87 35.503">
                                    <defs>
                                        <filter id="Path_5440" x="0" y="0" width="37.87" height="35.503" filterUnits="userSpaceOnUse">
                                            <feOffset dy="3" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="3" result="blur" />
                                            <feFlood flood-color="#fff" flood-opacity="0.502" />
                                            <feComposite operator="in" in2="blur" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g id="_6-Check" data-name="6-Check" transform="translate(-23 -53.158)">
                                        <g transform="matrix(1, 0, 0, 1, 23, 53.16)" filter="url(#Path_5440)">
                                            <path id="Path_5440-2" data-name="Path 5440" d="M41.063,76.662a.436.436,0,0,1-.32-.14l-8.627-9.332a.436.436,0,0,1,.32-.732h4.153a.436.436,0,0,1,.329.15L39.8,69.925A16.519,16.519,0,0,1,41.774,66.8a29.354,29.354,0,0,1,9.455-7.589.436.436,0,0,1,.473.728,28.5,28.5,0,0,0-4.149,4.3,32.04,32.04,0,0,0-6.067,12.1.436.436,0,0,1-.423.331Z" transform="translate(-23 -53.16)" fill="#fff" />
                                        </g>
                                    </g>
                                </svg>
                                <span>{{ $categoryCalculate->title ?? '' }}</span>
                            </span>
                        </label>
                        @endforeach
                    @endif
                </div>
            </div>
            @endif
        @endforeach
    @endif
</div>

<div class="help-group d-pc-none d-sp-none">
    <button class="cal-help-button">
        <img src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
        <span>わからない</span>
    </button>
    <div class="help-popup">
        <div class="help-popup-body">
            <button class="close-help-popup">
                <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
            </button>
            <div class="help-popup-header">
                <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                <span>要介護認定<small>とは？</small></span>
            </div>
            <div class="help-popup-content">
                <div class="content-left">
                    <p>
                        介護保険の運営主体である役所（区市町村）が、本人からの介護保険認定申請の要請を受けて調査し、心身の状態から全８段階で介護度を判定し認定する制度です。
                    </p>
                    <p>
                        本人の要介護認定の区分を確認するためには<b>「介護保険被保険者証」の「要介護状態区分等」の欄に記載されている内容を確認します。</b>
                    </p>
                </div>
                <div class="content-right">
                    <img src="{{ asset('frontend/assets/images/calculate/help-step-2.png') }}" alt="" />
                    <span class="note">作成：　株式会社パーソナルライフジャパン</span>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#step-3" class="next-step" style="display: none">
    <img src="{{ asset('frontend/assets/images/calculate/move.svg') }}" alt="" />
</a>

<script>
    $(".cal-help-button").on("click", function(e){
        e.preventDefault();
        var p = $(this).closest(".help-group");
        p.addClass("is-show");
    })
</script>
