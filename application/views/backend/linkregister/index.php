<script type="text/javascript" src="<?=base_url('assets/qrcode/')?>qrcode.js"></script>
<style>
    .img-social{
        width: 4%; border-radius: 5px; margin-left: 5px
    }
    @media only screen and (max-width: 700px) {
        .img-social{
            width: 10%; border-radius: 5px; margin-left: 5px
        }
        .magin-mobile-top{
            margin-top: 10%;
        }
        .magin-mobile-left{
            margin-left: 25%!important;
        }
    }
</style>
<div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">แชร์ลิ้งให้ลูกทีมสมัครเอง</p>
                </div>
                <div class="row" style="padding: 20px; margin-bottom: 25%; margin-top: 2%">

                    <div class="col-md-3">
                        <div class="text-center">
                            <!--                            <img src="--><?//=base_url('assets/qrcode.png')?><!--" style="width: 100%" />-->
                            <div class="magin-mobile-left" id="qrcode" style="margin-left: 15%;"></div>
                            <script type="text/javascript">
                                var qrcode = new QRCode(document.getElementById("qrcode"), {
                                    width : 150,
                                    height : 150,
                                });

                                function makeCode () {
                                    qrcode.makeCode("<?=base_url($this->BQueryView->check_subdomain().'/docregister')?>");
                                }

                                makeCode();

                                $("#text").
                                on("blur", function () {
                                    makeCode();
                                }).
                                on("keydown", function (e) {
                                    if (e.keyCode == 13) {
                                        makeCode();
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-md-9" style="margin-top: -17px">
                        <div class="row" style="margin-top: 7%">
                            <div class="col-md-12 magin-mobile-top">
                                <div style="display: inline">
                                    <img src="<?= base_url('assets/icons/facebook.png') ?>" class="img-social">
                                    <img src="<?= base_url('assets/icons/line.png') ?>" class="img-social">
                                    <img src="<?= base_url('assets/icons/instagram.png') ?>" class="img-social" >
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 2%">
                                <div class="input-group mb-3" style="width: 95%">
                                    <input type="text" class="form-control" id="txt-resgister"
                                           value="<?=base_url($this->BQueryView->check_subdomain().'/policy')?>">
                                    <div class="input-group-append" onclick="myFunction();"  style="cursor: pointer">
                                        <span class="input-group-text" style="background-color: #fcabb9; border: 1px solid #fcabb9; color: white">copy ลิ้งค์</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function myFunction() {
        var copyText = document.getElementById("txt-resgister");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");

    }
</script>
