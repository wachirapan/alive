<?php

class BDeleteData extends CI_Controller
{
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
    function delete_cartmockupline()
    {
        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->where('product_id',$_POST['product_id'])->delete('cartmockupline');
    }
    function deletedata_mockup()
    {
        $this->db->where('cartmockupline_id',$_POST['cartmockupline_id'])->delete('cartmockupline');
    }
}