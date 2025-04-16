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
                    <label>{{ __('posts::messages.category') }}</label>
                    <select class="form-control status" id="category" data-placeholder="{{ __('posts::messages.category') }}" name="category_id">
                        <option disabled selected>{{ __('選択してください') }}</option>
                        @foreach($listCategory as $value => $category)
                            <option {{ (old('category_id') == $category->id) ? 'selected' : '' }} value="{{ $category->id }}"> {!! formatTextByCharNumAndLine($category->title, 12, null, 1, false) !!}</option>
                        @endforeach
                    </select>
                </div>
                <div id="listGroup">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        記事一覧
                    </h3>
                </div>
            </div>
            <div id="listPost"></div>
        </div>
    </div>
</div>
<script>
    $('#category').on('change', function () {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: cedu.route('/posts-manage/getGroup'),
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function(){
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listGroup").empty();
                $("#listPost").empty();
            },
            success:function(response) {
                $("#listGroup").append(response.data.listGroup);
                $("#listPost").append(response.data.listPost);
            }
        });
    });

</script>
