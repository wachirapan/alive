<style>
    .overtoken{
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;

    }
    .form-check-input{
        width: 15px;
        height: 15px;
        margin-top: -7px;
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #f7a4b2; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">จัดการไลน์ Token</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div style="border: solid 1px; height: 150px; width: 150px; margin: auto;border-radius: 5%; " id="boximage">
                            <img id="output" width="150px" height="150px"/>
                        </div>
                        <div class="form-group">
                            <label>QR CODE </label>
                            <input type="hidden" id="review_picture" name="review_picture">
                            <input type="file" class="form-control" id="picture_header" onchange="loadFile(event)"
                                   accept="image/*">
                            <script>
                                var loadFile = function (event) {
//                                    $('#boximage').show();
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
                                        url: "<?php echo site_url('UploadImage/lineqrcode')?>",
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
                            <label>Line Token</label>
                            <input type="text" class="form-control" id="linetoken">
                        </div>
                        <button class="btn btn-background" id="btn-create" onclick="createdata();"><i class="fa fa-save"></i> จัดเก็บ</button>
                        <button class="btn btn-nonbackground" id="btn-update" onclick="updatedata();"><i class="fa fa-save"></i> จัดเก็บ</button>

                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-success" onclick="sendlinemessage();" style="float: right">ส่งข้อความ</button>
                        <div style="clear: both"></div>
                        <div class="table-responsive" style="margin-top: 1%">
                            <table class="table">
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <td scope="col">line token</td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                    <td scope="col">ปิด</td>
                                </tr>
                                <tbody>
                                <?php foreach ($linetoken as $item){?>
                                    <tr>
                                        <td class="text-nowrap"><div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="chk[]" value="<?=$item->linetoken_name?>">
                                                </label>
                                            </div></td>
                                        <td class="text-nowrap">
                                            <?php if($item->linetoken_img != ''){?>
                                            <img src="<?=base_url('images/linetoken/'.$item->linetoken_img)?>" style="width: 50px; height: 50px; border-radius: 50%">
                                            <?php } ?>
                                        </td>
                                        <td class="text-nowrap"><p class="overtoken"><?=$item->linetoken_name?></p></td>
                                        <td class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                '<?=$item->linetoken_id?>','<?=$item->linetoken_name?>'
                                                );"></i> </td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red" onclick="deletedata(
                                                '<?=$item->linetoken_id?>'
                                                );"></i> </td>
                                        <td class="text-nowrap">
                                            <?php if($item->linetoken_status == 0){?>
                                            <i class="fa fa-power-off fa-lg" onclick="changestatus(
                                            '<?=$item->linetoken_id?>','<?=$item->linetoken_status?>'
                                        );" style="color: grey"></i>
                                            <?php }else{?>
                                                <i class="fa fa-power-off fa-lg" onclick="changestatus(
                                                        '<?=$item->linetoken_id?>','<?=$item->linetoken_status?>'
                                                        );" style="color: green"></i>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <?=$links?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="linetoken_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function createdata() {
        if(confirm('ยินยันการบันทึกข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('AInsertData/create_linetoken')?>",{
                linetoken : $('#linetoken').val(),
                review_picture : $('#review_picture').val()
            },function () {
                location.reload();
            });
        }
    }
    function setedit(linetoken_id, linetoken_name, image) {
        $('#linetoken_id').val(linetoken_id);
        $('#linetoken').val(linetoken_name);
        $('#review_picture').val(image);
        $('#output').attr('src',"<?=base_url('images/linetoken/')?>"+image);

        $('#btn-update').show();
        $('#btn-create').hide();
    }

    function updatedata() {
        if(confirm('ยินยันการบันทึกข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('AUpdateData/update_linetoken')?>",{
                linetoken_id : $("#linetoken_id").val(),
                linetoken : $("#linetoken").val(),
                review_picture : $("#review_picture").val()
            },function () {
                location.reload();
            })
        }
    }
    function deletedata(linetoken_id) {
        if(confirm('ยินยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_linetoken')?>",{
                linetoken_id : linetoken_id
            },function () {
                location.reload();
            })
        }
    }
    function sendlinemessage() {
        $('#myModal').modal('toggle');
    }
    function confirmsendline() {
        $('input[name="chk[]"]:checked').each(function () {
           $.post("<?=site_url('AInsertData/sendmessageline')?>",{
               linetoken :  $(this).val(),
               message : $("#txt-message").val()
           });
        });
    }
    function changestatus(id, status) {
        if(status == 0){
            if(confirm('ยืนยันการปิดใช้งานนี้หรือไม่')){
                $.post("<?=site_url('AUpdateData/statuslinetoken')?>",{
                    id : id,
                    status : 1
                },function () {
                    location.reload();
                });
            }
        }else{
            if(confirm('ยืนยันการเปิดใช้งานนี้หรือไม่')){
                $.post("<?=site_url('AUpdateData/statuslinetoken')?>",{
                    id : id,
                    status : 0
                },function () {
                    location.reload();
                });
            }
        }
    }
</script>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="form-group">
                    <label>ข้อความ</label>
                    <textarea rows="10" class="form-control" id="txt-message"></textarea>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="confirmsendline();">Sending</button>
            </div>

        </div>
    </div>
</div>