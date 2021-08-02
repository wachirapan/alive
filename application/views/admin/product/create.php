<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dropzone/dropzone.min.css">
<script src="<?php echo base_url(); ?>vendor/dropzone/dropzone.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>
    .dropzone {
        background: #fff;
        border: 2px dashed #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .dz-message {
        color: #999;
    }

    .dz-message:hover {
        color: #464646;
    }

    .dz-message h3 {
        font-size: 200%;
        margin-bottom: 15px;
    }
    .dz-image img{
        width: 100%;
    }
    input {
        border-radius: 5px !important;
    }

    .box {
        margin: 5px;
    }
</style>


    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">สร้างสินค้า</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div id="content">
                                        <div id="my-dropzone" class="dropzone">
                                            <div class="dz-message">
                                                <h3>Drop files here</h3> or <strong>click</strong> to upload
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รายการสินค้า</label>
                                    <select class="form-control" id="category">
                                        <option value="เลือกรายการสินค้า">เลือกรายการสินค้า</option>
                                        <?php $category = $this->AQueryView->get_categry();
                                        foreach ($category as $item) {
                                            ?>
                                            <option value="<?= $item->category_id ?>"><?= $item->category_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อสินค้า</label>
                                    <input type="text" class="form-control" id="product_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>สรรพคุณ</label>
                                    <textarea id="editor2" name="editor2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>แพ็คเกจ</label>
                                    <input type="text" class="form-control" id="promotion">
                                </div>
                                <div class="form-group">
                                    <label>จำนวนของบรรจุภัณฑ์</label>
                                    <input type="text" class="form-control" id="queryty">
                                </div>
                                <div class="form-group">
                                    <label>จำนวนสินค้า</label>
                                    <input type="text" class="form-control" id="product_total">
                                </div>

                                <div class="form-group">
                                    <label>คะแนน</label>
                                    <input type="text" class="form-control" id="product_score">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ราคาทุน</label>
                                    <input type="text" class="form-control" id="cost_price">
                                </div>
                                <div class="form-group">
                                    <label>ราคาขาย</label>
                                    <input type="text" class="form-control" id="selling_price">
                                </div>
                                <div class="form-group">
                                    <label>กำไร</label>
                                    <input type="text" class="form-control" id="profit">
                                </div>
                                <div class="form-group">
                                    <label>ค่าขนส่ง</label>
                                    <input type="text" class="form-control" id="product_express">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea id="editor" name="editor" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-background" onclick="create_product();"><i class="fa fa-save"></i> จัดเก็บข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
        $('#editor2').summernote({
            height: 350,
            callbacks: {
                onImageUpload: function (files, editor, $editable) {
                    sendFile2(files[0], this, $editable);
                },
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
        function sendFile2(file, editor, welEditable) {
            var data = new FormData();
            data.append("file", file);
            $.ajax({
                url: "<?php echo site_url('UploadImage/product_properties')?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                type: "POST",
                success: function (data) {
                    if (typeof data.success !== "undefined") {
                        ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/product_properties/" + data.success.file_name, function ($image) {
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
    function create_product() {
        if (confirm('ยินยันการจัดเก็บข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_product')?>", {
                category: $('#category').val(),
                product_name: $('#product_name').val(),
                promotion : $('#promotion').val(),
                queryty : $('#queryty').val(),
                cost_price: $('#cost_price').val(),
                selling_price: $('#selling_price').val(),
                profit: $('#profit').val(),
                product_total: $('#product_total').val(),
                product_express: $("#product_express").val(),
                product_score: $('#product_score').val(),
                editor: $('#editor').val(),
                editor2 : $('#editor2').val()
            }, function () {
                location.href = "<?=site_url('AController/product')?>";
            });
        }

    }

    //dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "<?php echo site_url("dropzone/Admin/upload") ?>",
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        removedfile: function (file) {
            var name = file.name;

            $.ajax({
                type: "post",
                url: "<?php echo site_url("dropzone/Admin/remove") ?>",
                data: {file: name},
                dataType: 'html'
            });

            // remove the thumbnail
            var previewElement;
            return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
        },
        accept: function (file, done) {

            if (file.type != "image/jpeg") {
                alert('ไม่สามารถใช้รูป '+file.name+' นี้ได้ค่ะ');
                var name = file.name;

                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("dropzone/Admin/remove") ?>",
                    data: {file: name},
                    dataType: 'html'
                });

                // remove the thumbnail
                var previewElement;
                return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
            }
            else {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("dropzone/Admin/insertdb") ?>",
                    data: {nameimg: file.name},
                    dataType: 'html'
                });
                done();
            }
        },

        init: function () {
            var me = this;
            $.get("<?php echo site_url("dropzone/Admin/list_files") ?>", function (data) {
                // if any files already in server show all here
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        var mockFile = value;
                        me.emit("addedfile", mockFile);
                        me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>images/products/" + value.name);
                        me.emit("complete", mockFile);
                    });
                }
            });
        }
    });

</script>