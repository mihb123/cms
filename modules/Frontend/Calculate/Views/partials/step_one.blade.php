<div class="step-box step-1">
    <img class="step-number" src="{{ asset('frontend/assets/images/calculate/step-1.svg') }}" alt="" />
    <img class="icon-calculate" src="{{ asset('frontend/assets/images/calculate/cal-icon.svg') }}" alt="" />
    <span class="first-choise">まずは、暮らしの拠点を選びましょう</span>
    <div class="header-box">
        <div class="thumb">
            <img class="nurse" src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
        </div>
        <div class="caption">
            <h2 class="title">療養<small>する</small><br class="d-pc-none d-tb-none" >拠点<small>は</small>どこですか？</h2>
        </div>
    </div>
    <div class="radio-group-1">
        <label class="custom-radio-1">
            <input id="" type="radio" name="step1" value="1" />
            <span class="radio-item-1">
                <span class="title-en">One's Home</span>
                <span class="relative">
                    <img class="icon has-smoke" src="{{ asset('frontend/assets/images/calculate/home.svg') }}" alt="" />
                    <img class="smoke-active" src="{{ asset('frontend/assets/images/calculate/smoke.svg') }}" alt="" />
                </span>
                <span class="title">自宅</span>
                <span class="checkbox-square">
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
                </span>
            </span>
        </label>
        <label class="custom-radio-1">
            <input type="radio" name="step1" value="2" />
            <span class="radio-item-1">
                <span class="title-en">Care Facility</span>
                <img class="icon" src="{{ asset('frontend/assets/images/calculate/care-faci.svg') }}" alt="" />
                <span class="title">施設</span>
                <span class="checkbox-square">
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
                </span>
            </span>
        </label>
    </div>
    <a href="#step-2" class="next-step" style="display:none">
        <img src="{{ asset('frontend/assets/images/calculate/move.svg') }}" alt="" />
    </a>
</div>
