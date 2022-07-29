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


        <title>سیستم تیکت آوید - لیست کاربران</title>
    </head>

    <body>

        <!-- Main -->
        <div class="container">
            <div class="row">
                <h4 class="linetext mb-4">لیست درخواست های کاربران</h4>
            </div>

            <div class="row">
                <div class="col-xl-12 mt-3">
                    <table id="user-list" class="display ui celled table hover dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>تعداد درخواست</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table_indexw">

                        </tbody>
                        <!-- <tfoot>
                        <tr>
                            <th>شماره</th>
                            <th>نام</th>
                            <th>تعداد درخواست</th>
                            <th></th>
                        </tr>
                    </tfoot> -->
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

                load_users();

                function load_users() {
                    $.ajax({
                        url: "ajax/fetch-users-comments-ajax.php",
                        method: "POST",
                        // dataType: "json",
                        data: {
                            id: -1,
                            idu: -1
                        },
                        success: function(data) {
                            // alert(data);
                            $('#table_indexw').html(data);
                            list();
                        }
                    })
                }

                function list() {
                    $('#user-list').DataTable({
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



                $(document).on('click', '.response', function() {
                    var res_id_user = $(this).attr("id");
                    // alert(res_id_user);
                    sessionStorage.IDUserSupport = res_id_user;

                    // $.ajax({
                    //     url:"ajax/fetch-user-comment.php", 
                    //     method:"POST",
                    //     data:{id:res_id_user},
                    //     // dataType:"json",
                    //     success:function(data)
                    //     {
                    //         window.location.replace("fetch-user-comment.php");
                    //         // window.location.href = "http://stackoverflow.com";
                    //     }
                    // })
                });






            });
        </script>

    </body>

    </html>



<?php
}
?>