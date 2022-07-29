
<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $id = $_POST['id'];
    $idu = $_POST['idu'];

    $sql = "SELECT * FROM view_tbsupportGroup WHERE intSupportParentID='0'";
    $q = $dbo->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $number_of_rows = $q->rowCount();

    $output = '';
    if ($number_of_rows > 0) {
        $count = 1;
        foreach ($q as $row) {

            $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrFNameUser"] . ' ' . $row["vcrLNameUser"] . '</td>
                        <td>' . $row["COUNT(*)"] . ' درخواست</td>
                        <td><a href="fetch-user-comments.php" ><button type="button" class="btn btn-primary response" id="' . $row["intUserID"] . '">مشاهده </button></a></td>
                    </tr>';
        }
    }

    echo $output;
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
