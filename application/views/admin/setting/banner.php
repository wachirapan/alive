<style>
    @media only screen and (max-width: 600px) {
        .margin-mobile {
            margin-top: 2% !important;
        }
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">แบนเนอร์</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div style=" height: 150px; width: 100%; margin: auto; " id="boximage">
                            <img id="output" width="100%" height="150px"/>
                        </div>
                        <div class="form-group">
                            <label>รูปภาพ </label>
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
                                        url: "<?php echo site_url('UploadImage/upload_banner')?>",
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
                            <label>link</label>
                            <input type="text" class="form-control" id="link">
                        </div>
                        <button class="btn btn-background" id="btn-create" onclick="create_banners();"><i class="fa fa-save"></i>
                            บันทึก
                        </button>
                        <button class="btn btn-nonbackground" id="btn-update" onclick="update_banner();"><i class="fa fa-save"></i> บันทึก</button>
                    </div>
                    <div class="col-md-8 margin-mobile">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($banner as $item) { ?>
                                    <tr >
                                        <td class="text-nowrap"><img src="<?= base_url('images/banner/' . $item->banner_img) ?>" style="width: 50%">
                                        </td>
                                        <td class="text-nowrap">
                                            <i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                '<?=$item->banner_id?>','<?=$item->banner_link?>','<?=$item->banner_img?>'
                                                );"></i>
                                        </td>
                                        <td class="text-nowrap">
                                            <i class="fa fa-trash fa-lg" onclick="deletedata(
                                                '<?=$item->banner_id?>'
                                                );" style="color: red"></i>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?= $links ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<input type="hidden" id="banner_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_banners() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_banner')?>", {
                review_picture: $("#review_picture").val(),
                link: $("#link").val()
            }, function () {
                location.reload();
            });
        }
    }
    function setedit(banner_id, banner_link, banner_img) {
        var path = "<?=base_url('images/banner/')?>";
        $('#banner_id').val(banner_id);
        $('#link').val(banner_link);
        $('#review_picture').val(banner_img);
        $('#output').attr('src', path+banner_img);
        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_banner() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_banner')?>", {
                banner_id : $('#banner_id').val(),
                review_picture: $("#review_picture").val(),
                link: $("#link").val()
            }, function () {
                location.reload();
            });
        }
    }
    function deletedata(banner_id) {
        if(confirm('ยินยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_banner')?>",{
                banner_id : banner_id
            },function () {
                location.reload();
            });
        }
    }
</script>