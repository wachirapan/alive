<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รีวิว</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-3">
                    <a href="<?= site_url('AController/create_review') ?>">
                        <button class="btn btn-nonbackground"><i class="fa fa-plus"></i> สร้างรีวิว</button>
                    </a></div>

                <div class="col-md-12" style="margin-top: 2%">
                    <div class="row">
                        <?php foreach ($blogs as $item) { ?>
                            <div class="col-md-4">
                                <div class="blog-content">
                                    <div style="width: 100%; height: 150px; background-color: #fcabb9">
                                        <img src="<?= base_url('images/blogs/' . $item->blogs_img) ?>"
                                             style="width: 100%; height: 150px;"/>
                                    </div>
                                    <div style="padding-bottom : 3%!important;">
                                        <p style="padding: 5px; font-size: 12px; font-weight: bold; color: #fcabb9;height: 6.3em;overflow: hidden; ">
                                            <?= $item->blogs_content ?> <br>
                                            <span style="color: black"><?= $item->blogs_description ?></span>
                                        </p>
                                    </div>
                                    <ul style="list-style: none outside none; margin:0; padding: 0; text-align: center;">
                                        <li style="margin: 0 10px; display: inline;">
                                            <i class="fa fa-edit fa-lg" style="color: blue" onclick="edit_review(
                                                    '<?= $item->blogs_id ?>'
                                                    );"></i></li>
                                        <li style="margin: 0 10px; display: inline;"><i class="fa fa-trash fa-lg"
                                                                                        onclick="delete_review(
                                                                                                '<?= $item->blogs_id ?>'
                                                                                                );"
                                                                                        style="color: red"></i></li>
                                        <?php if ($item->blogs_views == 0) { ?>
                                            <li style="margin: 0 10px; display: inline;"><i class="fa fa-eye fa-lg"
                                                                                            onclick="openviewstatus(
                                                                                                    '<?= $item->blogs_id ?>','1'
                                                                                                    );"
                                                                                            style="color: grey"></i>
                                            </li>
                                        <?php } else { ?>
                                            <li style="margin: 0 10px; display: inline;"><i class="fa fa-eye fa-lg"
                                                                                            onclick="openviewstatus(
                                                                                                    '<?= $item->blogs_id ?>','0'
                                                                                                    );"
                                                                                            style="color: green"></i>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <?= $links ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function edit_review(blogs_id) {
        location.href = "<?=site_url('AController/edit_review?blogs_id=')?>" + blogs_id;
    }
    function delete_review(blogs_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/deleteblogs')?>", {
                blogs_id: blogs_id
            }, function () {
                location.reload();
            });
        }
    }
    function openviewstatus(id, status) {
        if (status == 1) {
            if (confirm('ยืนยันการเปิดใช้งาน')) {
                $.post("<?=site_url('AUpdateData/showviewblogs')?>", {
                    id: id,
                    status: status
                }, function () {
                    location.reload();
                });
            }
        } else {
            if (confirm('ยืนยันการปิดใช้งาน')) {
                $.post("<?=site_url('AUpdateData/showviewblogs')?>", {
                    id: id,
                    status: status
                }, function () {
                    location.reload();
                });
            }
        }

    }
</script>

