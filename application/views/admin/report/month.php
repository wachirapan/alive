<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">สรุปยอดรายเดือน</p>
            </div>
            <div style=" margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">วันที่</td>
                                    <td scope="col">โบนัสแนะนำ ​Unilevel</td>
                                    <td scope="col">ส่วนลดยอดสั่งชื้อ</td>
                                    <td scope="col">All Sale</td>
                                    <td scope="col">รวม</td>
                                    <td scope="col">รายละเอียด</td>
                                    <td scope="col">รายงาน</td>
                                </tr>
                                <?php
                                $row = 1;
                                foreach ($moveorder as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap"><?= $item->compilemount_date ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->sum_recommend_value($item->compilemount_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->sum_discount_price($item->compilemount_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->sum_position_price($item->compilemount_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->sum_recommend_value($item->compilemount_id) +
                                                $this->AQueryView->sum_discount_price($item->compilemount_id) +
                                                $this->AQueryView->sum_position_price($item->compilemount_id)) ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('AController/reportdetail_mounth?compilemount_id=' . $item->compilemount_id) ?>">
                                                <i class="fa fa-list fa-lg" style="color: blue"></i>
                                            </a>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('report/AdminExcel/exceldetail_mounth?compilemount_id=' . $item->compilemount_id) ?>">
                                                <i class="fa fa-file-excel-o fa-lg" style="color: green"></i>
                                            </a> |
                                            <a href="<?= site_url('report/AdminPDF/exceldetail_mounth?compilemount_id=' . $item->compilemount_id) ?>">
                                                <i class="fa fa-file-pdf-o fa-lg" style="color: red"></i>
                                            </a>
                                        </td>
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



