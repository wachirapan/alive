<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">สรุปรายได้รายวัน</p>
            </div>
            <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="actions">
                            <button class="btn btn-nonbackground" onclick="compute_day();">ปิดยอดรายวัน</button>
                            <script>
                                function compute_day() {
                                    $.getJSON("<?=site_url('compile/CompileDay/index')?>", function (data) {
                                        if (data == 'false') {
                                            alert('วันนี้คุณกด คำนวนแล้วค่ะ');
                                        } else {
                                            alert('คำนวนเรียบร้อยแล้วค่ะ');
                                            location.reload();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">วันที่ปิดยอด</td>
                                    <td scope="col">รายได้</td>
                                    <td scope="col">ภาษี</td>
                                    <td scope="col">คงเหลือ</td>
                                    <td scope="col">รายละเอียด</td>
                                    <td scope="col">รายงาน</td>
                                </tr>
                                <tbody>
                                <?php
                                $row = 1;
                                foreach ($groupday as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap"><?= $item->compileday_date ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->check_sumgroupday($item->compileday_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format(($this->AQueryView->check_sumgroupday($item->compileday_id) * 7) / 100) ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->check_sumgroupday($item->compileday_id) - (($this->AQueryView->check_sumgroupday($item->compileday_id) * 7) / 100)) ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('AController/detailgroupday?groupbyday_id=' . $item->compileday_id . '&groupday=' . $item->compileday_date) ?>">
                                                <i class="fa fa-list fa-lg"></i> รายละเอียด</a></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('report/AdminExcel/procress?groupbyday_id=' . $item->compileday_id . '&groupday=' . $item->compileday_date) ?>">
                                                <i class="fa fa-file-excel-o fa-lg" style="color: green"></i>
                                            </a> |
                                            <a href="<?= site_url('report/AdminPDF/procress?groupbyday_id=' . $item->compileday_id . '&groupday=' . $item->compileday_date) ?>"
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



