@if(isset($listProductNewTab))
    @foreach($listProductNewTab as $key => $items)
        @include($module.'::partials.item_product', ['data' => $items])
    @endforeach
@elseif($categoryNew->productNews())
    @foreach($categoryNew->productNews() as $keyProductNews => $productNews)
        @include($module.'::partials.item_product', ['data' => $productNews])
    @endforeach
@endif
@if((isset($listProductNewTab) && $listProductNewTab->lastPage() > $page) || (empty($listProductNewTab) && count($categoryNew->productNews()) > 10))
    <div class="view-all text-right">
        <a class="link-with-icon gapx-10"
            href="javascript:;"
            onclick="showListProduct1('{{$categoryNew->id }}','{{ $page + 1 }}', '{{ $categoryNew->title }}', '{{ route('product.showListProduct') }}')" >
            <span class="text">❝すべて❞をもっと見る</span>
            <img src="{{ asset('frontend/assets/images/cms4/arrow-right.svg') }}" alt="" />
        </a>
    </div>
@endif
<script>
    function showListProduct1(id, page, category = '', route) {
        $.ajax({
            url: route,
            method: "GET",
            data: {
                page: page,
                category: category,
            },
            beforeSend: function () {
                $('#cms4-tab-'+id+' .text-right').remove();
            },
            success: function (response) {
                $('#cms4-tab-'+ id).append(response.result);
            }
        });
    }
</script>
