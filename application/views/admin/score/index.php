<style>
    .box-product {
        border: 1px solid gainsboro;
        border-radius: 5px;
        overflow: auto !important;
        padding: 10px;
        margin: 5px;
    }

    .img-product {
        width: 100%;
        object-fit: fill;
    }

    .txt-overflow {
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;

    }
    @media only screen and (max-width: 700px) {
        .img-product {
            width: 100%;
            height: 100px;
            object-fit: fill;
        }
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">คะแนน & แลกคะแนน</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-3">
                    <a href="<?= site_url('AController/create_score') ?>">
                        <button class="btn btn-nonbackground"><i class="fa fa-plus"></i> สร้างรายการ</button>
                    </a></div>
                <div class="col-md-7">

                </div>
                <div class="col-md-2">
                    <select class="form-control" id="giftbox_status" onchange="changegiftbox();">
                        <?php if (!isset($_GET['status'])) { ?>
                            <option value="1" selected>เปิดใช้งาน</option>
                            <option value="2">ปิดใช้งาน</option>
                        <?php } else { ?>
                            <option value="1">เปิดใช้งาน</option>
                            <option value="2" selected>ปิดใช้งาน</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                    <div class="row no-gutters">
                        <?php foreach ($giftbox as $item) { ?>
                            <div class="col-md-3 col-6">
                                <div class="box-product text-center">
                                    <img src="<?= base_url('images/gift_box/' . $item->giftbox_img) ?>"
                                         class="img-product"/>
                                    <h5 class="txt-overflow"><?= $item->giftbox_content ?></h5>
                                    <h6 style="color: red">คะแนนที่ใช้ : <?= number_format($item->giftbox_score) ?>
                                        point</h6>
                                    <ul style="list-style: none outside none; margin:0; padding: 0; text-align: center;">
                                        <li style="margin: 0 10px; display: inline; color: blue"><i
                                                    class="fa fa-edit fa-lg" onclick="editscore(
                                                    '<?= $item->giftbox_id ?>'
                                                    );"></i></li>
                                        <li style="margin: 0 10px; display: inline; color: red"><i
                                                    class="fa fa-trash fa-lg" onclick="delete_data(
                                                    '<?= $item->giftbox_id ?>'
                                                    )"> </i></li>
                                    </ul>

                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12" style="margin-top: 2%">
                            <?= $links ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function editscore(giftbox_id) {
        location.href = "<?=site_url('AController/edit_score?giftbox_id=')?>" + giftbox_id;
    }
    function delete_data(giftbox_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_giftbox')?>", {
                giftbox_id: giftbox_id
            }, function () {
                location.reload();
            });
        }
    }
    function changegiftbox() {
        if ($('#giftbox_status').val() == 2) {
            location.href = "<?=site_url('AController/score?status=close')?>";
        } else {
            location.href = "<?=site_url('AController/score')?>";
        }
    }
</script>
