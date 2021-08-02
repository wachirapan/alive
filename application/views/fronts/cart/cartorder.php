<style>
    .box-img {
        padding: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 5px !important;
        overflow: auto;
    }

    span {
        color: red;
    }

    input, select {
        border: 1px solid #f7a4b2 !important;
    }
    .input-number{
        width: 10px!important;
        text-align: center;
    }
    .minus{
        cursor: pointer;
    }
    .plus{
        cursor: pointer;
    }
</style>
<div class="container" style="margin-top: 3%">
    <div class="text-center">
        <h4>Shopping Cart</h4>
    </div>
    <div class="row">
        <?php $orderline = $this->FQueryView->get_orderlinemockup();
        if (count($orderline) == 0) { ?>
            <div class="col-md-12">
                <div class="text-center box-img">
                    <h4>ไม่มีสินค้าในรายการ</h4>
                </div>
            </div>
        <?php } else {

            ?>
            <div class="col-md-12">
                <div class="box-img">
                    <div class="table-responsive">
                        <table class="table ">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Price</th>
                                <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantiry&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                            <tbody>
                            <?php $orderline = $this->FQueryView->get_orderlinemockup();
                            $sumprice = 0.00;
                            $sumpoint = 0.00;
                            $express = 0.00;
                            $sumordermore = 0.00;
                            if (count($orderline) == 0) { ?>
                                <tr>
                                    <td colspan="5" style="text-align: center"><h4>ไม่มีข้อมูลการสั่งชื้อ</h4></td>
                                </tr>
                            <?php } else {
                                foreach ($orderline as $item) {
                                    $express += $item->product_tranfer;
                                    $sumpoint += $item->product_point; ?>
                                    <tr>
                                        <td scope="row">
                                            <div style="width: 70px; height: 70px; background-color: grey ">
                                                <img src="<?= $this->FQueryView->imageproduct_image($item->product_id) ?>"
                                                     style="width: 70px; height: 70px; object-fit: cover;">
                                            </div>
                                        </td>
                                        <td class="text-nowrap"><h6 class="txt-margin"><?= $item->product_name ?></h6> <input
                                                type="hidden" name="product_id"
                                                value="<?= $item->product_id ?>"></td>
                                        <td class="text-nowrap">
                                            <h6 class="txt-margin-price"><?= number_format($item->product_price, 2) ?>
                                                ฿</h6></td>
                                        <td class="text-nowrap">
                                            <div class="input-group">
                                                <div class="input-group-prepend minus">
                                                    <span class="input-group-text " style="border: 1px solid #f7a4b2; color: #f7a4b2; background-color: white"> - </span>
                                                </div>
                                                <input type="text" class="form-control input-number" id="total"
                                                       name="total" value="<?= $item->product_total ?>">
                                                <div class="input-group-append plus">
                                                    <span class="input-group-text" style="border: 1px solid #f7a4b2; color: #f7a4b2; background-color: white"> + </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <h6 class="txt-margin-price">
                                                <?php $sumprice += ($item->product_total * $item->product_price) ?>
                                                <?= number_format($item->product_total * $item->product_price, 2) ?>
                                                ฿</h6></td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg del-trash" style="color: red"
                                               onclick="delete_ordercartmainweb(
                                                   '<?= $item->cartmockupline_id ?>'
                                                   );"></i></td>
                                    </tr>

                                <?php }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 5%;">
                <div class="box-img">
                    <h5>ยอดชำระ</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="text-nowrap"><h6>ราคา : </h6></td>
                                <td class="text-nowrap"><h6><?= number_format($sumprice, 2) ?> ฿</h6></td>
                                <td class="text-nowrap"><h6>ค่าจัดส่ง : </h6></td>
                                <td class="text-nowrap"><h6><?= number_format($express, 2) ?> ฿</h6></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-nowrap"><h6>รวมราคา : </h6></td>
                                <td class="text-nowrap"><h6><?=number_format($sumprice + $express, 2)?> ฿</h6></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <?php
        } ?>



        <div class="col-md-12" id="form-address" style="margin-top: 5%;">
            <div class="box-img">
                <h5>Address (ที่อยู่จัดส่ง)</h5>
                <div class="form-group">
                    <label>ชื่อ-นามสกุล (ผู้รับสินค้า) <span>*</span></label>
                    <input type="text" class="form-control" id="user_name">
                </div>
                <div class="form-group">
                    <label>เบอร์โทรศัพท์ <span>*</span></label>
                    <input type="text" class="form-control" id="user_phone">
                </div>
                <div class="form-group">
                    <label>ที่อยู่ <span>*</span></label>
                    <input type="text" class="form-control" id="user_address">
                </div>
                <div class="form-group">
                    <label>จังหวัด <span>*</span></label>
                    <select class="form-control" id="province" onchange="select_province();">
                        <option value="เลือกจังหวัด"> เลือกจังหวัด</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>อำเภอ/เขต <span>*</span></label>
                    <select class="form-control" id="district" onchange="select_district();">
                    </select>
                </div>
                <div class="form-group">
                    <label>ตำบล/แขวง <span>*</span></label>
                    <select class="form-control" id="subdistrict" onchange="check_zipcode();">

                    </select>
                </div>
                <div class="form-group">
                    <label>รหัสไปรษณีย์ <span>*</span></label>
                    <input type="text" class="form-control" id="zipcode">
                </div>

                <div class="form-group">
                    <label>อีเมล์ </label>
                    <input type="text" class="form-control" id="user_email">
                </div>
                <div class="form-group">
                    <label>Line Id</label>
                    <input type="text" class="form-control" id="user_line">
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="โอนเงิน"
                               checked>
                        โอนเงิน
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="เก็บปลายทาง">
                        เก็บปลายทาง
                    </label>
                </div>
                <div style="float: right">
                    <button id="btn-confirm" class="btn btn-nonbackground" onclick="confirm_cart();"> ยืนยันการสั่งชื้อ</button>
                    <button id="btn-cancle" class="btn btn-background" onclick="cancleOrder();"> ยกเลิกสั่งชื้อ</button>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="sumtranfer" value="<?= $this->FQueryView->get_tranfer(); ?> ">
<input type="hidden" id="sumprice" value="<?= $this->FQueryView->get_sumpirce(); ?> ">

<input type="hidden" id="name_district">
<input type="hidden" id="name_subdistrict">

<input type="hidden" id="subdirect" name="subdirect" value="<?=$this->FQueryView->checkSubdirect($this->uri->segment(1));?>">

<script>
    $(document).ready(function () {
        if($('#sumprice').val() == 0 || $("#sumprice").val() == ""){
            $('#form-address').hide();
        }else{
            $('#form-address').show();
        }

        $.getJSON("<?=site_url('Api/get_province')?>", function (data) {
            $.each(data, function (k, v) {
                $('#province').append('<option value="' + v['id'] + '">' + v['name'] + '</option>');
            });
        });

        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();

            var currentRow = $(this).closest("tr");
            var product_id = currentRow.find("td:eq(1) input[name='product_id']").val();
            var total = currentRow.find("td:eq(3) input[name='total']").val();
//            console.log(product_id +" -------- "+total );
            $.post("<?=site_url('FUpdateData/update_cartmockup')?>", {
                product_id: product_id,
                total: total
            }, function () {
                location.reload();
            });


            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();

            var currentRow = $(this).closest("tr");
            var product_id = currentRow.find("td:eq(1) input[name='product_id']").val();
            var total = currentRow.find("td:eq(3) input[name='total']").val();

            $.post("<?=site_url('FUpdateData/update_cartmockup')?>", {
                product_id: product_id,
                total: total
            }, function () {
                location.reload();
            });

            return false;
        });
    });
    function confirm_cart() {
        $('#btn-confirm').hide();
        $('#btn-cancle').hide();
        if ($('input[name="optradio"]:checked').val() == 'โอนเงิน') {
            $('#order_price').val($('#sumprice').val());
            $('#payments').modal('toggle');
        } else {
            Swal.fire({
                title: 'CONFIRM !',
                text: 'ยืนยันการสมัครสมาชิกหรือไม่',
                icon: 'success',
                confirmButtonText: 'ยืนยัน'
            }).then(function (res) {
                if(res.isConfirmed){
                    $.post("<?=site_url('FInsertData/comfirm_cart')?>", {
                        user_name: $("#user_name").val(),
                        user_phone: $('#user_phone').val(),
                        user_address: $('#user_address').val(),
                        province: $("#province").val(),
                        name_district : $('#name_district').val(),
                        name_subdistrict : $('#name_subdistrict').val(),
                        zipcode: $("#zipcode").val(),
                        user_email: $("#user_email").val(),
                        user_line: $("#user_line").val(),
                        status: $('input[name="optradio"]:checked').val(),
                        sumtranfer: $("#sumtranfer").val(),
                        sumprice: $('#sumprice').val(),
                        subdirect : $('#subdirect').val()
                    }, function () {
                        location.href = "<?=site_url($this->uri->segment(1).'/confirm_shopping')?>";
                    });
                }
            });

        }
    }
    function confirm_payments() {
        $.post("<?=site_url('FInsertData/tranfer_sliper')?>", {
            review_picture: $('#review_picture').val(),
            order_price: $("#order_price").val(),
            create_date: $("#create_date").val()
        }, function () {
            nextstep();
        });

    }
    function nextstep() {
        $('#btn-confirm').hide();
        $('#btn-cancle').hide();
        $.post("<?=site_url('FInsertData/comfirm_cart')?>", {
            user_name: $("#user_name").val(),
            user_phone: $('#user_phone').val(),
            user_address: $('#user_address').val(),
            province: $("#province").val(),
            name_district : $('#name_district').val(),
            name_subdistrict : $('#name_subdistrict').val(),
            zipcode: $("#zipcode").val(),
            user_email: $("#user_email").val(),
            user_line: $("#user_line").val(),
            status: $('input[name="optradio"]:checked').val(),
            sumtranfer: $("#sumtranfer").val(),
            sumprice: $('#sumprice').val(),
            subdirect : $('#subdirect').val()
        }, function () {
            location.href = "<?=site_url($this->uri->segment(1).'/confirm_shopping')?>";
        });
    }
    function delete_ordercartmainweb(cartmockupline_id) {
        if(confirm('ยืนยันการลบสินค้านี้หรือไม่')){
            $.post("<?=site_url('FDeleteData/deletedata_mockup')?>",{
                cartmockupline_id : cartmockupline_id
            },function () {
                location.reload();
            });
        }

    }
    function select_province() {
        $('#district').html('');
        $('#district').append('<option value="">-- เลือก อำเภอ/เขต --</option>');
        $.getJSON("<?=site_url('Api/check_district?province_id=')?>"+$("#province").val(), function (data) {
            $.each(data, function (k,v) {
                $('#district').append('<option value="'+v['id']+'">'+v['name_th']+'</option>');

            });
        });
    }
    function select_district() {
        $('#name_district').val($( "#district option:selected" ).text());
        $('#subdistrict').html('');
        $('#subdistrict').append('<option value="">-- เลือก ตำบล/แขวง --</option>');
        $.getJSON("<?=site_url('Api/check_subdistrict?district_id=')?>"+$('#district').val(), function (data) {
            $.each(data, function (k,v) {
                $('#subdistrict').append('<option value="'+v['id']+'">'+v['name_th']+'</option>');


            });
        });
    }
    function check_zipcode() {
        $.getJSON("<?=site_url('Api/check_zipcode?subdistrict=')?>"+$('#subdistrict').val(), function (data) {
            $.each(data, function (k,v) {
                $("#zipcode").val(v['zip_code']);
                $('#name_subdistrict').val(v['name_th']);
            });
        });
    }
    function cancleOrder() {
        Swal.fire({
            title: 'CONFIRM !',
            text: 'ยืนยันการยกเลิกการชื้อนี้หรือไม่',
            icon: 'warning',
            confirmButtonText: 'ยืนยัน'
        }).then(function (res) {
            if(res.isConfirmed){
                $.post("<?=site_url('FDeleteData/cancleOrder')?>",{},function () {
                    location.href = "<?=site_url($this->uri->segment(1))?>"
                });
                location.href = "";
            }
        });

    }
</script>


<div class="modal" id="payments">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="order_id">
                <div style="border: solid 1px; height: 150px; width: 150px; margin: auto;" id="boximage">
                    <img id="output" width="150px" height="150px"/>
                </div>
                <div class="form-group">
                    <label>รูปภาพ </label>
                    <input type="hidden" id="review_picture" name="review_picture">
                    <input type="file" class="form-control" id="picture_header" onchange="loadFile(event)"
                           accept="image/*">
                    <script>
                        var loadFile = function (event) {
                            $('#boximage').show();
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                        };
                        $("input#picture_header:file").change(function (e) {
                            sendFile2(e.target.files[0]);
                        });
                        function sendFile2(file) {
                            var data = new FormData();
                            data.append("file", file);
                            $.ajax({
                                url: "<?php echo site_url('UploadImage/upload_sliper')?>",
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'JSON',
                                type: "POST",
                                success: function (data) {
                                    console.log(data);
                                    if (typeof data.success !== "undefined") {
                                        var url_picture = data.success.file_name;
                                        $('#review_picture').val(url_picture);
                                    }
                                    if (typeof data.error !== "undefined") {
                                        $("div#error-box-header").removeClass("display-hide");
                                        $("div#error-box-header p").html(data.error);
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus + " " + errorThrown);
                                }
                            });
                        }
                    </script>

                </div>
                <div class="form-group">
                    <label>ราคา</label>
                    <input type="text" class="form-control" id="order_price">
                </div>
                <div class="form-group">
                    <label>วันที่โอน</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success" onclick="confirm_payments();">ยืนยันชำระ</button>
            </div>

        </div>
    </div>
</div>

