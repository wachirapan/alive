
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">สร้างรีวิว</p>
                </div>
                <?php $editreview = $this->AQueryView->edit_review($_GET['blogs_id']);
                foreach ($editreview as $item){?>
                    <div class="row" style="padding: 20px">
                        <div class="col-md-12" style="margin-top: 2%">
                            <div style="border: solid 1px; height: 150px; width: 150px; margin: auto;border-radius: 5%; " id="boximage">
                                <img id="output" width="150px" height="150px" src="<?=base_url('images/blogs/'.$item->blogs_img)?>"/>
                            </div>
                            <div class="form-group">
                                <label>รูปภาพ </label>
                                <input type="hidden" id="review_picture" name="review_picture" value="<?=$item->blogs_img?>">
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
                                            url: "<?php echo site_url('UploadImage/upload_blogs')?>",
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
                                <label>ประเภทข่าวสาร</label>
                                <select class="form-control" id="category" onchange="create_category();">
                                    <option value="<?=$item->category_blog_id?>" selected><?=$item->category_blog_name?></option>
                                    <option value="สร้างหัวข้อ">สร้างหัวข้อ</option>
                                    <?php $category = $this->AQueryView->category_blogs();
                                    foreach ($category as $o) {
                                        ?>
                                        <option value="<?= $o->category_blog_id ?>"><?= $o->category_blog_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>หัวข้อรีวิว</label>
                                <input type="text" class="form-control" id="content_header" value="<?=$item->blogs_content?>">
                            </div>
                            <div class="form-group">
                                <label>เกริ่นนำ</label>
                                <input type="text" class="form-control" id="content_detail" value="<?=$item->blogs_description?>">
                            </div>
                            <div class="form-group">
                                <label>รายละเอียด</label>
                                <textarea id="editor" name="editor" required><?=$item->blogs_detail?></textarea>
                            </div>
                            <button class="btn btn-background" onclick="create_product();"><i class="fa fa-save"></i> จัดเก็บข้อมูล</button>

                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

<input type="hidden" id="blogs_id" value="<?=$_GET['blogs_id']?>">
<script>
    $(document).ready(function () {
        $('#editor').summernote({
            height: 350,
            callbacks: {
                onImageUpload: function (files, editor, $editable) {
                    sendFile(files[0], this, $editable);
                },
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
        function sendFile(file, editor, welEditable) {
            var data = new FormData();
            data.append("file", file);
            $.ajax({
                url: "<?php echo site_url('UploadImage/blogs_detail')?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                type: "POST",
                success: function (data) {
                    if (typeof data.success !== "undefined") {
                        ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/blogs_detail/" + data.success.file_name, function ($image) {
                        });
                        $("div#error-box").addClass("display-hide");
                    }
                    if (typeof data.error !== "undefined") {
                        $("div#error-box").removeClass("display-hide");
                        $("div#error-box p").html(data.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + " " + errorThrown);
                }
            });
        }
    });
    function create_product() {
        if (confirm('ยินยันการจัดเก็บข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_blogs')?>",{
                blogs_id : $("#blogs_id").val(),
                review_picture : $('#review_picture').val(),
                category : $('#category').val(),
                content : $('#content_header').val(),
                content_detail : $("#content_detail").val(),
                editor : $('#editor').val()
            },function () {
                location.href = "<?=site_url('AController/review')?>";
            });
        }

    }

    function create_category() {
        if($("#category").val() == 'สร้างหัวข้อ'){
            $('#formcategory').modal('toggle');
        }
    }
    function comfirmcreate() {
        if(confirm('ยืนยันการสร้างข้อมุลนี้หรือไม่')){
            $.getJSON("<?=site_url('AInsertData/create_category_blogs?blogs=')?>"+$('#category_blogs').val(),
                function (data) {
                    $('#category').append('<option value="'+data+'" selected>'+$('#category_blogs').val()+'</option>');
                });
        }
    }
</script>

<!-- The Modal -->
<div class="modal" id="formcategory">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title">Modal Heading</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--            </div>-->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h4>ประเภทข่าวสาร</h4>
                </div>
                <div class="form-group">
                    <label>กลุ่มข่าสาร</label>
                    <input type="text" class="form-control" id="category_blogs">
                </div>
                <button class="btn btn-primary" onclick="comfirmcreate();" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก</button>
            </div>

            <!-- Modal footer -->
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            <!--            </div>-->

        </div>
    </div>
</div>