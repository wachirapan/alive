<?php

/**
 * Created by PhpStorm.
 * User: title
 * Date: 7/29/2021
 * Time: 1:30 PM
 */
class BUpdateData extends CI_Controller
{
    function update_profile()
    {
        $member_id = $_POST['member_id'];
        $member_name = $_POST['member_name'];
        $member_phone = $_POST['member_phone'];
        $member_idcard = $_POST['member_idcard'];
        $member_address = $_POST['member_address'];
        $province = $_POST['province'];
        $member_zipcode = $_POST['member_zipcode'];
        $member_email = $_POST['member_email'];
        $memebr_line = $_POST['memebr_line'];
        $memebr_facebook = $_POST['memebr_facebook'];

        $bankname = $_POST['bankname'];
        $deposit = $_POST['deposit'];
        $branch = $_POST['branch'];
        $bank_account = $_POST['bank_account'];
        $bank_serial = $_POST['bank_serial'];

        $member_pwd = $_POST['member_pwd'];


        $data = array(
            'member_name' => $member_name,
            'member_phone' => $member_phone,
            'member_address' => $member_address,
            'province_id' => $province,
            'zipcode' => $member_zipcode,
            'member_idcard' => $member_idcard,
            'member_bank_name' => $bankname,
            'member_bank_branch' => $branch,
            'member_bank_serial' => $bank_serial,
            'member_bank_account' => $bank_account,
            'member_bank_deposit' => $deposit,
            'member_email' => $member_email,
            'member_line' => $memebr_line,
            'member_facebook' => $memebr_facebook,
            'member_pwd' => $member_pwd
        );
        $this->db->where('member_id', $member_id)->update('member', $data);
    }
    function change_password()
    {
        $after_pwd = $_POST['after_pwd'];
        $this->db->where('member_id',$this->session->userdata('member_login'))->update('member',array(
            'member_pwd'=>$after_pwd
        ));
    }
    function update_product()
    {
        $product_id = $_POST['product_id'];
        $category = $_POST['category'];
        $product_name = $_POST['product_name'];
        $cost_price = $_POST['cost_price'];
        $selling_price = $_POST['selling_price'];
        $profit = $_POST['profit'];
        $product_total = $_POST['product_total'];
        $product_express = $_POST['product_express'];
        $editor = $_POST['editor'];

        $editor2 = $_POST['editor2'];
        $promotion = $_POST['promotion'];
        $queryty = $_POST['queryty'];

        $data = array(
            'product_name' => $product_name,
            'product_cost_price' => $cost_price,
            'product_selling_price' => $selling_price,
            'product_profit' => $profit,
            'product_stock' => $product_total,
            'product_detail' => $editor,
            'category_id' => $category,
            'product_tranfer' => $product_express,
            'product_promotion'=>$promotion,
            'product_queryty'=>$queryty,
            'product_properties'=>$editor2
        );
        $this->db->where('product_id', $product_id)->update('product', $data);
    }

    function update_cartmockup()
    {
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->where('product_id',$product_id)->update('cartmockupline',array(
                'product_total'=>$total
            ));
    }
    function update_total_mockup()
    {
        $cartmockupline_id = $_POST['cartmockupline_id'];
        $total_product = $_POST['total_product'];
        $this->db->where('cartmockupline_id',$cartmockupline_id)->update('cartmockupline',
            array(
                'product_total'=>$total_product
            ));
    }
    function cancle_cartmcokup()
    {
        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockup');

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockupline');

        $this->session->set_userdata(array('mockup_id'=>'',''=>''));
    }
    function update_imageprofile()
    {
        $url_picture = $_POST['url_picture'];
        $this->db->where('member_id',$this->session->userdata('member_login'))->update('member',array(
            'member_image'=>$url_picture
        ));
        $this->session->set_userdata(array('member_image'=>$url_picture));
    }
}