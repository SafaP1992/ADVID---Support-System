
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $flag = -2;
    $id = $_POST['res_id'];
    $error = '';
    $comment_id = '';
    $comment_content = '';

    echo $id;

    if (empty($_POST["res_id"])) {
        $error .= '<p class="text-danger">there is PROBLEM with ID</p>';
    } else {
        $comment_id = $_POST["res_id"];
    }

    // echo $_POST["res_id"];



    if (empty($_POST["comment_content"])) {
        $error .= '<p class="text-danger">comment is required.</p>';
    } else {
        $comment_content = addslashes($_POST["comment_content"]);
    }
    $vcrSupportSubject = $_POST["vcrSupportSubject"];

    $txtpriority = $_POST["intSupportPriority"];
    $UserRelID = $_POST["intUserRelID"];

    $date = date("Y-m-d H:i:s");
    $array = explode(' ', $date);
    list($year, $month, $day) = explode("-", $array[0]);
    list($hour, $minute, $second) = explode(':', $array[1]);
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

    $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));
    // $date2 = gregorian_to_jalali($year, $month, $day, ' ') . tr_num(jdate("His", time()));





    if ($error == '') {
        
        $sql = "CALL sp_Insert_Update_Delete_tbSupport('$flag','$comment_id',1,NULL,'$vcrSupportSubject','$txtpriority','$comment_content','$date','$jalali_date','-1','-1','$UserRelID','-1')";
        // $sql = "INSERT INTO tbsupport (intSupportParentID,intAdminID,intUserID,vcrSupportSubject,intSupportPriority,txtSupportComment,datSupportDateTime,vcrSupportDateTime,intUserRelID)
        //             VALUES ('$comment_id',1,NULL,'$vcrSupportSubject','$txtpriority','$comment_content','$date','$jalali_date','$UserRelID')";

        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $set_status = '1';
        $DateTime = date("Y-m-d H:i:s");
        $sqlsec = "CALL sp_Insert_Update_Delete_tbSupport('$comment_id','-1','-1','-1','-1','-1','-1','$DateTime','-1','-1','-1','-1','$set_status')";
        // $sqlsec = "CALL sp_Insert_Update_Delete_tbSupport('$id','$set_status')";
        $qsec = $dbo->prepare($sqlsec);
        $qsec->execute();

        echo $sqlsec;
        $error = '<label class="text-success">جواب داده شد.</label>';
    }


    $data = array(
        'error'     => $error
    );

    echo json_encode($data);
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
