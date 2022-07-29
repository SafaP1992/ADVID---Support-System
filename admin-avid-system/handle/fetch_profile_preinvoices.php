<?php
include('../server.php');

if (empty($_SESSION['vcrUsernameAdmin'])) {
    header("location:index.php");
} else {
    ?>


    <!DOCTYPE html>
    <html lang="">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../assets/css/fontawesome-all.css">
        <link rel="stylesheet" href="../../assets/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="ajax/DateP/js-persian-cal.css" />
        <link rel="stylesheet" href="../../assets/css/style.css">

        <title>سیستم تیکت آوید - پیش فاکتورها </title>
    </head>

    <body>

        <div class="container-fluid mt-2">

            <div class="row">
                <div class="col-12">
                    <h4 class="linetext txtname m-2"></h4>
                </div>
            </div>

            <ul class="nav nav-pills nav-justified px-4 pb-4">
                <li class="nav-item">
                    <a class="nav-link" href="users_profile.php">
                        <i class="fa fa-user"></i>
                        مشخصات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fetch_profile_details.php">
                        <i class="fa fa-box"></i>
                        اطلاعات تکمیلی مربوط به نماد الکترونیکی
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fa fa-clipboard-list"></i>
                        پیش فاکتورها
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fetch_profile_invoices.php">
                        <i class="fas fa-clipboard-check"></i>
                        فاکتورها
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fetch_profile_products.php">
                        <i class="fa fa-box"></i>
                        محصولات
                    </a>
                </li>
            </ul>

            <div class="row">
                <div class="col-xl-12 mt-3">

                    <div class="col-12 text-left">
                        <button class="btn btn-primary btn-handle" id="add_preinvoice">+ افزودن پیش فاکتور</button>
                    </div>


                    <span id="error_message" class="text-danger"></span>
                    <form method="POST" action="fetch_profile_preinvoices.php" id="preinvoice_form" enctype="multipart/form-data">
                        <div class="row" id="add_i">
                            <div class="col-md-4">
                                <label for="txtdate_preinvoice">تاریخ</label>
                                <input type="text" class="" name="txtdate_preinvoice" id="txtdate_preinvoice">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtnameexpert">کارشناس</label>
                                <input type="text" class="form-control" name="txtnameexpert" id="txtnameexpert">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtpreinvoice_file">پیش فاکتور</label>
                                <!-- <input type="text" class="form-control" name="txtpreinvoice_file" id="txtpreinvoice_file"> -->
                                <input type="file" class="form-control" id="txtpreinvoice_file" name="txtpreinvoice_file">

                            </div>
                            <!-- <div class="col-md-3">
                            <label for="txtconfirmation">تائید/عدم تائید</label>
                            <input type="text" class="form-control" name="txtconfirmation" id="txtconfirmation">
                        </div> -->
                            <div class="col-md-12">
                                <label for="txtdescribtion">توضیحات</label>
                                <textarea type="text" class="form-control" name="txtdescribtion" id="txtdescribtion"></textarea>
                            </div>

                            <div class="form-group col-12 text-center">
                                <input type="submit" class="btn btn-primary btn-handle" name="register_preinvoice" id="register_preinvoice" value="ذخیره">
                                <!-- <input type="submit" class="btn btn-primary btn-handle" name="cancel" id="cancel" value="لغو"> -->
                            </div>

                        </div>
                    </form>

                    <table id="user-list" class="table table-bordered display celled ui" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>تاریخ صدور</th>
                                <th>کارشناس</th>
                                <th>پیش فاکتور</th>
                                <th>تائید/عدم تائید</th>
                                <th>تاریخ تائید</th>
                                <th>وضعیت مشاهده</th>
                                <th>توضیحات</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table_index">

                        </tbody>
                    </table>

                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="text-left">
                        <a class="btn btn-primary text-left" href="fetch-users.php">بازگشت</a>
                    </div>
                </div>
            </div>


        </div>


        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="ajax/DateP/js-persian-cal.min.js"></script>

        <script type="text/javascript">
            sessionStorage.flagID = -1;
            user_id = sessionStorage.IDuser;

            var objCal1 = new AMIB.persianCalendar('txtdate_preinvoice', {
                extraInputID: 'txtdate_preinvoice',
                extraInputFormat: 'yyyy/mm/dd'
            });


            load_user_profile();

            function load_user_profile() {
                user_id = sessionStorage.IDuser;
                $.ajax({
                    url: "ajax/fetch-users-profile-ajax.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        get_user: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        $('.txtname').html('<span>' + data.FNameUser + '</span');
                    }
                })
            }




            function load_pdf_img() {
                // Preview of Images
                $('[data-fancybox="gallery"]').fancybox({
                    smallBtn: true,
                    toolbar: false,
                    closeExisting: false,
                    loop: false,
                    keyboard: false,
                    arrows: false,
                    infobar: false,
                    type: 'iframe',
                    iframe: {
                        preload: false // fixes issue with iframe and IE
                    },
                    // openEffect: 'elastic',
                    // closeEffect: 'elastic',
                    // autoSize: true,
                });
            }

            load_pre_invoice();

            function load_pre_invoice() {
                $.ajax({
                    url: "ajax/fetch_users_profile_products_ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        get_pre_invoice: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        // alert(data);
                        $('#table_index').html(data);
                        load_pdf_img();
                        list();
                    }
                })
            }

            $("#add_i").slideUp("fast");

            $('#add_preinvoice').click(function() {
                $("#txtdate_preinvoice").val('');
                $("#txtnameexpert").val('');
                $("#txtpreinvoice_file").val('');
                $("#txtdescribtion").val('');
                $('#register_preinvoice').val('ذخیره');
                sessionStorage.flagID = -1;
                $("#add_i").slideToggle("fast");
                $("#txtpreinvoice_file").prop("disabled", false);
                $("#error_message").html('');
            });

            $('#cancel').click(function() {
                $("#txtdate_preinvoice").val('');
                $("#txtnameexpert").val('');
                $("#txtpreinvoice_file").val('');
                $("#txtdescribtion").val('');
                $('#register_preinvoice').val('ذخیره');
                sessionStorage.flagID = -1;
                $("#add_i").slideUp("slow");
                $("#txtpreinvoice_file").prop("disabled", false);
                $("#error_message").html('');
            });














            // $('#register_preinvoice').click(function(event) {
            $('#preinvoice_form').on('submit', function(event) {
                event.preventDefault();

                user_id = sessionStorage.IDuser;
                var date_preinvoice = $("#txtdate_preinvoice").val();
                var name_expert = $("#txtnameexpert").val();
                var file = $("#txtpreinvoice_file").val();
                var describtion = $("#txtdescribtion").val();

                if ($('#txtpreinvoice_file').val() != '') {
                    var name = $("#txtpreinvoice_file").val();
                    var ext = name.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['doc','docx', 'pdf', 'jpg', 'jpeg']) == -1) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فقط فایل های، jpg, jpeg, doc, docx, pdf معتبر است.</label>');
                        return false;
                    }
                    var f = $('#txtpreinvoice_file')[0].files[0];
                    if (f.size > 20000000) {
                        // alert(f.size || f.fileSize);
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فایل باید کمتر از 5 مگابایت باشد.</label>');
                        return false;
                    } else {
                        $('#error_message').html('<br /><label class="text-danger"></label>');
                    }
                }

                if ($("#txtdate_preinvoice").val() == '') {
                    $("#error_message").html('تاریخ را مشخص نمائید!');
                    return;
                } else if ($("#txtnameexpert").val() == '') {
                    $("#error_message").html('نام کارشناس را بنویسید!');
                    return false;
                    // } else if ($("#txtpreinvoice_file").val() == '') {
                    //     $("#error_message").html('فایل پیش فاکتور را انتخاب کنید!');
                    //     return;
                } else {

                    var form_data = new FormData(this);

                    form_data.append('add_edit_preinvoice', -1);
                    form_data.append('flag', sessionStorage.flagID);
                    form_data.append('user_id', user_id);
                    form_data.append('date_preinvoice', date_preinvoice);
                    form_data.append('name_expert', name_expert);
                    form_data.append('file', file);
                    form_data.append('describtion', describtion);

                    $.ajax({
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        method: "POST",
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: form_data,
                        beforeSend: function() {
                            $('#error_message').html('<br /><label class="text-primary">در حال آپلود کردن...</label>');
                        },
                        success: function(data) {
                            // alert(data);
                            // return;
                            $("#txtdate_preinvoice").val('');
                            $("#txtnameexpert").val('');
                            $("#txtpreinvoice_file").val('');
                            $("#txtdescribtion").val('');
                            $("#add_i").slideUp("fast");
                            $('#register_preinvoice').val('ذخیره');
                            sessionStorage.flagID = -1;
                            table.destroy();
                            load_pre_invoice();
                            $("#error_message").html('');
                            $('#preinvoice_form')[0].reset();
                        }
                    });
                }

            });


            $(document).on('click', '.confirmation', function() {
                user_id = sessionStorage.IDuser;
                var preinvoice_id = $(this).attr("id");
                sessionStorage.flagID = preinvoice_id.replace('id-', '');

                var confirmation = $(this).val(); //$(this).val();
                // var confirmation = $('input:checkbox[name=confirmation]').val(); //$(this).val();
                // $("input:checkbox[name=confirmation][value]").prop('checked', true);

                if (confirmation == 0) {
                    confirmation = 1;
                    var r = confirm("آیا این فاکتور تائید شود؟");
                } else if (confirmation == 1) {
                    confirmation = 0;
                    var r = confirm("آیا این فاکتور عدم تائید شود؟");
                }
                // alert(confirmation);
                // return;

                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        data: {
                            add_edit_preinvoice: -1,
                            flag: sessionStorage.flagID,
                            user_id: user_id,
                            confirmation: confirmation
                        },
                        success: function(data) {
                            // alert(data);
                            sessionStorage.flagID = -1;
                            table.destroy();
                            load_pre_invoice();
                        }
                    });
                }

            });
















            $(document).on('click', '.edit-preinvoice', function() {
                user_id = sessionStorage.IDuser;
                var preinvoice_id = $(this).attr("id");
                sessionStorage.flagID = preinvoice_id;
                $("#txtdate_preinvoice").val('Del');
                // alert(sessionStorage.flagID);
                var r = confirm("آیا میخواهید حذف شود!");
                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        data: {
                            del_preinvoice: -1,
                            user_id: user_id,
                            flag: sessionStorage.flagID
                        },
                        // dataType: "json",
                        success: function(data) {
                            // alert(data);
                            // $("#txtdate_preinvoice").val(data.PreInvoiceDate);
                            // $("#txtnameexpert").val(data.PreInvoiceExpert);
                            // $("#txtdescribtion").val(data.PreInvoiceDescription);
                            // $("#txtpreinvoice_file").prop("disabled", true);
                            // // $("#txtconfirmation").val(data.PreInvoiceConfirmation);
                            // $('#register_preinvoice').val('حذف');
                            sessionStorage.flagID = -1;
                            table.destroy();
                            load_pre_invoice();
                        }
                    });
                } else {
                    txt = "You pressed Cancel!";
                    // alert('cancel');
                }

            });






            function list() {
                table = $('#user-list').DataTable({
                    "oLanguage": {
                        "sSearch": "جستجو",
                        "sLengthMenu": "تعداد نمایش صفحه _MENU_",
                        "sZeroRecords": "متاسفانه اطلاعاتی موجود نیست!",
                        "sInfo": "نمایش صفحه _PAGE_ از _PAGES_",
                        "sInfoEmpty": "هیچ صفحه ای در دسترس نیست!",
                        "oPaginate": {
                            "sPrevious": "قبلی",
                            "sNext": "بعدی",
                        }
                    }
                });
            }
            
            
            
            
            
            
            
            
            
            
        $(document).on('click', '.info-description-img', function() {
            var invoice_id = $(this).attr("id");
            var invoice_id_slice = invoice_id.slice(3);
            // alert(invoice_id_slice);
            $.ajax({
                method: "POST",
                url: "ajax/fetch_invoices_ajax.php",
                data: {
                    display_describtion_pre: -1,
                    invoice_id: invoice_id_slice
                },
                success: function(data) {}
            })
        });

            
            
            
        </script>

    </body>

    </html>



<?php
}
?>