<style>
    .required{
        color: red;
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">สมัครตัวแทนใหม่</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-6">
                        <input type="hidden" id="adviser_id">
                        <div class="form-group">
                            <label>รหัสผู้แนะนำ</label>
                            <input type="text" class="form-control" id="adviser_code" onkeyup="checkuser();">
                        </div>
                        <div class="form-group">
                            <label>ชื่อผู้แนะนำ</label>
                            <input type="text" class="form-control" id="adviser_name" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
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
                                    <input type="text" class="form-control" id="username" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>หมายเลขบัตรประชาชน <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="idcard">
                                    <div id="txt-idcardtrue" style="color: green"></div>
                                    <div id="txt-idcardflase" style="color: red"></div>
                                    <button class="btn btn-nonbackground" id="btn-checkidcard" style="margin-top: 1%" onclick="valid_citizen_id();">ตรวจสอบ</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์ <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="telephone">
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
                                    <input type="text" class="form-control" id="zipcode">
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

                    <div class="col-md-12">
                        <button class="btn btn-background" style="float: right" onclick="confirmregister();">สมัครสมาชิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="status_idcard">
<script>
    $(document).ready(function () {
        $('#status_idcard').val('false')
        $.getJSON("<?=site_url('Api/get_province')?>",function (data) {
            $.each(data, function (k,v) {
                $('#province').append('<option value="'+v['id']+'">'+v['name']+'</option>');
            })
        });
    });
    function valid_citizen_id()
    {
        $.getJSON("<?=site_url('Api/check_idcard?idcard=')?>"+$('#idcard').val(), function (data) {
            if(data == true) {
                $('#status_idcard').val('true');
                $('#txt-idcardtrue').html('ใช้งานได้');
                $('#btn-checkidcard').hide();
            }else{
                $('#txt-idcardfalse').html('ไม่ใช้งานได้');
            }
        });
    }
    function checkuser() {

        $.getJSON("<?=site_url('Api/checkcodeuser?codename=')?>"+$('#adviser_code').val(), function (data) {
            $.each(data, function (k,v) {
                $("#adviser_id").val(v['member_id']);
                $('#adviser_name').val(v['member_name']);
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
            if($('#status_idcard').val() == 'true'){
                if (confirm('ยืนยันการสมัครสมาชิกหรือไม่')) {
                    $.post("<?=site_url('AInsertData/register_agent')?>", {
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

                        email : $('#email').val(),
                        line : $('#line').val(),
                        facebook : $('#facebook').val(),

                        adviser_id : $('#adviser_id').val()
                    }, function () {
                        location.href = "<?=site_url('AController/confirmprofile')?>"
                    });
                }
            }else{
                alert('กรุณาตรวจสอบบัตรประชาชน');
            }

        }
    }
</script>
