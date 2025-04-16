<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/fonts/font.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/header_footer.css">
    <title>取り組む課題｜Life Star</title>
</head>
<body>
    <div class="ovelay"></div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/header_search.php'); ?>
<!--    <div class="container">-->
<!--        <section class="company-logo">-->
<!--            <img src="./images/logo_LS_g.svg" alt="">-->
<!--        </section>-->
<!--    </div>-->
    <div class="wrapper">
        <div class="container">
            <section class="company-banner">
                <div class="conpany-banner__box">
                    <div class="box-img-1">
                        <img class="banner-1" src="./images/banner-1.svg" alt="">
                    </div>
                    <div class="box-img-2">
                        <img class="banner-2" src="./images/banner-2.png" alt="">
                    </div>
                </div>
            </section>
            <section class="company-list summary4-company-list">
                <!-- main content -->
                <div class="company-list__header">
                    <div class="summary4-list-header list-header">
                        <img src="./images/Rectangle 286.svg" alt="">
                        <h3>取り組む課題（CSR）</h3>
                    </div>
                    <div class="hr summary4-hr"></div>
                    <div class="list-content summary4">
                        <span>私たちは企業活動を通して<br>より良い社会づくりに貢献します</span>
                        <ul>
                            <p>私たちが取り組む課題</p>
                            <li>・ご本人の意思を尊重した生き方の実現</li>
                            <li>・最晩年期の暮らしの環境整備</li>
                            <li>・ご家族のご不安とご負担の軽減</li>
                            <span class="dis-block">Personal  Life Japan Corp.</span>
                        </ul>
                    </div>
                </div>
                <div class="company-list__toggle">
                    <h3>企業情報</h3>
                    <div class="toggle-img">
                        <img src="./images/toggle.svg" alt="">
                    </div>
                    <ul>
                        <li><a href="../about.php">▶<span>会社概要</span></a></li>
                        <li><a href="./greeting.php">▶<span>ごあいさつ</span></a></li>
                        <li><a href="./purpose.php">▶<span>事業の目的</span></a></li>
                        <li class="active"><a class="active" href="./issues.php">▶<span>取り組む課題</span></a></li>
                        <li><a href="./basicpolicy.php">▶<span>基本方針</span></a></li>
                        <li><a href="./serviceoutline.php">▶<span>サービス概要</span></a></li>
                        <li><a href="./privacypolicy.php">▶<span>プライバシーポリシー</span></a></li>
                        <li><a href="./location.php">▶<span>所在地・地図</span></a></li>
                    </ul>
                    <a href="../inquiry.php">
                        <img src="./images/customer inquiry.svg" class="pt-25" alt="">
                    </a>
                </div>
                <!-- main content -->
            </section>
        
            <section class="mobi-image-4 company-twitter company-twitter-summary4">
                <img src="./images/summary4.png" alt="">
                <img class="dis-block" src="./images/twitter.svg" alt="">
            </section>
            <div class="dis-none boring">
                <div>
                    <span> Personal  Life Japan Corp.</span>
                </div>
                <div class="mw">
                    <img src="./images/twitter.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="/js/header_footer.js"></script>
</body>
</html>