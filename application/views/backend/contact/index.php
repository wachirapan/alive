<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ติดต่อ สอบถาม</p>
            </div>
            <div class="row" style="padding: 20px">
                <a href="<?= site_url('Backend/create_contact') ?>">
                    <button class="btn btn-nonbackground"><i class="fa fa-plus"></i> สอบถาม</button>
                </a>

                <div class="table-responsive" style="margin-top: 2%">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>หัวข้อ</td>
                            <td>วันที่สร้าง</td>
                            <td>ตอบกลับ</td>
                        </tr>
                        <tbody>
                        <?php
                        $row = 1;
                        foreach ($contact as $item) {
                            ?>
                            <tr>
                                <td><?= $row ?></td>
                                <td><?= $item->question_content ?></td>
                                <td><?= $item->question_date ?></td>
                                <td>
                                    <a href="<?= site_url('Backend/contactdetail?question_id=' . $item->question_id) ?>">
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

