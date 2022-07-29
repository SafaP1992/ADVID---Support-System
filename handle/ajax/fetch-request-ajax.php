<?php

include_once('jdf.php');

try {
    require_once('../../conn/db.php');
    error_reporting(E_ERROR | E_PARSE);

    $id = $_POST['res_id'];


    $sql = "SELECT * FROM view_tbsupport WHERE intSupportID = '$id' AND intSupportParentID = '0' ";
    $q = $dbo->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $number_of_rows = $q->rowCount();

    $output = '';
    if ($number_of_rows > 0) {
        foreach ($q as $row) {

            $date = $row['datSupportDateTime'];
            $array = explode(' ', $date);
            //print_r($array);
            list($year, $month, $day) = explode('-', $array[0]);
            list($hour, $minute, $second) = explode(':', $array[1]);
            $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
            //echo $timestamp;
            $jalali_date = jdate("Y/m/d", $timestamp);
            $jalali_time = jdate("H:i:s", $timestamp);
            // echo $timestamp;


            $vcr_date = explode(' ', $row['vcrSupportDateTime']);
            $vcr_date_array = $vcr_date[0];
            $vcr_time_array = $vcr_date[1];


            $file = $row['vcrSupportFile'];
            if (empty($file)) {
                $file_chk = '<!-- E M P T Y   OR   N U L L -->';
            } else {
                $file_chk = '<div class="text-right"><a style="font-size: 10px;display: block; margin-left:5px" href="ajax/downloads.php?file_id=' . $row['intSupportID'] . '" ><img src="../assets/images/File_Attachment.png" width="30px" style="margin:0 5px"/>دانلود فایل</a></div>';
            }


            $Barcode = $row['vcrBarcode'];

            $priority = $row['intSupportPriority'];
            if ($priority == 1) {
                $priority_str = '<div class="alert bg-info text-white text-center p-1" style="font-size:11px; padding:0">کم</div>';
            } elseif ($priority == 2) {
                $priority_str = '<div class="alert bg-dark text-white text-center p-1" style="font-size:11px; padding:0">متوسط</div>';
            } elseif ($priority == 3) {
                $priority_str = '<div class="alert bg-warning text-center p-1" style="font-size:11px; padding:0">زیاد</div>';
            } elseif ($priority == 4) {
                $priority_str = '<div class="alert bg-danger text-white text-center p-1" style="font-size:11px; padding:0">اورژانسی</div>';
            }

            $gender = $row['intUserRelSex'];
            if ($gender == 1) {
                $gender_str = 'آقا';
            } elseif ($gender == 2) {
                $gender_str = 'خانم';
            }

            $output .= '         
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-4">پاسخ درخواست</h4>
                </div>
                <div class="col-6">
                    <div class="text-left bar-code"><svg id="barcode"  viewBox="0 0 220 100"></svg></div>            
                </div>  
            </div>  
            
            <div class="col-md-12">
                <div class="card mb-3"> 

                <div class="row m-1">
                    <div class="col-12 col-sm-8">
                        <div class="alert p-1 m-0" style="font-size:11px; text-align:center; background-color:#f4e9c8 !important;">' . $gender_str . ' ' . $row['vcrUserRelName'] . '، واحد ' . $row['vcrUserRelSection'] . '، شماره تماس:' . $row['vcrUserRelContact'] . '</div> 
                    </div>
                    
                    <div class="col-12 col-sm-2">
                        ' . $priority_str . '
                    </div>    
                    
                    <div class="col-12 col-sm-2">
                        ' . $file_chk . '
                    </div>
                </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../assets/images/def_face.jpg" class="img img-rounded img-comment-user"/>
                                <p class="text-secondary text-center datetime">' . $vcr_date_array . '</p>
                                <p class="text-secondary text-center datetime">' . $vcr_time_array . '</p>                                
                            </div>
                            
                            
                            <div class="col-md-10 mt-1 pr-0">
                                <p>
                                    <a class="float-right" href="#"><strong>' . $row['vcrFNameUser'] . ' ' . $row['vcrLNameUser'] . '</strong></a>
                                </p>
                                <div class="clearfix mb-1"></div>
                                <p><strong>موضوع:</strong>' . $row['vcrSupportSubject'] . '<input type="hidden" name="vcrSupportSubject" id="vcrSupportSubject" value="' . $row['vcrSupportSubject'] . '"></p>
    
                                <div class="clearfix"></div>
                                <p class="user-description">' . $row['txtSupportComment'] . '</p>
                                <!-- <p>
                                    <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> پاسخ</a>
                                </p> -->


                                <input type="hidden" name="intSupportPriority" id="intSupportPriority" value="' . $row['intSupportPriority'] . '" >
                                <input type="hidden" name="intUserRelID" id="intUserRelID" value="' . $row['intUserRelID'] . '" >
                            </div>
                        </div>


                    ';
        }
    }


    $output_new = get_response($dbo, $id);
    echo $output . $output_new;
    echo '</div>
        </div>
    </div>';
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}




function get_response($dbo, $id)
{

    $sqlsec = "SELECT * FROM view_tbsupport WHERE intSupportParentID = '$id' ";
    $qsec = $dbo->prepare($sqlsec);
    $qsec->execute();
    $qsec->setFetchMode(PDO::FETCH_ASSOC);
    $number_of_rows = $qsec->rowCount();
    $output2 = "";

    if ($number_of_rows > 0) {
        foreach ($qsec as $row) {
            // echo $row['intSupportParentID'] ;
            if ($row['intSupportParentID'] != 0) {
                $date_sub = $row['datSupportDateTime'];
                $array_sub = explode(' ', $date_sub);
                //print_r($array);
                list($year, $month, $day) = explode('-', $array_sub[0]);
                list($hour, $minute, $second) = explode(':', $array_sub[1]);
                $timestamp_sub = mktime($hour, $minute, $second, $month, $day, $year);
                //echo $timestamp;
                $jalali_date_sub = jdate("Y/m/d", $timestamp_sub);
                $jalali_time_sub = jdate("H:i:s", $timestamp_sub);


                $vcr_date = explode(' ', $row['vcrSupportDateTime']);
                $vcr_date_array = $vcr_date[0];
                $vcr_time_array = $vcr_date[1];



                if (empty($row['intUserID'])) {
                    $output2 .= '  <div class="card card-inner mb-3 py-3 bgcolor">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../assets/images/logo.png" class="img img-rounded img-comment-user"/>
                                <p class="text-secondary text-center datetime">' . $vcr_date_array . '</p>
                                <p class="text-secondary text-center datetime">' . $vcr_time_array . '</p>  
                            </div>
                            <div class="col-md-10 mt-1 pr-0">
                                <p><strong>مدیر سیستم تیکت آوید</strong></p>
                                <p class="user-description">' . $row['txtSupportComment'] . '</p>
                                <!-- <p>
                                    <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> پاسخ</a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>';
                } elseif (empty($row['intAdminID'])) {
                    $output2 .= '
                    <div class="card my-3">
                        <div class="row m-1 my-3">
                            <div class="col-md-2">
                                <img src="../assets/images/def_face.jpg" class="img img-rounded img-comment-user"/>
                                <p class="text-secondary text-center datetime">' . $vcr_date_array . '</p>
                                <p class="text-secondary text-center datetime">' . $vcr_time_array . '</p>  
                            </div>
                            
                            <div class="col-md-10 mt-1 pr-0">
                                <p>
                                    <a class="float-right" href="#"><strong>' . $row['vcrFNameUser'] . ' ' . $row['vcrLNameUser'] . '</strong></a>
                                </p>
                                <div class="clearfix mb-1"></div>
                                <p class="user-description">' . $row['txtSupportComment'] . '
                                </p>
                                <!-- <p>
                                    <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> پاسخ</a>
                                </p> -->
                            </div>                                
                        </div>
                    </div>';
                }
            } else {
                // echo $row['intSupportParentID'] ;
                // echo 'false';

                return;
            }
        }
        return $output2;
    }
}
?>



<script>
    $(document).ready(function() {
        JsBarcode("#barcode", "<?php echo $Barcode ?>");
    });
</script>