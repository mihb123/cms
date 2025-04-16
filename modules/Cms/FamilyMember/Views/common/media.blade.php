@push('styles')
<style>
    label {
        cursor: pointer;
    }

    .img-wrap {
        position: relative;
        width: 153px;
    }

    .img-wrap .delete-btn {
        position: absolute;
        top: 7px;
        right: 7px;
        z-index: 9999999999999999999;
        margin-top: 0px !important;
    }

    .img-wrap img {
        border-radius: 3px;
        background: #fafbfc;
        border: 1px solid rgba(195,207,216,.3);
        display: inline-block;
        height: 150px;
        max-height: 150px;
        max-width: 150px;
        min-height: 150px;
        min-width: 150px;
        overflow: hidden;
        position: relative;
        text-align: center;
        vertical-align: middle;
        width: 150px;
    }
</style>
@endpush
<div class="choose_file">
    <a onclick="initialRenderImage()" name="fileimg1" class="btn btn-default fileinput-button"><i class="fas fa-image"></i>
        <strong class="ml-1 text-dark">画像を追加する</strong></a>
    <input hidden type="text" id="{{ $id }}" name="{{ $name }}" class="file-input" value="{{ old($name) ?? $image }}">
    <div class="img-wrap">
        <img width="150" name="fileimg" src="{{ old($name) ?? getFile($image) }}" alt="" class="img-file mt-4" id="{{ $id }}-preview">
        <a type="button" class="mt-4 delete-btn text-danger" id="{{ $id }}-delete"><i class="fas fa-trash"></i></a>
    </div>
    <div class="error_img mt-2"></div>
</div>
@push('scripts')
<script>
    function initialRenderImage() {
        $('body').find('.choose_file img[name="fileimg1"]').each(function() {
            var $img = $(this);
            var $input = $img.closest('.choose_file').find('input[type="text"]');
            var $error = $img.closest('.choose_file').find('.error_img')
            var html = '<span class="text-danger">選択したファイルは画像ファイルでなければなりません</span>';
            $error.html('');
            $img.on('load', function() {
                $img.closest('.choose_file').find('a[type="button"]').removeAttr('hidden');
            }).on('error', function(e) {
                console.log(e);
                $error.empty();
                $input.val('');
                $error.append(html);
                $img.attr('src', "{{ asset('cms/image/image_default.png') }}");
                $img.closest('.choose_file').find('a[type="button"]').hide();
            })
        });
    }

    $(document).ready(function() {
        $('body').on('click', '.delete-btn', function() {
            $(this).closest('.choose_file').find('input[type="text"]').val('');
            $(this).closest('.choose_file').find('img[name="fileimg"]').attr('src',
                "{{ asset('cms/image/image_default.png') }}");
            $(this).closest('.choose_file').find('input.file-input').attr('src', "");
            // $(this).hide();
        });

        $(document).on('click', '.choose_file a[name="fileimg1"]', function(e) {
            var id = $(this).closest('.choose_file').find('input[type="text"]').attr('id');
            filemanager.selectFile(id);
            $('body').find('.choose_file img[name="fileimg"]').each(function() {
                var $img = $(this);
                $img.on('load', function() {
                    if ($img.attr('src') !== "{{ asset('cms/image/image_default.png') }}") {
                        $img.closest('.choose_file').find('a[type="button"]').show();
                    }
                });
            });
        });
    });
</script>
@endpush
