
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $intUserID = $_POST['user_id'];

    if (isset($_POST['new'])) {
        $sql = "SELECT * FROM view_tbsupport WHERE intUserID='$intUserID' AND intSupportParentID='0' AND intSupportStatus <= '1' ORDER BY intSupportID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {

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



                $status = $row['intSupportStatus'];
                if ($status == 0) {
                    $status_str = '<div class="btn-warning text-center" style="border-radius: 5px;width: 60%;padding:3px;" id="id-' . $row["intSupportID"] . '">باز</div>';
                } elseif ($status == 1) {
                    $status_str = '<div class="btn-success text-center" style="border-radius: 5px;width: 60%;padding:3px;" id="id-' . $row["intSupportID"] . '">پاسخ داده شد</div>';
                } elseif ($status == 2) {
                    $status_str = '<div  class="btn-dark text-center" style="border-radius: 5px;width: 60%;padding:3px;" id="id-' . $row["intSupportID"] . '">بسته</button>';
                }

                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrSupportSubject"] . '</td>
                        <td>' . $vcr_date_array . '</td>
                        <td>' . $status_str . '</td>
                        <td><a href="fetch-request.php"><button type="button" class="btn btn-primary chat" id="' . $row["intSupportID"] . '">مشاهده </button></a></td>
                    </tr>';
            }
        }

        echo $output;
    } else if (isset($_POST['history'])) {
        $sql = "SELECT * FROM view_tbsupport WHERE intUserID='$intUserID' AND intSupportParentID='0' AND intSupportStatus='2' ORDER BY intSupportID DESC";
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

                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrSupportSubject"] . '</td>
                        <td>' . $vcr_date_array . '</td>
                        <td><a href="fetch-closed-request.php"><button type="button" class="btn btn-dark chat" style="width:100px;border-radius:5px; padding:5px 15px; padding:5px" id="' . $row["intSupportID"] . '">مشاهده</button></a></td>
                    </tr>';
            }
        }

        echo $output;
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
