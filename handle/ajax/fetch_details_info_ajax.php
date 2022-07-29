
<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $intUserID = $_SESSION['intUserID'];



    if (isset($_POST['register_details_enamd'])) {

        $date = date("Y-m-d H:i:s");
        $array = explode(' ', $date);
        list($year, $month, $day) = explode("-", $array[0]);
        list($hour, $minute, $second) = explode(':', $array[1]);
        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);



        if (empty($_FILES["txt_file_cartmeli"]["name"])) {
            $file_name_txt_file_cartmeli = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_cartmeli = $target_dir . basename($_FILES["txt_file_cartmeli"]["name"]);
            move_uploaded_file($_FILES["txt_file_cartmeli"]["tmp_name"], $target_file_txt_file_cartmeli);
            $file_name_txt_file_cartmeli =  $target_file_txt_file_cartmeli;
        }

        if (empty($_FILES["txt_file_shenamsnameh"]["name"])) {
            $file_name_txt_file_shenamsnameh = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_shenamsnameh = $target_dir . basename($_FILES["txt_file_shenamsnameh"]["name"]);
            move_uploaded_file($_FILES["txt_file_shenamsnameh"]["tmp_name"], $target_file_txt_file_shenamsnameh);
            $file_name_txt_file_shenamsnameh =  $target_file_txt_file_shenamsnameh;
        }

        if (empty($_FILES["txt_file_personel"]["name"])) {
            $file_name_txt_file_personel = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_personel = $target_dir . basename($_FILES["txt_file_personel"]["name"]);
            move_uploaded_file($_FILES["txt_file_personel"]["tmp_name"], $target_file_txt_file_personel);
            $file_name_txt_file_personel =  $target_file_txt_file_personel;
        }

        if (empty($_FILES["txt_file_payankhedmat"]["name"])) {
            $file_name_txt_file_payankhedmat = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_payankhedmat = $target_dir . basename($_FILES["txt_file_payankhedmat"]["name"]);
            move_uploaded_file($_FILES["txt_file_payankhedmat"]["tmp_name"], $target_file_txt_file_payankhedmat);
            $file_name_txt_file_payankhedmat =  $target_file_txt_file_payankhedmat;
        }

        if (empty($_FILES["txt_kasbokar_file_logo"]["name"])) {
            $file_name_txt_kasbokar_file_logo = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_kasbokar_file_logo = $target_dir . basename($_FILES["txt_kasbokar_file_logo"]["name"]);
            move_uploaded_file($_FILES["txt_kasbokar_file_logo"]["tmp_name"], $target_file_txt_kasbokar_file_logo);
            $file_name_txt_kasbokar_file_logo =  $target_file_txt_kasbokar_file_logo;
        }
        
        //******************  Hokhokhi  ******************//
        
        if (empty($_FILES["txt_file_asasnameh"]["name"])) {
        $file_name_txt_file_asasnameh = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_asasnameh = $target_dir . basename($_FILES["txt_file_asasnameh"]["name"]);
            move_uploaded_file($_FILES["txt_file_asasnameh"]["tmp_name"], $target_file_txt_file_asasnameh);
            $file_name_txt_file_asasnameh =  $target_file_txt_file_asasnameh;
        }
        
        if (empty($_FILES["txt_file_ads_rooznameh"]["name"])) {
        $file_name_txt_file_ads_rooznameh = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_ads_rooznameh = $target_dir . basename($_FILES["txt_file_ads_rooznameh"]["name"]);
            move_uploaded_file($_FILES["txt_file_ads_rooznameh"]["tmp_name"], $target_file_txt_file_ads_rooznameh);
            $file_name_txt_file_ads_rooznameh =  $target_file_txt_file_ads_rooznameh;
        }
        
        if (empty($_FILES["txt_file_akharin_takhirat"]["name"])) {
        $file_name_txt_file_akharin_takhirat = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_akharin_takhirat = $target_dir . basename($_FILES["txt_file_akharin_takhirat"]["name"]);
            move_uploaded_file($_FILES["txt_file_akharin_takhirat"]["tmp_name"], $target_file_txt_file_akharin_takhirat);
            $file_name_txt_file_akharin_takhirat =  $target_file_txt_file_akharin_takhirat;
        }
        
        if (empty($_FILES["txt_file_takhirat_mahalsherkat"]["name"])) {
        $file_name_txt_file_takhirat_mahalsherkat = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_takhirat_mahalsherkat = $target_dir . basename($_FILES["txt_file_takhirat_mahalsherkat"]["name"]);
            move_uploaded_file($_FILES["txt_file_takhirat_mahalsherkat"]["tmp_name"], $target_file_txt_file_takhirat_mahalsherkat);
            $file_name_txt_file_takhirat_mahalsherkat =  $target_file_txt_file_takhirat_mahalsherkat;
        }
        
        if (empty($_FILES["txt_file_takhirat_name_sabtisherkat"]["name"])) {
        $file_name_txt_file_takhirat_name_sabtisherkat = NULL;
        } else {
            $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
            if (!file_exists('../file_enamd/' . $intUserID . '/' . $rand)) {
                mkdir('../file_enamd/' . $intUserID . '/' . $rand, 0777, true);
            }
            $target_dir = "../file_enamd/" . $intUserID . "/" . $rand . "/";
            $target_file_txt_file_takhirat_name_sabtisherkat = $target_dir . basename($_FILES["txt_file_takhirat_name_sabtisherkat"]["name"]);
            move_uploaded_file($_FILES["txt_file_takhirat_name_sabtisherkat"]["tmp_name"], $target_file_txt_file_takhirat_name_sabtisherkat);
            $file_name_txt_file_takhirat_name_sabtisherkat =  $target_file_txt_file_takhirat_name_sabtisherkat;
        }
    

        $date_request = tr_num(jdate("Y/m/d H:i:s", $timestamp));
        $txt_name_surname = $_POST['txt_name_surname'];
        $txt_name_surname2 = $_POST['txt_name_surname2'];
        $txt_name_surname_en = $_POST['txt_name_surname_en'];
        $txt_name_surname2_en = $_POST['txt_name_surname2_en'];
        $txt_name_father = $_POST['txt_name_father'];
        $txt_codemeli = $_POST['txt_codemeli'];
        $txt_codeshenasnameh = $_POST['txt_codeshenasnameh'];
        $txt_birthdate = $_POST['txt_birthdate'];
        $txt_gender = $_POST['txt_gender'];
        $txt_codepostal = $_POST['txt_codepostal'];
        $txt_ostan = $_POST['txt_ostan'];
        $txt_shahrestan = $_POST['txt_shahrestan'];
        $txt_bakhsh_mahale_dehestan = $_POST['txt_bakhsh_mahale_dehestan'];
        $txt_bakhsh_mahale_dehestan_ex = $_POST['txt_bakhsh_mahale_dehestan_ex'];
        $txt_address = $_POST['txt_address'];
        $txt_plack = $_POST['txt_plack'];
        $txt_tabaghe = $_POST['txt_tabaghe'];
        $txt_shomarevahed = $_POST['txt_shomarevahed'];
        $txt_name_sakhteman = $_POST['txt_name_sakhteman'];
        $txt_telephon_hamrah = $_POST['txt_telephon_hamrah'];
        $txt_telephon_sabet = $_POST['txt_telephon_sabet'];
        $txt_email = $_POST['txt_email'];
        // $txt_file_cartmeli = $_POST['txt_file_cartmeli'];
        // $txt_file_shenamsnameh = $_POST['txt_file_shenamsnameh'];
        // $txt_file_personel = $_POST['txt_file_personel'];
        // $txt_file_payankhedmat = $_POST['txt_file_payankhedmat'];
        $txt_telephone_hamrah_confirm = $_POST['txt_telephone_hamrah_confirm'];
        $txt_telephone_sabet_confirm = $_POST['txt_telephone_sabet_confirm'];
        $txt_kasbokar_fa = $_POST['txt_kasbokar_fa'];
        $txt_kasbokar_en = $_POST['txt_kasbokar_en'];
        $txt_kasbokar_domain_address = $_POST['txt_kasbokar_domain_address'];
        // $txt_kasbokar_file_logo = $_POST['txt_kasbokar_file_logo'];
        $txt_kasbokar_tozihat = $_POST['txt_kasbokar_tozihat'];
        $txt_kasbokar_melk = $_POST['txt_kasbokar_melk'];
        $txt_kasbokar_type_activation = $_POST['txt_kasbokar_type_activation'];
        $txt_kasbokar_kochakvanopa = $_POST['txt_kasbokar_kochakvanopa'];
        $txt_kasbokar_telephon_sabet = $_POST['txt_kasbokar_telephon_sabet'];
        // ---txt_kasbokar_telephon_hamrah
        $txt_kasbokar_email = $_POST['txt_kasbokar_email'];
        $txt_kasbokar_fax = $_POST['txt_kasbokar_fax'];
        $txt_kasbokar_timework = $_POST['txt_kasbokar_timework'];
        $txt_kasbokar_reponsive_time = $_POST['txt_kasbokar_reponsive_time'];
        $txt_kasbokar_coderahgiri = $_POST['txt_kasbokar_coderahgiri'];
        $txt_name_sherkat = $_POST['txt_name_sherkat'];
        $txt_sherkat_manager = $_POST['txt_sherkat_manager'];
        $txt_sherkat_manager_codemeli = $_POST['txt_sherkat_manager_codemeli'];
        $txt_sherkat_manager_telephone_hamrah = $_POST['txt_sherkat_manager_telephone_hamrah'];
        $txt_sherkat_manager_email = $_POST['txt_sherkat_manager_email'];
        $txt_sherkat_vaziat_neshani = $_POST['txt_sherkat_vaziat_neshani'];
        $txt_code_pigiri = $_POST['txt_code_pigiri'];


        // $sql = "SELECT * FROM tbusersrel WHERE intUserID='$intUserID' ORDER BY intUserRelID DESC";
        $sql = "CALL sp_Insert_Update_Delete_tbEnamadInfo('-1','$intUserID','$date_request','$txt_name_surname','$txt_name_surname2','$txt_name_surname_en','$txt_name_surname2_en','$txt_name_father','$txt_codemeli','$txt_codeshenasnameh','$txt_birthdate','$txt_gender','$txt_codepostal','$txt_ostan','$txt_shahrestan','$txt_bakhsh_mahale_dehestan','$txt_bakhsh_mahale_dehestan_ex','$txt_address','$txt_plack','$txt_tabaghe','$txt_shomarevahed','$txt_name_sakhteman','$txt_telephon_hamrah','$txt_telephon_sabet','$txt_email','$file_name_txt_file_cartmeli','$file_name_txt_file_shenamsnameh','$file_name_txt_file_personel','$file_name_txt_file_payankhedmat','$file_name_txt_file_asasnameh','$file_name_txt_file_ads_rooznameh','$file_name_txt_file_akharin_takhirat','$file_name_txt_file_takhirat_mahalsherkat','$file_name_txt_file_takhirat_name_sabtisherkat','$txt_telephone_hamrah_confirm','$txt_telephone_sabet_confirm','$txt_kasbokar_fa','$txt_kasbokar_en','$txt_kasbokar_domain_address','$file_name_txt_kasbokar_file_logo','$txt_kasbokar_tozihat','$txt_kasbokar_melk','$txt_kasbokar_type_activation','$txt_kasbokar_kochakvanopa','$txt_kasbokar_telephon_sabet','NULL','$txt_kasbokar_email','$txt_kasbokar_fax','$txt_kasbokar_timework','$txt_kasbokar_reponsive_time','$txt_kasbokar_coderahgiri','$txt_name_sherkat','$txt_sherkat_manager','$txt_sherkat_manager_codemeli','$txt_sherkat_manager_telephone_hamrah','$txt_sherkat_manager_email','$txt_sherkat_vaziat_neshani','NULL','0')";
        
        $q = $dbo->prepare($sql);
        $q->execute();
        echo $sql;
    }





















    if (isset($_POST['display_details_enamd'])) {

        // $date = date("Y-m-d H:i:s");
        // $array = explode(' ', $date);
        // list($year, $month, $day) = explode("-", $array[0]);
        // list($hour, $minute, $second) = explode(':', $array[1]);
        // $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    

        $sql = "SELECT * FROM tbenamadinfo WHERE intUserID='$intUserID' ORDER BY intEnamadInfoID DESC";
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
                            <td>' . $count ++. '</td>
                            <td>' . $row["vcrEnamadInfo_Name_Surname"] . ' '. $row["vcrEnamadInfo_Name_Surname2"] . '</td>
                            <td>' . $row["vcrEnamadInfo_KasboKar_Domain_Address"] . '</td>
                            <td>' . $row["vcrEnamadInfo_RequestDate"] . '</td>
                            <td><button type="button" class="btn btn-primary info-details" id="' . $row["intEnamadInfoID"] . '"><i class="fas fa-search"></i></button>
                            <!-- <button type="button" class="btn btn-primary info-details-delete" id="id-' . $row["intUserRelID"] . '"><i class="fas fa-trash"></i></button></td> -->
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
