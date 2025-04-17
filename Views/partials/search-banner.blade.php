    <button onclick="showPopup()">Mở Popup</button>
    <div class="overlay" id="overlay">
        <div class="popup">
            <div class="search-section">
                <label class="title">選択中のエリア</label>
                <div class="search-container">
                    <div class="search-box">
                        <svg class="search-btn" id="search" xmlns="http://www.w3.org/2000/svg" width="24.003"
                            height="24" viewBox="0 0 24.003 24">
                            <path id="Path_2543" data-name="Path 2543"
                                d="M9.661,19.347a9.637,9.637,0,0,0,5.922-2.034L21.969,23.7a1.2,1.2,0,0,0,1.7-1.7l-6.386-6.386a9.655,9.655,0,1,0-7.62,3.732ZM4.53,4.561a7.256,7.256,0,1,1,0,10.262h0A7.23,7.23,0,0,1,4.493,4.6l.037-.037Z"
                                transform="translate(0 -0.035)" fill="#0867bf" />
                        </svg>
                        <div class="selected-tags">
                        </div>
                    </div>
                    <input class="search-input-section" id="search-input-section-id" type="text" placeholder="続きの住所を入力">
                </div>
            </div>
            <div class="checkbox-section">
                <label class="title">選択中のサポートの種類</label>
                <ul class="checkbox-list">
                    <li class="checkbox-item">
                        <div class="square-box"><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="25.991" height="21.469" viewBox="0 0 25.991 21.469">
                                <path id="check_1_" data-name="check (1)" d="M27.062,10.823c-4.78,1.569-10.873,5.765-16.492,12.953l-3.32-3.685a1.327,1.327,0,0,0-1.97,0L2.834,22.828a1.31,1.31,0,0,0,.073,1.824l7.516,7.225a1.34,1.34,0,0,0,2.08-.328A62.9,62.9,0,0,1,28.12,12.684a1.1,1.1,0,0,0-1.058-1.861Z" transform="translate(-2.5 -10.766)" fill="#ffb1bf" />
                            </svg>
                        </div>
                        <div class="checkbox-item-data">
                            <span class="checkbox-item-data-1">訪問看護師</span>
                            <br>
                            <span class="checkbox-item-data-2">自宅まで来てくれる看護師さん</span>
                        </div>
                        <input type="checkbox" style="display:none;">
                        <img src="{{ asset('frontend/jigyosho/issets/images/icon_side01.png') }}" alt="" class="">
                    </li>
                </ul>
            </div>
            <div class="action-section">
                <button class="action-section-btn-white"><span class="button-text">サポートの分類を修正する</span></button>
                <button class="action-section-btn-white"><span class="button-text">エリアを修正する</span></button>
                <div class="line-straight"></div>
                <a class="action-section-text-explain" href="">選択した条件で</a>
                <button class="action-section-btn-blue"><span class="button-text">検索する <svg class="action-section-btn-blue-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="42" viewBox="0 0 34 42">
                            <defs>
                                <filter id="_" x="0" y="0" width="34" height="42" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feFlood flood-color="#fff" flood-opacity="0.502" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#_)">
                                <text id="_2" data-name="≫" transform="translate(9 25)" fill="#fff" font-size="16" font-family="SourceHanSansJP-Regular, Source Han Sans JP" letter-spacing="0.2em" opacity="0.89">
                                    <tspan x="0" y="4">≫</tspan>
                                </text>
                            </g>
                        </svg></span>
                </button>
            </div>
        </div>
    </div>
    <script>
        function showPopup() {
            document.getElementById('overlay').classList.add('show');
        }
    </script>