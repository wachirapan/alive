<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ติดต่อ สอบถาม</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <textarea id="editor" name="editor" required></textarea>
                    </div>
                    <button class="btn btn-background" onclick="confirmcontact();"><i class="fa fa-save"></i> บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="question_id" value="<?= $_GET['question_id'] ?>">
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
                url: "<?php echo site_url('UploadImage/updateload_contact')?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                type: "POST",
                success: function (data) {
                    if (typeof data.success !== "undefined") {
                        ed = $("#editor").summernote('insertImage', "<?php echo base_url()?>images/contactus/" + data.success.file_name, function ($image) {
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
    function confirmcontact() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_ans_contact')?>", {
                question_id: $("#question_id").val(),
                editor: $('#editor').val()
            }, function () {
                location.href = "<?=site_url('AController/contact_us')?>";
            });
        }
    }
</script>