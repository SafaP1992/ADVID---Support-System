<?php
include('../server.php');
    if (empty($_SESSION['vcrUsernameUser'])) {
        header("location:../index.php");
        // header("Refresh:0");
        // echo 'window.location.href="../index.php";'; 
    } else {
    session_start();
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
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <!-- Main -->
    <div class="container mt-2">
        <div class="row">
            <h4 class="linetext mb-4">ارسال درخواست</h4>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="row">
                    <form method="POST" action="ajax/add_new_comment.php" id="comment_form" enctype="multipart/form-data">
                        <div class="form-row">


                            <div class="form-group col-md-4"><label>موضوع درخواست</label>
                                <input type="text" class="form-control" id="comment_subject" name="comment_subject" maxlength="70" placeholder="موضوع در خواستی شما...">
                            </div>


                            <div class="form-group col-md-4"><label> اولویت</label>
                                <select id="inputState" name="inputState" class="form-control">
                                    <option value="" disabled selected hidden>انتخاب کنید...</option>
                                    <option value="1">کم</option>
                                    <option value="2">متوسط</option>
                                    <option value="3">زیاد</option>
                                    <!--<option value="4">اورژانسی</option>-->
                                </select>
                            </div>

                            <div class="form-group col-md-4"><label>پاسخگو به</label>
                                <select id="inputResponse" name="inputResponse" class="form-control">

                                </select>
                            </div>


                            <div class="form-group col-md-12"><label>پیام شما</label>
                                <textarea class="form-control" placeholder="متن" rows="5" id="comment_content" name="comment_content" maxlength="1000"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label> فایل (اختیاری) :</label> <input type="file" class="form-control" id="inputfile" name="inputfile">
                            </div>
                            

                            <div class="form-group col-md-12">
                                <input type="text" style="width:100px" class="text-captcha" name="captcha" id="captcha" />
                                <img src="../captcha.php">
                            </div>
                            <!-- unset($_SESSION['Products']); -->
                            <input type="hidden" id="txtcaptcha" value="" disabled />

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit">ارسال پیام</button>
                            </div>
                            
                            
                        </div>
                        
                    </form>


                    <span id="error_message" class="text-danger"></span>
                    <br />
                    <div id="display_comment"></div>


                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>    
    <!--<script type="text/javascript" src="../assets/js/jquery.captcha.basic.min.js"></script>-->

</body>

</html>





<script>
    $(document).ready(function() {

        // $('#comment_form').captcha();
          
        // $("#date").datepicker("option", "dateFormat", "mm/dd/yy");
        
        // $('#comment_form').captcha();


        load_captcha();

        function load_captcha() {
            $.ajax({
                url: "../server.php",
                method: "POST",
                data:{
                    get_captcha:-1
                },
                success: function(data) {
                    // alert(data);
                    $('#txtcaptcha').val(data);
                }
            });
        }


        load_phones_data();

        function load_phones_data() {
            $.ajax({
                url: "ajax/fetch_phone_response_to_ajax.php",
                method: "POST",
                success: function(data) {
                    // alert(data);
                    $('#inputResponse').html(data);
                }
            });
        }
        
        // $('#inputResponse').change(function() {
        //     load_phones_data();
        // });

        // function formatDateToString(date) {
        //     // 01, 02, 03, ... 29, 30, 31
        //     var dd = (date.getDate() < 10 ? '0' : '') + date.getDate();
        //     // 01, 02, 03, ... 10, 11, 12
        //     var MM = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
        //     // 1970, 1971, ... 2015, 2016, ...
        //     var yyyy = date.getFullYear();

        //     // create the format you want
        //     return (MM + "/" + dd + "/" + yyyy);
        // }

        // var d = new Date();
        // $('#date').val(formatDateToString(d));

        // $("#date").datepicker({
        //     showButtonPanel: true
        // });

        // $('#inputfile').change(function() {
        // })

        $('#comment_form').on('submit', function(event) {
            event.preventDefault();

            var count = 0;
            var inputState = '';

            if ($('#comment_subject').val() == '') {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">لطفا موضوع درخواست را مشخص کنید</label>');
                count++;
                return;
            }
            // inputState = $('#inputState').val(); //
            inputState = $('#inputState option:selected').index();
            if (inputState == 0) {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">لطفا اولویت درخواست را مشخص کنید</label>');
                count++;
                return;
            }
            inputResponse = $('#inputResponse option:selected').index();
            if (inputResponse == 0) {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">لطفا شماره برای پاسخگو را مشخص کنید</label>');
                count++;
                return;
            }

            if ($('#comment_content').val() == '') {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">لطفا پیام درخواست را بنویسید</label>');
                count++;
                return;
            }
            
            
            

            if ($('#captcha').val() == '') {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">لطفا کلمه امینتی را وارد نمائید!</label>');
                count++;
                return;
            }
            if ($('#captcha').val() != $('#txtcaptcha').val()) {
                $('#error_message').html('<br />خطا ! : <label class="text-danger">رمز امنیتی اشتباه می باشد.</label>');
                count++;
                // load_captcha();
                return;
            }


            if ($('#inputfile').val() != '') {
                var name = $("#inputfile").val();
                var ext = name.split('.').pop().toLowerCase();
                if ($.inArray(ext, ['rar', 'zip', 'doc','docx', 'pdf', 'jpg', 'jpeg']) == -1) {
                    $('#error_message').html('<br />خطا ! : <label class="text-danger">فقط فایل های، jpg, jpeg, rar, zip, doc, docx, pdf معتبر است.</label>');
                    count++;
                    return false;
                }

                var f = $('#inputfile')[0].files[0];
                if (f.size > 20000000) {
                    // alert(f.size || f.fileSize);
                    $('#error_message').html('<br />خطا ! : <label class="text-danger">فایل باید کمتر از 20 مگابایت باشد.</label>');
                    return false;
                } else {
                    $('#error_message').html('<br /><label class="text-danger"></label>');
                }
            }

			
			
            var form_data = new FormData(this);
            $.ajax({
                url: "ajax/add_new_comment_ajax.php",
                method: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: form_data,
                // dataType: "JSON",
                beforeSend: function() {
                    if ($('#comment_subject').val() != '' && $('#comment_content').val() != '' && $('#inputState option:selected').index() != '0') {
                        $('#error_message').html('<br /><label class="text-primary">در حال ارسال پیام شما...</label>');
                        $('#comment_form').find('input, textarea, button, select').prop("disabled", true);
                        // $('#comment_form').hide("slow");
                    }
                },
                success: function(data) {
                    if (data.error != '') {
                        // alert(data);
                        if (count == 0) {
                            $('#comment_form')[0].reset();
                            // $('#error_message').html(data.error);
                            $('#error_message').html('<br /><label class="text-primary">پیام درخواستی شما ارسال شد، لطفا منتظر بمانید تا بررسی شود.</label>');
                            window.location.href = "fetch-requests.php";
                        }
                    }
                }
            })
        });


    });
</script>



<?php
}
?>