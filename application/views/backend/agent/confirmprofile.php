<div class="container" style="margin-bottom: 10px">
    <div class="product-introduce">
        <div class="separator"><h4>ข้อมูลการสมัคร</h4></div>
    </div>
    <div  class="row">
        <div class="col-md-12 text-center">
            <h4>ชื่อ-สกุล : <?=$this->session->userdata('member_name')?></h4>
            <h4>รหัสสมาชิก  : <?=$this->session->userdata('member_code')?></h4>
            <h4>รหัสผ่าน  : <?=$this->session->userdata('member_pwd')?></h4>
            <a href="<?=site_url('WBackend/index')?>"><button class="btn btn-primary">ยืนยัน</button></a>
        </div>
        <div class="col-md-12 text-center">
            <p style="color: #fcabb9">กรุณารอทางทีมงานติดต่อกลับเมื่อตรวจสอบเรียบร้อยแล้วค่ะ</p>
        </div>
    </div>
</div>