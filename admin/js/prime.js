$(document).ajaxStart(function () { Pace.restart(); });
$('.login-form').submit(function (event) {
    event.preventDefault();
    loginRequest();
});
var portal_api="<portal_api>";
function ajaxUpload(url, params, onSuccess) {
    showLoader();
    $.ajax({
        url: url,
        type: 'POST',
        data: params,
        //datatype: 'json',
        contentType: false,
        processData: false,
        headers: {
            "token": getCookie('usr_token')
        }
    })
        .done(function (data) {
            //Check Dialog and Auto Redirect
            if (typeof data.response === 'object' && data.response !== null) {
                checkResponse(data.response);
            }
            hideLoader();
            onSuccess(data);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            hideLoader();
            //alert('Ajax Error Status : '+textStatus+' & err : '+errorThrown);
        }
        );
}

function ajaxPost(url, params, onSuccess) {
    showLoader();
    $.ajax({
        url: url,
        type: 'POST',
        data: params,
        datatype: 'json',
        headers: {
            "token": getCookie('usr_token')
        }
    })
        .done(function (data) {
            //Check Dialog and Auto Redirect
            if (typeof data.response === 'object' && data.response !== null) {
                checkResponse(data.response);
            }
            hideLoader();
            onSuccess(data);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            hideLoader();
            //alert('Ajax Error Status : '+textStatus+' & err : '+errorThrown);
        }
        );
}

function ajaxGet(url, onSuccess) {
    showLoader();
    $.ajax({
        url: url,
        type: 'GET',
        datatype: 'json',
        headers: {
            "token": getCookie('usr_token')
        }
    })
        .done(function (data) {
            //Check Dialog and Auto Redirect
            if (typeof data.response === 'object' && data.response !== null) {
                checkResponse(data.response);
            }
            hideLoader();
            onSuccess(data);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            hideLoader();
            //alert('Ajax Error Status : '+textStatus+' & err : '+errorThrown);
        }
        );
}

function showLoader() {
    $('.page-wrapper').addClass('blur-body');
    $('.full-loader').fadeIn();
}

function hideLoader() {
    $('.page-wrapper').removeClass('blur-body');
    $('.full-loader').fadeOut();
}

function getPageID() {
    var full_url = top.location.href;
    var arr = full_url.split('?');
    arr = (arr[0]).split('/');
    var page_id = arr[(arr.length - 1)];
    return page_id;
}

//Elements
var main_section = $('.prime-panel-main-section');
var grid_element = '<div class="col-xl-3 prime prime-grid-panel">' + $('.prime-grid-panel').html() + '</div>';
var grid_btn_element = '<a href="#url#" class="col-xl-2 prime prime-grid-btn-panel" style="background-color:#color#">' + $('.prime-grid-btn-panel').html() + '</a>';
var list_element = '<div class="col-xl-12 prime prime-list-panel #list_id#">' + $('.prime-list-panel').html() + '</div>';
var form_element = '<div class="col-xl-12 prime prime-form-panel">' + $('.prime-form-panel').html() + '</div>';

function loadMenu() {
    ajaxPost('<portal_api>getMenu', null, function (data) {
        var menu = data.data.menus;
        var admin_info = data.data.admin_info;
        menu.forEach(element => {

            var title=element.title;

            if(title.indexOf('(')>0){
                var title_arr=title.split('(');

                var title1=title_arr[0];
                var title2=title_arr[1].replace(')', '');

                title=title1+'<span class="menu_number_amount">'+title2+'</span>';

            }

            $('.portal-menu').append('<a href="' + element.url + '" title="' + element.title + '" class="menu_id_' + element.url + '"><i class="fal fa-chevron-left"></i><span class="nav-link-text">' + title + '</span></a>');
        });

        //Load Admin Info
        $('.admin-full-name').html(admin_info.fullname);
        $('.admin-desc').html(admin_info.desc);
        $('.admin-background-image').attr('src', admin_info.image);
        $('.admin-profile-image').attr('src', admin_info.profile_image);


    });
    setTimeout(function () {
        $(('.menu_id_' + getPageID())).addClass('active_nav');
    }, 1000);
}

function loaderInit() {
    var pageID = getPageID();
    var query_string = "";
    var fullurl = top.location.href;

    query_string = fullurl.split('?');
    if (query_string[1] == undefined) {
        query_string = '';
    } else {
        query_string = '?' + query_string[1];
    }

    ajaxGet('<portal_api>page/' + pageID + query_string, function (data) {
        if (data.data != null) {
            var page_title = data.data.title;
            var page_sections = data.data.sections;

            //Set Page Title
            $('.prime-panel-page-title').html(page_title);
            $(document).prop('title', page_title);

            //Empty Main Section
            $('.prime-panel-main-section').html('');

            //Sections
            page_sections.forEach(element => {
                switch (element.type) {
                    case 'grid':
                        _initGrid(element);
                        break;
                    case 'grid_btn':
                        _initGridBtn(element);
                        break;
                    case 'list':
                        _initList(element);
                        break;
                    case 'form':
                        _initForm(element);
                        break;
                    default:
                        break;
                }
            });

            _afterLoad();


        }
    });
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function _afterLoad() {
    checkManagementLinks();
    checkSelectedPage();
    setTimeout(function () {
        $(".editor").Editor();
        $(".Editor-editor").html($(".editor").val());
        var price_element=$( "input[name*='price']" );
        price_element.each(function(index, obj)
        {
            $(this).val(numberWithCommas($(this).val()));
            $(this).focus(function() {
                $(this).val($(this).val().replace(/,/g, ''));
            });
            $(this).blur(function() {
                $(this).val(numberWithCommas($(this).val()));
            });
        });

    }, 1200);
}

function _initGrid(section) {
    var grid_content = section.data;
    grid_content.forEach(element => {
        var html = grid_element;
        html = html.replace('#title#', element.title);
        html = html.replace('#data#', element.data);
        main_section.append(html);
    });
}
function _initGridBtn(section) {
    var colors_arr = ['#1a64bf', '#0f51a2', '#225594', '#134aaf', '#1a64bf', '#0f51a2', '#225594', '#134aaf', '#1a64bf', '#0f51a2', '#225594', '#134aaf'];

    var grid_btn_content = section.data;
    var num = 0;
    grid_btn_content.forEach(element => {
        var html = grid_btn_element;
        html = html.replace('#title#', element.title);
        html = html.replace('#url#', element.url);
        html = html.replace('#color#', colors_arr[num]);
        main_section.append(html);
        num++;
    });
}

function _initList(section) {
    var list_content = section.data;
    var total_count = section.total_count;
    var list_id = "list_" + getRandomInt(1, 999999999);
    var list_data_html = "Test";
    var html = list_element;
    html = html.replace('#title#', section.title);
    html = html.replace('#data#', list_data_html);
    html = html.replace('#list_id#', list_id);
    main_section.append(html);
    var num = 1;
    list_content.forEach(element => {
        if (element.type == 'list-header') {
            (element.data).forEach(element2 => {
                $('.' + list_id + ' thead tr').append("<td>" + element2 + "</td>");
            });

        } else {
            $('.' + list_id + ' tbody').append("<tr class='" + list_id + "_row_" + num + " prime-table-row'></tr>");
            (element.data).forEach(element2 => {


                //Check For Image Contet
                if(element2.startsWith('image:')){
                    element2=element2.replace('image:', '');
                    element2='<img class="prime_table_inline_img" src="'+element2+'" />';
                }

                $('.' + list_id + '_row_' + num).append("<td>" + element2 + "</td>");
            });
            //Managment Buttons
            if (element.buttons.length > 0) {
                var buttonsx = "";
                element.buttons.forEach(elementx => {
                    buttonsx = buttonsx + "<a href='" + elementx[1] + "' class='mngmnt-links'>" + elementx[0] + "</a>";
                });
                $('.' + list_id + '_row_' + num).append("<td>" + buttonsx + "</td>");

                //Buttons Header
                if (num == 2) {
                    $('.' + list_id + ' thead tr').append("<td>مدیریت</td>");
                }
            }



        }

        //Check Pagination
        if (list_content.length == num) {
            var pages_count_total = Math.floor((total_count / 20));
            var pages_count = pages_count_total;
            if (pages_count > 10) {
                pages_count = 10;
            }

            var pagination_html = "";

            var numx = 1;
            while (numx < pages_count) {
                pagination_html = pagination_html + "<a href='?page=" + numx + "' class='page_number_" + numx + "'>" + numx + "</a>";
                numx++;
            }

            $('.' + list_id + ' .prime-table-div').append("<div class='pagination-box-div'>" + pagination_html + "</div>");
        }
        num++;
    });
}

function _initForm(section) {

    var form_data = section.form_data.form_data;
    var title = section.title;
    var config = section.form_data.config;
    var form_name = 'prime_form_' + getRandomInt(1, 9999999999);
    var html = form_element + "";

    html = html.replace('#title#', title);
    html = html.replace('#form#', "<form action='" + config.action + "' method='" + config.method + "' name='" + form_name + "' class='prime_form_element " + form_name + "'></form>");

    

    //Create Form
    main_section.append(html);
    var form_elementx = $("." + form_name);

    form_data.forEach(element => {

        if(element.value==null){
            element.value='';
        }

        switch (element.type) {

            case 'input':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><input type='text' name='" + element.name + "' value='" + element.value + "' /></div></div>";
                form_elementx.append(elx);
                break;

            case 'input_readonly':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><input type='text' readonly name='" + element.name + "' value='" + element.value + "' /></div></div>";
                form_elementx.append(elx);
                break;

            case 'hidden':
                var elx = "<input type='hidden' name='" + element.name + "' value='" + element.value + "' />";
                form_elementx.append(elx);
                break;

            case 'textarea':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><textarea type='text' name='" + element.name + "'>" + element.value + "</textarea></div></div>";
                form_elementx.append(elx);
                break;

            case 'editor':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><textarea type='text' name='" + element.name + "' class='editor'>" + element.value + "</textarea></div></div>";
                form_elementx.append(elx);
                break;

            case 'checkbox':
                var checked = '';
                if (element.value == '1') {
                    checked = ' checked';
                }
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><input type='checkbox' name='" + element.name + "' value='1' " + checked + " /></div></div>";
                form_elementx.append(elx);
                break;

            case 'imageupload':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><img class='preview_" + element.name + " image_upload_preview' style='display:none'><div class='file-delete-btn delete_" + element.name + "' style='display:none'>حذف</div><input type='file' class='upload_" + element.name + "' /><input type='hidden' name='" + element.name + "' value='' /></div></div>";
                form_elementx.append(elx);
                imageUploadHandler(element.name, element.value);
                break;

            case 'fileupload':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><div class='preview_file_" + element.name + " file_upload_preview' style='display:none'></div><div class='file-delete-btn  delete_" + element.name + "' style='display:none'>حذف</div><input type='file' class='upload_file_" + element.name + "' /><input type='hidden' name='" + element.name + "' value='' /></div></div>";
                form_elementx.append(elx);
                fileUploadHandler(element.name, element.value);
                break;

            case 'dropdown':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><select style='width:300px' class='select_" + element.name + "' name='" + element.name + "'></select></div></div>";
                form_elementx.append(elx);
                initNormalSelect(element);
                break;

            case 'dropdown_multi':
                var elx = "<div class='row'><div class='col-xl-2 prime-form-lable'>" + element.title + "</div><div class='col-xl-9 prime-form-input'><select style='width:300px' multiple class='select_" + element.name + "' name='" + element.name + "[]'></select></div></div>";
                form_elementx.append(elx);
                initMultiSelect(element);
                break;

            case 'submit_button':
                var elx = "<div class='row'><div class='col-xl-12 prime-form-input submit_div'><button class='prime_submit_btn' type='submit'>" + element.title + "</button></button></div></div>";
                form_elementx.append(elx);
                initFormSubmit(form_name);
                break;

            case 'html_raw':
                var elx = "<div class='row'><div class='col-xl-12 prime-form-input'>" + element.title + "</div></div>";
                form_elementx.append(elx);
                break;


            default:
                break;
        }
    });

}



function initFormSubmit(formName){
var element=$("." + formName);
var action='<portal_api>'+element.attr('action');
element.submit(function(e) {

    //prevent Default functionality
    e.preventDefault();

    if(confirm('آیا مایل به ارسال اطلاعات هستید؟')){
        element.find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);
        $(".editor").val($(".Editor-editor").html());

        var price_element=$( "input[name*='price']" );
        price_element.each(function(index, obj)
        {
            $(this).val($(this).val().replace(/,/g, ''));
        });

        if(element.attr('method')=='POST'){
            ajaxPost(action, element.serialize(), function(){
                $("." + formName +" :checkbox[value=0]").attr('value', '1').prop('checked', false);
                price_element.each(function(index, obj)
                {
                    $(this).val(numberWithCommas($(this).val()));
                });
            });
        }else if(element.attr('method')=='GET'){
            ajaxGet(action, element.serialize(), function(){
                $("." + formName +" :checkbox[value=0]").attr('value', '1').prop('checked', false);
                price_element.each(function(index, obj)
                {
                    $(this).val(numberWithCommas($(this).val()));
                });
            });
        }

    }
});
}

function initNormalSelect(element) {
    var oparr = element.default_value;
    for (var key in oparr) {
        // check if the property/key is defined in the object itself, not in parent
        if (oparr.hasOwnProperty(key)) {
            var isSelected = false;

            if (element.value.trim() == key.trim()) {
                isSelected = true;
            }
            var o = new Option(oparr[key], key, false, isSelected);

            $(".select_" + element.name).append(o);
        }
    }

    $(".select_" + element.name).chosen({ rtl: true });



}

function initMultiSelect(element) {
    var oparr = element.default_value;
    var valarr = element.value.split(',');
    for (var key in oparr) {
        // check if the property/key is defined in the object itself, not in parent
        if (oparr.hasOwnProperty(key)) {
            var isSelected = false;


            if (valarr.includes(key.trim())) {
                isSelected = true;
            }

            var o = new Option(oparr[key], key, false, isSelected);

            $(".select_" + element.name).append(o);
        }
    }

    $(".select_" + element.name).chosen({ max_selected_options: 15, rtl: true });




}

function imageUploadHandler(element, element_value) {
    var input = $('input[name=' + element + ']');
    var preview = $('.preview_' + element);
    var upload = $('.upload_' + element);
    var deletex = $('.delete_' + element);



    //Check Has Value
    if(element_value.length>4){
        var expld=element_value.split(',');
    
        var v_filename=expld[0];
        var v_url=expld[1];

        if (v_filename.length >4) {

            input.val(v_filename);
            preview.attr('src', v_url);
            preview.slideDown();
            deletex.slideDown();
            deletex.prop("onclick", null).off("click");

        deletex.click(function () {
            if (confirm('آیا مایل به حذف این فایل هستید؟')) {
                ajaxPost('<portal_api>delete-file', 'file_name=' + v_filename, function (data) {
                    if (data.response.status == 200) {
                        preview.slideUp(function () {
                            preview.attr('src', '');
                        });
                        input.val('');
                        upload.val('');
                        deletex.slideUp();
                    }
                });
            }
        });
    }


    
    
    }

    upload.on('change', function () {
        var file_data = upload.get(0).files[0];
        var formData = new FormData();
        formData.append('file_upload', file_data);
        ajaxUpload('<portal_api>image-uploader', formData, function (data) {
            if (data.response.status == 200) {

                input.val(data.data.file_name);
                preview.attr('src', data.data.full_url);
                preview.slideDown();
                deletex.slideDown();
                deletex.prop("onclick", null).off("click");

            }
            deletex.click(function () {
                if (confirm('آیا مایل به حذف این فایل هستید؟')) {
                    ajaxPost('<portal_api>delete-file', 'file_name=' + data.data.file_name, function (data) {
                        if (data.response.status == 200) {
                            preview.slideUp(function () {
                                preview.attr('src', '');
                            });
                            input.val('');
                            upload.val('');
                            deletex.slideUp();
                        }
                    });
                }
            });


        });
    });

}

function fileUploadHandler(element, element_value) {
    var input = $('input[name=' + element + ']');
    var preview = $('.preview_file_' + element);
    var upload = $('.upload_file_' + element);
    var deletex = $('.delete_' + element);
    deletex.prop("onclick", null).off("click");






    //Check Has Value
    if(element_value.length>4){
        var expld=element_value.split(',');
    
        var v_filename=expld[0];
        var v_url=expld[1];

        if (v_filename.length >4) {

            input.val(v_filename);
            preview.html('<a href="' + v_url + '" target="_blank">' + v_filename + '</a>');
            preview.slideDown();
            deletex.slideDown();
            deletex.prop("onclick", null).off("click");

        deletex.click(function () {
            if (confirm('آیا مایل به حذف این فایل هستید؟')) {
                ajaxPost('<portal_api>delete-file', 'file_name=' + v_filename, function (data) {
                    if (data.response.status == 200) {
                        preview.slideUp(function () {
                            preview.html('');
                        });
                        input.val('');
                        upload.val('');
                        deletex.slideUp();
                    }
                });
            }
        });
    }


    
    
    }




    upload.on('change', function () {
        var file_data = upload.get(0).files[0];
        var formData = new FormData();
        formData.append('file_upload', file_data);
        ajaxUpload('<portal_api>file-uploader', formData, function (data) {

            if (data.response.status == 200) {

                input.val(data.data.file_name);
                preview.html('<a href="' + data.data.full_url + '" target="_blank">' + data.data.file_name_org + '</a>');
                preview.slideDown();
                deletex.slideDown();
                deletex.prop("onclick", null).off("click");

            }

            deletex.click(function () {
                if (confirm('آیا مایل به حذف این فایل هستید؟')) {
                    ajaxPost('<portal_api>delete-file', 'file_name=' + data.data.file_name, function (data) {
                        if (data.response.status == 200) {
                            preview.slideUp(function () {
                                preview.html('');
                            });
                            input.val('');
                            upload.val('');
                            deletex.slideUp();
                        }
                    });
                }
            });

        });


    });

}


function checkResponse(response) {
    if (response.show_dialog == true) {
        showError('', response.message);
    }
    if (response.redirect_url.length > 2) {
        setTimeout(function () {
            goToLink(response.redirect_url);
        }, 1000);
    }
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function loginRequest() {
    var username = $('input[name=username]').val();
    var password = $('input[name=password]').val();

    ajaxPost("<portal_api>login", $(".login-form").serialize(), function (data) {
        var is_block = data.data.auth.is_block;
        var is_login_valid = data.data.auth.is_login_valid;
        var token = data.data.auth.token;

        if (is_login_valid == true && is_block == false) {

            //Valid Login
            setCookie('usr_token', token, 15);
            showJustMessage('خوش آمدید', 'ورود با موفقیت انجام پذیرفت');
            setTimeout(function () {
                redirect('<portal_url>dashboard');
            }, 1500);

        } else if (is_login_valid == true && is_block == true) {

            //User Blocked
            showError('خطا', 'اکانت شما توسط مدیریت مسدود شده است.');



        } else {
            //Invalid Login
            showError('خطا', 'اطلاعات وارد شده معتبر نمی باشد');
        }
    });
}


function showError(title, content) {
    $.alert({
        title: title,
        content: content,
        rtl: true,
        closeIcon: true,
        buttons: {
            cancel: {
                text: 'باشه',
                action: function () {
                }
            }
        },
        onClose: function () {
            // before the modal is hidden.
            hideLoader();
        }
    });
}


function showDialog(title, content, onSuccess, onCancel) {
    $.alert({
        title: title,
        content: content,
        rtl: true,
        closeIcon: true,
        buttons: {
            success: {
                text: 'تایید',
                action: function () {
                    onSuccess();
                }
            },
            cancel: {
                text: 'انصراف',
                action: function () {
                    onCancel();
                }
            }
        }
    });
}


function showJustMessage(title, content) {
    $.dialog({
        title: title,
        content: content,
        closeIcon: false,
        rtl: true,
    });
}

function get() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        vars[key] = value;
    });
    return vars;
}

function queryString(data) {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        vars[key] = value;
    });
    return vars;
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}
function redirect(url) {
    goToLink(url);
}

function checkManagementLinks() {
    $('a.mngmnt-links').click(function (e) {
        var href = this.href;
        if (href.indexOf('delete') > 0) {
            e.preventDefault();
            showDialog('تایید حذف', 'آیا فرآیند حذف را تایید می کنید؟', function () {
                goToLink(href);
            }, function () { });
        }
   else if (href.indexOf('ajax') >= 0) {
            e.preventDefault();
            goToLink(href);
        }
    });
}
function goToLink(link) {

    link=link.replace('<api>',portal_api);

    if (link.startsWith('ajax:')) {
        //Load Ajax Call
        ajaxPost(link.replace('ajax:', ''), '', function () { });
    } else if (link == 'refresh') {
        top.location.href = top.location.href;
    } else if (link == 'back') {
        top.location.href=document.referrer;
    } else if (link == 'ajax_refresh') {
        loaderInit();
    } else {
        top.location.href = link;
    }
}
function checkSelectedPage() {
    var current_page = get()['page'];
    if (current_page == undefined) {
        $('.page_number_1').addClass('active_page_number');
    }
    if (current_page > 0) {
        $('.page_number_' + current_page).addClass('active_page_number');
    }
}