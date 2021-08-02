<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายละเอียดส่วนลดยอดสั่งชื้อ</p>
            </div>
            <div style="margin-top: 3%; padding: 10px">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 1%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">ชื่อ สกุล</td>
                                    <td scope="col">คะแนนรวม(เดือน)</td>
                                    <td scope="col">รับแล้ว</td>
                                    <td scope="col">จ่ายคืน</td>
                                </tr>
                                <tbody>
                                <?php
                                $row = 1;
                                foreach ($position as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $row ?></td>
                                        <td class="text-nowrap"><?= '[ ' . $item->members_code . ' ] ' . $item->members_name ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->check_pointbgroup($item->members_id, $item->groupmount_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format($this->AQueryView->check_pointpayback($item->members_id, $item->groupmount_id)); ?></td>
                                        <td class="text-nowrap"><?= number_format($item->discount_price) ?></td>
                                    </tr>
                                    <?php $cartmove = $this->db->select('*')->from('ordermove')->where('computemonth_id', $item->compilemount_id)
                                        ->where('members_id', $item->members_id)->get()->result();
                                    foreach ($cartmove as $o) {
                                        ?>
                                        <tr>
                                            <td class="text-nowrap">-</td>
                                            <td class="text-nowrap"><?= $o->ordermove_ref ?></td>
                                            <td class="text-nowrap"><?= number_format($o->ordermove_point) ?></td>
                                            <td class="text-nowrap"><?= number_format($o->ordermove_amountdiscount) ?></td>
                                            <td class="text-nowrap"><?= $o->ordermove_create ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php $row++;
                                } ?>
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



