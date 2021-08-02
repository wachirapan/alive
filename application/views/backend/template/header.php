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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= site_url('assets/admin/style.css') ?>"/>
    <link rel="stylesheet" href="<?= site_url('assets/admin/mobileStyle.css') ?>"/>

    <style>
        body {
            overflow-x: hidden;
            margin: auto;
        }
        a {
            color: black !important;
            text-decoration: none !important;
        }

        /*slider menu css start*/
        li:hover, li:focus-within a {
            outline: none;
        }

        ul li ul {
            /*background: orange;*/
            visibility: hidden;
            opacity: 0;
            min-width: 5rem;
            position: absolute;
            transition: all 0.5s ease;
            margin-top: 1rem;
            left: 0;
            margin-left: -1rem;
            display: none;
            list-style: none;
        }

        ul li:hover > ul,
        ul li ul:focus {
            visibility: visible;
            opacity: 1;
            display: block;
        }

        .dropdown li {
            margin-top: 1rem;
            font-size: 14px;
        }

        /*slider menu css end

       </style>
</head>
<body>

<div class="display-website" style="margin: 20px">
    <div class="row justify-content-between">
        <div class="col-md-4">
            <img src="<?= base_url('assets/logoalive.png') ?>" class="img-logo"/>
        </div>
        <div class="col-md-8">
            <ul class="ul-left">
                <li class="li-left"><i class="fa fa-bell-o" style="font-size: 25px">
                        <div class="box-number">
                            <span>10</span>
                        </div>
                    </i></li>
                <li class="li-left font-show dropdown" >
                    <a data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Hey' <span><?=$_SESSION['member_name']?></span>
                        <?php if ($this->session->userdata('member_image') == '') { ?>
                        <img src="<?= base_url('assets/boy.png') ?>" class="img-person"/>
                        <?php } else { ?>
                            <img src="<?= base_url('images/members/' . $this->session->userdata('member_image')) ?>" class="img-person"/>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <a class="dropdown-item" href="<?= site_url('RegisterAndLogin/logout') ?>">ออกระบบ</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="display-mobile" style="margin-bottom: 10%">
    <div style="float: left; margin-left: 10px; margin-top: 2%">
        <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>

    <div class="text-center">
        <a href="<?=site_url('AController/index')?>">
            <img src="<?= base_url('assets/logoalive.png') ?>" class="img-logo"/>
        </a>


    </div>
    <div class="ui-tracking">
        <ul class="ul-left">
            <li class="li-left"><i class="fa fa-bell-o" style="font-size: 20px">
                    <div class="box-number">
                        <span>10</span>
                    </div>
                </i>
            </li>
        </ul>
    </div>

</div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white!important;">&times;</a>
    <ul style="list-style: none; margin-left: -50px; margin-bottom: 50%">
        <li class="item-nave">
            <a href="<?= site_url('Backend/index') ?>">
                <i class="fa fa-size fa-home" style="color: #ffcbd4"></i>
                <span class="txt-span" style="font-size: 16px; color: #ffcbd4">หน้าหลัก</span>
            </a>
        </li>

        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-user " style=" color: white!important;"></i>
                <span class="txt-span" style="font-size: 16px;">ข้อมูลส่วนตัว</span>
                <i class="fa fa-angle-down"
                   style="color: white!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('Backend/editprofile')?>" class="sub-munu">แก้ไขข้อมูลส่วนตัว</a></li>
                <li><a href="<?= site_url('Backend/changepassword') ?>" class="sub-munu">เปลี่ยนรหัสผ่าน</a></li>
                <li><a href="<?= site_url('welcome/policy') ?>" class="sub-munu">อัพโหลดเอกสารรับรายได้</a></li>
                <li><a href="<?=site_url('Backend/cardmember')?>" class="sub-munu">บัตรตัวแทน</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/profile') ?>">
                <i class="fa fa-size fa-globe " style=" color: white!important;"></i>
                <span class="txt-span" style="font-size: 16px;">เว็บไซต์ส่วนตัว</span></a>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-users fa-size" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ตัวแทน</span>
                <i class="fa fa-angle-down"
                   style="color: white!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('Backend/form_register_agent')?>" class="sub-munu">กรอกสมัครตัวแทนใหม่</a></li>
                <li><a href="<?= site_url('Backend/linkregister')?>" class="sub-munu">แชร์ลิ้งให้กับลุกทีมสมัครเอง</a></li>
                <li><a href="<?= site_url('welcome/policy') ?>" class="sub-munu">แผนผังตัวแทน</a></li>
                <li><a href="#" class="sub-munu">แผนผังตัวแทนจำหน่าย</a></li>
                <li><a href="<?= site_url('Backend/listrepresentative') ?>" class="sub-munu">ค้นหาตัวแทนจำหน่าย</a>
                </li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/backend_crm') ?>">
                <i class="fa fa-size fa-briefcase" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">CRM&Lead</span></a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/line_group') ?>">
                <i class="fa fa-size fa-qrcode" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">Line Group</span></a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/product') ?>">
                <i class="fa fa-size fa-gift" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">จัดการสินค้า</span></a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/purchase_order') ?>">
                <i class="fa fa-size fa-shopping-cart" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ชื้อสินค้า</span></a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/purchase_senderorder') ?>">
                <i class="fa fa-size fa-truck" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">การสั่งชื้อ-การจัดส่ง</span></a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/score') ?>">
                <i class="fa fa-size fa-star" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คะแนน&แลกคะแนน</span></a>
        </li>
        <li class="item-nave">
            <a  href="#" aria-haspopup="true">
                <i class="fa fa-size fa-file-text" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">รายงาน</span>
                <i class="fa fa-angle-down"
                   style="color: white!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>

            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('Backend/report_score') ?>" class="sub-munu">รายงานสรุปจำนวนและคะแนน</a></li>
                <li><a href="<?= site_url('Backend/report_position')?>" class="sub-munu">รายงานคำนวนส่วนต่าง</a></li>
                <li><a href="<?= site_url('Backend/reportgrouplineup')?>" class="sub-munu">รายงานส่วนต่างสิ้นเดือน</a></li>
                <li><a href="<?= site_url('Backend/recommend_value') ?>" class="sub-munu">รายงานส่วนต่างประจำเดือน</a>
                </li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-graduation-cap" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คอสเรียน</span>
                <i class="fa fa-angle-down"
                   style="color: white!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('Backend/online_course') ?>" class="sub-munu">คู่มือการเรียนรู้</a></li>
                <li><a href="<?= site_url('Backend/filesound') ?>" class="sub-munu">ไฟล์เสียงการสอน</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-database" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คลังข้อมูล</span>
                <i class="fa fa-angle-down"
                   style="color: white!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('Backend/gallary_promote')?>" class="sub-munu">ภาพโปรโมท</a></li>
                <li><a href="<?= site_url('Backend/gallary_image') ?>" class="sub-munu">คลังรูป</a></li>
                <li><a href="<?= site_url('Backend/gallary_artwork')?>" class="sub-munu">อาร์ทเวิร์ค</a></li>
                <li><a href="<?= site_url('Backend/gallary_caption')?>" class="sub-munu">แคปชั่น</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('Backend/contact_us') ?>">
                <i class="fa fa-size fa-comment" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ติดต่อ</span></a>
        </li>
    </ul>
<!--    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white!important;">&times;</a>-->
<!--    <a href="#" style="color: white!important; font-size: 12px">About</a>-->
<!--    <a href="#" style="color: white!important; font-size: 12px">Services</a>-->
<!--    <a href="#" style="color: white!important; font-size: 12px">Clients</a>-->
<!--    <a href="#" style="color: white!important; font-size: 12px">Contact</a>-->
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
<hr>
<div class="body-content">
    <div class="left-content display-website">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="sidebar"
                     style="width: 70%!important; border-radius: 5px; background-color: #fcabb9!important; padding: 20px; box-shadow: none!important; height: 100%!important;">
                    <div class="text-center" style="padding-top: 5px">
                        <a href="<?= site_url('Backend/cardmember') ?>" style="text-decoration: none;">
                            <div style="position: relative; background-color: #ffcbd4; width: 40px; height: 40px;  border-radius: 5px; margin: auto">
                                <i class="fa fa-id-card  fa-2x"
                                   style="color: #fffbfb; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 16px"></i>
                            </div>
                            <p style="color: #fffbfb; font-size: 14px; padding-top: 5%;">บัตรตัวแทน</p>
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('Backend/form_register_agent') ?>" style="text-decoration: none;">
                            <div style=" position: relative; background-color: #ffcbd4; width: 40px; height: 40px;  border-radius: 5px; margin: auto">
                                <i class="fa fa-user-plus"
                                   style="color: #fffbfb;  margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%); font-size: 16px"></i>
                            </div>
                            <p style="color: #fffbfb; font-size: 14px; padding-top: 5%;">สมัครตัวแทน</p>
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="#" style="text-decoration: none;">
                            <div style=" position: relative; background-color: #ffcbd4; width: 40px; height: 40px;  border-radius: 5px; margin: auto">
                                <i class="fa fa-picture-o fa-2x"
                                   style="color: #fffbfb;  margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 16px"></i>
                            </div>
                            <p style="color: #fffbfb; font-size: 14px; padding-top: 5%;">รวมภาพโปรโมท</p>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('Backend/purchase_order') ?>" style="text-decoration: none;">
                            <div style=" position: relative; background-color: #ffcbd4; width: 40px; height: 40px;  border-radius: 5px; margin: auto">
                                <i class="fa fa-shopping-cart fa-2x"
                                   style="color: #fffbfb; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 16px"></i>
                            </div>
                            <p style="color: #fffbfb; font-size: 14px; padding-top: 5%;">ชื้อสินค้า</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box-menuside">
                    <ul style="list-style: none; margin-left: -10px; margin-bottom: 50%">
                        <li style="margin-top: 10px">
                                        <span class="txt-span"
                                              style="font-size: 20px; font-weight: bold">MEMU</span>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/index') ?>">
                                <i class="fa fa-size fa-home" style="color: #ffcbd4"></i>
                                <span class="txt-span" style="font-size: 16px; color: #ffcbd4">หน้าหลัก</span>
                            </a>
                        </li>

                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-user " style=" color: black!important;"></i>
                                <span class="txt-span" style="font-size: 16px;">ข้อมูลส่วนตัว</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/editprofile') ?>">แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="<?= site_url('Backend/changepassword') ?>">เปลี่ยนรหัสผ่าน</a></li>
                                <li><a href="<?= site_url('welcome/policy') ?>">อัพโหลดเอกสารรับรายได้</a>
                                </li>
                                <li><a href="<?=site_url('Backend/cardmember')?>">บัตรตัวแทน</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/profile') ?>">
                                <i class="fa fa-size fa-globe " style=" color: black!important;"></i>
                                <span class="txt-span" style="font-size: 16px;">เว็บไซต์ส่วนตัว</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-users fa-size" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">ตัวแทน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/form_register_agent') ?>">กรอกสมัครตัวแทนใหม่</a></li>
                                <li><a href="<?= site_url('Backend/linkregister') ?>">แชร์ลิ้งให้กับลุกทีมสมัครเอง</a></li>
                                <li><a href="<?= site_url('Backend/lineup?member_id='.$_SESSION['member_login']) ?>">แผนผังตัวแทน</a>
                                </li>
                                <li><a href="<?= site_url('Backend/listrepresentative') ?>">ค้นหาตัวแทนจำหน่าย</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/backend_crm') ?>">
                                <i class="fa fa-size fa-briefcase" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">CRM&Lead</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/line_group') ?>">
                                <i class="fa fa-size fa-qrcode" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">Line Group</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/product') ?>">
                                <i class="fa fa-size fa-gift" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">จัดการสินค้า</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/purchase_order') ?>">
                                <i class="fa fa-size fa-shopping-cart" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">ชื้อสินค้า</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/purchase_senderorder') ?>">
                                <i class="fa fa-size fa-truck" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">การสั่งชื้อ-การจัดส่ง</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-star" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คะแนน&แลกคะแนน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/score')?>">แลกของรางวัล</a></li>
                                <li><a href="<?= site_url('Backend/scoreselect') ?>">รายการที่เคยแลก</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-file-text" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">รายงาน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>

                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/report_score') ?>">รายงานสรุปจำนวนและคะแนน</a></li>
                                <li><a href="<?= site_url('Backend/report_position') ?>">รายงานคำนวนส่วนต่าง</a></li>
                                <li><a href="<?= site_url('Backend/reportgrouplineup') ?>">รายงานส่วนต่างสิ้นเดือน</a>
                                </li>
                                <li><a href="<?= site_url('Backend/recommend_value') ?>">รายงานส่วนต่างประจำเดือน</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-graduation-cap" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คอสเรียน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/online_course') ?>">คู่มือการเรียนรู้</a></li>
                                <li><a href="<?= site_url('Backend/filesound') ?>">ไฟล์เสียงการสอน</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-database" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คลังข้อมูล</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i></a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('Backend/gallary_promote') ?>">ภาพโปรโมท</a></li>
                                <li><a href="<?= site_url('Backend/gallary_image') ?>">คลังรูป</a></li>
                                <li><a href="<?= site_url('Backend/gallary_artwork') ?>">อาร์ทเวิร์ค</a></li>
                                <li><a href="<?= site_url('Backend/gallary_caption') ?>">แคปชั่น</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('Backend/contact_us') ?>">
                                <i class="fa fa-size fa-comment" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">ติดต่อ</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="right-content">