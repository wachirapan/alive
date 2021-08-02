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
        border: 1px solid #273F89 !important;
    }

    .input-number {
        width: 10px !important;
        text-align: center;
    }

    .minus {
        cursor: pointer;
    }

    .plus {
        cursor: pointer;
    }
</style>
<div class="container" style="margin-top: 3%">
    <div class="text-center">
        <h4>Order Ref # <?= $this->session->userdata('orderref') ?></h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box-img">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th>Price</th>
                            <th style="text-align: center">Quantiry</th>
                            <th>Total</th>

                        </tr>
                        <tbody>
                        <?php $orderline = $this->FQueryView->get_ordermoveline();
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
                                $express += $item->ordermoveline_tranfer;
                                $sumpoint += $item->ordermoveline_point; ?>
                                <tr>
                                    <td>
                                        <div style="width: 70px; height: 70px; background-color: grey ">
                                            <img src="<?= $this->FQueryView->imageproduct_image($item->product_id) ?>"
                                                 style="width: 70px; height: 70px; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td><h6 class="txt-margin"><?= $item->product_name ?></h6> <input
                                            type="hidden" name="product_id"
                                            value="<?= $item->product_id ?>"></td>
                                    <td>
                                        <h6 class="txt-margin-price"><?= number_format($item->ordermoveline_price, 2) ?>
                                            THB</h6></td>
                                    <td>
                                        <?= $item->ordermoveline_total ?>
                                    </td>
                                    <td>
                                        <h6 class="txt-margin-price">
                                            <?php $sumprice += ($item->ordermoveline_total * $item->ordermoveline_price) ?>
                                            <?= number_format($item->ordermoveline_total * $item->ordermoveline_price, 2) ?>
                                            THB</h6></td>
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
                            <td><h6>ราคา : </h6></td>
                            <td><h6><?= number_format($sumprice, 2) ?> ฿</h6></td>
                            <td><h6>ค่าจัดส่ง : </h6></td>
                            <td><h6><?= number_format($express, 2) ?> ฿</h6></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td  ><h6>รวมราคา : </h6></td>
                            <td><h6><?= number_format($sumprice + $express, 2) ?> ฿</h6></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-12" style="margin-top: 5%;">
            <div class="box-img">
                <h5>Address (ที่อยู่จัดส่ง)</h5>
                <?php $addres_order = $this->FQueryView->check_sendingaddres();
                foreach ($addres_order as $o) {
                    ?>
                    <div class="form-group">
                        <label>ชื่อ-นามสกุล (ผู้รับสินค้า) : <?= $o->ormember_name ?></label><br/>
                        <label>เบอร์โทรศัพท์ : <?= $o->ormember_phone ?></label><br/>
                        <label>ที่อยู่ : <?= $o->ormember_address . " " . $this->FQueryView->check_province($o->province_id) . ' ' . $o->zipcode ?></label>
                        <br/>
                        <label>อีเมล์ : <?= $o->ormember_email ?></label> <br/>
                        <label>Line Id : <?= $o->ormember_line ?></label> <br/>
                        <label>การชำระ : <?= $o->ordermove_settlement ?></label> <br/>
                    </div>
                <?php } ?>
                <div class="text-center">
                    <a href="#" onclick="clearordersession();">
                        <button class="btn btn-background">ยอมรับ การสั่งชื้อ</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function clearordersession() {
        $.post("<?=site_url('FInsertData/clearordersession')?>",{},function () {
            location.href = "<?=site_url($this->uri->segment(1))?>"
        });
    }
</script>

