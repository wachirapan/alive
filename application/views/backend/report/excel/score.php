<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=point' . date("Y-m-d") . '.xls');
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
        <td>#</td>
        <td>ราคา</td>
        <td>คะแนน</td>
        <td>ชื้อจาก</td>
        <td>วันที่</td>
    </tr>
    <?php foreach ($ordermove as $item){?>
    <tr>
        <td><?=$item->ordermove_ref?></td>
        <td><?=number_format($item->ordermove_price)?></td>
        <td><?=$item->ordermove_price?></td>
        <td><?=($item->ordermove_amountdiscount) ? 'ชื้อเอง' : 'ลูกค้า'?></td>
        <td><?=$item->ordermove_create?></td>
    </tr>
    <?php }?>
</table>
</body>
</html>