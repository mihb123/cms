<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/fonts/font.css" />
    <link rel="stylesheet" href="./css/style.css">
<!--    <link rel="stylesheet" href="/fonts/font.css">-->
    <link rel="stylesheet" type="text/css" href="/css/header_footer.css">
    <title>基本方針｜Life Star</title>
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
            <section class="company-list summary5-company-list">
                <!-- main content -->
                <div class="company-list__header">
                    <div class="list-header">
                        <img src="./images/Rectangle 286.svg" alt="">
                        <h3>基本方針</h3>
                    </div>
                    <div class="hr"></div>
                    <div class="list-content summary5">
                        <p class="summary-p">私たちはすべてのステークホルダーとの良好な関係構築に努め、中長期的に企業として成長をし社会へ貢献することを目的として以下の基本方針および活動方針に基づき企業活動を推進して参ります。
                        </p>
                        <div class="summary5-box">
                            <span>全体方針</span>
                            <hr>
                            <ul>
                                <li>1.<span>ご本人の希望や望みをどこまでも尊重できる社会づくりの推進に貢献します</span></li>
                                <li>2.<span>終末期に伴う様々な負担や苦痛の事象を事前に学べるよう有益な情報を発信します</span></li>
                                <li>3.<span>同じ境遇にある人々や多くの有用な経験則を有した方々が互いに励まし合い<br>支え合える交流の場を提供します</span></li>
                            </ul>
                        </div>
                        <div class="summary5-box box-two">
                            <span>活動方針</span>
                            <hr>
                            <ul>
                                <li>1.<span>常に相手の心に寄り添うことを最優先します</span></li>
                                <li>2.<span>耳を傾けることを優先し望みの理解に努めます</span></li>
                                <li>3.<span>多種多様な価値観を受け入れ尊重します</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="list-footer summary5-list-footer">
                        <span class="list-footer__summary2">Personal Life Japan Corp.</span>
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
                        <li class="active"><a class="active" href="./basicpolicy.php">▶<span>基本方針</span></a></li>
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
            <section class="company-twitter summary5-company-twitter">
                <img src="./images/twitter.svg" alt="">
            </section>
        </div>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="/js/header_footer.js"></script>
</body>
</html>