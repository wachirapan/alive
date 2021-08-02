<?php

class FInsertData extends CI_Controller
{
    function cartmockup()
    {
        $product_id = $_POST['product_id'];
        $subdirect = $_POST['subdirect'];

        if($this->session->userdata('mockup_id') == ''){
            $this->db->insert('cartmockup',array(
                'cartmockup_date'=>date('Y-m-d'),
                'product_member'=>$subdirect
            ));
            $this->session->set_userdata(array('mockup_id'=>$this->db->insert_id()));
            $this->cartmockupline($product_id);
        }else{
            $this->cartmockupline($product_id);
        }
    }
    function cartmockupline($product_id)
    {
        $product = $this->db->select('*')->from('product')
            ->where('product_id',$product_id)->get()->result();
        foreach ($product as $item){
            $this->db->insert('cartmockupline',array(
                'cartmockup_id'=>$this->session->userdata('mockup_id'),
                'product_id'=>$item->product_id,
                'product_total'=>1,
                'product_price'=>$item->product_selling_price,
                'product_tranfer'=>$item->product_tranfer,
                'product_point'=>$item->product_point,
            ));
        }
    }

    function comfirm_cart()
    {
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $province = $_POST['province'];

        $name_district = $_POST['name_district'];
        $name_subdistrict = $_POST['name_subdistrict'];

        $zipcode = $_POST['zipcode'];
        $user_email = $_POST['user_email'];
        $user_line = $_POST['user_line'];
        $status = $_POST['status'];

        $newaddres = $user_address ." ".$name_district. " ".$name_subdistrict ;

        $this->db->insert('original_member',array(
            'ormember_name'=>$user_name,
            'ormember_phone'=>$user_phone,
            'ormember_address'=>$newaddres,
            'province_id'=>$province,
            'zipcode'=>$zipcode,
            'ormember_email'=>$user_email,
            'ormember_line'=>$user_line
        ));
        $original_member_id = $this->db->insert_id();


        $sumtranfer = $_POST['sumtranfer'];
        $sumprice = $_POST['sumprice'];

        $subdirect = $_POST['subdirect'];

        $data = array(
            'ordermove_ref'=>'',
            'ordermove_price'=>$sumprice,
            'ordermove_point'=>0,
            'ordermove_amountdiscount'=>0.00,
            'ordermove_create'=>date('Y-m-d H:i:sa'),
            'ordermove_tranfer'=>$sumtranfer,
            'ordermove_address'=>$newaddres,
            'province_id'=>$province,
            'zipcode'=>$zipcode,
            'ordermove_payments'=>2,
            'members_id'=>0,
            'computeday_id'=>0,
            'computemonth_id'=>0,
            'owner_id'=>$subdirect, //บันทึกให้ว่าชื้อจาก สมาชิกคนไหน
            'member_original_id'=>$original_member_id,
            'ordermove_status_sending'=>'',
            'ordermove_settlement'=>$status
        );
        $this->db->insert('ordermove',$data);
        $order_id = $this->db->insert_id();

        $order_ref = $this->FQueryModel->create_ordermove($order_id);
        $this->session->set_userdata(array('ordermove_id'=>$order_id,'orderref'=>$order_ref));
        $this->linenotify($order_ref, $user_name, $sumprice);
        if($this->session->userdata('sliper_id') != ''){
            $this->db->where('sliper_id',$this->session->userdata('sliper_id'))->update('sliper',array(
                'ordermove_id'=>$order_id
            ));
        }
        $this->create_orderline($order_id);
//        $this->send_smsconfirm($user_phone, $user_name, $order_ref, $sumprice);
        $this->deletemockup();
    }
    function send_smsconfirm($telephone, $name, $order_ref, $sumprice)
    {
        $to = preg_replace('/^0/', '66', $telephone);
        $username = "tanagtam2020";
        $password = "esm78027";
        $from = "Alive Dropship";
        $text = "Hello ".$name." Confirm Order : ".$order_ref." amount ". $sumprice;
        $url = "https://www.easysendsms.com/sms/bulksms-api/bulksms-api?username=$username&password=$password&from=$from&to=$to&text=$text&type=1";
        $url = str_replace(" ", '%20', $url);
        $result = file_get_contents($url);
//        return $result;
    }
    function comfirm_cart_subdirect()
    {
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $province = $_POST['province'];

        $name_district = $_POST['name_district'];
        $name_subdistrict = $_POST['name_subdistrict'];

        $zipcode = $_POST['zipcode'];
        $user_email = $_POST['user_email'];
        $user_line = $_POST['user_line'];
        $status = $_POST['status'];

        $newaddres = $user_address ." ".$name_district. " ".$name_subdistrict ;


        $this->db->insert('original_member',array(
            'ormember_name'=>$user_name,
            'ormember_phone'=>$user_phone,
            'ormember_address'=>$newaddres,
            'province_id'=>$province,
            'zipcode'=>$zipcode,
            'ormember_email'=>$user_email,
            'ormember_line'=>$user_line
        ));
        $original_member_id = $this->db->insert_id();


        $sumtranfer = $_POST['sumtranfer'];
        $sumprice = $_POST['sumprice'];
        $owner_id = $_POST['owner_id'];
        $sumpoint = $_POST['sumpoint'];

        $data = array(
            'ordermove_ref'=>'',
            'ordermove_price'=>$sumprice,
            'ordermove_point'=>$sumpoint,
            'ordermove_amountdiscount'=>0.00,
            'ordermove_create'=>date('Y-m-d H:i:sa'),
            'ordermove_tranfer'=>$sumtranfer,
            'ordermove_address'=>$newaddres,
            'province_id'=>$province,
            'zipcode'=>$zipcode,
            'ordermove_payments'=>2,
            'members_id'=>0,
            'computeday_id'=>0,
            'computemonth_id'=>0,
            'owner_id'=>$owner_id,
            'member_original_id'=>$original_member_id,
            'ordermove_status_sending'=>'',
            'ordermove_settlement'=>$status
        );
        $this->db->insert('ordermove',$data);
        $order_id = $this->db->insert_id();

        $order_ref = $this->FQueryModel->create_ordermove($order_id);

        $this->FQueryModel->update_point($sumpoint, $sumprice, $owner_id);

//        $this->sendsmsconfirm($user_phone, $user_name, $order_ref, $sumprice);
        $this->linenotify($order_ref, $user_name, $sumprice);

        if($this->session->userdata('sliper_id') != ''){
            $this->db->where('sliper_id',$this->session->userdata('sliper_id'))->update('sliper',array(
                'ordermove_id'=>$order_id
            ));
        }

        $this->create_orderline($order_id);

        $this->deletemockup();

    }

    function sendsmsconfirm($telephone, $name, $orderref, $price)
    {
        $to = preg_replace('/^0/', '66', $telephone);
        $username = "tanagtam2020";
        $password = "esm78027";
        $from = "Alive Dropship";
        $text = "Hello ".$name." Confirm Order : ".$orderref." amount ". $price;

        $url = "https://www.easysendsms.com/sms/bulksms-api/bulksms-api?username=$username&password=$password&from=$from&to=$to&text=$text&type=1";
        $url = str_replace(" ", '%20', $url);
        $result = file_get_contents($url);
    }

    function linenotify($order_ref, $members_name, $orderprice)
    {
        $message = "แจ้งการสั่งชื้อ ของ " .
            "\n" . "ชื่อ-นามสกุล : " . $members_name .
            "\n" . "หมายเลขบิล : " . $order_ref .
            "\n" . "ราคา : " . number_format($orderprice) .' ฿';

        $linetoken = $this->FQueryModel->get_tokenbussiness();
        foreach ($linetoken as $item) {
            $this->sendlinemesg($item->linetoken_name);
            header('Content-Type: text/html; charset=utf8');
            $res = $this->notify_message($message);
//        echo "<script>alert('สมัครสมาชิกเรียบร้อย');</script>";
//                redirect('welcome/index','refresh');
//                exit();
        }
    }

    function sendlinemesg($token)
    {
        // LINE LINE_API https://notify-api.line.me/api/notify
        // LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu แนะนำให้ใช้ของตัวเองนะครับเพราะของผมยกเลิกแล้วไม่สามารถใช้ได้
        define('LINE_API', "https://notify-api.line.me/api/notify");
        define('LINE_TOKEN', $token);


    }

    function notify_message($message)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
    function create_orderline($order_id)
    {
        $mockupline =   $data = $this->db->select('*')->from('cartmockupline')
            ->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->get()->result();
        foreach ($mockupline as $item){
            $data = array(
                'ordermove_id'=>$order_id,
                'product_id'=>$item->product_id,
                'ordermoveline_total'=>$item->product_total,
                'ordermoveline_price'=>$item->product_price,
                'ordermoveline_create'=>date('Y-m-d'),
                'ordermoveline_tranfer'=>$item->product_tranfer,
                'ordermoveline_point'=>$item->product_point
            );
            $this->db->insert('ordermoveline',$data);
        }
    }
    function deletemockup()
    {
        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockup');

        $this->db->where('cartmockup_id',$this->session->userdata('mockup_id'))
            ->delete('cartmockupline');

        $this->session->set_userdata(array('mockup_id'=>'','sliper_id'=>''));
    }
    function clearordersession()
    {
        $this->session->set_userdata(array('ordermove_id'=>'','orderref'=>''));
//        redirect('welcome/index','refresh');
//        exit();
    }
    function clerordermembers()
    {
        $urisegment = $_GET['urisegment'];
        $this->session->set_userdata(array('ordermove_id'=>'','orderref'=>''));

        redirect($urisegment,'refresh');
        exit();
    }
    function tranfer_sliper()
    {
        $review_picture = $_POST['review_picture'];
        $order_price = $_POST['order_price'];
        $create_date = $_POST['create_date'];

        $data = array(
            'sliper_img'=>$review_picture,
            'sliper_price'=>$order_price,
            'sliper_tranfer_date'=>$create_date,
            'sliper_create'=>date('Y-m-d'),
            'sliper_status'=>1,
            'sliper_cash'=>''
        );
        $this->db->insert("sliper",$data);

        $this->session->set_userdata(array('sliper_id'=>$this->db->insert_id()));
    }
}