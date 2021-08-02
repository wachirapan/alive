<div style="height: 30px"></div>
<hr style="background-color: #f7a4b2; border: 1px solid #f7a4b2">
<div class="footer" style="background-color: #222222; margin-top: -16px;  position: inherit;left: 0;width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 3%">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/logo3.png') ?>" style="width: 10%"/>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <ul style="list-style: none outside none; margin:0; padding: 0; text-align: center; ">
                    <li class="font-mobile" style="margin: 0 10px; display: inline; color: white">BRANDS</li>
                    <li class="font-mobile" style="margin: 0 10px; display: inline; color: white">MEDIA</li>
                    <li class="font-mobile" style="margin: 0 10px; display: inline; color: white">PR AGENCIES</li>
                </ul>
                <hr style="border: 1px solid black; background-color: #222222; width: 80%">
            </div>
            <div class="col-md-12">
                <ul style="list-style: none outside none; margin:0; padding: 0; text-align: center; ">
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="mainwebsite('index');">หน้าหลัก</li>
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="mainwebsite('productall');">ผลิตภัณฑ์</li>
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="mainwebsite('');">วิธีการสั่งชื้อ</li>
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="mainwebsite('lerningcenter');">รีวิว&ศูนย์การเรียนรู้</li>
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="mainwebsite('orderlist');">ตรวจสอบการสั่งชื้อ</li>
                    <li class="font-mobile" style="margin: 0 5px; display: inline; color: white" onclick="contact">ติดต่อเรา</li>
                </ul>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <div class="row">
                    <div class="col-md-4 col-3"></div>
                    <div class="col-md-1 col-1">
                        <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid black;">
                            <i class="fa fa-facebook" style="padding: 7px; color: white"></i>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid black;">
                            <i class="fa fa-twitter" style="padding: 7px; color: white"></i>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid black;">
                            <i class="fa fa-pinterest-p" style="padding: 7px; color: white"></i>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid black;">
                            <i class="fa fa-linkedin" style="padding: 7px; color: white"></i>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div style="width: 30px; height: 30px; border-radius: 50%; border: 2px solid black;">
                            <i class="fa fa-instagram" style="padding: 7px; color: white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <div class="text-center">
                    <p class="font-mobile" style="color: grey">Teams & Conditions Privacy Policy <br/>
                        Copyright &copy; 2021 Flaunter, Ltd, All rights reserved. Site credit</p>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function mainwebsite(slug) {
        location.href = "<?=site_url('Website/')?>"+slug;
    }
</script>
</body>
</html>
