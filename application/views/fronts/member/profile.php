<div class="container display-website" style="margin-bottom: 10px; margin-top: 5%">
    <div class="product-introduce">
        <div class="text-center">
            <div class="separator"><h3>ข้อมูลการสมัคร</h3></div>
        </div>
    </div>
    <div  class="row">
        <div class="col-md-12 text-center">
            <h4 >ชื่อ-สกุล : <?=$this->session->userdata('register_member_name')?></h4>
            <h4>รหัสสมาชิก  : <?=$this->session->userdata('register_member_code')?></h4>
            <h4 >รหัสผ่าน  : <?=$this->session->userdata('register_member_pwd')?></h4>
            <a href="<?=site_url('RegisterAndLogin/clear_userregister')?>"><button class="btn btn-background" style="margin-top: 2%; width: 250px">ยืนยัน</button></a>
        </div>
        <div class="mobile-scale col-md-12 text-center" style="margin-top: 5%">
            <p style="color: red">กรุณารอทางทีมงานติดต่อกลับเมื่อตรวจสอบเรียบร้อยแล้วค่ะ</p>
        </div>
    </div>
</div>


<div class="container display-mobile" style="margin-bottom: 10px; margin-top: 20%">
    <div class="product-introduce">
        <div class="text-center">
            <div class="separator"><h4>ข้อมูลการสมัคร</h4></div>
        </div>
    </div>
    <div  class="row">
        <div class="col-md-12 text-center">
            <h4 style="margin-top: 5%">ชื่อ-สกุล : <?=$this->session->userdata('register_member_name')?></h4>
            <h4 style="margin-top: 2%">รหัสสมาชิก  : <?=$this->session->userdata('register_member_code')?></h4>
            <h4 style="margin-top: 2%">รหัสผ่าน  : <?=$this->session->userdata('register_member_pwd')?></h4>
            <a href="<?=site_url('RegisterAndLogin/clear_userregister')?>"><button class="btn btn-background" style="margin-top: 5%; width: 250px">ยืนยัน</button></a>
        </div>
        <div class="mobile-scale col-md-12 text-center" style="margin-top: 20%">
            <p style="color: red">กรุณารอทางทีมงานติดต่อกลับเมื่อตรวจสอบเรียบร้อยแล้วค่ะ</p>
        </div>
    </div>
</div>