@foreach($listProductNew as $key => $items)
    @include($module.'::partials.item_product', ['data' => $items])
@endforeach
@if($listProductNew->lastPage() > $page)
    <div class="view-all text-right">
        <a class="link-with-icon gapx-10" href="javascript:;" onclick="showListProduct('{{ $page + 1}}', '', '{{ route('product.showListProduct') }}')" >
            <span class="text">❝すべて❞をもっと見る</span>
            <img src="{{ asset('frontend/assets/images/cms4/arrow-right.svg') }}" alt="" />
        </a>
    </div>
@endif
<script>
    function showListProduct(page, category = '', route) {
        $.ajax({
            url: route,
            method: "GET",
            data: {
                page: page,
                category: category,
            },
            beforeSend: function () {
                $('#cms4-tab-1 .text-right').remove();
            },
            success: function (response) {
                $('#cms4-tab-1').append(response.result);
            }
        });
    }
</script>
