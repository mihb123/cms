
<img class="step-number" src="{{ asset('frontend/assets/images/calculate/step-4.svg') }}" alt="" />

<div class="step4__result">
    <div class="step4__result--top">
        <div class="thumb">
            <img src="{{ asset('frontend/assets/images/calculate/home-smoke.svg') }}" alt="" />
        </div>
        <div class="caption">
            <h3 class="title">{{getCalculate()[$calculate_id]}}<small>で介護サービスを受ける</small></h3>
            <div class="title-en">Receive care services at {{getCalculate()[$calculate_id] == '施設' ? 'care facility' : 'home'}}</div>
        </div>
    </div>
    <div class="step4__result--selected">
        <span class="label">計算条件：</span>
        <div class="selected-items">
            <span class="si" id="for-step1" data-name="{{getCalculate()[$calculate_id]}}">＃{{getCalculate()[$calculate_id]}}</span>
            <span class="si" id="for-step2" data-name="{{ $category->title ?? ''}}">＃ {{ $category->title ?? ''}}</span>
            <span class="si" id="for-step3"></span>
        </div>
    </div>
</div>

<div class="header-box">
    <div class="thumb">
        <img class="nurse" src="{{ asset('frontend/assets/images/calculate/girl.png') }}" alt="" />
    </div>
    <div class="caption">
        @if(getCalculate()[$calculate_id] == '施設')
            <h2 class="title">どんな施設で過ごすことを想定していますか？</h2>
        @else
            <h2 class="title">自宅<small>で</small>どんなサービス<small>を</small><br>
                受けたいですか？</h2>
        @endif
    </div>
</div>

<div class="step4-accordion">

    @if(!empty($listCalculateGroup))
        @include($module. '::partials.list_calculate_group')
    @else
        @include($module. '::partials.list_service')
    @endif
</div>

<a href="#step-5" class="next-step">
    <img src="{{ asset('frontend/assets/images/calculate/move.svg') }}" alt="" />
</a>
<script>
    $(document).ready(function() {

        var oldValue = 0;

        jQuery.fn.focusTextToEnd = function(){
            this.focus();
            var $thisVal = this.val();
            this.val('').val($thisVal);
            return this;
        }

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.html((Math.floor(progress * (end - start) + start)).toLocaleString('en-US'));
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        function init() {
            updateDataStep3();
        }

        //--------- Step 3 ----------
        // update data for step 3
        function updateDataStep3(){
            let step3Checked = $('body input[name="step3"]:checked');
            $("body .step4__result--selected .for-step3").remove();
            if(step3Checked.length) {
                $("body .step4__result--selected .selected-items #for-step3").html('#' + step3Checked.attr('data-name') + '負担').show();
                $("body .result-level.level-3 .label-right").html(step3Checked.attr('data-name'));
            }else{
                $("body .step4__result--selected .selected-items #for-step3").html('').hide();
                $("body .result-level.level-3 .label-right").html('0');
            }
        }

        $('body input[name="step3"]').on("change", function () {
            $('body input[name="step3"]').not(this).prop("checked", false);

            updateDataStep3();

            finalResult();
        })
        //--------- End Step 3 ----------

        function resetItem(t){
            t.find(".select-dropdown").removeClass("show");
            t.find("select").val('');
            t.find(".step4-number-input").val(0);
            t.find(".subtotal .value").text('');
            t.find(".select-text").html("回数<small>を</small>選ぶ");
            t.find(".select-dropdown li").removeClass("selected");
        }

        $('.step4-checkbox-item .checkbox-fake').on("click", function(e){
            e.preventDefault();
                var t = $(this).closest(".step4-checkbox-item");
                var check = '{{getCalculate()[$calculate_id]}}';
                if(check === '施設' ){
                    $(".step4-checkbox-item").removeClass("checked");
                    $(".step4-checkbox-item").find(".input-right .subtotal .value").html('');
                    $(".step4-checkbox-item").find(".select-text").html("回数<small>を</small>選ぶ");
                }
                t.toggleClass("checked");

                var checkedValue = t.find('input[type="checkbox"]').val();
                t.find('input[type="checkbox"]').prop("checked", t.hasClass("checked"));

                //on off subtotal value when item type is monthly
                if(t.attr("data-item") === 'monthly') {
                    var monthlyValue = t.hasClass('checked') ? parseFloat(checkedValue).toLocaleString('en-US') : ''
                    t.find(".input-right .subtotal .value").html(monthlyValue);
                }

                if(!t.hasClass("checked")){
                    resetItem(t)
                }

                // update final result
                if(t.attr("data-item") === 'monthly' || !t.hasClass("checked")) {
                    finalResult();
                }

        })

        $(document).on("click", ".select-dropdown li", function(){
            var t = $(this);
            var val = t.attr("data-value");
            var p = $(this).closest(".step4-checkbox-item");
            p.find(".select-text").html(val);
            t.closest(".select-dropdown").removeClass("show");
            if(parseInt(val) < 10){
                t.closest(".select-dropdown").find("li").removeClass("selected");
                t.addClass("selected");
                p.find("select").val(val).change();
            }else{
                p.find("select").remove();
                t.closest(".select-dropdown").remove();
                p.find(".active-text").append('<input class="step4-number-input" inputmode="decimal" pattern="[\\d\uff10-\uff19]*" type="number" value="'+ val +'" />');
                p.find(".step4-number-input").focusTextToEnd();
            }
            calculateItem(p, val);
        });

        $(document).on("keyup", ".step4-number-input", function () {
            var p = $(this).closest(".step4-checkbox-item");
            var val = $(this).val();
            p.find(".select-text").html(val);
            calculateItem(p, val);
        })

        $(document).on("blur keyup change keydown keypress", ".step4-number-input", function () {
            $(this).val(function(index, value) {
                return value.replace(/\D/g, '');
            });
        })

        function calculateItem(p, val) {
            var checkedValue = p.find('input[type="checkbox"]').val();
            var total = parseFloat(checkedValue) * parseFloat(val);
            if(isNaN(total)){
                total = '';
            }
            p.find(".subtotal .value").html(total.toLocaleString('en-US'));
            finalResult();
        }

        function finalResult() {
            var totalStep4 = 0;
            var total1 = 0;
            var total2 = 0;
            var totalPercent = 100;
            var maxMoney = parseInt('{{ $maxMoney }}');
            var calculate_id = '{{ $numberCalculate }}';
            var percentC1 = $('body input[name="step3"]:checked').val();
            var listStep4Checked = $('.step4-checkbox-item input[type="checkbox"]:checked');
            listStep4Checked.each(function () {
                var p = $(this).closest(".step4-checkbox-item");
                var totalItem = p.find(".subtotal .value").text();
                if(totalItem) {
                    totalStep4 += parseInt(totalItem.replace(/,/g, ''));
                }
            });

            // Check to show Step5
            if(totalStep4 > 0){
                $("#step-5").fadeIn();
                var step1 = $("body .step4__result--selected .selected-items #for-step1").attr('data-name');
                var step2 = $("body .step4__result--selected .selected-items #for-step2").attr('data-name');
                $("#step-5 .step4__result--selected .selected-items .for-step1").show().html('＃' + step1);
                $("#step-5 .step4__result--selected .selected-items .for-step2").show().html('＃' + step2);
                $(".backtop-backpage-2").show();
            }

            var totalA = totalStep4;
            if(maxMoney == 0){
                var totalMin = totalStep4;
            }else{
                var totalMin = Math.min(totalStep4, maxMoney);
            }

            //Update level 1
            $('.result-level.level-1 .level-value#level-1').html(`${totalA.toLocaleString('en-US')}<span class="init">円</span>`)

            //Step 3 not check
            if(percentC1 == undefined || percentC1 == ''){
                percentC1 = 100;
                totalMin = totalStep4;
            }
            percentC1 = parseFloat(percentC1);

            var totalC1 = totalMin * percentC1 / 100;

            var percentB = 100 - percentC1;
            var totalB = totalMin * percentB / 100;

            var totalC2 = 0;
            if(totalStep4 > maxMoney && percentC1 != 100 && calculate_id == 1){
                totalC2 = totalStep4 - maxMoney;
            }

            var totalC = totalC1 + totalC2;

            $('.result-level.level-3 .level-value').html(`${totalC1.toLocaleString('en-US')}<span class="init">円</span>`);
            $('.result-level.level-2 .level-value#level2').html(`${totalB.toLocaleString('en-US')}<span class="init">円</span>`);
            $('.result-level.level-4 .level-value').html(`${totalC2.toLocaleString('en-US')}<span class="init">円</span>`);
            $('.result-level.level-2.yellow .label-with-title .level-value').html(`${totalC.toLocaleString('en-US')}<span class="init">円</span>`);

            animateValue($(".price-box .price"), oldValue, totalC, 1000);
            oldValue = totalC;

            // var percent = totalStep4 * parseInt(totalStep3) / 100;
            //
            // $('.result-level.level-2.yellow .level-value').html(`${percent.toLocaleString('en-US')}<span class="init">円</span>`)
            // $('.result-level.level-3 .level-value').html(`${percent.toLocaleString('en-US')}<span class="init">円</span>`)
            //
            // if(totalStep4 > maxMoney && calculate_id == 1) {
            //     totalStep4 -= maxMoney;
            //     totalPercent1 = totalPercent - parseInt(totalStep3);
            //     totalPercent2 = totalPercent - totalPercent1;
            //     total1 = (maxMoney * totalPercent1) / 100;
            //     total2 = (maxMoney * totalPercent2) / 100 + totalStep4;
            //     percent = maxMoney * parseInt(totalStep3) / 100;
            //
            //
            //     // $('.result-level.level-2 .level-value#level2').html(`${total1.toLocaleString('en-US')}<span class="init">円</span>`)
            //     $('.result-level.level-2.yellow .level-value').html(`${total2.toLocaleString('en-US')}<span class="init">円</span>`)
            //     // $('.result-level.level-1 .level-value#level-1').html(`${maxMoney.toLocaleString('en-US')}<span class="init">円</span>`)
            //     $('.result-level.level-4 .level-value').html(`${totalStep4.toLocaleString('en-US')}<span class="init">円</span>`)
            //     // $('.result-level.level-3 .level-value').html(`${percent.toLocaleString('en-US')}<span class="init">円</span>`)
            //     // $(".price-box .price").html(total2.toLocaleString('en-US'));
            //     animateValue($(".price-box .price"), oldValue, percent, 1000);
            //     oldValue = percent;
            // } else {
            //     $('.result-level.level-4 .level-value').html(`0<span class="init">円</span>`)
            //     totalStep4 = totalStep4 - percent;
            //     // $('.result-level.level-2 .level-value#level2').html(`${totalStep4.toLocaleString('en-US')}<span class="init">円</span>`)
            //     if (typeof percent !== 'undefined') {
            //         animateValue($(".price-box .price"), oldValue, percent, 1000);
            //         oldValue = percent;
            //         // $(".price-box .price").html(percent.toLocaleString('en-US'));
            //     }
            // }
        }

        //Init
        init();
    });
</script>
