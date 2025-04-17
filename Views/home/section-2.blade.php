<!-- section02 start-->
<div class="section-2">
    <div class="container">
        <!-- title add start -->
        <div class="s-map">
            <div class="s-map-title">
                <div class="s-map-title__text-box">
                    <span class="s-map-title__text--big">地図から探す</span><span
                        class="s-map-title__text--middle">（東京都）</span>
                </div>
            </div>
            <div class="s-map-logo">
                <div class="s-map-logo__text">Search by Support Category</div>
                <div class="s-map-logo__img-box">
                    <img class="s-map-logo__img-box" src="{{ asset('frontend/jigyosho/issets/images/select02/icon_MapTokyo.svg') }}" alt="" />
                </div>
            </div>
        </div>
        <!-- title add end -->

        <p class="text-map">
            支えてくれるサポートの種類から自宅療養を支えてくれる人たちを探す
        </p>


        <!-- map start -->
        <div class="map">

            <?php  // [クリッカブルMap] ＜東京都＞ (@ edited by a.u  2022.07.25) START 
                ?>
            <!--[コメントアウト]  img src="{{ asset('frontend/jigyosho/issets/images/select02/map_secon.png" alt="" / -->
            <div class="clckbl_map">
                <?php 
                // require_once('./clckbl_map.php'); 
                ?>
            </div>
            <?php  // [クリッカブルMap] ＜東京都＞ (@ edited by a.u  2022.07.25) END 
                ?>

            <div class="map__title">
                <span class="map__title--big">主な支援者の種類ピン</span>
                <span class="map__title--small">Main Supporters Type Pin</span>

            </div>

            <ul class="mapdatalist map__list">
                <li class="li01 map__item" data-type="公共の相談所">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side01.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data01.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=公共の相談所" class="link02"></a>
                    </div>
                </li>
                <li class="li02 map__item" data-type="専門相談員（無料）">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side02.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data02.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=専門相談員（無料）" class="link02"></a>
                    </div>
                </li>
                <li class="li03 map__item" data-type="訪問医師">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side03.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data03.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問医師" class="link02"></a>
                    </div>
                </li>
                <li class="li04 map__item" data-type="訪問介護士">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side04.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data04.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問介護士" class="link02"></a>
                    </div>
                </li>
                <li class="li05 map__item" data-type="訪問看護師">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side05.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data05.png') }}" alt="">
                        <a href="" class="link01"></a>
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問看護師" class="link02"></a>
                    </div>
                </li>
                <li class="li06 map__item" data-type="訪問リハビリ">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side06.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data06.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問リハビリ" class="link02"></a>
                    </div>
                </li>
                <li class="li07 map__item" data-type="福祉用具（ベッド他）">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side07.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data07.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=福祉用具（ベッド他）" class="link02"></a>
                    </div>
                </li>
                <li class="li08 map__item" data-type="訪問入浴">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side08.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data08.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問入浴" class="link02"></a>
                    </div>
                </li>
                <li class="li09 map__item" data-type="訪問薬局">
                    <img src="{{ asset('frontend/jigyosho/issets/images/icon_side09.png') }}" alt="アイコン" class="icon">
                    <div class="data">
                        <img src="{{ asset('frontend/jigyosho/issets/images/map_data09.png') }}" alt="">
                        <!--                                <a href="" class="link01"></a>-->
                        <a href="/jigyosho/TopNarrow-1.php?search_category=訪問薬局" class="link02"></a>
                    </div>
                </li>
            </ul>

        </div>
        <!-- map end -->

    </div>

</div>
<!-- section02 end-->