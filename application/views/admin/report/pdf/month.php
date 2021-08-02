<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        table  td{
            border: 1px solid black;
            width: 100%;
        }
    </style>
</head>
<body>
<div style="float: left">
    <img src="<?=base_url('assets/logoalive.png')?>" style="width: 20%;"/>

</div>
<div style="float: left">

</div>
<div style="clear: both"></div>
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