<?php

class AQueryModel extends CI_Model
{
    function check_register($index, $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        if($status == ''){
            return $this->db->select('*')->from('member')->where('member_status',2)->get()->result();
        }else{
            return $this->db->select('*')->from('member')->where('member_status',3)->get()->result();
        }

    }
    function check_register_count($status)
    {
        if($status == ''){
            return $this->db->select('*')->from('member')->where('member_status',2)->get()->num_rows();
        }else{
            return $this->db->select('*')->from('member')->where('member_status',3)->get()->num_rows();
        }
    }

    function get_members($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('member')
            ->where('member_status', 1)
            ->get()->result();
    }

    function get_members_count()
    {
        return $this->db->select('*')->from('member')
            ->where('member_status', 1)
            ->get()->num_rows();
    }
    function search_memberline($index, $row, $member_name)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('member')->where('member_name', $member_name)->get()->result();
    }

    function search_memberline_count($member_name)
    {
        return $this->db->select('*')->from('member')->where('member_name', $member_name)->get()->num_rows();
    }
    function get_crm($index , $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('original_member')->get()->result();
    }
    function get_crm_count()
    {
        return $this->db->select('*')->from('original_member')->get()->num_rows();

    }
    function get_category($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('category')->get()->result();
    }

    function get_category_count()
    {
        return $this->db->select('*')->from('category')->get()->num_rows();
    }
    function productstatus($index, $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        if($status == ''){
            return $this->db->select('*')->from('product')
                ->where('product_admin',1)
                ->order_by('product_id', 'DESC')
                ->get()->result();

        }else{
            return $this->db->select('*')->from('product')
                ->where('product_admin',1)
                ->where('product_status',$status)
                ->order_by('product_id', 'DESC')
                ->get()->result();

        }
    }

    function productstatus_count($status)
    {
        if($status == ''){
            return $this->db->select('*')->from('product')
                ->where('product_admin',1)
                ->order_by('product_id', 'DESC')
                ->get()->num_rows();

        }else{
            return $this->db->select('*')->from('product')
                ->where('product_admin',1)
                ->where('product_status',$status)
                ->order_by('product_id', 'DESC')
                ->get()->num_rows();

        }

    }
    function checkproductsaler($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('product')->where('product_status',2)->get()->result();
    }
    function checkproductsaler_count()
    {
        return $this->db->select('*')->from('product')->where('product_status',2)->get()->num_rows();

    }

    function product_member($index, $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        if($status == ''){
            return $this->db->select('*')->from('product')
                ->where('product_admin',0)
                ->order_by('product_id', 'DESC')
                ->get()->result();

        }else{
            return $this->db->select('*')->from('product')
                ->where('product_admin',0)
                ->where('product_status',$status)
                ->order_by('product_id', 'DESC')
                ->get()->result();

        }
    }
    function product_member_count($status)
    {
        if($status == ''){
            return $this->db->select('*')->from('product')
                ->where('product_admin',0)
                ->order_by('product_id', 'DESC')
                ->get()->num_rows();

        }else{
            return $this->db->select('*')->from('product')
                ->where('product_admin',0)
                ->where('product_status',$status)
                ->order_by('product_id', 'DESC')
                ->get()->num_rows();

        }
    }
    function get_productall($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('product')
            ->where("member_id !=", $this->session->userdata('member_login'))
            ->get()->result();
    }

    function get_productall_count()
    {
        return $this->db->select('*')->from('product')
            ->where("member_id !=", $this->session->userdata('member_login'))
            ->get()->num_rows();
    }
    function get_productallSearch($index, $row, $cate_id)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('product')
            ->where("member_id !=", $this->session->userdata('member_login'))
            ->where('category_id',$cate_id)
            ->get()->result();
    }
    function get_productallSearch_count($cate_id)
    {
        return $this->db->select('*')->from('product')
            ->where("member_id !=", $this->session->userdata('member_login'))
            ->where('category_id',$cate_id)
            ->get()->num_rows();
    }
    function get_purchaseorder($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('ordermove')
            ->order_by('ordermove_id', 'DESC')
            ->where('ordermove_payments', 2)->get()->result();
    }

    function get_purchaseorder_count()
    {
        return $this->db->select('*')->from('ordermove')->where('ordermove_payments', 2)->get()->num_rows();
    }

    function get_sendingcomplete($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('ordermove')
            ->join('express','ordermove.ordermove_id = express.ordermove_id')
            ->order_by('ordermove.ordermove_id', 'DESC')
            ->where('ordermove_payments', 4)->get()->result();
    }
    function get_sendingcomplete_count()
    {
        return $this->db->select('*')->from('ordermove')
            ->join('express','ordermove.ordermove_id = express.ordermove_id')
            ->order_by('ordermove.ordermove_id', 'DESC')
            ->where('ordermove_payments', 4)->get()->num_rows();
    }

    function get_giftvoicher($index , $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        if($status != '') {
            return $this->db->select('*')->from('giftbox')->where('giftbox_drop', 1)
                ->where('giftbox_drop',$status)
                ->order_by('giftbox_id', 'DESC')
                ->get()->result();
        }else{
            return $this->db->select('*')->from('giftbox')->where('giftbox_drop', 1)
                ->order_by('giftbox_id', 'DESC')
                ->get()->result();
        }
    }
    function get_giftvoicher_count($status)
    {
        if($status != ''){
            return $this->db->select('*')->from('giftbox')->where('giftbox_drop',1)
                ->where('giftbox_drop',$status)
                ->order_by('giftbox_id','DESC')
                ->get()->num_rows();
        }else{
            return $this->db->select('*')->from('giftbox')->where('giftbox_drop',1)
                ->order_by('giftbox_id','DESC')
                ->get()->num_rows();
        }
    }
    function get_orderprsent()
    {
        return $this->db->select('*')->from('compileday')
            ->order_by('compileday_id', 'DESC')
            ->get()->result();
    }

    function get_orderprsent_count()
    {
        return $this->db->select('*')->from('compileday')->get()->num_rows();
    }
    function get_detailgroupday($index, $row, $groupbyday_id)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('ordermove')
            ->where('computeday_id', $groupbyday_id)
            ->get()->result();
    }

    function get_detailgroupday_count($groupbyday_id)
    {
        return $this->db->select('*')->from('ordermove')
            ->where('computeday_id', $groupbyday_id)
            ->get()->num_rows();
    }
    function get_positionreport($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('compilemount')
            ->order_by('compilemount_id', 'DESC')
            ->get()->result();
    }

    function get_positionreport_count()
    {
        return $this->db->select('*')->from('compilemount')
            ->order_by('compilemount_id', 'DESC')
            ->get()->num_rows();
    }
    function get_positiondetailreport($index, $row, $group_id)
    {

        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('compilemount')
            ->join('month_end_summary', 'compilemount.compilemount_id = month_end_summary.groupmount_id')
            ->join('member', 'month_end_summary.members_id = member.member_id')
            ->order_by('compilemount_id', 'DESC')
            ->where('compilemount.compilemount_id', $group_id)
            ->get()->result();
    }

    function get_positiondetailreport_count($group_id)
    {
        return $this->db->select('*')->from('compilemount')
            ->join('month_end_summary', 'compilemount.compilemount_id = month_end_summary.groupmount_id')
            ->join('member', 'month_end_summary.members_id = member.member_id')
            ->order_by('compilemount_id', 'DESC')
            ->where('compilemount.compilemount_id', $group_id)
            ->get()->num_rows();
    }
    function get_month_end_summary($index, $row, $group_id)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('month_end_summary')
            ->join('member','month_end_summary.members_id = member.member_id')
            ->where('groupmount_id',$group_id)
            ->get()->result();
    }
    function get_month_end_summary_count($group_id)
    {
        return $this->db->select('*')->from('month_end_summary')
            ->join('member','month_end_summary.members_id = member.member_id')
            ->where('groupmount_id',$group_id)
            ->get()->num_rows();
    }
    function get_categoryblog($index , $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('category_blogs')->get()->result();

    }
    function get_categoryblog_count()
    {
        return $this->db->select('*')->from('category_blogs')->get()->num_rows();
    }
    function get_blogs($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('blogs')
            ->order_by('blogs_id','DESC')
            ->get()->result();
    }

    function get_blogs_count()
    {
        return $this->db->select('*')->from('blogs')
            ->order_by('blogs_id','DESC')
            ->get()->num_rows();

    }
    function get_learnonline($index, $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('learn_online')
            ->where('learn_type',$status)
            ->order_by('learn_id','DESC')
            ->get()->result();
    }
    function get_learnonline_count($status)
    {
        return $this->db->select('*')->from('learn_online')
            ->where('learn_type',$status)
            ->order_by('learn_id','DESC')
            ->get()->num_rows();
    }

    function get_gallary($index, $row, $status)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('gallary')
            ->where('gallary_type',$status)
            ->order_by('gallary_id','DESC')
            ->get()->result();

    }
    function get_gallary_count($status)
    {
        return $this->db->select('*')->from('gallary')
            ->where('gallary_type',$status)
            ->order_by('gallary_id','DESC')
            ->get()->num_rows();

    }
    function get_order_discount($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('order_discount')->get()->result();
    }

    function get_order_discount_cont()
    {
        return $this->db->select('*')->from('order_discount')->get()->num_rows();

    }

    function amount_discount($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('amount_discount')->get()->result();
    }

    function amount_discount_count()
    {
        return $this->db->select('*')->from('amount_discount')->get()->num_rows();
    }
    function get_setting_lineup($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('setting_lineup')->get()->result();
    }

    function get_setting_lineup_count()
    {
        return $this->db->select('*')->from('setting_lineup')->get()->num_rows();
    }
    function get_allsale($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('position')->get()->result();
    }

    function get_allsale_count()
    {
        return $this->db->select('*')->from('position')->get()->num_rows();
    }

    function get_linetoken($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('linetoken')->get()->result();
    }

    function get_linetoken_count()
    {
        return $this->db->select('*')->from('linetoken')->get()->num_rows();

    }
    function get_banners($index , $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('banner')->get()->result();
    }
    function get_banners_count()
    {
        return $this->db->select('*')->from('banner')->get()->num_rows();

    }
    function checkCompany()
    {
        return $this->db->select('*')->from('company')->get()->result();
    }
    function get_contact($index , $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select("*")->from('question')
            ->order_by('question_id','DESC')
            ->get()->result();
    }
    function get_contact_count()
    {
        return $this->db->get('question')->num_rows();

    }
    function check_membername($member_id)
    {
        $member_name = '';
        $data =  $this->db->select('*')->from('member')->where('member_id',$member_id)
            ->get()->result();
        foreach ($data as $item){
            $member_name = $item->member_name ;
        }
        return $member_name ;
    }
    function get_giftboxselect($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('selectgiftbox')
            ->join('giftbox','selectgiftbox.giftbox_id = giftbox.giftbox_id')
            ->order_by('selectgiftbox_date','DESC')
            ->get()->result();
    }
    function get_giftboxselect_count()
    {
        return $this->db->select('*')->from('selectgiftbox')
            ->join('giftbox','selectgiftbox.giftbox_id = giftbox.giftbox_id')
            ->get()->num_rows();
    }
}