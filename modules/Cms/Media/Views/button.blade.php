<!-- Start upload widget -->
<input class="form-control" data-rule-maxlength="250" name="{{ $name }}" type="hidden" value="{{ $value }}" />
<!-- <input class="form-control" name="thumb-{{ $name }}" type="hidden" value="" /> -->
<a class="btn btn-default btn_upload_image" data-type="{{ $type }}" data-name="{{ $name }}" data-vendor="{{ $vendor }}">
    アップロード <i class="fa fa-cloud-upload"></i>
</a>
<div class="uploaded_image"><img src="{{ $thumb ? $thumb : asset('/cms/image/image_default.png') }}"><i title="Remove Image" class="fa fa-times"></i></div>
<input class="form-control" name="thumb-{{ $name }}" type="hidden" value="{{ $thumb ? $thumb : asset('/cms/image/image_default.png') }}" />
<!-- End upload widget -->
@push('style')
<style>
    #fm .col-md-3 {
        border-right: solid 1px #F4F4F4;
    }

    #fm .fm_folder_selector {
        padding: 15px 0px;
        min-height: 341px;
    }

    #fm .fm_folder_selector .fm_folder_title {
        display: block;
        padding: 4px 15px;
        color: #777;
        font-weight: 100;
    }

    #fm .fm_folder_selector .fm_folder_sel {
        display: block;
        padding: 4px 15px;
        color: #666;
        max-width: 120px;
        cursor: pointer;
    }

    #fm .fm_folder_selector .fm_folder_sel:hover {
        color: #48B0F7;
    }

    #fm .fm_folder_selector .fm_folder_sel.selected {
        border: solid 1px #EEE;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        background: #EEE;
    }

    #fm .fm_folder_selector form#fm_dropzone {
        border: 1px dashed #0087F7;
        border-radius: 5px;
        background: white;
        text-align: center;
        margin-left: 15px;
        margin-top: 15px;
        min-height: 200px;
        padding: 8px;
        vertical-align: middle;
        cursor: pointer;
    }

    #fm .fm_folder_selector form#fm_dropzone div.dz-message {
        display: block;
        padding: 51px 0px;
        color: #999;
    }

    #fm .fm_folder_selector form#fm_dropzone div.dz-message i.fa {
        font-size: 40px;
    }

    #fm .nav {
        background: #EEE;
    }

    #fm .nav input[type=search] {
        padding: 5px;
        line-height: 12px;
        height: 28px;
        margin: 4px 5px;
        border-color: #EEE;
        border-radius: 3px;
        font-weight: 400;
    }

    #fm .fm_file_selector ul {
        list-style: none;
        padding: 10px;
        margin: 0px;
        display: inline-block;
        height: 100%;
        width: 100%;
        min-height: 300px;
        overflow: scroll;
    }

    #fm .fm_file_selector ul li {
        display: inline-block;
        max-width: 104px;
        max-height: 104px;
        min-height: 104px;
        float: left;
        margin-bottom: 5px;
        margin-right: 5px;
        overflow: hidden;
        border: solid 1px #EEE;
    }

    #fm .fm_file_selector ul li a {
        display: block;
        height: 100%;
        cursor: pointer;
    }

    #fm .fm_file_selector ul li a img {
        height: 102px;
        display: block;
        transform: translateX(-50%);
        margin-left: 50%;
    }

    #fm .fm_file_selector ul li a i.fa {
        height: 102px;
        width: 102px;
        font-size: 96px;
        text-align: center;
        padding-top: 3px;
    }

    #fm .fm_file_selector ul li:hover {
        border-color: #48B0F7;
    }

    #fm .fm_file_selector ul li i.image-general {
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

    #fm .fm_file_selector ul li {
        position: relative;
    }

    .note-editable p {
        margin-bottom: 0 !important;
    }

    /*    custome css for ul-customer*/
    #fm .fm_file_selector ul.ul-customer {
        display: flex;
        flex-direction: column;
        max-height: calc(100vh - 105px);
        overflow-y: auto;
    }

    #fm .fm_file_selector ul.ul-customer li {
        display: block;
        max-width: 100%;
        max-height: 50px;
        min-height: 50px;
        width: 100%;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        gap: 0 10px;
        padding: 0px 15px;
        cursor: pointer;
        height: 50px;
        /* line-height: 47px; */
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__img {
        width: 9%;
        display: flex;
        align-items: center;
        text-align: left;
        max-height: 100%;
        height: 40px;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__img img {
        object-fit: cover;
        width: auto;
        height: 100%;
        max-width: 100%;
        margin: 0 auto;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__func {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 0 5px;
        width: 10%;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__func span {
        border: 1px solid #EEE;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: red;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__func span.fm_file_sel {
        border: 1px solid #EEE;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: green;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__check {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__size {
        width: 40%;
        display: flex;
        align-items: center;
    }

    /* #fm .fm_file_selector ul.ul-customer li .wrap-ct__size span {
        width: 100%;
        margin-left: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } */

    #fm .fm_file_selector ul.ul-customer li .wrap-wrap-ct__img {
        width: 10%;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-wrap-wrap-ct__ext {
        width: 10%;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__size {
        width: 10%;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__name {
        width: 40%;
        display: flex;
        align-items: center;
        text-align: center;
    }

    #fm .fm_file_selector ul.ul-customer li .wrap-ct__name span {
        width: 100%;
        margin-left: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* end custome css for ul-customer*/
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
        cedu.uploader.showUploader = function(type, selector, vendor) {
            $("#upload-data-type").val(type);
            $("#upload-data-name").val(selector);
            $("#upload-data-vendor").val(vendor);

            $("#fm").modal('show');

            cedu.uploader.getUploadedFiles();
        }

        /**
         * Get upload object thumb preview in file manager
         */

        cedu.uploader.getThumb = function(upload) {
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

            // return '<li id="image-'+upload.id+'">' +
            //     '<i title="Remove Image" onclick="deleteImage('+upload.id+')" class="fa fa-times image-general"></i>' +
            //     '<a class="fm_file_sel" data-toggle="tooltip" data-placement="top" title="'+upload.name+'" upload=\''+JSON.stringify(upload)+'\'>'+image+'</a>' +
            //     '</li>';
            return `<li id="image-${upload.id}">
                        <div class="wrap-ct" >                         
                            <div class="wrap-ct__img">
                                <img src='${ upload.thumb}' alt="${upload.name}">
                            </div>
                            <div class="wrap-ct__name">
                                <span>${upload.name}</span>
                            </div>
                            <div class="wrap-ct__ext">
                                <span>${upload.ext}</span>
                            </div>
                            <div class="wrap-ct__size">
                                <span>${upload.size}</span>
                            </div>                          
                            <div class="wrap-ct__func">                        
                                <span class="fm_file_sel" upload= '${JSON.stringify(upload)}'>
                                    <i class="fa fa-check" title="Choose Image"></i>
                                </span>
                                <span><i class="fa fa-trash" title="Remove Image" onclick="deleteImage('${upload.id}')"></i></span>
                            </div>
                        </div>
                    </li>`;

        }

        cedu.uploader.getUploadedFiles = function() {
            // Get uploader metadata
            var vendor = $("#upload-data-vendor").val();

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
                        $(".fm_file_selector ul").append(`<li>
                            <div class="wrap-ct">                            
                                <div class="wrap-ct__img">
                                    <span>サムネイル</span>
                                </div>                          
                                <div class="wrap-ct__name">
                                    <span>ファイル名</span>
                                </div>
                                <div class="wrap-ct__ext">
                                    <span>ファイル形式</span>
                                </div>
                                <div class="wrap-ct__size">
                                    <span>サイズ</span>
                                </div>
                                <div class="wrap-ct__func">
                                    アクション
                                </div>
                            </div>
                        </li>`)
                        for (var index = 0; index < cedu.uploader.files.length; index++) {
                            var el = cedu.uploader.files[index];
                            var li = cedu.uploader.getThumb(el);
                            $(".fm_file_selector ul").append(li);
                        }
                    } else {
                        $(".fm_file_selector ul").html("<div class='text-center text-danger' style='margin-top:40px; font-weight: 400;'>画像ファイルがありません</div>");
                    }
                }
            });
        }

        $("#fm input[type=search]").keyup(function() {
            var search = $(this).val().trim();
            console.log('[uploader] search query:', search);
            if (search != "") {
                $(".fm_file_selector ul").empty();
                $(".fm_file_selector ul").append(`<li>
                    <div class="wrap-ct">                            
                        <div class="wrap-ct__img">
                            <span>サムネイル</span>
                        </div>                          
                        <div class="wrap-ct__name">
                            <span>ファイル名</span>
                        </div>
                        <div class="wrap-ct__ext">
                            <span>ファイル形式</span>
                        </div>
                        <div class="wrap-ct__size">
                            <span>サイズ</span>
                        </div>
                        <div class="wrap-ct__func">
                            アクション
                        </div>
                    </div>
                    </li>`);
                for (var index = 0; index < cedu.uploader.files.length; index++) {
                    var upload = cedu.uploader.files[index];
                    if (upload.name.toUpperCase().includes(search.toUpperCase())) {

                        $(".fm_file_selector ul").append(cedu.uploader.getThumb(upload));
                    }
                }
            } else {
                cedu.uploader.getUploadedFiles();
            }
        });

        // Event when user click to upload image button
        $(".btn_upload_image").on("click", function() {
            cedu.uploader.showUploader("image", $(this).data("name"), $(this).data("vendor"));
        });

        // Event when user click to upload file button
        $(".btn_upload_file").on("click", function() {
            cedu.uploader.showUploader("file", $(this).data("name"), $(this).data("vendor"));
        });

        // Event when user click to upload files button
        $(".btn_upload_files").on("click", function() {
            cedu.uploader.showUploader("files", $(this).data("name"), $(this).data("vendor"));
        });

        /**
         * Initialize image upload dropzone instance
         * Auto resize image before upload to server
         */
        cedu.dropzone = new Dropzone("#fm_dropzone", {
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
                    cedu.uploader.getUploadedFiles();
                });
                this.on('sending', function(file, xhr, formData) {
                    formData.append("type", $('#upload-data-type').val());
                    formData.append("name", $('#upload-data-name').val());
                    formData.append("vendor", $('#upload-data-vendor').val());
                    console.log('[uploader] upload data', formData);
                });
            }
        });

        // Event when user click to remove file
        $(".uploaded_image i.fa.fa-times").on("click", function() {
            $(this).parent().children("img").attr("src", "/cms/image/image_default.png");
            $(this).parent().prev().prev().val("");
            $(this).parent().next().val("");
            // $(this).parent().prev().removeClass("hide");
            // $(this).parent().prev().prev().val("");
        });

        // Event when user click to remove file
        $(".uploaded_file i.fa.fa-times").on("click", function(e) {
            $(this).parent().attr("href", "");
            $(this).parent().addClass("hide");
            $(this).parent().prev().removeClass("hide");
            $(this).parent().prev().prev().val("");
            e.preventDefault();
        });

        // Event when user click to remove file
        $(".uploaded_file2 i.fa.fa-times").on("click", function(e) {
            var upload_id = $(this).parent().attr("upload_id");
            var $hiddenFIDs = $(this).parent().parent().prev();

            var hiddenFIDs = JSON.parse($hiddenFIDs.val());
            var hiddenFIDs2 = [];
            for (var key in hiddenFIDs) {
                if (hiddenFIDs.hasOwnProperty(key)) {
                    var element = hiddenFIDs[key];
                    if (element != upload_id) {
                        hiddenFIDs2.push(element);
                    }
                }
            }
            $hiddenFIDs.val(JSON.stringify(hiddenFIDs2));
            $(this).parent().remove();
            e.preventDefault();
        });

        // Event when user select a image
        // Update image input data and thumb preview
        $("body").on("click", "div.fm_file_selector .fm_file_sel", function() {
            type = $("#upload-data-type").val();
            media = $(this).attr("upload");
            upload = JSON.parse(media);
            if (type == "image") {
                $hinput = $("input[name=" + $("#upload-data-name").val() + "]");
                $hinput.val(upload.id);
                // $hinput.next("a").addClass("hide");
                $hinput.next("a").next(".uploaded_image").removeClass("hide");
                $hinput.next("a").next(".uploaded_image").children("img").attr("src", upload.thumb);
                $hinput.next("a").next(".uploaded_image").next("input[name=" + 'thumb-' + $("#upload-data-name").val() + "]").val(upload.thumb);
            } else if (type == "file") {
                $hinput = $("input[name=" + $("#upload-data-name").val() + "]");
                $hinput.val(upload.id);

                $hinput.next("a").addClass("hide");
                $hinput.next("a").next(".uploaded_file").removeClass("hide");
                $hinput.next("a").next(".uploaded_file").attr("href", upload.src);
            } else if (type == "files") {
                $hinput = $("input[name=" + $("#upload-data-name").val() + "]");

                var hiddenFIDs = JSON.parse($hinput.val());
                // check if upload_id exists in array
                var upload_id_exists = false;
                for (var key in hiddenFIDs) {
                    if (hiddenFIDs.hasOwnProperty(key)) {
                        var element = hiddenFIDs[key];
                        if (element == upload.id) {
                            upload_id_exists = true;
                        }
                    }
                }
                if (!upload_id_exists) {
                    hiddenFIDs.push(upload.id);
                }
                $hinput.val(JSON.stringify(hiddenFIDs));
                var fileImage = "";
                if (upload.ext == "jpg" || upload.ext == "png" || upload.ext == "gif" || upload.ext == "jpeg") {
                    fileImage = "<img src='" + upload.thumb + "' />";
                } else {
                    fileImage = "<i class='fa fa-file-o'></i>";
                }
                $hinput.next("div.uploaded_files").append("<a class='uploaded_file2' upload_id='" + upload.id + "' target='_blank' href='" + upload.thumb + "'>" + fileImage + "<i title='Remove File' class='fa fa-times'></i></a>");
            }
            $("#fm").modal('hide');
        });
    });
</script>
@endpush