<?php

class FDeleteData extends CI_Controller
{
    function cancleOrder()
    {
        $this->db->where('cartmockup_id',$_SESSION['mockup_id'])
            ->delete('cartmockupline');
        $this->db->where('cartmockup_id',$_SESSION['mockup_id'])
            ->delete('cartmockup');

//        redirect('welcome/index','refresh');
//        exit();
    }

    function deletedata_mockup()
    {
        $this->db->where('cartmockupline_id',$_POST['cartmockupline_id'])->delete('cartmockupline');
    }
    function delete_cartmockupline()
    {
        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->where('product_id',$_POST['product_id'])->delete('cartmockupline');
    }
}