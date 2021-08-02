<style>
    .blog-category {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        max-height: 700px;
    }

    .blog-content {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    ul{
        list-style: none outside none;
    }
    .txt-blog-category {
        color: black;
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
                        <div class="row">
                            <div class="col-md-4">
                                <div style="width: 100%; background-color: gainsboro; height: 60px">
                                    <img src="<?=base_url('images/blogs/'.$o->blogs_img)?>" style="width: 100%; height: 60px"/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p style="font-size: 10px; font-weight: bold; color: #273F89;height: 6.0em;overflow: hidden;">
                                    <?=$o->blogs_content?> <br> <span style="color: black">
                                    <?=$o->blogs_description?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    <?php }?>
                    <hr style="background-color: #273F89; border: 1px solid #273F89">
                </div>

            </div>
            <div class="col-md-9">
                <?php $blog = $this->FQueryView->blogsdetail($_GET['blogs_id']);
                foreach ($blog as $item){?>
                    <div class="blog-content">
                        <div style="width: 100%; height: 250px; background-color: gainsboro">
                            <img src="<?=base_url('images/blogs/'.$item->blogs_img)?>" style="width: 100%; height: 250px;"/>
                        </div>
                        <div style="padding: 10px">
                            <h6><?=$item->blogs_content?></h6>
                            <p style="font-size: 10px"> <?=$item->blogs_create?></p>
                            <p><?=$item->blogs_description?></p>
                        </div>
                        <!--                    <div style="width: 100%; height: 250px; background-color: gainsboro"></div>-->
                        <div style="padding: 10px">
                            <p><?=$item->blogs_detail?></p>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>



