<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">อาร์ทเวิร์ค</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div style="border: solid 1px; height: 150px; width: 150px; margin: auto;" id="boximage">
                            <img id="output" width="150px" height="150px"/>
                        </div>
                        <div class="form-group">
                            <label>รูปภาพ (512 x 512)</label>
                            <input type="hidden" id="review_picture" name="review_picture">
                            <input type="file" class="form-control" id="picture_header" onchange="loadFile(event)"
                                   accept="image/*">
                            <script>
                                var loadFile = function (event) {
                                    $('#boximage').show();
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                                $("input#picture_header:file").change(function (e) {
                                    sendFile2(e.target.files[0]);
                                });
                                function sendFile2(file) {
                                    var data = new FormData();
                                    data.append("file", file);
                                    $.ajax({
                                        url: "<?php echo site_url('UploadImage/upload_gallary')?>",
                                        data: data,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: 'JSON',
                                        type: "POST",
                                        success: function (data) {
                                            console.log(data);
                                            if (typeof data.success !== "undefined") {
                                                var url_picture = data.success.file_name;
                                                $('#review_picture').val(url_picture);
                                            }
                                            if (typeof data.error !== "undefined") {
                                                $("div#error-box-header").removeClass("display-hide");
                                                $("div#error-box-header p").html(data.error);
                                            }
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            console.log(textStatus + " " + errorThrown);
                                        }
                                    });
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <label>เนื้อหา</label>
                            <input type="text" class="form-control" id="txt_content">
                        </div>
                        <div class="form-group">
                            <label>ลิ้ง</label>
                            <input type="text" class="form-control" id="linkcourse">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-background" id="btn-create" onclick="create_course();"><i
                                        class="fa fa-save"></i> บันทึกข้อมูล
                            </button>
                            <button class="btn btn-nonbackground" id="btn-update" onclick="confirm_update();"><i
                                        class="fa fa-save"></i> บันทึกข้อมูล
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">เนื้อหา</td>
                                    <td scope="col">ลิ้ง</td>
                                    <td scope="col">จัดการ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($gallary as $item) { ?>
                                    <tr>
                                        <td class="text-nowrap"><img src="<?=base_url('images/gallary/'.$item->gallary_img)?>" style="width: 50px; height: 50px; border-radius: 50%"></td>
                                        <td class="text-nowrap"><?= $item->gallary_content ?></td>
                                        <td class="text-nowrap"><?= $item->gallary_link ?></td>
                                        <td class="text-nowrap"><i class="fa fa-ellipsis-h fa-lg dropdown" data-toggle="dropdown"
                                               aria-haspopup="true"
                                               aria-expanded="false">
                                                <div class="dropdown-menu" aria-labelledby="dLabel">
                                                    <a class="dropdown-item" onclick="setedit(
                                                            '<?= $item->gallary_id ?>','<?= $item->gallary_link ?>',
                                                            '<?= $item->gallary_content ?>','<?=$item->gallary_img?>'
                                                            );">แก้ไข</a>
                                                    <a class="dropdown-item" onclick="del_link('<?= $item->gallary_id ?>'
                                                            ,'<?=$item->gallary_img?>');">ลบ</a>
                                                </div>
                                            </i></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?=$links?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="gallary_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_course() {
        if ($('#txt_content').val() == '' || $('#tearcher').val() == '' || $('#linkcourse').val() == '') {
            alert('กรุณากรอกข้อมูลให้ครบด้วยค่ะ');
        } else {
            if (confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')) {
                $.post("<?=site_url('AInsertData/create_gallary')?>", {
                    content: $('#txt_content').val(),
                    link: $('#linkcourse').val(),
                    status: 'artwork',
                    image : $('#review_picture').val()
                }, function () {
                    location.reload();
                });
            }
        }

    }
    function setedit(gallary_id, gallary_link, gallary_content, image) {
        $("#gallary_id").val(gallary_id);
        $('#txt_content').val(gallary_content);
        $('#linkcourse').val(gallary_link);
        $('#review_picture').val(image);
        $('#output').attr('src',"<?=base_url('images/gallary/')?>"+image);

        $('#btn-update').show();
        $('#btn-create').hide();

    }
    function confirm_update() {
        if (confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_gallary')?>", {
                gallary_id : $("#gallary_id").val(),
                content: $('#txt_content').val(),
                link: $('#linkcourse').val(),
                image : $('#review_picture').val()
            }, function () {
                location.reload();
            });
        }
    }
    function del_link(gallary_id, image) {
        if(confirm('ยืนยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_gallary')?>",{
                gallary_id : gallary_id,
                image : image
            },function () {
                location.reload();
            });
        }
    }
</script>
