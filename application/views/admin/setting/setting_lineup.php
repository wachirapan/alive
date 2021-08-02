
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">โบนัสค่าแนะนำ</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ชั้นที่</label>
                            <input type="text" class="form-control" id="setting_lineup_layer">
                        </div>
                        <div class="form-group">
                            <label>ปัญผล(%)</label>
                            <input type="text" class="form-control" id="setting_lineup_payback">
                        </div>
                        <div class="form-group">
                            <label>จำนวนเริ่ม</label>
                            <input type="text" class="form-control" id="lineup_members">
                        </div>
                        <div class="form-group">
                            <label>ถึงจำนวน</label>
                            <input type="text" class="form-control" id="lineup_members_to">
                        </div>
                        <button class="btn btn-background" id="btn-create" onclick="create_discount();">จัดเก็บข้อมูล
                        </button>
                        <button class="btn btn-nonbackground" id="btn-update" onclick="update_discount();">ยืนยันแก้ไข</button>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table ">
                                <tr >
                                    <td scope="col">
                                        <div style="width:30px; word-wrap:break-word;">ชั้นที่</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">ปัญผล(%)</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">จำนวนเริ่ม</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">ถึงจำนวน</div>
                                    </td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($lineup as $item) { ?>
                                    <tr style="background-color: ghostwhite">
                                        <td  class="text-nowrap"><?=number_format($item->setting_lineup_layer)?></td>
                                        <td  class="text-nowrap"><?=number_format($item->setting_lineup_payback)?></td>
                                        <td  class="text-nowrap"><?=number_format($item->lineup_members)?></td>
                                        <td  class="text-nowrap"><?=number_format($item->lineup_members_to)?></td>
                                        <td  class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                '<?=$item->setting_lineup_id?>','<?=$item->setting_lineup_layer?>',
                                                '<?=$item->setting_lineup_payback?>','<?=$item->lineup_members?>' ,
                                                '<?=$item->lineup_members_to?>'
                                                );"></i> </td>
                                        <td  class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red" onclick="deletedata(
                                                '<?=$item->setting_lineup_id?>'
                                                );"></i> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?=$links?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<input type="hidden" id="setting_lineup_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_discount() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_setting_lineup')?>", {
                setting_lineup_layer: $('#setting_lineup_layer').val(),
                setting_lineup_payback: $("#setting_lineup_payback").val(),
                lineup_members: $("#lineup_members").val(),
                lineup_members_to: $("#lineup_members_to").val()
            }, function () {
                location.reload();
            });
        }
    }
    function setedit(setting_lineup_id, setting_lineup_layer, setting_lineup_payback, lineup_members, lineup_members_to) {
        $('#setting_lineup_id').val(setting_lineup_id);
        $('#setting_lineup_layer').val(setting_lineup_layer);
        $('#setting_lineup_payback').val(setting_lineup_payback);
        $('#lineup_members').val(lineup_members);
        $('#lineup_members_to').val(lineup_members_to);
        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_discount() {
        if (confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_setting_lineup')?>", {
                setting_lineup_id : $("#setting_lineup_id").val(),
                setting_lineup_layer: $('#setting_lineup_layer').val(),
                setting_lineup_payback: $("#setting_lineup_payback").val(),
                lineup_members: $("#lineup_members").val(),
                lineup_members_to: $("#lineup_members_to").val()
            }, function () {
                location.reload();
            });
        }
    }
    function deletedata(setting_lineup_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_setting_lineup')?>", {
                setting_lineup_id: setting_lineup_id
            }, function () {
                location.reload();
            });
        }
    }
</script>