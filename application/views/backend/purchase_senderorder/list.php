<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">Order List</p>
            </div>
            <div style="border-radius: 5px; border: 1px solid gainsboro; margin-top: 3%">
                <p style="margin-left: 20px; font-size: 14px; color: black">All Tickets</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td class="text-nowrap">Ticket details</td>
                            <td class="text-nowrap">Customer name</td>
                            <td class="text-nowrap">Date</td>
                            <td class="text-nowrap">Priority</td>
                            <td class="text-nowrap"></td>
                        </tr>
                        <tbody>
                        <?php foreach ($order as $item) { ?>
                            <tr>
                                <td class="text-nowrap">
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                                <?php
                                                if (!empty($this->BQueryView->get_imagemember($item->members_id))) { ?>
                                                    <img src="<?= $this->BQueryView->get_imagemember($item->members_id); ?>"
                                                         style="width: 40px; height: 40px; border-radius: 50%"/>
                                                <?php }else{ ?>
                                                    <img src="<?=base_url('assets/boy.png')?>"
                                                         style="width: 40px; height: 40px; border-radius: 50%"/>
                                                <?php }?>


                                        </div>
                                        <div class="col-md-10 col-10">
                                            <p><?= $item->ordermove_ref ?> <br/>
                                                <span style="color: gainsboro; font-size: 12px">Update 1 day ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap"><p><?= $this->BQueryView->get_membername($item->members_id, $item->member_original_id); ?> <br> <span
                                                style="color: gainsboro; font-size: 10px">on <?= $this->BQueryView->log_loginmember($item->members_id); ?></span>
                                    </p></td>
                                <td class="text-nowrap"><p><?php $date = date_create($item->ordermove_create);
                                        echo date_format($date, "Y/m/d ");
                                        ?> <br> <span
                                                style="color: gainsboro; font-size: 10px"><?= date_format($date, "H:i:s"); ?></span>
                                    </p></td>
                                <td class="text-nowrap">
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
                                <td class="text-nowrap">
                                    <i class="fa fa-ellipsis-v fa-lg"  style="margin-top: 10px"
                                       onclick="express_sending('<?= $item->ordermove_id ?>');" aria-hidden="true"></i>
                                </td>
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
    function express_sending(ordermove_id) {
        $('#txt-express').html('');
        $.getJSON("<?=site_url('ShippopApi/checkOrderfront?ordermove_id=')?>" + ordermove_id, function (data) {
            if (data.length == 0) {
                $('#awaitchecking').modal('toggle');
            } else {
                $.each(data, function (k, v) {
                    if (v['express_serial'] != '' || v['express_serial'] != null) {
                        $('#txt-express').html('Tracking Code : ' + v['express_serial'] + '<br/>บริษัทจัดส่ง : ' + v['express_company'] +
                            '<br/>Courier Tracking Code : ' + v['courier_code'] + '<br/>สถานะจัดส่ง : ' + v['sending']);

                        $('#sumprice').html('รวมราคา ' + formatnumber(v['ordermove_price']) + ' บาท');
                        $('#form-detail').modal('toggle');
                    } else {
                        $('#awaitchecking').modal('toggle');
                    }
                });
            }

        });

    }
    function formatnumber(number) {
        return new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(number);
    }
</script>
<div class="modal" id="form-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title">Modal Heading</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--            </div>-->

            <!-- Modal body -->
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
                    <div id="sumprice"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="awaitchecking">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <!--            <div class="modal-header">-->
            <!--                <h4 class="modal-title">Modal Heading</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--            </div>-->

            <!-- Modal body -->
            <div class="modal-body">
                <!--                <div class="text-center">-->
                <!--                    <h5>รายละเอียด</h5>-->
                <!--                </div>-->
                <hr/>
                <div class="text-center">
                    <h4>รอการตรวจสอบจากระบบค่ะ</h4>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="text-center">

                </div>

            </div>
        </div>
    </div>
</div>