<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/fonts/font.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/header_footer.css">
    <title>所在地・地図｜Life Star</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
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
            <section class="company-list">
            <!-- main content -->
                <div class="company-list__header">
                    <div class="list-header">
                        <img src="./images/Rectangle 286.svg" alt="">
                        <h3>所在地・地図</h3>
                    </div>
                    <div class="hr"></div>
                    <div class="list-content summary8">
                    <div class="summary-box">
                        <div class="title">
                            <span>＜本社＞</span>
                            <hr class="line">
                        </div>
                        <div class="description">
                            <span>東京都多摩市落合1-15-2　</span><span>多摩センタートーセイビル 5階</span>
                        </div>
                        <div class="content">
                            <ul>
                                <li><span>・京王相模原線「京王多摩センター駅」　徒歩5分</span></li>
                                <li><span>・小田急多摩線「小田急多摩センター駅」徒歩５分</span></li>
                                <li><span>・多摩都市モノレール「多摩センター駅」徒歩10分</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="summary-box">
                        <div class="title">
                            <span>＜多摩センター駅前オフィス＞</span>
                            <hr class="line">
                        </div>
                        <div class="description">
                            <span>東京都多摩市落合1-5-1　</span><span>グリムコートビル 4階</span>
                        </div>
                        <div class="content">
                            <ul>
                                <li><span>・京王相模原線「京王多摩センター駅」　徒歩1分</span></li>
                                <li><span>・小田急多摩線「小田急多摩センター駅」徒歩1分</span></li>
                                <li><span>・多摩都市モノレール「多摩センター駅」徒歩5分</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="summary8-img">
                        <div style="height: 400px; width:100%" id="map"></div>
                    </div>
                    <div class="list-footer summary5-list-footer summary8-list-footer">
                        <span class="list-footer__summary2">Personal  Life Japan Corp.</span>
                    </div>
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
                        <li><a href="./issues.php">▶<span>取り組む課題</span></a></li>
                        <li><a href="./basicpolicy.php">▶<span>基本方針</span></a></li>
                        <li><a href="./serviceoutline.php">▶<span>サービス概要</span></a></li>
                        <li><a href="./privacypolicy.php">▶<span>プライバシーポリシー</span></a></li>
                        <li class="active"><a class="active" href="./location.php">▶<span>所在地・地図</span></a></li>
                    </ul>
                    <a href="../inquiry.php">
                        <img src="./images/customer inquiry.svg" style="padding-top: 25px" alt="">
                    </a>
                </div>
            <!-- main content -->
                
            </section>
            <section class="company-twitter summary8-company-twitter">
                <img src="./images/twitter.svg" alt="">
            </section>
        </div>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/leaflet.js"></script>
    <script src="./js/main.js"></script>
    <script src="/js/header_footer.js"></script>
</body>
</html>