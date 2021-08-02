<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=สรุปรายได้' . date("Y-m-d") . '.xls');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:o="urn:schemas-microsoft-com:office:office"

      xmlns:x="urn:schemas-microsoft-com:office:excel"

      xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<table class="table">
    <tr style="background-color: #fcabb9; color: white">
        <td>#</td>
        <td>[รหัส] ชื่อ-นามสกุล</td>
        <td>ธนาคาร</td>
        <td>เลขที่บัญชี</td>
        <td>แนะนำ</td>
        <td>ส่วนลด</td>
        <td>ปัญผล</td>
        <td>รวม</td>
    </tr>
    <?php
    $row = 1;
    foreach ($month_end_summary as $item) {
        ?>
        <tr>
            <td><?= $row ?></td>
            <td>[<?= $item->member_code ?>] <?= $item->member_name ?></td>
            <td><?=$item->members_bank_name?></td>
            <td><?=$item->members_bank_serial?></td>
            <td><?= number_format($item->recommend_value) ?></td>
            <td><?= number_format($item->discount_price) ?></td>
            <td><?= number_format($item->position_price) ?></td>
            <td><?= number_format($item->recommend_value + $item->discount_price + $item->position_price) ?></td>
        </tr>
        <?php $row++;
    } ?>
</table>
</body>
</html>
