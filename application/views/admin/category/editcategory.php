<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ประเภทสินค้า</p>
            </div>
            <div class="row" style="padding: 30px">
                <?php $category = $this->db->select('*')->from('category')->where('category_id', $_GET['category_id'])
                    ->get()->result();
                foreach ($category as $item) {
                    ?>
                    <input type="hidden" id="category_id" value="<?= $item->category_id ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="border: solid 1px; height: 150px; width: 150px; margin: auto;border-radius: 5%; "
                                 id="boximage">
                                <img id="output" width="150px" height="150px"
                                     src="<?= base_url('images/category/' . $item->category_image) ?>" style="width: 100%"/>
                            </div>
                            <div class="form-group">
                                <label>รูปภาพ (512 x 512)</label>
                                <input type="hidden" id="review_picture" name="review_picture"
                                       value="<?= $item->category_image ?>">
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
                                            url: "<?php echo site_url('UploadImage/upload_category')?>",
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
                                <label>ชื่อกลุ่มสินค้า</label>
                                <input type="text" class="form-control" id="category_name"
                                       value="<?= $item->category_name ?>">
                            </div>
                            <div class="form-group">
                                <label>ประเภทสินค้า</label>
                                <input type="text" class="form-control" id="category_subname"
                                       value="<?= $item->category_subname ?>">
                            </div>
                            <div class="form-group">
                                <label>รายละเอียด อย.</label>
                                <textarea id="seraillab" name="seraillab" required><?= $item->category_seraillab ?></textarea>
                                <script>
                                    $(document).ready(function () {
                                        $('#seraillab').summernote({
                                            height: 350,
                                            callbacks: {
                                                onImageUpload: function (files, editor, $editable) {
                                                    sendFile1(files[0], this, $editable);
                                                },
                                                onPaste: function (e) {
                                                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                                                    e.preventDefault();
                                                    document.execCommand('insertText', false, bufferText);
                                                }
                                            }
                                        });
                                        function sendFile1(file, editor, welEditable) {
                                            var data = new FormData();
                                            data.append("file", file);
                                            $.ajax({
                                                url: "<?php echo site_url('UploadImage/product_detail')?>",
                                                data: data,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                dataType: "JSON",
                                                type: "POST",
                                                success: function (data) {
                                                    if (typeof data.success !== "undefined") {
                                                        ed = $("#seraillab").summernote('insertImage', "<?php echo base_url()?>images/product_detail/" + data.success.file_name, function ($image) {
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
                                </script>
                            </div>
                            <div class="form-group">
                                <label>รายละเอียด</label>
                                <textarea id="editor" name="editor" required><?= $item->category_detail ?></textarea>
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
                                                url: "<?php echo site_url('UploadImage/product_detail')?>",
                                                data: data,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                dataType: "JSON",
                                                type: "POST",
                                                success: function (data) {
                                                    if (typeof data.success !== "undefined") {
                                                        ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/product_detail/" + data.success.file_name, function ($image) {
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
                                </script>
                            </div>
                            <button class="btn btn-background" id="btn-create" onclick="update_category();"><i
                                        class="fa fa-save"></i>
                                จัดเก็บ
                            </button>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<script>
    function update_category() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_category')?>", {
                category_id: $('#category_id').val(),
                review_picture: $('#review_picture').val(),
                category_name: $("#category_name").val(),
                seraillab: $('#seraillab').summernote('code'),
                editor: $('#editor').val(),
                category_subname : $("#category_subname").val()
            }, function () {
                location.href = "<?=site_url('AController/listcategory')?>"
            });
        }
    }
</script>