<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ติดต่อ สอบถาม</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <?php $headercontent = $this->AQueryView->get_question($_GET['question_id']);
                    foreach ($headercontent as $item) {
                        ?>
                        <div class="card mb-4">
                            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                                <p style="color: white"><?= $item->question_content ?> <span
                                            style="float: right; margin-right: 20px"><?= $item->question_date ?></span>
                                </p>
                            </div>
                            <div class="row" style="padding: 20px">
                                <div class="col-md-12">
                                    <?= $item->question_detail ?>
                                </div>
                                <?php $ans = $this->AQueryView->get_answer_question($_GET['question_id']);
                                foreach ($ans as $o) {
                                    ?>
                                    <div class="col-md-12">
                                        <?= $o->answer_question_detail ?>
                                    </div>
                                <?php } ?>

                            </div>

                        </div>
                    <?php } ?>
                    <a href="<?= site_url('AController/answer_contact?question_id=' . $_GET['question_id']) ?>">
                        <button class="btn btn-background">ตอบกลับ</button>

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

