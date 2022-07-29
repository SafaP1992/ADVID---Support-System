<?php
include('../server.php');

if (empty($_SESSION['vcrUsernameUser'])) {
    header("location:../index.php");
} else {
    session_start();
    echo '<input type="hidden" id="intUserID" name="intUserID" value="' . $_SESSION['intUserID'] . '">';
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="../assets/css/fontawesome-all.css">
        <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../assets/css/datatables.min.cs">
        <link rel="stylesheet" href="../assets/css/style.css">

        <title>سیستم تیکت آوید - لیست پیام های درخواستی</title>
    </head>

    <body>

        <!-- Main -->
        <div class="container mt-2">
            <div class="row">
                <h4 class="linetext mb-4">درخواست ها</h4>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <table id="user-list" class="display ui celled table dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>موضوع</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table_index">

                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>شماره</th>
                                <th>موضوع</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th></th>
                            </tr>
                        </tfoot> -->
                    </table>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $(document).ready(function() {

            load_comments();

            function load_comments() {
                user_id = document.getElementById('intUserID').value;
                // alert(user_id);

                $.ajax({
                    url: "ajax/fetch-requests-ajax.php",
                    method: "POST",
                    // dataType: "json",
                    data: {
                        new: -1,
                        user_id: user_id
                    },
                    success: function(data) {
                        // alert(data);
                        $('#table_index').html(data);
                        list();
                    }
                })
            }

            function list() {
                tabel = $('#user-list').DataTable({
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

            $(document).on('click', '.chat', function() {
                var res_id = $(this).attr("id");
                // alert(res_id);
                sessionStorage.IDSupport = res_id;

                // $.ajax({
                //     url:"ajax/comment-user.php", 
                //     method:"POST",
                //     data:{id:res_id},
                //     dataType:"json",
                //     success:function(data)
                //     {
                //         // $('#Modal').modal('show');
                //         // $('#id').val(image_id);
                //         // $('#name').val(data.image_name);
                //         // $('#description').val(data.image_description);
                //     }
                // })
            });






        });
    </script>

    </body>

    </html>
    
    
    <?php } ?>
