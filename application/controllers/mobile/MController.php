<?php

class MController extends CI_Controller
{
    function banner()
    {
        echo json_encode($this->db->select('*')->from('banner')->get()->result());
    }

    function blogs()
    {
        echo json_encode($this->db->select('*')->from('blogs')->where('blogs_views', 1)->get()->result());
    }

    function category()
    {
        echo json_encode($this->db->where('category_drop', 1)->get('category')->result());
    }

    function checkProductCate1()
    {
        $arr = [];
        $product = $this->db->select('*')->from('product')->where('category_id', $_GET['category_id'])->get()->result();
        foreach ($product as $item) {
            $data = array(
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'product_selling_price' => $item->product_selling_price,
                'product_detail' => $item->product_detail,
                'product_promotion' => $item->product_promotion,
                'product_queryty' => $item->product_queryty,
                'product_properties' => $item->product_properties,
                'product_image' => $this->FQueryView->imageproduct_image($item->product_id)
            );
            array_push($arr, $data);
        }
        echo json_encode($arr);
    }

    function productImage()
    {
        echo json_encode($this->db->select('*')->from('product_image')
            ->where('product_id', $_GET['product_id'])
            ->get()->result());
    }
}
