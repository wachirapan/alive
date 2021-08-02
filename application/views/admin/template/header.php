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
                <li class="li-left font-show dropdown" ><a data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">Hey' <span>Administrator</span> <img
                                src="<?= base_url('assets/boy.png') ?>" class="img-person"/></a>
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
            <a href="<?= site_url('AController/index') ?>">
                <i class="fa fa-size fa-home" style="color: #ffcbd4"></i>
                <span class="txt-span" style="font-size: 16px; color: #ffcbd4">หน้าหลัก</span>
            </a>
        </li>

        <li class="item-nave">
            <a href="<?= site_url('welcome/index') ?>" target="_blank">
                <i class="fa fa-size fa-globe " style=" color: white!important;"></i>
                <span class="txt-span" style="font-size: 16px;">เว็บไซต์ส่วนตัว</span></a>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-users fa-size" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ตัวแทน</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/checkregister') ?>" class="sub-munu">ตรวจสอบผู้สมัครใหม่</a></li>
                <li><a href="<?= site_url('AController/register') ?>" class="sub-munu">สมัครตัวแทนใหม่</a></li>
                <li><a href="<?= site_url('welcome/policy') ?>" target="_blank" class="sub-munu">แชร์ลิ้งให้กับลูกทีมสมัครเอง</a>
                </li>
                <li><a href="<?=site_url('AController/lineup?member_id=1')?>" class="sub-munu">แผนผังตัวแทนจำหน่าย</a></li>
                <li><a href="<?= site_url('AController/listrepresentative') ?>" class="sub-munu">ค้นหาตัวแทนจำหน่าย</a>
                </li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('AController/crm') ?>">
                <i class="fa fa-size fa-briefcase" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">CRM&Lead</span></a>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-gift" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">จัดการสินค้า</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/listcategory')?>" class="sub-munu">ประเภทสินค้า</a></li>
                <li><a href="<?= site_url('AController/product') ?>" class="sub-munu">สินค้า</a></li>
                <li><a href="<?= site_url('AController/checkproduct_saler') ?>" class="sub-munu">คำขอลงขายสินค้า</a></li>
                <li><a href="<?= site_url('AController/product_member') ?>" class="sub-munu">สินค้าสมาชิก</a></li>
            </ul>
        </li>

        <li class="item-nave">
            <a href="<?= site_url('AController/purchase') ?>">
                <i class="fa fa-size fa-shopping-cart"
                   style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ขายสินค้า</span></a>
        </li>

        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-suitcase" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คำขอสั่งชื้อ</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/purchaseorder') ?>" class="sub-munu">รอตรวจสอบ</a></li>
                <li><a href="<?= site_url('AController/sendingcomplete') ?>" class="sub-munu">จัดส่งแล้ว</a></li>
            </ul>
        </li>

        <li class="item-nave">
            <a href="<?= site_url('AController/score') ?>">
                <i class="fa fa-size fa-star" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คะแนน&แลกคะแนน</span></a>
        </li>

        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-file-text" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">รายงาน</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/procress') ?>" class="sub-munu">สรุปยอดขายรายวัน</a></li>
                <li><a href="<?= site_url('AController/report_position') ?>" class="sub-munu">ส่วนลดยอดสั่งชื้อ</a></li>
                <li><a href="<?= site_url('AController/reportgrouplineup') ?>" class="sub-munu">รายได้ All Sale</a></li>
                <li><a href="<?= site_url('AController/report_month') ?>" class="sub-munu">รายงานยอดรายเดือน</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-bullhorn" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">รีวิว&ศูนการเรียนรู้</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/category_blogs') ?>" class="sub-munu">ประเภท</a></li>
                <li><a href="<?= site_url('AController/review') ?>" class="sub-munu">รีวิว & บล็อค</a></li>

            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-graduation-cap"
                   style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คอร์สเรียน</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/course_manual') ?>" class="sub-munu">คู่มือ/การเรียนรู้</a></li>
                <li><a href="<?= site_url('AController/course_sound') ?>" class="sub-munu">ไฟล์เสียงการสอน</a></li>

            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-database" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">คลังข้อมูล</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/gallary_promote') ?>" class="sub-munu">ภาพโปรโมท</a></li>
                <li><a href="<?= site_url('AController/gallary_image') ?>" class="sub-munu">คลังรูป</a></li>
                <li><a href="<?= site_url('AController/gallary_artwork') ?>" class="sub-munu">อาร์ทเวิร์ค</a></li>
                <li><a href="<?= site_url('AController/gallary_caption') ?>" class="sub-munu">แคปชั่น</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="#" aria-haspopup="true">
                <i class="fa fa-size fa-cogs" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">จัดการระบบ</span>
                <i class="fa fa-angle-down"
                   style="color: #ffffff!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
            </a>
            <ul class="dropdown" aria-label="submenu">
                <li><a href="<?= site_url('AController/order_discount') ?>" class="sub-munu">ส่วนการสั่งชื้อ</a></li>
                <li><a href="<?= site_url('AController/amount_discount') ?>" class="sub-munu">ยอดสั่งชื้อ</a></li>
                <li><a href="<?= site_url('AController/setting_lineup') ?>" class="sub-munu">โบนัสค่าแนะนำ</a></li>
                <li><a href="<?= site_url('AController/allsale') ?>" class="sub-munu">All Sale</a></li>
                <li><a href="<?= site_url('AController/linetoken') ?>" class="sub-munu">Line Token</a></li>
                <li><a href="<?= site_url('AController/about_us') ?>" class="sub-munu">เกี่ยวกับเรา</a></li>
                <li><a href="<?= site_url('AController/social') ?>" class="sub-munu">โซเซียล</a></li>
                <li><a href="<?= site_url('AController/banner') ?>" class="sub-munu">แบนเนอร์</a></li>
                <li><a href="<?= site_url('AController/company') ?>" class="sub-munu">ข้อมูลบริษัท</a></li>
            </ul>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('AController/contact_us') ?>">
                <i class="fa fa-size fa-comment" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ติดต่อ</span>
            </a>
        </li>
        <li class="item-nave">
            <a href="<?= site_url('RegisterAndLogin/logout') ?>">
                <i class="fa fa-size fa-comment" style="color: white!important;font-size: 16px;"></i>
                <span class="txt-span" style="font-size: 16px;">ออกจากระบบ</span>
            </a>
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
                        <a href="#" style="text-decoration: none;">
                            <div style="position: relative; background-color: #ffcbd4; width: 40px; height: 40px;  border-radius: 5px; margin: auto">
                                <i class="fa fa-id-card  fa-2x"
                                   style="color: #fffbfb; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 16px"></i>
                            </div>
                            <p style="color: #fffbfb; font-size: 14px; padding-top: 5%;">บัตรตัวแทน</p>
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('AController/register') ?>" style="text-decoration: none;">
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
                        <a href="<?= site_url('AController/purchase') ?>" style="text-decoration: none;">
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
                            <a href="<?= site_url('AController/index') ?>">
                                <i class="fa fa-size fa-home" style="color: #ffcbd4"></i>
                                <span class="txt-span" style="font-size: 16px; color: #ffcbd4">หน้าหลัก</span>
                            </a>
                        </li>

                        <li class="item-nave">
                            <a href="<?= site_url('welcome/index') ?>" target="_blank">
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
                                <li><a href="<?= site_url('AController/checkregister') ?>">ตรวจสอบผู้สมัครใหม่</a></li>
                                <li><a href="<?= site_url('AController/register') ?>">สมัครตัวแทนใหม่</a></li>
                                <li><a href="<?= site_url('welcome/policy') ?>" target="_blank">แชร์ลิ้งให้กับลูกทีมสมัครเอง</a>
                                </li>
                                <li><a href="<?=site_url('AController/lineup?member_id=1')?>">แผนผังตัวแทนจำหน่าย</a></li>
                                <li><a href="<?= site_url('AController/listrepresentative') ?>">ค้นหาตัวแทนจำหน่าย</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('AController/crm') ?>">
                                <i class="fa fa-size fa-briefcase" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">CRM&Lead</span></a>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-gift" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">จัดการสินค้า</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/listcategory') ?>">ประเภทสินค้า</a></li>
                                <li><a href="<?= site_url('AController/product') ?>">สินค้า</a></li>
                                <li><a href="<?= site_url('AController/checkproduct_saler') ?>">คำขอลงขายสินค้า</a></li>
                                <li><a href="<?= site_url('AController/product_member') ?>">สินค้าสมาชิก</a></li>
                            </ul>
                        </li>

                        <li class="item-nave">
                            <a href="<?= site_url('AController/purchase') ?>">
                                <i class="fa fa-size fa-shopping-cart"
                                   style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">ขายสินค้า</span></a>

                        </li>

                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-suitcase" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คำขอสั่งชื้อ</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/purchaseorder') ?>">รอตรวจสอบ</a></li>
                                <li><a href="<?= site_url('AController/sendingcomplete') ?>">จัดส่งแล้ว</a></li>
                            </ul>
                        </li>

                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-star" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คะแนน&แลกคะแนน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/score') ?>">สร้างของขวัญ</a></li>
                                <li><a href="<?= site_url('AController/selectgiftbox') ?>">ตรวจสอบการแลก</a></li>
                            </ul>
                        </li>

                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-file-text" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">รายงาน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/procress') ?>">สรุปยอดขายรายวัน</a></li>
                                <li><a href="<?= site_url('AController/report_position') ?>">ส่วนลดยอดสั่งชื้อ</a></li>
                                <li><a href="<?= site_url('AController/reportgrouplineup') ?>">รายได้ All Sale</a></li>
                                <li><a href="<?= site_url('AController/report_month') ?>">รายงานยอดรายเดือน</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-bullhorn" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">รีวิว&ศูนการเรียนรู้</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/category_blogs') ?>">ประเภท</a></li>
                                <li><a href="<?= site_url('AController/review') ?>">รีวิว & บล็อค</a></li>

                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-graduation-cap"
                                   style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คอร์สเรียน</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/course_manual') ?>">คู่มือ/การเรียนรู้</a></li>
                                <li><a href="<?= site_url('AController/course_sound') ?>">ไฟล์เสียงการสอน</a></li>

                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-database" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">คลังข้อมูล</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/gallary_promote') ?>">ภาพโปรโมท</a></li>
                                <li><a href="<?= site_url('AController/gallary_image') ?>">คลังรูป</a></li>
                                <li><a href="<?= site_url('AController/gallary_artwork') ?>">อาร์ทเวิร์ค</a></li>
                                <li><a href="<?= site_url('AController/gallary_caption') ?>">แคปชั่น</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="#" aria-haspopup="true">
                                <i class="fa fa-size fa-cogs" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">จัดการระบบ</span>
                                <i class="fa fa-angle-down"
                                   style="color: #000!important;font-size: 16px; float: right; margin-right: 10px; font-weight: bold; margin-top: 5px"></i>
                            </a>
                            <ul class="dropdown" aria-label="submenu">
                                <li><a href="<?= site_url('AController/order_discount') ?>">ส่วนการสั่งชื้อ</a></li>
                                <li><a href="<?= site_url('AController/amount_discount') ?>">ยอดสั่งชื้อ</a></li>
                                <li><a href="<?= site_url('AController/setting_lineup') ?>">โบนัสค่าแนะนำ</a></li>
                                <li><a href="<?= site_url('AController/allsale') ?>">All Sale</a></li>
                                <li><a href="<?= site_url('AController/linetoken') ?>">Line Token</a></li>
                                <li><a href="<?= site_url('AController/about_us') ?>">เกี่ยวกับเรา</a></li>
                                <li><a href="<?= site_url('AController/social') ?>">โซเซียล</a></li>
                                <li><a href="<?= site_url('AController/banner') ?>">แบนเนอร์</a></li>
                                <li><a href="<?= site_url('AController/company') ?>">ข้อมูลบริษัท</a></li>
                            </ul>
                        </li>
                        <li class="item-nave">
                            <a href="<?= site_url('AController/contact_us') ?>">
                                <i class="fa fa-size fa-comment" style="color: #000!important;font-size: 16px;"></i>
                                <span class="txt-span" style="font-size: 16px;">ติดต่อ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="right-content">