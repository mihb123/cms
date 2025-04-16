<div class="row mt-3 p-3">
    <div class="col-lg-3">
        <div class="kt-portlet ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        設定 One's Home
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label class="required">{{ __('グループ') }}</label>
                    <select class="form-control status" id="group" data-placeholder="選択ください。" name="group_id">
                        <option disabled selected>{{ __('選択してください') }}</option>
                        @foreach($listGroup as $key => $group)
                        <option {{ old('group_id') == $group['id'] ? 'selected' : '' }} value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        要介護度
                    </h3>
                </div>
            </div>
            <div id="listCategory"></div>
        </div>
    </div>
</div>
<script>
    $('#group').on('change', function() {
        var group_id = $(this).val();
        $.ajax({
            type: "POST",
            url: cedu.route('/setting-money/getCategory'),
            data: {
                group_id: group_id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function() {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listCategory").empty();
            },
            success: function(response) {
                $("#listCategory").append(response.data);
            }
        });
    });
</script>
