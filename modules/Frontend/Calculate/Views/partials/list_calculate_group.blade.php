@if (!empty($listCalculateGroup))
    @foreach($listCalculateGroup as $key => $calculateGroup)
        <div class="step4-acc-item">
            <div class="heading">
                    <span class="icon">
                        <svg class="plus" id="Group_5139" data-name="Group 5139" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="Ellipse_311" data-name="Ellipse 311" fill="#ffa8ba" stroke="#feb1c2" stroke-width="1">
                                <circle cx="12" cy="12" r="12" stroke="none"/>
                                <circle cx="12" cy="12" r="11.5" fill="none"/>
                            </g>
                            <g id="plus" transform="translate(6 6)">
                                <path id="Path_5454" data-name="Path 5454" d="M10.945,4.945H7.055V1.055a1.055,1.055,0,0,0-2.109,0V4.945H1.055a1.055,1.055,0,0,0,0,2.109H4.945v3.891a1.055,1.055,0,0,0,2.109,0V7.055h3.891a1.055,1.055,0,0,0,0-2.109Z" fill="#fff"/>
                            </g>
                        </svg>
                        <svg class="minus" id="Group_5145" data-name="Group 5145" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="Ellipse_311" data-name="Ellipse 311" fill="#ffa8ba" stroke="#feb1c2" stroke-width="1" opacity="0.55">
                                <circle cx="12" cy="12" r="12" stroke="none"/>
                                <circle cx="12" cy="12" r="11.5" fill="none"/>
                            </g>
                            <g id="minus" transform="translate(6 11)">
                                <path id="Path_5455" data-name="Path 5455" d="M11.272,50H1.208a1.208,1.208,0,0,0,0,2.415H11.272a1.208,1.208,0,0,0,0-2.415Z" transform="translate(0 -50)" fill="#fff"/>
                            </g>
                        </svg>
                    </span>
                <h3 class="text">
                    {{ $calculateGroup->group->title_japan ?? '' }}
                </h3>
            </div>
            @if (!empty($calculateGroup->service))
                <div class="acc-body" style="display: none;" >
                    <span class="sub-note">サービスの内容</span>
                    <div class="list-checkbox-step4">
                        @foreach ($calculateGroup->service as $keyService => $service)
                            @if (!empty($checkService[$category->id][$service['id']]))
                                @if (!empty($service) && !empty($fixedPrice[$category->id][$service['id']]) && $fixedPrice[$category->id][$service['id']] == 1)
                                    <div class="step4-checkbox-item style-2" data-item="monthly">
                                        <input type="checkbox" name="step4[]" value="{{ !empty($money[$category->id][$service['id']]) ? $money[$category->id][$service['id']] : 0 }}" />
                                        <div class="title-with-help">
                                                    <span class="checkbox-fake">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.489" height="8.359" viewBox="0 0 9.489 8.359">
                                                            <path id="Path_5440" data-name="Path 5440" d="M36.328,67.517a.208.208,0,0,1-.153-.067l-4.12-4.457a.208.208,0,0,1,.153-.349h1.983a.208.208,0,0,1,.157.072L35.725,64.3a7.889,7.889,0,0,1,.942-1.493,14.018,14.018,0,0,1,4.516-3.624.208.208,0,0,1,.226.348,13.61,13.61,0,0,0-1.981,2.052,15.3,15.3,0,0,0-2.9,5.777.208.208,0,0,1-.2.158Z" transform="translate(-32 -59.158)" fill="#fff"/>
                                                        </svg>
                                                    </span>
                                            <span class="text">{{ $service->title ?? '' }}</span>
                                            <div class="help-group in-checkbox">
                                                <button class="cal-help-button">
                                                    <img class="help-icon" src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
                                                </button>
                                                <div class="help-popup">
                                                    <div class="help-popup-body">
                                                        <button class="close-help-popup">
                                                            <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
                                                        </button>
                                                        <div class="help-popup-header">
                                                            <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                                                            <span>{{ $service->title_description ?? '' }}</span>
                                                        </div>
                                                        <div class="help-popup-content">
                                                            {!! $service->description ?? '' !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox-wrap">
                                            <div class="price-box2">
                                                <span class="lb">全国平均</span>
                                                <span class="price">{{ number_format(!empty($money[$category->id][$service['id']]) ? $money[$category->id][$service['id']] : 0)}}</span>
                                                <span class="init">円</span>
                                                <span class="init-2">/回</span>
                                                <span class="required">※</span>
                                            </div>
                                        </div>
                                        <div class="input-right">
                                            <div class="in-one-month">
                                                <div class="select-group">
                                                            <span class="note-text">
                                                                このサービスは1ヶ月単位の契約で固定価格です
                                                            </span>
                                                    <svg class="arrow-down" id="arrow_2_" data-name="arrow (2)" xmlns="http://www.w3.org/2000/svg" width="8.701" height="8.091" viewBox="0 0 8.701 8.091">
                                                        <path id="Path_5456" data-name="Path 5456" d="M3.151,14.222,6.832,17.9a.669.669,0,0,0,.944,0l3.681-3.681a.669.669,0,0,0-.944-.947L7.3,16.484,4.095,13.275a.669.669,0,1,0-.944.947Z" transform="translate(-2.93 -10.007)" fill="#bebdbd"/>
                                                        <path id="Path_5457" data-name="Path 5457" d="M6.925,8.745a.669.669,0,0,0,.944,0l3.681-3.681a.669.669,0,0,0-.944-.947L7.4,7.326,4.187,4.117a.669.669,0,0,0-.944.947Z" transform="translate(-3.023 -3.944)" fill="#bebdbd"/>
                                                    </svg>
                                                </div>
                                                <div class="subtotal">
                                                    <span class="label">小計</span>
                                                    <span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="step4-checkbox-item style-2">
                                        <input type="checkbox" name="step4[]" value="{{ !empty($money[$category->id][$service['id']]) ? $money[$category->id][$service['id']] : 0 }}" />
                                        <div class="title-with-help">
                                                    <span class="checkbox-fake">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.489" height="8.359" viewBox="0 0 9.489 8.359">
                                                            <path id="Path_5440" data-name="Path 5440" d="M36.328,67.517a.208.208,0,0,1-.153-.067l-4.12-4.457a.208.208,0,0,1,.153-.349h1.983a.208.208,0,0,1,.157.072L35.725,64.3a7.889,7.889,0,0,1,.942-1.493,14.018,14.018,0,0,1,4.516-3.624.208.208,0,0,1,.226.348,13.61,13.61,0,0,0-1.981,2.052,15.3,15.3,0,0,0-2.9,5.777.208.208,0,0,1-.2.158Z" transform="translate(-32 -59.158)" fill="#fff"/>
                                                        </svg>
                                                    </span>
                                            <span class="text">{{ $service->title ?? '' }}</span>
                                            <div class="help-group in-checkbox">
                                                <button class="cal-help-button">
                                                    <img class="help-icon" src="{{ asset('frontend/assets/images/calculate/question-icon.svg') }}" alt="" />
                                                </button>
                                                <div class="help-popup">
                                                    <div class="help-popup-body">
                                                        <button class="close-help-popup">
                                                            <img src="{{ asset('frontend/assets/images/calculate/close-popup.svg') }}" alt="" />
                                                        </button>
                                                        <div class="help-popup-header">
                                                            <img class="nurse" src="{{ asset('frontend/assets/images/calculate/nurse-popup.png') }}" alt="" />
                                                            <span>{{ $service->title_description ?? '' }}</span>
                                                        </div>
                                                        <div class="help-popup-content">
                                                            {!! $service->description ?? '' !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox-wrap">
                                            <div class="price-box2">
                                                <span class="lb">全国平均</span>
                                                <span class="price">{{ number_format(!empty($money[$category->id][$service['id']]) ? $money[$category->id][$service['id']] : 0)}}</span>
                                                <span class="init">円</span>
                                                <span class="init-2">/回</span>
                                            </div>
                                        </div>
                                        <div class="input-right">
                                            <div class="in-one-month">
                                                <div class="select-group">
                                                    <span class="label"><span>1</span>ヶ月に</span>
                                                    <select name="step4-select1" >
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10+">10+</option>
                                                    </select>
                                                    <span class="active-text">
                                                            <span class="select-text">回数<small>を</small>選ぶ</span>
                                                            <svg class="select-arrow" xmlns="http://www.w3.org/2000/svg" width="6.028" height="13.232" viewBox="0 0 6.028 13.232">
                                                                <g id="Group_5315" data-name="Group 5315" transform="translate(0 -7)">
                                                                    <path id="Path_5708" data-name="Path 5708" d="M194.128,395.509h-5.1c-.412,0-.58.29-.376.647l2.558,4.483a.388.388,0,0,0,.739,0l2.558-4.483C194.708,395.8,194.539,395.509,194.128,395.509Z" transform="translate(-188.563 -380.675)" fill="#ffa8ba"/>
                                                                    <path id="Path_5709" data-name="Path 5709" d="M191.945.268a.388.388,0,0,0-.739,0l-2.558,4.483c-.2.357-.036.647.376.647h5.1c.412,0,.58-.29.376-.647Z" transform="translate(-188.562 7)" fill="#ffa8ba"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    <span class="no-active-text">回</span>
                                                    <ul class="select-dropdown">
                                                        <li data-value="1">1</li>
                                                        <li data-value="2">2</li>
                                                        <li data-value="3">3</li>
                                                        <li data-value="4">4</li>
                                                        <li data-value="5">5</li>
                                                        <li data-value="6">6</li>
                                                        <li data-value="7">7</li>
                                                        <li data-value="8">8</li>
                                                        <li data-value="9">9</li>
                                                        <li data-value="10">10＋　
                                                            <span class="desc">（10以上の場合）</span>
                                                        </li>
                                                    </ul>
                                                    <svg class="arrow-down" id="arrow_2_" data-name="arrow (2)" xmlns="http://www.w3.org/2000/svg" width="8.701" height="8.091" viewBox="0 0 8.701 8.091">
                                                        <path id="Path_5456" data-name="Path 5456" d="M3.151,14.222,6.832,17.9a.669.669,0,0,0,.944,0l3.681-3.681a.669.669,0,0,0-.944-.947L7.3,16.484,4.095,13.275a.669.669,0,1,0-.944.947Z" transform="translate(-2.93 -10.007)" fill="#bebdbd"/>
                                                        <path id="Path_5457" data-name="Path 5457" d="M6.925,8.745a.669.669,0,0,0,.944,0l3.681-3.681a.669.669,0,0,0-.944-.947L7.4,7.326,4.187,4.117a.669.669,0,0,0-.944.947Z" transform="translate(-3.023 -3.944)" fill="#bebdbd"/>
                                                    </svg>
                                                </div>
                                                <div class="subtotal">
                                                    <span class="label">小計</span>
                                                    <span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endforeach
@endif
