<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);




    if (isset($_POST["get_product"])) {
        $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM tbproducts WHERE intUserID='$user_id' ORDER BY intProductID DESC";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        $number_of_rows = $statement->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($statement as $row) {
                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td data-nameproduct="' . $row["vcrProductName"] . '" class="nameproduct">' . $row["vcrProductName"] . '</td>
                        <td data-agreementproduct="' . $row["vcrAgreementProduct"] . '" class="agreementproduct">' . $row["vcrAgreementProduct"] . '</td>
                        <td data-startproduct= "' . $row["vcrStartDateProductActivity"] . '" class="startproduct"> ' . $row["vcrStartDateProductActivity"] . '</td>
                        <td data-endproduct="' . $row["vcrEndDateProductActivity"] . '" class="endproduct">' . $row["vcrEndDateProductActivity"] . '</td>
                        <td><button type="button" id="' . $row["intProductID"] . '" class="btn btn-danger edit-product"><i class="fas fa-pencil-alt"></i></button>
                        <button type="button" id="id-' . $row["intProductID"] . '" class="btn btn-danger del-product"><i class="fa fa-trash"></i></button></td>
                    </tr>';
            }
        }
        echo $output;
    } else if (isset($_POST["add_edit_product"])) {

        $flag = $_POST["flag"];
        $user_id = $_POST["user_id"];
        $name_product = $_POST["name_product"];
        $agreement_product = $_POST["agreement_product"];
        $startdate_product = $_POST["startdate_product"];
        $enddate_product = $_POST["enddate_product"];

        //ADD
        $sql = "CALL sp_Insert_Update_Delete_tbProducts('$flag','$user_id','$name_product','$agreement_product','$startdate_product','$enddate_product','0')";
        // $sql = "INSERT INTO tbProducts (intUserID,vcrProductName,vcrAgreementProduct,vcrStartDateProductActivity,vcrEndDateProductActivity) VALUES ('$user_id','$name_product','$agreement_product', '$startdate_product','$enddate_product')";
        $statement = $dbo->prepare($sql);
        $statement->execute();
    } else if (isset($_POST["edit_product"])) {

        //EDIT
        $flag = $_POST["flag"];
        $sql = "SELECT * FROM tbproducts WHERE intProductID='$flag'";
        $statement = $dbo->prepare($sql);
        $statement->execute();
        foreach ($statement as $row) {
            $output_d['ProductName'] = $row['vcrProductName'];
            $output_d['AgreementProduct'] = $row['vcrAgreementProduct'];
            $output_d['StartDateProductActivity'] = $row['vcrStartDateProductActivity'];
            $output_d['EndDateProductActivity'] = $row['vcrEndDateProductActivity'];
        }

        echo json_encode($output_d);
    }else if (isset($_POST["del_product"])) {

        //EDIT
        $flag = $_POST["flag"];
        $sql = "CALL sp_Insert_Update_Delete_tbProducts('$flag','-1','Del','-1','-1','-1','0')";
        $statement = $dbo->prepare($sql);
        $statement->execute();
    }






























    if (isset($_POST["get_pre_invoice"])) {
        $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM tbpreinvoices WHERE intUserID='$user_id' ORDER BY intPreInvoiceID DESC";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        $number_of_rows = $statement->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($statement as $row) {

                // $confirmation = $row["bitPreInvoiceConfirmation"];
                if ($row["bitPreInvoiceConfirmation"] == 0) {
                    $confirmation = '<input type="checkbox" id="id-' . $row["intPreInvoiceID"] . '"  class="form-control confirmation" name="confirmation" value="0">غیر فعال';
                } else if ($row["bitPreInvoiceConfirmation"] == 1) {
                    $confirmation = '<input type="checkbox" id="id-' . $row["intPreInvoiceID"] . '"  class="form-control confirmation" name="confirmation" value="1" checked>فعال';
                }

                if ($row["intPreInvoiceStatusSeen"] == 0) {
                    $seen = 'دیده نشد';
                } else if ($row["intPreInvoiceStatusSeen"] == 1) {
                    $seen = 'دیده شد';
                }

                // $date = date("Y-m-d H:i:s");
                // $array = explode(' ', $date);
                // list($year, $month, $day) = explode("-", $array[0]);
                // list($hour, $minute, $second) = explode(':', $array[1]);
                // $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

                // $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));

                $path_file = str_replace("../", "", $row["vcrPreInvoiceFilePath"]);
                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrPreInvoiceDate"] . '</td>
                        <td>' . $row["vcrPreInvoiceExpert"] . '</td>
                        <td><a id="id-' . $row["intPreInvoiceID"] . '" class="info-description-img" id="id-' . $row["intPreInvoiceID"] . '"  href="' . $path_file . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i>مشاهده</button></a></td>
                        <td class="text-center"> ' . $confirmation . '</td>
                        <td> ' . $row["vcrPreInvoiceConfirmationDate"] . '</td>
                        <td>' . $seen . '</td>
                        <td>' . $row["txtPreInvoiceDescription"] . '</td>
                        <td><button type="button" id="' . $row["intPreInvoiceID"] . '" class="btn btn-danger edit-preinvoice"><i class="fa fa-trash"></i></button></td>
                        
                    </tr>';
            }
        }
        echo $output;
    } else if (isset($_POST["add_edit_preinvoice"])) {

        $flag = $_POST["flag"];
        $user_id = $_POST["user_id"];
        $date_preinvoice = $_POST["date_preinvoice"];
        $name_expert = $_POST["name_expert"];
        $file = $_FILES["txtpreinvoice_file"]["name"];
        $confirmation = $_POST["confirmation"];
        $describtion = $_POST["describtion"];
        echo $confirmation;


        $date_time = date("his");
        $date_folder = str_replace("/", "", $date_preinvoice) . $date_time;

        if (empty($confirmation) || $confirmation == 0) {
            $confirmation = 0;
            $date_confirmation_jalali = NULL;
        } else if ($confirmation == 1) {

            // $date_confirmation = date("Y-m-d H:i:s");
            // $array = explode(' ', $date_confirmation);
            // //print_r($array);
            // list($year, $month, $day) = explode('-', $array[0]);
            // list($hour, $minute, $second) = explode(':', $array[1]);
            // $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
            // //echo $timestamp;
            // $jalali_date = jdate("Y/m/d", $timestamp);
            // $jalali_time = jdate("H:i:s", $timestamp);
            // $date_confirmation_jalali = $jalali_date . " " .  $jalali_time;



            $date_confirmation = date("Y-m-d H:i:s");
            $array = explode(' ', $date_confirmation);
            list($year, $month, $day) = explode("-", $array[0]);
            list($hour, $minute, $second) = explode(':', $array[1]);
            $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

            $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));

            $confirmation = 1;
        }
        
        echo $confirmation;

        if (empty($file)) {
            $file_name = 'NULL';
            // return;
        } else {
            if (!file_exists('../pre_invoice_files/' . $user_id . '/' . $date_folder)) {
                mkdir('../pre_invoice_files/' . $user_id . '/' . $date_folder, 0777, true);
            }
            $target_dir = "../pre_invoice_files/" . $user_id . "/" . $date_folder . "/";
            $target_file = $target_dir . basename($_FILES["txtpreinvoice_file"]["name"]);
            move_uploaded_file($_FILES["txtpreinvoice_file"]["tmp_name"], $target_file);
        }

        //ADD
        $sql = "CALL sp_Insert_Update_Delete_tbPreInvoices('$flag','$user_id','$date_preinvoice','$name_expert','$target_file','$confirmation','$jalali_date','$describtion','0')";

        echo $sql;
        $statement = $dbo->prepare($sql);
        $statement->execute();
    } else if (isset($_POST["edit_preinvoice"])) {

        //EDIT
        $flag = $_POST["flag"];
        $sql = "SELECT * FROM tbpreinvoices WHERE intPreInvoiceID='$flag'";
        $statement = $dbo->prepare($sql);
        $statement->execute();
        foreach ($statement as $row) {
            $output_d['PreInvoiceDate'] = $row['vcrPreInvoiceDate'];
            $output_d['PreInvoiceExpert'] = $row['vcrPreInvoiceExpert'];
            $output_d['PreInvoiceFilePath'] = $row['vcrPreInvoiceFilePath'];
            $output_d['PreInvoiceConfirmation'] = $row['bitPreInvoiceConfirmation'];
            $output_d['PreInvoiceDescription'] = $row['txtPreInvoiceDescription'];
        }

        echo json_encode($output_d);
    } else if (isset($_POST["del_preinvoice"])) {

        $flag = $_POST["flag"];
        $user_id = $_POST["user_id"];
        $date_preinvoice = 'Del';


        //DELETE FILE //*****************************
        $sqlcheck = "SELECT * FROM tbpreinvoices WHERE intPreInvoiceID='$flag'";
        $statement_chk = $dbo->prepare($sqlcheck);
        $statement_chk->execute();
        $data = $statement_chk->fetch();
        
        $path_file = $data['vcrPreInvoiceFilePath'];
        // delete_directory($path_file);
        
        // $files = glob($path_file); // get all file names
        $files = glob($path_file, GLOB_BRACE);
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
        
        // $path_file = str_replace("../", "", $data["vcrPreInvoiceFilePath"]);
        // if (!file_exists($path_file)){
        //     echo 'false';
        // }else{
            
        //     echo  $path_file;
        //     echo 'success';
        //     rmdir($path_file);
        // }
        //******************************************
           
           
           
        

        //D E L E T E
        $sql = "CALL sp_Insert_Update_Delete_tbPreInvoices('$flag','$user_id','$date_preinvoice','-1','-1','-1','-1','-1','-1')";

        echo $sql;
        $statement = $dbo->prepare($sql);
        $statement->execute();
    }





























    if (isset($_POST["get_invoice"])) {
        $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM tbinvoices WHERE intUserID='$user_id' ORDER BY intInvoicesID DESC";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        $number_of_rows = $statement->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($statement as $row) {
                $path_file1 = str_replace("../", "", $row["vcrInvoicesImgInvoiceFile"]);
                $path_file2 = str_replace("../", "", $row["vcrInvoicesImgAgreementFile"]);
                $path_file3 = str_replace("../", "", $row["vcrInvoicesImgRecieveFile"]);

                if ($row["intInvoiceStatusSeen"] == 0) {
                    $seen = 'دیده نشد';
                } else if ($row["intInvoiceStatusSeen"] == 1) {
                    $seen = 'دیده شد';
                }

                // $path_info1 = pathinfo($path_file1);
                // echo $path_info1['extension'];


                // header("Content-type: application/pdf");
                // header("Content-Disposition: inline; filename=filename.pdf");
                // @readfile('../' . $path_file3);
                // <img style="width:50px" src="' . pathinfo($path_file2)  . '" alt="' . basename($path_file2)  . '" />

                $output .= '
                    <tr>
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrInvoicesPublishedDate"] . '</td>
                        <td>' . $row["vcrInvoicesExpertName"] . '</td>
                        <td>
                        <a class="info-description-img1" id="id1-' . $row["intInvoicesID"] . '" href="' . $path_file1 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> پیش فاکتور</button></a>
                        <a class="info-description-img2" id="id2-' . $row["intInvoicesID"] . '" href="' . $path_file2 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> قرارداد</button></a>
                        <a class="info-description-img3" id="id3-' . $row["intInvoicesID"] . '" href="' . $path_file3 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> پرداختی</button></a></td>
                        <td>' .  $seen . '</td>
                        <td>' . $row["txtInvoicesDescription"] . '</td>
                        <td><button type="button" id="' . $row["intInvoicesID"] . '" class="btn btn-danger edit-invoice"><i class="fa fa-trash"></i></button></td>
                    </tr>';
            }
        }
        echo $output;
    } else if (isset($_POST["add_edit_invoice"])) {

        $flag = $_POST["flag"];
        $user_id = $_POST["user_id"];
        $date_invoice = $_POST["date_invoice"];
        $name_expert = $_POST["name_expert"];
        $describtion = $_POST["describtion"];
        $file1 = $_FILES["img_invoice_file"]["name"];
        $file2 = $_FILES["img_agreement_invoice_file"]["name"];
        $file3 = $_FILES["img_tax_recieve_invoice_file"]["name"];
        // echo $file;

        $date_time = date("his");
        $date_folder = str_replace("/", "", $date_invoice) . $date_time;
        // echo $date_folder;
        // // return;

        if (empty($file1)) {
            $file_name = 'NULL';
            return;
        } else {
            if (!file_exists('../invoice_files/' . $user_id . '/' . $date_folder)) {
                mkdir('../invoice_files/' . $user_id . '/' . $date_folder, 0777, true);
            }
            $target_dir = "../invoice_files/" . $user_id . "/" . $date_folder . "/";
            $target_file1 = $target_dir . basename($_FILES["img_invoice_file"]["name"]);
            $target_file2 = $target_dir . basename($_FILES["img_agreement_invoice_file"]["name"]);
            $target_file3 = $target_dir . basename($_FILES["img_tax_recieve_invoice_file"]["name"]);
            move_uploaded_file($_FILES["img_invoice_file"]["tmp_name"], $target_file1);
            move_uploaded_file($_FILES["img_agreement_invoice_file"]["tmp_name"], $target_file2);
            move_uploaded_file($_FILES["img_tax_recieve_invoice_file"]["tmp_name"], $target_file3);
            // echo $_FILES["inputfile"]["name"];
            // $file_name = '"' . $target_file . '"';
        }

        //ADD
        $sql = "CALL sp_Insert_Update_Delete_tbInvoices('$flag','$user_id','$date_invoice','$name_expert','$target_file1','$target_file2','$target_file3','$describtion','0')";
        echo $sql;
        $statement = $dbo->prepare($sql);
        $statement->execute();
    } else if (isset($_POST["del_invoice"])) {

        $flag = $_POST["flag"];
        $user_id = $_POST["user_id"];
        $date_invoice = 'Del';




        //DELETE FILE //*****************************
        $sqlcheck = "SELECT * FROM tbinvoices WHERE intInvoicesID='$flag'";
        $statement_chk = $dbo->prepare($sqlcheck);
        $statement_chk->execute();
        $data = $statement_chk->fetch();
        
        $path_file1 = $data['vcrInvoicesImgInvoiceFile'];
        $path_file2 = $data['vcrInvoicesImgAgreementFile'];
        $path_file3 = $data['vcrInvoicesImgRecieveFile'];
        
        // delete_directory($path_file);
        
        // $files = glob($path_file); // get all file names
        $files1 = glob($path_file1, GLOB_BRACE);
        foreach($files1 as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
        $files2 = glob($path_file2, GLOB_BRACE);
        foreach($files2 as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
        $files3 = glob($path_file3, GLOB_BRACE);
        foreach($files3 as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }
        
        // $path_file = str_replace("../", "", $data["vcrPreInvoiceFilePath"]);
        // if (!file_exists($path_file)){
        //     echo 'false';
        // }else{
            
        //     echo  $path_file;
        //     echo 'success';
        //     rmdir($path_file);
        // }
        //******************************************
        

        //D E L E T E
        $sql = "CALL sp_Insert_Update_Delete_tbInvoices('$flag','$user_id','$date_invoice','-1','-1','-1','-1','-1','-1')";
        echo $sql;
        $statement = $dbo->prepare($sql);
        $statement->execute();
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}






//     function delete_directory($dirname) {
//         if (is_dir($dirname)){
//             $dir_handle = opendir($dirname);
//             echo 'open';
//         }
//         if (!$dir_handle){
//             return false;
//             echo 'close'; 
//         }
          
//         while($file = readdir($dir_handle)) {
//           if ($file != "." && $file != "..") {
//                 if (!is_dir($dirname."/".$file))
//                     unlink($dirname."/".$file);
//             else
//                     delete_directory($dirname.'/'.$file);
//           }
//         }
//         closedir($dir_handle);
//         rmdir($dirname);
//         return true;
//   }
