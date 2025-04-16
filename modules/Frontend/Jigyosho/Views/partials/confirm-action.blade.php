<style>
  #search_action_container {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;    
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 99;
  }
  .search_action{
    background: #FDF4F4;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    width: 100%;
    background-color: #000000;
  }
  
  .confirm-section{
    background-color: #000000;
    height: 75px;
    display: flex;
    align-items: center;
    padding: 20px 5%;
    width: 1120px;
  }

  .action-btn-container1 {
  width: 25%;
  margin-right: 3%;
  color: #FFFFFF;
  height: 48px;
}

.action-btn-container2 {
  width: 18%;
  margin-right: 4%;
  margin-right: 3%;
  color: #FFFFFF;
  height: 48px;
}

.action-btn-container1 .action-section-btn-white{
  width: 100%!important;
}

.action-btn-container2 .action-section-btn-white{
  width: 100%!important;
}

</style>

<div class="search_action_container" id="search_action_container">
  <div class="search_action">
      <div class="confirm-section">
        <div class='action-btn-container1'>
          <button class="action-section-btn-white" type="button" onclick="clearCategory()"><span class="button-text">サポートの分類を修正する</span></button>
        </div>
        <div class='action-btn-container2'>
          <button class="action-section-btn-white" type="button" onclick="showPopup()"><span class="button-text">エリアを修正する</span></button>
        </div>        
        <div class="line-straight"></div>
        <a class="action-section-text-explain" href="">選択した条件で</a>
        <button class="action-section-btn-blue" onclick="submitPopupForm()" ><span class="button-text">検索する <svg class="action-section-btn-blue-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="42" viewBox="0 0 34 42">
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
