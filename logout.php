<?php
session_start();


// $id_user = $_SESSION['intUserID'];
// //adding new visitor (new ip)
// $user_ip = $_SERVER['REMOTE_ADDR'];
// $DateTime = date("Y-m-d H:i:s");

// $insert = $dbo->prepare("UPDATE tbipuser SET intUserID='$id_user', intIPUserStatusOnline='0' WHERE intUserID='$id_user'");
// $insert->setFetchMode(PDO::FETCH_ASSOC);
// $insert->execute();


session_destroy();
header("location:index.php");
?>

<script src="assets/js/jquery.min.js"></script>
<!-- <script src="assets/js/handler.js"></script> -->


<script type="text/javascript">
    sessionStorage.clear();
</script>