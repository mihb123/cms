<div class="kt-portlet__body">
    <table class="table table-striped table-bordered table-hover table-checkable" id="example">
        <thead>
        <tr>
            <th class="text-center">{{ __('posts::messages.title') }}</th>
            <th class="text-center">{{ __('calculate::messages.money') }}</th>
            <th class="text-center">{{ __('calculate::messages.fixed_price') }}</th>
        </tr>
        </thead>
        <tbody>

        @if (!empty($listServiceCalculate))
            @foreach ($listServiceCalculate as $key => $item)
                <tr>
                    <td class="text-center">
                        <a>{{ $item['title'] }}</a>
                    </td>
                    <td class="text-center">
                        <input class="form-control"
                               onchange="changeMoney('{{$item['id']}}', '{{ $category_id }}',this.value)" type="number"
                               name="money" placeholder="@lang('金額を入力お願いします。')"
                               value="{{ !empty($money[$category_id]) && !empty($money[$category_id][$item['id']]) ? $money[$category_id][$item['id']] : '' }}">
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="fixed_price" class="fixedPrice"
                               {{ !empty($fixedPrice[$category_id]) && !empty($fixedPrice[$category_id][$item['id']]) ? 'checked' : '' }}
                               data-id="{{$item['id']}}"
                               type="number" value="1">
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>
<script>
    $('.manageService').on('click', function () {
        var checked = $(this).prop('checked')
        if (checked) {
            var id = $(this).val();
            var category = $(this).attr('data-category');
            $.ajax({
                type: "POST",
                url: cedu.route('/posts-manage/saveByChecked'),
                data: {
                    id: id,
                    category: category,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                beforeSend: function () {
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listPost").empty();
                },
                success: function (response) {
                    $("#listPost").html(response.data.listPost);
                }
            });
        } else {
            var id = $(this).val();
            var category = $(this).attr('data-category');
            $.ajax({
                type: "POST",
                url: cedu.route('/posts-manage/deleteByChecked'),
                data: {
                    id: id,
                    category: category,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                beforeSend: function () {
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listPost").empty();
                },
                success: function (response) {
                    $("#listPost").html(response.data.listPost);
                }
            });
        }
    });

    $('.fixedPrice').on('click', function () {
        var checked = $(this).prop('checked')
        var id = $(this).attr('data-id');
        var category = '{{ $category_id }}';
        var fixed_price = 0;
        if (checked) {
            fixed_price = 1;
        }
        $.ajax({
            type: "POST",
            url: cedu.route('/calculate-manage/changeFixedPrice'),
            data: {
                service_calculate_id: id,
                category_id: category,
                fixed_price: fixed_price,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function () {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                // $("#listGroup").empty();
            },
            success: function (response) {
                // $("#listGroup").html(response.data.listPost);
                toastr.success(response.message);
            }
        });

    });

    function changeMoney(id, category, value) {
        $.ajax({
            type: "POST",
            url: cedu.route('/calculate-manage/changeMoney'),
            data: {
                service_calculate_id: id,
                category_id: category,
                money: value,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function () {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                // $("#listGroup").empty();
            },
            success: function (response) {
                // $("#listGroup").html(response.data.listPost);
                toastr.success(response.message);
            }
        });
    }

</script>
