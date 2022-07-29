<?php

include_once('jdf.php');


try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    if (isset($_POST['get'])) {

        $id = $_POST['id'];
        $idu = $_POST['idu'];
        $sql = "SELECT * FROM tbusers ORDER BY intUserID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {
                // if(count($row["vcrProfileImage"]) == 0 ) {
                //     $userimg = 'assets/img/user_icon.png';
                // }
                // else{
                //     $userimg = 'users/manage/'.$row["vcrImagePath"];
                // }

                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrFNameUser"] . ' ' . $row["vcrLNameUser"] . '</td>
                        <td>
                        <button type="button" id="' . $row["intUserID"] . '" class="btn btn-primary view_profile"><i class="fas fa-search"></i></button>
                        <button type="button" id="id-' . $row["intUserID"] . '" class="btn btn-danger edit-user"><i class="fa fa-edit"></i></button>
                        <button type="button" id="id-del-' . $row["intUserID"] . '" class="btn btn-danger del-user"><i class="fa fa-trash"></i></button></td>
                    </tr>';
            }

            $intUserID = $row["vcrFNameUser"];
        }

        echo $intUserID;
        echo $output;
    } else if (isset($_POST['register_user_edit'])) {

        $flag = $_POST["flag"];
        $rad_hahighi_hoghoghi = $_POST['rad_hahighi_hoghoghi'];
        $firstname = $_POST['txtfirstname'];
        $lastname = $_POST['txtlastname'];
        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];
        $repassword = $_POST['txtpassword'];
        $email = $_POST['txtemail'];
        $phone = $_POST['txtphone'];
        $mobile = $_POST['txtmobile'];
        $address = $_POST['txtaddress'];
        $maplat = $_POST['txtmaplat'];
        $maplag = $_POST['txtmaplag'];
        $ImgProfileUser = NULL; //$_POST['ImgProfileUser'];

        // $email = $_POST['txtemail'];
        // $email = $_POST['txtemail'];

        $date = date("Y-m-d");
        $time = date("H:i:s");
        $Datetime = $date . " " . $time;

        // ensure that form fields are filled properly
        if (empty($firstname)) {
            array_push($errors, "وضعیت حقیقی/حقوقی را مشخص نکردید");
        }
        if (empty($firstname)) {
            array_push($errors, "فیلد نام خالی است");
        }
        if (empty($username)) {
            array_push($errors, "فیلد نام کاربری خالی است");
        }
        if (empty($password)) {
            array_push($errors, "فیلد رمز عبور خالی است");
        }
        if (empty($email)) {
            array_push($errors, "فیلد ایمیل خالی است");
        }

        $select = $dbo->prepare("SELECT * FROM tbusers WHERE vcrUsernameUser='$username' ");
        $select->execute();
        $count = $select->rowCount();
        // echo $count;

        if ($count > 0) {
            array_push($errors, "نام کاربری قبلا ثبت شده است، لطفا نام کاربری دیگری را انتخاب نمایید");
        }

        if (count($errors) == 0) {
            $password = md5($password);

            // $sql = "INSERT INTO tbusers (intHoghogiHaghighiUser,vcrFNameUser,vcrLNameUser,vcrUsernameUser,vcrPasswordUser,vcrEmailUser,vcrPhoneNumberUser,datCreatedUser,vcrAddressUser,vcrMapLat,vcrMapLag )
            // VALUES ('$rad_hahighi_hoghoghi','$firstname','$lastname','$username','$password','$repassword','$email','$phone','$Datetime','$address','$maplat','$maplag')";
            // mysqli_query($dbo, $sql);

            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "CALL sp_Insert_Update_Delete_tbUsers('$flag','$rad_hahighi_hoghoghi','$firstname','$lastname','$username','$password','$repassword','$email','$phone','$mobile','$Datetime','$address','$maplat','$maplag','$ImgProfileUser')";
            $q = $dbo->prepare($sql);
            $q->execute();
            $q->setFetchMode(PDO::FETCH_ASSOC);

            // if (!file_exists('users/user-galleries/'.$username)) {
            // 	mkdir('users/'.$username, 0777, true);
            // 	mkdir('users/'.$username.'/thumbnail', 0777, true);
            // }

            // header("Location: handle/insert-users-specific.php");
        }

        // $insert = $con->prepare("INSERT INTO tbUsers (name,email,pass,date,month,year)
        // value(:name,:email,:pass,:date,:month,:year)");

        // $insert->bindParam(':name',$name);
        // $insert->bindParam(':email',$email);
        // $insert->bindParam(':pass',$pass);
        // $insert->bindParam(':date',$date);
        // $insert->bindParam(':month',$month);
        // $insert->bindParam(':year',$year);		
        // $insert->execute();

    } else if (isset($_POST["edit_user"])) {

        //EDIT
        $flag = $_POST["flag"];
        $sql = "SELECT * FROM tbusers WHERE intUserID='$flag'";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        foreach ($statement as $row) {
            $output_d['UserID'] = $row['intUserID'];
            $output_d['HoghogiHaghighiUser'] = $row['intHoghogiHaghighiUser'];
            $output_d['FNameUser'] = $row['vcrFNameUser'];
            $output_d['LNameUser'] = $row['vcrLNameUser'];
            $output_d['UsernameUser'] = $row['vcrUsernameUser'];
            $output_d['PasswordUser'] = $row['vcrPasswordUser'];
            $output_d['RepeatPasswordUser'] = $row['vcrRepeatPasswordUser'];
            $output_d['EmailUser'] = $row['vcrEmailUser'];
            $output_d['PhoneNumberUser'] = $row['vcrPhoneNumberUser'];
            $output_d['MobileNumberUser'] = $row['vcrMobileNumberUser'];
            $output_d['AddressUser'] = $row['vcrAddressUser'];
            $output_d['MapLat'] = $row['vcrMapLat'];
            $output_d['MapLag'] = $row['vcrMapLag'];
        }

        echo json_encode($output_d);
    } 
    if (isset($_POST["del_user"])) {
        
        $flag = $_POST["flag"];
        
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $Datetime = $date . " " . $time;
        
        //Delete User
        $sql = "CALL sp_Insert_Update_Delete_tbUsers('$flag','-1','Del','-1','-1','-1','-1','-1','-1','-1','$Datetime','-1','-1','-1','-1')";
        $q = $dbo->prepare($sql);
        $q->execute();
    }












    if (isset($_POST["fetch_users_address"])) {

        // $id = $_POST['id'];
        // $idu = $_POST['idu'];
        $sql = "SELECT * FROM view_tbipuser_tbuser ORDER BY intIPUserID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();
        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            $date = "";

            foreach ($q as $row) {


                $date = $row['datIPUserEntryDateTime'];
                $array = explode(' ', $date);
                // //print_r($array);
                list($year, $month, $day) = explode("-", $array[0]);
                list($hour, $minute, $second) = explode(":", $array[1]);
                $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                // echo
                // //echo $timestamp;


                // echo strtotime($date);
                // return;
                // date_default_timezone_set("Oslo");
                // date_default_timezone_set("Asia/Tehran");
                // echo "The time is " . date("h:i:sa");
                // Greenwich


                $jalali_date = jdate("l j F Y، ساعت  G:i:s A ", $timestamp, "", "Asia/Tehran");
                // echo $timestamp;
                // $jalali_date = gregorian_to_jalali($year, $month, $day, '/') . ' ' . $jalali_time;

                // print_r($hour . $minute . $second);
                // print_r(jdate("H:i:s", $timestamp));
                // return;
                echo $jalali_date;





                $online = $row['intIPUserStatusOnline'];
                if ($online == 0) {
                    $online_str = 'آنلاین';
                } else if ($online == 1) {
                    $online_str = 'آفلاین';
                }
                // jalali_to_gregorian(1389, 11, 22);


                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrFNameUser"] . ' ' . $row["vcrLNameUser"] . '</td>
                        <td>' . $row["vcrUsernameUser"] . '</td>
                        <td>' . $row["vcrIPUserAddress"] . '</td>
                        <td>' . $row["vcrIPUserOS"] . '</td>
                        <td>' . $row["vcrIPUserBrowser"] . '</td>
                        <td>' . $row["vcrIPUserDevice"] . '</td>
                        <td>' . $row['vcrIPUserEntryDateTime'] . '</td>                        
                    </tr>';
            }
        }
        echo $output;
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
