<style>
    .btn-ping {
        background-color: white;
        color: #fcabb9;
        border: 1px solid #fcabb9;
    }
    @media only screen and (max-width: 700px) {
        .btn-mobile{
            margin-top: 5%;
        }
    }
</style>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">บัตรตัวแทน</p>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-6">
                        <div style="width: 100%; height: 250px; background-image: url('<?=base_url('assets/bg-card.jpg')?>');">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <img src="<?= $this->BQueryView->get_imagemember($this->session->userdata('member_login')) ?>"
                                         style="width: 70px; height: 70px; border-radius: 50%;margin-left: 10px; margin-top: 10px">
                                </div>
                                <div class="col-md-8 col-8">
                                    <img src="<?= base_url('assets/logoalive.png') ?>" style="width: 30%; margin-top: 10px">
                                    <div style="margin-top: 5%">
                                        <?php $member = $this->BQueryView->get_membersprofile($this->session->userdata('member_login'));
                                        foreach ($member as $item) {
                                            ?>
                                            <h6 style="color: black">Serial : <?= $item->member_code ?></h6>
                                            <h6 style="color: black">Name : <?= $item->member_name ?></h6>
                                            <h6 style="color: black">ID Card : <?= $item->member_idcard ?></h6>
                                            <h6 style="color: black">Phone : <?= $item->member_phone ?></h6>
                                            <h6 style="color: black">Address
                                                : <?= $item->member_address . " " . $this->BQueryView->check_province($item->province_id) . ' ' . $item->zipcode ?> </h6>

                                        <?php } ?>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-6 col-12 btn-mobile">
                        <?php $member = $this->BQueryView->get_membersprofile($this->session->userdata('member_login'));
                        foreach ($member as $item) {
                            ?>
                            <h6>Serial : <?= $item->member_code ?></h6>
                            <h6>Name : <?= $item->member_name ?></h6>
                            <h6>ID Card : <?= $item->member_idcard ?></h6>
                            <h6>Phone : <?= $item->member_phone ?></h6>
                            <h6>Address
                                : <?= $item->member_address . " " . $this->BQueryView->check_province($item->province_id) . ' ' . $item->zipcode ?> </h6>

                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-ping form-control btn-mobile" onclick="editprofile();">แก้ไขตัวแทน</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-background form-control btn-mobile">ดาวน์โหลดบัตรตัวแทน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function editprofile() {
        window.location.href = "<?=site_url('Backend/editprofile')?>";
    }
</script>