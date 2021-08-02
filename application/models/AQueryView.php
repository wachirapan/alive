<?php

class AQueryView extends CI_Model
{
    function get_membersedit($member_id)
    {
        return $this->db->select('*')->from('member')->where('member_id', $member_id)->get()->result();
    }

    function get_province_edit($province_id)
    {
        return $this->db->select('*')->from('province')->where('id', $province_id)->get()->result();
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

    function check_membername($member_id)
    {
        $name = '';
        $data = $this->db->select('*')->from('member')->where('member_id', $member_id)->get()->result();
        foreach ($data as $item) {
            $name = '[' . $item->member_code . '] ' . $item->member_name;
        }
        return $name;
    }

    function category()
    {
        return $this->db->select('*')->from('category')->get()->result();
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

    function check_sliper($ordermove_id)
    {
        $path = '';
        $sliper = $this->db->select('*')->from('sliper')->where('ordermove_id', $ordermove_id)
            ->get()->result();
        foreach ($sliper as $item) {
            $path = base_url('images/slipers/' . $item->sliper_img);
        }
        return $path;
    }

    function get_memberspurchase($ordermove_id)
    {
        return $this->db->select('*')->from('ordermove')
            ->join('original_member', 'ordermove.member_original_id = original_member.ormember_id')
            ->where('ordermove_id', $ordermove_id)->get()->result();
    }

    function get_provincename($province_id)
    {
        $province_name = "";
        $province = $this->db->select('*')->from('province')->where('id', $province_id)->get()->result();
        foreach ($province as $item) {
            $province_name = $item->name;
        }
        return $province_name;
    }

    function get_membershippurchase($ordermove_id)
    {
        return $this->db->select('*')->from('ordermove')
            ->join('member', 'ordermove.members_id = member.member_id')
            ->where('ordermove_id', $ordermove_id)->get()->result();
    }

    function get_ordermovedetail($ordermove_id)
    {
        return $this->db->select('*')->from('ordermoveline')
            ->join('product', 'ordermoveline.product_id = product.product_id')
            ->where('ordermove_id', $ordermove_id)
            ->get()->result();
    }

    function get_editgiftbox($giftbox_id)
    {
        return $this->db->select('*')->from('giftbox')->where('giftbox_id', $giftbox_id)->get()->result();
    }

    function check_sumgroupday($groupbyday_id)
    {
        $price = 0.00;
        $data = $this->db->select('*')->from('ordermove')
            ->where('computeday_id', $groupbyday_id)
            ->get()->result();
        foreach ($data as $item) {
            $price += $item->ordermove_price;
        }
        return $price;
    }

    function check_detailorder($ordermove_id)
    {
        return $this->db->select('*')->from('ordermoveline')
            ->join('product', 'ordermoveline.product_id = product.product_id')
            ->where('ordermove_id', $ordermove_id)
            ->get()->result();
    }

    function get_orderpositionreport($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(discount_price) as qty')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->get()->result();
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

    function get_orderlineup($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(position_price) as qty')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->get()->result();
        foreach ($data as $item) {
            $price = $item->qty;
        }
        return $price;
    }

    function get_sumrecommend($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('SUM(recommend_value) as qty')->from('month_end_summary')
            ->where('groupmount_id', $compilemount_id)
            ->get()->result();
        foreach ($data as $item) {
            $price = $item->qty;
        }
        return $price;
    }

    function check_positionname($position_id)
    {
        $name = '';
        $data = $this->db->select('*')->from('position')->where('position_id',$position_id)->get()->result();
        foreach ($data as $item){
            $name = $item->position_name;
        }
        return $name ;
    }

    function sum_recommend_value($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('*')->from('month_end_summary')->where('groupmount_id', $compilemount_id)
            ->get()->result();
        foreach ($data as $item) {
            $price += $item->recommend_value;
        }
        return $price;
    }
    function sum_discount_price($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('*')->from('month_end_summary')->where('groupmount_id', $compilemount_id)
            ->get()->result();
        foreach ($data as $item) {
            $price += $item->discount_price;
        }
        return $price;
    }
    function sum_position_price($compilemount_id)
    {
        $price = 0.00;
        $data = $this->db->select('*')->from('month_end_summary')->where('groupmount_id', $compilemount_id)
            ->get()->result();
        foreach ($data as $item) {
            $price += $item->position_price;
        }
        return $price;
    }
    function check_position($position_id)
    {
        $name = '';
        $data = $this->db->select('*')->from('position')->where('position_id',$position_id)->get()->result();
        foreach ($data as $item){
            $name = $item->position_name;
        }
        return $name ;
    }
    function category_blogs()
    {
        return $this->db->select('*')->from('category_blogs')->get()->result();
    }
    function edit_review($blogs_id)
    {
        return $this->db->select('*')->from('blogs')
            ->join('category_blogs',' blogs.category_blog_id= category_blogs.category_blog_id')
            ->where('blogs_id',$blogs_id)
            ->get()->result();
    }
    function get_about()
    {
        return $this->db->select('*')->from('abount')->where('admin',1)->get()->result();
    }
    function get_sociallink($status)
    {
        $name = '';
        $social =  $this->db->select('*')->from('social')->where('social_id',$status)->get()->result();
        foreach ($social as $item){
            $name = $item->social_link ;
        }
        return $name ;
    }
    function check_amphures($id)
    {
        return $this->db->select('*')->from('amphures')->where('id',$id)->get()->result();
    }
    function check_districts($id)
    {
        return $this->db->select('*')->from('districts')->where('id',$id)->get()->result();
    }
    function get_question($question_id)
    {
        return $this->db->select('*')->from('question')->where('question_id', $question_id)->get()->result();
    }
    function get_answer_question($question_id)
    {
        return $this->db->select('*')->from('answer_question')->where('question_id', $question_id)->get()->result();

    }
}