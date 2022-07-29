<?php
include('server.php');

$sql = "SELECT * FROM tbadmin";
$result = $dbo->prepare($sql);
$result->execute();
$data = $result->fetch();

?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>سامانه پشتیبانی آوید</title>
</head>

<body style="background-image: url('assets/images/bg.jpg');">

    <div class="container">
        <div class="row">
            <form method="post" action="">
                <div class="login-form">

                    <img src="assets/images/logo-Avid.png" class="logo-login-img">
                    <h1 class="text-center">سامانه پشتیبانی</h1>
                    <div class="text-center"><small><b><span>شماره تماس:</span>
                                <?php
                                echo $data['vcrPhoneNumberAdmin'];
                                ?>
                            </b></small></div>

                    <div class="txtb">
                        <input type="text" name="inputusername">
                        <span data-placeholder="نام کاربری"></span>
                    </div>

                    <div class="txtb">
                        <input type="password" name="inputpassword">
                        <span data-placeholder="کلمه عبور"></span>
                    </div>
                    <div class="text-center">
                        <input type="text" style="width:100px" class="text-captcha" name="captcha" id="captcha" />
                        <img src="captcha.php">
                    </div>


                    <input type="submit" class="loginbtn" name="login" value="ورود">

                    <!-- Display validation errors -->
                    <?php include('errors.php'); ?>


                    <span class="address"><i class="fas fa-map-marker-alt"></i>
                        <?php
                        echo $data['vcrAddressAdmin'];
                        ?>
                    </span>

                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>

    <script type="text/javascript">
        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        })

        $(".txtb input").on("blur", function() {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        })
    </script>

</body>

</html>