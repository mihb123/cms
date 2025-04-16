<div class="step-box step-5" id="step-5" style="display: none">
    <div class="result-final">
        <div class="result-container">
            <div class="final-header">
                <div class="title-with-icon">
                    <img width="37px" height="37px" src="{{ asset('frontend/assets/images/calculate/cal-icon.svg') }}" alt="" />
                    <span>計算結果</span>
                </div>
                <div class="sub-title">1ヶ月の介護サービス費</div>
            </div>
            <div class="result-box">
                <div class="result-box-inner">
                    <div class="nurse">
                        <img src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
                    </div>
                    <div class="title-green">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="35" viewBox="0 0 33 35">
                            <defs>
                                <filter id="_" x="0" y="0" width="33" height="35" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feFlood flood-opacity="0.102" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#_)">
                                <text id="_2" data-name="▼ " transform="translate(9 20)" fill="#fff" font-size="13" font-family="SegoeUI, Segoe UI">
                                    <tspan x="0" y="0">▼ </tspan>
                                </text>
                            </g>
                        </svg>
                        <span class="text">自己負担額<small>の</small>目安</span>
                    </div>
                    <div class="price-box"><span class="price">0</span> <span class="init">円</span></div>
                </div>
                <div class="result-init">/ 1ヶ月</div>
            </div>

            <div class="result-note">※ 実際に自分自身が支払う金額の目安です</div>

            <div class="step4__result--selected">
                <span class="label">計算条件：</span>
                <div class="selected-items">
                    <span class="si for-step1" style="display: none"></span>
                    <span class="si for-step2" style="display: none"></span>
                    <span class="si" id="for-step3"></span>
                </div>
            </div>

            <div class="note-red">
                計算結果の額は全国の利用実績の平均値を基に算出されたものですのであくまでも概算です
            </div>

            <div class="low-tide"></div>

            <div class="result-total">
                <span class="label">計算内訳：</span>
                <div class="result-level level-1">
                    <div class="label-with-title">
                        <span class="level-label">全体のサービス利用総費用額</span>
                        <span class="level-value" id="level-1"></span>
                    </div>
                    <div class="result-level level-2">
                        <div class="label-with-title">
                            <span class="level-label">介護保険が負担してくれる額</span>
                            <span class="level-value" id="level2"></span>
                        </div>
                    </div>
                    <div class="result-level level-2 yellow">
                        <div class="label-with-title">
                            <span class="level-label">自分自身が支払う額<span>（自己負担額）</span></span>
                            <span class="level-value"></span>
                        </div>
                        <div class="result-level level-3">
                            <span class="level-label">
                                <span class="label-left">介護保険適用分</span>
                                <span class="label-right"></span>
                            </span>
                            <span class="level-value"></span>
                        </div>
                        <div class="result-level level-4" id="max_money">
                            <span class="level-label">
                                <span class="label-left">介護保険が 適用されない分</span>
                                <span class="label-right"></span>
                            </span>
                            <span class="level-value"></span>
                        </div>
                    </div>
                </div>

{{--                <div class="result-more">--}}
{{--                    <img src="{{ asset('frontend/assets/images/calculate/up-right-arrow.svg') }}" alt="" />--}}
{{--                    <a class="btn-result-more" href="#">--}}
{{--                        <span>より詳しい明細はこちら</span>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="6.667" height="11.852" viewBox="0 0 6.667 11.852">--}}
{{--                            <path id="greater-than-symbol_3_" data-name="greater-than-symbol (3)" d="M12.741,19.852a.749.749,0,0,1-.524-1.264l4.662-4.662L12.217,9.264a.741.741,0,1,1,1.048-1.048L18.45,13.4a.741.741,0,0,1,0,1.047l-5.185,5.185a.741.741,0,0,1-.524.217Z" transform="translate(-12 -8)" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="step5-contact">
        <div class="nurse-nofify">
            できるかぎり<br>
            たくさんの力をかりましょう！
        </div>
        <div class="nurse-full">
            <img src="{{ asset('frontend/assets/images/calculate/nurse-full.svg') }}" alt="" />
        </div>
        <div class="contact-content">
            介護サービスについてのご相談は、<br>
            お住まいの<b>「役所の介護保険課」</b><br>
            もしくは自宅近くにある<br>
            <b>「地域包括支援センター」</b>が便利です。
        </div>
        <div class="contact-button text-right d-sp-none">
            <a href="/jigyosho/TopNarrow-1.php?search_category=専門相談員（無料）" class="link-with-icon">
                <span class="text">最寄り<small>の</small>相談先を探す</span>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                        <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#fff"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="cta-contact d-pc-none d-tb-none">
        <img src="{{ asset('frontend/assets/images/calculate/contact-right.png') }}" alt="" />
        <div class="title">介護でお困りことはありませんか？</div>
        <div class="sub-title">ご相談はお住いの役所が便利です</div>
        <div class="title-en">Life Star Home Medical Consultation Office</div>
        <div class="view-more">
            <a href="/jigyosho/TopNarrow-1.php?search_category=専門相談員（無料）" class="link-with-icon">
                <span class="text">最寄り<small>の</small>相談先を探す</span>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                        <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#fff"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="result-fixed d-pc-none d-tb-none">
        <div class="result-box-inner">
            <div class="nurse">
                <img src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
            </div>
            <div class="title-green">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="35" viewBox="0 0 33 35">
                    <defs>
                        <filter id="_" x="0" y="0" width="33" height="35" filterUnits="userSpaceOnUse">
                            <feOffset dy="3" input="SourceAlpha" />
                            <feGaussianBlur stdDeviation="3" result="blur" />
                            <feFlood flood-opacity="0.102" />
                            <feComposite operator="in" in2="blur" />
                            <feComposite in="SourceGraphic" />
                        </filter>
                    </defs>
                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#_)">
                        <text id="_2" data-name="▼ " transform="translate(9 20)" fill="#fff" font-size="13" font-family="SegoeUI, Segoe UI">
                            <tspan x="0" y="0">▼ </tspan>
                        </text>
                    </g>
                </svg>
                <span class="text">自己負担額<small>の</small>目安</span>
            </div>
            <div class="price-box">
                <span class="price">18,500</span>
                <span class="init">円</span>
                <span class="result-init">/ 1ヶ月</span>
            </div>
        </div>
    </div>
</div>
@push('style')
<style>
    .result-total .result-level.level-4 .level-label {
        display: flex;
        justify-content: space-between;
        padding: 3px 8px;
    }

    .result-total .result-level.level-4 .level-value {
        display: block;
        text-align: right;
        padding: 2px 8px;
        font-size: 16px;
        color: #000;
        letter-spacing: 0.8px;
        line-height: 1.375;
    }
</style>
@endpush
