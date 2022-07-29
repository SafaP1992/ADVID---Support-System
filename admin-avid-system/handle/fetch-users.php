<?php
include('../server.php');

if (empty($_SESSION['vcrUsernameAdmin'])) {
    header("location:index.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../assets/css/fontawesome-all.css">
        <link rel="stylesheet" href="../../assets/css/style.css">


        <title>سیستم تیکت آوید - لیست مشتریان</title>
    </head>

    <body>


        <!-- Main -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-12 float-right text-right">
                    <h4 class="linetext m-2">لیست مشتریان</h4>
                </div>

                <div class="col-12 float-left text-left">
                    <button class="btn btn-primary" id="add_user">+ افزودن کاربر</button>
                </div>
            </div>


            <div class="row" id="add_u">

                <span id="error_message" class="text-danger"></span>

                <article class="mx-auto">
                    <!-- Display validation errors -->
                    <?php include('../errors.php'); ?>


                    <div class="form-row">

                        <div class="form-inline col-md-12">
                            <input name="rad_hahighi_hoghoghi" type="radio" value="0" id="radhoghoghi"><label for="radhoghoghi" style="margin-right:5px"> حقوقی </label>
                            <input name="rad_hahighi_hoghoghi" type="radio" value="1" id="radhaghighi" style="margin-right:20px"><label for="radhaghighi" style="margin-right:5px"> حقیقی </label>
                            <!-- <div class="invalid-feedback">
                                لطفا وضعیت حقوقی/حقیقی را مشخص نمائید
                            </div> -->
                        </div>


                        <div class="form-group col-md-3">
                            <label for="txtfirstname">نام</label>
                            <input name="txtfirstname" id="txtfirstname" class="form-control" placeholder="نام" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtlastname"> نام خانوادگی</label>
                            <input name="txtlastname" id="txtlastname" class="form-control" placeholder="نام خانوادگی" type="text">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="txtusername">نام کاربری</label>
                            <input name="txtusername" id="txtusername" class="form-control" placeholder="نام کاربری" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtpassword">رمز عبور</label>
                            <input name="txtpassword" id="txtpassword" class="form-control" placeholder="رمز عبور" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtemail">پست الکترونیک</label>
                            <input name="txtemail" id="txtemail" class="form-control" placeholder="پست الکترونیک" type="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtphone">شماره تماس</label>
                            <input name="txtphone" id="txtphone" class="form-control" placeholder="شماره تماس" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtmobile">شماره موبایل</label>
                            <input name="txtmobile" id="txtmobile" class="form-control" placeholder="شماره موبایل" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtaddress">آدرس</label>
                            <input name="txtaddress" id="txtaddress" class="form-control" placeholder="آدرس" type="text">
                        </div>

                        <div class="form-group col-12 col-sm-6 col-md-3">
                            <label for="txtmap">نقشه</label>
                            <input name="txtmaplat" id="txtmaplat" class="form-control" placeholder="نقشه" type="text">
                        </div>
                        <!-- <div class="form-row col-md-12"> -->
                        <!-- <div class="form-group col-md-3">
                            <input name="txtmaplag" id="txtmaplag" class="form-control" placeholder="عرض" type="text">
                        </div> -->
                        <!-- </div> -->


                        <div class="form-group col-md-12 text-center">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-handle" name="register_user" id="register_user">ثبت کاربر</button>
                                <input type="submit" class="btn btn-primary btn-handle" name="cancel" id="cancel" value="لغو">
                            </div>
                        </div>
                    </div>
                </article>

            </div>


            <div class="row">
                <div class="col-xl-12 mt-3 table-responsive">
                    <table id="user-request" class="table display celled ui dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody id="table_index">

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/dataTables.bootstrap4.min.js"></script>


        <script>
            $(document).ready(function() {

                sessionStorage.flagID = -1;

                var rad_hahighi_hoghoghi = 0;
                $("input[name='rad_hahighi_hoghoghi']").change(function() {
                    var rad_hahighi_hoghoghi = $('input:radio[name=rad_hahighi_hoghoghi]:checked').val();
                    // alert(x);
                    if (rad_hahighi_hoghoghi == '0') {
                        $('#txtlastname').prop("disabled", true);
                    } else if (rad_hahighi_hoghoghi == '1') {
                        $('#txtlastname').prop("disabled", false);
                    }
                });

                load_users();

                function load_users() {
                    $.ajax({
                        url: "ajax/fetch_users_ajax.php",
                        method: "POST",
                        // dataType: "json",
                        data: {
                            get: -1,
                            id: -1,
                            idu: -1
                        },
                        success: function(data) {
                            $('#table_index').html(data);
                            list();
                        }
                    })
                }


                function list() {
                    table = $('#user-request').DataTable({
                        "oLanguage": {
                            "sSearch": "جستجو",
                            "sLengthMenu": "تعداد نمایش صفحه _MENU_",
                            "sZeroRecords": "متاسفانه درخواست موجود نیست!",
                            "sInfo": "نمایش صفحه _PAGE_ از _PAGES_",
                            "sInfoEmpty": "هیچ صفحه ای در دسترس نیست!",
                            "oPaginate": {
                                "sPrevious": "قبلی",
                                "sNext": "بعدی",
                            }
                        }
                    });
                }


                $(document).on('click', '.view_profile', function() {
                    var user_id = $(this).attr("id");
                    sessionStorage.IDuser = user_id;
                    // alert(sessionStorage.IDuser);
                    window.location.href = "users_profile.php";
                });




                $("#add_u").slideUp("fast");

                $('#add_user').click(function() {
                    $('#register_user').val('ثبت کاربر');
                    $("input:radio[name=rad_hahighi_hoghoghi]").prop("checked", false);
                    $("#txtfirstname").val('');
                    $("#txtlastname").val('');
                    $("#txtusername").val('');
                    $("#txtpassword").val('');
                    $("#txtemail").val('');
                    $("#txtphone").val('');
                    $("#txtmobile").val('');
                    $("#txtaddress").val('');
                    $("#txtmaplat").val('');
                    // $("#txtmaplag").val('');
                    sessionStorage.flagID = -1;
                    $("#add_u").slideToggle("fast");
                });

                $('#cancel').click(function() {
                    $("#add_u").slideUp("fast");
                    $("input:radio[name=rad_hahighi_hoghoghi]").prop("checked", false);
                    $("#txtfirstname").val('');
                    $("#txtlastname").val('');
                    $("#txtusername").val('');
                    $("#txtpassword").val('');
                    $("#txtemail").val('');
                    $("#txtphone").val('');
                    $("#txtaddress").val('');
                    $("#txtmobile").val('');
                    $("#txtmaplat").val('');
                    // $("#txtmaplag").val('');
                    $('#register_user').val('ثبت کاربر');
                    sessionStorage.flagID = -1;
                    $("#error_message").html('');
                });


                $('#register_user').click(function() {
                    flag = sessionStorage.flagID;
                    var rad_hahighi_hoghoghi = $('input:radio[name=rad_hahighi_hoghoghi]:checked').val();
                    if (rad_hahighi_hoghoghi == null) {
                        $("#error_message").html('وضعیت حقوقی/حقیقی بودن را مشخص نمایید!');
                        return;
                    } else if ($("#txtfirstname").val() == '') {
                        $("#error_message").html('نام را وارد نمایید!');
                        $("#txtfirstname").focus();
                        return;
                    } else if ($("#txtusername").val() == '') {
                        $("#error_message").html('نام کاربری را بنویسید!');
                        $("#txtusername").focus();
                        return;
                    } else if ($("#txtpassword").val() == '') {
                        $("#error_message").html('رمز عبور را وارد نمایید!');
                        $("#txtpassword").focus();
                        return;
                    } else if ($("#txtemail").val() == '') {
                        $("#error_message").html('ایمیل را مشخص کنید!');
                        $("#txtemail").focus();
                        return;
                    } else if ($("#txtphone").val() == '') {
                        $("#error_message").html('شماره تماس را بنویسید!');
                        $("#txtphone").focus();
                        return;
                    } else if ($("#txtmobile").val() == '') {
                        $("#error_message").html('شماره موبایل را بنویسید!');
                        $("#txtmobile").focus();
                        return;
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "ajax/fetch_users_ajax.php",
                            data: {
                                register_user_edit: -1,
                                flag: flag,
                                rad_hahighi_hoghoghi: rad_hahighi_hoghoghi,
                                txtfirstname: $("#txtfirstname").val(),
                                txtlastname: $("#txtlastname").val(),
                                txtusername: $("#txtusername").val(),
                                txtpassword: $("#txtpassword").val(),
                                txtemail: $("#txtemail").val(),
                                txtphone: $("#txtphone").val(),
                                txtmobile: $("#txtmobile").val(),
                                txtaddress: $("#txtaddress").val(),
                                txtmaplat: $("#txtmaplat").val(),
                                txtmaplag: ''
                            },
                            success: function(data) {
                                $("input:radio[name=rad_hahighi_hoghoghi]").prop("checked", false);
                                rad_hahighi_hoghoghi = 0;
                                $("#txtfirstname").val('');
                                $("#txtlastname").val('');
                                $("#txtusername").val('');
                                $("#txtpassword").val('');
                                $("#txtemail").val('');
                                $("#txtphone").val('');
                                $("#txtmobile").val('');
                                $("#txtaddress").val('');
                                $("#txtmaplat").val('');
                                $("#txtmaplag").val('');
                                $("#add_u").slideUp("fast");
                                $('#register_user').val('ثبت کاربر');
                                sessionStorage.flagID = -1;
                                table.destroy();
                                load_users();
                            }
                        });
                    }
                });

                
                

                $(document).on('click', '.edit-user', function() {
                    var user_id = $(this).attr("id");
                    var slice_user_id = user_id.slice(3);
                    sessionStorage.flagID = slice_user_id;
                    // alert(slice_user_id);
                    $.ajax({
                        type: "POST",
                        url: "ajax/fetch_users_ajax.php",
                        data: {
                            edit_user: -1,
                            flag: sessionStorage.flagID
                        },
                        dataType: "json",
                        success: function(data) {
                            value = data.HoghogiHaghighiUser;
                            $("input:radio[name=rad_hahighi_hoghoghi][value=" + value + "]").prop('checked', true);
                            $("#txtfirstname").val(data.FNameUser);
                            $("#txtlastname").val(data.LNameUser);
                            $("#txtusername").val(data.UsernameUser);
                            $("#txtpassword").val(data.RepeatPasswordUser);
                            $("#txtemail").val(data.EmailUser);
                            $("#txtphone").val(data.PhoneNumberUser);
                            $("#txtmobile").val(data.MobileNumberUser);
                            $("#txtaddress").val(data.AddressUser);
                            $("#txtmaplat").val(data.MapLat);
                            // $("#txtmaplag").val(data.MapLag);
                            $('#register_user').val('تغییر');
                        }
                    });

                    $("#add_u").slideDown("fast");

                });
                
                
                
                $(document).on('click', '.del-user', function() {
                    var user_id = $(this).attr("id");
                    var user_id_slice = user_id.slice(7);
                    var r = confirm("آیا میخواهید این مشتری را حذف کنید؟");
                    if (r == true) {
                        $.ajax({
                            type: "POST",
                            url: "ajax/fetch_users_ajax.php",
                            data: {
                                del_user: -1,
                                flag: user_id_slice
                            },
                            success: function(data) {
                                // alert(data);
                                sessionStorage.flagID = -1;
                                table.destroy();
                                $("#error_message").html('');
                                load_users();
                            }
                        });
                    } else {
                        txt = "You pressed Cancel!";
                        // alert('cancel');
                    }
                });
                
                

            });
        </script>

    </body>

    </html>


<?php
}
?>