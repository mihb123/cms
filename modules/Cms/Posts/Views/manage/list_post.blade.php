<div class="kt-portlet__body">
    <table class="table table-striped table-bordered table-hover table-checkable" id="example">
        <thead>
            <tr>
                <th class="text-center">TOP表示</th>
                <th class="text-center">{{ __('posts::messages.title') }}</th>
                <th class="text-center">{{ __('親タグ') }}</th>
                <th class="text-center">{{ __('posts::messages.sort') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($listCategoryPost[$category->id]))
                @foreach ($listCategoryPost[$category->id] as $keyPost => $posts)
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" checked="checked" class="managePosts" data-category="{{ $category->id }}" name="manage_posts[]" value="{{ $posts->id }}">
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $posts->id)}}">{{ $posts->title }}</a>
                        </td>                  
                        <td class="text-center">
                            @if(!empty($listPost[$category->id][$posts->id]))
                                @foreach($listPost[$category->id][$posts->id] as $keyPostGroup => $postGroup)
                                    {{ $postGroup->title_japan ?? '' }} <br/>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            <input type="text"
                            onchange="changeSortPost('{{$posts->id}}', '{{ $category->id }}',this.value)" 
                            data-router="/posts-manage/changeSort" class="form-control valid"
                            value="{{ $sortPost[$posts->id]}}" />
                        </td>              
                    </tr>
                @endforeach             
            @endif
            @if (!empty($listPost[$category->id]))            
                @foreach($listPost[$category->id] as $key => $listPostsGroup)
                    @if (!in_array($key,$postsIds))
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="managePosts" data-category="{{ $category->id }}" name="manage_posts[]" value="{{ $key }}">
                            </td>
                            <td>
                                <a href="{{ route('posts.edit', $key)}}">{{ $detailPost[$key] ?? '' }}</a>
                            </td>                  
                            <td class="text-center">
                                    
                                @foreach($listPostsGroup as $keyGroup => $group)                           
                                    {{ $group->title_japan ?? '' }} <br/>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <input type="text" }}
                                onchange="changeSortPost('{{$key}}', '{{ $category->id }}',this.value)" 
                                data-router="/posts-manage/changeSort" class="form-control valid"
                                value="" />
                            </td>              
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<script>
    $('.managePosts').on('click', function () {
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
                beforeSend: function(){
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listPost").empty();
                },
                success:function(response){
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
                beforeSend: function(){
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listPost").empty();
                },
                success:function(response){
                    $("#listPost").html(response.data.listPost);
                }
            });
        }
    });

    function changeSortPost(id, category, value) {
        $.ajax({
            type: "POST",
            url: cedu.route('/posts-manage/changeSortPost'),
            data: {
                id: id,
                category: category,
                sort: value,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function() {
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listPost").empty();
            },
            success:function(response) {
                $("#listPost").html(response.data.listPost);
            }
        });
    }
</script>