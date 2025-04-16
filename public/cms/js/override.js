/**
 * Demenbook extend js
 */

var ui = ui || {};

/**
 * Build notify option with message type
 */
ui.notifyOption = function(type) {
	return {
        type: type,
        placement: {
            from: "bottom",
            align: "right"
        },
        animate: {
            enter: 'animated fadeInUp',
            exit: 'animated fadeOutDown'
        },
    };
};

/**
 * Override $.notify alert message
 */
ui.alert = function(m) {
	$.notify({ message: m }, ui.notifyOption('danger'));
};

/**
 * Override $.notify success message
 */
ui.message = function(m) {
	$.notify({ message: m }, ui.notifyOption('success'));
};

function deleteData(dataHtml) {
    var html = Base64.decode(dataHtml);
    console.log(html);
    $("#confirmModal").html(html);
}

function editorCustom() {
    var editor = $('.summernote');
    editor.summernote({
        height: ($(window).height() - 500),
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

    window.addEventListener('filemanager.select', function (e) {
        var data = e.detail.data;
        $(data.note).summernote('editor.insertImage', data.absolute_url)
    })
}
function updateTagnew() {
    $('.ui-menu').each(function(i, menu) {
        $(menu).find('.title-japan').attr('name', `content[${i}][title-japan]`);
        $(menu).find('.title-english').attr('name', `content[${i}][title-english]`);
        $(menu).find('.add-level-1').attr('data-menu', i);
        $(menu).find('.level1').each(function(k, level1) {
            $(level1).find('.name').attr('name',
                `content[${i}][level][${k}][name]`);
            $(level1).find('.color').attr('name',
                `content[${i}][level][${k}][color]`);
            $(level1).find('.content-'+i+'-number-'+k).attr('name',
                `content[${i}][level][${k}][content]`);
        })
    })
}

function changeSort(id, value, router, type = '') {

    $.ajax({
        type: "POST",
        url: cedu.route(router),
        data: {
            id: id,
            sort: value,
            type: type,
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: 'POST'
        },
        beforeSend: function(){
            $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
        },
        success:function(response){
            $(".wrapper div.loading").remove();
            if (response.error == 200) {
                toastr.success(response.message);
                location.reload()
            } else {
                toastr.error(response.message);
            }
        }
    });
}

function deleteImage(id) {
    swal.fire({
        title: "本当に大丈夫ですか？",
        text: "データを復元することはできません！",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "はい、削除してください！",
        cancelButtonText: "キャンセル",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: cedu.url("/media/delete"),
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id,
                }
            }).done(function (response) {
                swal.fire(
                    "終わり！",
                    "無事削除されました！",
                    "success",
                );
                $(".fm_file_selector ul li#image-"+id).remove();
            }).fail(function () {
                swal.fire(
                    "削除中にエラーが発生しました!",
                    "もう一度お試しください",
                    "error"
                );
            });
        }
    });
}

function displayTop(id , router, checkbox) {
    var isChecked = checkbox.checked;
    if (isChecked) {
        var value = 1;
    } else {
        var value = 0;
    }
    $.ajax({
        type: "POST",
        url: cedu.route(router),
        data: {
            id: id,
            type: value,
            _token: $('meta[name="csrf-token"]').attr('content'),
            _method: 'POST'
        },
        beforeSend: function () {
            $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
        },
        success: function (response) {
            $(".wrapper div.loading").remove();
            if (response.error == 200) {
                toastr.success(response.message);
                location.reload()
            } else {
                toastr.error(response.message);
            }
        }
    });
}

/* Fill auto address with zipCode */
function getAddressData(apiUrl, targetProvince, targetCity, targetAddress) {
    $.ajax({
        url: apiUrl,
        dataType: "jsonp",
    })
        .done((data) => {
            if (data.results) {
                setData(data.results[0], targetProvince, targetCity, targetAddress);
            } else {
                alert("該当データが見つかりません");
            }
        })
        .fail((data) => {
            alert("通信に失敗しました");
        });
}

function setData(data, province, city, address) {
    $(province).val(data.address1);
    $(city).val(data.address2);
    $(address).val(data.address3);
}

// Show or hiden submenu
function toggleSubmenu(event) {
    var submenu = event.target.closest('li');

    var url = submenu.getAttribute('data-url');

    if (url) {
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                // Update URL
                window.history.pushState({ path: url }, '', url);

                // Parse response and get body content
                var parser = new DOMParser();
                var doc = parser.parseFromString(response, 'text/html');
                var portletContent = doc.querySelector('.kt-content').outerHTML;

                // Update page content
                $('#kt_content').html(portletContent);

                // Get all scripts in the document
                var scriptContents = doc.querySelectorAll('script');

                // Filter scripts that contain "DataTable" and "#example"
                var scriptsToExecute = Array.from(scriptContents).filter(function (script) {
                    return script.textContent.includes('DataTable') && script.textContent.includes('#example');
                });

                // Execute the filtered scripts
                scriptsToExecute.forEach(function (scriptContent) {
                    try {
                        // Using new Function() to execute the script safely
                        new Function(scriptContent.textContent)();
                    } catch (error) {
                        //
                    }
                });

                // Remove the 'highlight'class and add the 'highlight'class icon
                $('.kt-menu__item').removeClass('highlight');
                submenu.classList.add('highlight');

                // Remove the 'highlight' class and add the 'highlight'class into span
                $('.kt-menu__item span').removeClass('highlight');
                $(submenu).find('.kt-menu__link-text').addClass('highlight');

                //init
                KTBootstrapNotifyDemo.init();
            },
            error: function (xhr, status, error) {
                //
            }
        });
    }

}

document.addEventListener("DOMContentLoaded", function () {
    setupMenuToggle();

    const currentURL = window.location.pathname;
    const baseURL = currentURL.match(/^\/admin\/[^\/]+/)?.[0];

    if (!baseURL) return;

    let matchedItem = null;
    let maxLength = 0;

    document.querySelectorAll(".kt-menu__item[data-url]").forEach(item => {
        const itemURL = item.getAttribute("data-url");
        if (itemURL.endsWith(baseURL) && itemURL.length > maxLength) {
            matchedItem = item;
            maxLength = itemURL.length;
        }
    });

    if (!matchedItem) return;

    matchedItem.closest(".kt-menu__item--submenu")?.classList.add("kt-menu__item--open");
    matchedItem.classList.add("highlight");
    matchedItem.querySelector(".kt-menu__link-text")?.classList.add("highlight");
});

// Add event into menu
function setupMenuToggle() {
    var toggleMenus = document.querySelectorAll('.kt-menu__submenu');

    toggleMenus.forEach(function (menu) {
        menu.addEventListener('click', toggleSubmenu);
    });
}

// Setting event toggleSubmenu
document.addEventListener('DOMContentLoaded', function () {
    setupMenuToggle();
});

window.onload = function () {
    editorCustom();
    $('.status').select2({
        language: {
            noResults: function () {
                return "該当する情報は見つかりません。";
            }
        }
    });

    $(document).on("click", ".btn-remove-block", function (e) {
        if (!confirm("削除してもよろしいですか？")) {
            return false;
        }
        $(this).closest("div.ui-menu").remove();
        updateTagnew();
    });

    $(document).on('click', '.btn-remove-level1', function(e) {
        if (!confirm("削除してもよろしいですか？")) {
            return false;
        }
        $(this).closest("div.card .level1").remove();
        updateTagnew();
    })

    $(document).on('click', 'ul.dropdown-line-height li a', function(e) {
        $('ul.dropdown-line-height li a').removeClass('checked');
        $(this).addClass('checked');
    })

    $(document).on("click", ".delete-action", function () {
        var id = $(this).attr("data-id");
        var $tr = $(this).closest('tr');
        var action = $("#form-delete-" + id).attr("action");
        var token = $("input[name=_token]").val();
        swal.fire({
            title: "本当に大丈夫ですか？",
            text: "データを復元することはできません！",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "はい、削除してください！",
            cancelButtonText: "キャンセル",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: action,
                    method: "DELETE",
                    data: {
                        _token: token,
                    }
                }).done(function (response) {
                    swal.fire(
                        "終わり！",
                        "無事削除されました！",
                        "success",
                    );
                    $tr.fadeOut(function(){
                        $(this).remove();
                        if(typeof dataTable !== "undefined"){
                            dataTable.draw();
                        }
                    });
                }).fail(function () {
                    swal.fire(
                        "削除中にエラーが発生しました!",
                        "もう一度お試しください",
                        "error"
                    );
                });
            }
        });
    });

    $("#btn-zip").on("click", () => {
        getAddressData(
            "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" + $("#postcode").val(),
            "#province",
            "#city",
            "#address"
        );
    });
}

