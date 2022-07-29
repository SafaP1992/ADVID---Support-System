<?php

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    if (isset($_POST['get'])) {

        // $id = $_POST['id'];
        // $idu = $_POST['idu'];
        $sql = "SELECT * FROM tbdomains ORDER BY intDomainID DESC";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $number_of_rows = $q->rowCount();

        $output = '';
        if ($number_of_rows > 0) {
            $count = 1;
            foreach ($q as $row) {
                
                $today = date("Y-m-d");
                $expire_d = $row["vcrDomainExpire_Domain_Miladi"];
                $expire_h = $row["vcrDomainExpire_Host_Miladi"];
                // $today_dt = new DateTime($today);
                // $expire = $row->expireDate; //from database
                // $today_time = strtotime($today);
                
                if($today >= $expire_d or $today >= $expire_h ){
                    echo 'true';
                    $style="background-color: red";
                }else{
                    echo 'false';
                    $style="";
                }
                
                // echo $today;
                // echo '<br/>';
                // echo $expire;
                // echo '<br/>';
                
                $output .= '
                    <tr style="'.$style.'">
                        <td>' . $count++ . ' </td>
                        <td>' . $row["vcrDomainName"] . '</td>
                        <td>' . $row["vcrDomainBuy_Domain_Miladi"] . '</td>
                        <td>' . $row["vcrDomainBuy_Host_Miladi"] . '</td>
                        <td>' . $row["vcrDomainExpire_Domain_Miladi"] . '</td>
                        <td>' . $row["vcrDomainExpire_Host_Miladi"] . '</td>
                        <td>' . $row["vcrDomainExpire_Domain_Shamsi"] . '</td>
                        <td>' . $row["vcrDomainExpire_Host_Shamsi"] . '</td>
                        <td>' . $row["vcrDomainDescribtion"] . '</td>
                        <td>
                        <button type="button" id="id-' . $row["intDomainID"] . '" class="btn btn-danger edit"><i class="fa fa-edit"></i></button>
                        <button type="button" id="id-d-' . $row["intDomainID"] . '" class="btn btn-danger del"><i class="fa fa-trash"></i></button></td>
                    </tr>';
            }

        }

        echo $output;
    } else if (isset($_POST['add_edit_domains'])) {

        $flag = $_POST["flag"];
        $txtdomain_name = $_POST['txtdomain_name'];
        $txtbuy_domain_miladi = $_POST['txtbuy_domain_miladi'];
        $txtbuy_host_miladi = $_POST['txtbuy_host_miladi'];
        $txtexpire_domain_miladi = $_POST['txtexpire_domain_miladi'];
        $txtexpire_host_miladi = $_POST['txtexpire_host_miladi'];
        $txtexpire_domain_shamsi = $_POST['txtexpire_domain_shamsi'];
        $txtexpire_host_shamsi = $_POST['txtexpire_host_shamsi'];
        $txtdomaindescribtion = $_POST['txtdomaindescribtion'];


        $sql = "CALL sp_Insert_Update_Delete_tbdomains('$flag','$txtdomain_name','$txtbuy_domain_miladi','$txtbuy_host_miladi','$txtexpire_domain_miladi','$txtexpire_host_miladi','$txtexpire_domain_shamsi','$txtexpire_host_shamsi','$txtdomaindescribtion')";
        $q = $dbo->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

    } else if (isset($_POST["edit_showinfo"])) {

        //EDIT SHOW
        $flag = $_POST["flag"];
        $sql = "SELECT * FROM tbdomains WHERE intDomainID='$flag'";
        $statement = $dbo->prepare($sql);
        $statement->execute();
        
        foreach ($statement as $row) {
            $output_d['DomainName'] = $row['vcrDomainName'];
            $output_d['DomainBuy_Domain_Miladi'] = $row['vcrDomainBuy_Domain_Miladi'];
            $output_d['DomainBuy_Host_Miladi'] = $row['vcrDomainBuy_Host_Miladi'];
            $output_d['DomainExpire_Domain_Miladi'] = $row['vcrDomainExpire_Domain_Miladi'];
            $output_d['DomainExpire_Host_Miladi'] = $row['vcrDomainExpire_Host_Miladi'];
            $output_d['DomainExpire_Domain_Shamsi'] = $row['vcrDomainExpire_Domain_Shamsi'];
            $output_d['DomainExpire_Host_Shamsi'] = $row['vcrDomainExpire_Host_Shamsi'];
            $output_d['DomainDescribtion'] = $row['vcrDomainDescribtion'];
            $output_d['DomainID'] = $row['intDomainID'];
        }
        echo json_encode($output_d);
        
    } 
    if (isset($_POST["del"])) {
        $flag = $_POST["flag"];
        
        //Delete User
        $sql = "CALL sp_Insert_Update_Delete_tbdomains('$flag','Del','','','','','','','')";
        $q = $dbo->prepare($sql);
        $q->execute();
    }



} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}
