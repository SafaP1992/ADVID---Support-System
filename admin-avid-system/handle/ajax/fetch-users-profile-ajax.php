
<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $user_id = $_POST["user_id"];

    $sql = "SELECT * FROM tbusers WHERE intUserID='$user_id'";
    $statement = $dbo->prepare($sql);
    $statement->execute();


    foreach ($statement as $row) {
        $output['HoghogiHaghighiUser'] = $row['intHoghogiHaghighiUser'];
        $output['FNameUser'] = $row['vcrFNameUser'];
        $output['LNameUser'] = $row['vcrLNameUser'];
        $output['UsernameUser'] = $row['vcrUsernameUser'];
        $output['PasswordUser'] = $row['vcrPasswordUser'];
        $output['RepeatPasswordUser'] = $row['vcrRepeatPasswordUser'];
        $output['EmailUser'] = $row['vcrEmailUser'];
        $output['PhoneNumberUser'] = $row['vcrPhoneNumberUser'];
        $output['AddressUser'] = $row['vcrAddressUser'];
        $output['MapLat'] = $row['vcrMapLat'];
        $output['MapLag'] = $row['vcrMapLag'];
    }

    echo json_encode($output);



    // $number_of_rows = $q->rowCount();

    // $output = '';
    // if ($number_of_rows > 0) {
    //     $count = 1;
    //     foreach ($q as $row) {
    //         // if(count($row["vcrProfileImage"]) == 0 ) {
    //         //     $userimg = 'assets/img/user_icon.png';
    //         // }
    //         // else{
    //         //     $userimg = 'users/manage/'.$row["vcrImagePath"];
    //         // }

    //         $output .= '
    //                 <tr>
    //                     <td>' . $count++ . ' </td>
    //                     <td>' . $row["vcrFNameUser"] . ' ' . $row["vcrLNameUser"] . '</td>
    //                     <td><button type="button" id="' . $row["intUserID"] . '" class="btn btn-primary view_profile">مشاهده مشخصات</button></td>
    //                 </tr>';
    //     }

    //     $intUserID = $row["vcrFNameUser"];
    // }

    // echo $intUserID;
    // echo $output;
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
