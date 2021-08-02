<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=difference' . date("Y-m-d") . '.xls');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>
<table class="table">
    <tr>
        <th>#</th>
        <th>ชื่อ สกุล</th>
        <th>รายได้</th>
        <th>คะแนนรวม</th>
        <th>รับแล้ว</th>
    </tr>
    <tbody>
    <?php
    $row = 1;
    foreach ($position as $item) {
        ?>
        <tr>
            <td><?= $row ?></td>
            <td><?='[ '.$item->members_code.' ] '. $item->members_name ?></td>
            <td><?=number_format($item->discount_price)?></td>
            <td><?=number_format($this->BQueryView->check_pointbgroup($item->members_id, $item->groupmount_id));?></td>
            <td><?=$this->BQueryView->check_pointpayback($item->members_id, $item->groupmount_id);?></td>
        </tr>
        <?php $row++;
    } ?>
    </tbody>
</table>
</body>
</html>