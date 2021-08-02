
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ประเภทรีวิว</p>
                </div>
                <div class="row" style="padding: 20px">

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>ประเภท</label>
                            <input type="text" class="form-control" id="category_name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-background" id="btn-create" onclick="create_category();"><i class="fa fa-save"></i> ยืนยัน</button>
                            <button class="btn btn-nonbackground" id="btn-update" onclick="update_category();"><i class="fa fa-save"></i> ยืนยัน</button>

                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">ประเภท</td>
                                    <td scope="col">แก้ไข</td>
                                    <td scope="col">ลบ</td>
                                </tr>
                                <?php foreach ($blogs as $item){?>
                                    <tr>
                                        <td class="text-nowrap"><?=$item->category_blog_name?></td>
                                        <td class="text-nowrap"><i class="fa fa-edit fa-lg" style="color: blue" onclick="setedit(
                                                    '<?=$item->category_blog_id?>','<?=$item->category_blog_name?>'
                                                    );"></i> </td>
                                        <td class="text-nowrap"><i class="fa fa-trash fa-lg" onclick="delete_date(
                                                    '<?=$item->category_blog_id?>'
                                                    );" style="color: red"></i> </td>
                                    </tr>
                                <?php }?>
                            </table>
                        </div>
                        <?=$links?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="category_blog_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_category() {
        if(confirm('ยืนยันการบันทึกข้อมุลนี้หรือไม่')){
            $.post("<?=site_url('AInsertData/create_category_blogs')?>",{
                blogs : $("#category_name").val()
            },function () {
                location.reload();
            });
        }
    }
    function setedit(category_blog_id, category_blog_name) {
        $("#category_name").val(category_blog_name);
        $("#category_blog_id").val(category_blog_id);

        $('#btn-update').show();
        $('#btn-create').hide();
    }
    function update_category() {
        if(confirm('ยืนยันการบันทึกข้อมุลนี้หรือไม่')){
            $.post("<?=site_url('AUpdateData/update_category_blogs')?>",{
                category_blog_id : $('#category_blog_id').val(),
                blogs : $("#category_name").val()
            },function () {
                location.reload();
            });
        }
    }
    function delete_date(category_blog_id) {
        if(confirm('ยินยันการลบข้อมูลนี้หรือไม่')){
            $.post("<?=site_url('ADeleteData/del_category_blogs')?>",{
                category_blog_id : category_blog_id
            },function () {
                location.reload();
            });
        }
    }
</script>

