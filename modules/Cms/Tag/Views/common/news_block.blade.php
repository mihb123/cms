<div class="block block-news mt-2">
    <div class="card card-info">
        <div class="card-header bg-warning">
            <h3 class="card-title">ブロック</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-remove-block">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;border: 1px solid #dedede">
            <div class="block-content">
                <div class="form-group">
                    <label>{{ __('tag::messages.title_japan') }}</label>
                    <input class="form-control title-japan" type="text" name="" value="">
                </div>
                <div class="form-group">
                    <label>{{ __('tag::messages.title_english') }}</label>
                    <input class="form-control title-english" type="text" name="" value="">
                </div>
                <div class="text-right mt-2">
                    <a href="#" class="add-level" data-menu="1" data-level="1">説明を追加</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-level block-news-1 mt-2">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ブロック</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-remove-level1">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;border: 1px solid #dedede">
            <div class="block-content">
                <div class="card-body" style="display: block; border: 1px solid #dedede">
                    <div class="block-content">
                        <div class="form-group">
                            <label>{{ __('tag::messages.title') }}</label>
                            <input class="form-control name" type="text" name="" value="">
                        </div>
                        <div class="form-group">
                            <label>{{ __('tag::messages.color-font') }}</label>
                            <input class="form-control color" type="color" name="" value="">
                        </div>
                        <div class="form-group">
                            <label class="">{{ __('tag::messages.summary') }}</label>
                            <textarea class="content" style="height:30px" name="" placeholder="{{ __('tag::messages.summary') }}" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('cms/js/adminlte.min.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $(document).on('click', '.add-new-link', function(e) {
                e.preventDefault();
                var number = $('.ui-menu').length;
                var card = $('.block-news').clone();
                card.addClass('ui-menu').removeClass('block-news');
                card.find('.title-japan').attr('name', `content[${number}][title-japan]`);
                card.find('.title-english').attr('name', `content[${number}][title-english]`);
                card.find('.add-level').attr('data-menu', number);
                card.addClass('menu' + number);
                $(this).parent().before(card);
            })

            $(document).on('click', '.add-level', function(e) {
                e.preventDefault();
                var menu = $(this).attr('data-menu');
                var number = $(`.menu${menu} .level1`).length;
                var block = $('.block-news-1').clone();

                block.removeClass('block-news-1').addClass('level1');
                block.addClass(`level-${menu}-number-${number}`);
                block.find('.name').attr('name', `content[${menu}][level][${number}][name]`);
                block.find('.color').attr('name', `content[${menu}][level][${number}][color]`);
                block.find('.content').attr('name', `content[${menu}][level][${number}][content]`);
                block.find('textarea.content').removeClass('content').addClass(`content-${menu}-number-${number}`);
                customContent(block.find(`.content-${menu}-number-${number}`));
                $(this).parent().before(block);
            });
        });

        function customContent(id) {
            var customContent = id;
            customContent.summernote({
                height: 200,
                buttons: {
                    filemanager: filemanager.btnSummernote
                },
                toolbar: [
                    ["style", ["style", "bold", "italic", "underline"]],
                    ["color", ["color"]],
                    ["fontname", ["fontname"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["fontsize", ["fontsize"]],
                    ["custom", ["link", "filemanager", "video"]],
                    ["view", ["codeview", "help"]],
                    ['height', ['height']],

                ],
                lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0', '3.0'],
                fontSizeUnits: ['px', 'pt'],
                fontNamesIgnoreCheck: ['Noto Sans JP'],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '20', '22', '24', '28', '32', '36', '40', '48'],
            });
        }
    </script>
@endpush
