
<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    // Downloads files
    if (isset($_GET['file_id_ImgInvoiceFile'])) {
        $id = $_GET['file_id_ImgInvoiceFile'];

        // fetch file to download from database
        $sql = "SELECT * FROM tbinvoices WHERE intInvoicesID='$id'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file = $result->fetch(PDO::FETCH_ASSOC);

        // $filepath = 'uploads/' . $file['name'];
        $filepathDB1 = str_replace("../", "", $file['vcrInvoicesImgInvoiceFile']);
        $filepath1 = '../../admin-avid-system/handle/' . $filepathDB1;

        if (file_exists($filepath1)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepathDB1) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath1));
            readfile($filepath1);
        }
    }


    if (isset($_GET['file_id_ImgAgreementFile'])) {
        $id = $_GET['file_id_ImgAgreementFile'];

        // fetch file to download from database
        $sql = "SELECT * FROM tbinvoices WHERE intInvoicesID='$id'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file = $result->fetch(PDO::FETCH_ASSOC);

        // $filepath = 'uploads/' . $file['name'];
        $filepathDB2 = str_replace("../", "", $file['vcrInvoicesImgAgreementFile']);
        $filepath2 = '../../admin-avid-system/handle/' . $filepathDB2;

        if (file_exists($filepath2)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepathDB2) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath2));
            readfile($filepath2);
        }
    }


    if (isset($_GET['file_id_ImgRecieveFile'])) {
        $id = $_GET['file_id_ImgRecieveFile'];

        // fetch file to download from database
        $sql = "SELECT * FROM tbinvoices WHERE intInvoicesID='$id'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file = $result->fetch(PDO::FETCH_ASSOC);

        // $filepath = 'uploads/' . $file['name'];
        $filepathDB3 = str_replace("../", "", $file['vcrInvoicesImgRecieveFile']);
        $filepath3 = '../../admin-avid-system/handle/' . $filepathDB3;

        if (file_exists($filepath3)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepathDB3) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath3));
            readfile($filepath3);
        }
    }





    if (isset($_GET['file_id_PreInvoiceFilePath'])) {
        // session_start();
        // $iduser = $_SESSION['intUserID'];
        $id = $_GET['file_id_PreInvoiceFilePath'];

        // fetch file to download from database
        $sql = "SELECT * FROM tbpreinvoices WHERE intPreInvoiceID='$id'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file = $result->fetch(PDO::FETCH_ASSOC);

        // $filepath = 'uploads/' . $file['name'];
        $filepathDB4 = str_replace("../", "", $file['vcrPreInvoiceFilePath']);
        $filepath4 = '../../admin-avid-system/handle/' . $filepathDB4;

        if (file_exists($filepath4)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepathDB4) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath4));
            readfile($filepath4);
        }
    }





    // Downloads files
    if (isset($_GET['file_id'])) {
        $id = $_GET['file_id'];

        // fetch file to download from database
        $sql = "SELECT * FROM tbsupport WHERE intSupportID='$id'";

        $result = $dbo->prepare($sql);
        $result->execute();
        $file = $result->fetch(PDO::FETCH_ASSOC);

        // $result = mysqli_query($conn, $sql);
        // $file = mysqli_fetch_assoc($result);
        // $filepath = 'uploads/' . $file['name'];
        $filepathDB = str_replace("../", "", $file['vcrSupportFile']);
        $filepath = '../' . $filepathDB;

        $basename =  str_replace("file/" . $file['intUserID']  . "/", "", $filepathDB);

        // echo  $filepath;
        $count = 0;
        if (file_exists($filepath)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($basename) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);




            echo $count;
            // Now update downloads count
            $newCount = $file['intSupportDownloadCount'] + 1;
            $updateQuery = "UPDATE tbsupport SET intSupportDownloadCount='$newCount' WHERE intSupportID='$id'";
            $result_update = $dbo->prepare($updateQuery);
            $result_update->execute();
            // mysqli_query($conn, $updateQuery);
            exit;
        }
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
