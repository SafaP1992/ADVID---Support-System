<?php
include('server.php');

$sql = "SELECT * FROM tbadmin";
$result = $dbo->prepare($sql);
$result->execute();
$data = $result->fetch();

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Dashboard</title>
</head>
<body>

    <div class="container-fluid m-0 p-0">

        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                    </ul>
                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="assets/images/1.jpg" alt="" class="img-fluid" style="max-width:100%;">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/images/2.jpg" alt="" class="img-fluid" style="max-width:100%;">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/images/3.jpg" alt="" class="img-fluid" style="max-width:100%;">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/images/4.jpg" alt="" class="img-fluid" style="max-width:100%;">
                        </div>
                    </div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    
                </div>
            </div>
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-2">
                
                
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="box-a mt-3">
                            <div class="text-right">
                                <small>
                                    <span>شماره تماس:</span>
                                    <?php
                                        echo $data['vcrPhoneNumberAdmin'];
                                    ?>
                                </small>
                            </div>   
                            <div class="text-right">
                                <small>
                                    <span>شماره موبایل:</span>
                                        <?php
                                            echo $data['vcrMobileNumberAdmin'];
                                        ?>
                                </small>
                            </div> 
                            <div class="text-right">
                                <small>
                                    <span>آدرس:</span><i class="fas fa-map-marker-alt"></i>
                                    <?php
                                        echo $data['vcrAddressAdmin'];
                                    ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>
    

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>