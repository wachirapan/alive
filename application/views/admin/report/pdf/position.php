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
        <td>ชื่อ สกุล</td>
        <td>คะแนนรวม(เดือน)</td>
        <td>รับแล้ว</td>
        <td>จ่ายคืน</td>
    </tr>
    <tbody>
    <?php
    $row = 1;
    foreach ($position as $item) {
        ?>
        <tr>
            <td><?= $row ?></td>
            <td><?= '[ ' . $item->members_code . ' ] ' . $item->members_name ?></td>
            <td><?= number_format($this->AQueryView->check_pointbgroup($item->members_id, $item->groupmount_id)); ?></td>
            <td><?= number_format($this->AQueryView->check_pointpayback($item->members_id, $item->groupmount_id)); ?></td>
            <td><?= number_format($item->discount_price) ?></td>
        </tr>
        <?php $cartmove = $this->db->select('*')->from('ordermove')->where('computemonth_id', $item->compilemount_id)
            ->where('members_id', $item->members_id)->get()->result();
        foreach ($cartmove as $o) {
            ?>
            <tr>
                <td>-</td>
                <td><?=$o->ordermove_ref?></td>
                <td><?=number_format($o->ordermove_point)?></td>
                <td><?=number_format($o->ordermove_amountdiscount)?></td>
                <td><?=$o->ordermove_create?></td>
            </tr>
        <?php } ?>
        <?php $row++;
    } ?>
    </tbody>
</table>
</body>
</html>