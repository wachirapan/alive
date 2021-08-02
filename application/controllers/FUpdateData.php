<?php

/**
 * Created by PhpStorm.
 * User: title
 * Date: 7/26/2021
 * Time: 5:18 PM
 */
class FUpdateData extends CI_Controller
{
    function update_cartmockup()
    {
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->where('product_id',$product_id)->update('cartmockupline',array(
                'product_total'=>$total
            ));
    }
}