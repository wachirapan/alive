<style>
    .box-product {
        border: 1px solid gainsboro;
        border-radius: 5px;
        margin: 5px;
        overflow: auto !important;
        padding: 10px;
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

    .input-group-prepend {
        cursor: pointer;
    }

    .input-group-append {
        cursor: pointer;
    }

    .input-number {
        width: 50px;
        text-align: center;
        border: 1px solid #f7a4b2;
    }

    @media only screen and (max-width: 700px) {
        .img-product {
            width: 100%;
            height: 100px;
            object-fit: fill;
        }
        .margin-topmobile{
            margin-top: -1px!important;
        }
        .btn-mobile{
            width: 100%;
        }
        .txt-top{
            margin-top: 5%;
        }
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">สั่งชื้อสินค้า</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <form action="<?= site_url('Backend/purchase_ordersearch') ?>" method="get" target="_blank">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>หมวดหมู่สินค้า</label>
                                    <select class="form-control" id="main_cate" name="main_cate">
                                        <option value="">-- เลือกหมวดหมู่ --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-nonbackground form-control margin-topmobile" style="margin-top: 17%"><i
                                            class="fa fa-search"></i>
                                    ค้นหา
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= site_url('Backend/cartshoping') ?>">
                                    <i class="fa fa-shopping-cart fa-2x"
                                       style="float: right; margin-top: 6%; color: #f7a4b2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="row no-gutters">
                        <?php foreach ($product as $item) { ?>
                            <div class="col-md-3 col-6" onclick="modal_product('<?= $item->product_id ?>',
                                    '<?= $item->product_name ?>','<?= $item->product_selling_price ?>',
                                    '<?= $this->BQueryView->imageproduct_image($item->product_id); ?>');">
                                <div class="box-product">
                                    <img src="<?= $this->BQueryView->imageproduct_image($item->product_id); ?>"
                                         class="img-product"/>
                                    <h5 class="txt-overflow"><?= $item->product_name ?></h5>
                                    <h6 style="color: red"><?= number_format($item->product_selling_price) ?> ฿</h6>
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
    function modal_product(product_id, product_name, product_saler, images) {
        $('#product_id').val(product_id);
        $('#image-product').attr('src', images);
        $('#product-name').html(product_name + '<span style="font-size: 14px; color: red"> ราคา ' + formatnumber(product_saler) + ' ฿ <span>');
        $('#form-product').modal('toggle');
    }
    function formatnumber(number) {
        return new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(number)
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
    function confirmcart() {
        if (confirm("ยินยันการสั่งชื้อสินค้านี้หรือไม่")) {
            $.post("<?=site_url('BInsertData/cartmockup')?>", {
                product_id: $('#product_id').val(),
                total: $("#total").val()
            }, function () {
                location.reload();
            });
        }
    }
</script>

<div class="modal" id="form-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="product_id">
                <div class="row">
                    <div class="col-md-4">
                        <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            <img id="image-product" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-8 txt-top">
                        <h4>
                            <div id="product-name">
                        </h4>

                        <div class="row txt-top">
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend minus">
                                        <span class="input-group-text "
                                              style="border:1px solid #f7a4b2!important; color: #f7a4b2; background-color: white"> - </span>
                                    </div>
                                    <input type="text" class="input-number" id="total" value="1">
                                    <div class="input-group-append plus">
                                        <span class="input-group-text"
                                              style="border:1px solid #f7a4b2!important; color: #f7a4b2; background-color: white"> + </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-background btn-mobile" onclick="confirmcart();" data-dismiss="modal">
                            ยืนยัน
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>