<?php
include('../../server.php');

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
        <link rel="stylesheet" href="../../assets/css/style.css">

        <title>سیستم تیکت آوید - تنظیمات </title>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <h4 class="linetext">تنظیمات</h4>
            </div>

            <div class="row mt-2">
                <?php
                    $sql = "SELECT * FROM tbadmin ORDER BY intAdminID DESC";
                    $q = $dbo->prepare($sql);
                    $q->execute();
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                    $number_of_rows = $q->rowCount();

                    if ($number_of_rows > 0) {
                        foreach ($q as $row) {
                            ?>



                        <table id="user-request" class="table display celled ui table-bordered">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام کاربری</th>
                                    <th>رمز عبور</th>
                                    <th>شماره تلفن</th>
                                    <th>شماره موبایل</th>
                                    <th>ایمیل</th>
                                    <th>آدرس</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row["vcrFNameAdmin"] ?></td>
                                    <td><?php echo $row["vcrUsernameAdmin"] ?></td>
                                    <td><?php echo $row["vcrRepeatPasswordAdmin"] ?></td>
                                    <td><?php echo $row["vcrPhoneNumberAdmin"] ?></td>
                                    <td><?php echo $row["vcrMobileNumberAdmin"] ?></td>
                                    <td><?php echo $row["vcrEmailAdmin"] ?></td>
                                    <td><?php echo $row["vcrAddressAdmin"] ?></td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="row mt-2">
                            <!-- <button class="btn btn-danger btn-handle" id="panel_win">تغییر دادن ...</button> -->
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">نام شرکت</label>
                                <input type="text" id="txtname" class="form-control" value="<?php echo $row["vcrFNameAdmin"] ?>" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">نام کاربری</label>
                                <input type="text" id="txtusername" class="form-control" value="<?php echo $row["vcrUsernameAdmin"] ?>" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">رمز عبور</label>
                                <input type="text" id="txtpassword" class="form-control" value="<?php echo $row["vcrRepeatPasswordAdmin"] ?>" style="direction: ltr;" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">شماره تلفن</label>
                                <input type="text" id="txtphonenum" class="form-control" value="<?php echo $row["vcrPhoneNumberAdmin"] ?>" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">شماره موبایل</label>
                                <input type="text" id="txtmobilenum" class="form-control" value="<?php echo $row["vcrMobileNumberAdmin"] ?>" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 form-group">
                                <label for="txtname">ایمیل</label>
                                <input type="text" id="txtemail" class="form-control" value="<?php echo $row["vcrEmailAdmin"] ?>" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-12 form-group">
                                <label for="txtname">آدرس شرکت</label>
                                <textarea type="text" id="txtaddress" class="form-control" value=""><?php echo $row["vcrAddressAdmin"] ?>
                            </textarea>
                            </div>

                            <button value="ثبت تغییر" id="register_admin_edit" row="1" name="register_admin_edit" class="btn btn-danger btn-handle">ثبت تغییر</button>
                            <!-- <button value="لغو" id="cancel" class="btn btn-danger btn-handle">لغو</button> -->

                        </div>

                <?php

                        }
                    }
                    ?>


            </div>

        </div>









        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
            // load_setting();

            // function load_setting() {
            //     user_id = sessionStorage.IDuser;
            //     $.ajax({
            //         url: "ajax/settings_ajax.php",
            //         method: "POST",
            //         data: {
            //             get_setting: -1
            //         },
            //         success: function(data) {
            //             $(' #table_index').html(data);
            //             list();
            //         }
            //     })
            // }

            $("#panel").slideUp("fast");
            $('#panel_win').click(function() {
                $('#register_user').val('ثبت کاربر');
                $("#txtfirstname").val('');
                sessionStorage.flagID = -1;
                $("#panel").slideToggle("fast");
            });
            $('#cancel').click(function() {
                $("#add_u").slideUp("fast");
                $("#txtfirstname").val('');
                sessionStorage.flagID = -1;
                $("#error_message").html('');
            });




            $('#register_admin_edit ').click(function() {
                if ($("#txtname").val() == '') {
                    $("#error_message").html('نام را وارد نمایید!');
                    $("#txtname").focus();
                    return;
                } else if ($("#txtusername").val() == '') {
                    $("#error_message").html('نام کاربری را بنویسید!');
                    $("#txtusername").focus();
                    return;
                } else if ($("#txtpassword").val() == '') {
                    $("#error_message").html('رمز عبور را وارد نمایید!');
                    $("#txtpassword").focus();
                    return;
                } else if ($("#txtphonenum").val() == '') {
                    $("#error_message").html('شماره تماس را بنویسید!');
                    $("#txtphonenum").focus();
                    return;
                } else if ($("#txtmobilenum").val() == '') {
                    $("#error_message").html('شماره موبایل را بنویسید!');
                    $("#txtmobilenum").focus();
                    return;
                } else if ($("#txtemail").val() == '') {
                    $("#error_message").html('ایمیل را مشخص کنید!');
                    $("#txtemail").focus();
                    return;
                } else if ($("#txtaddress").val() == '') {
                    $("#error_message").html('محل کار را بنویسید!');
                    $("#txtaddress").focus();
                    return;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax/settings_ajax.php",
                        data: {
                            register_admin_edit: -1,
                            txtname: $("#txtname").val(),
                            txtusername: $("#txtusername").val(),
                            txtpassword: $("#txtpassword").val(),
                            txtphonenum: $("#txtphonenum").val(),
                            txtmobilenum: $("#txtmobilenum").val(),
                            txtemail: $("#txtemail").val(),
                            txtaddress: $("#txtaddress").val()
                        },
                        success: function(data) {
                            // alert(data);
                            window.location.href = "settings.php";
                            // window.location.href = "../logout.php";
                        }
                    });
                }
            });
        </script>
    </body>

    </html>
<?php
}
?>