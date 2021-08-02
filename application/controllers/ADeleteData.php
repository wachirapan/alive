<?php

class ADeleteData extends CI_Controller
{
    function del_registermember()
    {
        $this->db->where('member_id',$_POST['member_id'])->delete('member');
    }
    function clearRegister()
    {
        $this->session->set_userdata(array(
            'member_name'=>'',
            'register_member_code'=>'',
            'member_pwd'=>''
        ));
        redirect('AController/checkregister','refresh');
        exit();
    }
    function del_members()
    {
        $this->db->where('member_id',$_POST['member_id'])->delete('member');
    }
    function deletecategory()
    {
        $category_id = $_POST['category_id'];
        $file = $_POST['category_image'];

        $this->db->where('category_id',$category_id)->delete('category');


        if ($file && file_exists("./images/category/" . $file)) {
            unlink("./images/category/" . $file);
        }
    }
    function del_product()
    {
        $this->db->where('product_id',$_POST['product_id'])->update('product',array(
            'product_status'=>3
        ));
    }
    function open_product()
    {
        $this->db->where('product_id',$_POST['product_id'])->update('product',array(
            'product_status'=>2
        ));
    }
    function del_giftbox()
    {
        $this->db->where('giftbox_id',$_POST['giftbox_id'])->update('giftbox',array(
            'giftbox_drop'=>2
        ));
    }
    function del_category_blogs()
    {
        $category_blog_id = $_POST['category_blog_id'];
        $this->db->where('category_blog_id',$category_blog_id)->delete('category_blogs');
    }
    function deleteblogs()
    {
        $this->db->where('blogs_id',$_POST['blogs_id'])->delete('blogs');
    }
    function del_learn_online()
    {
        $this->db->where('learn_id',$_POST['learn_id'])->delete('learn_online');
    }
    function del_gallary()
    {
        $gallary_id = $_POST['gallary_id'];
        $image = $_POST['image'];

        $this->db->where('gallary_id',$gallary_id)->delete('gallary');

        if ($image && file_exists(base_url('images/gallary/') . $image)) {
            unlink(base_url('images/gallary/') . $image);
        }
    }
    function del_orderdiscount()
    {
        $order_discount_id = $_POST['order_discount_id'];
        $this->db->where('order_discount_id', $order_discount_id)->delete('order_discount');
    }
    function del_amountdiscount()
    {
        $amount_discount_id = $_POST['amount_discount_id'];
        $this->db->where('amount_discount_id', $amount_discount_id)->delete('amount_discount');
    }
    function del_setting_lineup()
    {
        $setting_lineup_id = $_POST['setting_lineup_id'];
        $this->db->where('setting_lineup_id',$setting_lineup_id)->delete('setting_lineup');
    }
    function del_position()
    {
        $this->db->where('position_id',$_POST['position_id'])->delete('position');
    }
    function del_linetoken()
    {
        $linetoken_id = $_POST['linetoken_id'];
        $this->db->where('linetoken_id', $linetoken_id)->delete('linetoken');
    }
    function del_banner()
    {
        $this->db->where('banner_id',$_POST['banner_id'])->delete('banner');
    }
}