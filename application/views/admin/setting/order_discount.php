<div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ส่วนลดจากยอดซื้อ</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>จำนวนสินค้า(ต้น)</label>
                            <input type="text" class="form-control" id="discount_before">
                        </div>
                        <div class="form-group">
                            <label>จำนวนสินค้า(ปลาย)</label>
                            <input type="text" class="form-control" id="discount_after">
                        </div>
                        <div class="form-group">
                            <label>รับเงินคืน(บาท)</label>
                            <input type="text" class="form-control" id="discount_payback">
                        </div>
                        <button class="btn btn-background" id="btn-create" onclick="create_discount();">จัดเก็บข้อมูล
                        </button>
                        <button class="btn btn-nonbackground" id="btn-update" onclick="update_discount();">ยืนยันแก้ไข</button>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table ">
                                <tr>
                                    <td scope="col">จำนวน(ต้น)</td>
                                    <td scope="col">จำนวน(ปลาย)</td>
                                    <td scope="col"><div style="width:100px; word-wrap:break-word;">ราคาคืน(บาท)</div></td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                </tr>
                                <tbody>
                                <?php foreach ($discount as $item){?>
                                    <tr style="background-color: ghostwhite">
                                        <td class="text-nowrap"><?=number_format($item->order_discount_before)?></td>
                                        <td class="text-nowrap"><?=number_format($item->order_discount_after)?></td>
                                        <td class="text-nowrap"><?=number_format($item->order_discount_payback)?></td>
                                        <td class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                    '<?=$item->order_discount_id?>','<?=$item->order_discount_before?>',
                                                    '<?=$item->order_discount_after?>','<?=$item->order_discount_payback?>'
                                                    );"></i> </td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg" style="color: red" onclick="deletedata(
                                                    '<?=$item->order_discount_id?>'
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

<input type="hidden" id="order_discount_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_discount() {
        if(confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('AInsertData/create_orderdiscount')?>",{
                discount_before : $('#discount_before').val(),
                discount_after : $("#discount_after").val(),
                discount_payback : $("#discount_payback").val()
            },function () {
                location.reload();
            });
        }
    }
    function setedit(order_discount_id, order_discount_before, order_discount_after, order_discount_payback) {
        $('#order_discount_id').val(order_discount_id);
        $('#discount_before').val(order_discount_before);
        $('#discount_after').val(order_discount_after);
        $('#discount_payback').val(order_discount_payback);
        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_discount() {
        if(confirm('ยินยันการบันทึึกข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('AUpdateData/update_orderdiscount')?>",{
                order_discount_id : $('#order_discount_id').val(),
                discount_before : $('#discount_before').val(),
                discount_after : $("#discount_after").val(),
                discount_payback : $("#discount_payback").val()
            },function () {
                location.reload();
            });
        }
    }
    function deletedata(order_discount_id) {
        if(confirm('ยืนยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_orderdiscount')?>",{
                order_discount_id : order_discount_id
            },function () {
                location.reload();
            });
        }
    }
</script>