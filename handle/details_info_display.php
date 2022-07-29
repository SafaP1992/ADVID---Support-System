<?php
include('../server.php');
if (empty($_SESSION['vcrUsernameUser'])) {
    header("location:../index.php");
} else {
    
     if (isset($_GET["iddetails"])) {
        $user_details_id = $_GET["iddetails"];
        // print_r($user_details_id);
        
        
        $sql = "SELECT * FROM tbenamadinfo WHERE intEnamadInfoID='$user_details_id'";
        // echo $sql;
        $result = $dbo->prepare($sql);
        $result->execute();
        $data = $result->fetch();
        
    ?>

    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="../assets/css/fontawesome-all.css">

        <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

        <!-- <link rel="stylesheet" href="ajax/DateP/js-persian-cal.css" /> -->

        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>


          <!-- Main -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <small class="mb-4 mr-4">نمایش فرم اطلاعات، برای درخواست نماد اعتماد الکترونیکی</small>
                    </div>
                </div>
                
                <span id="error_message" class="text-danger"></span>

            </div>
            <div class="row">
                <div class="card-body" id="ad14d_u"><?php //$_PHP_SELF ?>
                    <form method="POST" action="#" id="addInfo_form" enctype="multipart/form-data">
                        <div class="row bg-light rounded p-0 m-0 border">



                            <div class="form-group col-md-12 m-0 p-0">
                                <div class="text-light bg-dark text-center p-2 rounded-top">1. تکمیل فرم اطلاعات</div>
                            </div>
                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">اطلاعات هویتی</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_surname">نام</label>
                                <input type="text" class="form-control" name="txt_name_surname" id="txt_name_surname" maxlength="30" value="<?php echo $data['vcrEnamadInfo_Name_Surname']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_surname2">نام خانوادگی</label>
                                <input type="text" class="form-control" name="txt_name_surname2" id="txt_name_surname2" maxlength="30" value="<?php echo $data['vcrEnamadInfo_Name_Surname2']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_surname">نام (به انگلیسی)</label>
                                <input type="text" class="form-control" name="txt_name_surname" id="txt_name_surname_en" maxlength="30" style="direction:ltr" value="<?php echo $data['vcrEnamadInfo_Name_Surname_en']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_surname2">نام خانوادگی (به انگلیسی)</label>
                                <input type="text" class="form-control" name="txt_name_surname2" id="txt_name_surname2_en" maxlength="30" style="direction:ltr" value="<?php echo $data['vcrEnamadInfo_Name_Surname2_en']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_father">نام پدر</label>
                                <input type="text" class="form-control" name="txt_name_father" id="txt_name_father" maxlength="15" value="<?php echo $data['vcrEnamadInfo_Name_Father']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_codemeli">کد ملی</label>
                                <input type="text" class="form-control" name="txt_codemeli" id="txt_codemeli" maxlength="10" value="<?php echo $data['vcrEnamadInfo_CodeMeli']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_codeshenasnameh">شماره شناسنامه</label>
                                <input type="text" class="form-control" name="txt_codeshenasnameh" id="txt_codeshenasnameh" maxlength="10" value="<?php echo $data['vcrEnamadInfo_CodeShenasnameh']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_birthdate">تاریخ تولد</label>
                                <input type="text" class="form-control" style="width:70%" name="txt_birthdate" id="txt_birthdate" value="<?php echo $data['vcrEnamadInfo_BirthDate']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_gender">جنسیت:</label>
                                <select class="form-control mb-1" name="txt_gender" id="txt_gender" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_Gender']; ?></option>
                                    <option value="1">مرد</option>
                                    <option value="2">زن</option>
                                </select>
                            </div>


                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">اطلاعات محل سکونت</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_codepostal">کد پستی</label>
                                <input type="text" class="form-control" name="txt_codepostal" id="txt_codepostal" maxlength="20" value="<?php echo $data['vcrEnamadInfo_CodePostal']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_ostan">استان</label>
                                <input type="text" class="form-control" name="txt_ostan" id="txt_ostan" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Ostan']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_shahrestan">شهرستان</label>
                                <input type="text" class="form-control" name="txt_shahrestan" id="txt_shahrestan" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Shahrestan']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_bakhsh_mahale_dehestan">بخش/ محله/ دهستان</label>
                                <select class="form-control mb-1" name="txt_bakhsh_mahale_dehestan" id="txt_bakhsh_mahale_dehestan" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_Bakhsh_Mahale_Dehestan']; ?></option>
                                    <option value="1">محله</option>
                                    <option value="2">دهستان</option>
                                    <option value="3">بخش</option>
                                    <option value="4">شهرک</option>
                                    <option value="5">منطقه شهرداری</option>
                                </select>
                                <input type="text" class="form-control" name="txt_bakhsh_mahale_dehestan_ex" id="txt_bakhsh_mahale_dehestan_ex" maxlength="50" value="<?php echo $data['vcrEnamadInfo_Bakhsh_Mahale_Dehestan_ex']; ?>" disabled>
                                <small>اگر در شهرهای بزرگ ساکن هستید، گزنیه محله را انتخاب کنید و نام محله شهرداری خود را وارد کنید. اگر در شهرهای کوچیک و روستاها زندگی می‌کنید، گزینه بخش یا دهستان را انتخاب کنید و اسم آن را وارد نمایید.</small>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txt_address">آدرس</label>
                                <textarea type="text" class="form-control" name="txt_address" id="txt_address" col="3" row="3" maxlength="150" value="" disabled><?php echo $data['vcrEnamadInfo_Address']; ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_plack">پلاک/شماره</label>
                                <input type="text" class="form-control" name="txt_plack" id="txt_plack" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Plack']; ?>" disabled />
                                <small>برای عدم وجود پلاک این فیلد را خالی بگذارید</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_tabaghe">طبقه (اختیاری)</label>
                                <input type="text" class="form-control" name="txt_tabaghe" id="txt_tabaghe" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Tabaghe']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_shomarevahed">شماره واحد (در صورت وجود حتما وارد نمایید):</label>
                                <input type="text" class="form-control" name="txt_shomarevahed" id="txt_shomarevahed" maxlength="15" value="<?php echo $data['vcrEnamadInfo_Shomare_Vahed']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_name_sakhteman">نام ساختمان (در صورت عدم وجود پلاک، نام ساختمان الزامیست)</label>
                                <input type="text" class="form-control" name="txt_name_sakhteman" id="txt_name_sakhteman" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Name_Sakhteman']; ?>" disabled>
                            </div>


                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">اطلاعات تماس فردی</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_telephon_hamrah">تلفن همراه</label>
                                <input type="text" class="form-control" name="txt_telephon_hamrah" id="txt_telephon_hamrah" maxlength="12" value="<?php echo $data['vcrEnamadInfo_Telephone_Sabet']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_telephon_sabet">تلفن ثابت</label>
                                <input type="text" class="form-control" name="txt_telephon_sabet" id="txt_telephon_sabet" maxlength="12" value="<?php echo $data['vcrEnamadInfo_Telephone_Hamrah']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_email">پست الکترونیک</label>
                                <input type="text" class="form-control" name="txt_email" id="txt_email" maxlength="50" value="<?php echo $data['vcrEnamadInfo_Email']; ?>" disabled>
                            </div>



                            <!-- ---------------------------------------- -->



                            <div class="form-group col-md-12 m-0 p-0 mt-3">
                                <div class="text-light bg-dark text-center p-2">2. بارگذاری مدارک</div>
                            </div>
                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1 ">مدرک درخواست</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_cartmeli">تصویر کارت ملی(اجباری)</label>
                                <!--<input type="file" class="form-control" name="txt_file_cartmeli" id="txt_file_cartmeli" value="" disabled>-->
                                <input type="hidden" name="txt_file_cartmeli" id="txt_file_cartmeli" value="<?php echo $data['vcrEnamadInfo_File_CartMeli']; ?>" />
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_CartMeli']); ?>" alt="" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_shenamsnameh">تصویر صفحه اول شناسنامه(اجباری)</label>
                                <!--<input type="file" class="form-control" name="txt_file_shenamsnameh" id="txt_file_shenamsnameh" value="" disabled>-->
                                <input type="hidden" name="txt_file_shenamsnameh" id="txt_file_shenamsnameh" value="<?php echo $data['vcrEnamadInfo_File_Shenasnameh']; ?>" />
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_Shenasnameh']); ?>" alt="" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_personel">تصویر پرسنلی</label>
                                <!--<input type="file" class="form-control" name="txt_file_personel" id="txt_file_personel" value="" disabled>-->
                                <input type="hidden" name="txt_file_personel" id="txt_file_personel" value="<?php echo $data['vcrEnamadInfo_File_Personal']; ?>" />
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_Personal']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_payankhedmat">تصویر کارت پایان خدمت</label>
                                <!--<input type="file" class="form-control" name="txt_file_payankhedmat" id="txt_file_payankhedmat" value="" disabled>-->
                                <input type="hidden" name="txt_file_payankhedmat" id="txt_file_payankhedmat" value="<?php echo $data['vcrEnamadInfo_File_PayanKhedmat']; ?>" />
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_PayanKhedmat']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            
                            <!-- Second files -->
                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1 ">مدرک درخواست (اگر شخص حقوقی هستید، لطفا فایل های زیر را ارسال نمائید) </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_asasnameh">تصویر اساسنامه (صفحاتی که شامل آدرس، موضوع فعالیت و اعضای هیات مدیره شرکت می باشد. اجباری)</label>
                                <input type="hidden" class="form-control" name="txt_file_asasnameh" id="txt_file_asasnameh"  value="<?php echo $data['vcrEnamadInfo_File_AsasName']; ?>" >
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_AsasName']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_ads_rooznameh">تصویر آگهی روزنامه رسمی (اجباری)</label>
                                <input type="hidden" class="form-control" name="txt_file_ads_rooznameh" id="txt_file_ads_rooznameh" value="<?php echo $data['vcrEnamadInfo_File_AdsRooznameh']; ?>">
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_AdsRooznameh']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_akharin_takhirat">تصویر آگهی آخرین تغییرات مدیر عامل یا اعضای هیات مدیره (اختیاری)</label>
                                <input type="hidden" class="form-control" name="txt_file_akharin_takhirat" id="txt_file_akharin_takhirat" value="<?php echo $data['vcrEnamadInfo_File_AkharinTakhiratManagment']; ?>">
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_AkharinTakhiratManagment']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_takhirat_mahalsherkat">تصویر آگهی آخرین تغییرات محل شرکت (اختیاری)</label>
                                <input type="hidden" class="form-control" name="txt_file_takhirat_mahalsherkat" id="txt_file_takhirat_mahalsherkat" value="<?php echo $data['vcrEnamadInfo_File_AkharinTakhiratSherkat']; ?>">
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_AkharinTakhiratSherkat']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_file_takhirat_name_sabtisherkat">تصویر آخرین تغییرات نام ثبتی شرکت (اختیاری)</label>
                                <input type="hidden" class="form-control" name="txt_file_takhirat_name_sabtisherkat" id="txt_file_takhirat_name_sabtisherkat" value="<?php echo $data['vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat']; ?>">
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_File_AkharinTakhiratSabtiSherkat']); ?>" alt="فایل ندارد" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>


                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">احراز اطلاعات</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_telephone_hamrah_confirm">تائید صحت تلفن همراه</label>
                                <select class="form-control mb-1" name="txt_telephone_hamrah_confirm" id="txt_telephone_hamrah_confirm" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_Telephone_Hamrah_Confirm']; ?></option>
                                    <option value="1">تائید شده</option>
                                    <option value="2">تائید نشده</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_telephone_sabet_confirm">تائید صحت تلفن ثابت</label>
                                <select class="form-control mb-1" name="txt_telephone_sabet_confirm" id="txt_telephone_sabet_confirm" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_Telephone_Sabet_Confirm']; ?></option>
                                    <option value="1">تائید شده</option>
                                    <option value="2">تائید نشده</option>
                                </select>
                            </div>


                            <!-- ---------------------------------------- -->



                            <div class="form-group col-md-12 m-0 p-0 mt-3">
                                <div class="text-light bg-dark text-center p-2">3. افزودن دامنه (افزودن کسب و کار)</div>
                            </div>
                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">اطلاعات کسب و کار</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_fa">نام فارسی کسب و کار:</label>
                                <input type="text" class="form-control" name="txt_kasbokar_fa" id="txt_kasbokar_fa" maxlength="50" value="<?php echo $data['vcrEnamadInfo_KasboKar_Name_fa']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_en">نام انگلیسی کسب و کار:</label>
                                <input type="text" class="form-control" name="txt_kasbokar_en" id="txt_kasbokar_en" maxlength="50" value="<?php echo $data['vcrEnamadInfo_KasboKar_Name_en']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_domain_address">آدرس دامنه کسب و کار:</label>
                                <input type="text" class="form-control" name="txt_kasbokar_domain_address" id="txt_kasbokar_domain_address" maxlength="50" value="<?php echo $data['vcrEnamadInfo_KasboKar_Domain_Address']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txt_kasbokar_file_logo">لوگوی کسب و کار:</label>
                                <!--<input type="file" class="form-control" name="txt_kasbokar_file_logo" id="txt_kasbokar_file_logo" value="" disabled>-->
                                <!--<small>تصاویر در ابعاد 200 پیکسل عرض و 150 پیکسل طول و با رنگ پس‌زمینه سفید با فرمت jpg باشد.</small>-->
                                <input type="hidden" id="txt_kasbokar_file_logo" value="<?php echo $data['vcrEnamadInfo_KasboKar_File_Logo']; ?>" />
                                <img src="../../handle/<?php echo str_replace("../","", $data['vcrEnamadInfo_KasboKar_File_Logo']); ?>" alt="" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_kasbokar_tozihat">توضیحات مختصر درخصوص کسب و کار:</label>
                                <textarea type="text" class="form-control" name="txt_kasbokar_tozihat" id="txt_kasbokar_tozihat" col="3" row="3" maxlength="150" value="" disabled><?php echo $data['vcrEnamadInfo_KasboKar_Tozihat']; ?></textarea>
                                <small>توجه داشته باشید که این متن در صفحه پروفایل کسب و کار شما به کاربران نمایش داده خواهد شد. حداکثر تعداد کاراکتر مجاز برای این فیلد 150 کاراکتر می‌باشد.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_kasbokar_melk">وضعیت ملک کسب و کار:</label>
                                <select class="form-control mb-1" name="txt_kasbokar_melk" id="txt_kasbokar_melk" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_KasboKar_Melk']; ?></option>
                                    <option value="1">مسکونی</option>
                                    <option value="2">تجاری</option>
                                    <option value="3">اداری</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_kasbokar_type_activation">نوع فعالیت</label>
                                <select class="form-control mb-1" name="txt_kasbokar_type_activation" id="txt_kasbokar_type_activation" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_KasboKar_Type_Activation']; ?></option>
                                    <option value="1">غیر صنفی</option>
                                    <option value="2">صنفی</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_kasbokar_kochakvanopa">کسب و کار کوچک و نوپا</label>
                                <select class="form-control mb-1" name="txt_kasbokar_kochakvanopa" id="txt_kasbokar_kochakvanopa" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_KasboKar_KochakVaNopa']; ?></option>
                                    <option value="1">بلی</option>
                                    <option value="2">خیر</option>
                                </select>
                                <!-- <input type="checkbox" class="form-checkbox text-right" name="txt_kasbokar_kochakvanopa" id="txt_kasbokar_kochakvanopa" /> -->
                                <small>اینگونه کسب و کار بجای دریافت نماد اعتماد الکترونیکی بدون ستاره دریافت می‌کند.</small>
                            </div>


                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">اطلاعات تماس کسب و کار (جهت نمایش در شناسنامه نماد)</div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_telephon_sabet">تلفن ثابت</label>
                                <input type="text" class="form-control" name="txt_kasbokar_telephon_sabet" id="txt_kasbokar_telephon_sabet" maxlength="30" value="<?php echo $data['vcrEnamadInfo_KasboKar_Telephone_Sabet']; ?>" disabled>
                                <small>شماره تلفن کسب و کار باید متعلق به کد پستی آدرس کسب و کار باشد در غیر اینصورت احراز انجام نمی‌شود و در مراحل بعدی استعلام از ادامه کار ممانعت بعمل می‌آید همراه با کد شهر مانند 01342933</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_email">پست الکترونیک</label>
                                <input type="text" class="form-control" name="txt_kasbokar_email" id="txt_kasbokar_email" maxlength="50" value="<?php echo $data['vcrEnamadInfo_KasboKar_Email']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_fax">شماره فکس</label>
                                <input type="text" class="form-control" name="txt_kasbokar_fax" id="txt_kasbokar_fax" maxlength="30" value="<?php echo $data['vcrEnamadInfo_KasboKar_Fax']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_timework">ساعت کاری (مثال 8 الی 20)</label>
                                <input type="text" class="form-control" name="txt_kasbokar_timework" id="txt_kasbokar_timework" maxlength="20" value="<?php echo $data['vcrEnamadInfo_KasboKar_TimeWork']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_reponsive_time">ساعت پاسخگویی (مثال 8 الی 20 ، برای اشخاص حقوقی)</label>
                                <input type="text" class="form-control" name="txt_kasbokar_reponsive_time" id="txt_kasbokar_reponsive_time" value="<?php echo $data['vcrEnamadInfo_KasboKar_ResponseWork']; ?>" maxlength="20" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txt_kasbokar_coderahgiri">کد رهگیری (در این آیتم چیزی وارد نکنید)</label>
                                <input type="text" class="form-control" name="txt_kasbokar_coderahgiri" id="txt_kasbokar_coderahgiri" value="<?php echo $data['vcrEnamadInfo_CodeRahgiri']; ?>" disabled/>
                            </div>


                            <!-- ---------------------------------------- -->


                            <div class="form-group col-md-12 m-0 p-0 mt-3">
                                <div class="text-light bg-dark text-center p-1">سامانه اعتبار سنجی نشانی شهروند</div>
                            </div>
                            <div class="form-group col-md-12 p-0">
                                <div class="text-light bg-info text-center p-1">شخص حقیقی / *شخص حقوقی (شرکت) ، (پر نمودن آیتم‌ها این بخش اجباری است)</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_name_sherkat">نام شرکت/ موسسه</label>
                                <input type="text" class="form-control" name="txt_name_sherkat" id="txt_name_sherkat" maxlength="30" value="<?php echo $data['vcrEnamadInfo_Name_Sherkat']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_sherkat_manager">نام و نام خانوادگی مدیر/ مسئول</label>
                                <input type="text" class="form-control" name="txt_sherkat_manager" id="txt_sherkat_manager" maxlength="30" value="<?php echo $data['vcrEnamadInfo_Sherkat_Manager']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_sherkat_manager_codemeli">شماره شناسایی ملی</label>
                                <input type="text" class="form-control" name="txt_sherkat_manager_codemeli" id="txt_sherkat_manager_codemeli" maxlength="20" value="<?php echo $data['vcrEnamadInfo_Sherkat_Manager_CodeMeli']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_sherkat_manager_telephone_hamrah">شماره تلفن همراه</label>
                                <input type="text" class="form-control" name="txt_sherkat_manager_telephone_hamrah" id="txt_sherkat_manager_telephone_hamrah" maxlength="12" value="<?php echo $data['vcrEnamadInfo_Sherkat_Manager_Telephone_Hamrah']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_sherkat_manager_email">آدرس ایمیل مدیر مسئول / رابط اجرایی شرکت</label>
                                <input type="text" class="form-control" name="txt_sherkat_manager_email" id="txt_sherkat_manager_email" maxlength="30" value="<?php echo $data['vcrEnamadInfo_Sherkat_Manager_Email']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_sherkat_vaziat_neshani">وضعیت نشانی</label>
                                <select class="form-control mb-1" name="txt_sherkat_vaziat_neshani" id="txt_sherkat_vaziat_neshani" disabled>
                                    <option value=""><?php echo $data['vcrEnamadInfo_Sherkat_VaziatNeshani']; ?></option>
                                    <option value="1">محل دائمی سکونت | مالک هستم | بیش از دو سال در این مکان هستم</option>
                                    <option value="2">محل دائمی سکونت | مالک هستم | بیش از یک‌سال و کمتر از دو سال در این مکان هستم</option>
                                    <option value="3">محل دائمی سکونت | مالک هستم | بزودی تغییر مکان می‌دهم</option>
                                    <option value="4">محل دائمی سکونت | مستاجر هستم | بیش از یک‌سال در این مکان هستم</option>
                                    <option value="5">محل دائمی سکونت | مستاجر هستم | کمتر از یک‌سال در این مکان هستم</option>
                                    <option value="6">محل موقت سکونت | در ایران ساکن نیستم و ساکن کشور دیگری هستم</option>
                                    <option value="7">محل موقت سکونت | مالک هستم | ساکن شهر دیگری هستم</option>
                                    <option value="8">محل موقت سکونت | نه مالک و نه مستاجر هستم | بزودی تغییر مکان می‌دهم</option>
                                    <option value="9">محل دائمی کار و تجارت | مالک یا مستاجر هستم | بتازگی در این مکان هستم ( کمتر از دو ماه)</option>
                                    <option value="10">محل دائمی کار و تجارت | مالک هستم | بیش از یک‌سال در این مکان هستم</option>
                                    <option value="11">محل دائمی کار و تجارت | مالک هستم | کمتر از یک‌سال در این مکان هستم ( بیش از دو ماه) </option>
                                    <option value="12">محل دائمی کار و تجارت | مستاجر هستم | بیش از یک‌سال در این مکان هستم</option>
                                    <option value="13">محل دائمی کار و تجارت | مستاجر هستم | کمتر از یک‌سال در این مکان هستم (بیش از دو ماه)</option>
                                </select>
                            </div>


                        </div>

                    </form>

                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="text-left">
                        <a class="btn btn-primary text-left" href="details_info_table.php">بازگشت</a>
                    </div>
                </div>
            </div>


        </div>






        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script type="text/javascript" src="ajax/DateP/js-persian-cal.min.js"></script> -->

    </body>

    </html>




    <script>
        $(document).ready(function() {
            //load_users();
            // function load_users() {
            //     $.ajax({
            //         url: "ajax/fetch_details_enamad_ajax.php",
            //         method: "POST",
            //         // dataType: "json",
            //         data: {
            //             id: -1,
            //             idu: -1
            //         },
            //         success: function(data) {
            //             $('#table_index').html(data);
            //             // table.destroy();
            //             list();
            //         }
            //     })
            // }
        });
    </script>


<?php
}
}
?>