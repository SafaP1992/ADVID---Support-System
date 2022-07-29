
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $flag = -1;
    $iduser = $_SESSION['intUserID'];
    $error = '';
    $comment_id = '';
    $comment_content = '';
    $inputState = $_POST["inputState"];
    $inputResponse = $_POST["inputResponse"];


    if (empty($_POST["comment_subject"])) {
        $error .= '<p class="text-danger">لطفا موضوع درخواستی را بنویسید</p>';
    } else {
        $comment_subject = $_POST["comment_subject"];
    }

    // if (empty($_POST["inputState"])) {
    //     $error .= '<p class="text-danger">اولویت پیام شما را مشخص نکردید</p>';
    //     // $error .= '<p class="text-danger">' . $_POST["inputState"] . '</p>';
    // } else {
    //     $inputState = $_POST["inputState"];
    // }

    // echo $inputState;

    if (empty($_POST["comment_content"])) {
        $error .= '<p class="text-danger">متن شرح را ننوشتید</p>';
    } else {
        $comment_content = addslashes($_POST["comment_content"]);
    }

    $DateTime = date("Y-m-d H:i:s");

    $date = date("Y-m-d H:i:s");
    $array = explode(' ', $date);
    list($year, $month, $day) = explode("-", $array[0]);
    list($hour, $minute, $second) = explode(':', $array[1]);
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));

    $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
    // echo $rand;

    if ($error == '') {

        if (empty($_FILES["inputfile"]["name"])) {
            $file_name = NULL;
        } else {
            if (!file_exists('../file/' . $iduser . '/' . $rand)) {
                mkdir('../file/' . $iduser . '/' . $rand, 0777, true);
            }
            $target_dir = "../file/" . $iduser . "/" . $rand . "/";
            $target_file = $target_dir . basename($_FILES["inputfile"]["name"]);
            move_uploaded_file($_FILES["inputfile"]["tmp_name"], $target_file);
            // echo $_FILES["inputfile"]["name"];
            $file_name =  $target_file ;
        }

        $sql = "CALL sp_Insert_Update_Delete_tbSupport('$flag','0',NULL,'$iduser','$comment_subject','$inputState','$comment_content','$DateTime','$jalali_date','$file_name','$rand','$inputResponse','0')";
        // $sql = "INSERT INTO tbsupport (intSupportParentID,intAdminID,intUserID,vcrSupportSubject,intSupportPriority,txtSupportComment,datSupportDateTime,vcrSupportDateTime,vcrSupportFile,vcrBarcode,intUserRelID)
                    // VALUES ('0',NULL,'$iduser','$comment_subject','$inputState','$comment_content','$DateTime','$jalali_date', $file_name,'$rand','$inputResponse')";

        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        // echo $sql;

        $error = '<label class="text-success">پیام درخواستی شما ارسال شد، لطفا منتظر بمانید تا بررسی شود.</label>';

        // header("Location: ../fetch-requests.php");
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