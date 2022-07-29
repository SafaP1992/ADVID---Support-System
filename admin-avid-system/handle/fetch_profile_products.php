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
        <link rel="stylesheet" href="ajax/DateP/js-persian-cal.css" />
        <link rel="stylesheet" href="../../assets/css/style.css">

        <title>سیستم تیکت آوید - محصولات </title>
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
                    <a class="nav-link" href="fetch_profile_invoices.php">
                        <i class="fas fa-clipboard-check"></i>
                        فاکتورها
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fa fa-box"></i>
                        محصولات
                    </a>
                </li>
            </ul>

            <div class="row">
                <div class="col-xl-12 mt-3">

                    <div class="col-12 float-left text-left">
                        <button class="btn btn-primary btn-handle" id="add_product">+ افزودن محصول</button>
                    </div>


                    <span id="error_message" class="text-danger"></span>

                    <div class="row" id="add_p">
                        <div class="form-group col-md-3">
                            <label for="txtnameproduct">نام محصول</label>
                            <input type="text" class="form-control" name="txtnameproduct" id="txtnameproduct">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtagreementproduct">شماره قرار داد</label>
                            <input type="text" class="form-control" name="txtagreementproduct" id="txtagreementproduct">
                        </div>
                        <div class="col-md-3">
                            <label for="txtstartproduct">شروع فعالیت</label>
                            <input type="text" class="" name="txtstartproduct" id="txtstartproduct">
                        </div>
                        <div class="col-md-3">
                            <label for="txtendproduct">خاتمه فعالیت</label>
                            <input type="text" class="" name="txtendproduct" id="txtendproduct">
                        </div>

                        <div class="form-group col-12 text-center">
                            <input type="submit" class="btn btn-primary btn-handle" name="register_product" id="register_product" value="ثبت محصول">
                            <input type="submit" class="btn btn-primary btn-handle" name="cancel" id="cancel" value="لغو">
                        </div>

                    </div>

                    <table id="user-list" class="table table-bordered display celled ui" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام محصول</th>
                                <th>شماره قرارداد</th>
                                <th>شروع فعالیت</th>
                                <th>خاتمه فعالیت</th>
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
        <script type="text/javascript" src="ajax/DateP/js-persian-cal.min.js"></script>

        <script type="text/javascript">
            sessionStorage.flagID = -1;
            user_id = sessionStorage.IDuser;

            var objCal1 = new AMIB.persianCalendar('txtstartproduct', {
                extraInputID: 'txtstartproduct',
                extraInputFormat: 'yyyy/mm/dd'
            });
            var objCal2 = new AMIB.persianCalendar('txtendproduct', {
                extraInputID: 'txtendproduct',
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


            load_user_products();

            function load_user_products() {
                user_id = sessionStorage.IDuser;
                $.ajax({
                    url: "ajax/fetch_users_profile_products_ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        get_product: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        $('#table_index').html(data);
                        list();
                    }
                })
            }

            $("#add_p").slideUp("fast");

            $('#add_product').click(function() {
                // $('#add_u').html(str);
                $("#txtnameproduct").val('');
                $("#txtagreementproduct").val('');
                $("#txtstartproduct").val('');
                $("#txtendproduct").val('');
                $('#register_product').val('ثبت محصول');
                sessionStorage.flagID = -1;
                $("#add_p").slideToggle("fast");
            });

            $('#cancel').click(function() {
                $("#add_p").slideUp();
                $("#txtnameproduct").val('');
                $("#txtagreementproduct").val('');
                $("#txtstartproduct").val('');
                $("#txtendproduct").val('');
                $("#add_p").slideUp("fast");
                $('#register_product').val('ثبت محصول');
                sessionStorage.flagID = -1;
                $("#error_message").html('');
            });


            $('#register_product').click(function() {
                user_id = sessionStorage.IDuser;
                var name_product = $("#txtnameproduct").val();
                var agreement_product = $("#txtagreementproduct").val();
                var startdate_product = $("#txtstartproduct").val();
                var enddate_product = $("#txtendproduct").val();


                if ($("#txtnameproduct").val() == '') {
                    $("#error_message").html('اسم محصول را وارد نمایید!');
                    return;
                } else if ($("#txtagreementproduct").val() == '') {
                    $("#error_message").html('شماره قرارداد را بنویسید!');
                    return;
                } else if ($("#txtstartproduct").val() == '' && $("#txtendproduct").val() == '') {
                    $("#error_message").html('شروع و خاتمه فعالیت را مشخص نمایید!');
                    return;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        data: {
                            add_edit_product: -1,
                            flag: sessionStorage.flagID,
                            user_id: user_id,
                            name_product: name_product,
                            agreement_product: agreement_product,
                            startdate_product: startdate_product,
                            enddate_product: enddate_product,
                        },
                        beforeSend: function() {
                            $('#error_message').html('<br /><label class="text-primary">در حال ثبت کردن...</label>');
                        },
                        success: function(data) {
                            $("#txtnameproduct").val('');
                            $("#txtagreementproduct").val('');
                            $("#txtstartproduct").val('');
                            $("#txtendproduct").val('');
                            $("#add_p").slideUp("fast");
                            $('#register_product').val('ثبت محصول');
                            sessionStorage.flagID = -1;
                            table.destroy();
                            $("#error_message").html('');
                            load_user_products();
                        }
                    });
                }


            });




            $(document).on('click', '.edit-product', function() {
                var product_id = $(this).attr("id");
                sessionStorage.flagID = product_id;
                // alert(sessionStorage.flagID);
                // $("#txtnameproduct").val($('.nameproduct').data('nameproduct'));
                // $("#txtagreementproduct").val($('.agreementproduct').data('agreementproduct'));
                // $("#txtstartproduct").val($('.startproduct').data('startproduct'));
                // $("#txtendproduct").val($('.endproduct').data('endproduct'));
                $.ajax({
                    type: "POST",
                    url: "ajax/fetch_users_profile_products_ajax.php",
                    data: {
                        edit_product: -1,
                        flag: sessionStorage.flagID
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#txtnameproduct").val(data.ProductName);
                        $("#txtagreementproduct").val(data.AgreementProduct);
                        $("#txtstartproduct").val(data.StartDateProductActivity);
                        $("#txtendproduct").val(data.EndDateProductActivity);
                        $('#register_product').val('تغییر');
                    }
                });

                $("#add_p").slideDown("fast");

            });
            
            






            $(document).on('click', '.del-product', function() {
                var product_id = $(this).attr("id");
                var product_id_slice = product_id.slice(3);
                var r = confirm("آیا میخواهید حذف کنید!");
                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_profile_products_ajax.php",
                        data: {
                            del_product: -1,
                            flag: product_id_slice
                        },
                        success: function(data) {
                            // alert(alert);
                            sessionStorage.flagID = -1;
                            table.destroy();
                            $("#error_message").html('');
                            load_user_products();
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
        </script>

    </body>

    </html>


<?php
}
?>