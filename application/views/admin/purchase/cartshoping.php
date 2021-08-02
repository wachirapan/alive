<style>
    .txt-margin {
        margin-top: 10%;
    }

    .txt-margin-price {
        margin-top: 10%;
    }

    .input-number {
        text-align: center;
        width: 10px !important;
    }

    .input-group {
        margin-top: 5%;
    }

    .del-trash {
        margin-top: 40%;
    }
    .want{
        color: red;
    }

</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายการสั่งชื้อ</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col">Product</td>
                                <td scope="col"></td>
                                <td scope="col">Price</td>
                                <td scope="col">Quantiry</td>
                                <td scope="col">Total</td>
                                <td scope="col"></td>
                            </tr>
                            <tbody>
                            <?php $orderline = $this->FQueryView->get_orderlinemockup();
                            $sumprice = 0.00;
                            $sumpoint = 0.00;
                            $express = 0.00;
                            $sumordermore = 0.00;
                            if (count($orderline) == 0) { ?>
                                <tr>
                                    <td colspan="5" style="text-align: center" class="text-nowrap"><h4>ไม่มีข้อมูลการสั่งชื้อ</h4></td>
                                </tr>
                            <?php } else {
                                foreach ($orderline as $item) {
                                    $express += $item->product_tranfer;
                                    $sumpoint += $item->product_point; ?>
                                    <tr>
                                        <td class="text-nowrap">
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
                                                THB</h6></td>
                                        <td class="text-nowrap">
                                            <div class="input-group">
                                                <div class="input-group-prepend minus">
                                                    <span class="input-group-text "> - </span>
                                                </div>
                                                <input type="text" class="form-control input-number" id="total"
                                                       name="total" value="<?= $item->product_total ?>">
                                                <div class="input-group-append plus">
                                                    <span class="input-group-text"> + </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <h6 class="txt-margin-price">
                                                <?php $sumprice += ($item->product_total * $item->product_price) ?>
                                                <?= number_format($item->product_total * $item->product_price, 2) ?>
                                                THB</h6></td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg del-trash" style="color: red"
                                               onclick="delete_ordercart(
                                                       '<?= $item->product_id ?>'
                                                       );"></i></td>
                                    </tr>

                                <?php }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">สรุปการสั่งชื้อ</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td scope="col"><h6>ราคา : </h6></td>
                            <td scope="col"><h6><?= number_format($sumprice, 2) ?> THB</h6></td>
                            <td scope="col"><h6>คะแนน : </h6></td>
                            <td scope="col"><h6><?= number_format($sumpoint, 2) ?></h6></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap"><h6>ค่าจัดส่ง : </h6></td>
                            <td class="text-nowrap"><h6><?= number_format($express, 2) ?> THB</h6></td>
                            <td class="text-nowrap"><h6>ส่วนลด : </h6></td>
                            <td class="text-nowrap">
                                <h6><?= number_format($this->AQueryView->check_amountdiscount($this->AQueryView->get_checkpoint()), 2) ?>
                                    THB</h6></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap" colspan="3" style="text-align: center"><h6>รวมราคา : </h6></td>
                            <td class="text-nowrap">
                                <h6><?= number_format(($sumprice + $express) - $this->AQueryView->check_amountdiscount($this->AQueryView->get_checkpoint()), 2) ?>
                                    THB</h6></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">การชำระเงิน</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" id="typeofsaler" onchange="selectTypeSaler();">
                                <option value="">-- ประเภทการขาย --</option>
                                <option value="1">ขายให้กับสมาชิก</option>
                                <option value="2">ขายให้บุคคลทั่วไป</option>
                            </select>
                            <script>
                                function selectTypeSaler() {
                                    if($('#typeofsaler').val() == 1){
                                        $('#form-newadress').hide();
                                        $('#form-members').show();
                                    }else if($('#typeofsaler').val() == 2){
                                        $('#form-newadress').show();
                                        $('#form-members').hide();
                                    }else{
                                        $('#form-newadress').hide();
                                        $('#form-members').hide();
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="form-members" style="margin-top: 3%">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="hidden" id="member_id">
                            <div class="form-group">
                                <label>รหัสสมาชิก</label>
                                <input type="text" class="form-control" id="member_code"
                                       onkeyup="check_usercode();">
                            </div>
                            <div class="form-group">
                                <label>ชื่อสมาชิก</label>
                                <input type="text" class="form-control" id="member_name" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="form-newadress" style="margin-top: 3%;">
                    <div class="box-img">
                        <div class="form-group">
                            <label>ชื่อ-นามสกุล (ผู้รับสินค้า) <span class="want">*</span></label>
                            <input type="text" class="form-control" id="user_name">
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์ <span class="want">*</span></label>
                            <input type="text" class="form-control" id="user_phone">
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่ <span class="want">*</span></label>
                            <input type="text" class="form-control" id="user_address">
                        </div>
                        <div class="form-group">
                            <label>จังหวัด <span class="want">*</span></label>
                            <select class="form-control" id="province" onchange="select_province();">
                                <option value="เลือกจังหวัด"> เลือกจังหวัด</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>อำเภอ/เขต <span class="want">*</span></label>
                            <select class="form-control" id="district" onchange="select_district();">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ตำบล/แขวง <span class="want">*</span></label>
                            <select class="form-control" id="subdistrict" onchange="check_zipcode();">

                            </select>
                        </div>
                        <div class="form-group">
                            <label>รหัสไปรษณีย์ <span class="want">*</span></label>
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
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 3%">
                    <div class="box-img">
                        <div class="form-check">
                            <label class="form-check-label" for="radio1">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                       value="โอนเงิน"
                                       checked>
                                โอนเงิน
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                       value="เก็บปลายทาง">
                                เก็บปลายทาง
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radio3">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio"
                                       value="เงินสด">
                                เงินสด
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 5%">
                    <div class="float-right">
                        <button class="btn btn-nonbackground" onclick="confirm_cart();"><i class="fa fa-save"></i> บันทึก
                        </button>
                        <button class="btn btn-background" onclick="canclecart();"><i class="fa fa-trash"></i> ยกเลิก
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<input type="hidden" id="sumprice" value="<?= $sumprice ?>">
<input type="hidden" id="sumtranfer" value="<?= $express ?>">
<input type="hidden" id="sumpoint" value="<?= $sumpoint ?>">
<input type="hidden" id="discount"
       value="<?= $this->AQueryView->check_amountdiscount($this->AQueryView->get_checkpoint()) ?>">
<input type="hidden" id="sumdiscountprice"
       value="<?= ($sumprice + $express) - $this->AQueryView->check_amountdiscount($this->AQueryView->get_checkpoint()) ?>">

<input type="hidden" id="name_district">
<input type="hidden" id="name_subdistrict">


<script>
    $(document).ready(function () {
        $('#form-newadress').hide();
        $('#form-members').hide();
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
            $.post("<?=site_url('AUpdateData/update_cartmockup')?>", {
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

            $.post("<?=site_url('AUpdateData/update_cartmockup')?>", {
                product_id: product_id,
                total: total
            }, function () {
                location.reload();
            });

            return false;
        });
    });
    function delete_ordercart(product_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('FDeleteData/delete_cartmockupline')?>", {
                product_id: product_id
            }, function () {
                location.reload();
            });
        }
    }
    function select_total(cartmockupline_id, product_total) {
        $('#cartmockupline_id').val(cartmockupline_id);
        $('#total_product').val(product_total);
        $('#form-total').modal('toggle');
    }
    function update_total() {
        $.post("<?=site_url('AUpdateData/update_total_mockup')?>", {
            cartmockupline_id: $('#cartmockupline_id').val(),
            total_product: $('#total_product').val()
        }, function () {
            location.reload();
        });
    }
    function deleteproduct(cartmockupline_id) {
        if (confirm('ยืนยันการยกเลิกสินค้านี้หรือไม่')) {
            $.post("<?=site_url('FDeleteData/deletedata_mockup')?>", {
                cartmockupline_id: cartmockupline_id
            }, function () {
                location.reload();
            });
        }
    }
    function canclecart() {
        if (confirm('ยืนยันการยกเลิกรายการนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/cancle_cartmcokup')?>", function () {
                location.href = "<?=site_url('AController/purchase')?>";
            });
        }
    }

    function confirm_cart() {
//        console.log($('input[name="optradio"]:checked').val());
        if ($('input[name="optradio"]:checked').val() == 'โอนเงิน') {
            $('#order_price').val($('#sumdiscountprice').val());
            $('#payments').modal('toggle');
        } else {
            if (confirm('ยืนยันการสั่งชื้อชื้อสินค้านี้หรือไม่')) {
                $.post("<?=site_url('AInsertData/comfirm_cart')?>", {
                    // ข้อมูลที่อยู่ใหม่
                    user_name: $("#user_name").val(),
                    user_phone: $('#user_phone').val(),
                    user_address: $('#user_address').val(),
                    province: $("#province").val(),
                    name_district : $('#name_district').val(),
                    name_subdistrict : $('#name_subdistrict').val(),
                    zipcode: $("#zipcode").val(),
                    user_email: $("#user_email").val(),
                    user_line: $("#user_line").val(),
                    typeofsaler : $('#typeofsaler').val(),
                    // ข้อมูลที่อยู่ใหม่
                    status: $('input[name="optradio"]:checked').val(),

                    sumtranfer: $("#sumtranfer").val(),
                    sumprice: $('#sumprice').val(),
                    sumpoint: $("#sumpoint").val(),
                    discount: $('#discount').val(),
                    sumdiscountprice: $('#sumdiscountprice').val(),
                    member_id: $("#member_id").val()
                }, function () {
                    location.href = "<?=site_url('AController/purchaseorder')?>";
                });
            }

        }
    }
    function confirm_payments() {
        $.post("<?=site_url('AInsertData/tranfer_sliper')?>", {
            review_picture: $('#review_picture').val(),
            order_price: $("#order_price").val(),
            create_date: $("#create_date").val()
        }, function () {
            nextstep();
        });

    }
    function nextstep() {
        $.post("<?=site_url('AInsertData/comfirm_cart')?>", {
            // ข้อมูลที่อยู่ใหม่
            user_name: $("#user_name").val(),
            user_phone: $('#user_phone').val(),
            user_address: $('#user_address').val(),
            province: $("#province").val(),
            name_district : $('#name_district').val(),
            name_subdistrict : $('#name_subdistrict').val(),
            zipcode: $("#zipcode").val(),
            user_email: $("#user_email").val(),
            user_line: $("#user_line").val(),
            typeofsaler : $('#typeofsaler').val(),
            // ข้อมูลที่อยู่ใหม่
            status: $('input[name="optradio"]:checked').val(),

            sumtranfer: $("#sumtranfer").val(),
            sumprice: $('#sumprice').val(),
            sumpoint: $("#sumpoint").val(),
            discount: $('#discount').val(),
            sumdiscountprice: $('#sumdiscountprice').val()
        }, function () {
            location.href = "<?=site_url('AController/purchaseorder')?>";
        });
    }
    function check_usercode() {
        $.getJSON("<?=site_url('Api/checkcodeuser?codename=')?>" + $("#member_code").val(), function (data) {
            $.each(data, function (k, v) {
                $('#member_id').val(v['member_id']);
                $('#member_name').val(v['member_name']);
            });
        });
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
</script>


<div class="modal" id="form-total">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title">Modal Heading</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--            </div>-->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h5>ปรับราคาสินค้า</h5>
                </div>
                <hr/>
                <input type="hidden" id="cartmockupline_id">
                <div class="form-group">
                    <label>จำนวนสินค้า</label>
                    <input type="text" class="form-control" id="total_product">
                </div>
                <button class="btn btn-primary" onclick="update_total();" style="background-color: #fcabb9;
                border: 1px solid #fcabb9;"><i class="fa fa-save"></i> บันทึก
                </button>
            </div>

            <!-- Modal footer -->
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            <!--            </div>-->

        </div>
    </div>
</div>

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
                <button class="btn btn-primary" onclick="confirm_payments();">ยืนยันชำระ</button>
            </div>

        </div>
    </div>
</div>
