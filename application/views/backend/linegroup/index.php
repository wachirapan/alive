<style>
    .img-line {
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

    .form-check-input {
        width: 15px;
        height: 15px;
        margin-top: -7px;
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">Line Group</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="text-center">
                        <h6>เลือก Line Group ของท่านเพื่อเข้ารับข้อมูลข่าวสารทาง Alive Dropship ได้เพียง 1
                            กลุ่มเท่านั้น</h6>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <?php foreach ($linegroup as $item) {
                                ?>
                                <tr>
                                    <td width="10px">
                                        <?php if ($this->BQueryView->checklinegroup() == $item->linetoken_id) { ?>
                                            <div class="form-check" style="margin-top: 25px">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="chk[]"
                                                           onclick="addlinetoken('<?= $item->linetoken_id ?>');"
                                                           checked>
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check" style="margin-top: 25px">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="chk[]"
                                                           onclick="addlinetoken('<?= $item->linetoken_id ?>');">
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td><img src="<?= base_url('images/linetoken/' . $item->linetoken_img) ?>"
                                             class="img-line" onclick="showqrcode('<?= $item->linetoken_img ?>');">
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function addlinetoken(linetoken_id) {

        $.post("<?=site_url('BInsertData/grouplinetoken')?>",
            {
                lineid: linetoken_id
            },
            function () {
                location.reload();
            });

    }
    function showqrcode(img) {
        $('#image-qr').attr("src", "<?=base_url('images/linetoken/')?>" + img);
        $('#myModal').modal('toggle');
    }
</script>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">


            <!-- Modal body -->
            <div class="modal-body">
                <img id="image-qr" style="width: 100%">
            </div>


        </div>
    </div>
</div>