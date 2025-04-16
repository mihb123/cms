<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
    <link rel="stylesheet" href="/fonts/font.css" />
  <link href="../pages/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/header_footer.css">
</head>
<body>
  <div class="space_site"></div>
  <!-- Site Wrapper -->
  <div class="site-wrapper " style="padding-top: 80px">
    <!-- Header -->
      <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/header_search.php'); ?>
     <!-- End Header  -->

    <!-- Main Detail -->

    <div class="main-detail container">
      <div class="header-category">
        <div class="information-under">
          <div class="under-left">
            <span class="left-desc">LifeStar Members Page</span>
            <span class="left-title">LifeStar会員ページ</span>
            <div class="left-rectangle">
              <div class="rectangle-content">
                <img src="../pages/images/icon_face.svg" alt="">
                <span class="content-title">ようこそ<br>
                <span class="unline">須藤かおり</span><span class="fz-24">さん</span></span>
              </div>
            </div>
          </div>
          <div class="under-right">
            <div class="right-title">
              <span class="right-desc">あなたの街のコンシェルジュ</span>
              <img class="bellboy" src="../pages/images/bellboy.svg" alt="">
              <img class="tym" src="../pages/images/_x31_9_Heart.svg" alt="">
            </div>
            <div class="right-area">
              <span class="label">エリア</span>
              <a href="#"><span class="unline">東京</span> ,<span class="unline">多摩市</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Main Detail -->

    <div class="tab-header container">
      <div class="tab-header__left">
        <div class="tab-header--title">News <span class="d-pc-none img_sp"><img src="../pages/images/icon_25.svg" alt=""></span></div>
        <div class="tab-header--desc">今日も一日 無理をせず ゆっくりマイペース<br>
          お困りごとやご不安なこと、ご面倒なことがあれば<br>
          お気兼ねなく、どしどしご相談ください。</div>
      </div>
      <div class="tab-header__right">
        <img src="../pages/images/icon_25.svg" alt="">
        <div class="tab-right__content">
          <div class="tab-right__text">今日も一日、自分らしく 生きましょう</div>
          <div class="tab-right__desc">Let's live life to the fullest today.</div>    
        </div>
      </div>
    </div>
    <div class="table-content-wrap">

      <!-- Tab New -->
      <div id="tab-new" class="tab-active ">
      <div class="tab-container container">
        <img class="star" src="../pages/images/star.svg" alt="">
        <div class="menu-mobile">
          <img src="../pages/images/menu_mobile.svg" alt="">                  
        </div>
        <div class="tab-left">
          <div class="icon_show">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="62" height="48" viewBox="0 0 62 48">
              <defs>
                <filter id="_" x="0" y="0" width="62" height="48" filterUnits="userSpaceOnUse">
                  <feOffset dy="3" input="SourceAlpha"/>
                  <feGaussianBlur stdDeviation="3" result="blur"/>
                  <feFlood flood-color="#f9bac8"/>
                  <feComposite operator="in" in2="blur"/>
                  <feComposite in="SourceGraphic"/>
                </filter>
              </defs>
              <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="#FFFFFF">
                <text id="_2" data-name="≫" transform="translate(18 6) rotate(90)" fill="#fff" font-size="30" font-family="SourceHanSans-Medium, Source Han Sans" font-weight="500"><tspan x="0" y="0">≫</tspan></text>
              </g>
            </svg>
  
          </div>
          <div class="personal">
            <div class="personal-content">
              <div class="personal-content__new">
                <div class="new-title">News <span class="btn_close"><img src="../pages/images/icon-close.svg" alt=""></span></div>
                <a href="./new_2.php">
                <span class="new-desc"><span class="ls-mark-pink d-pc-none"></span>閲覧履歴</span>
                </a>
                <a href="./new_3.php">
                <span class="new-desc"><span class="ls-mark-pink d-pc-none"></span>困りごとの相談</span>
                </a>
              </div>
              <div class="personal-content__main">
                <div class="main-line">                  
                </div>
                <div class="content-nav">
                  <p>▼<span class="space-10"></span>有料会員様向けのサービス</p>
                  <ul>
                    <li> <span class="ls-mark-pink d-pc-none"></span>買い物代行</li>
                    <li> <span class="ls-mark-pink d-pc-none"></span>家事お手伝い手配</li>
                    <li> <span class="ls-mark-pink d-pc-none"></span>留守番サービス</li>
                    <li> <span class="ls-mark-pink d-pc-none"></span>お出掛けタクシー手配</li>
                    <li> <span class="ls-mark-pink d-pc-none"></span>医療介護者との調整代行</li>
                    <li> <span class="ls-mark-pink d-pc-none"></span>ひとりの時間</li>
                  </ul>
                </div>
              </div>

            </div>
            <div class="personal-content__footer">
              Personal  Life Japan Corp.
            </div>
          </div>
          <div class="kango">
              <div class="kango-img">
                  <img src="../pages/images/Group.svg" alt="">
              </div>
              <div class="concerns-title">
                  お困り事や
                  <span>ご心配なことがございますか？</span>
                  <img class="kango_hover" src="../pages/images/icon_next--blue.svg" alt="">
              </div>
              <div class="concerns-content">
                私どものホームメディカル相談員が
                無料で誠心誠意ご相談に応じます。<br>
                何かお力になれるかもしれません。
              </div>
              <div class="concerns-sub-title">
                  Life Star ホームメディカル相談室
              </div>
              <div class="concerns-sub-content">Life Star Home Medical Consultation Office</div>
          </div>
          </div>
          <div class="tab-right">
            <div class="tab-list">
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item tab-item__small">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age-small.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
              <div class="tab-item">
                <div class="tab-item__img">
                  <img src="../pages/images/old-age.svg" alt="">
                </div>
                <div class="tab-item__title">
                  介護用品をネットで購入できるようになりました
                </div>
                <div class="tab-item__date">
                  ９/18 .2022
                </div>
              </div>
            </div>

            <a href="#">
            <div class="tab-right__button">
                <img src="../pages/images/play-movie.svg" alt="">
                <span class="tab-right__button--text">もっと見る</span> 
              </div>
            </a>

            <div class="kango kango_mobile">
              <div class="kango-img">
                  <img src="../pages/images/Group.svg" alt="">
              </div>
              <div class="concerns-title">
                  お困り事や
                  <span>ご心配なことがございますか？</span>
                  <img class="kango_hover" src="../pages/images/icon_next--blue.svg" alt="">
              </div>
              <div class="concerns-content">
                私どものホームメディカル相談員が
                無料で誠心誠意ご相談に応じます。<br>
                何かお力になれるかもしれません。
              </div>
              <div class="concerns-sub-title">
                  Life Star ホームメディカル相談室
              </div>
              <div class="concerns-sub-content">Life Star Home Medical Consultation Office</div>
           </div>
          </div>
      </div>
    </div>
      <!-- End Tab New -->
      <!-- Footer -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
      <!-- End Footer -->
    </div>

  </div>
  <!-- End Site Wrapper -->
  <script src="../pages/js/jquery-3.6.1.min.js"></script>
  <script src="../pages/js/main.js"></script>
  <script src="/js/header_footer.js"></script>
</body>
</html>
