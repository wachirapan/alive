<style>
    th {
        font-size: 12px;
    }
</style>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ข้อมูลตัวแทนจำหน่าย</p>
            </div>
            <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%">
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-2">
                        <div style="margin-top: 5%;" class="text-center">
                            ค้นหาสมาชิก
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="member_name"
                                   aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text" style="background-color: #fcabb9; color: white " onclick="search_members();">ค้นหาตัวแทน</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 display-website">
                        <div style="margin-top: 15%">
                            <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                        </div>

                    </div>
                    <div class="col-md-1 display-website">
                        <div style="margin-top: 15%">
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" style="margin-top: 2%">
                        <tr>
                            <td scope="col">Ticket details</td>
                            <td scope="col">Costomer name</td>
                            <td scope="col">Date</td>
                            <td scope="col">Priority</td>
                            <td scope="col"></td>
                        </tr>
                        <tbody>
                        <?php foreach ($members as $item) { ?>
                            <tr>
                                <td class="text-nowrap">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div style="width: 40px; height: 40px; background-color: #fcabb9; border-radius: 50%">
                                                <?php if ($item->member_image == '') { ?>
                                                    <img class="img-profile rounded-circle"
                                                         src="<?= base_url('assets/') ?>boy.png"
                                                         style="width: 40px; height: 40px; border-radius: 50%">
                                                <?php } else { ?>
                                                    <img src="<?= base_url('images/members/' . $item->member_image) ?>"
                                                         style="width: 40px; height: 40px; border-radius: 50%">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <p><?= $item->member_code ?><br/>
                                                <span style="color: gainsboro; font-size: 12px">Update 1 day ago</span>
                                            </p>
                                        </div>
                                    </div>

                                </td>
                                <td class="text-nowrap"><p><?= $item->member_name ?> <br> <span style="color: gainsboro; font-size: 10px">on 24.05.2019</span>
                                    </p></td>
                                <td class="text-nowrap"><p><?= $item->member_create ?> <br> <span style="color: gainsboro; font-size: 10px">6:30 PM</span>
                                    </p>
                                </td>
                                <td class="text-nowrap">
                                    <a href="<?= site_url('AController/editprofilemember?member_id=' . $item->member_id) ?>">
                                        <i class="fa fa-edit" style="color: blue"></i>
                                    </a>
                                    |
                                    <i class="fa fa-trash" style="color: red" onclick="delete_members(
                                            '<?= $item->member_id ?>'
                                            );"></i>
                                </td>

                                <td class="text-nowrap"><a href="<?=site_url('AController/lineup?member_id='.$item->member_id)?>"><i class="fa fa-filter"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?= $links ?>
            </div>
        </div>
    </div>
</div>

<script>
    function search_members() {
        var member_name = $('#member_name').val();
        window.open("<?=site_url('AController/search_members?member_name=')?>" + member_name);
    }
    function delete_members(member_id) {
        if (confirm('ยืนยันการลบผู้ใช้นี้ออกจากระบบหรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_members')?>", {
                member_id: member_id
            }, function () {
                location.reload();
            });
        }
    }
</script>

