<html>
<head>
    <title>ALIVE-DROPSHIP.COM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/fronts/style.css') ?>">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="nav-header">
    <div class="box-margin">
        <a href="<?= site_url($this->uri->segment(1) . '/login') ?>">
            <div class="btn btn-nonbackground btn-50">
                เข้าสู่ระบบ
            </div>
        </a>

        <a href="<?= site_url($this->uri->segment(1) . '/policy') ?>">
            <div class="btn btn-background btn-50">
                สมัครตัวแทน
            </div>
        </a>

    </div>

</div>

<nav class="nav-menu">
    <div class="box-margin">
        <div style="display: inline">
            <a href="<?= site_url($this->uri->segment(1)) ?>">
                <img src="<?= base_url('assets/logoalive.png') ?>" class="img-logo"/>
            </a>
        </div>
        <div style="float: right">
            <ul class="menu-ul">
                <li class="menu-li dropdown"><p data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">ผลิตภัณฑ์ <i
                                class="fa fa-angle-down"></i></p>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <a class="dropdown-item"
                           href="<?= site_url($this->uri->segment(1) . '/productdetail?category=2') ?>">Hero
                            ดูแลปัญหาโรคต้อมลูกหมากโต</a>
                        <a class="dropdown-item"
                           href="<?= site_url($this->uri->segment(1) . '/productdetail?category=3') ?>">Falisia
                            X ดูแลปัญหาทางเดินปัสสาวะ</a>
                        <a class="dropdown-item"
                           href="<?= site_url($this->uri->segment(1) . '/productdetail?category=4') ?>">Focus
                            บำรุงสายตาและสมอง</a>
                        <a class="dropdown-item"
                           href="<?= site_url($this->uri->segment(1) . '/productdetail?category=5') ?>">นาคาราสมุนไพร
                            แก้ปวดเมื่อยเส้นยึด เส้นตึง</a>
                        <a class="dropdown-item"
                           href="<?= site_url($this->uri->segment(1) . '/productdetail?category=6') ?>">Venus
                            Herb ดูแลสุขภาพภายในของผู้หญิง</a>
                        <a class="dropdown-item" href="<?= site_url($this->uri->segment(1) . '/productall') ?>">อื่น
                            ๆ</a>
                    </div>
                </li>
                <li class="menu-li  dropdown"><p data-toggle="dropdown" aria-haspopup="true"
                                                 aria-expanded="false">วิธีการสั้งชื้อ <i
                                class="fa fa-angle-down"></i></p>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <a class="dropdown-item" href="#">วิธีการสั่งชื้อ</a>
                        <a class="dropdown-item" href="<?= site_url('Website/payment_method') ?>">วิธีการชำระเงิน</a>

                    </div>
                </li>
                <li class="menu-li  dropdown"><p data-toggle="dropdown" aria-haspopup="true"
                                                 aria-expanded="false">รีวิว&ศูนย์การเรียนรู้ <i
                                class="fa fa-angle-down"></i></p>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <a class="dropdown-item" href="<?= site_url($this->uri->segment(1) . '/blogs') ?>">รีวิวผลิตภัณฑ์</a>

                    </div>
                </li>
                <li class="menu-li  dropdown" onclick="orderlistweb();"><p>ตรวจสอบการสั่งชื้อ</p>
                </li>
                <li class="menu-li dropdown" onclick="contact_us();"><p>ติดต่อเรา</p>

                </li>
                <li class="menu-li dropdown"><p><i class="fa fa-shopping-cart" style="font-size: 20px"
                                                   onclick="shoppingcart();"></i>
                    </p></li>

            </ul>
        </div>
    </div>
</nav>
<script>
    function orderlistweb() {
        location.href = "<?=site_url($this->uri->segment(1) . '/orderlist')?>";
    }
    function contact_us() {
        location.href = "<?=site_url($this->uri->segment(1) . '/contact_us')?>";
    }
</script>
<div class="display-mobile" style="background-color: #ffe2e7; overflow: auto; padding: 5px">
    <div style="float: left;margin-right: 3%">
        <span style="font-size:25px;cursor:pointer; color: #10308e; margin-left: 10px"
              onclick="openNav()">&#9776;</span>
    </div>

    <div class="text-center">
        <a href="<?= site_url($this->uri->segment(1)) ?>">
            <img src="<?= base_url('assets/logoalive.png') ?>"
                 style="width: 20%; margin-left: -35px; margin-top: 7px"/>
        </a>
    </div>
</div>
<style>

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 99;
        top: 0;
        left: 0;
        background-color: #fcabb9;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 18px;
        color: white;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
</style>
<div id="mySidenav" class="sidenav display-mobile">
    <a href="javascript:void(0)" class="closebtn" style="color: white!important;" onclick="closeNav()">&times;</a>
    <a href="<?= site_url($this->uri->segment(1)) ?>" style="color: white!important;">หน้าหลัก</a>
    <a href="<?= site_url($this->uri->segment(1) . '/policy') ?>" style="color: white!important;">สมัครสมาชิก</a>
    <a href="<?= site_url($this->uri->segment(1) . '/login') ?>" style="color: white!important;">เข้าสู่ระบบ</a>
    <a href="<?= site_url($this->uri->segment(1) . '/productall') ?>" style="color: white!important;">ผลิตภัณฑ์</a>
    <a href="<?= site_url($this->uri->segment(1) . '/blogs') ?>"
       style="color: white!important;">รีวิว&ศูนย์การเรียนรู้</a>
    <a href="<?= site_url($this->uri->segment(1) . '/shoppingcart') ?>"
       style="color: white!important;">รายการสั่งชื้อ</a>
    <a href="<?= site_url($this->uri->segment(1) . '/orderlist') ?>"
       style="color: white!important;">ตรวจสอบการสั่งชื้อ</a>
    <a href="<?= site_url($this->uri->segment(1) . '/contact') ?>" style="color: white!important;">ติดต่อเรา</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<style>
    .box-social {
        position: fixed;
        z-index: 99;
        right: 0;
        background-color: #fffafb;
        width: 50px;
        height: auto;
        padding: 10px;
        border-radius: 5px 0 0 5px;
    }
</style>
<div class="box-social display-website">
    <div class="row">
        <div class="col-md-12">
            <a href="<?= $this->FQueryView->checklinksocial('Facebook', ''); ?>" target="_blank">
                <img src="<?= base_url('assets/icons/facebook.png') ?>" style="width: 100%; border-radius: 5px;"/>
            </a>
        </div>
        <div class="col-md-12">
            <a href="http://line.me/ti/p/~<?= $this->FQueryView->checklinksocial('Line', ''); ?>" target="_blank">
                <img src="<?= base_url('assets/icons/line.png') ?>"
                     style="width: 100%; border-radius: 5px; margin-top: 10px"/>
            </a>
        </div>
        <div class="col-md-12">
            <a href="<?= $this->FQueryView->checklinksocial('Instagram', ''); ?>" target="_blank">
                <img src="<?= base_url('assets/icons/instagram.png') ?>"
                     style="width: 100%; border-radius: 5px; margin-top: 10px">
            </a>
        </div>
    </div>
</div>