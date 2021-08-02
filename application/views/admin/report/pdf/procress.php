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
    <tr style="background-color: #fcabb9; color: white">
        <td>#</td>
        <td>วันที่สั่ง</td>
        <td>จำนวนเงิน</td>
        <td>รายการสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
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