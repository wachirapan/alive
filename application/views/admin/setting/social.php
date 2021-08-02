<style>
    .margin-mobile {
        margin-top: 2%;
    }
    .widthsocial{
        width:250px; word-wrap:break-word;
    }
    @media only screen and (max-width: 600px) {
        .margin-mobile {
            margin-top: 5%;
        }
        .widthsocial{
            width:100%;
            word-wrap:break-word;
        }
    }
</style>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">โซเชียล</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td>
                                    <div style="width:40px; word-wrap:break-word;"><img
                                                src="<?= base_url('assets/icons/facebook.png') ?>"
                                                style="width: 100%; border-radius: 5px"/></div>
                                </td>
                                <td>
                                    <div class="widthsocial">
                                        <input type="text" class="form-control" id="facebook"
                                               value="<?= $this->AQueryView->get_sociallink(1); ?>"></div>
                                </td>
                                <td>
                                    <button class="btn btn-background" onclick="create_facebook();"><i
                                                class="fa fa-save"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>


                </div>
                <div class="col-md-12 margin-mobile">
                    <div class="table-responsive">
                    <table>
                        <tr>
                            <td>
                                <div style="width:40px; word-wrap:break-word;"><img
                                            src="<?= base_url('assets/icons/line.png') ?>"
                                            style="width: 100%; border-radius: 5px"/></div>
                            </td>
                            <td>
                                <div class="widthsocial">
                                    <input type="text" class="form-control" id="line"
                                           value="<?= $this->AQueryView->get_sociallink(2); ?>"></div>
                            </td>
                            <td>
                                <button class="btn btn-background" onclick="create_line();"><i class="fa fa-save"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="col-md-12 margin-mobile">
                    <div class="table-responsive">
                    <table>
                        <tr>
                            <td>
                                <div style="width:40px; word-wrap:break-word;"><img
                                            src="<?= base_url('assets/icons/instagram.png') ?>"
                                            style="width: 100%; border-radius: 5px"/></div>
                            </td>
                            <td>
                                <div class="widthsocial"><input type="text" class="form-control"
                                                                                       id="instagram"
                                                                                       value="<?= $this->AQueryView->get_sociallink(3); ?>">
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-background" onclick="create_instagram();"><i
                                            class="fa fa-save"></i></button>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="col-md-12 margin-mobile">
                    <div class="table-responsive">
                    <table>
                        <tr>
                            <td>
                                <div style="width:40px; word-wrap:break-word;"><img
                                            src="<?= base_url('assets/icons/youtube.png') ?>"
                                            style="width: 100%; border-radius: 5px"/></div>
                            </td>
                            <td>
                                <div class="widthsocial">
                                    <input type="text" class="form-control" id="youtube"
                                           value="<?= $this->AQueryView->get_sociallink(4); ?>"></div>
                            </td>
                            <td>
                                <button class="btn btn-background" onclick="create_youtube();"><i
                                            class="fa fa-save"></i></button>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function create_facebook() {
        if (confirm('ยิืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_facebook')?>", {
                facebook: $('#facebook').val()
            }, function () {
                location.reload();
            });
        }
    }
    function create_line() {
        if (confirm('ยิืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_line')?>", {
                line: $('#line').val()
            }, function () {
                location.reload();
            });
        }
    }
    function create_instagram() {
        if (confirm('ยิืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_instagram')?>", {
                instagram: $('#instagram').val()
            }, function () {
                location.reload();
            });
        }

    }
    function create_youtube() {
        if (confirm('ยิืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_youtube')?>", {
                youtube: $('#youtube').val()
            }, function () {
                location.reload();
            });
        }
    }
</script>