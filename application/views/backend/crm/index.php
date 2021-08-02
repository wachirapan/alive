<div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">CRM & Lead</p>
                </div>
                <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Ticket details</td>
                                <td>Costomer name</td>
                                <td>Date</td>
                                <td>Priority</td>
                                <td></td>
                            </tr>
                            <tbody>
                            <?php foreach ($order as $item) { ?>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <p><?= $item->ordermove_ref ?> <br/></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="cursor: pointer" onclick="detailaddress(
                                        '<?=$item->ormember_name?>','<?=$item->ormember_phone?>',
                                        '<?=$item->ormember_address?>','<?=$item->province_id?>',
                                        '<?=$item->zipcode?>','<?=$item->ormember_email?>',
                                        '<?=$item->ormember_line?>'
                                        );"><p><?= $item->ormember_name ?> <br> <span
                                                style="color: gainsboro; font-size: 12px">phone : <?= $item->ormember_phone ?></span>
                                        </p></td>
                                    <td><p><?php $date = date_create($item->ordermove_create);
                                            echo date_format($date, "Y/m/d ");
                                            ?> <br> <span
                                                style="color: gainsboro; font-size: 10px"><?= date_format($date, "H:i:s"); ?></span>
                                        </p></td>
                                    <td>
                                        <?php if ($item->ordermove_payments == '2') { ?>
                                            <div style="width: 80px; height: 20px; background-color: red; border-radius: 10px; margin-top: 5%">
                                                <div class="text-center">
                                                    <p style="font-size: 12px; color: white">รอตรวจสอบ</p>
                                                </div>
                                            </div>
                                        <?php } else if ($item->ordermove_payments == '3') { ?>
                                            <div style="width: 80px; height: 20px; background-color: #F4F467; border-radius: 10px; margin-top: 5%">
                                                <div class="text-center">
                                                    <p style="font-size: 12px; color: white">รอจัดส่ง</p>
                                                </div>
                                            </div>
                                        <?php } else if ($item->ordermove_payments == '4') { ?>
                                            <div style="width: 80px; height: 20px; background-color: green; border-radius: 10px; margin-top: 5%">
                                                <div class="text-center">
                                                    <p style="font-size: 12px; color: white">จัดส่งแล้ว</p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-ellipsis-v fa-lg" onclick="express_sending('<?=$item->ordermove_id?>');" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <?=$links?>
                </div>
            </div>
        </div>
    </div>

<script>
    function express_sending(ordermove_id) {
        $('#orderdetail').html('');
        var tranfer = 0.00 ;
        var sumprice = 0.00 ;
        $.getJSON("<?=site_url('Api/orderexpress_agents?ordermove_id=')?>"+ordermove_id, function (data) {
            $.each(data, function (k,v) {
                tranfer += (v['product_tranfer'] * v['product_total']);
                sumprice += (v['product_price'] * v['product_total']) + (v['product_tranfer'] * v['product_total']);
                $('#orderdetail').append('<tr>' +
                    '<td>'+v['product_name']+'</td>' +
                    '<td>'+v['product_total']+'</td>' +
                    '<td>'+v['product_price']+'</td>' +
                    '<td>'+v['express_comp']+'</td>' +
                    '<td>'+v['express_serial']+'</td>' +
                    '</tr>');

                $('#sumprice').html('<h6>ค่าจัดส่ง : '+formatnumber(tranfer)+' ฿ <br/>  รวมราคา : '+formatnumber(sumprice)+' ฿</h6>  ');
            });
        });
        $("#express_sending").modal('toggle');
    }
    function formatnumber(number) {
        return  new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(number);
    }
    function detailaddress(name, phone, address, province, zipcode, ormember_email, line) {
        var provincename = '';
        $.getJSON("<?=site_url('Api/check_province?province=')?>"+province,function (data) {
            $.each(data, function (k,v) {
                provincename = v['name'];
            });
        });
        $('#txt-address').html('<h5>ชื่อ-สกุล : '+ name +' <br/> เบอร์โทร : '+phone + ' <br/> ที่อยู่ : '+ address +' '+province+
            ' '+ zipcode+ ' <br/> อีเมล์ : '+ormember_email+ ' <br/> ไลน์ : '+line+'</h5>' );
        $('#formaddress').modal('toggle');
    }
</script>
<!-- The Modal -->
<div class="modal" id="express_sending">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h5>รายละเอียดจัดส่ง</h5>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table class="table">
                        <tr style="background-color: #273F89;color: white">
                            <td><div style="width:150px; word-wrap:break-word;">สินค้า</div></td>
                            <td>จำนวน</td>
                            <td>ราคา</td>
                            <td>บริษัท</td>
                            <td>หมายเลข</td>
                        </tr>
                        <tbody id="orderdetail"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <div id="sumprice"></div>
                </div>

            </div>
        </div>
    </div>
</div>

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