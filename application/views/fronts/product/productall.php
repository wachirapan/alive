<style>
    .img-product-all{
        width: 100%;
        object-fit: cover; /* Equivalent of the background-size: cover; of a background-image */
    }
</style>
<div class="container" style="margin-top: 2%">
    <div class="text-center">
        <h3 class="header-blue">สินค้า ALIVE DROPSHIP</h3>
    </div>

    <div class="row no-gutters">
        <?php
        foreach ($product as $item) {
            ?>
            <div class="col-md-3 col-6" style="padding: 10px" onclick="product_detialweb(
                '<?=$item->category_id?>','<?= $item->product_id ?>'
                );">
                <div class="box-image">
                    <div style="border-radius: 5px;" class="text-center">
                        <img src="<?= $this->FQueryView->imageproduct_image($item->product_id); ?>"
                             class="img-product-all"/>
                        <h5><?= $item->product_name ?></h5>
                    </div>

                    <?php $discount = $this->FQueryView->check_pricediscount($item->product_id);
                    if(count($discount) == 0){?>
                        <h6 style="color: red"><?= number_format($item->product_selling_price) ?> บาท</h6>
                    <?php }else{
                        foreach ($discount as $dis){?>
                            <h6 style="color: red"><?= number_format($dis['price_discount'], 2) ?> ฿ <del style="color: gainsboro; float: right"><?= number_format($dis['price_before'], 2) ?> ฿ -<?=number_format($dis['product_discount_percent'],2)?>%</del></h6>
                        <?php }}?>
                </div>

            </div>
        <?php } ?>
    </div>
    <div style="margin: auto">
        <div class="text-center">
            <?=$links?>
        </div>

    </div>
</div>

<script>
    function product_detialweb(category_id, product_id) {
        location.href = "<?=site_url($this->uri->segment(1).'/productdetail?category=')?>"+category_id+'&product_id='+product_id ;
    }
</script>