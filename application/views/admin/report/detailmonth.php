<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายละเอียดยอดขายรายเดือน</p>
            </div>
            <div style="margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">[รหัส] ชื่อ-นามสกลุ</td>
                                    <td scope="col">โบนัสแนะนำ ​Unilevel</td>
                                    <td scope="col">ส่วนลดยอดสั่งชื้อ</td>
                                    <td scope="col">All Sale</td>
                                    <td scope="col">รวม</td>
                                    <td scope="col">รายละเอียด</td>
                                </tr>
                                <?php
                                $row = 1;
                                foreach ($month_end_summary as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap">[<?= $item->members_code ?>] <?= $item->members_name ?></td>
                                        <td class="text-nowrap"><?= number_format($item->recommend_value) ?></td>
                                        <td class="text-nowrap"><?= number_format($item->discount_price) ?></td>
                                        <td class="text-nowrap"><?= number_format($item->position_price) ?></td>
                                        <td class="text-nowrap"><?= number_format($item->recommend_value + $item->discount_price + $item->position_price) ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('AController/detailmonth_member?members_id=' . $item->members_id . '&mes_id=' . $item->mes_id) ?>">
                                                <i class="fa fa-list fa-lg" style="color: blue"></i></a></td>

                                    </tr>
                                    <?php $row++;
                                } ?>
                            </table>
                            <?= $links ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



