<?php
session_start();

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $user_id = $_SESSION['intUserID'];
    // $sql = 'CALL sp_SellectAll_view_tbCategoryBlog(-1)';

    // echo $user_id;
    $sql = "SELECT * FROM tbusersrel WHERE intUserID = '$user_id' AND intUserRel_Del='0' ORDER BY intUserRelID DESC";
    $q = $dbo->prepare($sql);
    $q->execute();
    $output = '<option value="" disabled selected hidden>انتخاب کنید...</option>';


    while ($r = $q->fetch()) {
        $gender = $r["intUserRelSex"];
        if ($gender == 1)
            $gender_str = 'آقای';
        elseif ($gender == 2) {
            $gender_str = 'خانم';
        }
        $output .= '<option value="' . $r["intUserRelID"] . '">' . $gender_str . ' ' . $r["vcrUserRelName"] . ' - واحد (' . $r["vcrUserRelSection"] . ')</option>';
        // $output .= '<span>' . $gender_str . ' ' . $r["vcrUserRelName"] . '</span>';
    }
    echo  $output;
} catch (Exception $e) {
    echo "ERROR : اطلاعاتی تاکنون ثبت نشده است!";
    print_r($e);
}
