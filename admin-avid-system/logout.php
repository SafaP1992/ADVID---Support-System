<?php
session_start();
session_destroy();
header("location:index.php");
?>

<script src="../assets/js/jquery.min.js"></script>
<!-- <script src="assets/js/handler.js"></script> -->


<script type="text/javascript">
    sessionStorage.clear();
</script>