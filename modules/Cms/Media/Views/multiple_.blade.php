<!-- Start uploader multiple images -->
<!-- Start upload widget -->
<a class="btn btn-default btn_upload_image--multi" data-type="{{ $type }}" data-name="{{ $name }}" data-vendor="{{ $vendor }}">
    アップロード <i class="fa fa-cloud-upload"></i>
</a>
<div class="upload-image-list">

    @if(!empty($value) && is_array($value))
    @foreach($value as $val)
    <div class="uploaded_image-item" data-img-id="{{ isset($val->id) ? $val->id : $val  }}">
        <img src="{{ get_image_url($val) }}"><i title="Remove Image" class="kc-remove-image fa fa-times"></i>
        <input type="hidden" name="{{ $name }}[]" value="{{ isset($val->id) ? $val->id : $val }}">
    </div>
    @endforeach
    @endif
</div>
<!-- End upload widget -->

@push('scripts')
<!-- Start uploader edit image -->
<div class="modal fade upload-modal" id="fm2" role="dialog" aria-labelledby="fileManagerLabel">
    <div class="modal-dialog" role="document" style="width: 90vw; max-width: 1024px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="fileManagerLabel">アップロードする写真を選択してください</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p0">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="fm_folder_selector">
                            <form action="{{ route('media.upload') }}" id="fm_dropzone-multi" class="fm_dropzone" enctype="multipart/form-data" method="POST" style="border: none;">
                                {{ csrf_field() }}
                                <input type="hidden" class="upload-data-type" value="" />
                                <input type="hidden" class="upload-data-name" value="" />
                                <input type="hidden" class="upload-data-vendor" value="" />
                                <div class="dz-message"><i class="fa fa-cloud-upload-alt"></i><br>ここをクリックしてファイルを選択またはドラッグします</div>
                                @if(!config('backend.media.private_uploads'))@endif
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 pl0">
                        <div class="fm_file_selector">
                            <ul></ul>
                        </div>
                        <input type="hidden" class="select-image-value" value="" />
                    </div>
                </div>
            </div>
            <div class="footer p-3 text-right">
                <button class="btn btn-info btn-select-images">{{ __("Select Image") }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End uploader edit image -->
@endpush
@push('style')
<style>
    .upload-modal .fm_file_selector ul li i.image-general {
        background-color: #D00;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        color: #FFF;
        font-size: 12px;
        display: inline-flex;
        padding: 2px 4px;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 5px;
        top: 5px;
        z-index: 1;
    }

    .upload-modal .fm_file_selector ul li {
        position: relative;
    }

    .text-danger {
        font-size: 12px;
    }

    .fm-image-item {
        border: 3px solid transparent;
        width: 101px;
        height: 101px !important;
        padding: 1px;
    }

    .fm-image-item img {
        width: 100%;
        height: 100% !important;
        object-fit: cover;
    }

    .selected .fm-image-item {
        border-color: #0a58ca;
    }

    .upload-image-list {
        margin-top: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;

    }

    .upload-image-list .uploaded_image-item {
        position: relative;
        width: 100px;
        height: 100px;
    }

    .upload-image-list .uploaded_image-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .upload-image-list .uploaded_image-item .kc-remove-image {
        font-size: 14px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: -5px;
        top: -5px;
        background-color: #f2f2f2;
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')
<!-- Media upload multiple script -->
<script>
    /**
     * File manager and uploader helper class
     */
    var cedu = cedu || {};

    cedu.dropzone = null;
    cedu.uploader = {
        files: null
    };

    $(document).ready(function() {
        /**
         * Show uploader modal and load uploaded files from server
         */
        cedu.uploader.showUploader2 = function(type, selector, vendor) {
            $("#fm2 .upload-data-type").val(type);
            $("#fm2 .upload-data-name").val(selector);
            $("#fm2 .upload-data-vendor").val(vendor);
            $("#fm2 .select-image-value").val("");

            $("#fm2").modal('show');

            cedu.uploader.getUploadedFiles2();
        }

        /**
         * Get upload object thumb preview in file manager
         */
        cedu.uploader.getThumb2 = function(upload, selected = false) {
            var image = '';
            if ($.inArray(upload.ext, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                image = '<img src="' + upload.thumb + '" />';
            } else {
                switch (upload.ext) {
                    case "pdf":
                        image = '<i class="fa fa-file-pdf-o"></i>';
                        break;
                    default:
                        image = '<i class="fa fa-file-text-o"></i>';
                        break;
                }
            }
            return '<li id="image-' + upload.id + '" class="' + (selected ? 'selected' : '') + '"><i title="Remove Image" onclick="deleteImage(' + upload.id + ')" class="fa fa-times image-general"></i><a class="fm-image-item" data-toggle="tooltip" data-placement="top" title="' + upload.name + '" upload=\'' + JSON.stringify(upload) + '\'>' + image + '</a></li>';
        }

        cedu.uploader.getUploadedFiles2 = function() {
            // Get uploader metadata
            var vendor = $("#fm2 .upload-data-vendor").val();

            // Load uploaded files
            $.ajax({
                dataType: 'json',
                url: cedu.url("/media/uploaded?vendor=" + vendor),
                success: function(json) {
                    // Show debug information
                    console.log('[uploader] files', json);

                    // Save to uploader object
                    cedu.uploader.files = json.uploads;

                    $(".fm_file_selector ul").empty();

                    if (cedu.uploader.files.length) {
                        var sImages = getImageSelected();
                        for (var index = 0; index < cedu.uploader.files.length; index++) {
                            var el = cedu.uploader.files[index];
                            var selectedImg = sImages.includes(el.id);
                            var li = cedu.uploader.getThumb2(el, selectedImg);
                            if (selectedImg) {
                                setSelectedImages(el.id + '|' + el.thumb)
                            }
                            $(".fm_file_selector ul").append(li);
                        }
                    } else {
                        $(".fm_file_selector ul").html("<div class='text-center text-danger' style='margin-top:40px; font-weight: 400;'>画像ファイルがありません</div>");
                    }
                }
            });
        }

        $("#fm2 input[type=search]").keyup(function() {
            var search = $(this).val().trim();
            console.log('[uploader] search query:', search);
            if (search != "") {
                $(".fm_file_selector ul").empty();
                for (var index = 0; index < cedu.uploader.files.length; index++) {
                    var upload = cedu.uploader.files[index];
                    if (upload.name.toUpperCase().includes(search.toUpperCase())) {
                        $(".fm_file_selector ul").append(cedu.uploader.getThumb2(upload));
                    }
                }
            } else {
                cedu.uploader.getUploadedFiles2();
            }
        });

        // Event when user click to upload image button
        $(".btn_upload_image--multi").on("click", function() {
            cedu.uploader.showUploader2("image", $(this).data("name"), $(this).data("vendor"));
        });

        /**
         * Initialize image upload dropzone instance
         * Auto resize image before upload to server
         */
        cedu.dropzone = new Dropzone("#fm_dropzone-multi", {
            maxFilesize: 100, // 100M
            resizeWidth: 1920,
            resizeHeight: 1920,
            resizeQuality: 1.0,
            resizeMethod: 'contain',
            acceptedFiles: 'image/*',
            init: function() {
                this.on('complete', function(file) {
                    this.removeFile(file);
                });
                this.on('success', function(file) {
                    console.log('[uploader] upload file success', file);
                    cedu.uploader.getUploadedFiles2();
                });
                this.on('sending', function(file, xhr, formData) {
                    formData.append("type", $('#fm2 .upload-data-type').val());
                    formData.append("name", $('#fm2 .upload-data-name').val());
                    formData.append("vendor", $('#fm2 .upload-data-vendor').val());
                    console.log('[uploader] upload data', formData);
                });
            }
        });

        // Event when user select a image
        // Update image input data and thumb preview
        $("body").on("click", "#fm2 div.fm_file_selector .fm-image-item", function(e) {
            e.preventDefault();
            $(this).closest("li").toggleClass("selected");

            type = $("#fm2 .upload-data-type").val();
            media = $(this).attr("upload");
            upload = JSON.parse(media);
            if (type == "image") {
                $hinput = $("input[name=" + $("#fm2 .upload-data-name").val() + "]");
                $hinput.val(upload.id);
                // $hinput.next("a").addClass("hide");
                $hinput.next("a").next(".uploaded_image").removeClass("hide");
                $hinput.next("a").next(".uploaded_image").children("img").attr("src", upload.thumb);
                $hinput.next("a").next(".uploaded_image").next("input[name=" + 'thumb-' + $("#fm2 .upload-data-name").val() + "]").val(upload.thumb);
                if ($(this).closest("li").hasClass("selected")) {
                    setSelectedImages(upload.id + '|' + upload.thumb);
                } else {
                    setSelectedImages(upload.id + '|' + upload.thumb, true);
                }
            }
            // $("#fm").modal('hide');
        });

        $(document).on("click", "#fm2 .btn-select-images", function(e) {
            e.preventDefault();
            var p = $(this).closest(".upload-modal");
            var selectImages = p.find(".select-image-value").val();
            if (selectImages) {
                var selectedImagesHtml = '';
                selectImages = selectImages.slice(1, -1);
                var imageArr = selectImages.split('__');
                imageArr.forEach((imgVal) => {
                    var imgSingle = imgVal.split('|');
                    selectedImagesHtml += '<div class="uploaded_image-item" data-img-id="' + imgSingle[0] + '">\n' +
                        '                <img src="' + imgSingle[1] + '"><i title="Remove Image" class="kc-remove-image fa fa-times"></i>\n' +
                        '                <input type="hidden" name="' + $(".btn_upload_image--multi").attr('data-name') + '[]" value="' + imgSingle[0] + '">\n' +
                        '            </div>';
                })

                $(".upload-image-list").html(selectedImagesHtml);
            }
            $("#fm2").modal('hide');
        })

        function setSelectedImages(selected, remove = false) {
            var selectImages = $(".select-image-value").val();
            if (remove) {
                selectImages = selectImages.replace("_" + selected + "_", '');
            } else {
                selectImages += "_" + selected + "_";
            }
            $(".select-image-value").val(selectImages);
        }

        $(document).on("click", ".upload-image-list .kc-remove-image", function(e) {
            e.preventDefault();
            $(this).closest(".uploaded_image-item").remove();
        })

        function getImageSelected() {
            var selectedImg = [];
            $(".upload-image-list .uploaded_image-item").each(function() {
                selectedImg.push(parseInt($(this).attr('data-img-id')));
            })
            return selectedImg;
        }

    });
</script>
@endpush