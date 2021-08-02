<?php

class FQueryView extends CI_Model
{
    function get_banner()
    {
        return $this->db->get('banner')->result();
    }
    function blogsview()
    {
        return $this->db->select('*')->from('blogs')->where('blogs_views', 1)->get()->result();
    }
    function setmontheng($txt)
    {
        $month = '';
        if ($txt == '01') {
            $month = 'JAN';
        } else if ($txt == '02') {
            $month = 'FEB';
        } else if ($txt == '03') {
            $month = 'MAR';
        } else if ($txt == '04') {
            $month = 'APR';
        } else if ($txt == '05') {
            $month = 'MAY';
        } else if ($txt == '06') {
            $month = 'JUN';
        } else if ($txt == '07') {
            $month = 'JUL';
        } else if ($txt == '08') {
            $month = 'AUG';
        } else if ($txt == '09') {
            $month = 'SEP';
        } else if ($txt == '10') {
            $month = 'OCT';
        } else if ($txt == '11') {
            $month = 'NOV';
        } else if ($txt == '12') {
            $month = 'DEC';
        }
        return $month;
    }
    function get_productdetailnews($category, $product_id)
    {
        return $this->db->select('*')->from('product')
            ->where('category_id', $category)
            ->where('product_id', $product_id)
            ->get()->result();

    }
    function get_productcategory($category)
    {
        return $this->db->select('*')->from('product')
            ->where('category_id', $category)
            ->limit(1)
            ->get()->result();
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
    function get_productimageall($product_id)
    {
        return $this->db->select('*')->from('product_image')->where('product_id', $product_id)->get()->result();
    }
    function check_pricediscount($product_id)
    {
        $arr = [];
        $data = $this->db->select('*')->from('product_discount')->where('product_id', $product_id)
            ->get()->result();
        foreach ($data as $item) {
            $data = array(
                'price_before' => $item->price_before,
                'price_discount' => $item->price_discount,
                'product_discount_percent' => $item->product_discount_percent
            );
            array_push($arr, $data);
        }
        return $arr;
    }
    function checksalerorder($product_id)
    {
        $count = 0 ;
        $data = $this->db->select('COUNT(ordermoveline_total) as ordermoveline_total')->from('ordermoveline')
            ->where('product_id', $product_id)->get()->result();
        foreach ($data as $item) {
            $count = $item->ordermoveline_total ;
        }
        return $count ;
    }

    function get_productother($category)
    {

        return $this->db->select('*')->from('product')
            ->where('category_id', $category)
            ->get()->result();

    }
    function get_orderlinemockup()
    {
        return $this->db->select('*')->from('cartmockupline')
            ->join('product', 'cartmockupline.product_id = product.product_id')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
    }
    function get_tranfer()
    {
        $sumprice = 0.00;
        $data = $this->db->select('*')->from('cartmockupline')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
        foreach ($data as $item) {
            $sumprice += $item->product_tranfer * $item->product_total;
        }
        return $sumprice;
    }
    function get_sumpirce()
    {
        $sumprice = 0.00;
        $data = $this->db->select('*')->from('cartmockupline')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
        foreach ($data as $item) {
            $sumprice += (($item->product_price * $item->product_total) + ($item->product_tranfer * $item->product_total));
        }
        return $sumprice;
    }
    function get_blogcate()
    {
        return $this->db->select('*')->from('category_blogs')->get()->result();
    }
    function get_blogsnews()
    {
        return $this->db->select('*')->from('blogs')
            ->order_by('blogs_id', 'DESC')
            ->limit(5)
            ->get()->result();
    }

    function blogsdetail($blogs_id)
    {
        return $this->db->select('*')->from('blogs')
            ->where('blogs_id', $blogs_id)
            ->get()->result();
    }
    function get_ordermoveline()
    {
        return $this->db->select('*')->from('ordermoveline')
            ->join('product', 'ordermoveline.product_id = product.product_id')
            ->where('ordermove_id', $this->session->userdata('ordermove_id'))->get()->result();
    }
    function check_sendingaddres()
    {
        return $this->db->select('*')->from('ordermove')
            ->join('original_member', 'ordermove.member_original_id = original_member.ormember_id')
            ->where('ordermove_id', $this->session->userdata('ordermove_id'))
            ->get()->result();
    }
    function check_province($province_id)
    {
        $name = '';
        $data = $this->db->select('*')->from('province')->where('id', $province_id)->get()->result();
        foreach ($data as $item) {
            $name = $item->name;
        }
        return $name;
    }

    function subdirectorycode($member_name)
    {
        $code = '';
        $subdirectory = $this->db->select('*')->from('subdirectory')
            ->join('member', 'subdirectory.member_id = member.member_id')
            ->where('subdirectory_name', $member_name)
            ->get()->result();
        foreach ($subdirectory as $item) {
            $code = $item->member_code;
        }
        return $code;
    }
    function getCategory()
    {
        return $this->db->select('*')->from('category')
            ->where('category_drop',1)
            ->get()->result();
    }
    function checkSubdirect($segments)
    {
        $subdirect_id = 0 ;
        $result = $this->db->select('*')->from('subdirectory')->like('subdirectory_name',$segments)->get()->result();
        foreach ($result as $item){
            $subdirect_id = $item->subdirectory_id ;
        }
        return $subdirect_id ;
    }
    function checklinksocial($name, $slug)
    {
        $link = '';
        if ($slug == '') {
            $social = $this->db->select('*')->from('social')->where('social_name', $name)
                ->where('member_id', 0)->get()->result();
            foreach ($social as $item) {
                $link = $item->social_link;
            }
        } else {
            $member_id = $this->check_subdirect($slug);
            $social = $this->db->select('*')->from('social')->where('social_name', $name)
                ->where('member_id', $member_id)->get()->result();
            foreach ($social as $item) {
                $link = $item->social_link;
            }
        }

        return $link;
    }
}