<?php

class ShippoModel extends CI_Model
{
    function checkFromName()
    {
        $name = '';
        $company = $this->db->select('*')->from('company')->get()->result();
        foreach ($company as $item){
            $name = $item->company_name ;
        }
        return $name ;
    }
    function checkAddress()
    {
        $address = '';
        $company = $this->db->select('*')->from('company')->get()->result();
        foreach ($company as $item){
            $address = $item->company_address." ".$this->checkSubdistrict($item->company_subdistrict).' 
            '.$this->checkDistrict($item->company_district).' '.$this->checkProvince($item->company_province);
        }
        return $address ;
    }
    function checkSubdistrict($subdistrict_id)
    {
        $district_name = '';
        $district = $this->db->select('*')->from('districts')->where('id',$subdistrict_id)->get()->result();
        foreach ($district as $item){
            $district_name = $item->name_th ;
        }
        return $district_name ;
    }
    function checkDistrict($id)
    {
        $name = '';
        $amp = $this->db->select('*')->from('amphures')->where('id',$id)->get()->result();
        foreach ($amp as $item){
            $name = $item->name_th ;
        }
        return $name ;
    }
    function checkProvince($id)
    {
        $name = '';
        $province = $this->db->select('*')->from('province')->where('id',$id)->get()->result();
        foreach ($province as $item){
            $name = $item->name ;
        }
        return $name ;
    }
    function checkZipcode()
    {
        $zipcode = '';
        $company = $this->db->select('*')->from('company')->get()->result();
        foreach ($company as $item){
            $zipcode = $item->company_zipcode;
        }
        return $zipcode ;
    }
    function checkPhone()
    {
        $phone = '';
        $company = $this->db->select('*')->from('company')->get()->result();
        foreach ($company as $item){
            $phone = $item->company_phone ;
        }
        return $phone ;

    }
    function checkStatusbooking($status)
    {
        $check = '';
        if($status == 'wait'){
            $check = 'รอ confirm รายการ';
        }else if($status == 'booking'){
            $check = 'อยู่ระหว่างการนำสินค้าส่งขนส่ง';
        }else if($status == 'shipping'){
            $check = 'อยู่ระหว่างการจัดส่ง';
        }else if($status == 'complete'){
            $check = 'รายการสำเร็จ';
        }else if($status == 'cancel'){
            $check = 'รายการถูกยกเลิกด้วยอะไรก็ตาม';
        }else if($status == 'pending_transfer'){
            $check = 'รายการเตรียมโอนเงินคืน';
        }else if($status == 'transferred'){
            $check = 'รายงานโอนเงินคืนแล้ว';
        }else if($status == 'cancel_transfer'){
            $check = 'รายการยกเลิกการโอนคืน';
        }
        return $check ;
    }
}