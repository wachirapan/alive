
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row" style="padding: 30px">
                    <div class="col-md-3">
                        <?php if ($this->session->userdata('member_image') == '') { ?>
                            <div style="height: 150px; width: 150px; background-color: gainsboro; border-radius: 50%; margin-left: 20%">

                            </div>
                        <?php } else { ?>
                            <div style="height: 150px; width: 150px; background-color: gainsboro; border-radius: 50%; margin-left: 20%">
                                <img id="output"
                                     src="<?= base_url('images/members/' . $this->session->userdata('member_image')) ?>"
                                     width="150px" height="150px" style="border-radius: 50%;"/>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-9">
                        <div style="margin-top: 3%">
                            <h4 style="color: black;  font-weight: bold"><?= $this->session->userdata('member_name') ?></h4>
                            <h4 style="color: black; font-weight: bold; margin-top: 15px">รหัสสมาชิก : <?= $this->session->userdata('member_code') ?></h4>
                        </div>

                    </div>
                </div>
                <div class="row" style=" margin-bottom: 2%">
                    <div class="col-md-6">
                        <input type="hidden" id="review_picture" name="review_picture">
                        <input type="file" class="form-control" id="picture_header" onchange="loadFile(event)"
                               accept="image/*" style="display: none">
                        <button class="btn" onclick="showuploadfile();" style="margin-left: 18%; border: 1px solid #fcabb9; color: #fcabb9; font-weight: bold;font-size: 14px">
                            เปลี่ยนรูปโปรไฟล์
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-background" style="margin-left: 50%;font-weight: bold;font-size: 14px">เปลี่ยนรูปพื้นหลัง</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white; font-size: 16px">ข้อมูลส่วนเว็บส่วนตัว</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username / Subdomain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          style="background-color: #fcabb9; border: 1px solid #fcabb9; color: white">https://</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          style="background-color: #fcabb9; border: 1px solid #fcabb9; color: white">alive-dropship.com</span>
                                </div>
                                <input type="hidden" id="status_subdomain">
                                <input type="text" class="form-control" id="subdomain"
                                       aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append" onclick="checksubdomain();">
                                    <span class="input-group-text" style="background-color: #fcabb9; border: 1px solid #fcabb9; color: white">ตรวจสอบโดเมน</span>
                                </div>
                            </div>
                            <div id="txt-checker"></div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('#status_subdomain').val('false');
                            });
                            function checksubdomain() {

                                $.getJSON("<?=site_url('Api/checksubdoamin?subdomain=')?>" + $("#subdomain").val(), function (data) {
                                    console.log(data);
                                    if (data == false) {
                                        $('#txt-checker').html("<span style='color: red'>ไม่สามารถใช้งานได้ค่ะ</span>");
                                    } else {
                                        $('#txt-checker').html("<span style='color: green'>สามารถใช้งานได้ค่ะ</span>");
                                        $('#status_subdomain').val('true');
                                    }
                                });
                            }
                        </script>
                        <div class="form-group">
                            <label>Web Name / Title</label>
                            <input type="text" class="form-control" id="webname">
                        </div>
                        <div class="form-group">
                            <label>Keyword</label>
                            <input type="text" class="form-control" id="keyword">
                        </div>
                        <div class="form-group">
                            <label>Web Discription</label>
                            <input type="text" class="form-control" id="discription">
                        </div>
                        <div class="form-group">
                            <label>Google Analytics</label>
                            <input type="text" class="form-control" id="analytics">
                        </div>
                        <div class="form-group">
                            <label>Facebok_pixcel(ถ้ามีแค่ป้อน ID)</label>
                            <input type="text" class="form-control" id="facebok_pixcel">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="<?= base_url('assets/qrcode.png') ?>" style="width: 40%"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row" style="margin-top: 7%">
                            <div class="col-md-12">
                                <div style="display: inline">
                                    <img src="<?= base_url('assets/icons/facebook.png') ?>" style="width: 4%; border-radius: 5px">
                                    <img src="<?= base_url('assets/icons/line.png') ?>" style="width: 4%; border-radius: 5px">
                                    <img src="<?= base_url('assets/icons/instagram.png') ?>" style="width: 4%; border-radius: 5px">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 2%">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                           value="https://alive-dropship.com">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="background-color: #fcabb9; border: 1px solid #fcabb9; color: white">copy ลิ้งค์</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ออกแบบเพจส่วนตัว</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-left: 2%; margin-top: 2%">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">
                                    ข้าพเจ้าได้ศึกษาระเบียบการสมัครและตรวจสอบข้อมูลทั้งหมดว่าเป็นความจริง ทุกประการ
                                    คลิกปุ่ม "บันทึกข้อมูล" เพื่อยืนยันการเปลี่ยนแปลงข้อมูล
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 2%">
                <button class="btn btn-background" style="float: right;" onclick="confirmsubmit();">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>


<script>
    function showuploadfile() {
        $('#picture_header').trigger('click');
    }
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
            url: "<?php echo site_url('UploadImage/upload_imageprofile')?>",
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
                    upload_imagefile(url_picture);
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
    function upload_imagefile(url_picture) {
        $.post("<?=site_url('BUpdateData/update_imageprofile')?>", {
            url_picture: url_picture
        }, function () {

        });
    }
    function confirmsubmit() {
        console.log($('#status_subdomain').val());
        if ($('#status_subdomain').val() == 'false') {
            alert('กรุณากรอกข้อมุลให้ครบด้วยค่ะ');
        } else {
            if (confirm('ยืนยันการบันทึกข้อมูลทั้งหมดนี้หรือไม่')) {
                $.post("<?=site_url('BInsertData/create_subdirectory')?>", {
                    subdomain: $('#subdomain').val(),
                    webname: $('#webname').val(),
                    keyword: $('#keyword').val(),
                    discription: $('#discription').val(),
                    analytics: $('#analytics').val(),
                    facebok_pixcel: $("#facebok_pixcel").val()
                }, function () {
                    location.reload();
                });
            }
        }
    }

</script>

