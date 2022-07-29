
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $idu = $_POST['idu'];

    $sql = "SELECT * FROM view_tbsupport WHERE intSupportParentID='0' AND intUserID='$idu' AND intSupportStatus <= '1' ORDER BY intSupportID DESC";
    $q = $dbo->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);

    if (isset($_POST['get'])) {

        echo $idu;
        $number_of_rows = $q->rowCount();
        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {

                // $sex = $row["intUserRelSex"];
                // if ($sex == '1') {
                //     $sex_str = "آقای";
                // } elseif ($sex == '2') {
                //     $sex_str = "خانم";
                // }

                $date = $row['datSupportDateTime'];
                $array = explode(' ', $date);
                //print_r($array);
                list($year, $month, $day) = explode('-', $array[0]);
                list($hour, $minute, $second) = explode(':', $array[1]);
                $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                //echo $timestamp;
                $jalali_date = jdate("Y/m/d", $timestamp);
                // echo $timestamp;

                $vcr_date = explode(' ', $row['vcrSupportDateTime']);
                $vcr_date_array = $vcr_date[0];
                $vcr_time_array = $vcr_date[1];

                // $Barcode = $row['vcrBarcode'];

                $priority = $row['intSupportPriority'];
                if ($priority == 1) {
                    $priority_str = '<div class="bg-info text-white text-center" style="margin:5px 25px; padding:3px; border-radius:5px">کم</div>';
                } elseif ($priority == 2) {
                    $priority_str = '<div class="bg-dark text-white text-center" style="margin:5px 25px; padding:3px; border-radius:5px">متوسط</div>';
                } elseif ($priority == 3) {
                    $priority_str = '<div class="bg-warning text-center" style="margin:5px 25px; padding:3px; border-radius:5px">زیاد</div>';
                } elseif ($priority == 4) {
                    $priority_str = '<div class="bg-danger text-white p-1 text-center" style="margin:5px 25px; padding:3px; border-radius:5px">اورژانسی</div>';
                }

                $status = $row['intSupportStatus'];
                if ($status == 0) {
                    $status_str = '<button type="button" class="btn btn-warning this-status" style="width:80px" id="id-' . $row["intSupportID"] . '">باز</button>';
                } elseif ($status == 1) {
                    $status_str = '<button type="button" class="btn btn-success this-status" style="width:80px" id="id-' . $row["intSupportID"] . '">پاسخ داده شد</button>';
                } elseif ($status == 2) {
                    $status_str = '<button type="button" class="btn btn-dark this-status" style="width:80px" id="id-' . $row["intSupportID"] . '">بسته</button>';
                }


                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrSupportSubject"] . '</td>
                        <td>' . $priority_str . '</td>
                        <td>' . $vcr_date_array . '</td>
                        <td>' . $status_str . '</td>
                        <td><a href="comment-user.php" ><button type="button" class="btn btn-primary response" id="' . $row["intSupportID"] . '"><i class="fa fa-eye"></i></button></a></td>
                    </tr>';
            }
        }
        // echo json_encode($output);
        echo $output;
    }
    if (isset($_POST['get_name'])) {

        // $sqls = "SELECT * FROM view_tbsupport WHERE intSupportParentID='0' AND intUserID='$idu' AND intSupportStatus = '0'";
        // $qs = $dbo->prepare($sqls);
        // $qs->execute();

        foreach ($q as $row) {
            $output_array["FNameUser"] = $row["vcrFNameUser"];
            $output_array["LNameUser"] = $row["vcrLNameUser"];
        }
        echo json_encode($output_array);
    }
    if (isset($_POST['set_status'])) {
        $set_status = $_POST['set_status'];
        $DateTime=date('Y-m-d H:i:s');
        // $sql = "UPDATE tbsupport SET intSupportStatus = '$set_status' WHERE intSupportParentID='0' AND intUserID='$idu'";

        $sql = "CALL sp_Insert_Update_Delete_tbSupport('$idu','-1','-1','-1','-1','-1','-1','$DateTime','-1','-1','-1','-1','$set_status')";
        // $sql = "CALL sp_Insert_Update_Delete_tbSupport('$idu','$set_status')";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        echo $sql;
    }











    if (isset($_POST['get_closed_messages'])) {

        $sql = "SELECT * FROM view_tbsupport WHERE intSupportParentID='0' AND intUserID='$idu' AND intSupportStatus = '2' ORDER BY intSupportID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();
        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {


                $vcr_date = explode(' ', $row['vcrSupportDateTime']);
                $vcr_date_array = $vcr_date[0];
                $vcr_time_array = $vcr_date[1];



                // $date = $row['datSupportDateTime'];
                // $array = explode(' ', $date);
                // //print_r($array);
                // list($year, $month, $day) = explode('-', $array[0]);
                // list($hour, $minute, $second) = explode(':', $array[1]);
                // $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                // //echo $timestamp;
                // $jalali_date = jdate("Y/m/d", $timestamp);
                // // echo $timestamp;

                $priority = $row['intSupportPriority'];
                if ($priority == 1) {
                    $priority_str = '<div class="alert bg-info p-1 text-white text-center" style="width:80px">کم</div>';
                } elseif ($priority == 2) {
                    $priority_str = '<div class=" alert bg-dark text-white p-1 text-center" style="width:80px">متوسط</div>';
                } elseif ($priority == 3) {
                    $priority_str = '<div class="alert bg-warning p-1 text-center" style="width:80px">زیاد</div>';
                } elseif ($priority == 4) {
                    $priority_str = '<div class="alert bg-danger text-white p-1 text-center" style="width:80px">اورژانسی</div>';
                }

                $status = $row['intSupportStatus'];
                if ($status == 0) {
                    $status_str = '<button type="button" class="btn btn-warning this-status-closed" style="width:80px" id="idc-' . $row["intSupportID"] . '">باز</button>';
                } elseif ($status == 1) {
                    $status_str = '<button type="button" class="btn btn-success this-status-closed" style="width:80px" id="idc-' . $row["intSupportID"] . '">پاسخ داده شد</button>';
                } elseif ($status == 2) {
                    $status_str = '<button type="button" class="btn btn-dark this-status-closed" style="width:80px" id="idc-' . $row["intSupportID"] . '">بسته</button>';
                }


                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrSupportSubject"] . '</td>
                        <td>' . $priority_str . '</td>
                        <td>' . $vcr_date_array . '</td>
                        <td>' . $status_str . '</td>
                        <td><a href="comment-user.php" ><button type="button" class="btn btn-primary response" id="' . $row["intSupportID"] . '"><i class="fa fa-eye"></i></button></a></td>
                        
                    </tr>';
            }
        }
        echo $output;
        // $x = 246;
        // echo fa_number($x); // ۲۴۶
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}






// function fa_number($number)
// {
//     if (!is_numeric($number) || empty($number))
//         return '۰';
//     $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
//     $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
//     return str_replace($en, $fa, $number);
// }













?> 
