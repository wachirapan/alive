<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .text-over{
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .btn-nonbackground:hover{
        cursor: pointer;
    }
    @media only screen and (max-width: 700px) {
        .mobile-margin{
            margin-left: -25px;
        }
        .mobile-top{
            margin-top: 5%;
        }
    }

</style>

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
                <p style="color: grey; margin-top: -7px; font-weight: bold; font-size: 14px">( <?=$_SESSION['member_name']?> )</p>
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
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><?=number_format($this->BQueryView->checkSalerOnMe(),2);?><span
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
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><?=number_format($this->BQueryView->checkUplineSaler(), 2);?><span
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
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><?=number_format($this->BQueryView->checkSalerOnWeb(),2);?><span
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
                            <h4 class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"> <?=number_format($this->BQueryView->checkPoints(),2);?><span
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
                            <p class="text-over" style="color: #000; margin-top: -20px; font-weight: 700"><?=number_format($this->BQueryView->checkPoints(),2);?> <span
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
        <div style="padding: 15px; border: 1px solid gainsboro;  border-radius: 5px;">
            <h6 style="color: #fcabb9; padding: 10px; font-weight: bold">ยอดขาย <br/><span style="color: grey; font-weight: bold; font-size: 12px">สามารถเลือกวันที่ต้องการดูยอดขายได้</span>
            </h6>

            <div class="card-body">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <canvas class="mobile-margin" id="speedChart" style="background-color:#fff"></canvas>
            </div>
            <div class="row" >
                <div class="col-md-4 col-4" >
                    <div style="float: left">
                        <div style="width: 20px; height: 20px; background-color: #fcabb9; border-radius: 5px;"></div>
                    </div>
                    <div style="float: left">
                        <p class="text-over" style="margin-top: -2px; font-size: 12px; font-weight: bold">&nbsp; ยอดขายปลีก</p>
                    </div>
                </div>
                <div class="col-md-4 col-4">
                    <div style="float: left">
                        <div style="width: 20px; height: 20px; background-color: #46b8f8; border-radius: 5px;"></div>
                    </div>
                    <div style="float: left">
                        <p class="text-over" style="margin-top: -2px; font-size: 12px; font-weight: bold">&nbsp; ยอดขายตัวแทน</p>
                    </div>
                </div>
                <div class="col-md-4 col-4">
                    <div style="float: left">
                        <div style="width: 20px; height: 20px; background-color: #5b68d6; border-radius: 5px;"></div>
                    </div>
                    <div style="float: left">
                        <p class="text-over" style="margin-top: -2px; font-size: 12px; font-weight: bold">&nbsp; ยอดสั่งชื้อ</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-12 mobile-top">
        <div style="padding: 15px; border: 1px solid gainsboro;  border-radius: 5px; height: 100% !important;">
            <h6 style="color: #fcabb9; padding: 10px; font-weight: bold">แลกของรางวัล <br/><span style="color: grey; font-weight: bold; font-size: 12px">กรุณาเลือกของรางวัลที่ต้องการแลก</span>
            </h6>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td scope="col"></td>
                        <td scope="col">รายการ</td>
                        <td scope="col">คะแนน</td>
                        <td scope="col"></td>
                    </tr>
                    <?php $giftbox = $this->BQueryView->listGiftBox();
                    foreach ($giftbox as $item){?>
                    <tr>
                        <td class="text-nowrap"><img src="<?=base_url('images/gift_box/'.$item->giftbox_img)?>" style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #f7a4b2;"></td>
                        <td class="text-nowrap"><?=$item->giftbox_content?></td>
                        <td class="text-nowrap"><?=number_format($item->giftbox_score)?></td>
                        <td class="text-nowrap"><div class="btn-nonbackground text-center" style="width: 120px; border-radius: 5px" onclick="selectGiftbox(
                            '<?=$item->giftbox_id?>','<?=$this->BQueryView->checkPoints();?>','<?=$item->giftbox_score?>'
                        );">
                                แลกของรางวัล
                            </div> </td>
                    </tr>
                    <?php }?>
                </table>
            </div>

        </div>

    </div>
</div>


<script>
    function selectGiftbox(gift_id, point, giftbox_score) {
        if(point > giftbox_score){
            alert('คะแนนของคุณไม่เพียงพอสำหรับแลกค่ะ');
        }else{
            $.post("<?=site_url('BInsertData/selectGiftbox')?>",{
                gift_id : gift_id,
                point : point,
                giftbox_score : giftbox_score
            },function () {
                location.reload();
            });
        }

    }
</script>
<script>
    var draw = Chart.controllers.line.prototype.draw;
    Chart.controllers.line = Chart.controllers.line.extend({
        draw: function() {
            draw.apply(this, arguments);
            var ctx = this.chart.chart.ctx;
            var _stroke = ctx.stroke;
            ctx.stroke = function() {
                ctx.save();
                ctx.shadowColor = 'red';
                ctx.shadowBlur = 20;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 4;
                _stroke.apply(this, arguments)
                ctx.restore();
            }
        }
    });

    $(function () {

        var speedCanvas = document.getElementById("speedChart");
        var pricebackend = [];
        var pricelineup = [];
        var priceweb = [];
        var Byday = [];
        $.getJSON("<?=site_url('Api/checklinesaler')?>", function (data) {
            console.log(data)
            $.each(data, function (k, v) {
                if (v['priceBackend'] == null) {
                    pricebackend.push(0);
                } else {
                    pricebackend.push(v['priceBackend']);
                }

                if (v['priceLineup'] == null) {
                    pricelineup.push(0);
                } else {
                    pricelineup.push(v['priceLineup']);
                }

                if (v['priceWeb'] == null) {
                    priceweb.push(0);
                } else {
                    priceweb.push(v['priceWeb']);
                }


                Byday.push(v['computeday'])
            });
            var dataFirst = {
                label: "ยอดขายปลีก",
                data: pricebackend,
//                lineTension: 0,

                backgroundColor: "#fcabb9",
                borderWidth: 5,
//                borderColor: '#fcabb9'
                borderColor: '#fcabb9',
                pointBackgroundColor: "#fff",
                pointBorderColor: "#fcabb9",
                pointHoverBackgroundColor: "#fcabb9",
                pointHoverBorderColor: "#fff",
                pointRadius: 5,
                pointHoverRadius: 5,
                fill: false,

            };

            var dataSecond = {
                label: "ยอดขายคัวแทน",
                data: pricelineup,
//                lineTension: 0,
                backgroundColor: "#46b8f8",
                borderWidth: 5,
//                borderColor: '#46b8f8'
                borderColor: '#46b8f8',
                pointBackgroundColor: "#fff",
                pointBorderColor: "#46b8f8",
                pointHoverBackgroundColor: "#46b8f8",
                pointHoverBorderColor: "#fff",
                pointRadius: 5,
                pointHoverRadius: 5,
                fill: false,
            };

            var dataThrid = {
                label: "ยอดสั่งชื้อ",
                data: priceweb,
//                lineTension: 0,
                fill: false,
                backgroundColor: "#5b68d6",
                borderWidth: 4,

                borderColor: '#5b68d6',
                pointBackgroundColor: "#fff",
                pointBorderColor: "#5b68d6",
                pointHoverBackgroundColor: "#5b68d6",
                pointHoverBorderColor: "#fff",
                pointRadius: 5,
                pointHoverRadius: 5,

            };

            var speedData = {
                labels: Byday,
                datasets: [dataFirst, dataSecond, dataThrid]
            };

            var chartOptions = {
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        boxWidth: 80,
                        fontColor: 'black'
                    },
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            };

            var lineChart = new Chart(speedCanvas, {
                type: 'line',
                data: speedData,
                options: chartOptions,

            });
        });


    })


</script>
