<style>
    .margin-text{
        margin-top: 5%;
    }
</style>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายละเอียดเลือกของรางวัล</p>
            </div>
            <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tr >
                                    <td scope="col">#</td>
                                    <td scope="col">รายการ</td>
                                    <td scope="col">วันที่เลือก</td>
                                    <td scope="col">คะแนน</td>
                                    <td scope="col">สถานะ</td>
                                    <td scope="col">ตรวจสอบ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($giftbox as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><img src="<?=base_url('images/gift_box/'.$item->giftbox_img)?>" style="width: 50px; height: 50px; border: 1px solid #f7a4b2; border-radius: 50%"> </td>
                                        <td class="text-nowrap"><p class="margin-text"><?=$item->giftbox_content?></p></td>
                                        <td class="text-nowrap"><p class="margin-text"><?=$item->selectgiftbox_date?></p></td>
                                        <td class="text-nowrap"><p class="margin-text"><?=$item->selectgiftbox_droppoint?></p></td>
                                        <td class="text-nowrap">
                                            <?php if ($item->selectgiftbox_status == '1') { ?>
                                                <div style="width: 80px; height: 20px; background-color: red; border-radius: 10px; margin-top: 5%">
                                                    <div class="text-center">
                                                        <p style="font-size: 12px; color: white">รอตรวจสอบ</p>
                                                    </div>
                                                </div>
                                            <?php } else if ($item->selectgiftbox_status == '3') { ?>
                                                <div style="width: 80px; height: 20px; background-color: #F4F467; border-radius: 10px; margin-top: 5%">
                                                    <div class="text-center">
                                                        <p style="font-size: 12px; color: white">มีปัญหา</p>
                                                    </div>
                                                </div>
                                            <?php } else if ($item->selectgiftbox_status == '2') { ?>
                                                <div style="width: 80px; height: 20px; background-color: green; border-radius: 10px; margin-top: 5%">
                                                    <div class="text-center">
                                                        <p style="font-size: 12px; color: white">ยืนยัน</p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($item->selectgiftbox_status == 1){?>
                                            <p class="margin-text"><i class="fa fa-check fa-lg"
                                                                      style="color: green" onclick="onselectGiftbox(
                                                                          '<?=$item->selectgiftbox_id ?>','2'
                                                                      )"></i>
                                                | <i class="fa fa-trash fa-lg" style="color: red" onclick="onselectGiftbox(
                                                        '<?=$item->selectgiftbox_id ?>','3'
                                                        )"></i> </p></td>
                                        <?php }?>
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
</div>

<script>
    function onselectGiftbox(id, status) {
        if(status == 2){
            if(confirm('ยืนยันการตรวจสอบนี้หรือไม่')){
                $.post("<?=site_url('AUpdateData/updateStatusGiftBox')?>",{
                    id : id,
                    status : status
                },function () {
                    location.reload();
                });
            }
        }else{
            if(confirm('ยืนยันการลบข้อมูลนี้หรือไม่')){
                $.post("<?=site_url('AUpdateData/updateStatusGiftBox')?>",{
                    id : id,
                    status : status
                },function () {
                    location.reload();
                });
            }
        }

    }
</script>



