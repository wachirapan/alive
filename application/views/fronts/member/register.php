<style>
    .required{
        color: red;
    }
    input, select{
        border: 1px solid #f8c6c7!important;
    }
</style>
<div class="container">
    <div class="text-center" style="margin-top: 5%">
        <h4>สมัครสมาชิก</h4>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>เพศ <span class="required">*</span></label>
                        <select class="form-control" id="sex">
                            <option value="ชาย">ชาย</option>
                            <option value="ชาย">หญิง</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อ-สกุล <span class="required">*</span></label>
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>หมายเลขบัตรประชาชน <span class="required">*</span></label>
                        <input type="text" class="form-control" id="idcard" onkeypress="return onlyNumberKey(event)">
                        <div id="txt-idcardtrue" style="color: green"></div>
                        <div id="txt-idcardflase" style="color: red"></div>
                        <button class="btn btn-nonbackground" id="btn-checkidcard" style="margin-top: 1%" onclick="valid_citizen_id();">ตรวจสอบ</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์ <span class="required">*</span></label>
                        <input type="text" class="form-control" id="telephone" onkeypress="return onlyNumberKey(event)">
                        <div id="txt-phone" style="color: red"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>อีเมลล์</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Line </label>
                        <input type="text" class="form-control" id="line">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" id="facebook">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ที่อยู่ <span class="required">*</span></label>
                        <input type="text" class="form-control" id="address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>จังหวัด <span class="required">*</span></label>
                        <select class="form-control" id="province">
                            <option value="">-- กรุณาเลือกจังหวัด --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>รหัสไปรษณีย์ <span class="required">*</span></label>
                        <input type="text" class="form-control" id="zipcode" onkeypress="return onlyNumberKey(event)">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>ธนาคาร <span class="required">*</span></label>
                        <input type="text" class="form-control" id="bankname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ประเภทบัญชี <span class="required">*</span></label>
                        <input type="text" class="form-control" id="deposit">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>สาขา <span class="required">*</span></label>
                        <input type="text" class="form-control" id="branch">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อบัญชี <span class="required">*</span></label>
                        <input type="text" class="form-control" id="bank_account">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>เลขที่บัญชี <span class="required">*</span></label>
                        <input type="text" class="form-control" id="bank_serial">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>รหัสผู้แนะนำ <span class="required">*</span></label>
                        <input type="text" class="form-control" id="line_customercode" onkeypress="return onlyNumberKey(event)" onkeyup="checkuserlineup();">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ชื่อผู้แนะนำ</label>
                        <input type="text" class="form-control" id="line_customername" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-background" onclick="confirmregister();">สมัครสมาชิก</button>
        </div>
    </div>
</div>
<input type="hidden" id="upline_id">
<input type="hidden" id="status_idcard">
<script>
    function valid_citizen_id()
    {
        $('#txt-idcardflase').html('');
        $.getJSON("<?=site_url('Api/check_idcard?idcard=')?>"+$('#idcard').val(), function (data) {
            if(data == true) {
                $.getJSON("<?=site_url('Api/checkregister_idcard?idcard=')?>"+$('#idcard').val(),function (status) {
                    console.log(status);
                    if(status == 0){
                        $('#status_idcard').val('true');
                        $('#txt-idcardtrue').html('ใช้งานได้');
                        $('#btn-checkidcard').hide();
                    }else{
                        $('#txt-idcardflase').html('หมายเลขบัตรประชาชนนี้มีผู้ใช้แล้วค่ะ');
                    }
                });

            }else{
                $('#txt-idcardflase').html('ไม่ใช้งานได้');
            }
        });
    }
    $(document).ready(function () {
        $('#status_idcard').val('false');
        $.getJSON("<?=site_url('Api/get_province')?>",function (data) {
            $.each(data, function (k,v) {
                $('#province').append('<option value="'+v['id']+'">'+v['name']+'</option>');
            })
        });
    });
    function checkuserlineup() {
        $.getJSON("<?=site_url('Api/checkcodeuser?codename=')?>"+$('#line_customercode').val(), function (data) {
            $.each(data, function (k,v) {
                $('#upline_id').val(v['member_id']);
                $("#line_customername").val(v['member_name']);
            });
        });
    }
    function confirmregister() {
        if ($('#username').val() == '' || $('#idcard').val() == '' || $('#telephone').val() == '' || $('#address').val() == ''
            || $('#province').val() == '' || $('#zipcode').val() == '' || $('#bankname').val() == ''
            || $('#deposit').val() == '' || $('#branch').val() == '' || $('#bank_account').val() == ''
            || $('#bank_serial').val() == '' || $('#line_customercode').val() == '') {
            alert('กรุณากรอกข้อมุลให้ครบด้วยค่ะ');
        } else {
            console.log($('#province').val())
            if($('#status_idcard').val() != 'false'){
                $.getJSON("<?=site_url('Api/check_phonenumber?member_phone=')?>"+$('#telephone').val(),function (data) {
                    if(data == 0){
                        Swal.fire({
                            title: 'CONFIRM !',
                            text: 'ยืนยันการสมัครสมาชิกนี้หรือไม่',
                            icon: 'success',
                            confirmButtonText: 'ยืนยัน'
                        }).then(function (res) {
                            if(res.isConfirmed){
                                $.post("<?=site_url('RegisterAndLogin/confirm_register')?>", {
                                    sex :$('#sex').val(),
                                    username: $("#username").val(),
                                    idcard: $('#idcard').val(),
                                    telephone: $('#telephone').val(),
                                    address: $('#address').val(),
                                    province: $('#province').val(),
                                    zipcode: $('#zipcode').val(),
                                    bankname: $('#bankname').val(),
                                    deposit: $('#deposit').val(),
                                    branch: $('#branch').val(),
                                    bank_account: $("#bank_account").val(),
                                    bank_serial: $('#bank_serial').val(),
                                    upline_id: $('#upline_id').val(),
                                    email : $('#email').val(),
                                    line : $('#line').val(),
                                    facebook : $('#facebook').val()
                                }, function () {
                                    location.href = "<?=site_url($this->uri->segment(1).'/web_confirmprofile')?>"
                                });
                            }
                        });
                    }else{
                        $('#txt-phone').html('หมายเลขนี้มีผู้ใช้ลงทะเบียนแล้วค่ะ')
                    }
                });
            }else{
                alert('กรุณาตรวจสอบบัตรประชาชน');
            }
        }
    }
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
