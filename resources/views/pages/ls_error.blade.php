
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="Life,Star,自宅療法,医療,介護">
    <title>LifeStarのページが見つからない場合</title>
    <link rel="stylesheet" href="{{ asset('cms/ls_error/css/style.css') }}">
</head>
<body>
    <header  id="sp_err_header">
        <a href="/">
            <img src="{{ asset('cms/ls_error/img/LSlogo-sp.svg') }}"   width="200"  height="100"  alt="LifeStar_logo">
        </a>  
    </header>
    <header  id="pc_err_header">
        <a href="/">
            <img src="{{ asset('cms/ls_error/img/LSlogo-pctb.svg') }}"   width="200"  height="100"  alt="LifeStar_logo">
        </a>  
    </header>

    <main> 
        <h1  class="err_h1">
            <span>ご指定のページが</span>
            <br>
            <span>見つかりませんでした</span>
        </h1> 
        <div class="err_img">
            <img src="{{ asset('cms/ls_error/img/girl.png') }}"  width="300"  height="350"  alt="LifeStar_error_image">
        </div>

        <div class="sp_err_text">
                <p class="sp_err_text_cont">当サイト「LifeStar.co.jp」をご利用いただき
                ありがとうございます。</p>
                
                <p class="sp_err_text_cont">お探しのページは削除されたか、URLが変更されたか、または一時的にご利用できない可能性があります。</p>
                
                <p class="sp_err_text_cont">ご不明のことがある場合、当サイト中の<a  href="/info/contact.php">「いつでも相談窓口」</a>よりお尋ね下さい。</p>
        </div>

        <div class="pc_err_text">
            <p class="pc_err_text_cont">当サイト「LifeStar.co.jp」をご利用いただき、ありがとうございます。</p>
            
            <p class="pc_err_text_cont">お探しのページは削除されたか、URLが変更されたか、または一時的にご利用できない<br>可能性があります。</p>
            
            <p class="pc_err_text_cont">ご不明のことがある場合、当サイト中の<a  href="/info/contact.php">「いつでも相談窓口」</a>よりお尋ね下さい。</p>
     </div>

        <div class="err_link">
            <p><a href="/">トップページへ戻る</a></p>
        </div>

    </main>

    <footer>
        <p>&copy;  Life   Star  .co.  jp</p>
    </footer>
</body>

</html>