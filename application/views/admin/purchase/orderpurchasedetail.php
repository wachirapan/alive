<?php $sender_name = '';
$sender_address = '';
$sender_zipcode = '';
$sender_phone = ''; ?>
<style>

    *, :after, :before {
        box-sizing: border-box
    }

    .clearfix:after, .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    input[name="menu"] {
        display: none
    }

    .menu {
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .list {
        width: 100%;
        height: 60px;
        overflow: hidden;
        background: #fcabb9;
        position: relative;
    }

    .list .link-wrap {
        width: 100%;
        height: 100%;
        display: table;
    }

    .list .link-wrap > label {
        color: rgba(255, 255, 255, 0.75);
        z-index: 999;
        min-width: 68px;
        max-width: 168px;
        width: 20%;
        font-size: 12px;
        cursor: pointer;
        padding: 4px 12px;
        text-align: center;
        position: relative;
        display: table-cell;
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .list .link-wrap > label > i,
    .list .link-wrap > label > span {
        -webkit-transition: all .2s ease-in-out 0s;
        transition: all .2s ease-in-out 0s;
    }

    .list .link-wrap > label > span {
        height: 0;
        display: block;
        font-weight: 500;
        -webkit-transform: translateY(45px);
        transform: translateY(45px);
    }

    #one:checked ~ .list label[for="one"] > span,
    #two:checked ~ .list label[for="two"] > span,
    #three:checked ~ .list label[for="three"] > span,
    #four:checked ~ .list label[for="four"] > span,
    #five:checked ~ .list label[for="five"] > span {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        height: auto;
    }

    #one:checked ~ .list .link-wrap > label[for="one"],
    #two:checked ~ .list .link-wrap > label[for="two"],
    #three:checked ~ .list .link-wrap > label[for="three"],
    #four:checked ~ .list .link-wrap > label[for="four"],
    #five:checked ~ .list .link-wrap > label[for="five"] {
        color: #fff;
    }

    .menu-mobile {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .menu-mobile {
            display: block;
            z-index: 10;
        }

        .tap-mobile {
            margin-top: 5%;
        }

        .tab-foot {
            margin-bottom: 20%;
        }
    }

    .img-box {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 10px;
    }
    .fa-check{
        color: green;
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">รายละเอียดการชำระ</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($this->AQueryView->check_sliper($_GET['ordermove_id']) != '') { ?>
                                    <div class="text-center">
                                        <img src="<?= $this->AQueryView->check_sliper($_GET['ordermove_id']); ?>"
                                             style="width: 50%"/>
                                    </div>
                                <?php } ?>
                                <div class="img-box tap-mobile">
                                    <h5>รหัสบิล : <?= $_GET['ordermove_ref'] ?></h5>
                                    <h5>ยอดรายจ่าย : <?= number_format($_GET['price']) ?></h5>
                                    <h5>วันที่สั่งชื้อ : <?= $_GET['date_create'] ?></h5>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="img-box tap-mobile tab-foot">
                                    <?php $members = $this->AQueryView->get_memberspurchase($_GET['ordermove_id']);
                                    if (count($members) != 0) {
                                        foreach ($members as $item) {
                                            $sender_name = $item->ormember_name;
                                            $sender_address = $item->ormember_address . ' ' . $this->AQueryView->get_provincename($item->province_id);
                                            $sender_zipcode = $item->zipcode;
                                            $sender_phone = $item->ormember_phone;
                                            ?>
                                            <h5>ผู้สั่งชื้อ : <?= $item->ormember_name ?></h5>
                                            <h5>เบอร์โทร : <?= $item->ormember_phone ?></h5>
                                            <h5>ที่อยู่ : <?= $item->ormember_address ?></h5>
                                            <h5>จังหวัด
                                                : <?= $this->AQueryView->get_provincename($item->province_id); ?></h5>
                                            <h5>รหัสไปรษณีย์ : <?= $item->zipcode; ?></h5>
                                            <h5>Line : <?= $item->ormember_line; ?></h5>
                                            <h5>อีเมล์ : <?= $item->ormember_email; ?></h5>
                                        <?php }
                                    } else {
                                        $member = $this->AQueryView->get_membershippurchase($_GET['ordermove_id']);
                                        foreach ($member as $m) {
                                            $sender_name = $m->member_name;
                                            $sender_address = $m->member_address . ' ' . $this->AQueryView->get_provincename($m->province_id);
                                            $sender_zipcode = $m->zipcode;
                                            $sender_phone = $m->member_phone; ?>
                                            <h5>ผู้สั่งชื้อ : <?= $m->member_name ?></h5>
                                            <h5>เบอร์โทร : <?= $m->member_phone ?></h5>
                                            <h5>ที่อยู่ : <?= $m->member_address ?></h5>
                                            <h5>จังหวัด
                                                : <?= $this->AQueryView->get_provincename($m->province_id); ?></h5>
                                            <h5>รหัสไปรษณีย์ : <?= $m->zipcode; ?></h5>
                                            <h5>Line : <?= $m->member_line; ?></h5>
                                            <h5>อีเมล์ : <?= $m->member_email; ?></h5>
                                        <?php }
                                    } ?>
                                </div>

                            </div>
                            <div class="col-md-12" style="margin-top: 5%">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr >
                                            <td scope="col">#</td>
                                            <td scope="col">สินค้า</td>
                                            <td scope="col">จำนวน</td>
                                            <td scope="col">ราคา</td>
                                        </tr>
                                        <?php
                                        $row = 1;
                                        $product = $this->AQueryView->get_ordermovedetail($_GET['ordermove_id']);
                                        foreach ($product as $item) {
                                            ?>
                                            <tr>
                                                <td class="text-nowrap"><?= $row ?></td>
                                                <td class="text-nowrap"><?= $item->product_name ?></td>
                                                <td class="text-nowrap"><?= $item->ordermoveline_total ?></td>
                                                <td class="text-nowrap"><?= $item->ordermoveline_price ?></td>
                                            </tr>
                                            <?php $row++;
                                        } ?>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-12" style="margin-top: 5%; margin-bottom: 3%">
                                <button class="btn btn-danger "
                                        onclick="cancle_payements('<?= $_GET['ordermove_id'] ?>');">
                                    <i class="fa fa-power-off"></i> มีปัญหาการชำระ
                                </button>
                                <button class="btn btn-success"
                                        onclick="confirmpayment('<?= $_GET['ordermove_id'] ?>');">
                                    <i class="fa fa-save"></i> ผ่านการตรวจสอบ
                                </button>
                                <button class="btn btn-warning" style="color: white"
                                        onclick="checkPricelist('<?= $_GET['ordermove_id'] ?>');">
                                    <i class="fa fa-send"></i> จัดส่งสินค้าเลย
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container-fluid" id="shippo-payment">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ราคาจัดส่ง</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">บริษัท</td>
                                    <td scope="col">ราคาจัดส่ง</td>
                                    <td scope="col">ระยะเวลา</td>
                                    <td scope="col">ยืนยัน</td>
                                </tr>
                                <tbody id="listCorrier"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#shippo-payment').hide();
    });
    function confirmpayment(ordermove_id) {
        if (confirm('ยืนยันการตรวจสอบการชำระเงินนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_checkpurchase')?>", {
                ordermove_id: ordermove_id
            }, function () {
                location.href = "<?=site_url('AController/purchaseorder')?>";
            });
        }
    }
    function cancle_payements(ordermove_id) {
        if (confirm('ยืนยันการยกเลิกการชำระเงินนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/cancle_purchasepayments')?>", {
                ordermove_id: ordermove_id
            }, function () {
                location.href = "<?=site_url('AController/purchaseorder')?>";
            })
        }
    }
    function checkPricelist(ordermove_id) {
        $('#ordermove_id').val(ordermove_id);
        $('#orderBox').modal('toggle');
    }
    function checkPricesender() {
        $('#shippo-payment').show();
        var sender_name = "<?=$sender_name?>";
        var sender_address = "<?=$sender_address?>";
        var sender_zipcode = "<?=$sender_zipcode?>";
        var sender_phone = "<?=$sender_phone?>";

        var weight = $('#weight').val();
        var wide = $('#wide').val();
        var long = $('#long').val();
        var high = $('#high').val();

        $('#to_weight').val(weight);
        $('#to_width').val(wide);
        $('#to_length').val(long);
        $('#to_height').val(high);

        $.post("<?=site_url('ShippopApi/shippoCheckprice')?>", {
            to_name: sender_name,
            to_address: sender_address,
            to_postcode: sender_zipcode,
            to_phone: sender_phone,
            weight: weight,
            width: wide,
            length: long,
            height: high
        }).then(function (data) {
            var obj = JSON.parse(data);
            var row = 1 ;
            $.each(obj, function (k, v) {
                $('#listCorrier').append('<tr>' +
                    '<td class="text-nowrap">' + row + '</td>' +
                    '<td class="text-nowrap">' + v['courier_name'] + '</td>' +
                    '<td class="text-nowrap">' + v['price'] + '</td>' +
                    '<td class="text-nowrap">' + v['estimate_time'] + '</td>' +
                    '<td class="text-nowrap" onclick="confirmBookingOrder(\''+v['courier_code']+'\',\''+v['price']+'\',\''+v['courier_name']+'\',\''+v['estimate_time']+'\');"><i class="fa fa-check fa-lg"></i></td>' +
                    '</tr>');
                row++;
            });
        });

    }
    function confirmBookingOrder(courier_code, price, courier_name, estimate_time) {
        $('#courier_code').val(courier_code);
        $("#courier_price").val(price);
        $('#courier_name').val(courier_name);
        $('#estimate_time').val(estimate_time);

        $('#bookingOrder').submit();
    }
</script>
<form id="bookingOrder" action="<?=site_url('ShippopApi/createBookingOrder')?>" method="post">
    <input type="hidden" id="ordermove_id" name="ordermove_id">
    <input type="hidden" id="to_name" name="to_name" value="<?=$sender_name?>">
    <input type="hidden" id="to_address" name="to_address" value="<?=$sender_address?>">
    <input type="hidden" id="to_postcode" name="to_postcode" value="<?=$sender_zipcode?>">
    <input type="hidden" id="to_phone" name="to_phone" value="<?=$sender_phone?>">

    <input type="hidden" id="to_weight" name="to_weight">
    <input type="hidden" id="to_width" name="to_width">
    <input type="hidden" id="to_length" name="to_length">
    <input type="hidden" id="to_height" name="to_height">
    <input type="hidden" id="courier_code" name="courier_code">
    <input type="hidden" id="courier_price" name="courier_price">
    <input type="hidden" id="courier_name" name="courier_name">
    <input type="hidden" id="estimate_time" name="estimate_time">

</form>


<div class="modal" id="orderBox">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดการจัดส่ง</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label>น้ำหนัก</label>
                    <input type="text" class="form-control" id="weight">
                </div>
                <div class="form-group">
                    <label>กว้าง</label>
                    <input type="text" class="form-control" id="wide">
                </div>
                <div class="form-group">
                    <label>ยาว</label>
                    <input type="text" class="form-control" id="long">
                </div>
                <div class="form-group">
                    <label>สูง</label>
                    <input type="text" class="form-control" id="high">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-background" data-dismiss="modal" onclick="checkPricesender();">
                    ค้นหาราคา
                </button>
            </div>

        </div>
    </div>
</div>