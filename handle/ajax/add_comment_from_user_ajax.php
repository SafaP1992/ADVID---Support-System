
<?php
include_once('jdf.php');
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();
    
    $flag = -2;
    $id = $_SESSION['intUserID'];
    $error = '';
    $comment_id = '';
    $comment_content = '';


    if (empty($_POST['res_id'])) {
        $error .= '<p class="text-danger">there is not ID</p>';
    } else {
        $comment_id = $_POST['res_id'];
    }



    if (empty($_POST["comment_content"])) {
        $error .= '<p class="text-danger">comment is required.</p>';
    } else {
        $txtcontent = addslashes($_POST["comment_content"]);
    }
    $txtsubject = $_POST["vcrSupportSubject"];
    $txtpriority = $_POST["intSupportPriority"];
    $UserRelID = $_POST["intUserRelID"];


    $DateTime = date("Y-m-d H:i:s");

    $date = date("Y-m-d H:i:s");
    $array = explode(' ', $date);
    list($year, $month, $day) = explode("-", $array[0]);
    list($hour, $minute, $second) = explode(':', $array[1]);
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));


    if ($error == '') {
        $sql = "CALL sp_Insert_Update_Delete_tbSupport('$flag','$comment_id',NULL,'$id','$txtsubject','$txtpriority','$txtcontent','$DateTime','$jalali_date','-1','-1','$UserRelID','-1')";
        // $sql = "CALL sp_Insert_Update_Delete_tbSupport('$flag','0',NULL,'$iduser','$comment_subject','$inputState','$comment_content','$DateTime','$jalali_date','$file_name','$rand','$inputResponse','0')";
        
        // $sql = "INSERT INTO tbsupport (intSupportParentID,intAdminID,intUserID,vcrSupportSubject,intSupportPriority,txtSupportComment,datSupportDateTime,vcrSupportDateTime,intUserRelID)
        //             VALUES ('$comment_id',NULL,$id,'$txtsubject','$txtpriority','$txtcontent', '$DateTime','$jalali_date','$UserRelID')";

        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);


        $set_status = '0';
        $sqlsec = "CALL sp_Insert_Update_Delete_tbSupport('$comment_id','-1','-1','-1','-1','-1','-1','$DateTime','-1','-1','-1','-1','$set_status')";
        // $sqlsec = "CALL sp_Insert_Update_Delete_tbSupport('$comment_id','$set_status')";
        $qsec = $dbo->prepare($sqlsec);
        $qsec->execute();

        echo $sql;
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













































































<?php
// try {
//     require_once('../../conn/db.php');
//     error_reporting(E_ERROR | E_PARSE);	

//     // session_start();

//     // $id = $_SESSION['intUserID'];
//     $error = '';
//     $comment_name = '';
//     $comment_content = '';


//     if(empty($_POST["comment_name"]))
//     {
//         $error .= '<p class="text-danger">there is not ID</p>';
//     }
//     else
//     {
//         $comment_name = $_POST["comment_name"];
//     }




//     if(empty($_POST["comment_content"]))
//     {
//         $error .= '<p class="text-danger">comment is required.</p>';
//     }
//     else
//     {
//         $comment_content = $_POST["comment_content"];
//     }
//     $txtsubject = $_POST["txtsubject"];

//     $id = $_POST["comment_id"];


//     if($error == '')
//     {
//         $sql = "INSERT INTO tbl_comment (parent_comment_id,comment,comment_sender_name)
//                 VALUES ('$id','$comment_content','$comment_name')";

//         $q = $dbo->prepare($sql);
//         $q->execute();
//         $q->setFetchMode(PDO::FETCH_ASSOC);

//         echo $sql;

//         $error = '<label class="text-success">جواب داده شد.</label>';
//     }


//     $data = array(
//         'error'     => $error
//     );

//     echo json_encode($data);

// } catch (Exception $e) {
//     echo "ERROR : Error!";
//     print_r( $e );
// }
?> 