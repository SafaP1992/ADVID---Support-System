<?php
include('server.php');

if (empty($_SESSION['vcrUsernameUser'])) {
    header("location:index.php");
} else {

    $sql = "SELECT * FROM tbadmin";
    $result = $dbo->prepare($sql);
    $result->execute();
    $data = $result->fetch();


    ?>

    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>سیستم پشتیبانی آوید</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/dist/css/bootstrap-rtl.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/dist/css/style.css">


    </head>

    <script language="javascript" type="text/javascript">
        function do_iframe(cont, loc) {
            document.getElementById(loc).innerHTML = '<iframe frameborder="0" scrolling="yes" src=' + cont + ' allowfullscreen ></iframe>';
        }
    </script>


    <body>


        <div class="wrapper" style="background-image:url('assets/images/bg-dashboard.jpg'); /* #dff0ff; */">
            <!-- Sidebar Holder -->
            <nav id="sidebar">

                <div class="sidebar-header">
                    <h3 style="margin:0;"><img class="img-thumbnail" src="assets/images/logo2.png" style="background-color:transparent; border:0px" /></h3>
                    <strong><img class="img-thumbnail" src="assets/images/logo.png" style="background-color:transparent;border:0px" /></strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a onclick="do_iframe('none.php', 'iframePanel');" href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            داشبورد
                        </a>
                    </li>
                    <li>
                        <a href="#details" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-info-sign"></i>
                            اطلاعات تکمیلی
                        </a>
                        <ul class="collapse list-unstyled" id="details">
                            <a onclick="do_iframe('handle/details_info_register.php', 'iframePanel');" href="#">
                                <i class="glyphicon glyphicon-info-sign"></i>
                                ثبت اطلاعات
                            </a>
                            <a onclick="do_iframe('handle/details_info_table.php', 'iframePanel');" href="#">
                                <i class="glyphicon glyphicon-info-sign"></i>
                                مشاهده اطلاعات
                            </a>
                        </ul>
                    </li>
                    <li>
                        <a onclick="do_iframe('handle/relation-users.php', 'iframePanel');" href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            معرفی رابطین
                        </a>
                    </li>
                    <li>
                        <a href="#support" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            پشتیبانی
                        </a>
                        <ul class="collapse list-unstyled" id="support">
                            <li><a onclick="do_iframe('handle/send-new-request.php', 'iframePanel');" href="#">
                                    <i class=" glyphicon glyphicon-send"></i>
                                    ارسال تیکت جدید
                                </a>
                            </li>
                            <li><a onclick="do_iframe('handle/fetch-requests.php', 'iframePanel');" href="#">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                    مشاهده تیکت های باز
                                </a>
                            </li>
                            <li><a onclick="do_iframe('handle/fetch-history-requests.php', 'iframePanel');" href="#">
                                    <i class="glyphicon glyphicon-ok-circle"></i>
                                    مشاهده تیکت های بسته شده
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#tax" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-usd"></i>
                            مالی
                        </a>
                        <ul class="collapse list-unstyled" id="tax">
                            <li><a onclick="do_iframe('handle/fetch-preinvoices.php', 'iframePanel');" href="#">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    پیش فاکتورها
                                </a>
                            </li>
                            <li><a onclick="do_iframe('handle/fetch-invoices.php', 'iframePanel');" href=" #">
                                    <i class="glyphicon glyphicon-file"></i>
                                    فاکتورها
                                </a>
                            </li>
                            <li><a onclick="do_iframe('handle/fetch-products.php', 'iframePanel');" href=" #">
                                    <i class="glyphicon glyphicon-equalizer"></i>
                                    محصولات
                                </a>
                            </li>
                            <!-- <li><a href="#">شماره حساب</a></li> -->
                        </ul>
                    </li>
                </ul>

                <ul class="list-unstyled ">
                    <li>
                        <a href="logout.php" class="article">
                            <i class="glyphicon glyphicon-off"></i>
                            خروج
                        </a>
                    </li>
                </ul>
                <div class="small" style="position:absolute; bottom:0; margin-right:10px;color:#8a8a8a"><small>v 1.0.0</small></div>
            </nav> <!-- Page Content Holder -->

            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php
                                echo '<h5 class="text-center" style="margin: 15px;"> سیستم پنل   ' . $_SESSION['vcrFNameUser'] . ' ' . $_SESSION['vcrLNameUser'] . ' </h5>';
                                // echo '<strong><img src="assets/images/def_face.jpg" /></strong>';
                                ?>
                            <ul class="nav navbar-nav navbar-right">
                                <!-- <li><a href="#">Page</a></li> -->
                            </ul>
                        </div>
                        <div style="position: absolute;top: 0;left: 0;margin: 15px;"><small><b>شماره تماس: <?php echo $data['vcrPhoneNumberAdmin']; ?></b></small></div>


                    </div>
                </nav>






                <div class="rightPanel" id="iframePanel">
                    <iframe frameborder="0" scrolling="no" src="none.php">
                    </iframe>
                </div>

                <!-- <div class="line"></div> -->

            </div>

        </div>



    <?php
    }
    ?>

    <!-- jQuery CDN -->
    <script src="assets/dist/js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="assets/dist/js/bootstrap.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('ul li').click(function() {
                $('ul li').removeClass('active');
                $(this).addClass('active');
            });


            //  sessionStorage.intUserID;
            //  sessionStorage.intUserID = val('#intUserID');
            // alert("sessionStorage.intUserID");

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

    </body>

    </html>