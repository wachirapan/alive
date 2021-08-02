<style>
    td {
        color: black;
    }
</style>
<?php foreach ($profile as $item){?>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">ข้อมูลบริษัท</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อบริษัท</label>
                            <input type="text" class="form-control" id="comp_name" value="<?=$item->company_name?>">
                        </div>

                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="comp_phone" value="<?=$item->company_phone?>">
                        </div>
                        <div class="form-group">
                            <label>หมายเลขผู้เสียภาษี</label>
                            <input type="text" class="form-control" id="comp_tax"  value="<?=$item->company_tax_id?>">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <input type="text" class="form-control" id="comp_address" value="<?=$item->company_address?>">
                        </div>

                        <div class="form-group">
                            <label>จังหวัด</label>
                            <select class="form-control" id="province" onchange="select_province();">
                                <?php $province = $this->AQueryView->get_province_edit($item->company_province);
                                foreach ($province as $pv){?>
                                <option value="<?=$pv->id?>"><?=$pv->name?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>อำเภอ</label>
                            <select class="form-control" id="district" onchange="select_district();">
                                <?php $province = $this->AQueryView->check_amphures($item->company_district);
                                foreach ($province as $di){?>
                                <option value="<?=$di->id?>"><?=$di->name_th?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ตำบล</label>
                            <select class="form-control" id="subdistrict" onchange="select_subdistrict();">
                                <?php $province = $this->AQueryView->check_districts($item->company_subdistrict);
                                foreach ($province as $sd){?>
                                    <option value="<?=$sd->id?>"><?=$sd->name_th?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" id="comp_zipcode" value="<?=$item->company_zipcode?>">
                        </div>

                    </div>
                    <div class="col-md-12" style="margin-top: 3%">
                        <button class="btn btn-background" id="btn-create" onclick="confirmUpdate();"><i
                                    class="fa fa-save"></i> บันทึกข้อมูล
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<input type="hidden" id="comp_id" value="<?=$item->company_id ?>">
<?php }?>
<script>
    $(function () {
        $.getJSON("<?=site_url('Api/get_province')?>", function (data) {
            $.each(data, function (k, v) {
                $('#province').append('<option value="' + v['id'] + '">' + v['name'] + '</option>');
            });
        });
    });
    function select_province() {
        $('#district').html('');
        $('#district').append('<option>-- เลือกอำเภอ --</option>');
        $.getJSON("<?=site_url('Api/check_district?province_id=')?>" + $('#province').val(), function (data) {
            $.each(data, function (k, v) {
                $('#district').append('<option value="' + v['id'] + '">' + v['name_th'] + '</option>');
            });
        });
    }
    function select_district() {
        $('#subdistrict').html('');
        $('#subdistrict').append('<option>-- เลือกตำบล --</option>');
        $.getJSON("<?=site_url('Api/check_subdistrict?district_id=')?>" + $('#district').val(), function (data) {
            $.each(data, function (k, v) {
                $('#subdistrict').append('<option value="' + v['id'] + '">' + v['name_th'] + '</option>');
            });
        });
    }
    function select_subdistrict() {
        $.getJSON("<?=site_url('Api/check_zipcode?subdistrict=')?>" + $('#subdistrict').val(), function (data) {
            $('#comp_zipcode').val(data[0]['zip_code']);
        });
    }
    function confirmUpdate() {
        if (confirm('ยืนยันการบันทึกข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/updateCompany')?>", {
                comp_id: $('#comp_id').val(),
                comp_name: $('#comp_name').val(),
                comp_phone: $('#comp_phone').val(),
                comp_tax: $('#comp_tax').val(),
                comp_address: $('#comp_address').val(),
                province: $('#province').val(),
                district: $('#district').val(),
                subdistrict: $('#subdistrict').val(),
                comp_zipcode: $('#comp_zipcode').val()
            }, function () {
                location.reload();
            });
        }
    }
</script>