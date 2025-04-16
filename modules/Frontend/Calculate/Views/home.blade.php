@extends('homepage::layout')
@section('content')
<div class="container">

    <div class="cal-slogan-sp d-pc-none d-tb-none">
        <div class="sub">
            <span>介護サービス費</span>
            <span class="icon-with-text">
                <img src="{{ asset('frontend/assets/images/calculate/pig-white.svg') }}" alt="" />
                <span class="text">
                    いくらかかるか<br>
                    　　　調べてみよう！
                </span>
            </span>
        </div>
        <div class="title">自動計算ページ</div>
        <div class="title-en">Let's live like ourselves today.</div>
    </div>

    <div class="step-groups">

        <!-- Step 1 -->
        @include($module. '::partials.step_one')
        <!-- End Step 1 -->

        <!-- Step 2 -->
        <div class="step-box step-2" id="step-2" style="display: none;"></div>
        <!-- End Step 2 -->

        <!-- Step 3 -->
        <div class="step-box step-3" id="step-3" style="display: none;"></div>
        <!-- End Step 3 -->

        <!-- Step 4 -->
        <div class="step-box step-4" id="step-4" style="display: none;"></div>
        <!-- End Step 4 -->

        <!-- Step 5 -->
        @include($module. '::partials.step_five')

        <!-- End Step 5 -->

    </div>

    @include($module. '::partials.footer_chart')

    <div class="consult-box in-calculate d-sp-none">
        <div class="consult-box-inner">
            <div class="box-header">
                <img class="icon" src="{{ asset('frontend/assets/images/happy-face.png') }}" alt="">
                <div class="caption">
                    <div class="title">家族が相談できるところ</div>
                    <div class="title-en">Where families can consult</div>
                </div>
            </div>
            <div class="consult-desc">
                介護を支えてくれる多くの専門家がいます
                困ったら気軽に相談しましょう
            </div>
            <ul class="list-consult">
                <li>病院の医療相談ワーカー<span>（MSW）</span></li>
                <li>地域包括支援センター<span>（公的機関）</span></li>
                <li>居宅介護支援事業所<span>（公的機関）</span></li>
                <li>役所の高齢者相談課<span>（公的機関）</span></li>
                <li>民間の相談所</li>
            </ul>

        </div>

        <div class="contact-right">
            <img src="{{ asset('frontend/assets/images/calculate/contact-right.png') }}" alt="" />
            <div class="title">介護でお困りことはありませんか？</div>
            <div class="sub-title">ご相談はお住いの役所が便利です</div>
            <div class="title-en">Life Star Home Medical Consultation Office</div>
            <div class="view-more">
                <a href="/jigyosho/TopNarrow-1.php?search_category=専門相談員（無料）" class="link-with-icon">
                    <span class="text">最寄り<small>の</small>相談先を探す</span>
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.935" height="10.758" viewBox="0 0 6.935 10.758">
                            <path id="path9429" d="M2.792,291.965a.765.765,0,0,0-.5,1.355l4.682,4.011-4.682,4.009a.765.765,0,1,0,.994,1.158l5.36-4.586a.765.765,0,0,0,0-1.164l-5.36-4.591a.764.764,0,0,0-.49-.193Z" transform="translate(-1.976 -291.965)" fill="#fff"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>

    </div>

    <!-- Map Bottom -->
    <div class="map-bottom d-sp-none mt-0">
        <div class="box-right d-tb-none d-sp-none">
            <img src="{{ asset('frontend/assets/images/map-care.png') }}" alt="" />
            <div class="title">どうかより良い一日を。</div>
            <div class="title-en">Please have a better day.</div>
        </div>
        <div class="map-bottom--header">
            <div class="doctor-icon">
                <img src="{{ asset('frontend/assets/images/illust-docter.png') }}" alt="" />
            </div>
            <div class="map-search-caption">
                <div class="icon"><img class="icon-search" src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="" /></div>
                <div class="caption">
                    <h3 class="title">終末期<span>の</span>在宅医療・居宅介護サービス検索</h3>
                    <div class="text-en">Let's live like ourselves today.</div>
                    <div class="sub-title">あなたの町にも 心と身体を支えてくれる頼れるプロがきっといます</div>
                </div>
            </div>
        </div>
        <div class="tokyo-map">
            <div class="tokyo-map--header">
                <div class="icon">
                    <img src="{{ asset('frontend/assets/images/tokyo-icon.svg') }}" alt="" />
                </div>
                <div class="caption">
                    <h3 class="title">終末期医療・介護の事業者検索サービスは東京都のみの提供です</h3>
                    <div class="text-en">Medical and nursing care provider search service is only available in Tokyo.</div>
                </div>
            </div>
            <img class="tokyo-image" src="{{ asset('frontend/assets/images/map-bottom.png') }}" alt="" />
            <a href="/jigyosho/" class="map-button">
                <span class="text-1">頼れるプロを探す</span><br>
                <span class="text-2">東京・TOKYO</span>
                <img src="{{ asset('frontend/assets/images/ex-icon.svg') }}" alt="" />
            </a>
        </div>
        <div class="map-service">
            <img src="{{ asset('frontend/assets/images/service-list.png') }}" alt="" />
        </div>
        <div class="map-note">※）他府県に関しましては準備ができしだい順次公開して参ります</div>
    </div>
    <!-- End Map Bottom -->

</div>
@endsection
@push('scripts')
<script>
    $(".backtop-backpage-2").hide();
    $(document).on('click', '.radio-item-1', function() {
        var calculate_id = $(this).closest('.custom-radio-1').find('input[name="step1"]').val();
        $('#step-2').hide();
        $.ajax({
            url: '/calculate/stepTwo',
            method: "POST",
            data: {
                calculate_id: calculate_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            beforeSend: function() {
                $('#step-2').empty();
            },
            success: function(response) {
                $('.step-1 .next-step').show();
                $('#step-2').fadeIn().html(response.result);
                $("#step-3, #step-4, #step-5, .backtop-backpage-2").hide();
            }
        });
    });

    $(document).on('click', '#step-2 .radio-item-2', function() {
        var category_id = $(this).closest('.custom-radio-2').find('input[name="step2"]').val();
        var calculate_id = $(this).closest('.custom-radio-2').find('input[name="step2"]').attr("data-calculate");
        var group_id = $(this).closest('.custom-radio-2').find('input[name="step2"]').attr("data-group");
        var percentage_burden_id = $(this).closest('.custom-radio-2').find('input[name="step3"]').val();
        $("#step-3, #step-4, #step-5").hide();
        if (typeof percentage_burden_id !== "undefined") {

        } else if (typeof category_id !== "undefined") {
            $.ajax({
                url: '/calculate/stepThree',
                method: "POST",
                data: {
                    category_id: category_id,
                    calculate_id: calculate_id,
                    group_id: group_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                beforeSend: function() {
                    $('#step-3').hide().empty();
                    $('#step-4').hide().empty();
                },
                success: function(response) {
                    if (response.succes === true) {
                        $('#step-2 .next-step').show();
                        $('#step-3').show().html(response.resultStepThree);
                        $('#step-3 .next-step').show();
                        $('#step-4').show().html(response.resultStepFour);
                    }
                }
            });
        }
    });
</script>
@endpush
