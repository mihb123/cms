<form class="kt-form" id="node-form" action="{{ route('menu.update', $menu['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="accordion accordion-toggle-arrow" id="accordionExample4">
        <div class="card">
            <div class="card-header" id="headingOne4">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#tagGroup" aria-expanded="false" aria-controls="tagGroup">
                    <i class="flaticon2-layers-1"></i> 親カテゴリー
                </div>
            </div>
            <div id="tagGroup" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample4">
                <div class="card-body">
                    <div class="kt-checkbox-list">
                        @foreach ($listCategoryTag as $key => $categoryTag)
                            <label class="kt-checkbox kt-checkbox--success">
                                <input type="checkbox" name="menus[]"
                                    <?= isset($menu['content']) && in_array($categoryTag['id'], $menu['content']) ? 'checked': '' ?>
                                    value="{{ $categoryTag['id']}}"> {!! $categoryTag['title'] ?? '' !!}
                                <span></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer" style="display: block;">
                    <div class="item-list-footer">
                        <label class="float-right btn btn-sm btn-default">
                            <input type="checkbox" id="select-all-tagGroup"> 全てを選択する
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion accordion-toggle-arrow mt-3" id="accordion3">
        <div class="card">
            <div class="card-header" id="headingOne3">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#postsGroup" aria-expanded="false" aria-controls="postsGroup">
                    <i class="flaticon2-layers-1"></i> 投稿カテゴリー
                </div>
            </div>
            <div id="postsGroup" class="collapse" aria-labelledby="headingOne" data-parent="#accordion3">
                <div class="card-body">
                    <div class="kt-checkbox-list">
                        @foreach ($listCategoryPosts as $key => $categortyPost)
                            <label class="kt-checkbox kt-checkbox--success">
                                <input type="checkbox" name="menus[]"
                                    <?= isset($menu['content']) && in_array($categortyPost['id'], $menu['content']) ? 'checked': '' ?>
                                    value="{{ $categortyPost['id']}}"> {!! $categortyPost['title'] !!}
                                <span></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer" style="display: block;">
                    <div class="item-list-footer">
                        <label class="float-right  btn btn-sm btn-default">
                            <input type="checkbox" id="select-all-postsGroup"> 全てを選択する
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <button type="submit" class="float-right btn btn-default btn-sm">
            メニューに追加する
        </button>
    </div>
</form>
<!-- <link href="{{ asset('cms/theme_metronic/plugins/custom/jquery-ui/jquery-ui.bundle.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- <script src="{{ asset('cms/theme_metronic/js/pages/components/extended/bootstrap-notify.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('cms/theme_metronic/plugins/custom/jquery-ui/jquery-ui.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('cms/theme_metronic/js/pages/components/portlets/draggable.js') }}" type="text/javascript"></script>
<script>
    $('#select-all-tagGroup').click(function(event) {
        if (this.checked) {
            $('#tagGroup :checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('#tagGroup :checkbox').each(function() {
                this.checked = false;
            });
        }
    });            

    $('#select-all-postsGroup').click(function(event) {
        if (this.checked) {
            $('#postsGroup :checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('#postsGroup :checkbox').each(function() {
                this.checked = false;
            });
        }
    });


    $(".droppable-area1, .droppable-area2").sortable({
        connectWith: ".connected-sortable",
        stack: '.connected-sortable ul'
    })
</script>