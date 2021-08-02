<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ส่วนลดยอดสั่งชื้อ</p>
            </div>
            <div style=" margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">วันที่ปิดยอด</td>
                                    <td scope="col">รายได้</td>
                                    <td scope="col">รายละเอียด</td>
                                    <td scope="col">รายงาน</td>
                                </tr>
                                <tbody>
                                <?php
                                $row = 1;
                                foreach ($position as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap"><?= $item->compilemount_date ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->get_orderpositionreport($item->compilemount_id)); ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('AController/detailposition?group_id=' . $item->compilemount_id) ?>">
                                                <i
                                                        class="fa fa-list fa-lg"></i></a></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('report/AdminExcel/position?group_id=' . $item->compilemount_id) ?>">
                                                <i class="fa fa-file-excel-o fa-lg" style="color: green"></i></a>
                                            |
                                            <a href="<?= site_url('report/AdminPDF/position?group_id=' . $item->compilemount_id) ?>"
                                               target="_blank">
                                                <i class="fa fa-file-pdf-o fa-lg" style="color: red"></i>
                                            </a>
                                        </td>
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



