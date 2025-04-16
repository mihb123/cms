<div class="form-group">
    <label class="required">{{ __('サービスグループ') }}</label>
    <select class="form-control status" id="group" data-placeholder="選択ください。" name="group_id">
        <option disabled selected>{{ __('選択してください') }}</option>
        @foreach($listGroup as $key => $group)
            <option
                {{ old('group_id') == $group['id'] ? 'selected' : '' }} value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
        @endforeach
    </select>
</div>
<div id="listCategory">
</div>

<script>
    $('.status').select2({
        language: {
            noResults: function () {
                return "該当する情報は見つかりません。";
            }
        }
    });
    $('#group').on('change', function () {
        var group_id = $(this).val();
        $.ajax({
            type: "POST",
            url: cedu.route('/calculate-manage/getCategory'),
            data: {
                group_id: group_id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function () {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listCategory").empty();
            },
            success: function (response) {
                $("#listCategory").append(response.data);
            }
        });
    });

</script>
