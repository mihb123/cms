<div class="row mt-3 p-3">
    <div class="col-lg-3">
        <div class="kt-portlet ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        設定
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label class="required">{{ __('calculate::messages.calculate') }}</label>
                    <select class="form-control status" id="calculate" data-placeholder="{{ __('calculate::messages.calculate') }}" name="calculate_id">
                        <option disabled selected>{{ __('選択してください') }}</option>
                        @foreach(getListCalculate() as $key => $calculate)
                            <option {{ (old('calculate_id') == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $calculate }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="listOption"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        サービス名
                    </h3>
                </div>
            </div>
            <div id="listGroup"></div>
        </div>
    </div>
</div>
<script>
    $('#calculate').on('change', function () {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: cedu.route('/calculate-manage/getOption'),
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function () {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listOption").empty();
            },
            success: function (response) {
                $("#listOption").append(response.data);
            }
        });
    });

</script>
