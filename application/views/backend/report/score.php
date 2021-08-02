<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายงานสรุปจำนวนและคะแนน</p>
            </div>
            <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr >
                                <td>#</td>
                                <td>คะแนน</td>
                                <td>เดือน</td>
                                <td>พิมพ์</td>
                            </tr>
                            <tbody>
                            <?php
                            $row = 1;
                            foreach ($score as $item) {
                                ?>
                                <tr>
                                    <td><?= $row ?></td>
                                    <td><?= number_format($item->memberpoint_number) ?></td>
                                    <td><?php
                                        $date = date_create($item->memberpoint_date);
                                        echo $this->BQueryView->change_month(date_format($date, "m")) . ' ' . $this->BQueryView->change_years(date_format($date, "Y"));
                                        ?></td>
                                    <td>
                                        <a href="<?= site_url('report/MembersExcel/report_score?month=' . $item->memberpoint_date) ?>">
                                            <i class="fa fa-print fa-lg" style="color: blue"></i>
                                        </a>|
                                        <a href="<?= site_url('report/MembersPDF/report_score?month=' . $item->memberpoint_date) ?>"
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



