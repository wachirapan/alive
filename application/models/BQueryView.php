<?php

/**
 * Created by PhpStorm.
 * User: title
 * Date: 7/29/2021
 * Time: 1:31 PM
 */
class BQueryView extends CI_Model
{
    function get_imagemember($member_id)
    {
        $image = '';
        $member = $this->db->select('*')->from('member')->where('member_id', $member_id)->get()->result();
        foreach ($member as $item) {
            if (!empty($item->member_image)) {
                $image = base_url('images/members/' . $item->member_image);
            }
        }
        return $image;
    }
    function get_membersprofile($member_id)
    {
        return $this->db->select('*')->from('member')->where('member_id', $member_id)->get()->result();
    }
    function check_province($province_id)
    {
        $province_name = "";
        $province = $this->db->select('*')->from('province')->where('id', $province_id)->get()->result();
        foreach ($province as $item) {
            $province_name = $item->name;
        }
        return $province_name;
    }
    function check_subdomain()
    {
        $subname = '';
        $data = $this->db->select('*')->from('subdirectory')
            ->where('member_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item) {
            $subname = $item->subdirectory_name;
        }
        return $subname;
    }
    function checklinegroup()
    {
        $line_id = 0 ;
        $data = $this->db->select('*')->from('grouplinetoken')
            ->where('member_id',$this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item){
            $line_id = $item->linetoken_id ;
        }
        return $line_id;
    }
    function imageproduct_image($product_id)
    {
        $image_path = '';
        $product = $this->db->select('*')->from('product_image')->where('product_id', $product_id)
            ->limit(1)
            ->get()->result();
        foreach ($product as $item) {
            $image_path = base_url('images/products/' . $item->product_img);
        }
        return $image_path;
    }
    function get_categry()
    {
        return $this->db->select('*')->from('category')->get()->result();
    }
    function get_editproduct($product_id)
    {
        return $this->db->select('*')->from('product')->where('product_id', $product_id)->get()->result();
    }
    function select_category($category_id)
    {
        return $this->db->select('*')->from('category')->where('category_id', $category_id)->get()->result();
    }
    function get_orderlinemockup()
    {
        return $this->db->select('*')->from('cartmockupline')
            ->join('product', 'cartmockupline.product_id = product.product_id')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
    }
    function check_amountdiscount($point)
    {

        $price = 0;
        $discount = $this->db->select('*')->from('amount_discount')
            ->where('score_before <=', $point)
            ->where('score_after >=', $point)
            ->get()->result();

        foreach ($discount as $item) {
            $price = (($point * $item->amount_discount_payback) / 100);
        }
        return $price;
    }
    function get_checkpoint()
    {
        $point = 0.00;
        $mockup = $this->db->select('*')->from('cartmockupline')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
        foreach ($mockup as $item) {
            $point += ($item->product_point * $item->product_total);
        }

        return $point;
    }
    function check_point()
    {
        $point = 0.00 ;
        $data = $this->db->select('*')->from('memberpoint')
            ->where('member_id',$this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item){
            $point += $item->memberpoint_number ;
        }
        return $point ;
    }
    function change_month($month)
    {
        $txt = '';
        if ($month == '01') {
            $txt = 'มกราคม';
        } else if ($month == '02') {
            $txt = 'กุมภาพันธ์';
        } else if ($month == '03') {
            $txt = 'มีนาคม';
        } else if ($month == '04') {
            $txt = 'เมษายน';
        } else if ($month == '05') {
            $txt = 'พฤษภาคม';
        } else if ($month == '06') {
            $txt = 'มิถุนายน';
        } else if ($month == '07') {
            $txt = 'กรกฎาคม';
        } else if ($month == '08') {
            $txt = 'สิงหาคม';
        } else if ($month == '09') {
            $txt = 'กันยายน';
        } else if ($month == '10') {
            $txt = 'ตุลาคม';
        } else if ($month == '11') {
            $txt = 'พฤศจิกายน';
        } else if ($month == '12') {
            $txt = 'ธันวาคม';
        }
        return $txt;
    }
    function change_years($years)
    {
        return $years + 543;
    }
    function check_pointpayback($members_id, $group_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(ordermove_amountdiscount) as qty')->from('ordermove')->where('computemonth_id', $group_id)
            ->where('members_id', $members_id)->get()->result();
        foreach ($data as $item) {
            $price = $item->qty;
        }
        return $price;
    }
    function check_pointbgroup($members_id, $group_id)
    {
        $point = 0.00;
        $data = $this->db->select('SUM(ordermove_point) as qty')->from('ordermove')->where('computemonth_id', $group_id)
            ->where('members_id', $members_id)->get()->result();
        foreach ($data as $item) {
            $point = $item->qty;
        }
        return $point;
    }
    function get_orderpositionreport($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(discount_price) as qty')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->where('members_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item) {
            $price = $item->qty;
        }
        return $price;
    }
    function get_orderlineup($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(position_price) as qty')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->where('members_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item) {
            $price = $item->qty;
        }
        return $price;
    }
    function checkposition($groupmount_id)
    {
        $name = "";
        $data = $this->db->select('SUM(ordermove_point) as qty')->from('ordermove')
            ->where('computemonth_id', $groupmount_id)
            ->where('members_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item) {
            if($item->qty != 0){
                $position = $this->db->select('*')->from('position')->where('position_price <=', $item->qty)
                    ->where('position_to >=', $item->qty)->get()->result();
                foreach ($position as $o) {
                    $name = $o->position_name;
                }
            }

        }
        return $name;
    }
    function get_recommendvalue($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('*')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->where('members_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($data as $item) {
            $price = $item->recommend_value;
        }
        return $price;
    }
    function learn_online()
    {
        return $this->db->select('learn_Instructor')->from('learn_online')->group_by('learn_Instructor')->get()->result();
    }
    function get_videoone($learn_Instructor)
    {
        $url = '';
        $data = $this->db->select('*')->from('learn_online')
            ->where('learn_Instructor', $learn_Instructor)->limit(1)->get()->result();
        foreach ($data as $item) {
            $url =  'https://www.youtube.com/embed/'.$item->learn_link;
        }
        return $url;
    }
    function leasononline($learn_Instructor)
    {
        return $this->db->select('*')->from('learn_online')
            ->where('learn_Instructor', $learn_Instructor)->get()->result();

    }
    function get_question($question_id)
    {
        return $this->db->select('*')->from('question')->where('question_id', $question_id)->get()->result();
    }
    function get_answer_question($question_id)
    {
        return $this->db->select('*')->from('answer_question')->where('question_id', $question_id)->get()->result();

    }
    function get_membername($member_id, $member_original_id)
    {
        $name = '';
        if(!empty($member_id)){
            $member = $this->db->select('*')->from('member')->where('member_id', $member_id)->get()->result();
            foreach ($member as $item) {
                $name = $item->member_name;
            }
        }else{
            $member = $this->db->select('*')->from('original_member')->where('ormember_id ', $member_original_id)->get()->result();
            foreach ($member as $item) {
                $name = $item->ormember_name;
            }
        }

        return $name;
    }
    function log_loginmember($members_id)
    {
        $date = '';
        $log = $this->db->select('*')->from('log_loginmember')->where('member_id', $members_id)
            ->order_by('log_loginmember_id', 'DESC')
            ->limit(1)
            ->get()->result();
        foreach ($log as $item) {
            $date = $item->login_date;
        }
        return $date;
    }
    function checkSalerOnMe()
    {
        $price = 0.00 ;
        $result = $this->db->select('SUM(ordermove_price) as ordermove_price')->from('ordermove')
            ->where('members_id',$_SESSION['member_login'])
            ->get()->result();
        foreach ($result as $item){
            $price = $item->ordermove_price ;
        }
        return $price ;
    }
    function checkSalerOnWeb()
    {
        $price = 0.00;
        $result = $this->db->select('SUM(ordermove_price) as ordermove_price')->from('ordermove')
            ->where('owner_id',$_SESSION['member_login'])
            ->get()->result();
        foreach ($result as $item){
            $price = $item->ordermove_price;
        }
        return $price ;
    }
    function checkPoints()
    {
        $point = 0.00;
        $result = $this->db->select('SUM(ordermove_point) as ordermove_point')->from('ordermove')
            ->where('members_id',$_SESSION['member_login'])
            ->or_where('owner_id',$_SESSION['member_login'])
            ->get()->result();
        foreach ($result as $item){
            $point = $item->ordermove_point;
        }
        return $point - $this->selectGiftbox() ;
    }

    function selectGiftbox()
    {
        $sum = 0.00;
        $result = $this->db->select('SUM(selectgiftbox_droppoint) as selectgiftbox_droppoint')->from('selectgiftbox')
            ->where('member_id',$_SESSION['member_login'])
            ->where_in('selectgiftbox_status',[1,2])->get()->result();
        foreach ($result as $item){
            $sum = $item->selectgiftbox_droppoint ;
        }
        return $sum ;
    }
    function checkUplineSaler()
    {
        $this->get_categories();
        $price1 = $this->getLineuponWeb();
        $price2 = $this->getLineuponBackend();
        return $price1 + $price2  ;
    }
    function getLineuponWeb()
    {
        $price = 0.00;
        if(!empty($_SESSION['lineup'])) {
            $result = $this->db->select('SUM(ordermove_price) as ordermove_price')->from('ordermove')
                ->where_in('owner_id', $_SESSION['lineup'])
                ->get()->result();
            foreach ($result as $item) {
                $price = $item->ordermove_price;
            }
        }
        return $price ;
    }
    function getLineuponBackend()
    {
        $price = 0.00 ;
        if(!empty($_SESSION['lineup'])){
            $result = $this->db->select('SUM(ordermove_price) as ordermove_price')->from('ordermove')
                ->where_in('members_id',$_SESSION['lineup'])
                ->get()->result();
            foreach ($result as $item){
                $price = $item->ordermove_price ;
            }
        }

        return $price ;
    }
    public function get_categories(){
        $this->session->set_userdata(array('lineup'=>[]));

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $this->session->userdata('member_login'));

        $parent = $this->db->get();

        $categories = $parent->result();

        $i= 0 ;
        foreach($categories as $p_cat){
//            array_push($_SESSION['lineup'],$p_cat->member_id);

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
    function listGiftBox()
    {
        return $this->db->select('*')->from('giftbox')->where('giftbox_drop',1)->get()->result();
    }
}