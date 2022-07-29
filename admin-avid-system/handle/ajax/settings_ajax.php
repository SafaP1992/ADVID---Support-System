<?php

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);


    if (isset($_POST['register_admin_edit'])) {

        $name = $_POST['txtname'];
        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];
        $repassword = $_POST['txtpassword'];
        $txtphonenum = $_POST['txtphonenum'];
        $txtmobilenum = $_POST['txtmobilenum'];
        $txtemail = $_POST['txtemail'];
        $txtaddress = $_POST['txtaddress'];

        $date = date("Y-m-d");
        $time = date("H:i:s");
        $Datetime = $date . " " . $time;

        $password = md5($password);

        $sql = "UPDATE tbadmin SET vcrFNameAdmin='$name',vcrUsernameAdmin='$username',vcrPasswordAdmin='$password',vcrRepeatPasswordAdmin='$repassword',vcrPhoneNumberAdmin='$txtphonenum',vcrMobileNumberAdmin='$txtmobilenum',vcrEmailAdmin='$txtemail',vcrAddressAdmin='$txtaddress' WHERE intAdminID='1'";
        $q = $dbo->prepare($sql);
        $q->execute();

        // header("Location: ../logout.php");
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
