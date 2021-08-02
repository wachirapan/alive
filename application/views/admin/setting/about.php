<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">เกี่ยวกับเรา</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <?php $about = $this->AQueryView->get_about();
                        if(count($about) == 0){?>
                            <div class="form-group">
                                <textarea id="editor" name="editor" required></textarea>
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
                                                url: "<?php echo site_url('UploadImage/about_us')?>",
                                                data: data,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                dataType: "JSON",
                                                type: "POST",
                                                success: function (data) {
                                                    if (typeof data.success !== "undefined") {
                                                        ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/about/" + data.success.file_name, function ($image) {
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
                        <?php }else{
                            foreach ($about as $item){?>
                                <input type="hidden" id="abount_id" value="<?=$item->abount_id?>">
                                <div class="form-group">
                                    <textarea id="editor" name="editor" ><?=$item->abount_detal?></textarea>
                                    <script>
                                        $(document).ready(function () {
                                            $('#editor').summernote({
                                                height: 550,
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
                                                    url: "<?php echo site_url('UploadImage/about_us')?>",
                                                    data: data,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    dataType: "JSON",
                                                    type: "POST",
                                                    success: function (data) {
                                                        if (typeof data.success !== "undefined") {
                                                            ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/about/" + data.success.file_name, function ($image) {
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
                            <?php } }?>
                        <button class="btn btn-background" onclick="create_about();"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    function create_about() {
        if(confirm('ยืนยันการบัยทึกข้อมูลนี้หรือไม่')){
            if($('#abount_id').val() == ''){
                $.post("<?=site_url('AInsertData/create_about')?>",{
                    editor : $('#editor').val()
                },function () {
                    location.reload();
                });
            }else{
                $.post("<?=site_url('AUpdateData/update_about')?>",{
                    abount_id : $('#abount_id').val(),
                    editor : $('#editor').val()
                },function () {
                    location.reload();
                });
            }
        }
    }
</script>

