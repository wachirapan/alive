
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                    <p style="color: white">สรุปรายได้รายวัน</p>
                </div>
                <div style=" margin-top: 3%; padding: 10px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr >
                                        <td scope="col">#</td>
                                        <td scope="col">วันที่สั่ง</td>
                                        <td scope="col">จำนวนเงิน</td>
                                        <td scope="col">รายการสินค้า</td>
                                        <td scope="col">จำนวน</td>
                                        <td scope="col">ราคา</td>
                                    </tr>
                                    <tbody>
                                    <?php foreach ($ordermove as $item){
                                        $row = 1 ;?>
                                        <tr>
                                        <td class="text-nowrap"><?=$item->ordermove_ref?></td>
                                        <td class="text-nowrap"><?=$item->ordermove_create?></td>
                                        <td class="text-nowrap"><?=number_format($item->ordermove_price)?></td>
                                        <?php $product = $this->AQueryView->check_detailorder($item->ordermove_id);
                                        foreach ($product as $o){
                                            if($row == 1){?>
                                                <td class="text-nowrap"><?=$o->product_name?></td>
                                                <td class="text-nowrap"><?=$o->ordermoveline_total?></td>
                                                <td class="text-nowrap"><?=number_format($o->ordermoveline_price)?></td>
                                                </tr>
                                            <?php }else{?>
                                                <tr>
                                                    <td class="text-nowrap">-</td>
                                                    <td class="text-nowrap">-</td>
                                                    <td class="text-nowrap">-</td>
                                                    <td class="text-nowrap">-</td>
                                                    <td class="text-nowrap"><?=$o->product_name?></td>
                                                    <td class="text-nowrap"><?=$o->ordermoveline_total?></td>
                                                    <td class="text-nowrap"><?=number_format($o->ordermoveline_price)?></td>
                                                </tr>
                                            <?php } $row++ ;}?>
                                    <?php }?>
                                    </tbody>
                                </table>
                                <?= $links ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



