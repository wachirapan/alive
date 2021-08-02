<!DOCTYPE html>
<html>
<head>
    <title>Alive | Dropship</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/fronts/font-awesome/css/font-awesome.min.css') ?>">

    <style>
        html, body {
            background-image: url('<?=base_url('assets/bg.jpeg')?>');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }

        .form-login {
            width: 40%;
            margin: auto;
            margin-top: 30px;
            border: 1px solid #ffe2e7;
            padding: 40px;
            border-radius: 5px;
        }

        .btn-blue {
            background-color: #fc8a8a;
            color: white;
        }

        input {
            border: 1px solid #fc8a8a !important;
        }

        .img-logo {
            width: 20%;
            margin-top: 10%;
            border-radius: 5%
        }

        @media only screen and (max-width: 600px) {
            .form-login {
                width: 95%;
                margin: auto;
                margin-top: 30px;
                border: 1px solid #fc8a8a;
                padding: 10px;
                border-radius: 5px;
            }

            .img-logo {
                width: 50%;
                margin-top: 10%;
                border-radius: 5%
            }
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/fronts/css/style.css') ?>">

</head>
<body>
<div class="container" style="margin-bottom: 20px">
    <div class="product-introduce text-center">
        <a href="<?= site_url('welcome/index') ?>">
            <img src="<?= base_url('assets/logoalive.png') ?>" class="img-logo"/>
        </a>
        <!--        <div class="separator" style="margin-top: 2%"><h4>เข้าสู่ระบบ</h4></div>-->
    </div>
    <form action="<?= site_url('RegisterAndLogin/checkLoginAdmin') ?>" method="post">
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
            <a href="<?= site_url('RegisterAndLogin/doc_register') ?>" style="color: #fe0000"><h5 class="text-center">
                    สมัครสมาชิก</h5></a>

            <a onclick="forgotpassword();" class="pointer" style="color: black"><h6 class="text-center">ลืมรหัสผ่าน</h6>
            </a>

            <div class="form-group text-center">
                <?php if (isset($_GET['status'])) { ?>
                    <h4 style="color: red">ไม่มีชื่อผู้ใช้นี้ค่ะ</h4>
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
                <button onclick="sendemail();" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-send"></i>
                    ยืนยัน
                </button>
            </div>

        </div>
    </div>
</div>
</body>
</html>