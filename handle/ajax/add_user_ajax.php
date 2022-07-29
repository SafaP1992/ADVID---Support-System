
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $flag = $_POST["flag"];
    $iduser = $_SESSION['intUserID'];
    $sex = $_POST["radsex"];
    $name = $_POST["name"];
    $section = $_POST["section"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $DateTime = date("Y-m-d H:i:s");

    if (isset($_POST["insert"])) {
        $sql = "CALL sp_Insert_Update_Delete_tbUsersRel('$flag','$iduser','$sex','$name','$section','$phone','$email','$address','0')";
        // $sql = "INSERT INTO tbusersrel (intUserID,intUserRelSex,vcrUserRelName,vcrUserRelSection,vcrUserRelContact,vcrUserRelEmail,vcrUserRelAddress)
                    // VALUES ('$iduser','$sex','$name','$section','$phone','$email','$address')";

        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        echo $sql;
    }
    
    if (isset($_POST["del"])) {
        
        
        $flag = $_POST["flag"];
        
        $sql = "SELECT * FROM tbusersrel WHERE intUserRelID='$flag' ORDER BY intUserRelID DESC";
        $statement = $dbo->prepare($sql);
        $statement->execute();
        
        foreach ($statement as $row) {
            $output_d['UserRelSex'] = $row['intUserRelSex'];
            $output_d['UserRelName'] = $row['vcrUserRelName'];
            $output_d['UserRelSection'] = $row['vcrUserRelSection'];
            $output_d['UserRelContact'] = $row['vcrUserRelContact'];
            $output_d['UserRelEmail'] = $row['vcrUserRelEmail'];
            $output_d['UserRelAddress'] = $row['vcrUserRelAddress'];
        }
        $array1 = $output_d['UserRelSex'];
        $array2 = $output_d['UserRelName'];
        $array3 = $output_d['UserRelSection'];
        $array4 = $output_d['UserRelContact'];
        $array5 = $output_d['UserRelEmail'];
        $array6 = $output_d['UserRelAddress'];
        
        $sql_del = "CALL sp_Insert_Update_Delete_tbUsersRel('$flag','$iduser','$array1','$array2','$array3','$array4','$array5','$array6','1')";
        // $sql = "INSERT INTO tbusersrel (intUserID,intUserRelSex,vcrUserRelName,vcrUserRelSection,vcrUserRelContact,vcrUserRelEmail,vcrUserRelAddress)
                    // VALUES ('$iduser','$sex','$name','$section','$phone','$email','$address')";

        echo $sql_del;
        $q = $dbo->prepare($sql_del);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        
    }
    
    if (isset($_POST["edit"])) {
        $user_id = $_POST['user_id'];

        $sql = "SELECT * FROM tbusersrel WHERE intUserRelID='$user_id'  ORDER BY intUserRelID DESC";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        foreach ($statement as $row) {
            $output_d['UserRelSex'] = $row['intUserRelSex'];
            $output_d['UserRelName'] = $row['vcrUserRelName'];
            $output_d['UserRelSection'] = $row['vcrUserRelSection'];
            $output_d['UserRelContact'] = $row['vcrUserRelContact'];
            $output_d['UserRelEmail'] = $row['vcrUserRelEmail'];
            $output_d['UserRelAddress'] = $row['vcrUserRelAddress'];
        }

        echo json_encode($output_d);
    }
    if (isset($_POST["userrel_id"])) {

        $user_id = $_POST['userrel_id'];  // =====> flag    مثل این عمل میکنه
        $gender = $_POST['userrel_radsex'];
        $name = $_POST['userrel_name'];
        $section = $_POST['userrel_section'];
        $contact = $_POST['userrel_contact'];
        $email = $_POST['userrel_email'];
        $address = $_POST['userrel_address'];

        $sql = "CALL sp_Insert_Update_Delete_tbUsersRel('$user_id','$iduser','$gender','$name','$section','$contact','$email','$address','0')";
        // $sql = "UPDATE tbusersrel SET intUserRelSex='$gender',vcrUserRelName='$name',vcrUserRelSection='$section',vcrUserRelContact='$contact', vcrUserRelEmail='$email',vcrUserRelAddress='$address' WHERE intUserRelID='$user_id'";

        $statement = $dbo->prepare($sql);
        $statement->execute();
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
