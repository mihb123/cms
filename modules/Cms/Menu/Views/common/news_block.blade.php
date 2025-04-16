<div class="block block-news mt-2">
    <div class="card card-info">
        <div class="card-header bg-gradient">
            <h3 class="card-title">ブロック</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-remove-blocks">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;border: 1px solid #dedede">
            <div class="block-content">
                <div class="form-group">
                    <label>{{ __('タイトル') }}</label>
                    <input class="form-control title" type="text" name="" value="">
                </div>
                <div class="form-group">
                    <label>{{ __('URL') }}</label>
                    <input class="form-control url" type="text" name="" value="">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card-header.bg-gradient {
        line-height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;
    }
</style>
<script src="{{ asset('cms/js/adminlte.min.js') }}" type="text/javascript"></script>
<script>
    $(function() {
        $(document).on('click', '.add-new-link', function(e) {
            e.preventDefault();
            var number = $('.ui-menu').length

            var card = $('.block-news').clone();
            card.addClass('ui-menu').removeClass('block-news');
            card.find('.title').attr('name', `menu_sitemap[${number}][title]`);
            card.find('.url').attr('name', `menu_sitemap[${number}][url]`);
            card.find('.add-level').attr('data-menu', number);
            card.addClass('menu' + number);
            $(this).parent().before(card);
        })
    });
    $(document).on("click", ".btn-remove-blocks", function (e) {
        if (!confirm("削除してもよろしいですか？")) {
            return false;
        }
        $(this).closest("div.ui-menu").remove();
        $('.ui-menu').each(function(i, menu) {
            $(menu).find('.title').attr('name', `menu_sitemap[${i}][title]`);
            $(menu).find('.url').attr('name', `menu_sitemap[${i}][url]`);
            $(menu).find('.add-level').attr('data-menu', i);              
        })
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
