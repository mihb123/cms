@if($listPartner)
    <div class="sponsor d-tb-none d-sp-none">
        <h2 class="title">ご協賛</h2>
        <div class="sponsor-box">
            <div class="title-box">より良い最期を過ごせる社会を企業の皆様と一緒に。　Life Starゴールドパートナー。 </div>
            <div class="sponsor-list">
                @foreach($listPartner as $key => $partner)
                    @if(isset($partner->avatar->path))
                        <a href="{{ $partner->url }}" class="sponsor-item">
                            <img src="{{ getImageThumb($partner->avatar->path) }}" alt="" />
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="sponsor-note">
            <span>※</span>
            <span>お名前の掲載は、ご協賛金額により自動で表示の大きさや位置が変わる設定となっております。<br>
                        あらかじめご了承くださいますようお願い申し上げます。</span>
        </div>
        <div class="register-sponsor"><a href="/info/inquiry.php" target="_blank">ご協賛のお申し込みフォームはこちら ＞</a></div>
    </div>
@endif
