<style>
    .box-img {
        padding: 5px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
</style>
<div class="container" style="margin-top: 5%">
    <div class="box-img">
        <h5><i class="fa fa-search" ></i> ค้นหาการสั่งชื้อด้วยเบอร์โทรศัพท์</h5>
        <div style="width: 100%" class="menu-padding">
            <div class="input-group mb-3">
                <input type="text" class="form-control text-search" placeholder="กรุณากรอกเบอร์โทรศัพท์..."
                       aria-label="Recipient's username" aria-describedby="basic-addon2" id="user_phone">
                <div class="input-group-append" onclick="search_product_mobile();">
                        <span class="input-group-text" id="basic-addon2"
                              style="background-color: #ffe2e7;"><i class="fa fa-search"></i> </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 5%; margin-bottom: 50%">
    <div class="box-img">
        <div class="table-responsive">
            <table class="table">
                <tr style="background-color: #ffe2e7;">
                    <th>#</th>
                    <th>Order</th>
                    <th>สถานะ</th>
                    <th>ตรวจสอบ</th>
                </tr>
                <tbody id="orderlist">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function search_product_mobile() {
        var row = 1;
        $.getJSON("<?=site_url('Api/get_seachorderlist?phone=')?>" + $('#user_phone').val(), function (data) {
            $.each(data, function (k, v) {
                var status = '';
                if (v['ordermove_payments'] == 2) {
                    status = 'รอการตรวจสอบ';
                } else if (v['ordermove_payments'] == 3) {
                    status = 'รอการจัดส่ง';
                } else if (v['ordermove_payments'] == 4) {
                    status = 'จัดส่งแล้ว';
                }

                $('#orderlist').append('<tr>' +
                    '<td>' + row + '</td>' +
                    '<td>' + v['ordermove_ref'] + '</td>' +
                    '<td>' + status + '</td>' +
                    '<td><i class="fa fa-send" style="color: #273F89" onclick="showdetail(\'' + v['ordermove_id'] + '\')"></i>  </td>' +
                    '</tr>');
                row++;
            });
        });
    }
    function showdetail(ordermove_id) {
        $('#txt-express').html('');
        $.getJSON("<?=site_url('ShippopApi/checkOrderfront?ordermove_id=')?>" + ordermove_id, function (data) {
            if (data.length == 0) {
                $('#awaitchecking').modal('toggle');
            } else {
                $.each(data, function (k, v) {
                    if (v['express_serial'] != '' || v['express_serial'] != null) {
                        $('#txt-express').html('Tracking Code : ' + v['express_serial'] + '<br/>บริษัทจัดส่ง : ' + v['express_company'] +
                            '<br/>Courier Tracking Code : ' + v['courier_code'] + '<br/>สถานะจัดส่ง : ' + v['sending']);

                        $('#sumprice').html('รวมราคา ' + numberformat(v['ordermove_price']) + ' บาท');
                        $('#form-detail').modal('toggle');
                    } else {
                        $('#awaitchecking').modal('toggle');
                    }
                });
            }

        });

    }
    function numberformat(number) {
        return new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(number);
    }
</script>


<!-- The Modal -->
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