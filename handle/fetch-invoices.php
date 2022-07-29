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
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- Main -->
    <div class="container mt-2">
        <div class="row">
            <h4 class="linetext mb-4">فاکتورها</h4>
        </div>
        <div class="row">
            <div class="card-body">

                <table id="user-list" class="display ui celled table dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تاریخ صدور</th>
                            <th>کارشناس</th>
                            <th>تصاویر</th>
                            <th>توضیحات</th>
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
                        <div class="form-group">
                            <label>توضیحات</label>
                            <div name="describtion" id="describtion"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
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
    <script type="text/javascript" src="../assets/js/jquery.fancybox.min.js"></script>

</body>

</html>




<script>
    $(document).ready(function() {


        function load_pdf_img() {
            // Preview of Images
            $('[data-fancybox="gallery"]').fancybox({
                smallBtn: true,
                toolbar: false,
                closeExisting: false,
                loop: false,
                keyboard: false,
                arrows: false,
                infobar: false,
                type: 'iframe',
                iframe: {
                    preload: false // fixes issue with iframe and IE
                },
                // openEffect: 'elastic',
                // closeEffect: 'elastic',
                // autoSize: true,
            });
        }


        load_table();

        function load_table() {
            $.ajax({
                url: "ajax/fetch_invoices_ajax.php",
                method: "POST",
                // dataType: "json",
                data: {
                    get_invoices: -1
                },
                success: function(data) {
                    $('#table_index').html(data);
                    load_pdf_img();
                    list();
                }
            })
        }

        // $('#user-list').DataTable();
        function list() {
            $('#user-list').DataTable({
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



        $(document).on('click', '.info-description', function() {
            var invoice_id = $(this).attr("id");
            // alert(invoice_id);
            $.ajax({
                method: "POST",
                url: "ajax/fetch_invoices_ajax.php",
                data: {
                    display_describtion: -1,
                    invoice_id: invoice_id
                },
                dataType: "json",
                success: function(data) {
                    // alert(data);
                    $('#userModal').modal('show');
                    $('#describtion').html('<span>' + data.InvoicesDescription + '</span');
                }
            })
        });

        $(document).on('click', '.info-description-img1', function() {
            var invoice_id = $(this).attr("id");
            var invoice_id_slice = invoice_id.slice(4);
            $.ajax({
                method: "POST",
                url: "ajax/fetch_invoices_ajax.php",
                data: {
                    display_describtion: -1,
                    invoice_id: invoice_id_slice
                },
                success: function(data) {}
            })
        });

        $(document).on('click', '.info-description-img2', function() {
            var invoice_id = $(this).attr("id");
            var invoice_id_slice = invoice_id.slice(4);
            $.ajax({
                method: "POST",
                url: "ajax/fetch_invoices_ajax.php",
                data: {
                    display_describtion: -1,
                    invoice_id: invoice_id_slice
                },
                success: function(data) {}
            })
        });

        $(document).on('click', '.info-description-img3', function() {
            var invoice_id = $(this).attr("id");
            var invoice_id_slice = invoice_id.slice(4);
            $.ajax({
                method: "POST",
                url: "ajax/fetch_invoices_ajax.php",
                data: {
                    display_describtion: -1,
                    invoice_id: invoice_id_slice
                },
                success: function(data) {}
            })
        });




    });
</script>


<?php
}
?>