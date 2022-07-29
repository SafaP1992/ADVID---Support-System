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

        <title>سیستم تیکت آوید - فاکتورها </title>
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
                    <a class="nav-link" href="fetch_profile_preinvoices.php">
                        <i class="fa fa-clipboard-list"></i>
                        پیش فاکتورها
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
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

                    <div class="col-12 float-left text-left">
                        <button class="btn btn-primary btn-handle" id="add_preinvoice">+ افزودن فاکتور</button>
                    </div>

                    <span id="error_message" class="text-danger"></span>
                    <form method="POST" action="fetch_profile_invoices.php" id="submit_invoice_form" enctype="multipart/form-data">
                        <div class="row" id="add_i">
                            <div class="col-md-4">
                                <label for="txt_entry_date_invoice">تاریخ صدور</label>
                                <input type="text" class="" name="txt_entry_date_invoice" id="txt_entry_date_invoice">
                            </div>
                            <div class="col-md-4">
                                <label for="txtnameexpert">کارشناس</label>
                                <input type="text" class="form-control" name="txtnameexpert" id="txtnameexpert">
                            </div>
                            <div class="col-md-4">
                                <label for="txtdescribtion">توضیحات</label>
                                <input type="text" class="form-control" name="txtdescribtion" id="txtdescribtion">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img_invoice_file">تصویر فاکتور</label>
                                <input type="file" class="form-control" id="img_invoice_file" name="img_invoice_file">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img_agreement_invoice_file">تصویر قرارداد</label>
                                <input type="file" class="form-control" id="img_agreement_invoice_file" name="img_agreement_invoice_file">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img_tax_recieve_invoice_file">تصویر پرداخت</label>
                                <input type="file" class="form-control" id="img_tax_recieve_invoice_file" name="img_tax_recieve_invoice_file">
                            </div>

                            <div class="form-group col-12 text-center">
                                <input type="submit" class="btn btn-primary btn-handle" name="register_invoice" id="register_invoice" value="ذخیره">
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
                                <th>تصاویر</th>
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

            var objCal1 = new AMIB.persianCalendar('txt_entry_date_invoice', {
                extraInputID: 'txt_entry_date_invoice',
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



            load_invoice();

            function load_invoice() {
                $.ajax({
                    url: "ajax/fetch_users_profile_products_ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        get_invoice: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        $('#table_index').html(data);
                        load_pdf_img();
                        list();
                    }
                })
            }




            $("#add_i").slideUp("fast");

            $('#add_preinvoice').click(function() {
                $("#txt_entry_date_invoice").val('');
                $("#txtnameexpert").val('');
                $("#txtdescribtion").val('');
                $("#img_invoice_file").val('');
                $("#img_agreement_invoice_file").val('');
                $("#img_tax_recieve_invoice_file").val('');
                $('#register_invoice').val('ذخیره');
                sessionStorage.flagID = -1;
                $("#add_i").slideToggle("fast");
                // $("#txtpreinvoice_file").prop("disabled", false);
                $("#error_message").html('');
            });

            $('#cancel').click(function() {
                $("#txt_entry_date_invoice").val('');
                $("#txtnameexpert").val('');
                $("#txtdescribtion").val('');
                $("#img_invoice_file").val('');
                $("#img_agreement_invoice_file").val('');
                $("#img_tax_recieve_invoice_file").val('');

                $("#add_i").slideUp("slow");
                $('#register_invoice').val('ذخیره');
                sessionStorage.flagID = -1;
                $("#error_message").html('');
                // $("#txtpreinvoice_file").prop("disabled", false);
            });









            $('#submit_invoice_form').on('submit', function(event) {
                event.preventDefault();

                user_id = sessionStorage.IDuser;
                var date_invoice = $("#txt_entry_date_invoice").val();
                var name_expert = $("#txtnameexpert").val();
                var describtion = $("#txtdescribtion").val();
                var file1 = $("#img_invoice_file").val();
                var file2 = $("#img_agreement_invoice_file").val();
                var file3 = $("#img_tax_recieve_invoice_file").val();


                if ($("#img_invoice_file").val() != '') {
                    var name = $("#img_invoice_file").val();
                    var ext = name.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['doc','docx', 'pdf', 'jpg', 'jpeg']) == -1) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فقط فایل های، jpg, jpeg, doc, docx, pdf معتبر است.</label>');
                        return false;
                    }
                    var f1 = $("#img_invoice_file")[0].files[0];
                    if (f1.size > 5000000) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فایل باید کمتر از 5 مگابایت باشد.</label>');
                        return false;
                    } else {
                        $('#error_message').html('<br /><label class="text-danger"></label>');
                    }
                }
                if ($("#img_agreement_invoice_file").val() != '') {
                    var name = $("#img_agreement_invoice_file").val();
                    var ext = name.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['doc','docx', 'pdf', 'jpg', 'jpeg']) == -1) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فقط فایل های، jpg, jpeg, doc, docx, pdf معتبر است.</label>');
                        return false;
                    }
                    var f2 = $("#img_agreement_invoice_file")[0].files[0];
                    if (f2.size > 5000000) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فایل باید کمتر از 5 مگابایت باشد.</label>');
                        return false;
                    } else {
                        $('#error_message').html('<br /><label class="text-danger"></label>');
                    }
                }
                if ($("#img_tax_recieve_invoice_file").val() != '') {
                    var name = $("#img_tax_recieve_invoice_file").val();
                    var ext = name.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['doc','docx', 'pdf', 'jpg', 'jpeg']) == -1) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فقط فایل های، jpg, jpeg, doc, docx, pdf معتبر است.</label>');
                        return false;
                    }
                    var f3 = $("#img_tax_recieve_invoice_file")[0].files[0];
                    if (f3.size > 5000000) {
                        $('#error_message').html('<br />خطا ! : <label class="text-danger">فایل باید کمتر از 5 مگابایت باشد.</label>');
                        return false;
                    } else {
                        $('#error_message').html('<br /><label class="text-danger"></label>');
                    }
                }


                if ($("#txt_entry_date_invoice").val() == '') {
                    $("#error_message").html('تاریخ صدور را مشخص نمائید!');
                    return;
                } else if ($("#txtnameexpert").val() == '') {
                    $("#error_message").html('نام کارشناس را بنویسید!');
                    return false;
                } else if (file1 == '' && file2 == '' && file3 == '') {
                    $("#error_message").html('فایل را انتخاب کنید!');
                    return;
                } else if ($("#txtdescribtion").val() == '') {
                    $("#error_message").html('متن شرح را بنویسید!');
                    return;
                } else {

                    var form_data = new FormData(this);

                    form_data.append('add_edit_invoice', -1);
                    form_data.append('flag', sessionStorage.flagID);
                    form_data.append('user_id', user_id);
                    form_data.append('date_invoice', date_invoice);
                    form_data.append('name_expert', name_expert);
                    form_data.append('describtion', describtion);
                    form_data.append('file1', file1);
                    form_data.append('file2', file2);
                    form_data.append('file3', file3);

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
                            $("#txt_entry_date_invoice").val('');
                            $("#txtnameexpert").val('');
                            $("#txtdescribtion").val('');
                            // $("#img_invoice_file").val('');
                            // $("#img_agreement_invoice_file").val('');
                            // $("#img_tax_recieve_invoice_file").val('');
                            $("#add_i").slideUp("fast");
                            $('#register_invoice').val('ذخیره');
                            sessionStorage.flagID = -1;
                            table.destroy();
                            load_invoice();
                            $("#error_message").html('');
                            $('#submit_invoice_form')[0].reset();
                        }
                    });
                }

            });


            $(document).on('click', '.edit-invoice', function() {
                var preinvoice_id = $(this).attr("id");
                sessionStorage.flagID = preinvoice_id;
                // alert(sessionStorage.flagID);
                var r = confirm("آیا میخواهید حذف شود!");
                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        data: {
                            del_invoice: -1,
                            flag: sessionStorage.flagID,
                            user_id: user_id
                        },
                        // dataType: "json",
                        success: function(data) {
                            // alert(data);
                            // $("#txtdate_preinvoice").val(data.PreInvoiceDate);
                            // $("#txtnameexpert").val(data.PreInvoiceExpert);
                            // $("#txtdescribtion").val(data.PreInvoiceDescription);
                            // $("#txtpreinvoice_file").prop("disabled", true);
                            // // $("#txtconfirmation").val(data.PreInvoiceConfirmation);
                            // $('#register_invoice').val('تغییر');
                            sessionStorage.flagID = -1;
                            table.destroy();
                            load_invoice();
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
            
            
            
            
            
            
            
            
            
                
            $(document).on('click', '.info-description-img1', function() {
                var invoice_id = $(this).attr("id");
                var invoice_id_slice = invoice_id.slice(4);
                $.ajax({
                    method: "POST",
                    url: "ajax/fetch_invoices_ajax.php",
                    data: {
                        display_describtion: -1,
                        invoice_id: invoice_id_slice
                    },
                    success: function(data) {}
                })
            });
    
            $(document).on('click', '.info-description-img2', function() {
                var invoice_id = $(this).attr("id");
                var invoice_id_slice = invoice_id.slice(4);
                $.ajax({
                    method: "POST",
                    url: "ajax/fetch_invoices_ajax.php",
                    data: {
                        display_describtion: -1,
                        invoice_id: invoice_id_slice
                    },
                    success: function(data) {}
                })
            });
    
            $(document).on('click', '.info-description-img3', function() {
                var invoice_id = $(this).attr("id");
                var invoice_id_slice = invoice_id.slice(4);
                $.ajax({
                    method: "POST",
                    url: "ajax/fetch_invoices_ajax.php",
                    data: {
                        display_describtion: -1,
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