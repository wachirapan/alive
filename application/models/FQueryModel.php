<?php

class FQueryModel extends CI_Model
{
    function get_tokenbussiness()
    {
        return $this->db->select('*')->from('linetoken')->get()->result();

    }
    function create_ordermove($order_id)
    {
        $order = $order_id;
        $data = '';
        if ($order < 10) {
            $data = 'RO000000' . ($order);
        } else if ($order < 100) {
            $data = 'RO00000' . ($order);
        } else if ($order < 1000) {
            $data = 'RO0000' . ($order);
        } else if ($order < 10000) {
            $data = 'RO000' . ($order);
        } else if ($order < 100000) {
            $data = 'RO00' . ($order);
        } else if ($order < 1000000) {
            $data = 'RO0' . ($order);
        } else if ($order < 10000000) {
            $data = 'RO' . ($order);
        }
        $this->db->where('ordermove_id', $order_id)->update('ordermove', array(
            'ordermove_ref' => $data
        ));
        return $data ;
    }
    function update_point($sumpoint,$price,$owner_id)
    {
        $date=date_create(date('Y-m-d'));
        $mount = date_format($date,"m");

        $checkpoint = $this->db->select('*')->from('memberpoint')
            ->where('member_id',$owner_id)->get()->result();
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
                        'member_id'=>$owner_id,
                        'memberpoint_number'=>$sumpoint,
                        'memberpoint_date'=>date('Y-m-d'),
                        'memberpoint_price'=>$price
                    ));
                }
            }
        }else{
            $this->db->insert('memberpoint',array(
                'member_id'=>$owner_id,
                'memberpoint_number'=>$sumpoint,
                'memberpoint_date'=>date('Y-m-d'),
                'memberpoint_price'=>$price
            ));
        }
    }
    function productall($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('product')->where('product_status',1)->get()->result();
    }
    function productall_count()
    {
        return $this->db->select('*')->from('product')->where('product_status',1)->get()->num_rows();

    }
    function check_membercode($member_id)
    {
        $user_id = $member_id;
        if ((int)$user_id < 10) {
            $ref = '000000' . ($user_id);
        } else if ((int)$user_id < 100) {
            $ref = '00000' . ($user_id);
        } else if ((int)$user_id < 1000) {
            $ref = '0000' . ($user_id);
        } else if ((int)$user_id < 10000) {
            $ref = '000' . ($user_id);
        } else if ((int)$user_id < 100000) {
            $ref = '00' . ($user_id);
        } else if ((int)$user_id < 1000000) {
            $ref = '0' . ($user_id);
        } else {
            $ref = ($user_id);
        }
        $this->session->set_userdata(array('register_member_code' => $ref));

        $this->db->where('member_id', $user_id)->update('member', ['member_code' => $ref]);

        return $ref ;
    }
    function get_blogs($index, $row)
    {
        $length = $row;
        $start = ($index - 1) * $length;
        $this->db->limit($length, $start);
        return $this->db->select('*')->from('blogs')
            ->order_by('blogs_id','DESC')
            ->get()->result();
    }
    function get_blogs_count()
    {
        return $this->db->select('*')->from('blogs')
            ->get()->num_rows();
    }


}