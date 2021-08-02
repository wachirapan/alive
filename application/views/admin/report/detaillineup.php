<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายละเอียดส่วนลดยอดสั่งชื้อ</p>
            </div>
            <div style=" margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">ชื่อ สกุล</td>
                                    <td scope="col">All Sale</td>
                                    <td scope="col">ตำแหน่ง</td>
                                    <td scope="col">โบนัสค่าแนะนำ unilavel</td>
                                </tr>
                                <tbody>
                                <?php
                                $row = 1;
                                foreach ($position as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap"><?= '[ ' . $item->members_code . ' ] ' . $item->members_name ?></td>
                                        <td class="text-nowrap"><?= number_format($item->position_price) ?></td>
                                        <td class="text-nowrap"><?= $this->AQueryView->check_positionname($item->position_id); ?></td>
                                        <td class="text-nowrap"><?= number_format($item->recommend_value) ?></td>
                                    </tr>
                                    <?php $row++;
                                } ?>
                                </tbody>
                            </table>
                            <?= $links ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



