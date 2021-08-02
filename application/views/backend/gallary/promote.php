<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">ภาพโปรโมท</p>
            </div>
            <div class="row" style="padding: 20px">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td></td>
                            <td>เนื้อหา</td>
                            <td>โหลด</td>
                        </tr>
                        <tbody>
                        <?php foreach ($gallary as $item) { ?>
                            <tr>
                                <td><img src="<?= base_url('images/gallary/' . $item->gallary_img) ?>"
                                         style="width: 50px; height: 50px; border-radius: 50%"></td>
                                <td><?= $item->gallary_content ?></td>
                                <td><a href="<?= $item->gallary_link ?>" target="_blank"><i
                                                class="fa fa-download fa-lg"></i></a></td>
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


<input type="hidden" id="gallary_id">
<script>
    $(document).ready(function () {
        $('#btn-update').hide();
    });
    function create_course() {
        if ($('#txt_content').val() == '' || $('#tearcher').val() == '' || $('#linkcourse').val() == '') {
            alert('กรุณากรอกข้อมูลให้ครบด้วยค่ะ');
        } else {
            if (confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')) {
                $.post("<?=site_url('AInsertData/create_gallary')?>", {
                    content: $('#txt_content').val(),
                    link: $('#linkcourse').val(),
                    status: 'promote'
                }, function () {
                    location.reload();
                });
            }
        }

    }
    function setedit(gallary_id, gallary_link, gallary_content) {
        $("#gallary_id").val(gallary_id);
        $('#txt_content').val(gallary_content);
        $('#linkcourse').val(gallary_link);

        $('#btn-update').show();
        $('#btn-create').hide();

    }
    function confirm_update() {
        if (confirm('ยืนยันการจัดเก็บข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('AUpdateData/update_gallary')?>", {
                gallary_id: $("#gallary_id").val(),
                content: $('#txt_content').val(),
                link: $('#linkcourse').val()
            }, function () {
                location.reload();
            });
        }
    }
    function del_link(gallary_id) {
        if (confirm('ยืนยันการลบข้อมูลนี้หรือไม่')) {
            $.post("<?=site_url('ADeleteData/del_gallary')?>", {
                gallary_id: gallary_id
            }, function () {
                location.reload();
            });
        }
    }
</script>
