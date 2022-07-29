<?php
try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $intUserID = $_SESSION['intUserID'];














    if (isset($_POST["get_invoices"])) {

        $sql = "SELECT * FROM tbinvoices WHERE intUserID='$intUserID' ORDER BY intInvoicesID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();

        // <td><a href="ajax/downloads.php?file_id_ImgInvoiceFile=' . $row['intInvoicesID'] . '"><img style="width:50px" src="../admin-avid-system/handle/'  . $path_file1  . '" alt="' . basename($path_file1)  . '"</a></td>
        // <td><a href="ajax/downloads.php?file_id_ImgAgreementFile=' . $row['intInvoicesID'] . '"><img style="width:50px" src="../admin-avid-system/handle/' . $path_file2  . '" alt="' . basename($path_file2)  . '"</a></td>
        // <td><a href="ajax/downloads.php?file_id_ImgRecieveFile=' . $row['intInvoicesID'] . '"><img style="width:50px" src="../admin-avid-system/handle/' . $path_file3  . '" alt="' . basename($path_file3)  . '"</a></td>



        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {
                $path_file1 = str_replace("../", "", $row["vcrInvoicesImgInvoiceFile"]);
                $path_file2 = str_replace("../", "", $row["vcrInvoicesImgAgreementFile"]);
                $path_file3 = str_replace("../", "", $row["vcrInvoicesImgRecieveFile"]);

                $output .= '
                    <tr>
                        <td>' . $count++ . '</td>
                        <td>' . $row["vcrInvoicesPublishedDate"] . '</td>
                        <td>' . $row["vcrInvoicesExpertName"] . '</td>
                        <td><a class="info-description-img1" id="id1-' . $row["intInvoicesID"] . '" href="../admin-avid-system/handle/' . $path_file1 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> پیش فاکتور</button></a>
                        <a class="info-description-img2" id="id2-' . $row["intInvoicesID"] . '" href="../admin-avid-system/handle/' . $path_file2 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> قرارداد</button></a>
                        <a class="info-description-img3" id="id3-' . $row["intInvoicesID"] . '" href="../admin-avid-system/handle/' . $path_file3 . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> پرداختی</button></a></td>
                       <td><button type="button" class="btn btn-primary info-description" id="' . $row["intInvoicesID"] . '">نمایش</button></td>
                    </tr>';
            }
        }

        echo $output;
    } else if (isset($_POST["display_describtion"])) {
        $invoice_id = $_POST['invoice_id'];
        $sql = "SELECT * FROM tbinvoices WHERE intInvoicesID='$invoice_id'";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        foreach ($statement as $row) {
            $output_d['InvoicesDescription'] = $row['txtInvoicesDescription'];
        }

        update_seen_invoice($invoice_id, $dbo);

        echo json_encode($output_d);
    }




























    if (isset($_POST["get_preinvoices"])) {

        $sql = "SELECT * FROM tbpreinvoices WHERE intUserID='$intUserID' ORDER BY intPreInvoiceID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();

        $output = '';

        // <a <a href="ajax/downloads.php?file_id_PreInvoiceFilePath=' . $row['intPreInvoiceID'] . '"><img style="width:50px" src="../admin-avid-system/handle/' . $path_file1  . '" alt="' . basename($path_file1)  . '"</a>

        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {

                // $confirmation = $row["bitPreInvoiceConfirmation"];
                if ($row["bitPreInvoiceConfirmation"] == 0) {
                    $confirmation = 'غیر فعال';
                } else if ($row["bitPreInvoiceConfirmation"] == 1) {
                    $confirmation = 'فعال';
                }


                $path_file = str_replace("../", "", $row["vcrPreInvoiceFilePath"]);

                $output .= '
                    <tr>
                        <td>' . $count++ . '</td>
                        <td>' . $row["vcrPreInvoiceDate"] . '</td>
                        <td>' . $row["vcrPreInvoiceExpert"] . '</td>
                        <td><a id="id-' . $row["intPreInvoiceID"] . '" class="info-description-img" id="id-' . $row["intPreInvoiceID"] . '"  href="../admin-avid-system/handle/' . $path_file . '" class="fancybox" data-fancybox="gallery" target="_blank"><button class="btn btn-primary"><i class="fa fa fa-eye"></i> مشاهده ی فاکتور</button></a></td>
                        <td>' . $confirmation . '</td>
                        <td>' . $row["vcrPreInvoiceConfirmationDate"] . '</td>
                        <td><button type="button" class="btn btn-primary info-description" id="' . $row["intPreInvoiceID"] . '">نمایش</button></td>
                    </tr>';
            }
        }
        // <!-- href="../../Admin-System/handle/pre_invoice_files/' . $intUserID . '/' .  $path_file1  . '" -->
        echo $output;
    } else if (isset($_POST["display_describtion_pre"])) {
        $invoice_id = $_POST['invoice_id'];
        $sql = "SELECT * FROM tbpreinvoices WHERE intPreInvoiceID='$invoice_id'";
        $statement = $dbo->prepare($sql);
        $statement->execute();

        foreach ($statement as $row) {
            $output_d['PreInvoiceDescription'] = $row['txtPreInvoiceDescription'];
        }

        update_seen_preinvoice($invoice_id, $dbo);

        echo json_encode($output_d);
    }




























    if (isset($_POST["get_products"])) {

        $sql = "SELECT * FROM tbproducts WHERE intUserID='$intUserID' ORDER BY intProductID DESC";
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
                        <td>' . $count++ . '</td>
                        <td>' . $row["vcrProductName"] . '</td>
                        <td>' . $row["vcrAgreementProduct"] . '</td>
                        <td>' . $row["vcrStartDateProductActivity"] . '</td>
                        <td>' . $row["vcrEndDateProductActivity"] . '</td>
                    </tr>';
            }
        }
        // 
        echo $output;
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}













function update_seen_preinvoice($invoice_id, $dbo)
{
    $sql = "CALL sp_Insert_Update_Delete_tbPreInvoices('$invoice_id','-1','Update','-1','-1','-1','-1','-1','1')";
    $q = $dbo->prepare($sql);
    $q->execute();
}

function update_seen_invoice($invoice_id, $dbo)
{
    $sql = "CALL sp_Insert_Update_Delete_tbInvoices('$invoice_id','-1','Update','-1','-1','-1','-1','-1','1')";
    $q = $dbo->prepare($sql);
    $q->execute();
}
