<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="text-mobile" style="color: black; font-weight: bold">Analytics Dasboard <br>
    </h3>
    <!--        <ol class="breadcrumb">-->
    <!--            <li class="breadcrumb-item"><a href="./">Home</a></li>-->
    <!--            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>-->
    <!--        </ol>-->
</div>

<div class="row display-website" style="margin-top: -1%">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-4 ">
        <div style="position: relative; border: 1px solid gainsboro; border-radius: 5px; height: 100% !important; ">

            <div class="text-center"
                 style="padding: 20px;  margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
                <?php if ($this->session->userdata('member_image') == '') { ?>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets//boy.png') ?>"
                         style="max-width: 130px; height: 130px;">
                <?php } else { ?>
                    <img class="img-profile rounded-circle"
                         src="<?= base_url('images/members/' . $this->session->userdata('member_image')) ?>"
                         style="max-width: 130px; height: 130px;">

                <?php } ?>
                <h6 style="color: #000; margin-top: 3%; font-weight: bold">Ecommerce Alive</h6>
                <p style="color: grey; margin-top: -10px; font-weight: bold">( Administraror )</p>
                <p style="margin-top: 5%; color: #fcabb9;">ตัวแทนจำหน่าย</p>
            </div>


        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-md-8 col-12">
        <div class="row">
            <div class="col-md-6 col-6">
                <div style="padding: 20px; border: 1px solid gainsboro;  border-radius: 5px; ">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 style="color: #fcabb9;">ยอดขายปลีก</h5><br/>
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: green; font-size: 16px"> (+20%)</span></h4>
                            <h6 style="color: grey; font-weight: bold">สัปดาห์ที่ผ่านมา</h6>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #ecf7fe; width: 60px; height: 60px; position: relative; float: right; border-radius: 5px ">
                                <i class="fa fa-bar-chart fa-lg"
                                   style="color: #00e0ef; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div style="padding: 20px; border: 1px solid gainsboro;  border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 style="color: #fcabb9;">ยอดขายตัวแทน</h5><br/>
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: green; font-size: 16px"> (+20%)</span></h4>
                            <h6 style="color: grey; font-weight: bold">สัปดาห์ที่ผ่านมา</h6>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #fef3f9; width: 60px; height: 60px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-line-chart fa-lg"
                                   style="color: #fe83c5; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div style="margin-top : 20px; padding: 20px; border: 1px solid gainsboro;  border-radius: 5px">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 style="color: #fcabb9;">ยอดสั่งชื้อ</h5><br/>
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: red; font-size: 16px"> (-10%)</span></h4>
                            <h6 style="color: grey; font-weight: bold">สัปดาห์ที่ผ่านมา</h6>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #f2f1fe; width: 60px; height: 60px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-archive fa-lg"
                                   style="color: #676aec; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div style="margin-top : 20px;padding: 20px; border: 1px solid gainsboro; border-radius: 5px">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 style="color: #fcabb9;">คะแนนสะสม</h5><br/>
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"> <span
                                        style="color: green; font-size: 16px"> (+0%)</span></h4>
                            <h6 style="color: grey; font-weight: bold">สัปดาห์ที่ผ่านมา</h6>
                        </div>
                        <div class="col-md-4">
                            <div style="background-color: #e8f8f5; width: 60px; height: 60px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-btc fa-lg"
                                   style="color: #00dab9; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row display-mobile" style="margin-top: -1%">
    <!-- Earnings (Monthly) Card Example -->
    <!-- Earnings (Annual) Card Example -->
    <div class=" col-12">
        <div class="row no-gutters">
            <div class="col-md-6 col-mobile" style="padding: 5px; height: 100%!important;">
                <div style="padding: 10px; border: 1px solid gainsboro;  border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-8 col-9">
                            <p style="color: #fcabb9; font-size: 12px">ยอดขายปลีก</p><br/>

                        </div>
                        <div class="col-md-4 col-3">
                            <div style="background-color: #ecf7fe; width: 30px; height: 30px; position: relative; float: right; border-radius: 5px ">
                                <i class="fa fa-bar-chart"
                                   style="color: #00e0ef; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: green; font-size: 16px"> (+20%)</span></p>
                        </div>
                        <div class="col-12">
                            <p style="color: grey; font-weight: bold; font-size: 12px">สัปดาห์ที่ผ่านมา</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-mobile" style="padding: 5px; height: 100%!important;">
                <div style="padding: 10px; border: 1px solid gainsboro;  border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-8 col-9">
                            <p style="color: #fcabb9;font-size: 12px">ยอดขายตัวแทน</p><br/>

                        </div>
                        <div class="col-md-4 col-3">
                            <div style="background-color: #fef3f9; width: 30px; height: 30px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-line-chart"
                                   style="color: #fe83c5; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: green; font-size: 16px"> (+20%)</span></p>
                        </div>
                        <div class="col-12">
                            <p style="color: grey; font-weight: bold; font-size: 12px">สัปดาห์ที่ผ่านมา</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-mobile" style="padding: 5px; height: 100%!important;">
                <div style="padding: 10px; border: 1px solid gainsboro;  border-radius: 5px">
                    <div class="row">
                        <div class="col-md-8 col-9">
                            <p style="color: #fcabb9; font-size: 12px">ยอดสั่งชื้อ</p><br/>


                        </div>
                        <div class="col-md-4 col-3">
                            <div style="background-color: #f2f1fe; width: 30px; height: 30px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-archive"
                                   style="color: #676aec; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><span
                                        style="color: red; font-size: 16px"> (-10%)</span></p>
                        </div>
                        <div class="col-12">
                            <p style="color: grey; font-weight: bold; font-size: 12px">สัปดาห์ที่ผ่านมา</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-mobile" style="padding: 5px; height: 100%!important;">
                <div style="padding: 10px; border: 1px solid gainsboro; border-radius: 5px">
                    <div class="row">
                        <div class="col-md-8 col-9">
                            <p style="color: #fcabb9; font-size: 12px">คะแนนสะสม</p><br/>

                        </div>
                        <div class="col-md-4 col-3">
                            <div style="background-color: #e8f8f5; width: 30px; height: 30px; position: relative; float: right;border-radius: 5px ">
                                <i class="fa fa-btc"
                                   style="color: #00dab9; padding: 10px; margin: 0;position: absolute; top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"> <span
                                        style="color: green; font-size: 16px"> (+0%)</span></p>
                        </div>
                        <div class="col-12">
                            <p style="color: grey; font-weight: bold; font-size: 12px">สัปดาห์ที่ผ่านมา</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 3%; margin-bottom: 2%">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>


