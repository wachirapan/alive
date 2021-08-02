<div id="demo" class="carousel slide carousel-website" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <?php $banner = $this->FQueryView->get_banner();
        $count = 0;
        foreach ($banner as $item) {
            if ($count == 0) {
                ?>
                <li data-target="#demo" data-slide-to="<?= $count ?>" class="active"></li>
            <?php } else {
                ?>
                <li data-target="#demo" data-slide-to="<?= $count ?>"></li>

            <?php }
            $count++;
        } ?>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <?php $banner = $this->FQueryView->get_banner();
        $row = 0;
        foreach ($banner as $item){
        if ($row == 0){
        ?>
        <div class="carousel-item active">
            <?php }else{
            ?>
            <div class="carousel-item">
                <?php } ?>
                <img src="<?= base_url('images/banner/' . $item->banner_img) ?>" width="100%">
            </div>
            <?php $row++;
            } ?>
            <!--        <div class="carousel-item">-->
            <!--            <img src="--><? //= base_url('assets/fronts/images/banner2.png') ?><!--" width="100%">-->
            <!--        </div>-->

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<div class="container">
    <div style="margin-top: 2%">
        <div class="text-center">
            <h1 style="font-weight: 700">FEATUES</h1>
            <hr style="border: 2px solid #f7a4b2; background-color: #f7a4b2; width: 50px; margin-top: 5px">
            <p class="mobile-scale sub-font">Digital Marketing agency Landing Page Design By
                Mithun.<br/>
                Connect with them On Dribble</p>
        </div>
        <div class="row no-gutters">
            <div class="col-md-3 col-6">
                <img src="<?= base_url('assets/images/1cate.png') ?>" class="image-featues">
            </div>
            <div class="col-md-3 col-6">
                <img src="<?= base_url('assets/images/2cate.png') ?>" class="image-featues">
            </div>
            <div class="col-md-3 col-6">
                <img src="<?= base_url('assets/images/3cate.png') ?>" class="image-featues">
            </div>
            <div class="col-md-3 col-6">
                <img src="<?= base_url('assets/images/4cate.png') ?>" class="image-featues">
            </div>
        </div>
    </div>
</div>

<div class="display-website" style="background-color: #fffafb; padding: 10px ; margin-top: 2%">
    <div class="container ">
        <div class="text-center">
            <h1 style="margin-top: 2%;font-weight: 700">NEWS</h1>
            <hr style="border: 2px solid #f7a4b2; background-color: #f7a4b2; width: 50px; margin-top: -5px">
            <p class="mobile-scale sub-font">Digital Marketing agency Landing Page Design By
                Mithun.<br/>
                Connect with them On Dribble</p>
        </div>
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row no-gutters">
                        <?php $blogs = $this->FQueryView->blogsview();
                        foreach ($blogs as $item) { ?>
                            <div class="col-md-4" onclick="gotodetailnews('<?= $item->blogs_id ?>');">
                                <div style="padding: 7px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?= base_url('images/blogs/' . $item->blogs_img) ?>"
                                                 style="width: 100%;">
                                        </div>
                                    </div>
                                    <div style="margin-top: 3%"></div>
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <div class="text-center"
                                                 style="background-color: #f7a4b2; color: whitesmoke; padding: 1px">
                                                <h6><?php $date = date_create($item->blogs_create);
                                                    echo date_format($date, "d") . '<br/>';
                                                    echo $this->FQueryView->setmontheng(date_format($date, "m")); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-9" style="margin-left: 2%">
                                            <p style="font-size: 9px; font-weight: 900"><?= $item->blogs_content ?>
                                                <br/><span
                                                        style="color: grey"><?= $item->blogs_description ?></span><br/><span
                                                        style="color: grey"> - READ MORE</span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row no-gutters">
                        <?php $blogs = $this->FQueryView->blogsview();
                        foreach ($blogs as $item) { ?>
                            <div class="col-md-4" onclick="gotodetailnews('<?= $item->blogs_id ?>');">
                                <div style="padding: 7px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?= base_url('images/blogs/' . $item->blogs_img) ?>"
                                                 style="width: 100%;">
                                        </div>
                                    </div>
                                    <div style="margin-top: 3%"></div>
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <div class="text-center"
                                                 style="background-color: #f7a4b2; color: whitesmoke; padding: 1px">
                                                <h6><?php $date = date_create($item->blogs_create);
                                                    echo date_format($date, "d") . '<br/>';
                                                    echo $this->FQueryView->setmontheng(date_format($date, "m")); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-9" style="margin-left: 2%">
                                            <p style="font-size: 9px; font-weight: 900"><?= $item->blogs_content ?>
                                                <br/><span
                                                        style="color: grey"><?= $item->blogs_description ?></span><br/><span
                                                        style="color: grey"> - READ MORE</span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row no-gutters">
                        <?php $blogs = $this->FQueryView->blogsview();
                        foreach ($blogs as $item) { ?>
                            <div class="col-md-4" onclick="gotodetailnews('<?= $item->blogs_id ?>');">
                                <div style="padding: 7px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?= base_url('images/blogs/' . $item->blogs_img) ?>"
                                                 style="width: 100%;">
                                        </div>
                                    </div>
                                    <div style="margin-top: 3%"></div>
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <div class="text-center"
                                                 style="background-color: #f7a4b2; color: whitesmoke; padding: 1px">
                                                <h6><?php $date = date_create($item->blogs_create);
                                                    echo date_format($date, "d") . '<br/>';
                                                    echo $this->FQueryView->setmontheng(date_format($date, "m")); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-9" style="margin-left: 2%">
                                            <p style="font-size: 9px; font-weight: 900"><?= $item->blogs_content ?>
                                                <br/><span
                                                        style="color: grey"><?= $item->blogs_description ?></span><br/><span
                                                        style="color: grey"> - READ MORE</span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <div style="margin: auto;">
            <div class="text-center">
                <a href="<?= site_url($this->uri->segment(1).'/blogs') ?>">
                    <button class="btn btn-background" style=" height: 40px; font-weight: bold">READ
                        MORE
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function gotodetailnews(blogs_id) {
        location.href = "<?=site_url($this->uri->segment(1).'/lerningdetail?blogs_id=')?>"+blogs_id;
    }
</script>
<style>
    .scroll-container {
        white-space: nowrap;
        padding: 5px 70px 5px 20px;
        background: transparent;
        border-radius: 15px;
        overflow-y: hidden;
    }

    .gridscroll {
        display: inline-block;
    }

    .gridscroll div {
        margin-right: 1px;
    }

    .text-news {
        width: 100%;
        height: 100px;
        line-height: 20px;
        word-break: break-all;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -moz-box-orient: vertical;
        -ms-box-orient: vertical;
        box-orient: vertical;
        -webkit-line-clamp: 5;
        -moz-line-clamp: 5;
        -ms-line-clamp: 5;
        line-clamp: 5;
        overflow: hidden;
    }
</style>
<div class="display-mobile" style="margin: 20px">
    <div class="text-center" style="padding-top: 10px">
        <h1 style="margin-top: 2%;font-weight: 700">NEWS</h1>
        <hr style="border: 1px solid #f7a4b2; background-color: #f7a4b2; width: 70px; margin-top: -5px">
        <p class="mobile-scale sub-font">Digital Marketing agency Landing
            Page Design By Mithun.
            Connect with them On Dribble</p>
    </div>
</div>
<div class="container display-mobile" style="background-color: #fffafb; overflow: auto">
    <div class="scroll-container" style="margin-top: -30px">
        <div class="gridscroll">
            <!-- PLACE YOUR IMG URL HERE -->
            <?php $blogs = $this->FQueryView->blogsview();
            foreach ($blogs as $item) {
                ?>
                <div style="display: inline-block ; width: 300px; height: 300px"
                     onclick="gotodetailnews('<?= $item->blogs_id ?>');">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-12">
                            <img src="<?= base_url('images/blogs/' . $item->blogs_img) ?>" style="width: 100%">
                        </div>
                        <div class="col-md-3 col-3">
                            <div class="text-center" style="width: 100%; height: 50px;
                        background-color: #f7a4b2; color: whitesmoke;margin-top: 5%; border-radius: 0 0 5px 5px">
                                <p><?php $date = date_create($item->blogs_create);
                                    echo date_format($date, "d") . '<br/>';
                                    echo $this->FQueryView->setmontheng(date_format($date, "m")); ?></>
                            </div>
                        </div>
                        <div class="col-md-9 col-8">
                            <p class="text-news"><?= $item->blogs_content ?><br/><span
                                        style="color: grey"><?= $item->blogs_description ?></span></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>
<div class="text-center display-mobile" style=" background-color: #fffafb">
    <a href="<?= site_url($this->uri->segment(1).'/blogs') ?>">
        <button class="btn btn-background" style="width: 250px; margin-bottom: 20px;">READMORE</button>
    </a>
</div>


<div class="text-center" style="margin-top: 30px">
    <h1 style="font-weight: 700">PRODUCT</h1>
    <hr style="border: 1px solid #f7a4b2; background-color: #f7a4b2; width: 50px; margin-top: -5px">
    <p class="mobile-scale sub-font">Digital Marketing agency Landing Page Design By Mithun.<br/>
        Connect with them On Dribble</p>
</div>
<?php $category = $this->FQueryView->getCategory();
$crow = 1 ;
foreach ($category as $item){
    if(($crow % 2) != 0){?>
<div class="container display-website box-image" style="margin-top: 2%; background-color: #fffafb; width: 80%">
    <div class="row no-gutters" style="padding: 30px">
        <div class="col-md-6">
            <img src="<?= base_url('images/category/'.$item->category_image) ?>" style="width: 100%">
        </div>
        <div class="col-md-6">
            <h1 style="font-weight: 700" class="mobile-mode-center"><?=$item->category_name?></h1>
            <p style="margin-top: -12px; color: grey"><span class="ping mobile-mode-center" style="font-size: 20px"><?=$item->category_subname?></span><br><br>
                <?=$item->category_seraillab?>
            </p>

            <a href="<?= site_url($this->uri->segment(1).'/productdetail?category='.$item->category_id ) ?>">
                <button class="btn btn-background" style="font-size: 16px; width: 100px; height: 40px; font-weight: bold">สั่งชื้อ</button>
            </a>
        </div>
    </div>
</div>
<?php }else{?>
<div class="container display-website  box-image" style="margin-top: 1%; background-color: #fffafb;  width: 80%">
    <div class="row no-gutters" style="padding: 30px">
        <div class="col-md-6">
            <h1 style="font-weight: 700" class="mobile-mode-center"><?=$item->category_name?></h1>
            <p style="margin-top: -12px; color: grey"> <span class="ping mobile-mode-center" style="font-size: 20px"><?=$item->category_subname?></span><br> <br>
                <?=$item->category_seraillab?>
            </p>
            <a href="<?= site_url($this->uri->segment(1).'/productdetail?category='.$item->category_id ) ?>">
                <button class="btn btn-background" style="font-size: 16px; width: 100px; height: 40px; font-weight: bold">สั่งชื้อ</button>
            </a>
        </div>

        <div class="col-md-6">
            <img src="<?= base_url('images/category/'.$item->category_image) ?>" style="width: 100%">
        </div>
    </div>
</div>
<?php }$crow++ ; }?>

<!--MOBILE-->
<?php $category = $this->FQueryView->getCategory();

foreach ($category as $item){?>
<div class="container display-mobile" style=" background-color: #fffafb; margin-top: -20px">
    <div style="padding: 20px">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <img src="<?= base_url('images/category/'.$item->category_image) ?>" style="width: 100%">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 5%">
                <h2 align="center"><?=$item->category_name?></h2>
                <p class="ping" style="font-size: 14px;text-align: center; margin-top: -10px">
                    <?=$item->category_subname?></p>
                <div style="padding-left: 5%; padding-right: 5%">
                    <p style="font-size: 12px; color: grey"><?=$item->category_seraillab?>
                    </p>
                    <div class="text-center">
                        <a href="<?= site_url($this->uri->segment(1).'/productdetail?category='.$item->category_id ) ?>">
                            <button class="btn btn-background" style="width: 100%">
                                สั่งชื้อ
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>

<!--MOBILE-->

<style>
    .border-register{
        margin: 20px;
    }
    @media only screen and (max-width: 700px) {
        .border-register{
            margin: 5px;
        }
    }
</style>
<div style="background-color: #fffafb; margin-top: 3%">
    <div class="text-center" style="padding-top: 2%">
        <h2  style="font-weight: 700">ระบบตัวแทนจำหน่ายแบบ <br/> DROPSHIP</h2>
        <hr style="border: 2px solid #f7a4b2; background-color: #f7a4b2; width: 50px; margin-top: -5px">
        <p class="mobile-scale sub-font">3 ขั้นตอนง่าย ๆ ในการสมัครเป็นตัสแทนกับเรา</p>
    </div>

    <div class="container">
        <div style=" display: flex; justify-content: center; align-items: center;">
            <div class="border-register" >
                <img src="<?= base_url('assets/images/step1.png') ?>" style="width: 100%">
            </div>
            <div class="border-register" >
                <img src="<?= base_url('assets/images/step2.png') ?>" style="width: 100%">
            </div>
            <div class="border-register">
                <img src="<?= base_url('assets/images/step3.png') ?>" style="width: 100%">
            </div>
        </div>
    </div>
    <div class="text-center" style="margin-top: 1%">
        <h2 style="font-weight: 700">เริ่มธุรกิจไปกับเรา</h2>
        <hr style="border: 2px solid #f7a4b2; background-color: #f7a4b2; width: 70px; margin-top: -5px">
        <p class="mobile-scale sub-font">เรามี Digital Content ทุกช่องทาง รวมถึง Ads โฆษณาต่าง ๆ ในรูปแบบ Online Marketing</p>
    </div>

    <div class="container">
        <div style=" display: flex; justify-content: center; align-items: center;">
            <div class="border-register" >
                <img src="<?= base_url('assets/images/regis1.png') ?>" style="width: 100%">
            </div>
            <div class="border-register" >
                <img src="<?= base_url('assets/images/regis2.png') ?>" style="width: 100%">
            </div>
            <div class="border-register">
                <img src="<?= base_url('assets/images/regis3.png') ?>" style="width: 100%">
            </div>
        </div>
    </div>
    <div class="container">
        <div style=" display: flex; justify-content: center; align-items: center;">
            <div class="border-register" >
                <img src="<?= base_url('assets/images/regis4.png') ?>" style="width: 100%">
            </div>
            <div class="border-register" >
                <img src="<?= base_url('assets/images/regis5.png') ?>" style="width: 100%">
            </div>
            <div class="border-register" >
                <img src="<?= base_url('assets/images/regis6.png') ?>" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 2%; ">
        <div class="text-center">
            <p class="mobile-scale sub-font">สมัครตัวแทนเราได้ที่ด้านร่างนี้</p>
            <a href="<?= site_url($this->uri->segment(1).'/policy') ?>">
                <button class="btn btn-background btn-resiger">สมัครตัวแทน
                </button>
            </a>
        </div>
    </div>

</div>
<style>
    .btn-resiger{
        width: 30%;
    }
    @media only screen and (max-width: 700px) {
        .btn-resiger{
            width: 80%;
        }
    }
</style>



