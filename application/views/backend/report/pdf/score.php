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
<table>
    <tr style="background-color: gainsboro">
        <th>#</th>
        <th>ราคา</th>
        <th>คะแนน</th>
        <th>ชื้อจาก</th>
        <th>วันที่</th>
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