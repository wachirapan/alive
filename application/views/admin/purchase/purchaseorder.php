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
                                <td scope="col">Ref</td>
                                <td scope="col">ราคา</td>
                                <td scope="col">วันที่</td>
                                <td scope="col">ประเภท</td>
                                <td scope="col">ตรวจสอบ</td>
                            </tr>
                            <tbody>
                            <?php foreach ($purchase as $item) { ?>
                                <tr>
                                    <td class="text-nowrap"><?= $item->ordermove_ref ?></td>
                                    <td class="text-nowrap">
                                        <div style="width:80px; word-wrap:break-word;"><?= number_format($item->ordermove_price) ?>
                                            ฿
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <div style="width:100px; word-wrap:break-word;"><?= $item->ordermove_create ?></div>
                                    </td>
                                    <td class="text-nowrap">
                                        <div style="width:100px; word-wrap:break-word;"><?= $item->ordermove_settlement ?></div>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="<?= site_url('AController/orderpurchasedetail?ordermove_id=' . $item->ordermove_id .
                                            '&ordermove_ref=' . $item->ordermove_ref . '&price=' . $item->ordermove_price . '&date_create=' . $item->ordermove_create) ?>">
                                            <i class="fa fa-eye fa-lg" style="color: green"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?= $links ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

