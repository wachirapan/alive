<input type="hidden" id="member_id" value="<?= $_GET['member_id'] ?>">
<?php $member = $this->AQueryView->get_membersedit($_GET['member_id']);
foreach ($member as $item) {
    ?>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ข้อมูลส่วนตัว</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-6">
                        <div class="img-box">
                            <div class="form-group">
                                <label>ชื่อ-นามกุล</label>
                                <input type="text" class="form-control" id="member_name"
                                       value="<?= $item->member_name ?>">
                            </div>
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="member_phone"
                                       value="<?= $item->member_phone ?>">
                            </div>
                            <div class="form-group">
                                <label>บัตรประชาชน</label>
                                <input type="text" class="form-control" id="member_idcard"
                                       value="<?= $item->member_idcard ?>">
                            </div>
                            <div class="form-group">
                                <label>ที่อยู่</label>
                                <input type="text" class="form-control" id="member_address"
                                       value="<?= $item->member_address ?>">
                            </div>
                            <div class="form-group">
                                <label>จังหวัด</label>
                                <select class="form-control" id="province">
                                    <?php $province = $this->AQueryView->get_province_edit($item->province_id);
                                    foreach ($province as $o) {
                                        ?>
                                        <option value="<?= $o->id ?>" selected> <?= $o->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ไปรษณีย์</label>
                                <input type="text" class="form-control" id="member_zipcode"
                                       value="<?= $item->zipcode ?>">
                            </div>
                            <div class="form-group">
                                <label>อีเมล์</label>
                                <input type="text" class="form-control" id="member_email"
                                       value="<?= $item->member_email ?>">
                            </div>
                            <div class="form-group">
                                <label>Line</label>
                                <input type="text" class="form-control" id="memebr_line"
                                       value="<?= $item->member_line ?>">
                            </div>
                            <div class="form-group">
                                <label>Facebook (URL ลิ้งค์)</label>
                                <input type="text" class="form-control" id="memebr_facebook"
                                       value="<?= $item->member_facebook ?>">
                            </div>
                            <button class="btn btn-background" onclick="update_member();"><i class="fa fa-save"></i>
                                ยืนยัน
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 mobile-magin">
                        <div class="img-box">
                            <div class="form-group">
                                <label>ธนาคาร <span>*</span></label>
                                <input type="text" class="form-control" id="bankname"
                                       value="<?= $item->member_bank_name ?>">
                            </div>
                            <div class="form-group">
                                <label>ประเภทบัญชี <span>*</span></label>
                                <input type="text" class="form-control" id="deposit"
                                       value="<?= $item->member_bank_deposit ?>">
                            </div>
                            <div class="form-group">
                                <label>สาขา <span>*</span></label>
                                <input type="text" class="form-control" id="branch"
                                       value="<?= $item->member_bank_branch ?>">
                            </div>
                            <div class="form-group">
                                <label>ชื่อบัญชี <span>*</span></label>
                                <input type="text" class="form-control" id="bank_account"
                                       value="<?= $item->member_bank_account ?>">
                            </div>
                            <div class="form-group">
                                <label>เลขที่บัญชี <span>*</span></label>
                                <input type="text" class="form-control" id="bank_serial"
                                       value="<?= $item->member_bank_serial ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function () {
        $.getJSON("<?=site_url('Api/get_province')?>", function (data) {
            $.each(data, function (k, v) {
                $('#province').append('<option value="' + v['id'] + '">' + v['name'] + '</option>');
            })
        });
    });
    function update_member() {
        if (confirm('ยืนยันการบันทึกการแก้ไขนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_profile')?>", {
                member_id: $("#member_id").val(),
                member_name: $('#member_name').val(),
                member_phone: $('#member_phone').val(),
                member_idcard: $('#member_idcard').val(),
                member_address: $('#member_address').val(),
                province: $('#province').val(),
                member_zipcode: $("#member_zipcode").val(),
                member_email: $('#member_email').val(),
                memebr_line: $("#memebr_line").val(),
                memebr_facebook: $('#memebr_facebook').val(),

                bankname: $("#bankname").val(),
                deposit: $("#deposit").val(),
                branch: $("#branch").val(),
                bank_account: $("#bank_account").val(),
                bank_serial: $("#bank_serial").val(),

            }, function () {
                location.href = "<?=site_url('WAController/listrepresentative')?>";
            });
        }
    }
</script>