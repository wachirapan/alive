<style>
    .product-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">คำขอลงขายสินค้า</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col"></td>
                                <td scope="col">ผู้ลง</td>
                                <td scope="col">ราคา</td>
                                <td scope="col">วันที่</td>
                                <td scope="col"></td>
                            </tr>
                            <tbody>
                            <?php foreach ($product as $item) { ?>
                                <tr>
                                    <td class="text-nowrap">
                                        <img src="<?= $this->AQueryView->imageproduct_image($item->product_id); ?>"
                                             class="product-img">
                                        <?= $item->product_name ?>
                                    </td>
                                    <td class="text-nowrap"><?= $this->AQueryView->check_membername($item->member_id); ?></td>
                                    <td class="text-nowrap"><?= number_format($item->product_selling_price) ?></td>
                                    <td class="text-nowrap"><?= $item->product_create ?></td>
                                    <td class="text-nowrap">
                                        <a href="<?= site_url('AController/checkproduct_saler_detail?product_id=' . $item->product_id) ?>">
                                            <i class="fa fa-eye fa-lg" style="color: blue"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?=$links?>
                </div>
            </div>
        </div>
    </div>
</div>


