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
        <div class="container mt-2">
            <div class="row">
                <h4 class="linetext mb-4">فعالیت مشتریان</h4>
            </div>


            <div class="row">
                <div class="col-xl-12 mt-3 table-responsive">
                    <table id="user-request" class="table-bordered table display celled ui dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>نام کاربری</th>
                                <th>آدرس آی پی</th>
                                <th>سیستم عامل</th>
                                <th>مروگر</th>
                                <th>دستگاه</th>
                                <th>تاریخ ورود</th>
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

                load_users_ip();

                function load_users_ip() {
                    $.ajax({
                        url: "ajax/fetch_users_ajax.php",
                        method: "POST",
                        // dataType: "json",
                        data: {
                            fetch_users_address: -1
                        },
                        success: function(data) {
                            // alert(data);
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


            });
        </script>

    </body>

    </html>
<?php
}
?>