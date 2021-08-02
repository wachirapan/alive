<?php

class Api extends CI_Controller
{
    function get_province()
    {
        echo json_encode($this->db->select('*')->from('province')->get()->result());
    }
    function check_district()
    {
        echo json_encode($this->db->select('*')->from('amphures')->where('province_id',$_GET['province_id'])
            ->get()->result());
    }
    function check_subdistrict()
    {
        echo json_encode($this->db->select('*')->from('districts')
            ->where('amphure_id',$_GET['district_id'])
            ->get()->result()
        );
    }
    function check_zipcode()
    {
        $arr = [];
        $data = $this->db->select('*')->from('districts')->where('id',$_GET['subdistrict'])->get()->result();
        foreach ($data as $item){
            $districts = array('zip_code'=>$item->zip_code,'name_th'=>$item->name_th);
            array_push($arr,$districts);

        }
        echo json_encode($arr);
    }
    function check_idcard()
    {
        $status = false ;
        $personID = $_GET['idcard'];
        if (strlen($personID) != 13) {
            $status = false;
        }
        $rev = strrev($personID); // reverse string ขั้นที่ 0 เตรียมตัว
        $total = 0;
        for($i=1;$i<13;$i++) // ขั้นตอนที่ 1 - เอาเลข 12 หลักมา เขียนแยกหลักกันก่อน
        {
            $mul = $i +1;
            $count = $rev[$i]*$mul; // ขั้นตอนที่ 2 - เอาเลข 12 หลักนั้นมา คูณเข้ากับเลขประจำหลักของมัน
            $total = $total + $count; // ขั้นตอนที่ 3 - เอาผลคูณทั้ง 12 ตัวมา บวกกันทั้งหมด
        }
        $mod = $total % 11; //ขั้นตอนที่ 4 - เอาเลขที่ได้จากขั้นตอนที่ 3 มา mod 11 (หารเอาเศษ)
        $sub = 11 - $mod; //ขั้นตอนที่ 5 - เอา 11 ตั้ง ลบออกด้วย เลขที่ได้จากขั้นตอนที่ 4
        $check_digit = $sub % 10; //ถ้าเกิด ลบแล้วได้ออกมาเป็นเลข 2 หลัก ให้เอาเลขในหลักหน่วยมาเป็น Check Digit
        if($rev[0] == $check_digit)  // ตรวจสอบ ค่าที่ได้ กับ เลขตัวสุดท้ายของ บัตรประจำตัวประชาชน
            $status = true; /// ถ้า ตรงกัน แสดงว่าถูก
        else
            $status = false; // ไม่ตรงกันแสดงว่าผิด
        echo json_encode($status);
    }
    function checkregister_idcard()
    {
        echo json_encode($this->db->select('*')->from('member')->where('member_idcard',$_GET['idcard'])
            ->get()->num_rows());
    }
    function checkcodeuser()
    {
        $codename = $_GET['codename'];
        echo json_encode($this->db->select('*')->from('member')->where('member_code',$codename)->get()->result());
    }
    function check_phonenumber()
    {
        echo json_encode($this->db->select('*')->from('member')->where('member_phone',$_GET['member_phone'])
            ->get()->num_rows());
    }
    function get_seachorderlist()
    {
        $phone = $_GET['phone'];
        $arr = [];
        $orderlist = '';
        $member = $this->db->select('*')->from('original_member')->where('ormember_phone', $phone)
            ->get()->result();
        foreach ($member as $item) {
            array_push($arr, $item->ormember_id);
        }

        if(count($arr) != 0){
            $orderlist = $this->db->select('*')->from('ordermove')->where_in('member_original_id', $arr)
                ->order_by('ordermove_id', 'DESC')
                ->get()->result();
        }

        echo json_encode($orderlist);
    }
    function get_adviser()
    {
        $data = $this->db->select('*')->from('member')->where('member_id',$_GET['adviser_id'])->get()->result();
        echo json_encode($data);
    }
    function check_province()
    {
        echo json_encode($this->db->select('*')->from('province')
            ->where('id',$_GET['province'])->get()->result());
    }
    function check_usersender()
    {
        $ordermove_id = $_GET['ordermove_id'];
        $members_id = $_GET['members_id'];
        $member_original_id = $_GET['member_original_id'];

        $arr = [];
        if ($members_id == 0) {
            $members = $this->db->select('*')->from('original_member')
                ->join('province', 'original_member.province_id = province.id')
                ->where('original_member.ormember_id', $member_original_id)
                ->get()->result();
            foreach ($members as $item) {
                $data = array(
                    'username' => $item->ormember_name,
                    'userphone' => $item->ormember_phone,
                    'useraddress' => $item->ormember_address,
                    'userprovince' => $item->name,
                    'userzipcode' => $item->zipcode
                );
                array_push($arr, $data);
            }
        } else {
            $members = $this->db->select('*')->from('member')
                ->join('province', 'member.province_id = province.id')
                ->where('member.member_id', $members_id)
                ->get()->result();
            foreach ($members as $item) {
                $data = array(
                    'username' => $item->member_name,
                    'userphone' => $item->member_phone,
                    'useraddress' => $item->member_address,
                    'userprovince' => $item->name,
                    'userzipcode' => $item->zipcode
                );
                array_push($arr, $data);
            }
        }
        echo json_encode($arr);
    }

    function checklinesaler()
    {
        $this->get_categories($this->session->userdata('member_login'));
        $arr = [];
        $data = $this->db->select('*')->from('compileday')
            ->limit(6)
            ->order_by('compileday_id','DESC')
            ->get()->result();
        foreach ($data as $item){
            $data = array('priceWeb'=>$this->BQueryModel->purchaseWeb($item->compileday_id),
                'priceBackend'=>$this->BQueryModel->purchaseBackend($item->compileday_id),
                'priceLineup'=>$this->BQueryModel->priceOrderline($item->compileday_id),
                'computeday'=>$this->BQueryModel->checkdatecompile($item->compileday_id)
            );
            array_push($arr , $data);
        }
        echo json_encode($arr);
    }

    function get_categories($member_id){

        $this->session->set_userdata(array('lineup_computeday'=>[]));

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $member_id);

        $parent = $this->db->get();

        $categories = $parent->result();

        $i= 0 ;
        foreach($categories as $p_cat){
            array_push($_SESSION['lineup_computeday'],$p_cat->member_id);

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
            array_push($_SESSION['lineup_computeday'],$p_cat->member_id);

            $categories[$i]->sub = $this->sub_categories($p_cat->member_id);
            $i++;
        }
        return $categories;
    }
    function check_passwordbefore()
    {
        $before_pwd = $_GET['before_pwd'];
        echo json_encode($this->db->select('*')->from('member')
            ->where('member_id',$this->session->userdata('member_login'))
            ->where('member_pwd',$before_pwd)
            ->get()->result());
    }
    function check_provincename()
    {
        $province_name = "";
        $province = $this->db->select('*')->from('province')->where('id',$_GET['province'])->get()->result();
        foreach ($province as $item){
            $province_name = $item->name ;
        }
        echo json_encode($province_name) ;
    }
    function orderexpress_agents()
    {
        $arr = [];
        $ordermove = $this->db->select('*')->from('ordermove')
            ->join('ordermoveline', 'ordermove.ordermove_id = ordermoveline.ordermove_id')
            ->join('product', 'ordermoveline.product_id = product.product_id')
            ->where('ordermove.ordermove_id', $_GET['ordermove_id'])
            ->get()->result();
        foreach ($ordermove as $item) {
            $express = $this->db->select('*')->from('express')->where('ordermoveline_id', $item->ordermoveline_id)
                ->get()->result();
            if (count($express) == 0) {
                $data = array(
                    'product_name' => $item->product_name,
                    'product_total' => $item->ordermoveline_total,
                    'product_price' => $item->ordermoveline_price,
                    'product_tranfer' => $item->ordermoveline_tranfer,
                    'express_comp' => '',
                    'express_serial' => ''
                );
                array_push($arr, $data);
            } else {
                foreach ($express as $o) {
                    $data = array(
                        'product_name' => $item->product_name,
                        'product_total' => $item->ordermoveline_total,
                        'product_price' => $item->ordermoveline_price,
                        'product_tranfer' => $item->ordermoveline_tranfer,
                        'express_comp' => $o->express_company,
                        'express_serial' => $o->express_serial
                    );
                    array_push($arr, $data);
                }
            }
        }
        echo json_encode($arr);
    }
    function checksubdoamin()
    {
        $status = true ;
        $data = $this->db->select('*')->from('subdirectory')
            ->where('subdirectory_name',$_GET['subdomain'])->get()->num_rows();
        if($data > 1){
            $status = false ;
        }
        echo json_encode($status) ;
    }
}