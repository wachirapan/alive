<style>

    .box-product {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        overflow: auto !important;
        padding: 10px;
    }

    .img-product {
        width: 100%;
        height: 200px;
        object-fit: fill;
    }
    .img-product:hover{
        cursor: pointer;
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
                <p style="color: white">คะแนนสะสม</p>
            </div>
            <div class="row" style="margin-top: 3%; margin-left: 2%; margin-bottom: 5%">
                <div class="col-md-2">
                    <?php if ($this->session->userdata('member_image') == '') { ?>
                        <div style="width: 100px; height: 100px; background-color: grey; border-radius: 50px">
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/wbackend/') ?>img/boy.png"
                                 style="width: 120px; height: 120px;">
                        </div>
                    <?php } else { ?>
                        <div style="width: 100px; height: 100px; background-color: grey; border-radius: 50px">
                            <img class="img-profile rounded-circle"
                                 src="<?= base_url('images/members/' . $this->session->userdata('member_image')) ?>"
                                 style="width: 120px; height: 120px;">
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-10">
                    <div style="padding: 20px">
                        <h6 style="color: black; font-weight: bold">คะแนนสะสมส่วนตัว
                            : <?= $this->BQueryView->checkPoints(); ?></h6>
                        <h6 style="color: black; font-weight: bold">คะแนนทีม</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">แลกของรางวัล</p>
            </div>
            <div class="row" style="margin: 50px">
                <?php foreach ($giftbox as $item) { ?>
                    <div class="col-md-3" onclick="selectGiftbox(
                            '<?= $item->giftbox_id ?>','<?= $this->BQueryView->checkPoints(); ?>','<?= $item->giftbox_score ?>'
                            );">
                        <img src="<?= base_url('images/gift_box/' . $item->giftbox_img) ?>"
                             class="img-product"/>
                        <div class="box-product">

                            <h5 class="txt-overflow"><?= $item->giftbox_content ?></h5>
                            <h6 style="color: red">คะแนนที่ใช้ : <?= number_format($item->giftbox_score) ?>
                                point</h6>

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

<script>
    function selectGiftbox(gift_id, point, giftbox_score) {
        if (point > giftbox_score) {
            alert('คะแนนของคุณไม่เพียงพอสำหรับแลกค่ะ');
        } else {
            $.post("<?=site_url('BInsertData/selectGiftbox')?>", {
                gift_id: gift_id,
                point: point,
                giftbox_score: giftbox_score
            }, function () {
                location.reload();
            });
        }

    }
</script>