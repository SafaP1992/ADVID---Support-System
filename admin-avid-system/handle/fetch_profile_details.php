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
                    <a class="nav-link" href="users_profile.php">
                        <i class="fa fa-user"></i>
                        مشخصات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
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
                                <th>ردیف</th>
                                <th>نام و نام خانوادگی</th>
                                <th>نام دامنه</th>
                                <th>تاریخ درخواست</th>
                                <th>مشاهده</th>
                            </tr>
                        </thead>
                        <tbody id="fetch_table">
                            
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
                        $('.txtname').html('<span>' + data.FNameUser + '</span');
                        // list();
                    }
                })
            }
            
            load_user_details();

            function load_user_details() {
                user_id = sessionStorage.IDuser;
                $.ajax({
                    url: "ajax/fetch_users_profile_details_ajax.php",
                    method: "POST",
                    data: {
                        get_user_details_info: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        $('#fetch_table').html(data);
                        list();
                    }
                })
            }
            
            
            
            


            $(document).on('click', '.info-details', function() {
                var info_details_id = $(this).attr("id");
                sessionStorage.IDFlagENamad = info_details_id;
                x= window.location.href = "fetch_profile_details_display.php?iddetails="+info_details_id;
                // var product_id_slice = product_id.slice(3);
                // alert(info_details_id);
                // var r = confirm("آیا میخواهید حذف کنید!");
                // if (r == true) {
                            
                    // $.ajax({
                    //     type: "POST",
                    //     url: "fetch_profile_details_display.php?iddetails='info_details_id'",
                    //     data: {
                    //         get_specific_user_details_info: -1,
                    //         flag: info_details_id
                    //     },
                    //     success: function(data) {
                    //         alert(alert);
                            
                    //         // table.destroy();
                    //     }
                    // });
                // } else {
                //     txt = "You pressed Cancel!";
                //     // alert('cancel');
                // }
            });
            
            

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