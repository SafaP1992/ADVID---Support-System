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
                    <h4 class="linetext txtname m-2">اطلاعات دامنه ها</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mt-3">

                    <div class="col-12 float-left text-left">
                        <button class="btn btn-primary btn-handle" id="add_product">+ افزودن دامنه</button>
                    </div>


                    <span id="error_message" class="text-danger"></span>

                    <div class="row" id="add_p">
                        <div class="form-group col-md-3">
                            <label for="txtdomain_name">نام دامنه</label>
                            <input type="text" class="form-control" name="txtdomain_name" id="txtdomain_name" />
                        </div>
                        <div class="col-md-3">
                            <label for="txtbuy_domain_miladi">تاریخ خرید یا تمدید دامنه (به میلادی)</label>
                            <input type="date" class="form-control" name="txtbuy_domain_miladi" id="txtbuy_domain_miladi" />
                        </div>
                        <div class="col-md-3">
                            <label for="txtbuy_host_miladi">تاریخ خرید یا تمدید هاست (به میلادی)</label>
                            <input type="date" class="form-control" name="txtbuy_host_miladi" id="txtbuy_host_miladi" />
                        </div>
                        <div class="col-md-3">
                            <label for="txtexpire_domain_miladi">تاریخ اتمام دامنه (به میلادی)</label>
                            <input type="date" class="form-control" name="txtexpire_domain_miladi" id="txtexpire_domain_miladi" />
                        </div>
                        <div class="col-md-3">
                            <label for="txtexpire_host_miladi">تاریخ اتمام هاست (به میلادی)</label>
                            <input type="date" class="form-control" name="txtexpire_host_miladi" id="txtexpire_host_miladi" />
                        </div>
                        
                        <div class="col-md-3">
                            <label for="txtexpire_domain_shamsi">تاریخ اتمام دامنه (به شمسی)</label>
                            <input type="text" class="" name="txtexpire_domain_shamsi" id="txtexpire_domain_shamsi" />
                        </div>
                        <div class="col-md-3">
                            <label for="txtexpire_host_shamsi">تاریخ اتمام هاست (به شمسی)</label>
                            <input type="text" class="" name="txtexpire_host_shamsi" id="txtexpire_host_shamsi" />
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="txtdomaindescribtion">توضیحات</label>
                            <textarea type="text" class="form-control" name="txtdomaindescribtion" id="txtdomaindescribtion" maxlength="150"></textarea>
                        </div>

                        <div class="form-group col-12 text-center">
                            <input type="submit" class="btn btn-primary btn-handle" name="add_domain" id="add_domain" value="ثبت">
                            <input type="submit" class="btn btn-primary btn-handle" name="cancel" id="cancel" value="لغو">
                        </div>
                        
                    </div>

                    <table id="user-list" class="table table-bordered display celled ui">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام دامنه</th>
                                <th>خرید دامنه (M)</th>
                                <th>خرید هاست (M)</th>
                                <th>اتمام دامنه (M)</th>
                                <th>اتمام هاست (M)</th>
                                <th>اتمام دامنه (S)</th>
                                <th>اتمام هاست (S)</th>
                                <th>توضیحات</th>
                                <th style="width:70px"></th>
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
                        <a class="btn btn-primary text-left" href="../dashboard.php">بازگشت</a>
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

            var objCal1 = new AMIB.persianCalendar('txtexpire_domain_shamsi', {
                extraInputID: 'txtexpire_domain_shamsi',
                extraInputFormat: 'yyyy/mm/dd'
            });
            var objCal2 = new AMIB.persianCalendar('txtexpire_host_shamsi', {
                extraInputID: 'txtexpire_host_shamsi',
                extraInputFormat: 'yyyy/mm/dd'
            });



            loaddomains();
            function loaddomains() {
                $.ajax({
                    url: "ajax/domains_ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        get: -1
                    },
                    success: function(data) {
                        // alert(data);
                        $('#table_index').html(data);
                        list();
                    }
                })
            }




            $("#add_p").slideUp("fast");
            
            $('#add_product').click(function() {
                $("#txtdomain_name").val('');
                $("#txtbuy_domain_miladi").val('');
                $("#txtbuy_host_miladi").val('');
                $("#txtexpire_domain_miladi").val('');
                $("#txtexpire_host_miladi").val('');
                $("#txtexpire_domain_shamsi").val('');
                $("#txtexpire_host_shamsi").val('');
                $("#txtdomaindescribtion").val('');
                $('#add_domain').val('ثبت');
                sessionStorage.flagID = -1;
                $("#add_p").slideToggle("fast");
            });

            $('#cancel').click(function() {
                $("#add_p").slideUp();
                $("#txtdomain_name").val('');
                $("#txtbuy_domain_miladi").val('');
                $("#txtbuy_host_miladi").val('');
                $("#txtexpire_domain_miladi").val('');
                $("#txtexpire_host_miladi").val('');
                $("#txtexpire_domain_shamsi").val('');
                $("#txtexpire_host_shamsi").val('');
                $("#txtdomaindescribtion").val('');
                $("#add_p").slideUp("fast");
                $('#add_domain').val('ثبت');
                sessionStorage.flagID = -1;
                $("#error_message").html('');
            });


            $('#add_domain').click(function() {
                var txtdomain_name = $("#txtdomain_name").val();
                var txtbuy_domain_miladi = $("#txtbuy_domain_miladi").val();
                var txtbuy_host_miladi = $("#txtbuy_host_miladi").val();
                var txtexpire_domain_miladi = $("#txtexpire_domain_miladi").val();
                var txtexpire_host_miladi = $("#txtexpire_host_miladi").val();
                var txtexpire_domain_shamsi = $("#txtexpire_domain_shamsi").val();
                var txtexpire_host_shamsi = $("#txtexpire_host_shamsi").val();
                var txtdomaindescribtion = $("#txtdomaindescribtion").val();

                if ($("#txtdomain_name").val() == '') {
                    $("#error_message").html('نام دامنه را وارد نمایید!');
                    return;
                } else if ($("#txtbuy_domain_miladi").val() == '') {
                    $("#error_message").html('همه تاریخ های شروع و خاتمه را مشخص نمائید!');
                    return;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax/domains_ajax.php",
                        data: {
                            add_edit_domains: -1,
                            flag: sessionStorage.flagID,
                            txtdomain_name: txtdomain_name,
                            txtbuy_domain_miladi: txtbuy_domain_miladi,
                            txtbuy_host_miladi: txtbuy_host_miladi,
                            txtexpire_domain_miladi: txtexpire_domain_miladi,
                            txtexpire_host_miladi: txtexpire_host_miladi,
                            txtexpire_domain_shamsi: txtexpire_domain_shamsi,
                            txtexpire_host_shamsi: txtexpire_host_shamsi,
                            txtdomaindescribtion: txtdomaindescribtion
                        },
                        // beforeSend: function() {
                        //     $('#error_message').html('<br /><label class="text-primary">در حال ثبت کردن...</label>');
                        // },
                        success: function(data) {
                            // alert(data);
                            $("#txtdomain_name").val('');
                            $("#txtbuy_domain_miladi").val('');
                            $("#txtbuy_host_miladi").val('');
                            $("#txtexpire_domain_miladi").val('');
                            $("#txtexpire_host_miladi").val('');
                            $("#txtexpire_domain_shamsi").val('');
                            $("#txtexpire_host_shamsi").val('');
                            $("#txtdomaindescribtion").val('');
                            $("#add_p").slideUp("fast");
                            $("#add_domain").val("ثبت");
                            sessionStorage.flagID = -1;
                            table.destroy();
                            $("#error_message").html('');
                            loaddomains();
                        }
                    });
                }


            });




            $(document).on('click', '.edit', function() {
                var id = $(this).attr("id");
                var id_slice = id.slice(3);
                sessionStorage.flagID = id_slice;
                $.ajax({
                    type: "POST",
                    url: "ajax/domains_ajax.php",
                    data: {
                        edit_showinfo: -1,
                        flag: sessionStorage.flagID
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#txtdomain_name").val(data.DomainName);
                        $("#txtbuy_domain_miladi").val(data.DomainBuy_Domain_Miladi);
                        $("#txtbuy_host_miladi").val(data.DomainBuy_Host_Miladi);
                        $("#txtexpire_domain_miladi").val(data.DomainExpire_Domain_Miladi);
                        $("#txtexpire_host_miladi").val(data.DomainExpire_Host_Miladi);
                        $("#txtexpire_domain_shamsi").val(data.DomainExpire_Domain_Shamsi);
                        $("#txtexpire_host_shamsi").val(data.DomainExpire_Host_Shamsi);
                        $("#txtdomaindescribtion").val(data.DomainDescribtion);
                        $('#add_domain').val('تغییر');
                    }
                });

                $("#add_p").slideDown("fast");
            });
            
            






            $(document).on('click', '.del', function() {
                var id_del = $(this).attr("id");
                var id_del_slice = id_del.slice(5);
                var r = confirm("آیا میخواهید حذف کنید!");
                if (r == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajax/domains_ajax.php",
                        data: {
                            del: -1,
                            flag: id_del_slice
                        },
                        success: function(data) {
                            // alert(alert);
                            sessionStorage.flagID = -1;
                            table.destroy();
                            $("#error_message").html('');
                            loaddomains();
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