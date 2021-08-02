<?php

/**
 * Created by PhpStorm.
 * User: title
 * Date: 7/29/2021
 * Time: 1:31 PM
 */
class BQueryModel extends CI_Model
{
    function purchaseWeb($compileday_id)
    {
        $price = 0 ;
        $check = $this->db->select('SUM(ordermove_price) as pricedist')->from('ordermove')
            ->where('computeday_id',$compileday_id)
            ->where_in('owner_id',$this->session->userdata('member_login'))
            ->get()->result();
        foreach ($check as $o){
            $price = $o->pricedist ;
        }
        return $price ;
    }
    function purchaseBackend($compileday_id)
    {
        $price = 0 ;
        $check = $this->db->select('SUM(ordermove_price) as pricedist')->from('ordermove')
            ->where('computeday_id',$compileday_id)
            ->where_in('members_id',$this->session->userdata('member_login'))
            ->get()->result();
        foreach ($check as $o){
            $price = $o->pricedist ;
        }
        return $price ;
    }
    function priceOrderline($compileday_id)
    {
        $this->get_categories($_SESSION['member_login']);
        $price = 0 ;
        $check = $this->db->select('SUM(ordermove_price) as pricedist')->from('ordermove')
            ->where('computeday_id',$compileday_id)
            ->where_in('members_id',$_SESSION['lineup'])
            ->get()->result();
        foreach ($check as $o){
            $price = $o->pricedist ;
        }
        return $price ;

    }
    function checkdatecompile($compileday_id)
    {
        $day = '';
        $data = $this->db->select('*')->from('compileday')
            ->where('compileday_id',$compileday_id)->get()->result();
        foreach ($data as $item){
            $day = $item->compileday_date ;
        }
        return $day ;
    }

    public function get_categories($member_id){
        $this->session->set_userdata(array('lineup'=>[]));

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $member_id);

        $parent = $this->db->get();

        $categories = $parent->result();

        $i= 0 ;
        foreach($categories as $p_cat){
            array_push($_SESSION['lineup'],$p_cat->member_id);

            $categories[$i]->sub = $this->sub_categories($p_cat->member_id);
            $i++;
        }
        return $categories;
    }

    public function sub_categories($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_upline', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            array_push($_SESSION['lineup'],$p_cat->member_id);

            $categories[$i]->sub = $this->sub_categories($p_cat->member_id);
            $i++;
        }
        return $categories;
    }

    function lineupmemberagent($index, $row)
    {
        $arr = [];
        $this->get_categories($this->session->userdata('member_login'));
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        if(!empty($_SESSION['lineup'])){
            $data = $this->db->select('*')->from('member')->where_in('member_id', $_SESSION['lineup'])->get()->result();
            foreach ($data as $item){
                array_push($arr, $item);
            }
        }
        return $arr ;
    }

    function lineupmemberagent_count()
    {
        $row = 0 ;
        if(!empty($_SESSION['lineup'])){
            $row = $this->db->select('*')->from('member')->where_in('member_id', $_SESSION['lineup'])->get()->num_rows();
        }
        return $row ;
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
    function salerscrm($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('ordermove')
            ->join('original_member','ordermove.member_original_id = original_member.ormember_id')
            ->where('owner_id',$this->session->userdata('member_login'))
            ->get()->result();
    }
    function salerscrm_count()
    {
        return $this->db->select('*')->from('ordermove')
            ->join('original_member','ordermove.member_original_id = original_member.ormember_id')
            ->where('owner_id',$this->session->userdata('member_login'))
            ->get()->num_rows();
    }
    function linegroup($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('linetoken')->where('linetoken_status',0)->get()->result();
    }
    function linegroup_count()
    {
        return $this->db->select('*')->from('linetoken')->where('linetoken_status',0)->get()->num_rows();

    }
    function get_productforme($index, $row, $status)
    {
        if ($status == '') {
            $length = $row;
            $start = ($index - 1) * $length;
            $this->db->limit($length, $start);
            return $this->db->select('*')->from('product')
                ->where("member_id", $this->session->userdata('member_login'))
                ->where('product_status !=', 3)
                ->get()->result();
        } else if ($status == 3) {
            $length = $row;
            $start = ($index - 1) * $length;
            $this->db->limit($length, $start);
            return $this->db->select('*')->from('product')
                ->where("member_id", $this->session->userdata('member_login'))
                ->where('product_status', 3)
                ->get()->result();
        }

    }

    function get_productforme_count($status)
    {
        if ($status == '') {
            return $this->db->select('*')->from('product')
                ->where("member_id", $this->session->userdata('member_login'))
                ->where('product_status !=', 3)
                ->get()->num_rows();
        } else if ($status == 3) {
            return $this->db->select('*')->from('product')
                ->where("member_id", $this->session->userdata('member_login'))
                ->where('product_status', 3)
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
    function orderpurchase($index, $row)
    {

        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('ordermove')
            ->where('members_id', $this->session->userdata('member_login'))
            ->or_where('owner_id',$_SESSION['member_login'])
            ->order_by('ordermove_id', 'DESC')
            ->get()->result();
    }

    function orderpurchase_count()
    {
        return $this->db->select('*')->from('ordermove')
            ->where('members_id', $this->session->userdata('member_login'))
            ->or_where('owner_id',$_SESSION['member_login'])
            ->get()->num_rows();
    }
    function get_giftvoicher($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);

        return $this->db->select('*')->from('giftbox')->where('giftbox_drop', 1)
            ->order_by('giftbox_id', 'DESC')
            ->get()->result();

    }
    function get_giftvoicher_count()
    {
        return $this->db->select('*')->from('giftbox')->where('giftbox_drop', 1)
            ->order_by('giftbox_id', 'DESC')
            ->get()->num_rows();
    }
    function check_subdoamin(){
        return $this->db->select('*')->from('subdirectory')->where('member_id',$this->session->userdata('member_login'))
            ->get()->result();
    }
    function report_score($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('memberpoint')
            ->where('member_id',$this->session->userdata('member_login'))
            ->order_by('memberpoint_date','DESC')
            ->get()->result();
    }
    function report_score_count()
    {
        return $this->db->select('*')->from('memberpoint')
            ->where('member_id',$this->session->userdata('member_login'))
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
    function coursesound($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('learn_online')->order_by('learn_id','DESC')
            ->where('learn_type','sound')
            ->get()->result();
    }
    function coursesound_count()
    {
        return $this->db->select('*')->from('learn_online')->order_by('learn_id','DESC')
            ->where('learn_type','sound')
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
    function get_contactus($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('question')
            ->where('member_id',$this->session->userdata('member_login'))
            ->order_by('question_id','DESC')
            ->get()->result();
    }
    function get_contactus_count()
    {
        return $this->db->select('*')->from('question')
            ->where('member_id',$this->session->userdata('member_login'))
            ->order_by('question_id','DESC')
            ->get()->num_rows();
    }
    function update_point($sumpoint,$price)
    {
        $date=date_create(date('Y-m-d'));
        $mount = date_format($date,"m");

        $checkpoint = $this->db->select('*')->from('memberpoint')
            ->where('member_id',$this->session->userdata('member_login'))->get()->result();
        if(count($checkpoint) > 0){
            foreach ($checkpoint as $item){
                $datedb = date_create($item->memberpoint_date);
                if($mount == date_format($datedb,'m')){
                    $sumpoint = $item->memberpoint_number + $sumpoint ;
                    $sumprice = $item->memberpoint_price + $price ;
                    $this->db->where('memberpoint_id',$item->memberpoint_id)->update('memberpoint',array(
                        'memberpoint_number'=>$sumpoint,
                        'memberpoint_price'=>$sumprice
                    ));
                }else{
                    $this->db->insert('memberpoint',array(
                        'member_id'=>$this->session->userdata('member_login'),
                        'memberpoint_number'=>$sumpoint,
                        'memberpoint_date'=>date('Y-m-d'),
                        'memberpoint_price'=>$price
                    ));
                }
            }
        }else{
            $this->db->insert('memberpoint',array(
                'member_id'=>$this->session->userdata('member_login'),
                'memberpoint_number'=>$sumpoint,
                'memberpoint_date'=>date('Y-m-d'),
                'memberpoint_price'=>$price
            ));
        }
    }
    function get_selectGiftbox($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('selectgiftbox')
            ->join('giftbox','selectgiftbox.giftbox_id = giftbox.giftbox_id')
            ->where('member_id',$_SESSION['member_login'])
            ->get()->result();
    }
    function get_selectGiftbox_count()
    {
        return $this->db->select('*')->from('selectgiftbox')
            ->join('giftbox','selectgiftbox.giftbox_id = giftbox.giftbox_id')
            ->where('member_id',$_SESSION['member_login'])
            ->get()->num_rows();
    }
}