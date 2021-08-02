<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div style="background-color: #fcabb9; padding-top: 1%; padding-left: 2%">
                <p style="color: white">รายละเอียดยอดขายรายเดือน</p>
            </div>
            <div style=" margin-top: 3%; padding: 10px">
                <?php $member = $this->db->select('*')->from('month_end_summary')
                    ->join('compilemount', 'month_end_summary.groupmount_id = compilemount.compilemount_id')
                    ->where('mes_id', $_GET['mes_id'])
                    ->get()->result();
                foreach ($member as $item) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">รายละเอียด ตำแหน่ง</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive" style="padding: 5px">
                                        <table class="table">
                                            <tr>
                                                <td scope="col">ตำแหน่ง</td>
                                                <td scope="col">จำนวนจ่าย</td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap"><?= $this->AQueryView->check_position($item->position_id); ?></td>
                                                <td class="text-nowrap"><?= number_format($item->position_price) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">รายละเอียด แนะนำ</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive" style="padding: 5px">
                                        <table class="table">
                                            <tr>
                                                <td scope="col">#</td>
                                                <td scope="col">[code] ชื่อ-นามสกุล</td>
                                                <td scope="col">วันที่สมัคร</td>
                                            </tr>

                                            <?php
                                            $date = date_create($item->compilemount_date);
                                            $dateStart = date_format($date, 'Y') . '-' . date_format($date, 'm') . '-1';
                                            $a_date = $item->compilemount_date;
                                            $endDate = date("Y-m-t", strtotime($a_date));
                                            $members = $this->db->select('*')->from('members')
                                                ->where('members_create >=', $dateStart)
                                                ->where('members_create <=', $endDate)
                                                ->where('members_upline', $_GET['members_id'])
                                                ->get()->result();
                                            $row = 1;
                                            foreach ($members as $o) { ?>
                                                <tr>
                                                    <td class="text-nowrap"><?= $row ?></td>
                                                    <td class="text-nowrap">[<?= $o->members_code ?>] <?= $o->members_name ?></td>
                                                    <td class="text-nowrap"><?= $o->members_create ?></td>
                                                </tr>
                                                <?php $row++;
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">รายละเอียด ส่วนลด</span>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive" style="padding: 5px">
                                        <table class="table">
                                            <tr>
                                                <td scope="col">#</td>
                                                <td scope="col"></td>
                                                <td scope="col">คะแนน</td>
                                                <td scope="col">ลดแล้ว</td>
                                                <td scope="col">วันที่</td>
                                            </tr>
                                            <?php $ordermove = $this->db->select('*')->from('ordermove')
                                                ->where('computemonth_id', $item->compilemount_id)
                                                ->where("members_id", $_GET['mes_id'])
                                                ->get()->result();
                                            $row = 1;
                                            foreach ($ordermove as $p) {
                                                ?>
                                                <tr>
                                                    <td class="text-nowrap"><?= $row ?></td>
                                                    <td class="text-nowrap"><?= $p->ordermove_ref ?></td>
                                                    <td class="text-nowrap"><?= number_format($p->ordermove_point) ?></td>
                                                    <td class="text-nowrap"><?= number_format($p->ordermove_amountdiscount) ?></td>
                                                    <td class="text-nowrap"><?= $p->ordermove_create ?></td>
                                                </tr>
                                                <?php $row++;
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>


