<div class="form-group">
    <label class="required">{{ __('要介護度') }}</label>
    <select class="form-control status" id="category" data-placeholder="選択ください。" name="category_id[]">
        <option disabled selected>{{ __('選択してください') }}</option>
        @foreach($listCategory as $key => $category)
            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
        @endforeach
    </select>
</div>

<script>
    $('.status').select2({
        language: {
            noResults: function () {
                return "該当する情報は見つかりません。";
            }
        }
    });

    $('#category').on('change', function () {
        var category_id = $(this).val();
        $.ajax({
            type: "POST",
            url: cedu.route('/calculate-manage/getService'),
            data: {
                category_id: category_id,
                type: '{{ $type }}',
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function () {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listGroup").empty();
            },
            success: function (response) {
                $("#listGroup").append(response.data);
            }
        });
    });


</script>

