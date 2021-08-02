<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ส่วนลดจากยอดซื้อ</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>คะแนนเริ่มต้น</label>
                        <input type="text" class="form-control" id="amount_before">
                    </div>
                    <div class="form-group">
                        <label>ถึงคำแนน</label>
                        <input type="text" class="form-control" id="amount_after">
                    </div>
                    <div class="form-group">
                        <label>รับเงินคืน(%)</label>
                        <input type="text" class="form-control" id="amount_payback">
                    </div>
                    <button class="btn btn-background" id="btn-create" onclick="create_discount();">จัดเก็บข้อมูล
                    </button>
                    <button class="btn btn-nonbackground" id="btn-update" onclick="update_discount();">ยืนยันแก้ไข
                    </button>
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table ">
                            <tr>
                                <td scope="col">คะแนน(ต้น)</td>
                                <td scope="col">คะแนน(ปลาย)</td>
                                <td scope="col">
                                    <div style="width:80px; word-wrap:break-word;">จ่ายคืน(%)</div>
                                </td>
                                <td scope="col">แก้ไข</td>
                                <td scope="col">ลบ</td>
                            </tr>
                            <tbody>
                            <?php foreach ($discount as $item) { ?>
                                <tr>
                                    <td class="text-nowrap"><?= number_format($item->score_before) ?></td>
                                    <td class="text-nowrap"><?= number_format($item->score_after) ?></td>
                                    <td class="text-nowrap"><?= number_format($item->amount_discount_payback) ?></td>
                                    <td class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                '<?= $item->amount_discount_id ?>','<?= $item->score_before ?>','<?= $item->score_after ?>',
                                                '<?= $item->amount_discount_payback ?>'
                                                );"></i></td>
                                    <td class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red" onclick="deletedata(
                                                '<?= $item->amount_discount_id ?>'
                                                );"></i></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?= $links ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="amount_discount_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_discount() {
        if (confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/create_amountdiscount')?>", {
                amount_before: $('#amount_before').val(),
                amount_after: $("#amount_after").val(),
                amount_payback: $("#amount_payback").val()
            }, function () {
                location.reload();
            });
        }
    }
    function setedit(amount_discount_id, score_before, score_after, amount_discount_payback) {
        $('#amount_discount_id').val(amount_discount_id);
        $('#amount_before').val(score_before);
        $('#amount_after').val(score_after);
        $('#amount_payback').val(amount_discount_payback);
        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_discount() {
        if (confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_amountdiscount')?>", {
                amount_discount_id: $('#amount_discount_id').val(),
                amount_before: $('#amount_before').val(),
                amount_after: $("#amount_after").val(),
                amount_payback: $("#amount_payback").val()
            }, function () {
                location.reload();
            });
        }
    }
    function deletedata(amount_discount_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_amountdiscount')?>", {
                amount_discount_id: amount_discount_id
            }, function () {
                location.reload();
            });
        }
    }
</script>


