<style>
    .box-image {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .fa-star {
        color: #fc8a8a;
    }

    .minus, .plus {
        width: 35px;
        height: 35px;
        background: #f2f2f2;
        border-radius: 4px;
        padding: 5px 5px 5px 5px;
        border: 1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
    }

    input {
        height: 34px;
        width: 100px;
        text-align: center;
        font-size: 26px;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .img-scroll {
        object-fit: fill !important;
        width: 80%;
    }
</style>
<style>
    .wrapper {
        margin: auto;
        text-align: center;
        position: relative;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        margin-bottom: 20px !important;
        width: 100%;
        padding-top: 5px;
    }

    .scrolls {
        overflow-x: scroll;
        overflow-y: hidden;
        /*height: 80px;*/
        white-space: nowrap
    }

    .imageDiv img {
        box-shadow: 1px 1px 10px #999;
        margin: 2px;
        max-height: 50px;
        cursor: pointer;
        display: inline-block;
        *display: inline;
        *zoom: 1;
        vertical-align: top;
    }
</style>
<?php
if (isset($_GET['product_id'])) {
    $productmain = $this->FQueryView->get_productdetailnews($_GET['category'], $_GET['product_id']);
} else {
    $productmain = $this->FQueryView->get_productcategory($_GET['category']);
}
$product_detail = '';
$product_name = '';
foreach ($productmain as $item) {
    $product_name = $item->product_name ;
    $product_detail = $item->product_detail; ?>
    <div class="container" style="margin-top: 2%">
        <h6>ผลิตภัณฑ์ > <?=$item->product_name?></h6>
        <div class="box-image">
            <div class="container" style="margin-top: 2%;">
                <div class="row" style="padding: 20px">
                    <div class="col-md-6">
                        <div class="text-center">

                            <img id="image-oneshow"
                                 src="<?= $this->FQueryView->imageproduct_image($item->product_id); ?>"
                                 class="img-scroll">

                            <img id="img-other"/>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wrapper">
                                    <!--                                    <div class="scrolls">-->
                                    <?php $product_image = $this->FQueryView->get_productimageall($item->product_id);
                                    foreach ($product_image as $image) {
                                        ?>
                                        <img src="<?= base_url('images/products/' . $image->product_img) ?>"
                                             style="width: 100px; height: 100px" class="img-scroll"
                                             onclick="showimageother(
                                                 '<?= $image->product_img ?>'
                                                 );"/>
                                    <?php } ?>
                                    <!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function showimageother(product_img) {
                            var urlpath = "<?=base_url('images/products/')?>";
                            $("#image-oneshow").hide();
                            $('#img-other').attr('src', urlpath + product_img);
                        }
                    </script>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left"><h4 class="header-blue"><?= $item->product_name ?></h4></div>
                                <div class="float-right"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <!--                                    199-->
                                    <!--                                    รีวิว-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <h5 style="color: #fe0000">
                                        <?php $discount = $this->FQueryView->check_pricediscount($item->product_id);
                                        if(count($discount) == 0){?>
                                            <?= number_format($item->product_selling_price) ?> ฿
                                        <?php }else{
                                            foreach ($discount as $dis){?>
                                                <del style="color: gainsboro"><?=number_format($dis['price_before'],2)?> ฿ </del>
                                                <?= number_format($dis['price_discount'],2) ?> ฿ <span
                                                    style="background-color: orangered; color: white; padding:2px;"><?=number_format($dis['product_discount_percent'],2)?>% ส่วนลด</span>
                                            <?php }}?>
                                    </h5>
                                </div>
                                <div class="float-right"><span
                                        style="color: gainsboro; float: right">ขายแล้ว <?=$this->FQueryView->checksalerorder($item->product_id);?> ชิ้น</span>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="background-color: #f7a4b2">
                            <div class="col-md-12">
                                <h5 style="color: white; margin-top: 1%">Flash sale</h5>
                            </div>
                        </div>
                        <br>
                        <p style="color: gray; font-size: 12px"><?= $item->product_properties ?> </p>
                        <br>
                        <br>
                        <h6>จำนวน</h6>
                        <hr/>

                        <div class="number">
                            <span class="minus" style="border: 1px solid #f7a4b2; color: #f7a4b2">-</span>
                            <input type="text" value="1" style="border: 1px solid #f7a4b2; color: #f7a4b2"/>
                            <span class="plus" style="border: 1px solid #f7a4b2; color: #f7a4b2">+</span>
                        </div>
                        <div class="row" style="margin-top: 5%">
                            <div class="co-md-4 col-6">
                                <button class="btn btn-nonbackground" style="width: 100%" onclick="addtocartmainweb('<?=$item->product_id?>');"> หยิบใส่ตระกร้า</button>
                            </div>
                            <div class="co-md-4 col-6">
                                <button class="btn btn-background" style="width: 100%" onclick="add_tocartlist('<?=$item->product_id?>');"> ชื้อเลย</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="container" style="margin-top: 5%">
    <h6 style="font-weight: 400">โปรโมชั่น <?=$product_name?></h6>

    <div class="row">
        <?php $product_other = $this->FQueryView->get_productother($_GET['category']);
        foreach ($product_other as $item) {
            ?>
            <div class="col-md-2 col-6" onclick="gotodetail('<?=$item->category_id?>','<?=$item->product_id?>');">
                    <img src="<?= $this->FQueryView->imageproduct_image($item->product_id) ?>"
                         style="width: 100%; object-fit: cover;"/>
                <div style="padding: 10px">
                    <p style="font-size: 13px"><?= $item->product_name ?></p>
                    <?php $pricediscount = $this->FQueryView->check_pricediscount($item->product_id);
                    if(count($pricediscount) != 0){
                        foreach ($pricediscount as $di){?>
                            <h5 style="color: red"><?= number_format($di['price_discount'],2) ?> บาท</h5>
                            <p style="font-size: 12px">
                                <del style="color: gainsboro">ปกติ <?=number_format($di['price_before'],2)?></del>
                                -<?=number_format($di['product_discount_percent'],2)?>%
                            </p>
                        <?php }}else{?>
                        <h5 style="color: red"><?= number_format($item->product_selling_price) ?> บาท</h5>

                    <?php }?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<input type="hidden" id="subdirect" name="subdirect" value="<?=$this->FQueryView->checkSubdirect($this->uri->segment(1));?>">

<script>
    function gotodetail(category, product_id) {
        location.href = "<?=site_url($this->uri->segment(1).'/productdetail?category=')?>"+category+'&product_id='+product_id;
    }
    function add_tocartlist(product_id) {
        $.post("<?=site_url('FInsertData/cartmockup')?>", {
            product_id : product_id,
            subdirect : $('#subdirect').val()
        },function () {
            location.href = "<?=site_url($this->uri->segment(1).'/shoppingcart')?>";
        });
    }
    function addtocartmainweb(product_id) {
        $.post("<?=site_url('FInsertData/cartmockup')?>", {
            product_id : product_id,
            subdirect : $('#subdirect').val()
        },function () {
            alert('บันทึกข้อมูลสินค้านี้แล้วค่ะ')
        });
    }
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>


<div class="container mt-3">
    <h2>Toggleable Tabs</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">รายการสินค้า</a>
        </li>
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" data-toggle="tab" href="#menu1">รีวิวสินค้า</a>-->
        <!--        </li>-->

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <p><?= $product_detail ?></p>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <div class="row">
                <div class="col-md-1">
                    <div style="background-color: gainsboro; width: 60px; height: 60px">

                    </div>
                </div>
                <div class="col-md-11">
                    <h5>Name Lastname</h5>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum</p>

                    <br/>
                    <?= date('Y-m-d') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <div style="background-color: gainsboro; width: 60px; height: 60px">

                    </div>
                </div>
                <div class="col-md-11">
                    <h5>Name Lastname</h5>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum</p>

                    <br/>
                    <?= date('Y-m-d') ?>
                </div>
            </div>
        </div>

    </div>
</div>
