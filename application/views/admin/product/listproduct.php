<style>
    .box-product {
        border: 1px solid gainsboro;
        border-radius: 10px;
        overflow: auto !important;
        padding: 10px;
        margin: 5px;
    }

    .img-product {
        width: 100%;
        height: 200px;
        object-fit: fill;
    }

    .txt-overflow {
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;

    }
    #status_product{
        width: 35%;
        float: right;
        margin-right: 5px;
    }
    #btn-create{
        margin-left: 5px;
    }
    @media only screen and (max-width: 700px) {
        .img-product {
            width: 100%;
            height: 100px;
            object-fit: fill;
        }
        #status_product{
            width: 100%;
            float: right;
            margin-right: 5px;
        }
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">สินค้าส่วนตัว</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <a href="<?= site_url('AController/createproduct') ?>">
                                <button id="btn-create" class="btn btn-nonbackground"><i class="fa fa-plus"></i> สร้างสินค้า</button>
                            </a>
                        </div>
                        <div class="col-md-6 col-6">
                            <select class="form-control" id="status_product" onchange="product_check();">
                                <?php if (!isset($_GET['status'])) { ?>
                                    <option value="1" selected>สินค้าลงขาย</option>
                                    <option value="2">สินค้าปิดใช้</option>
                                <?php } else { ?>
                                    <option value="1">สินค้าลงขาย</option>
                                    <option value="2" selected>สินค้าปิดใช้</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 2%;">
                    <div class="row no-gutters">
                        <?php foreach ($product as $item) { ?>
                            <div class="col-md-3 col-6" onclick="modal_product('<?= $item->product_id ?>',
                                    '<?= $item->product_name ?>','<?= $item->product_selling_price ?>',
                                    '<?= $this->AQueryView->imageproduct_image($item->product_id); ?>');">
                                <div class="box-product">
                                    <img src="<?= $this->AQueryView->imageproduct_image($item->product_id); ?>"
                                         class="img-product"/>
                                    <h5 class="txt-overflow"
                                        style="text-align: center"><?= $item->product_name ?></h5>
                                    <h6 style="color: red"><?= number_format($item->product_selling_price) ?> ฿</h6>
                                    <div class="text-center">
                                        <ul style="list-style: none outside none; margin:0; padding: 0; text-align: center;">
                                            <li style="margin: 0 10px; display: inline; color: blue"><i
                                                        class="fa fa-edit fa-lg" onclick="editproduct(
                                                        '<?= $item->product_id ?>'
                                                        );"></i></li>
                                            <?php if ($item->product_status == 3) { ?>
                                                <li style="margin: 0 10px; display: inline; color: green"><i
                                                            class="fa fa-power-off fa-lg" onclick="open_product(
                                                            '<?= $item->product_id ?>'
                                                            );"></i></li>
                                            <?php } else { ?>
                                                <li style="margin: 0 10px; display: inline; color: red"><i
                                                            class="fa fa-trash fa-lg" onclick="delproduct(
                                                            '<?= $item->product_id ?>'
                                                            );"></i></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
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
    function editproduct(product_id) {
        location.href = "<?=site_url('AController/edit_product?product_id=')?>" + product_id;
    }
    function delproduct(product_id) {
        if (confirm('ยืนยันการปิดใช้งานสินค้านี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_product')?>", {
                product_id: product_id
            }, function () {
                location.reload();
            });
        }
    }
    function product_check() {
        if ($('#status_product').val() == 2) {
            window.location.href = "<?=site_url('AController/product?status=close')?>"
        } else {
            window.location.href = "<?=site_url('AController/product')?>"
        }
    }
    function open_product(product_id) {
        if (confirm('ยืนยันการเปิดใช้งานสินค้านี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/open_product')?>", {
                product_id: product_id
            }, function () {
                location.reload();
            });
        }
    }
</script>
