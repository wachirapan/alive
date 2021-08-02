<style>
    select{
        height: 30px!important;
        font-size: 12px!important;
    }
</style>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ตรวจสอบผู้สมัคร</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-2 offset-md-10 col-6">
                    <select class="form-control" id="checkdata" onchange="movecheckdata();">
                        <?php if (!isset($_GET['status'])) { ?>
                            <option value="ทั้งหมด" selected> ทั้งหมด</option>
                            <option value="ที่มีปัญหา"> ที่มีปัญหา</option>
                        <?php } else { ?>
                            <option value="ทั้งหมด"> ทั้งหมด</option>
                            <option value="ที่มีปัญหา" selected> ที่มีปัญหา</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">ชื่อ-สกุล</td>
                                <td scope="col">เบอร์โทร</td>
                                <td scope="col">รายละเอียด</td>
                                <td scope="col">ตรวจสอบ</td>
                            </tr>
                            <?php foreach ($checkregister as $item) { ?>
                                <tr>
                                    <td scope="row"><?= $item->member_code ?></td>
                                    <td class="text-nowrap"><?= $item->member_name ?></td>
                                    <td class="text-nowrap"><?= $item->member_phone ?></td>
                                    <td class="text-nowrap"><i class="fa fa-address-book fa-lg" style="color: blue" onclick="open_profile(
                                                '<?= $item->member_address ?>','<?= $item->province_id ?>','<?= $item->zipcode ?>',
                                                '<?= $item->member_upline ?>'
                                                );"></i></td>
                                    <td class="text-nowrap"><i class="fa fa-check fa-lg" style="color: green" onclick="open_members(
                                                '<?= $item->member_id ?>','<?= $item->member_phone ?>','<?= $item->member_name ?>',
                                                '<?= $item->member_code ?>','<?= $item->member_pwd ?>'
                                                );"></i>
                                        |
                                        <?php if (!isset($_GET['status'])) { ?>
                                            <i class="fa fa-close fa-lg" style="color: red" onclick="canclemember('<?= $item->member_id?>');"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-close fa-lg" style="color: red"
                                               onclick="deletedata('<?= $item->member_id ?>');"></i>

                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <?= $links ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function open_members(member_id, phone, name, user, password) {
        if (confirm('ยืนยันการเปิดใช้งานผู้ใช้นี้หรือไม่')) {
            $.post("<?=site_url('AInsertData/open_memnbers')?>", {
                member_id: member_id,
                phone: phone,
                name: name,
                user: user,
                password: password
            }, function () {
                location.reload();
            });
        }

    }
    function canclemember(member_id) {
        console.log(member_id)
            if (confirm("ยืนยันการการเลิกการสมัครผู้ใช้นี้หรือไม่")) {
                $.post("<?=site_url('AUpdateData/cancel_memberregister')?>", {
                    member_id: member_id
                }, function () {
                    location.reload();
                });
            }
    }
    function open_profile(address, province, zipcode, upline) {

        $.getJSON("<?=site_url('Api/get_adviser?adviser_id=')?>" + upline, function (data) {
            console.log(data)
            $.each(data, function (k, v) {
                $.getJSON("<?=site_url('Api/check_province?province=')?>" + province, function (por) {
                    console.log(por)
                    $.each(por, function (a, b) {
                        $('#txt-profile').html('<h5>รหัสผู้แนะนำ : ' + v['member_code'] + ' <br> ชื่อผู้แนะนำ : ' + v['member_name'] + ' <br/>' +
                            'ที่อยู่ : ' + address + ' ' + b['name'] + ' ' + zipcode +
                            '</h5>');
                        $('#myModal').modal('toggle');
                    })
                });
            });
        });
    }
    function movecheckdata() {
        if ($("#checkdata").val() == 'ที่มีปัญหา') {
            location.href = "<?=site_url('AController/checkregister?status=false')?>";
        } else {
            location.href = "<?=site_url('AController/checkregister')?>";
        }
    }
    function deletedata(member_id) {
        $.post("<?=site_url('ADeleteData/del_registermember')?>", {
            member_id: member_id
        }, function () {
            location.reload();
        });
    }
</script>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div id="txt-profile"></div>
            </div>
        </div>
    </div>
</div>

