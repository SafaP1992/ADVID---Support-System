<?php
include('../server.php');
if (empty($_SESSION['vcrUsernameUser'])) {
    header("location:../index.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="../assets/css/fontawesome-all.css">

        <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

        <!-- <link rel="stylesheet" href="ajax/DateP/js-persian-cal.css" /> -->

        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>

        <!-- Main -->
        <div class="container-fluid mt-2">
            <div class="row">
                <h4 class="linetext mb-4 mr-4">مشاهده فرم اطلاعات، برای درخواست نماد اعتماد الکترونیکی</h4>
                <span id="error_message" class="text-danger"></span>

            </div>
            <div class="row">
                <div class="card-body">

                    <table id="user-list" class="display ui celled table dataTable " style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام و نام خانوادگی</th>
                                <th>نام دامنه</th>
                                <th>تاریخ درخواست</th>
                                <th>مشاهده</th>
                            </tr>
                        </thead>
                        <tbody id="table_index">

                        </tbody>
                    </table>


                </div>
            </div>
        </div>





        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script type="text/javascript" src="ajax/DateP/js-persian-cal.min.js"></script> -->

    </body>

    </html>




    <script>
        $(document).ready(function() {


            load_details_enamad();

            function load_details_enamad() {
                $.ajax({
                    url: "ajax/fetch_details_info_ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        display_details_enamd: -1
                    },
                    success: function(data) {
                        $('#table_index').html(data);
                        // alert(data);
                        // table.destroy();
                        list();
                    }
                })
            }

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



            
            $(document).on('click', '.info-details', function() {
                var info_details_id = $(this).attr("id");
                x= window.location.href = "details_info_display.php?iddetails="+info_details_id;
            });


        });
    </script>


<?php
}
?>