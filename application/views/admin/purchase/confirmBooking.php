<style>
    .form-box{
        border: 1px solid gainsboro;
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">รายละเอียดการจัดส่ง</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="form-box">
                            <h6>หมายเลขสั่งชื้อ : <?=$purchase_id?></h6>
                            <h6>ราคาจัดส่ง : <?=$price?></h6>
                            <h6>trackingcode : <?=$tracking_code?></h6>
                            <h6>couriertrackingcode : <?=$courier_tracking_code?></h6>
                            <h6>บริษัทจัดส่ง : <?=$courier_name?></h6>
                            <h6>ระยะเวลา : <?=$estimate_time?></h6>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="form-box">
                                    <h6>ผู้ส่ง</h6>
                                    <p><?=$this->ShippoModel->checkFromName();?> <br/> <?=$this->ShippoModel->checkAddress()?> <br/>
                                        <?=$this->ShippoModel->checkZipcode()?> <br/> <?=$this->ShippoModel->checkPhone()?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box">
                                    <h6>ผู้รับ</h6>
                                    <p><?=$to_name?> <br/> <?=$to_address?> <br> <?=$postcode?> <br/> <?=$tel?> </p>
                                </div>
                            </div>
                        </div>
                        <div style="margin: 1px; padding: 10px">
                            <div onclick="btnSubmit();" class="btn" style="background-color: #fcabb9; color: white"><i class="fa fa-save"></i> ยืนยันการสร้าง</div>
                            <div class="btn" style="border: 1px solid #fcabb9; color: #fcabb9"><i class="fa fa-trash"></i> ยกเลิกการสร้าง</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function btnSubmit() {
        if(confirm('ยืนยันการทำรายการนี้หรือไม่')){
            $.post('<?=site_url('ShippopApi/confirmBooking')?>',{
                purchase_id : $('#purchase_id').val(),

                courier_code : $('#courier_code').val(),
                tracking_code : $("#tracking_code").val(),
                courier_name : $('#courier_name').val(),
                price : $('#price').val(),
                origin_id : $('#origin_id').val(),
                mem_id : $('#mem_id').val(),
                dest_id : $('#dest_id').val(),
                ordermove_id : $('#ordermove_id').val()
            }).then(function (data) {
                if(data == 'true'){
                    location.href = "<?=site_url('AController/sendingcomplete')?>";
                }else{
                    alert('ระบบมีปัญหาขัดข้องกรุณาลองใหม่อีกครั้ง');
                }
            });
        }
    }
    function printOrder(purchase_id, tracking_code) {
        window.open('<?=site_url('ShippopApi/printorderSender?purchase_id=')?>'+purchase_id+'&tracking_code='+tracking_code);
    }
</script>
<input type="hidden" id="purchase_id" name="purchase_id" value="<?=$purchase_id?>">

<input type="hidden" id="courier_code" name="courier_code" value="<?=$courier_tracking_code?>">
<input type="hidden" id="tracking_code" name="tracking_code" value="<?=$tracking_code?>">
<input type="hidden" id="courier_name" name="courier_name" value="<?=$courier_name?>">
<input type="hidden" id="price" name="price" value="<?=$price?>">
<input type="hidden" id="origin_id" name="origin_id" value="<?=$origin_id?>">
<input type="hidden" id="mem_id" name="mem_id" value="<?=$mem_id?>">
<input type="hidden" id="dest_id" name="dest_id" value="<?=$dest_id?>">
<input type="hidden" id="ordermove_id" name="ordermove_id" value="<?=$ordermove_id?>">



