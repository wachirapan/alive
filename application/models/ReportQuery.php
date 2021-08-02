<?php

class ReportQuery extends CI_Model
{
    function get_score($statdate, $enddate)
    {
        return $this->db->select('*')->from('ordermove')
            ->where('ordermove_create >=',$statdate)
            ->where('ordermove_create <=',$enddate)
            ->where('owner_id',$this->session->userdata('member_login'))
            ->or_where('members_id',$this->session->userdata('member_login'))
            ->get()->result();
    }

    function get_detailgroupday($groupbyday_id)
    {
        return $this->db->select('*')->from('ordermove')
            ->where('computeday_id', $groupbyday_id)
            ->get()->result();
    }
    function get_positiondetailreport($group_id){

        return $this->db->select('*')->from('compilemount')
            ->join('month_end_summary', 'compilemount.compilemount_id = month_end_summary.groupmount_id')
            ->join('member', 'month_end_summary.members_id = member.member_id')
            ->order_by('compilemount_id', 'DESC')
            ->where('compilemount.compilemount_id', $group_id)
            ->get()->result();
    }
    function excelmonth_end_summary($group_id)
    {
        return $this->db->select('*')->from('month_end_summary')
            ->join('member','month_end_summary.members_id = member.member_id')
            ->where('groupmount_id',$group_id)
            ->get()->result();
    }
}