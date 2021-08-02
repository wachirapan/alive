<style>
    .widgetmobile{
        width: 100%; background-color: #fcabb9; padding-top: 1px; padding-left: 2%;
    }
    @media only screen and (max-width: 700px) {
        .widgetmobile{
            width: 100%; background-color: #fcabb9; padding-top: 1px; padding-left: 2%;
            margin-top: 3%;
        }
    }
</style>
    <div class="row mb-3">
        <?php $learn_online = $this->BQueryView->learn_online();
        foreach ($learn_online as $item) {
            ?>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                        <p style="color: white">Online Bussiness <?= $item->learn_Instructor ?></p>
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-md-12" style="margin-bottom: 2%">
                            <div class="row">
                                <div class="col-md-3">
                                    <form id="onlinecourse" method="post" action="<?=site_url('WBackend/by_onlinecourse')?>">
                                        <select class="form-control" name="instructor" id="instructor" onchange="seachbythis();">
                                            <option value=""> เลือกคลิปจากผู้สอน </option>
                                            <?php $learn_online = $this->BQueryView->learn_online();
                                            foreach ($learn_online as $item) {
                                                ?>
                                                <option value="<?=$item->learn_Instructor?>"> <?=$item->learn_Instructor?> </option>
                                            <?php }?>
                                        </select>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="text-center">
                                <div style="width: 100%; height: 250px; background-color: #fcabb9">
                                    <iframe style="width: 100%; height: 100%" frameborder="0" allowfullscreen
                                            src="<?= $this->BQueryView->get_videoone($item->learn_Instructor); ?>">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="row">
                                <?php $leason = $this->BQueryView->leasononline($item->learn_Instructor);
                                foreach ($leason as $o) {
                                    ?>
                                    <div class="col-md-12" onclick="showvideo('<?=$o->learn_link?>');" style="cursor: pointer">
                                        <div class="widgetmobile">
                                            <p style="color: white; font-size: 12px; font-weight: bold"><?= $o->learn_content ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<script>
    function showvideo(link) {
        $('#video-frame').attr('src','https://www.youtube.com/embed/'+link);
        $('#myModal').modal('toggle');
    }
    function seachbythis() {
        if($("#instructor").val() != ''){
            $('#onlinecourse').submit();

        }else{
            location.href = "<?=site_url('Backend/online_course')?>";
        }
    }
</script>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <iframe style="width: 100%; height: 100%" id="video-frame" frameborder="0" allowfullscreen>
                </iframe>
            </div>

        </div>
    </div>
</div>