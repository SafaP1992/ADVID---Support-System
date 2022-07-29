
<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

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
        $filepath = '../../../handle/' . $filepathDB;

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




            // echo $count;
            // Now update downloads count
            // $newCount = $file['intSupportDownloadCount'] + 1;
            // $updateQuery = "UPDATE tbsupport SET intSupportDownloadCount='$newCount' WHERE intSupportID='$id'";
            // $result_update = $dbo->prepare($updateQuery);
            // $result_update->execute();
            // mysqli_query($conn, $updateQuery);
            exit;
        }
    }






    if (isset($_GET['id_detail1'])) {
        
        $id_detail1 = $_GET['id_detail1'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail1'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file1 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file1['vcrEnamadInfo_File_CartMeli']);
        $filepath1 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath1)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath1) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath1));
            readfile($filepath1);
            exit;
        }
    }
    
    
    
    if (isset($_GET['id_detail2'])) {
        
        $id_detail2 = $_GET['id_detail2'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail2'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file2 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file2['vcrEnamadInfo_File_Shenasnameh']);
        $filepath2 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath2)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath2) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath2));
            readfile($filepath2);
            exit;
        }
    }
    
    
    
    if (isset($_GET['id_detail3'])) {
        
        $id_detail3 = $_GET['id_detail3'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail3'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file3 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file3['vcrEnamadInfo_File_Personal']);
        $filepath3 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath3)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath3) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath3));
            readfile($filepath3);
            exit;
        }
    }
    
    
    
    if (isset($_GET['id_detail4'])) {
        
        $id_detail4 = $_GET['id_detail4'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail4'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file4 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file4['vcrEnamadInfo_File_PayanKhedmat']);
        $filepath4 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath4)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath4) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath4));
            readfile($filepath4);
            exit;
        }
    }
    
    
    
    if (isset($_GET['id_detail5'])) {
        
        $id_detail5 = $_GET['id_detail5'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail5'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_KasboKar_File_Logo']);
        $filepath5 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath5)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath5) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath5));
            readfile($filepath5);
            exit;
        }
    }












    //      FOR    SECOND       DOCUMNET

    if (isset($_GET['id_detail6'])) {
        
        $id_detail6 = $_GET['id_detail6'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail6'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_File_AsasName']);
        $filepath5 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath5)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath5) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath5));
            readfile($filepath5);
            exit;
        }
    }


    if (isset($_GET['id_detail7'])) {
        
        $id_detail7 = $_GET['id_detail7'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail7'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_File_AdsRooznameh']);
        $filepath5 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath5)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath5) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath5));
            readfile($filepath5);
            exit;
        }
    }


    if (isset($_GET['id_detail8'])) {
        
        $id_detail8 = $_GET['id_detail8'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail8'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_File_AkharinTakhiratManagment']);
        $filepath5 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath5)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath5) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath5));
            readfile($filepath5);
            exit;
        }
    }


    if (isset($_GET['id_detail9'])) {
        
        $id_detail9 = $_GET['id_detail9'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail9'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_File_AkharinTakhiratSherkat']);
        $filepath9 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath9)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath9) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath9));
            readfile($filepath9);
            exit;
        }
    }


    if (isset($_GET['id_detail10'])) {
        
        $id_detail10 = $_GET['id_detail10'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$id_detail10'";
        $result = $dbo->prepare($sql);
        $result->execute();
        $file5 = $result->fetch(PDO::FETCH_ASSOC);
        
        $filepathDB = str_replace("../", "", $file5['vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat']);
        $filepath10 = '../../../handle/' . $filepathDB;

        if (file_exists($filepath10)) {
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath10) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath10));
            readfile($filepath10);
            exit;
        }
    }







    // if (isset($_GET['file_id'])) {
    //     $id = $_GET['file_id'];

    //     // fetch file to download from database
    //     $sql = "SELECT * FROM tbsupport WHERE intSupportID='$id'";

    //     $result = $dbo->prepare($sql);
    //     $result->execute();
    //     $file = $result->fetch(PDO::FETCH_ASSOC);

    //     // $result = mysqli_query($conn, $sql);
    //     // $file = mysqli_fetch_assoc($result);
    //     // $filepath = 'uploads/' . $file['name'];
    //     $filepathDB = str_replace("../", "", $file['vcrSupportFile']);
    //     $filepath = '../../handle/' . $filepathDB;

    //     $basename =  str_replace("file/" . $file['intUserID']  . "/", "", $filepathDB);

    //     echo  $basename;
    //     $count = 0;
    //     if (file_exists($filepath)) {
    //         ob_end_clean();
    //         header('Content-Description: File Transfer');
    //         header('Content-Type: application/octet-stream');
    //         header('Content-Disposition: attachment; filename="' . basename($basename) . '"');
    //         header('Expires: 0');
    //         header('Cache-Control: must-revalidate');
    //         header('Pragma: public');
    //         header('Content-Length: ' . filesize($filepath));
    //         readfile($filepath);




    //         echo $count;
    //         // Now update downloads count
    //         $newCount = $file['intSupportDownloadCount'] + 1;
    //         $updateQuery = "UPDATE tbsupport SET intSupportDownloadCount='$newCount' WHERE intSupportID='$id'";
    //         $result_update = $dbo->prepare($updateQuery);
    //         $result_update->execute();
    //         // mysqli_query($conn, $updateQuery);
    //         exit;
    //     }
    // }





} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
?> 
