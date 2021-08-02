<style>
        .form-login {
            width: 40%;
            margin: auto;
            margin-top: 30px;
            border: 1px solid #ffe2e7;
            padding: 10px;
            border-radius: 5px;

        }

        .btn-blue {
            background-color: #fc8a8a;
            color: white;
        }

        input {
            border: 1px solid #fc8a8a !important;
        }


        @media only screen and (max-width: 600px) {
            .form-login {
                width: 95%;
                margin: auto;
                margin-top: 30px;
                border: 1px solid #fc8a8a;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 5px 5px #f8c6c7;
            }
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/fronts/css/style.css') ?>">


<div class="container" style="margin-bottom: 20px; margin-top: 5%">
    <div class="text-center">
        <h2>LOGIN</h2>
    </div>
    <form action="<?= site_url('RegisterAndLogin/checkLoginMembers') ?>" method="post">
        <div class="form-login">
            <div class="form-group">
                <label>รหัสสมาชิก</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-blue form-control">เข้าสู่ระบบ</button>
            </div>
            <a href="<?= site_url($this->uri->segment(1).'/policy') ?>" style="color: #273F89"><h5 class="text-center">
                    สมัครสมาชิก</h5></a>

            <a onclick="forgotpassword();" class="pointer" style="color: black"><h6 class="text-center">ลืมรหัสผ่าน</h6>
            </a>

            <div class="form-group text-center">
                <?php if (isset($_GET['status'])) { ?>
                    <h4 style="color: red">ไม่มีชื่อผู้ใช้นี้ในระบบค่ะ</h4>
                <?php } ?>
            </div>
        </div>
    </form>

</div>
<style>
    .pointer {
        cursor: pointer;
    }

</style>
<script>
    function forgotpassword() {
        $('#myModal').modal('toggle');
    }
    function sendemail() {
        $.post("<?=site_url('FInsertData/sendemail_forgotpassword')?>", {
            email: $('#email').val()
        }, function () {
            alert('ระบบได้ทำการจัดส่งข้อมูลสมาชิกให้แล้วค่ะ กรุณาตรวจสอบ อีเมลล์ของท่านค่ะ')
        });
    }
</script>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">กรอกอีเมลล์เพื่อรับรหัสผ่าน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>อีเมลล์</label>
                    <input type="text" class="form-control" id="email">
                </div>
                <button onclick="sendemail();" class="btn btn-background" data-dismiss="modal"><i class="fa fa-send"></i>
                    ยืนยัน
                </button>
            </div>

        </div>
    </div>
</div>
