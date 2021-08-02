<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=position' . date("Y-m-d") . '.xls');
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
    <tr style="background-color: #fcabb9; color: white;">
        <th>#</th>
        <th>ชื่อ สกุล</th>
        <th>คะแนนรวม(เดือน)</th>
        <th>รับแล้ว</th>
        <th>จ่ายคืน</th>
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