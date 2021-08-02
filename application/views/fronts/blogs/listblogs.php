<style>
    .blog-category {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        max-height: 700px;
    }

    .blog-content {

        padding: 10px;
    }
    .txt-blog-category {
        color: black;
    }
    ul{
        list-style: none outside none;
    }

    .btn-original {
        margin-top: 5%;
        border: 2px solid gainsboro;
        width: 100%;
        border-radius: 20px;
        margin-bottom: 5%;
        color: gainsboro;
    }

</style>
<div class="container">
    <div class="box-image" style="margin-top: 2%">
        <h6 style="margin-left: 1%">หน้าแรก > ศูนย์การเรียนรู้</h6>
        <div class="row" style="padding: 20px">
            <div class="col-md-3 blog-category display-website" style="height: inherit">
                <p style="font-size: 14px; font-weight: 200; margin-top: 5%">หมวดหมู่ความรู้</p>
                <ul>
                    <?php $bc = $this->FQueryView->get_blogcate();
                    foreach ($bc as $item){?>
                        <li><a href="" class="txt-blog-category"><?=$item->category_blog_name?></a></li>
                        <br>
                    <?php }?>
                </ul>
                <button class="btn btn-original"><i class="fa fa-search"></i> ค้นหา</button>

                <p style="font-size: 14px; font-weight: 900;">บทความล่าสุด</p>
                <div style="margin-bottom: 3% ">
                    <?php $blogsnew = $this->FQueryView->get_blogsnews();
                    foreach ($blogsnew as $o){?>
                        <div class="row" onclick="lerningdetail('<?=$o->blogs_id?>')">
                            <div class="col-md-4">
                                <div style="width: 100%; background-color: gainsboro; height: 60px">
                                    <img src="<?=base_url('images/blogs/'.$o->blogs_img)?>" style="width: 100%; height: 60px"/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p style="font-size: 10px; font-weight: bold; color: #fe0000;height: 6.0em;overflow: hidden;">
                                    <?=$o->blogs_content?> <br> <span style="color: black">
                                    <?=$o->blogs_description?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    <?php }?>

                    <hr style="background-color: #f8c6c7; border: 1px solid #f8c6c7">
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="row no-gutters">
                    <?php foreach ($blogs as $item){?>
                        <div class="col-md-4 col-6" onclick="lerningdetail('<?=$item->blogs_id?>');">
                            <div class="blog-content">
                                <div style="width: 100%; height: 150px; background-color: gainsboro">
                                    <img src="<?=base_url('images/blogs/'.$item->blogs_img)?>" style="width: 100%; height: 150px;"/>
                                </div>
                                <div style="padding-bottom : 3%!important;">
                                    <p style="padding: 5px; font-size: 10px; font-weight: bold; color: #fe0000;height: 6.3em;overflow: hidden; ">
                                        <?=$item->blogs_content?> <br> <span style="color: black">
                                       <?=$item->blogs_description?>
                                    </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                </div>
                <hr style="background-color: #f8c6c7; border: 1px solid #f8c6c7">
                <ul class="pagination">
                    <?=$links?>
                    <!--                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
                    <!--                    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                    <!--                    <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                    <!--                    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--                    <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>


<script>
    function lerningdetail(blogs_id) {
        location.href = "<?=site_url($this->uri->segment(1).'/lerningdetail?blogs_id=')?>"+blogs_id;
    }
</script>
