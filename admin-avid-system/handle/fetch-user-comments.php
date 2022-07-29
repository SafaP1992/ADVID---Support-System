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
        <div class="container-fluid">
            
            <h4 class="linetext"><span id="name-user"></span></h4>
            
            <div class="row">
                <div class="col-12">
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item-tab">
                        <a class="nav-link-tab active" id="open-tab" data-toggle="tab" href="#open" role="tab" aria-controls="open" aria-selected="true">پیام های باز</a>
                      </li>
                      <li class="nav-item-tab">
                        <a class="nav-link-tab" id="closed-tab" data-toggle="tab" href="#closed" role="tab" aria-controls="closed" aria-selected="false">پیام های بسته شده</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="open" role="tabpanel" aria-labelledby="open-tab">
                          
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                
                                    <!--<h4 class="linetext">پیام های بسته شده</h4>-->
                
                                    <table id="user-list" class="display ui celled table dataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>موضوع درخواست</th>
                                                <th>اولویت</th>
                                                <th>تاریخ</th>
                                                <th>وضعیت</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
                
                                        </tbody>
                                    </table>
                
                                </div>
                            </div>
                          
                        </div>
                        
                        <div class="tab-pane fade" id="closed" role="tabpanel" aria-labelledby="closed-tab">
                            
                            
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <!--<h4 class="linetext">پیام های بسته شده</h4>-->
                
                
                                    <table id="user-list-closed" class="display ui celled table" style="width:100%">
                
                                        <thead>
                                            <tr>
                                                <th>شماره</th>
                                                <th>موضوع درخواست</th>
                                                <th>اولویت</th>
                                                <th>تاریخ</th>
                                                <th>وضعیت</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-closed">
                
                                        </tbody>
                                    </table>
                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
            
            

            <div class="row">
                <div class="col-12">
                    <div class="text-left">
                        <a class="btn btn-primary text-left" href="fetch-users-comments.php">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="ajax/latin2Arabic.jquery.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/dataTables.bootstrap4.min.js"></script>


        <script>
            $(document).ready(function() {
                load_user_name();

                function load_user_name() {
                    res_id_user = sessionStorage.IDUserSupport;
                    $.ajax({
                        url: "ajax/fetch-user-comments-ajax.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            get_name: -1,
                            idu: res_id_user
                        },
                        success: function(data) {
                            $('#name-user').html(data.FNameUser + ' ' + data.LNameUser);
                            load_user_comments();
                            load_user_comments_closed();
                        }
                    })
                }


                // load_user_comments();
                function load_user_comments() {

                    res_id_user = sessionStorage.IDUserSupport;

                    $.ajax({
                        url: "ajax/fetch-user-comments-ajax.php",
                        method: "POST",
                        // dataType: "json",
                        data: {
                            get: -1,
                            idu: res_id_user
                        },
                        success: function(data) {
                            // alert(data);
                            $('#table').html(data);
                        }
                    })
                }


                $(document).on('click', '.response', function() {
                    var res_id = $(this).attr("id");
                    // alert(res_id);
                    sessionStorage.IDSupport = res_id;
                });




                $(document).on('click', '.this-status', function() {
                    var res_status_id = $(this).attr("id");
                    // sessionStorage.IDSupport = res_id;
                    var slice_res_status_id = res_status_id.slice(3);
                    // alert(slice_res_status_id);

                    var r = confirm("آیا می خواهید این قسمت پیام بسته شود؟!");
                    if (r == true) {
                        $.ajax({
                            url: "ajax/fetch-user-comments-ajax.php",
                            method: "POST",
                            data: {
                                set_status: 2,
                                idu: slice_res_status_id
                            },
                            success: function(data) {
                                load_user_comments();
                                load_user_comments_closed();
                                table.destroy();
                                table_closed.destroy();
                                list();
                                list_closed();
                            }
                        })
                    }
                });










                // D I S P L A Y  &  H A N D L E   C L O S E D   M E S S A G E S //
                function load_user_comments_closed() {

                    res_id_user = sessionStorage.IDUserSupport;

                    $.ajax({
                        url: "ajax/fetch-user-comments-ajax.php",
                        method: "POST",
                        // dataType: "json",
                        data: {
                            get_closed_messages: -1,
                            idu: res_id_user
                        },
                        success: function(data) {
                            // alert(data);
                            $('#table-closed').html(data);
                            load_user_comments();
                        }
                    })
                }

                $(document).on('click', '.this-status-closed', function() {
                    var res_status_id = $(this).attr("id");
                    // sessionStorage.IDSupport = res_id;
                    var slice_res_status_id = res_status_id.slice(4);
                    // alert(slice_res_status_id);

                    var r = confirm("آیا می خواهید این قسمت پیام باز باشد؟!");
                    if (r == true) {
                        $.ajax({
                            url: "ajax/fetch-user-comments-ajax.php",
                            method: "POST",
                            data: {
                                set_status: 0,
                                idu: slice_res_status_id
                            },
                            success: function(data) {
                                load_user_comments();
                                load_user_comments_closed();
                                table.destroy();
                                table_closed.destroy();
                                list();
                                list_closed();
                            }
                        })
                    }
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

                function list_closed() {
                    table_closed = $('#user-list-closed').DataTable({
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