@extends('homepage::layout')

@section('content')
    @include('homepage::menu.index')
    <div class="main-content-wrap">
        <div class="main-content-left">
            <!-- Family do sp -->
            <div class="card-sp family-do d-pc-none d-tb-none">
                <div class="card-header">
                    <h2 class="title">看取る<span>家族にできること</span></h2>
                    <span class="text-en in-center">What the family can do</span>
                </div>
                <div class="card-body">
                    <div class="family-do-box">
                        <img class="question-icon" src="{{ asset('frontend/assets/images/question-icon.svg') }}"
                            alt="" />
                        <div class="sub-title">
                            家族<small>が</small>余命宣告<small>を</small>受けた時
                        </div>
                        <h3 class="title">
                            <span>何ができる ? どうしたらいい ?</span>
                        </h3>
                        <div class="text-en">Peaceful final days with family close by.</div>
                        <span class="image-center">
                            <img src="{{ asset('frontend/assets/images/what-should-we-do.svg') }}" alt="" />
                        </span>
                        <div class="title-bottom">
                            <span>
                                <img src="{{ asset('frontend/assets/images/star.svg') }}" alt="" />
                                家族にできる大切なケアがあります
                            </span>
                        </div>
                        <div class="more">
                            <a href="/看取る家族にできること_N/index.html" class="link-with-icon">
                                <span class="text">詳しく読んでみる</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                        viewBox="0 0 6.935 10.758">
                                        <path id="path9429"
                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Family do sp -->

            <!-- Five point tablet -->
            <div class="widget five-points in-content d-pc-none d-sp-none">
                <div class="widget--header">
                    <h3 class="title"><span>家族にできる</span></h3>
                    <div class="sub-title"><span>5</span>つの事</div>
                    <span class="title-center">- 看取りの要点 -</span>
                    <span class="text-en">End-of-life<br>care essentials</span>
                </div>
                <div class="widget--body">

                    <div class="nurse-box">
                        <div class="nurse-header">
                            <div class="avatar">
                                <img src="{{ asset('frontend/assets/images/sato.png') }}" width="50px" alt="" />
                            </div>
                            <div class="info">
                                <div class="name">看護師　佐藤 礼</div>
                                <div class="job">訪問看護師歴11年</div>
                            </div>
                        </div>
                        <div class="nurse-desc">
                            「できるだけ穏やかな最期を迎えてほしい」そばにいるご家族は、そう強く願うことかと思います。でも「何から準備をしていいのか分からない」と、疑問や不安を抱えた時に、事前に知っていると安心につながることがありますので1つずつお伝えしていきます。
                        </div>
                    </div>

                    <div class="list-points">
                        <div class="point-item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/f-point-1.svg') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h4 class="title">情報<span class="small">を</span>集める<span
                                        class="sub">（からだの変化や療養の事）</span></h4>
                            </div>
                        </div>
                        <div class="point-item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/f-point-2.svg') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h4 class="title">本当<span class="small">は</span>どうしたいのかを聞く</h4>
                            </div>
                        </div>
                        <div class="point-item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/f-point-3.svg') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h4 class="title">どこでどう過ごすのか<span class="small">決める</span></h4>
                            </div>
                        </div>
                        <div class="point-item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/f-point-4.svg') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h4 class="title">準備する<span class="sub">（専門家に相談しながら進める）</span></h4>
                            </div>
                        </div>
                        <div class="point-item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/images/f-point-5.svg') }}" alt="" />
                            </div>
                            <div class="caption">
                                <h4 class="title">したい事<span class="small-2">してあげたい事</span><span class="small">をする</span>
                                </h4>
                            </div>
                        </div>
                        <img src="{{ asset('frontend/assets/images/care-2.png') }}" alt="" class="care-img" />
                    </div>


                    <div class="view-more">
                        <a href="/家族にできる5つの事_N/index.htm" class="link-with-icon">
                            <span class="text">もっと詳しく見る</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                    viewBox="0 0 6.935 10.758">
                                    <path id="path9429"
                                        d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                        transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Five point tablet -->

            <div class="card-sp five-points-sp d-pc-none d-tb-none">
                <div class="card-header">
                    <h2 class="title">家族にできる <span> 看取りの要点</span></h2>
                    <span class="text-en in-center">End-of-life<br>care essentials</span>
                </div>
                <div class="card-body">
                    <div class="center-top">
                        <h3 class="title">～ 家族<span>にできる</span>５つの事 ～</h3>
                        <div class="text-en">Five things your family can do</div>
                    </div>

                    <div class="nurse-box">
                        <div class="nurse-header">
                            <div class="avatar">
                                <object data="{{ asset('frontend/assets/images/sato.png') }}" width="50px"
                                    type="image/png"></object>
                            </div>
                            <div class="info">
                                <div class="name">看護師　佐藤 礼</div>
                                <div class="job">訪問看護師歴11年</div>
                            </div>
                        </div>
                        <div class="nurse-desc">
                            「できるだけ穏やかな最期を迎えてほしい」そばにいるご家族は、そう強く願うことかと思います。
                            でも「何から準備をしていいのか分からない」と、疑問や不安を抱えた時に、事前に知っていると安心につながることがありますので1つずつお伝えしていきます。
                        </div>
                    </div>

                    <div class="list-points">
                        <div class="point-item acc">
                            <div class="point-header">
                                <object type="image/svg+xml" class="icon"
                                    data="{{ asset('frontend/assets/images/f-point-1.svg') }}"></object>
                                <h4 class="title">必要な情報<span>を</span>集める</h4>
                                <span class="arrow-down">@include('homepage::svg.arrow-down-2')</span>
                            </div>
                            <div class="point-content" style="display: none;">
                                <div class="title">
                                    からだの変化や<br>
                                    療養のための情報を集める
                                </div>
                                <ul>
                                    <li>余命や予後について主治医に聞く</li>
                                    <li>相談窓口を知る</li>
                                    <li>療養先別に費用を比較検討してみる</li>
                                </ul>
                                <div class="desc">
                                    どこで過ごすか、どんな環境で過ごすのかを少しずつイメージするために、まずは上記の項目を参考にしながら、必要な情報を集めましょう。
                                </div>
                                <div class="more">
                                    <a href="#" class="link-with-icon">
                                        <span class="text">もっと詳しく読む</span>
                                        <img src="{{ asset('frontend/assets/images/share-icon.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="point-item acc ">
                            <div class="point-header">
                                <object type="image/svg+xml" class="icon"
                                    data="{{ asset('frontend/assets/images/f-point-2.svg') }}"></object>
                                <h4 class="title"><span>本人に</span>どうしたいのかを聞く</h4>
                                <span class="arrow-down">@include('homepage::svg.arrow-down-2')</span>
                            </div>
                            <div class="point-content" style="display: none;">
                                <div class="title">
                                    本人に「どうしたいのか」<br>
                                    「どう過ごしたいか」を聞く
                                </div>
                                <ul>
                                    <li>これからの時間をどう過ごしたいか</li>
                                    <li>いざという時はどうするか</li>
                                </ul>
                                <div class="desc">
                                    残された時間を、よりその人らしく過ごすための第一歩は、本人が「どうしたいのか」その人の声で、しっかりとすくい上げることです。難しく考えなくて大丈夫です。面談のような堅苦しい雰囲気で聞く必要はありません。ふだんの会話の中で聞ける話こそが、本人の大事な価値観を聞けるチャンスです。聞けることから、少しずつ聞いてみてくださいね。
                                </div>
                                <div class="more">
                                    <a href="#" class="link-with-icon">
                                        <span class="text">もっと詳しく読む</span>
                                        <img src="{{ asset('frontend/assets/images/share-icon.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="point-item acc ">
                            <div class="point-header">
                                <object type="image/svg+xml" class="icon"
                                    data="{{ asset('frontend/assets/images/f-point-3.svg') }}"></object>
                                <h4 class="title">どこでどう過ごすのか<span>を</span>決める</h4>
                                <span class="arrow-down">@include('homepage::svg.arrow-down-2')</span>
                            </div>
                            <div class="point-content" style="display: none;">
                                <div class="title">
                                    「どこで」「どのように過ごすのか」を決める
                                </div>
                                <ul>
                                    <li>本人の希望を家族みんなで共有する</li>
                                    <li>誰がどのように関わるかを決める</li>
                                    <li>今後の可能性について家族内で予測をしておく</li>
                                </ul>
                                <div class="desc">
                                    病状や予後、本人の希望をふまえて、「どこで」「どのように過ごすのか」を決めていきましょう。
                                </div>
                                <div class="more">
                                    <a href="#" class="link-with-icon">
                                        <span class="text">もっと詳しく読む</span>
                                        <img src="{{ asset('frontend/assets/images/share-icon.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="point-item acc ">
                            <div class="point-header">
                                <object type="image/svg+xml" class="icon"
                                    data="{{ asset('frontend/assets/images/f-point-4.svg') }}"></object>
                                <h4 class="title"><span>専門家に相談しながら</span>準備する</h4>
                                <span class="arrow-down">@include('homepage::svg.arrow-down-2')</span>
                            </div>
                            <div class="point-content" style="display: none;">
                                <div class="title">
                                    主治医や看護師、ケアマネー<br>ジャーなどの専門家に相談しながら準備する
                                </div>
                                <ul>
                                    <li>専門家に本人と決めた希望を伝える</li>
                                    <li>想定される症状が出た時の対応を一緒に考える</li>
                                </ul>
                                <div class="desc">
                                    療養する先について、本人を含めた家族間で決まったら、主治医や看護師、ケアマネージャーなどの専門家に具体的に相談していきましょう。相談するタイミングは、イメージがはっきりできない、曖昧な状態でも大丈夫です。専門家がいっしょにイメージを整えていってくれます。
                                </div>
                                <div class="more">
                                    <a href="#" class="link-with-icon">
                                        <span class="text">もっと詳しく読む</span>
                                        <img src="{{ asset('frontend/assets/images/share-icon.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="point-item acc ">
                            <div class="point-header">
                                <object type="image/svg+xml" class="icon"
                                    data="{{ asset('frontend/assets/images/f-point-5.svg') }}"></object>
                                <h4 class="title">したい事・してあげたい事 <span>をする</span></h4>
                                <span class="arrow-down">@include('homepage::svg.arrow-down-2')</span>
                            </div>
                            <div class="point-content" style="display: none;">
                                <div class="title">
                                    療養の暮らしでは、<br>
                                    本人が「したいこと」家族が「してあげたいこと」をする
                                </div>
                                <ul>
                                    <li>本人の心と体と相談しながら「したいこと」に沿う</li>
                                    <li>「してあげたいこと」もガマンせず口に出していい</li>
                                </ul>
                                <div class="desc">
                                    療養生活がスタートしたら、「したいこと」「してあげたいこと」を、少しずつ、叶えられる順に叶えていきましょう。
                                </div>
                                <div class="more">
                                    <a href="#" class="link-with-icon">
                                        <span class="text">もっと詳しく読む</span>
                                        <img src="{{ asset('frontend/assets/images/share-icon.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="view-more">
                        <a href=" /家族にできる5つの事_N/index.html" class="link-with-icon">
                            <span class="text">もっと詳しく見る</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                    viewBox="0 0 6.935 10.758">
                                    <path id="path9429"
                                        d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                        transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                </svg>
                            </span>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Three it tablet -->
            <div class="widget three-it in-content d-pc-none d-sp-none">
                <div class="widget--header">
                    <h3 class="title">看取りに <span>大切な3つのこと</span>
                        <span class="text-en">Three important thing</span>
                    </h3>
                </div>
                <div class="widget--body">
                    <div class="content-left">
                        <div class="header-3it">
                            <div class="sub-title">家族がおさえる</div>
                            <div class="title">大切な3つの看取りポイント</div>
                            <div class="text-en">Three important points for families to keep in mind</div>
                        </div>
                        <div class="list-3it">
                            <div class="item-3it">
                                <div class="icon-left">
                                    <span class="point-text">Point <span>1</span></span>
                                    <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-1.png') }}"
                                            alt="" /></span>
                                </div>
                                <div class="title-right">
                                    <div class="title">本人の希望<span>を</span>知る</div>
                                </div>
                            </div>
                            <div class="item-3it">
                                <div class="icon-left">
                                    <span class="point-text">Point <span>2</span></span>
                                    <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-2.png') }}"
                                            alt="" /></span>
                                </div>
                                <div class="title-right">
                                    <div class="title">専門家<span>の</span>力<span class="small-2">を</span><br>上手にかりる</div>
                                </div>
                            </div>
                            <div class="item-3it">
                                <div class="icon-left">
                                    <span class="point-text">Point <span>3</span></span>
                                    <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-3.png') }}"
                                            alt="" /></span>
                                </div>
                                <div class="title-right">
                                    <div class="sub-title">この先<span>の</span></div>
                                    <div class="title">からだの変化を知る</div>
                                </div>
                            </div>
                        </div>
                        <div class="view-more text-right">
                            <a class="link-with-icon" href="/大切な3つの看取りポイント_N/index.html">
                                <span class="text">もっと詳しく見る</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                        viewBox="0 0 6.935 10.758">
                                        <path id="path9429"
                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="content-right">
                        <a class="testimonials-box" href="{{ route('mitori-taiken.index') }}">
                            <div class="speech-bubble">
                                <span>家族が語る</span>
                                <span>看取りの話</span>
                            </div>
                            <h3 class="title">
                                私の看取り体験談
                            </h3>
                            <div class="sub-title-en">Stories of each family</div>
                            <img class="people" src="{{ asset('frontend/assets/images/people.png') }}" alt="">
                            <div class="desc">
                                大切な家族を看取った方々が自分自身の言葉で看取りを振り返り、上手くできたことやもっとこうすれば良かったことなどを、リアルな体験談としてシェアをしてくれています。
                            </div>
                            <div class="psychological-care">
                                <img class="house" src="{{ asset('frontend/assets/images/house-cleaning.png') }}"
                                    alt="" />
                                <img class="beds" src="{{ asset('frontend/assets/images/beds.png') }}"
                                    alt="" />
                                <span class="text">Psychological care</span>
                            </div>
                            <div class="text-center">
                                <span href="" class="read-more">体験談を読んでみる</span>
                            </div>
                            <span href="#" class="arrow-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                    viewBox="0 0 6.935 10.758">
                                    <path id="path9429"
                                        d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                        transform="translate(-1.976 -291.965)" fill="#fff" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Three it tablet -->

            <!-- Three it sp -->
            <div class="card-sp three-it d-pc-none d-tb-none">
                <div class="card-header">
                    <h2 class="title">看取りに <span>大切な3つのこと</span></h2>
                    <span class="text-en in-center">Three important thing</span>
                </div>
                <div class="card-body">
                    <div class="header-3it">
                        <div class="sub-title">家族がおさえる</div>
                        <div class="title">大切な3つの看取りポイント</div>
                        <div class="text-en">Three important points for families to keep in mind</div>
                    </div>
                    <div class="list-3it">
                        <div class="item-3it">
                            <div class="icon-left">
                                <span class="point-text">Point <span>1</span></span>
                                <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-1.svg') }}"
                                        alt="" /></span>
                            </div>
                            <div class="title-right">
                                <div class="title">本人の希望<span>を</span>知る</div>
                            </div>
                        </div>
                        <div class="item-3it">
                            <div class="icon-left">
                                <span class="point-text">Point <span>2</span></span>
                                <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-2.svg') }}"
                                        alt="" /></span>
                            </div>
                            <div class="title-right">
                                <div class="title">専門家<span>の</span>力を<br>上手にかりる</div>
                            </div>
                        </div>
                        <div class="item-3it">
                            <div class="icon-left">
                                <span class="point-text">Point <span>3</span></span>
                                <span class="point-icon"><img src="{{ asset('frontend/assets/images/point-3.svg') }}"
                                        alt="" /></span>
                            </div>
                            <div class="title-right">
                                <div class="title"><span class="sub-title">この先の</span>からだの変化を知る</div>
                            </div>
                        </div>
                    </div>
                    <div class="view-more text-right">
                        <a class="link-with-icon" href="/大切な3つの看取りポイント_N/index.html">
                            <span class="text">もっと詳しく見る</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                    viewBox="0 0 6.935 10.758">
                                    <path id="path9429"
                                        d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                        transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                </svg>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <!-- End Three it sp -->

            <!-- Life box -->
            <div class="life-box d-sp-none relative">
                <div class="outside-text">生きる</div>
                <div class="life-box--header">
                    <h2 class="title">残された時間を大切に過ごす <img class="icon"
                            src="{{ asset('frontend/assets/images/g3312.svg') }}" alt="" /></h2>
                    <div class="title-en">Spend your remaining time carefully</div>
                </div>
                <div class="life-box--content"
                    style="background-image: url('{{ asset('frontend/assets/images/life-img.png') }}');">
                    <div class="list-tags">
                        <span>したい</span>
                        <span>食べたい</span>
                        <span>行きたい</span>
                        <span>会いたい</span>
                    </div>
                    <h3 class="title">本人が望むことを無理せずひとつずつ</h3>
                    <div class="desc">
                        余命宣告を受けたとき、残された時間を後悔の残らないように過ごすために、何かできることはあるでしょうか。<br>
                        そのひとつに、本人のしたいことを叶える、ということがあります。日ごとに本人の体力や気力が落ちていくと、家族の力だけで実現することが難しいと感じてしまう...
                    </div>
                    <div class="text-center">
                        <a class="view-more" href="/残された時間を大切に過ごす_N/index.html">…記事を詳しく読む <img class="icon-link"
                                src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                    </div>
                </div>
            </div>
            <!-- End Life box -->

            <!-- Top Tab 1 -->
            <div class="top-tab top-tab-1 d-sp-none relative">
                <div class="outside-text">身体の兆候と対策</div>
                <div class="top-tab--header">
                    <h2 class="title">いろいろな症状への対処法 <img class="icon"
                            src="{{ asset('frontend/assets/images/first-aid-kit.svg') }}" alt="" /></h2>
                    <div class="title-en">How to deal with various symptoms</div>
                </div>
                <div class="top-tab--body">
                    <div class="kc-tab">
                        <ul class="tab-nav">
                            <li class="active" data-tab-id="tt11"><span>痛み</span></li>
                            <li data-tab-id="tt12"><span>発熱</span></li>
                            <li data-tab-id="tt13"><span>吐き気 嘔吐</span></li>
                            <li data-tab-id="tt14"><span>呼吸苦</span></li>
                            <li data-tab-id="tt15"><span>咳きこみ</span></li>
                            <li data-tab-id="tt16"><span>寒気</span></li>
                            <li data-tab-id="tt17"><span>不眠</span></li>
                            <li data-tab-id="tt18"><span>倦怠感</span></li>
                        </ul>
                        <div class="kc-tab-content-wrap">
                            <div class="kc-tab-content show" id="tt11">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">痛み</h3>
                                        <div class="title-en">pain</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-1.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>痛みがある場合には我慢せずに、痛み止めの使用を検討します。ホットパックなどで温めることでも、痛みが減る場合があります。</p>
                                            <p>寝ている時間が長くなることからも、痛みが強くなることがあります。患者さんの許可があれば、身体をさすることでも痛みの軽減がされます。</p>
                                            <p>お薬が効いてくるまえなどの時間に痛みが強い場合には、不安がつよくなります。さすることやお薬が効いてくることを穏やかにお伝えします。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/index.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt12">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">発熱</h3>
                                        <div class="title-en">generation of heat</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-2.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>発熱の際に、寒気があれば掛け物などで保温して、室内も暖かくします。体温が上がっていて暑ければ、室内を涼しくします。</p>
                                            <p>汗をかいた場合には、可能な場合はシャワーをあびたり、身体をふいたりします。衣類やシーツが湿って不快なので交換できるとよいでしょう。</p>
                                            <p>発熱で脱水が起きないように、水分も摂取できるとよいです。発熱でつらさがある場合には、医師に相談し解熱剤を使用します。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/hatsunetsu.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt13">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">吐き気 嘔吐</h3>
                                        <div class="title-en">Nausea/vomiting</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-3.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>吐き気や、嘔吐の原因がわかると、対処の方法も考えることができます。便秘が原因であれば、便秘を改善できないか内服や処置が検討できます。</p>
                                            <p>においが原因であれば、そのにおいの食品をさけることができます。食事は回数にこだわらず、少量ずつ食べることも大切です。この方が消化しやすくなるため、嘔吐が予防できます。さらに、のど越しがよく、食べやすい食品を選ぶとよいでしょう。
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/hakike.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt14">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">呼吸苦</h3>
                                        <div class="title-en">dyspnea</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-4.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>呼吸苦は不安や痛みなどでもおこるので、不安や痛みがないか、よくお話を聞きます。呼吸が苦しくないように、お薬の内服も検討することができます。</p>
                                            <p>呼吸のしやすい身体の位置を工夫します。座ってると呼吸が楽になることがあります。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/kokyuku.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt15">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">咳きこみ</h3>
                                        <div class="title-en">coughing fit</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-5.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>咳があり、辛い場合には咳止めの内服を検討します。医師に相談することで処方していただけます。まっすぐ寝ているより、座っているほうが咳が少ない場合があります。
                                            </p>
                                            <p>食事や水分摂取のあとに咳がある場合には、誤嚥が心配です。看護師や医師に相談することでとろみ剤の使用などのアドバイスをもらえます。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/seki.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt16">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">寒気</h3>
                                        <div class="title-en">feel a chill</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-6.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>寒気がある場合には、まず室内の暖房を調整します。ホットパックなどで身体を温めることもよいでしょう。</p>
                                            <p>寒気のあとに発熱する場合がありますので、様子をみて検温をしましょう。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/samuke.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt17">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">不眠</h3>
                                        <div class="title-en">insomnia</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-7.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>眠れない不安があると、その不安のためにリラックスできず、さらに不眠になってしまいます。日中などでも、休める時に眠れば良いというくらいのゆったりとした態度で接しましょう。
                                            </p>
                                            <p>体調が良ければ、太陽の光を浴びるように散歩などの活動をします。就寝前には、アロマテラピーや音楽など、リラックスできるような方法を探します。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/humin.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt18">
                                <div class="top-tab-content">
                                    <div class="content-left">
                                        <h3 class="title">倦怠感</h3>
                                        <div class="title-en">washed-out feeling</div>
                                        <div class="ratio ratio-1:1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/tab-1-8.svg') }}"></object>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <span class="dashed-line"></span>
                                        <div class="desc">
                                            <p>倦怠感は、だるさや体の重さとして訴えられることがあります。倦怠感があることによって、患者さんは不安になったり、食欲がでなかったりという影響を受けることがあります。
                                            </p>
                                            <p>このような場合、倦怠感がどこからきているのか原因を中心に対応を考えます。一日のなかで、いつどのくらい倦怠感を感じるか記録にとることもよいでしょう。</p>
                                            <p>リラクゼーションも倦怠感の軽減になります。日中に30分未満の昼寝をすることもよいです。医師に相談することで、ステロイド薬の内服を選択することもあります。
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="view-more" href="/いろいろな症状への対処_N/kentaikan.html">…記事を詳しく読む <img class="icon-link"
                                                                                                         src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- End Top Tab 1 -->

            <!-- Top Tab 2 -->
            <div class="top-tab top-tab-2 d-sp-none">
                <div class="top-tab--header">
                    <h2 class="title">死期が近い兆候とケアのポイント <img class="icon"
                            src="{{ asset('frontend/assets/images/butterflies.svg') }}" alt="" /></h2>
                    <div class="title-en">Signs of impending death</div>
                </div>
                <div class="top-tab--body">
                    <div class="kc-tab">
                        <ul class="tab-nav">
                            <li class="active" data-tab-id="tt21"><span>眠気</span></li>
                            <li data-tab-id="tt22"><span>せん妄</span></li>
                            <li data-tab-id="tt23"><span>呼吸</span></li>
                            <li data-tab-id="tt24"><span>腕や脚の兆候</span></li>
                            <li data-tab-id="tt25"><span>意識</span></li>
                            <li data-tab-id="tt26"><span>食欲</span></li>
                            <li data-tab-id="tt27"><span>水分摂取</span></li>
                        </ul>
                        <div class="kc-tab-content-wrap">
                            <div class="kc-tab-content show" id="tt21">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        眠気がだんだんとつよくなります。眠る時間が長くなります。眠っている間は、つらさが強い状況ではありません。耳は聞こえています。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-1.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            話しておきたいことは話をしたほうがよいでしょう。会わせておきたい人がいる場合には会えるように予定をたてましょう。耳が聞こえていますので、声をかけてそばにいましょう。
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/nemuke.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>

                            </div>

                            <div class="kc-tab-content" id="tt22">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        意識の低下と並行するように、せん妄が現れることがあります。落ち着きのない様子になることがあります。つじつまの合わないことをいったり、大きな声をだしたりすることがあります。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-2.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            否定せずに、見守ります。<br>
                                            そばにいて、転倒などがないように、患者さんの身の安全を確保します。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/senmou.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt23">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        元気な時には、意識せずに規則的にできていた呼吸が変化します。場合によっては、息の苦しさを感じることもあります。<br>
                                        呼吸のリズムに変化が出てきます。呼吸のたびにのどの周囲で、ゴロゴロと音がすることがあります。だんだんと、肩やあごが大きく動くような呼吸になります。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-3.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            呼吸のリズムなどの変化があったときには、不安に感じる場合があります。そういった場合は、医師や看護師に連絡をしましょう。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/kokyu.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt24">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        徐々に身体を自分で動かせなくなります。しだいに脈が弱くなります。足の裏面や手の指先の血色が悪くなり、紫色の皮膚になり、冷たくなる場合があります。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-4.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            身体の位置が苦しくないように、クッションなどを利用して、手や足を支えます。寒さを感じている場合には室内を暖かくします。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/teashi.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt25">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        水分や食事の量が減り、脱水の状態になったり、脳に酸素が足りなくなったりすることで、脳の働きも低下するため、意識が低下します。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-5.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            意識の低下がある場合には、辛さが強くなるわけではありません。<br>
                                            落ち着いてそばにいることを心がけましょう。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/ishiki.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt26">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        食欲はだんだんと減っていきます。食べる量が減り、食べたいと思うものが減る傾向があります。ご本人には「食べたくても、食べられないつらさ」があります。だんだんと飲み込む力が衰えて、食事を摂取できなくなります。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-6.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            食べられるものを、食べられるだけ摂取することを目標にすることで、「食べるべき」といった焦りや辛さを感じずに過ごすことができます。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/index.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                            <div class="kc-tab-content" id="tt27">
                                <div class="top-tab-content">
                                    <div class="desc-top">
                                        水分摂取の量も減る傾向になります。消化や吸収の機能が低下してくるためです。また、食事や水分摂取で、むせることがあります。水分もだんだんと摂取できなくなります。口の渇きが強くなります。
                                    </div>
                                    <div class="text-center"><img class="tab-2-img"
                                            src="{{ asset('frontend/assets/images/top-tab-2/tab2-7.png') }}"
                                            alt="" /></div>
                                    <div class="caption">
                                        <h3 class="title"><img class="icon"
                                                src="{{ asset('frontend/assets/images/buttefly.svg') }}" />ケアのポイント</h3>
                                        <div class="desc-2">
                                            むせに対してはとろみを使用します。氷などで少しづつ水分摂取をします。口腔ケアも大切なケアになります。
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-note">
                                    死期が近づいてきたときには、様々な兆候が身体に現れます。<br>
                                    身体の状態によっても、出現度合いや、出現するものもあれば出現しないものもあるなど個人差があり様々です。ここでご紹介している内容を参考にしていただきながら、ご家族としての心構えの一助にしていただければ幸いです。<br>
                                    不明点や不安なことなどがあれば、側でフォローをしてくれている医療者に気兼ねなく質問していただき、上手に周りの力を借りながら1日1日を過ごしていきましょう。
                                </div>
                                <div class="call-24h d-pc-none">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <img class="icon-24h" src="{{ asset('frontend/assets/images/24h-icon.svg') }}"
                                             alt="" />
                                        <span class="text">
                                        <span class="text-large">困った時は</span>
                                        <span class="text-small">在宅看取りサポートセンター</span>
                                    </span>
                                        <img class="arrow-light" src="{{ asset('frontend/assets/images/light.svg') }}"
                                             alt="" />
                                    </a>
                                </div>

                                <div class="text-center" style="margin-top: 15px">
                                    <a class="view-more" href="/死期が近い兆候_N/suibun.html">…記事を詳しく読む <img class="icon-link"
                                                                                                     src="{{ asset('frontend/assets/images/external-icon-2.svg') }}" alt="" /></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End Top Tab 2-->

            <!-- Product -->
            <div class="top-product card d-sp-none relative">
                <div class="outside-text">支えてくれる物たち</div>
                <div class="card--header">
                    <h2 class="title">身体や心を楽にしてくれるもの</h2>
                    <div class="title-en">Three important things</div>
                </div>
                <div class="card--body">
                    <div class="caption-top">
                        <h3 class="title">プロが選ぶ暮らしの中で身体や心を楽にしてくれるもの達</h3>
                        <div class="sub-title">身体を支えてくれる道具や気分を楽にしてくれる様々な製品やサービスをご紹介。</div>
                        <div class="text-right">
                            <a class="view-more" href="{{ route('product.home') }}">
                                <img class="d-pc-none" src="{{ asset('frontend/assets/images/g2291.svg') }}"
                                    alt="" />
                                <span>製品の一覧ページ </span>
                                <svg class="icon-link" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="18.998"
                                    viewBox="0 0 17 18.998">
                                    <defs>
                                        <filter id="Path_3863" x="0" y="0" width="17" height="18.998"
                                            filterUnits="userSpaceOnUse">
                                            <feOffset dy="1" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="1" result="blur" />
                                            <feFlood flood-opacity="0.051" />
                                            <feComposite operator="in" in2="blur" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_3863)">
                                        <path id="Path_3863-2" data-name="Path 3863"
                                            d="M21.379,2.094C21.046,1.931,21.24,2.033,16,2a1.1,1.1,0,0,0-1,1.182,1.1,1.1,0,0,0,1,1.182h2.585l-7.29,8.616a1.338,1.338,0,0,0,0,1.671.9.9,0,0,0,1.414,0L20,6.035V9.09a1.014,1.014,0,1,0,2,0c-.026-6.224.061-5.967-.077-6.358a1.107,1.107,0,0,0-.542-.638Z"
                                            transform="translate(-8 0)" fill="#1d3994" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @include('homepage::product.list_top')
                </div>
            </div>
            <!-- End Product -->
            <!-- Top News -->
            @include('homepage::partials.topic')
            <!-- End Top News -->
            @if ($listUseful)
                <!-- News Tablet SP -->
                <div class="news-widget widget in-content d-pc-none">
                    @include('homepage::partials.news_widget_item', ['is_sp' => true])
                </div>
                <!-- End News Tablet SP -->
            @endif
            <!-- testimonials box sp -->
            <div class="card-sp mitori-test d-pc-none d-tb-none">
                <div class="card-header">
                    <h2 class="title">家族が語る <span>看取り体験</span></h2>
                    <span class="text-en in-center">End of life <br>care experience</span>
                </div>
                <div class="card-body">
                    <a class="testimonials-box" href="{{ route('mitori-taiken.index') }}">
                        <div class="speech-bubble d-sp-none">
                            <span>家族が語る</span>
                            <span>看取りの話</span>
                        </div>
                        <h3 class="title">
                            私の看取り体験談
                        </h3>
                        <div class="sub-title-en">Stories of each family</div>

                        <div class="psychological-care">
                            <img class="house" src="{{ asset('frontend/assets/images/house-cleaning.svg') }}"
                                alt="" />
                            <img class="beds" src="{{ asset('frontend/assets/images/beds.svg') }}" alt="" />
                            <span class="text">Psychological care</span>
                            <img style="width: 23px; height: 23px;"
                                src="{{ asset('frontend/assets/images/arrow-right.svg') }}" alt="" />
                        </div>

                        <img class="people" src="{{ asset('frontend/assets/images/people.png') }}" alt="">
                        <div class="desc">
                            大切な家族を看取った方々が自分自身の言葉で看取りを振り返り、上手くできたことやもっとこうすれば良かったことなどを、リアルな体験談としてシェアをしてくれています。
                        </div>

                        <div class="text-center">
                            <span href="" class="read-more">体験談を読んでみる</span>
                        </div>
                        <span href="#" class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758"
                                viewBox="0 0 6.935 10.758">
                                <path id="path9429"
                                    d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                    transform="translate(-1.976 -291.965)" fill="#fff" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <!-- end testimonials box sp -->

            <!-- Product SP -->
            <div class="widget top-product d-pc-none d-tb-none">
                <div class="widget--header">
                    <h3 class="title">身体<span>や</span>心<span>を</span><span>楽にしてくれるもの</span></h3>
                    <span class="text-en">superb article</span>
                </div>
                <div class="widget--body">
                    <div class="caption-top">
                        <h3 class="title">プロが選ぶ暮らしの中で身体や心を楽にしてくれるもの達をご紹介</h3>
                        <div class="sub-title">身体を支えてくれる道具や気分を楽にしてくれる様々な製品やサービスがあります</div>
                        <div class="text-right">
                            <a class="view-more" href="{{ route('product.home') }}">
                                <span class="icon"><img src="{{ asset('frontend/assets/images/g2291.svg') }}"></span>
                                <span class="text">製品の一覧ページへ</span>
                                <svg class="icon-link" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="18.998"
                                    viewBox="0 0 17 18.998">
                                    <defs>
                                        <filter id="Path_3863" x="0" y="0" width="17" height="18.998"
                                            filterUnits="userSpaceOnUse">
                                            <feOffset dy="1" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="1" result="blur" />
                                            <feFlood flood-opacity="0.051" />
                                            <feComposite operator="in" in2="blur" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_3863)">
                                        <path id="Path_3863-2" data-name="Path 3863"
                                            d="M21.379,2.094C21.046,1.931,21.24,2.033,16,2a1.1,1.1,0,0,0-1,1.182,1.1,1.1,0,0,0,1,1.182h2.585l-7.29,8.616a1.338,1.338,0,0,0,0,1.671.9.9,0,0,0,1.414,0L20,6.035V9.09a1.014,1.014,0,1,0,2,0c-.026-6.224.061-5.967-.077-6.358a1.107,1.107,0,0,0-.542-.638Z"
                                            transform="translate(-8 0)" fill="#1d3994" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @foreach ($listProductGroup as $key => $productGroup)
                        <div class="list-top-product">
                            <div class="title">
                                {{ $productGroup->title ?? '' }}
                            </div>
                            <div class="top-product-slider wg owl-carousel has-flick-sp">
                                @if ($productGroup->listCategory)
                                    @foreach ($productGroup->listCategory as $keyCat => $category)
                                        <div class="item">
                                            <div class="top-product-item">
                                                <a href="{{ route('product.list', ['category' => $category->title]) }}">
                                                    <div class="thumb">
                                                        <div class="ratio ratio-1:1">
                                                            <img src="{{ $category->avatar ? getLink('media' . '/' . $category->avatar->path) : '' }}"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="pro-title">{{ $category->title ?? '' }}</div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="useful-topics-articles">
                        <h3 class="title">
                            <span class="text-jp">
                                <img src="{{ asset('frontend/assets/images/arrow-down.svg') }}"
                                    style="margin-right: 10px; margin-left: 5px;" alt="" />
                                <span>お役立ちトピックス記事</span>
                            </span>
                            <span class="text-en">Useful Topics Articles</span>
                        </h3>
                        <div class="list-useful-topics">
                            @foreach ($listTopic as $key => $topic)
                                <a class="useful-topics-item" href="{{ route('posts-topic.detail', $topic->id) }}">
                                    <div class="thumb">
                                        <img src="{{ isset($topic->avatar) && $topic->avatar ? getLink('media' . '/' . $topic->avatar->path) : '' }}"
                                            alt="" />
                                    </div>
                                    <div class="title">
                                        {{ $topic->title ?? '' }}
                                    </div>
                                    <img class="external-icon"
                                        src="{{ asset('frontend/assets/images/external-icon-3.svg') }}" alt="" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product SP -->
            <!-- Tab static 1 2 -->
            <div class="card-sp tab-static-sp-1-2 d-pc-none d-tb-none">
                <div class="card-header">
                    <h2 class="title"><span>からだの兆候</span>と<span>対策</span>（終末期）</h2>
                    <span class="text-en in-center">Signs and<br>measures</span>
                </div>
                <div class="card-body">
                    <div class="card-inner blue-card">
                        <div class="card-inner-header">
                            <img src="{{ asset('frontend/assets/images/first-aid-kit.svg') }}" alt="" />
                            <div class="title-group">
                                <h3 class="title">いろいろな症状の対処法</h3>
                                <span class="text-en">How to deal with various symptoms</span>
                            </div>
                        </div>
                        <div class="card-inner-body">
                            <div class="blue-tab">
                                <div class="blue-menu-scroll">
                                    <ul class="list-blue-menu">
                                        <li class="is-active" data-tab-id="blue-tab-1">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/01_itami.svg') }}"
                                                alt=""></object>
                                            <div class="title">痛み</div>
                                        </li>
                                        <li data-tab-id="blue-tab-2">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/02_hatsunetsu.svg') }}"
                                                alt=""></object>
                                            <div class="title">発熱</div>
                                        </li>
                                        <li data-tab-id="blue-tab-3">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/03_seki.svg') }}"
                                                alt=""></object>
                                            <div class="title">咳きこみ</div>
                                        </li>
                                        <li data-tab-id="blue-tab-4">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/04_hakike.svg') }}"
                                                alt=""></object>
                                            <div class="title">吐き気 嘔吐</div>
                                        </li>
                                        <li data-tab-id="blue-tab-5">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/05_kokyuku.svg') }}"
                                                alt=""></object>
                                            <div class="title">呼吸苦</div>
                                        </li>
                                        <li data-tab-id="blue-tab-6">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/06_humin.svg') }}"
                                                alt=""></object>
                                            <div class="title">不眠</div>
                                        </li>
                                        <li data-tab-id="blue-tab-7">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/07_samuke.svg') }}"
                                                alt=""></object>
                                            <div class="title">寒気</div>
                                        </li>
                                        <li data-tab-id="blue-tab-8">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/08_kentaikan.svg') }}"
                                                alt=""></object>
                                            <div class="title">倦怠感</div>
                                        </li>
                                        <li data-tab-id="blue-tab-9">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/09_keiren.svg') }}"
                                                alt=""></object>
                                            <div class="title">痙攣</div>
                                        </li>
                                        <li data-tab-id="blue-tab-10">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/10_syukketsu.svg') }}"
                                                alt=""></object>
                                            <div class="title">出血</div>
                                        </li>
                                        <li data-tab-id="blue-tab-11">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/11_utsu.svg') }}"
                                                alt=""></object>
                                            <div class="title">うつ</div>
                                        </li>
                                        <li data-tab-id="blue-tab-12">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/12_hitan.svg') }}"
                                                alt=""></object>
                                            <div class="title">悲嘆</div>
                                        </li>
                                        <li data-tab-id="blue-tab-13">
                                            <object type="image/svg+xml"
                                                data="{{ asset('frontend/assets/images/top-tab-1/13_ishiki.svg') }}"
                                                alt=""></object>
                                            <div class="title">意識障害</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="blue-tab-contents">
                                    <div class="blue-tab-body is-show" id="blue-tab-1">
                                        <div class="desc">
                                            <p>痛みがある場合には我慢せずに、痛み止めの使用を検討します。ホットパックなどで温めることでも、痛みが減る場合があります。</p>
                                            <p>寝ている時間が長くなることからも、痛みが強くなることがあります。患者さんの許可があれば、身体をさすることでも痛みの軽減がされます。</p>
                                            <p>お薬が効いてくるまえなどの時間に痛みが強い場合には、不安がつよくなります。さすることやお薬が効いてくることを穏やかにお伝えします。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/index.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-2">
                                        <div class="desc">
                                            <p>発熱の際に、寒気があれば掛け物などで保温して、室内も暖かくします。体温が上がっていて暑ければ、室内を涼しくします。</p>
                                            <p>汗をかいた場合には、可能な場合はシャワーをあびたり、身体をふいたりします。衣類やシーツが湿って不快なので交換できるとよいでしょう。</p>
                                            <p>発熱で脱水が起きないように、水分も摂取できるとよいです。発熱でつらさがある場合には、医師に相談し解熱剤を使用します。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/hatsunetsu.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-3">
                                        <div class="desc">
                                            <p>咳があり、辛い場合には咳止めの内服を検討します。医師に相談することで処方していただけます。まっすぐ寝ているより、座っているほうが咳が少ない場合があります。
                                            </p>
                                            <p>食事や水分摂取のあとに咳がある場合には、誤嚥が心配です。看護師や医師に相談することでとろみ剤の使用などのアドバイスをもらえます。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/seki.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-4">
                                        <div class="desc">
                                            <p>吐き気や、嘔吐の原因がわかると、対処の方法も考えることができます。便秘が原因であれば、便秘を改善できないか内服や処置が検討できます。</p>
                                            <p>においが原因であれば、そのにおいの食品をさけることができます。食事は回数にこだわらず、少量ずつ食べることも大切です。この方が消化しやすくなるため、嘔吐が予防できます。さらに、のど越しがよく、食べやすい食品を選ぶとよいでしょう。
                                            </p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/hakike.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-5">
                                        <div class="desc">
                                            <p>呼吸苦は不安や痛みなどでもおこるので、不安や痛みがないか、よくお話を聞きます。呼吸が苦しくないように、お薬の内服も検討することができます。</p>
                                            <p>呼吸のしやすい身体の位置を工夫します。座ってると呼吸が楽になることがあります。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/kokyuku.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-6">
                                        <div class="desc">
                                            <p>眠れない不安があると、その不安のためにリラックスできず、さらに不眠になってしまいます。日中などでも、休める時に眠れば良いというくらいのゆったりとした態度で接しましょう。
                                            </p>
                                            <p>体調が良ければ、太陽の光を浴びるように散歩などの活動をします。就寝前には、アロマテラピーや音楽など、リラックスできるような方法を探します。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/humin.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-7">
                                        <div class="desc">
                                            <p>寒気がある場合には、まず室内の暖房を調整します。ホットパックなどで身体を温めることもよいでしょう。</p>
                                            <p>寒気のあとに発熱する場合がありますので、様子をみて検温をしましょう。</p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/samuke.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-8">
                                        <div class="desc">
                                            <p>倦怠感は、だるさや体の重さとして訴えられることがあります。倦怠感があることによって、患者さんは不安になったり、食欲がでなかったりという影響を受けることがあります。
                                            </p>
                                            <p>このような場合、倦怠感がどこからきているのか原因を中心に対応を考えます。一日のなかで、いつどのくらい倦怠感を感じるか記録にとることもよいでしょう。</p>
                                            <p>リラクゼーションも倦怠感の軽減になります。日中に30分未満の昼寝をすることもよいです。医師に相談することで、ステロイド薬の内服を選択することもあります。
                                            </p>
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/kentaikan.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-9">
                                        <div class="desc">
                                            がんの末期やアルツハイマー病の終末期では、痙攣発作がおこることがあります。<br><br>
                                            痙攣予防の内服薬をするかしないかは、その方の状態により主治医が判断をします。<br><br>
                                            痙攣発作がおきても、その直後などに呼吸が止まることは少ないといえます。<br><br>
                                            落ち着いて、患者さんの身の回りの環境をととのえましょう。<br><br>
                                            痙攣が起きた時の対応について、主治医や看護師と十分に相談をしておくことも大切です。
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/keiren.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-10">
                                        <div class="desc">
                                            出血は、さまざまな原因でおこります。<br><br>出血の場所や量によっては、急に状態が悪化してしまうことがあります。<br><br>まずは、無理のない範囲で、出血の場所をタオルで清拭します。<br><br>患者さんには、そばにいることをお声かけすることが大切です。<br><br>なるべく早く、主治医や看護師へ連絡をして相談する必要があります。<br><br>必要な処置や対応を電話で相談することができます。
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/syukketsu.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-11">
                                        <div class="desc">
                                            がんと診断されることは大きなストレスとなります。<br><br>そのため、死期が近い多くの人に、うつの症状が現れます。<br><br>体の変化が多く現れることもあり、こころの不調が見落とされがちになるといえます。<br><br>具体的な心配を、ソーシャルワーカーや医師に相談することで、経済的な問題など軽減できるものもあります。<br><br>もし、大切なお身内などが死期が近い場合には、このことを知っておくことで、患者さんのこころがどのような状態なのか見守ることが大切です。
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/utsu.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-12">
                                        <div class="desc">
                                            悲嘆は死別にともなって、おきる正常な心理状態です。<br><br>しかし、悲嘆によるストレスが大きい場合には、食欲不振といった症状が現れる場合もあります。<br><br>このような場合には、抱え込まずに、医師や看護師に相談をすることがとても大切です。<br><br>気持ちについて話すことで、対処方法を一緒に考えることができます。<br><br>また、患者家族会などの紹介をしてもらうことも可能です。<br><br>場合により、悲嘆カウンセリングなどの専門的な関わりも選択することができます。
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/hitan.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blue-tab-body" id="blue-tab-13">
                                        <div class="desc">
                                            意識障害とは、眠っている時間が長くなり、ほとんど入眠していたり、落ち着きがなくなったりといった様子があることです。<br><br>痛みが強かったり、のどが渇いていたりという不快な症状は患者さんが落ち着かなくなる原因のひとつです。<br><br>意識障害があることに気が付いたら、医師や看護師へ早めに相談すると対処や気をつける点についてアドバイスをもらうことができます。
                                        </div>
                                        <div class="more">
                                            <a href="/いろいろな症状への対処_N/ishiki.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner yellow-card">
                        <div class="card-inner-header">
                            <img src="{{ asset('frontend/assets/images/butterflies.svg') }}" alt="" />
                            <div class="title-group">
                                <h3 class="title">死期が近い兆候</h3>
                                <span class="text-en">Signs of impending death</span>
                            </div>
                        </div>
                        <div class="card-inner-body">
                            <div class="yellow-tab">
                                <ul class="list-yellow-menu">
                                    <li class="is-active" data-tab-id="yellow-tab-1"><a
                                            href="javascript:void(0)">眠気</a></li>
                                    <li data-tab-id="yellow-tab-2"><a href="javascript:void(0)">せん妄</a></li>
                                    <li data-tab-id="yellow-tab-3"><a href="javascript:void(0)">呼吸</a></li>
                                    <li data-tab-id="yellow-tab-4"><a href="javascript:void(0)">腕や脚の兆候</a></li>
                                    <li data-tab-id="yellow-tab-5"><a href="javascript:void(0)">意識</a></li>
                                    <li data-tab-id="yellow-tab-6"><a href="javascript:void(0)">食欲</a></li>
                                    <li data-tab-id="yellow-tab-7"><a href="javascript:void(0)">水分摂取</a></li>
                                </ul>
                                <div class="yellow-tab-image">
                                    <object type="image/svg+xml" class="is-show" data-img-id="yellow-tab-1"
                                        data="{{ asset('frontend/assets/images/top-tab-2/nemuke.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-2"
                                        data="{{ asset('frontend/assets/images/top-tab-2/senmou.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-3"
                                        data="{{ asset('frontend/assets/images/top-tab-2/kokyu.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-4"
                                        data="{{ asset('frontend/assets/images/top-tab-2/udeyaashi.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-5"
                                        data="{{ asset('frontend/assets/images/top-tab-2/ishiki.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-6"
                                        data="{{ asset('frontend/assets/images/top-tab-2/shokuyoku.svg') }}"></object>
                                    <object type="image/svg+xml" data-img-id="yellow-tab-7"
                                        data="{{ asset('frontend/assets/images/top-tab-2/suibunseshu.svg') }}"></object>
                                </div>
                                <div class="yellow-tab-contents">
                                    <div class="yellow-tab-body is-show" id="yellow-tab-1">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/nemuke.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-2">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/senmou.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-3">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/kokyu.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-4">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/teashi.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-5">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/ishiki.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-6">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/index.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="yellow-tab-body" id="yellow-tab-7">
                                        <div class="desc">個人差はありますが、死期が近づいてきたときに見られることが多い兆候をご紹介します</div>
                                        <div class="more">
                                            <a href="/死期が近い兆候_N/suibun.html" class="link-with-icon">
                                                <span class="text">もっと詳しく見る</span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.935"
                                                        height="10.758" viewBox="0 0 6.935 10.758">
                                                        <path id="path9429"
                                                            d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z"
                                                            transform="translate(-1.976 -291.965)" fill="#fff">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="call-24h">
                                    <a href="/info/contact.php" class="hotline-24h">
                                        <object type="image/svg+xml" class="icon-24h" style="width: 66px"
                                            data="{{ asset('frontend/assets/images/24h-icon.svg') }}"></object>
                                        <span class="text">
                                            <span class="text-large">困った時は</span>
                                            <span class="text-small">在宅看取りサポートセンター</span>
                                        </span>
                                        <object type="image/svg+xml" class="arrow-light" style="width: 84px"
                                            data="{{ asset('frontend/assets/images/light.svg') }}"></object>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab static 1 2 -->
        </div>
        @include('homepage::sidebar.index')
    </div>
    <!-- Map Bottom -->
    @include('homepage::partials.map_bottom')
    <!-- End Map Bottom -->
    <!-- Sponsor -->
    @include('homepage::partials.sponsor')
    <!-- End Sponsor -->
@endsection
