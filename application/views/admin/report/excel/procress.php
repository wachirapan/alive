<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=procress' . date("Y-m-d") . '.xls');
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
        <th>วันที่สั่ง</th>
        <th>จำนวนเงิน</th>
        <th>รายการสินค้า</th>
        <th>จำนวน</th>
        <th>ราคา</th>
    </tr>
    <tbody>
    <?php foreach ($ordermove as $item) {
        $row = 1; ?>
        <tr>
        <td><?= $item->ordermove_ref ?></td>
        <td><?= $item->ordermove_create ?></td>
        <td><?= number_format($item->ordermove_price) ?></td>
        <?php $product = $this->AQueryView->check_detailorder($item->ordermove_id);
        foreach ($product as $o) {
            if ($row == 1) {
                ?>
                <td><?= $o->product_name ?></td>
                <td><?= $o->ordermoveline_total ?></td>
                <td><?= number_format($o->ordermoveline_price) ?></td>
                </tr>
            <?php } else {
                ?>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?= $o->product_name ?></td>
                    <td><?= $o->ordermoveline_total ?></td>
                    <td><?= number_format($o->ordermoveline_price) ?></td>
                </tr>
            <?php }
            $row++;
        } ?>
    <?php } ?>
    </tbody>
</table>
</body>
</html>