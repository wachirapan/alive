<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        table td{
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
            <td><?=number_format($this->AQueryView->check_pointbgroup($item->members_id, $item->groupmount_id));?></td>
            <td><?=$this->BQueryView->check_pointpayback($item->members_id, $item->groupmount_id);?></td>
        </tr>
        <?php $row++;
    } ?>
    </tbody>
</table>
</body>
</html>