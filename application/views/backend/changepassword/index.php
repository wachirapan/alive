<style>
    .box-password {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        width: 50%;
        padding: 5%;
        margin: auto;
    }

    .request {
        color: red;
    }

    .form {
        margin-top: 5%;
    }
    @media only screen and (max-width: 700px) {
        .box-password {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            width: 100%;
            padding: 5%;
            margin: auto;
        }

    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="box-password">
            <h6 style="color: black; margin-top: -7%; font-weight: bold">รหัสผ่าน สำหรับเข้าใช้งานระบบ</h6>
            <div class="form">
                <div class="form-group">
                    <label>รหัสผ่านเติม <span class="request">* <div id="txt-beforepwd"
                                                                     class="request"></div></span></label>
                    <input type="text" class="form-control" id="before_pwd">
                </div>
                <div class="form-group">
                    <label>รหัสผ่านเติม <span class="request">*</span></label>
                    <input type="text" class="form-control" id="after_pwd">
                </div>
                <div class="form-group">
                    <label>รหัสผ่านเติม <span class="request">*</span> <span><div id="txt-afterpwd"
                                                                                  class="request"></div></span></label>
                    <input type="text" class="form-control" id="again_after_pwd">
                </div>
                <div class="form-check" style="margin-left: 7px">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="" style="transform: scale(2.0);">&nbsp
                        ยืนยันการเปลี่ยนรหัสผ่านใหม่ สำหรับการใช้งานระบบ
                    </label>
                </div>
                <button class="btn btn-background form-control" onclick="changepassword();" style="margin-top: 3%">
                    บันทึกการเปลี่ยนรหัสผ่าน
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function changepassword() {

        $.getJSON("<?=site_url('Api/check_passwordbefore?before_pwd=')?>" + $('#before_pwd').val(), function (data) {
            if (data.length != 0) {
                if ($('#after_pwd').val() != $('#again_after_pwd').val()) {
                    $('#txt-afterpwd').html('รหัสผ่านไม่ตรงกันค่ะ');
                } else {
                    $.post("<?=site_url('BUpdateData/change_password')?>", {
                        after_pwd: $('#after_pwd').val()
                    }, function () {

                    });
                }
            } else {
                $('#txt-beforepwd').html('รหัสผ่านไม่ถูกต้องค่ะ');
            }
        });

    }
</script>