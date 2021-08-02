
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">รายงานการคำนวนส่วนต่าง</p>
                </div>
                <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%; padding: 10px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr >
                                        <td>#</td>
                                        <td>วันที่ปิดยอด</td>
                                        <td>โบนัส unilevel</td>
                                    </tr>
                                    <tbody>
                                    <?php
                                    $row = 1;
                                    foreach ($position as $item) {
                                        ?>
                                        <tr>
                                            <td><?= $row ?></td>
                                            <td><?= $item->compilemount_date ?></td>
                                            <td><?= number_format($this->BQueryView->get_recommendvalue($item->compilemount_id)); ?></td>

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



