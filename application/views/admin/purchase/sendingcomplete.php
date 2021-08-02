<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายการสั่งชื้อทั้งหมด</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">บริษัท</td>
                                <td scope="col">เลขพัสดุ</td>
                                <td scope="col">วันที่จัดส่ง</td>
                                <td scope="col">ข้อมูลลูกค้า</td>
                                <td scope="col">สถานะ</td>
                                <td scope="col">พิมพ์ใบส่งของ</td>
                            </tr>
                            <tbody>
                            <?php foreach ($sending as $item) { ?>
                                <tr >
                                    <td class="text-nowrap">
                                        <div style="width:100px; word-wrap:break-word;"><?= $item->ordermove_ref ?></div>
                                    </td>
                                    <td class="text-nowrap"><?= $item->express_company ?></td>
                                    <td class="text-nowrap"><?= $item->express_serial ?></td>

                                    <td class="text-nowrap"><?= $item->express_date ?></td>
                                    <td class="text-nowrap">
                                        <div class="text-center" style="width:50px; word-wrap:break-word;"><i
                                                    class="fa fa-bars fa-lg" onclick="senderform(
                                                    '<?= $item->ordermove_id ?>','<?= $item->members_id ?>','<?= $item->member_original_id ?>'
                                                    );" style="color: blue"></i></div>
                                    </td>
                                    <td class="text-nowrap"><i class="fa fa-send fa-lg"
                                           onclick="showstatustracking('<?= $item->express_serial ?>',
                                                   '<?= $item->express_company ?>','<?= $item->courier_code ?>','<?= $item->total_price ?>');"></i>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="<?= site_url('ShippopApi/printorderSender?purchase_id=' . $item->purchase_id
                                            . '&tracking_code=' . $item->express_serial) ?>" target="_blank"> <i
                                                    class="fa fa-file-pdf-o fa-lg" style="color: red"></i> </a></td>
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
    function showstatustracking(express_serial, express_company, courier_code, total_price) {
        $('#txt-express').html('');
        $.getJSON("<?=site_url('ShippopApi/check_trackingorder?tracking=')?>" + express_serial, function (data) {
            console.log(data);
            $('#txt-express').html('Tracking Code : ' + express_serial + '<br/>บริษัทจัดส่ง : ' + express_company +
                '<br/>Courier Tracking Code : ' + courier_code + '<br/>สถานะจัดส่ง : ' + data);

            $('#sumprice-express').html('ราคาจัดส่ง ' + numberformat(total_price) + ' บาท');
        });
        $('#form-detail').modal('toggle');
    }
    function numberformat(number) {
        return new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(number);
    }
    function senderform(ordermove_id, members_id, member_original_id) {
        $.getJSON("<?=site_url('Api/check_usersender?ordermove_id=')?>" + ordermove_id + '&members_id=' + members_id +
            '&member_original_id=' + member_original_id, function (data) {
            $.each(data, function (k, v) {
                $('#member-address').html('ชื่อ-สกุล : ' + v['username'] + ' <br/>' +
                    'เบอร์โทร : ' + v['userphone'] + ' <br/>' +
                    'ที่อยู่ : ' + v['useraddress'] + ' <br/>' +
                    'จังหวัด : ' + v['userprovince'] + ' <br/>' +
                    'รหัสไปรษณีย์ : ' + v['userzipcode'] + '');
            });
        });
        $("#senderform").modal('toggle');
    }
</script>
<!-- The Modal -->
<div class="modal" id="senderform">
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
                    <h5>ข้อมูลผู้ชื้อสินค้า</h5>
                </div>
                <hr/>
                <div id="member-address"></div>
            </div>
            <!-- Modal footer -->
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            <!--            </div>-->
        </div>
    </div>
</div>


<div class="modal" id="form-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center">
                    <h5>รายละเอียด</h5>
                </div>
                <hr/>
                <div id="txt-express"></div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="text-center">
                    <div id="sumprice-express"></div>
                </div>

            </div>
        </div>
    </div>
</div>