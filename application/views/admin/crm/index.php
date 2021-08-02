<style>
    td {
        color: black;
    }
</style>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">CRM & Lead</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col">ชื่อ-สกุล</td>
                                <td scope="col">เบอร์โทร</td>
                                <td scope="col">ไลน์</td>
                                <td scope="col">ที่อยู่</td>
                            </tr>
                            <tbody>
                            <?php foreach ($crm as $item) { ?>
                                <tr>
                                    <td class="text-nowrap"><?= $item->ormember_name ?></td>
                                    <td class="text-nowrap"><?= $item->ormember_phone ?></td>
                                    <td class="text-nowrap"><?= $item->ormember_line ?></td>
                                    <td class="text-nowrap"><i class="fa fa-address-book fa-lg" onclick="detailaddress(
                                                '<?= $item->ormember_name ?>','<?= $item->ormember_phone ?>',
                                                '<?= $item->ormember_address ?>','<?= $item->province_id ?>',
                                                '<?= $item->zipcode ?>','<?= $item->ormember_email ?>',
                                                '<?= $item->ormember_line ?>'
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

<script>
    function detailaddress(name, phone, address, province, zipcode, ormember_email, line) {
        var provincename = '';
        $.getJSON("<?=site_url('Api/check_province?province=')?>" + province, function (data) {
            $.each(data, function (k, v) {
                provincename = v['name'];
            });
        });
        $('#txt-address').html('<h5>ชื่อ-สกุล : ' + name + ' <br/> เบอร์โทร : ' + phone + ' <br/> ที่อยู่ : ' + address + ' ' + province +
            ' ' + zipcode + ' <br/> อีเมล์ : ' + ormember_email + ' <br/> ไลน์ : ' + line + '</h5>');
        $('#formaddress').modal('toggle');
    }
</script>

<!-- The Modal -->
<div class="modal" id="formaddress">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title">Modal Heading</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--            </div>-->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h4>รายละเอียดข้อมูล</h4>
                    <hr/>
                </div>
                <div id="txt-address"></div>
            </div>

            <!-- Modal footer -->
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            <!--            </div>-->

        </div>
    </div>
</div>