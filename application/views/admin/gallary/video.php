<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">คลังวีดีโอ</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>เนื้อหา</label>
                                    <input type="text" class="form-control" id="txt_content">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ลิ้ง</label>
                                    <input type="text" class="form-control" id="linkcourse">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" id="btn-create" onclick="create_course();"><i
                                        class="fa fa-save"></i> บันทึกข้อมูล
                                </button>
                                <button class="btn btn-info" id="btn-update" onclick="confirm_update();"><i
                                        class="fa fa-save"></i> บันทึกข้อมูล
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 3%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr >
                                    <td scope="col">เนื้อหา</td>
                                    <td scope="col">ลิ้ง</td>
                                    <td scope="col">จัดการ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($gallary as $item){?>
                                    <tr>
                                        <td class="text-nowrap"><?=$item->gallary_content?></td>
                                        <td class="text-nowrap"><?=$item->gallary_link?></td>
                                        <td class="text-nowrap"><i class="fa fa-ellipsis-h fa-lg dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                                   aria-expanded="false">
                                                <div class="dropdown-menu" aria-labelledby="dLabel">
                                                    <a class="dropdown-item" onclick="setedit(
                                                            '<?=$item->gallary_id?>','<?=$item->gallary_link?>','<?=$item->gallary_content?>'
                                                            );">แก้ไข</a>
                                                    <a class="dropdown-item" onclick="del_link();">ลบ</a>
                                                </div>
                                            </i></td>
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
                    status: 'video'
                }, function () {
                    location.reload();
                });
            }
        }

    }
    function setedit(gallary_id, gallary_link, gallary_content) {
        $("#gallary_id").val(gallary_id);
        $('#txt_content').val(gallary_content);
        $('#linkcourse').val(gallary_link);

        $('#btn-update').show();
        $('#btn-create').hide();

    }
    function confirm_update() {
        if (confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_gallary')?>", {
                gallary_id : $("#gallary_id").val(),
                content: $('#txt_content').val(),
                link: $('#linkcourse').val()
            }, function () {
                location.reload();
            });
        }
    }
    function del_link(gallary_id) {
        if(confirm('ยืนยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_gallary')?>",{
                gallary_id : gallary_id
            },function () {
                location.reload();
            });
        }
    }
</script>
