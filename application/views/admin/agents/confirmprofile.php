<style>
    .btn-width{
        width: 30%;
    }
    @media only screen and (max-width: 700px) {
        .btn-width{
            width: 50%;
        }
    }
</style>
<div class="product-introduce text-center">
    <div class="separator"><h3>ข้อมูลการสมัคร</h3></div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <h5>ชื่อ-สกุล : <?= $this->session->userdata('member_name') ?></h5>
        <h5>รหัสสมาชิก : <?= $this->session->userdata('register_member_code') ?></h5>
        <h5>รหัสผ่าน : <?= $this->session->userdata('member_pwd') ?></h5>
        <a href="<?= site_url('ADeleteData/clearRegister') ?>">
            <button class="btn btn-background btn-width">ยืนยัน</button>
        </a>
    </div>
    <div class="col-md-12 text-center">
        <p style="color: red">กรุณารอทางทีมงานติดต่อกลับเมื่อตรวจสอบเรียบร้อยแล้วค่ะ</p>
    </div>
</div>