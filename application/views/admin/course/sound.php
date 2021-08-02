<style>
    td{
        color: black;
    }
</style>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">คอร์สเรียน</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="form-group">-->
<!--                                            <label>ผู้สอน</label>-->
                                            <input type="hidden" class="form-control" id="tearcher">
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>เนื้อหา</label>
                                            <input type="text" class="form-control" id="txt_content">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ลิ้งสอน</label>
                                            <input type="text" class="form-control" id="linkcourse">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-background" id="btn-create" onclick="create_course();"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                        <button class="btn btn-nonbackground" id="btn-update" onclick="confirm_update();"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                    </div>

                                </div>



                            </div>
                            <div class="col-md-12" style="margin-top: 3%">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td scope="col">ผู้สอน</td>
                                            <td scope="col">เนื้อหา</td>
                                            <td scope="col">ลิ้ง</td>
                                            <td scope="col">จัดการ</td>
                                        </tr>
                                        <tbody>
                                        <?php foreach ($course as $item){?>
                                            <tr>
                                                <td class="text-nowrap"><?=$item->learn_Instructor?> </td>
                                                <td class="text-nowrap"><?=$item->learn_content?></td>
                                                <td class="text-nowrap"><?=$item->learn_link?></td>
                                                <td class="text-nowrap"><i class="fa fa-ellipsis-h fa-lg dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                                           aria-expanded="false">
                                                        <div class="dropdown-menu" aria-labelledby="dLabel">
                                                            <a class="dropdown-item" onclick="setedit(
                                                                    '<?=$item->learn_id?>','<?=$item->learn_content?>',
                                                                    '<?=$item->learn_link?>','<?=$item->learn_Instructor?>'
                                                                    );">แก้ไข</a>
                                                            <a class="dropdown-item" onclick="del_link(
                                                                    '<?=$item->learn_id?>'
                                                                    );">ลบ</a>
                                                        </div>
                                                    </i>
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
        </div>
    </div>

<input type="hidden" id="learn_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_course() {
        if($('#txt_content').val() == ''  || $('#linkcourse').val() == ''){
            alert('กรุณากรอกข้อมูลให้ครบด้วยค่ะ');
        }else{
            if(confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')){
                $.post("<?=site_url('AInsertData/create_learn_online')?>",{
                    content : $('#txt_content').val(),
                    tearcher : $('#tearcher').val(),
                    linkcourse : $('#linkcourse').val(),
                    status : 'sound'
                },function () {
                    location.reload();
                });
            }
        }

    }
    function setedit(learn_id, learn_content, learn_link, learn_Instructor) {
        $("#learn_id").val(learn_id);
        $('#txt_content').val(learn_content);
        $('#tearcher').val(learn_Instructor);
        $('#linkcourse').val(learn_link);
        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function confirm_update() {
        if(confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('AUpdateData/update_learn_online')?>",{
                learn_id : $('#learn_id').val(),
                content : $('#txt_content').val(),
                tearcher : $('#tearcher').val(),
                linkcourse : $('#linkcourse').val()
            },function () {
                location.reload();
            });
        }
    }
    function del_link(learn_id) {
        if(confirm('ยืนยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_learn_online')?>",{
                learn_id : learn_id
            },function () {
                location.reload();
            });
        }
    }
</script>