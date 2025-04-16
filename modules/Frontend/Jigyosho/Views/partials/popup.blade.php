<div class="overlay" id="overlay">
    <div class="popup">
        <form action="{{ route('jigyosho.map-search') }}" method="get" id="popup-form">
        <input type="text" id="selected-category" name="search_category" class="selected-category" hidden/>
        <input type="text" id="selected-area" class="selected-area" name="address_2" hidden/>      
        {{-- <input type="text" name="address_3" value=""  hidden/> --}}
  
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
                <input class="search-input-section" id="type-address" type="text" name="address_3" value="" placeholder="続きの住所を入力">
            </div>
        </div>
        <div class="checkbox-section">
            <label class="title">選択中のサポートの種類</label>
            <ul class="checkbox-list">
            </ul>
        </div>
        <div class="action-section">
            <button class="action-section-btn-white" type="button" onclick="resetCategorySelect()"><span class="button-text">サポートの分類を修正する</span></button>
            <button class="action-section-btn-white" type="button" onclick="resetAreaSelect()"><span class="button-text">エリアを修正する</span></button>
            <div class="line-straight"></div>
            <a class="action-section-text-explain" href="">選択した条件で</a>
            <button class="action-section-btn-blue" type="submit" ><span class="button-text">検索する <svg class="action-section-btn-blue-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="42" viewBox="0 0 34 42">
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
        </form>
    </div>
  </div>