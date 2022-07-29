
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $iduser = $_SESSION['intUserID'];
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
