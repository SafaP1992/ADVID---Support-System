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
        <!-- <link rel="stylesheet" href="ajax/DateP/js-persian-cal.css" /> -->
        <link rel="stylesheet" href="../../assets/css/style.css">

        <title>سیستم تیکت آوید - مشخصات </title>
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
                    <a class="nav-link active" href="#">
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
                    <a class="nav-link" href="fetch_profile_products.php">
                        <i class="fa fa-box"></i>
                        محصولات
                    </a>
                </li>
            </ul>
            <!-- <div class="row">
            <h4 class="linetext mb-4">مشخصات</h4>
        </div> -->


            <!-- .nav-justified .nav-item -->

            <div class="row ">
                <div class="col-xl-12 mt-3">
                    <table id="user-list" class="table table-bordered display celled ui">
                        <thead>
                            <tr>
                                <th>حقیقی/حقوقی</th>
                                <th>نام مشتری</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>شماره تماس</th>
                                <th>آدرس</th>
                                <th>نقشه</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="txthoghoghihaghighi"></td>
                                <td class="txtname"></td>
                                <td id="txtusername"></td>
                                <td id="txtemail"></td>
                                <td id="txtphone"></td>
                                <td id="txtaddress"></td>
                                <td id="txtmap"></td>
                            </tr>
                        </tbody>
                    </table>



                    <!-- <div class="col-md-2">
                            <label for="txthoghoghihaghighi">حقیقی/حقوقی</label>
                            <div class="info-text" id="txthoghoghihaghighi"></div>
                        </div>
                        <div class="col-md-2">
                            <label for="txtname">نام مشتری</label>
                            <div class="info-text" id="txtname"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="txtusername">نام کاربری</label>
                            <div class="info-text" id="txtusername"></div>
                        </div> -->
                    <!-- <div class="col-md-6">
                            <label for="txtpassword">رمز عبور</label>
                            <div class="info-text" id="txtpassword"></div>
                        </div> -->
                    <!-- <div class="col-md-6">
                            <label for="txtemail">پست الکترونیک</label>
                            <div class="info-text" id="txtemail"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="txtphone">شماره تماس</label>
                            <div class="info-text" id="txtphone"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtaddress">آدرس</label>
                            <div class="info-text" id="txtaddress"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtmap">نقشه ی محل</label>
                            <div class="info-text" id="txtmap"></div>
                            <div id="map"></div>
                        </div> -->
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
        <!-- <script type="text/javascript" src="ajax/DateP/js-persian-cal.min.js"></script> -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->

        <script type="text/javascript" src="ajax/gmaps.js"></script>

        <script type="text/javascript">
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
                        var str = '';
                        if (data.HoghogiHaghighiUser == 1) {
                            str = "حقیقی";
                        } else {
                            str = "حقوقی";
                        }
                        $('#txthoghoghihaghighi').html('<span>' + str + '</span');
                        $('.txtname').html('<span>' + data.FNameUser + '</span');
                        $('#txtusername').html('<span>' + data.UsernameUser + '</span');
                        $('#txtpassword').html('<span>' + data.RepeatPasswordUser + '</span');
                        $('#txtemail').html('<span>' + data.EmailUser + '</span');
                        $('#txtphone').html('<span>' + data.PhoneNumberUser + '</span');
                        $('#txtaddress').html('<span>' + data.AddressUser + '</span');
                        $('#txtmap').html('<span><a href="https://www.google.com/maps/place/' + data.MapLat + '" target="_blank"><i class="fas fa-search"></i></a></span');
                        // list();
                    }
                })
            }

            function list() {
                table = $('#user-list').DataTable({
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
        </script>

    </body>

    </html>



<?php
}
?>