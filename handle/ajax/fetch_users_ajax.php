
<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $intUserID = $_SESSION['intUserID'];

    $sql = "SELECT * FROM tbusersrel WHERE intUserID='$intUserID' AND intUserRel_Del='0' ORDER BY intUserRelID DESC";
    $q = $dbo->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $number_of_rows = $q->rowCount();

    $output = '';
    if ($number_of_rows > 0) {
        $count = 1;
        foreach ($q as $row) {

            $sex = $row["intUserRelSex"];
            if ($sex == '1') {
                $sex_str = "آقای";
            } elseif ($sex == '2') {
                $sex_str = "خانم";
            }

            $output .= '
                    <tr>
                        <td>' . $count ++. '</td>
                        <td>' . $sex_str . ' ' . $row["vcrUserRelName"] . '</td>
                        <td>' . $row["vcrUserRelSection"] . '</td>
                        <td>' . $row["vcrUserRelContact"] . '</td>
                        <td>' . $row["vcrUserRelEmail"] . '</td>
                        <td><button type="button" class="btn btn-primary info-details" id="' . $row["intUserRelID"] . '"><i class="fas fa-search"></i></button>
                        <button type="button" class="btn btn-primary info-details-delete" id="id-' . $row["intUserRelID"] . '"><i class="fas fa-trash"></i></button></td>
                    </tr>';
        }
    }

    echo $output;
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
