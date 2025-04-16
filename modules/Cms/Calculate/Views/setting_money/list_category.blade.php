<div class="kt-portlet__body">
    <table class="table table-striped table-bordered table-hover table-checkable" id="example">
        <thead>
            <tr>
                <th class="text-center">{{ __('posts::messages.title') }}</th>
                <th class="text-center">{{ __('限度額') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($listCategory))
            @foreach ($listCategory as $key => $item)
            <tr>
                <td class="text-center">
                    <a>{{ $item['title'] }}</a>
                </td>
                <td class="text-center">
                    <input class="form-control" onchange="changeMoney('{{ $item->id }}', '{{ $group_id }}',this.value)" type="number" name="max_money" placeholder="@lang('金額を入力お願いします。')" value="{{ !empty($maxMoney[$group_id][$item['id']]) && !empty($maxMoney[$group_id][$item['id']]) ? $maxMoney[$group_id][$item['id']] : '' }}">
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<script>
    function changeMoney(category_id, group_id, value) {
        $.ajax({
            type: "POST",
            url: cedu.route('/setting-money/changeMoney'),
            data: {
                category_id: category_id,
                group_id: group_id,
                money: value,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function() {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
            },
            success: function(response) {
                toastr.success(response.message);
            }
        });
    }
</script>