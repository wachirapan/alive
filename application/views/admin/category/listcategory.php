<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ประเภทสินค้า</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <a href="<?= site_url('AController/create_category') ?>">
                        <button class="btn btn-nonbackground"><i class="fa fa-plus"></i> สร้างสินค้า</button>
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">กลุ่มสินค้า</td>
                                <td scope="col">สถานะ</td>
                                <td scope="col">แก้ไข</td>
                                <td scope="col">ยกเลิก</td>
                            </tr>
                            <tbody>
                            <?php foreach ($category as $item) { ?>
                                <tr >
                                    <td class="text-nowrap"><img src="<?= base_url('images/category/' . $item->category_image) ?>"
                                             style="width: 50px; height: 50px; border-radius: 50%; border : 1px solid #fcabb9"></td>
                                    <td style="color: black" class="text-overflow text-nowrap"><?= $item->category_name ?></td>
                                    <td style="color: black"
                                        class="text-nowrap"><?= ($item->category_drop == 1) ? '<span style="color: green"><i class="fa fa-lightbulb-o fa-lg"></i></span>' :
                                            '<span style="color: #fcabb9"><i class="fa fa-lightbulb-o fa-lg"></i></span>'; ?></td>
                                    <td class=" text-nowrap">
                                        <a href="<?= site_url('AController/edit_category?category_id=' . $item->category_id) ?>">
                                            <i class="fa fa-edit fa-lg" style="color: blue"></i> </a></td>
                                    <td class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red"
                                                               onclick="deletecategory(
                                                                       '<?= $item->category_id ?>','<?= $item->category_image ?>'
                                                                       );"></i></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <?= $links ?>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function deletecategory(category_id, category_image) {
        if (confirm('ยืนยันการยกเลิกรายการนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/deletecategory')?>", {
                category_id: category_id,
                category_image: category_image
            }, function () {
                location.reload();
            });
        }
    }
</script>