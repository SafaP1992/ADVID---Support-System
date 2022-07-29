<?php
include('../server.php');
    if (empty($_SESSION['vcrUsernameUser'])) {
        header("location:../index.php");
    } else {
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

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- Main -->
    <div class="container mt-2">
        <div class="row">
            <h4 class="linetext mb-4">رابط های کاربر</h4>
            <div class="col-12 float-left text-left">
                <button class="btn btn-primary" id="add_user">+ افزودن کاربر جدید</button>
            </div>
            <span id="error_message" class="text-danger"></span>

        </div>
        <div class="row">
            <div class="card-body">
                <div class="row" id="add_u">

                    <div class="form-inline col-md-12">
                        <input name="radsex" type="radio" value="1" id="radmale" required><label for="radmale" style="margin-right:5px"> آقا </label>
                        <input name="radsex" type="radio" value="2" id="radfemal" style="margin-right:20px" required><label for="radfemal" style="margin-right:5px"> خانم </label>
                        <div class="invalid-feedback">لطفا آقا یا خانم را مشخص نمایید</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtname">آقای/خانم</label>
                        <input type="text" class="form-control" name="txtname" id="txtname" maxlength="30">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtsection">سمت</label>
                        <input type="text" class="form-control" name="txtsection" id="txtsection" maxlength="20">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtphone">شماره تماس</label>
                        <input type="text" class="form-control" name="txtphone" id="txtphone" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtemail">ایمیل</label>
                        <input type="text" class="form-control" name="txtemail" id="txtemail" maxlength="40">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtaddress">آدرس</label>
                        <input type="text" class="form-control" name="txtaddress" id="txtaddress" maxlength="120">
                    </div>
                    <div class="form-group col-12 text-center">
                        <input type="submit" class="btn btn-primary" name="register_user" id="register_user" value="ثبت کاربر">
                        <input type="submit" class="btn btn-primary" name="cancel" id="cancel" value="لغو">
                    </div>

                </div>



                <table id="user-list" class="display ui celled table dataTable " style="width:100%">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>آقای/خانم</th>
                            <th>سمت</th>
                            <th>شماره تماس</th>
                            <th>ایمیل</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table_index">

                    </tbody>
                </table>


            </div>
        </div>
    </div>



    <!-- BOX MODAL -->
    <div id="userModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" id="edit_user_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">جزئیات</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-inline">
                            <input name="userrel_radsex" type="radio" value="1" id="userrel_radmale" required><label for="radmale" style="margin-right:5px"> آقا </label>
                            <input name="userrel_radsex" type="radio" value="2" id="userrel_radfemal" style="margin-right:20px" required><label for="radfemal" style="margin-right:5px"> خانم </label>
                        </div>
                        <div class="form-group">
                            <label>نام</label>
                            <input type="text" name="userrel_name" id="userrel_name" class="form-control" maxlength="30" />
                        </div>
                        <div class="form-group">
                            <label>بخش/سمت</label>
                            <input type="text" name="userrel_section" id="userrel_section" class="form-control" maxlength="20" />
                        </div>
                        <div class="form-group">
                            <label>شماره تماس</label>
                            <input type="text" name="userrel_contact" id="userrel_contact" class="form-control" maxlength="11" />
                        </div>
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="email" name="userrel_email" id="userrel_email" class="form-control" maxlength="40" />
                        </div>
                        <div class="form-group">
                            <label>محل شغل</label>
                            <input type="text" name="userrel_address" id="userrel_address" class="form-control" maxlength="120" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="userrel_id" id="userrel_id" />
                        <input type="submit" name="submit" class="btn btn-info" value="ویرایش" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    </div>
                </form>
            </div>
        </div>
    </div>










    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>




<script>
    $(document).ready(function() {

        load_users();

        function load_users() {
            $.ajax({
                url: "ajax/fetch_users_ajax.php",
                method: "POST",
                // dataType: "json",
                data: {
                    id: -1,
                    idu: -1
                },
                success: function(data) {
                    $('#table_index').html(data);
                    // table.destroy();
                    list();
                }
            })
        }

        function list() {
            table = $('#user-list').DataTable({
                "oLanguage": {
                    "sSearch": "جستجو",
                    "sLengthMenu": "تعداد نمایش صفحه _MENU_",
                    "sZeroRecords": "متاسفانه اطلاعاتی موجود نیست!",
                    "sInfo": "نمایش صفحه _PAGE_ از _PAGES_",
                    "sInfoEmpty": "هیچ صفحه ای در دسترس نیست!",
                    "oPaginate": {
                        "sPrevious": "قبلی",
                        "sNext": "بعدی",
                    }
                }
            });
        }



        $("#add_u").slideUp("fast");

        $('#add_user').click(function() {
            $("#add_u").slideToggle("slow");
        });


        $('#cancel').click(function() {
            $("#add_u").slideUp();
        });

        $('#register_user').click(function() {
            var radsex = $('input:radio[name=radsex]:checked').val();
            var name = $("#txtname").val();
            var section = $("#txtsection").val();
            var phone = $("#txtphone").val();
            var email = $("#txtemail").val();
            var address = $("#txtaddress").val();
            
            
            //  if (preg_match('/^[a-zA-Z0-9-آابپتثجچحخدذرزژسشصضطظعغفق  کگلمنوهی]+$/', $input) != 0)
            // if(name.match('/^[a-z0-9_-]$/')) {
            //     alert("نام وارد شده معتبر نیست.");
            //     return;
            //     //  phone.addClass("needsfilled");
            //     //  phone.val(phonerror);
            // }
            
        
        //     if($("#txtname").val() == "select" or $("#txtname").val() == "update" or $("#txtname").val() == "delete" or $("#txtname").val() == "drop" or $("#txtname").val() == "insert"  or $("#txtname").val() == "set" or $("#txtname").val() == "view" or $("#txtname").val() == "create" ){
        //         $("#error_message").html('نوشته هایی که وارد کردید، مجاز نیست.');
    		  //  return;
        //     }
        //     if(section == "select" or section == "update" or section == "delete" or section == "drop" or section == "insert"  or section == "set" or section == "view" or section == "create" ){
        //         $("#error_message").html('نوشته هایی که وارد کردید، مجاز نیست.');
    		  //  return;
        //     }
            
            
        //     if(phone == "select" or phone == "update" or phone == "delete" or phone == "drop" or phone == "insert"  or phone == "set" or phone == "view" or phone == "create" ){
        //         $("#error_message").html('نوشته هایی که وارد کردید، مجاز نیست.');
    		  //  return;
        //     }
            // $('#txtphone').keyup(function() {
            //     var inputVal = $(this).val();
            //     var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
            //     // if(!numericReg.test(inputVal)) {
            //     //     $(this).after('<span class="error error-keyup-1">فقط شماره تماس وارد نمایید.</span>');
            //     // }
            // });
            
            
        //     if(email == "select" or email == "email" or section == "email" or section == "email" or section == "email"  or section == "email" or section == "email" or section == "email" ){
        //         $("#error_message").html('نوشته هایی که وارد کردید، مجاز نیست.');
    		  //  return;
        //     }
            
        //     if(address == "select" or address == "update" or address == "delete" or address == "drop" or address == "insert"  or address == "set" or address == "view" or address == "create" ){
        //         $("#error_message").html('نوشته هایی که وارد کردید، مجاز نیست.');
    		  //  return;
        //     }
            
            // var maxLength = 15;
            // $('textarea').keyup(function() {
            //   var textlen = maxLength - $(this).val().length;
            //   $('#rchars').text(textlen);
            // });
            
            

            if (radsex == null) {
                $("#error_message").html('جنسیت را مشخص نمایید');
                return;
            } else if ($("#txtname").val() == '') {
                $("#error_message").html('اسم کاربر را وارد نمایید');
                return;
            } else if ($("#txtsection").val() == '') {
                $("#error_message").html('سمت کار را وارد نمایید');
                return;
            } else if ($("#txtphone").val() == '') {
                $("#error_message").html('شماره تماس کاربر را وارد نمایید');
                return;
                // } else if ($("#txtemail").val() == '') {
                //     $("#error_message").html('ایمیل را وارد نمایید');
                //     return;
                // } else if ($("#txtemail").val() == '') {
                //     $("#error_message").html('آدرس را وارد نمایید');
                //     return;
            } else {
                $.ajax({
                    type: "POST",
                    url: "ajax/add_user_ajax.php",
                    data: {
                        insert: -1,
                        flag: -1,
                        radsex: radsex,
                        name: name,
                        section: section,
                        phone: phone,
                        email: email,
                        address: address,
                    },
                    success: function(data) {
                        // alert(data);
                        // $("#user_id").val() = "";
                        $('input:radio[name=radsex]:checked').prop('checked', false);
                        $("#txtname").val('');
                        $("#txtsection").val('');
                        $("#txtphone").val('');
                        $("#txtemail").val('');
                        $("#txtaddress").val('');
                        $("#add_u").slideUp("fast");
                        table.destroy();
                        load_users();
                    }
                });
            }


        });




        $(document).on('click', '.info-details', function() {
            var userrel_id = $(this).attr("id");
            $.ajax({
                method: "POST",
                url: "ajax/add_user_ajax.php",
                data: {
                    edit: 1,
                    user_id: userrel_id
                },
                dataType: "json",
                success: function(data) {
                    $('#userModal').modal('show');
                    $('#userrel_id').val(userrel_id);
                    $("input[name=userrel_radsex][value=" + data.UserRelSex + "]").prop('checked', true);
                    $('#userrel_name').val(data.UserRelName);
                    $('#userrel_section').val(data.UserRelSection);
                    $('#userrel_contact').val(data.UserRelContact);
                    $('#userrel_email').val(data.UserRelEmail);
                    $('#userrel_address').val(data.UserRelAddress);
                }
            })
        });

        $('#edit_user_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#userrel_name').val() == '') {
                alert("اسم کاربر را وارد نمائید!");
            } else {
                $.ajax({
                    url: "ajax/add_user_ajax.php",
                    method: "POST",
                    data: $('#edit_user_form').serialize(),
                    success: function(data) {
                        // alert(data);
                        $('#userModal').modal('hide');
                        table.destroy();
                        load_users();
                        alert("ویرایش شد.");
                    },
                    error: function(data) {
                        alert("ajax error, json: " + data);
                    }
                });
            }
        });


        $(document).on('click', '.info-details-delete', function() {
            var userrel_id = $(this).attr("id");
            
            var userrel_id_slice = userrel_id.slice(3);
            // alert(userrel_id_slice);
            // return;
                var r = confirm("آیا می خواهید پاک شود؟");
                if (r == true) {
                    $.ajax({
                        method: "POST",
                        url: "ajax/add_user_ajax.php",
                        data: {
                            del: 1,
                            flag: userrel_id_slice
                        },
                        // dataType: "json",
                        success: function(data) {
                            // alert(data);
                            table.destroy();
                            load_users();
                        }
                    })
                } else {
                    txt = "You pressed Cancel!";
                    // alert('cancel');
                }
        });


    });
</script>


    <?php
    }
    ?>