<?php
include('../server.php');
    if (empty($_SESSION['vcrUsernameUser'])) {
        header("location:../index.php");
    } else {
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
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>سیستم تیکت آوید</title>
</head>

<body>

    <!-- Main -->
    <div class="container mt-5">

        <div class="row">

            <form method="POST" id="comment_form">

                <!-- <svg class="barcode" jsbarcode-format="upc" jsbarcode-value="1234567890012" jsbarcode-textmargin="0" jsbarcode-fontoptions="bold">
                </svg> -->

                <div id="fetch-comment">


                </div>

                <input type="hidden" name="res_id" id="res_id" value="">


            </form>


            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>




        </div>
        
        
                <div class="row">
                    <div class="col-12">
                        <div class="text-left">
                            <a class="btn btn-primary text-left" href="fetch-history-requests.php">بازگشت</a>
                        </div>
                    </div>
                </div>
    </div>

    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/JsBarcode.all.min.js"></script>

</body>

</html>




<script>
    $(document).ready(function() {

        comment();

        function comment() {
            res_id = sessionStorage.IDSupport;
            // alert(res_id);

            $.ajax({
                url: "ajax/fetch-request-ajax.php",
                method: "POST",
                data: {
                    res_id: res_id
                },
                // dataType:"json",
                success: function(data) {
                    // alert(data);
                    $('#fetch-comment').html(data);

                    $('#res_id').val(res_id);
                }
            });
        }




    });
</script>


    <?php } ?>