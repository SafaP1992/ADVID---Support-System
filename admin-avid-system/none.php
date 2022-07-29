<?php
include('server.php');

if (empty($_SESSION['vcrUsernameAdmin'])) {
    header("location:index.php");
} else {


    ?>

    <div html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/bootstrap-rtl.min.css">
            <link rel="stylesheet" href="../assets/css/style.css">

            <title>داشبورد</title>
        </head>

        <body>

            <div class="container-fluid">
                <div class="row mt-3">



                    <div class="col-12 col-sm-6 col-md-3 float-right">

                        <div class="row">
                            <div class="col-12">
                                <div class="box-a mt-3">
                                    <h2>مشتری های عضو</h2>
                                    <h2>
                                        <?php
                                            $sql = "SELECT count(*) FROM tbusers";
                                            $result = $dbo->prepare($sql);
                                            $result->execute();
                                            $number_of_rows = $result->fetchColumn();
                                            echo $number_of_rows;
                                            ?>
                                    </h2>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div class="box-b mt-3">
                                    <h2>درخواست ها</h2>
                                    <h2>
                                        <?php
                                            $sqlreq = "SELECT count(*) FROM tbsupport WHERE intSupportParentID='0' AND intSupportStatus='0'";
                                            $resultreq = $dbo->prepare($sqlreq);
                                            $resultreq->execute();
                                            $number_of_rows_req = $resultreq->fetchColumn();
                                            echo $number_of_rows_req;
                                            ?>
                                    </h2>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="box-b mt-3">
                                    <h2>تعداد درخواست ها</h2>
                                    <h2>240</h2>
                                </div>
                            </div>
                        </div> -->


                    </div>

                    <div class="col-12 col-sm-6 col-md-9 float-left">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card card-user">
                                    <div class="text-center">
                                        <img src="assets/images/def_face.jpg" class="image-user" alt="">
                                        <div style="background-color:blanchedalmond; border-radius:3px; margin:0 125px">
                                            • آخرین ورود •
                                        </div>
                                    </div>
                                    <div class="name-user text-center">
                                        <?php
                                            $sql = "SELECT * FROM view_tbipuser_tbuser ORDER BY intIPUserID DESC";
                                            $result = $dbo->prepare($sql);
                                            $result->execute();
                                            $data = $result->fetch();
                                            ?>
                                        <h5><?php echo $data['vcrFNameUser'] ?></h5>
                                    </div>
                                    <div class="ip-user text-center">
                                        <h6>IP Address: <?php echo $data['vcrIPUserAddress'] ?></h6>
                                    </div>
                                    <div class="input-user text-center">
                                        <p>تاریخ ورود:</p>
                                        <p><?php echo $data['vcrIPUserEntryDateTime'] ?></p>
                                    </div>
                                    <!-- <div class="input-user text-center">
                                        <p>تاریخ خروج:</p>
                                        <p>1398/11/8 14:08</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <!-- jQuery CDN -->
            <script src="../assets/dist/js/jquery-1.12.0.min.js"></script>
            <!-- Bootstrap Js CDN -->
            <script src="../assets/dist/js/bootstrap.min.js"></script>



        </body>

        </html>



    <?php
    }
    ?>