<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">Online Bussiness Sound</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12" style="margin-bottom: 2%">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>หัวข้อ</td>
                                <td>วันที่</td>
                                <td>โหลด</td>
                            </tr>
                            <tbody>
                            <?php foreach ($onlinecourse as $item) { ?>
                                <tr>
                                    <td><?= $item->learn_content ?></td>
                                    <td><?= $item->learn_create ?></td>
                                    <td><a href="<?= $item->learn_link ?>" target="_blank"><i
                                                    class="fa fa-download fa-lg"></i></a></td>
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

