
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">จัดการตำแหน่ง</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ชื่อตำแหน่ง</label>
                            <input type="text" class="form-control" id="position_name">
                        </div>
                        <div class="form-group">
                            <label>คะแนน</label>
                            <input type="text" class="form-control" id="position_price">
                        </div>
                        <div class="form-group">
                            <label>ถึงคะแนน</label>
                            <input type="text" class="form-control" id="position_to">
                        </div>
                        <div class="form-group">
                            <label>รับเงินคืน(%)</label>
                            <input type="text" class="form-control" id="postion_payback">
                        </div>
                        <button class="btn btn-background" id="btn-create" onclick="create_discount();">จัดเก็บข้อมูล
                        </button>
                        <button class="btn btn-nonbackground" id="btn-update" onclick="update_discount();">ยืนยันแก้ไข</button>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tr >
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">ชื่อตำแหน่ง</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">คะแนน</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">ถึงคะแนน</div>
                                    </td>
                                    <td scope="col">
                                        <div style="width:100px; word-wrap:break-word;">รับเงินคืน(%)</div>
                                    </td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($allsale as $item){?>
                                    <tr style="background-color: ghostwhite">
                                        <td class="text-nowrap"><?=$item->position_name?></td>
                                        <td class="text-nowrap"><?=number_format($item->position_price)?></td>
                                        <td class="text-nowrap"><?=number_format($item->position_to)?></td>
                                        <td class="text-nowrap"><?=number_format($item->postion_payback)?></td>
                                        <td class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                '<?=$item->position_id?>','<?=$item->position_name?>','<?=$item->position_price?>',
                                                '<?=$item->position_to?>','<?=$item->postion_payback?>'
                                                );"></i> </td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red" onclick="deletedata(
                                                '<?=$item->position_id?>'
                                                );"></i> </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <?=$links?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="position_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_discount() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_position')?>", {
                position_name: $('#position_name').val(),
                position_price: $("#position_price").val(),
                position_to: $("#position_to").val(),
                postion_payback: $("#postion_payback").val()
            }, function () {
                location.reload();
            });
        }
    }
    function setedit(position_id, position_name, position_price, position_to, postion_payback) {
        $('#position_id').val(position_id);
        $('#position_name').val(position_name);
        $('#position_price').val(position_price);
        $('#position_to').val(position_to);
        $('#postion_payback').val(postion_payback);

        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_discount() {
        if (confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_position')?>", {
                position_id : $('#position_id').val(),
                position_name: $('#position_name').val(),
                position_price: $("#position_price").val(),
                position_to: $("#position_to").val(),
                postion_payback: $("#postion_payback").val()
            }, function () {
                location.reload();
            });
        }
    }
    function deletedata(position_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_position')?>", {
                position_id: position_id
            }, function () {
                location.reload();
            });
        }
    }
</script>


