<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ติดต่อ สอบถาม</p>
            </div>
            <div class="row" style="padding: 20px">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">หัวข้อ</td>
                            <td scope="col">วันที่สร้าง</td>
                            <td scope="col">ตอบกลับ</td>
                        </tr>
                        <tbody>
                        <?php
                        $row = 1;
                        foreach ($contact as $item) {
                            ?>
                            <tr>
                                <td class="text-nowrap"><?= $row ?></td>
                                <td class="text-nowrap"><?= $item->question_content ?></td>
                                <td class="text-nowrap"><?= $item->question_date ?></td>
                                <td class="text-nowrap">
                                    <a href="<?= site_url('AController/contactdetail?question_id=' . $item->question_id) ?>">
                                        <i class="fa fa-eye fa-lg"></i>
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

