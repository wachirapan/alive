<?php

class BInsertData extends CI_Controller
{
    function register_agent()
    {
        $sex = $_POST['sex'];
        $username = $_POST['username'];
        $idcard = $_POST['idcard'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $province = $_POST['province'];
        $zipcode = $_POST['zipcode'];
        $bankname = $_POST['bankname'];
        $deposit = $_POST['deposit'];
        $branch = $_POST['branch'];
        $bank_account = $_POST['bank_account'];
        $bank_serial = $_POST['bank_serial'];

        $email = $_POST['email'];
        $line = $_POST['line'];
        $facebook = $_POST['facebook'];

        $adviser_id = $_POST['adviser_id'];

        $six_degit_random = mt_rand(000000, 999999);

        $data = array(
            'member_sex' => $sex,
            'member_name' => $username,
            'member_phone' => $telephone,
            'member_address' => $address,
            'province_id' => $province,
            'zipcode' => $zipcode,
            'member_upline' => $adviser_id,
            'member_pwd' => $six_degit_random,
            'member_idcard' => $idcard,
            'member_create' => date('Y-m-d'),
            'member_bank_name' => $bankname,
            'member_bank_branch' => $branch,
            'member_bank_serial' => $bank_serial,
            'member_bank_account' => $bank_account,
            'member_bank_deposit' => $deposit,
            'member_status' => 2, //1.ปกติ 2.รอตรวจสอบ 3.ปิดใช้
            'member_email' => $email,
            'member_line' => $line,
            'member_facebook' => $facebook
        );

        $this->db->insert('member', $data);

        $member_id = $this->db->insert_id();
        $this->session->set_userdata(array('member_name' => $username, 'member_pwd' => $six_degit_random));

        $member_code = $this->FQueryModel->check_membercode($member_id);

        $this->linenotify_register($member_code, $username, $idcard);
    }

    function linenotify_register($members_code, $members_name, $members_idcard)
    {
        $message = "แจ้งสมัครสมาชิก ของ " .
            "\n" . "ชื่อ-นามสกุล : " . $members_name .
            "\n" . "หมายเลขสมาชิก : " . $members_code .
            "\n" . "รหัสบัตรประชาชน : " . $members_idcard;

        $linetoken = $this->FQueryModel->get_tokenbussiness();
        foreach ($linetoken as $item) {
            $this->sendlinemesg_resgister($item->linetoken_name);
            header('Content-Type: text/html; charset=utf8');
            $res = $this->notify_message_register($message);
//        echo "<script>alert('สมัครสมาชิกเรียบร้อย');</script>";
//                redirect('welcome/index','refresh');
//                exit();
        }
    }

    function sendlinemesg_resgister($token)
    {
        // LINE LINE_API https://notify-api.line.me/api/notify
        // LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu แนะนำให้ใช้ของตัวเองนะครับเพราะของผมยกเลิกแล้วไม่สามารถใช้ได้
        define('LINE_API', "https://notify-api.line.me/api/notify");
        define('LINE_TOKEN', $token);


    }

    function notify_message_register($message)
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
    function grouplinetoken()
    {
        $lineid = $_POST['lineid'];
        $count = $this->db->select('*')->from('grouplinetoken')
            ->where("member_id",$this->session->userdata('member_login'))
            ->get()->num_rows();
        if($count == 0){
            $this->db->insert('grouplinetoken',array(
                'linetoken_id'=>$lineid,
                'member_id'=>$this->session->userdata('member_login'),
                'grouplinetoken_date'=>date('Y-m-d')
            ));
        }else{
            $this->db->where("member_id",$this->session->userdata('member_login'))
                ->delete('grouplinetoken');
        }
    }

    function create_product()
    {
        $category = $_POST['category'];
        $product_name = $_POST['product_name'];
        $promotion = $_POST['promotion'];
        $queryty = $_POST['queryty'];
        $cost_price = $_POST['cost_price'];
        $selling_price = $_POST['selling_price'];
        $profit = $_POST['profit'];
        $product_total = $_POST['product_total'];
        $product_express = $_POST['product_express'];
        $product_score = $_POST['product_score'];
        $editor = $_POST['editor'];
        $editor2 = $_POST['editor2'];


        $data = array(
            'product_name' => $product_name,
            'product_cost_price' => $cost_price,
            'product_selling_price' => $selling_price,
            'product_profit' => $profit,
            'member_id' => $this->session->userdata('member_login'),
            'product_status' => 2,  //1.ปกติ 2.รอตรวจสอบ 3.ปิดใช้
            'product_create' => date('Y-m-d'),
            'product_stock' => $product_total,
            'product_admin' => 0,
            'product_detail' => $editor,
            'category_id' => $category,
            'product_tranfer' => $product_express,
            'product_point' => $product_score,
            'product_promotion' => $promotion,
            'product_queryty' => $queryty,
            'product_properties' => $editor2
        );
        $this->db->insert('product', $data);
        $product_id = $this->db->insert_id();
        $this->product_image($product_id);
    }

    function product_image($product_id)
    {
        $mockupimage = $this->db->select('*')->from('mockupimage')
            ->where('member_id', $this->session->userdata('member_login'))
            ->get()->result();
        foreach ($mockupimage as $item) {
            $this->db->insert('product_image', array(
                'product_id' => $product_id,
                'product_img' => $item->mockupimage_text,
                'member_id' => $this->session->userdata('member_login')
            ));
            $this->db->where('mockupimage_id', $item->mockupimage_id)->delete('mockupimage');
        }
    }

    function cartmockup()
    {
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];
        if ($this->session->userdata('mockup_id') == '') {
            $this->db->insert('cartmockup', array(
                'cartmockup_date' => date('Y-m-d'),
                'product_member' => 0
            ));
            $this->session->set_userdata(array('mockup_id' => $this->db->insert_id()));
            $this->cartmockupline($product_id, $total);
        } else {
            $this->cartmockupline($product_id, $total);
        }
    }

    function cartmockupline($product_id, $total)
    {
        $product = $this->db->select('*')->from('product')
            ->where('product_id', $product_id)->get()->result();
        foreach ($product as $item) {
            $this->db->insert('cartmockupline', array(
                'cartmockup_id' => $this->session->userdata('mockup_id'),
                'product_id' => $item->product_id,
                'product_total' => $total,
                'product_price' => $item->product_selling_price,
                'product_tranfer' => $item->product_tranfer,
                'product_point' => $item->product_point,
            ));
        }
    }
    // start cart

    function tranfer_sliper()
    {
        $review_picture = $_POST['review_picture'];
        $order_price = $_POST['order_price'];
        $create_date = $_POST['create_date'];

        $data = array(
            'sliper_img' => $review_picture,
            'sliper_price' => $order_price,
            'sliper_tranfer_date' => $create_date,
            'sliper_create' => date('Y-m-d'),
            'sliper_status' => 1,
            'sliper_cash' => ''
        );
        $this->db->insert("sliper", $data);

        $this->session->set_userdata(array('sliper_id' => $this->db->insert_id()));
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

        $typeofsaler = $_POST['typeofsaler'];

        $status = $_POST['status'];

        $sumtranfer = $_POST['sumtranfer'];
        $sumprice = $_POST['sumprice'];
        $sumpoint = $_POST['sumpoint'];
        $discount = $_POST['discount'];
        $sumdiscountprice = $_POST['sumdiscountprice'];
        if($typeofsaler == 2){
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

            $data = array(
                'ordermove_ref' => '',
                'ordermove_price' => $sumdiscountprice,
                'ordermove_point' => $sumpoint,
                'ordermove_amountdiscount' => $discount,
                'ordermove_create' => date('Y-m-d h:i:sa'),
                'ordermove_tranfer' => $sumtranfer,
                'ordermove_payments' => 2,
                'members_id' => 0,
                'computeday_id' => 0,
                'computemonth_id' => 0,
                'owner_id' => $this->session->userdata('member_login'),
                'member_original_id' => $original_member_id,
                'ordermove_status_sending' => '',
                'ordermove_settlement' => $status
            );
            $this->db->insert('ordermove', $data);
            $order_id = $this->db->insert_id();

            $order_ref = $this->FQueryModel->create_ordermove($order_id);

            $this->linenotify($order_ref, $this->session->userdata('member_name'), $sumdiscountprice);

            if ($this->session->userdata('sliper_id') != '') {
                $this->db->where('sliper_id', $this->session->userdata('sliper_id'))->update('sliper', array(
                    'ordermove_id' => $order_id
                ));
            }
            $this->BQueryModel->update_point($sumpoint, $sumdiscountprice);
            $this->create_orderline($order_id);

            $this->deletemockup();

        }else{
            $data = array(
                'ordermove_ref' => '',
                'ordermove_price' => $sumdiscountprice,
                'ordermove_point' => $sumpoint,
                'ordermove_amountdiscount' => $discount,
                'ordermove_create' => date('Y-m-d h:i:sa'),
                'ordermove_tranfer' => $sumtranfer,
                'ordermove_payments' => 2,
                'members_id' => $this->session->userdata('member_login'),
                'computeday_id' => 0,
                'computemonth_id' => 0,
                'owner_id' => 0,
                'member_original_id' => 0,
                'ordermove_status_sending' => '',
                'ordermove_settlement' => $status
            );
            $this->db->insert('ordermove', $data);
            $order_id = $this->db->insert_id();

            $order_ref = $this->FQueryModel->create_ordermove($order_id);

            $this->linenotify($order_ref, $this->session->userdata('member_name'), $sumdiscountprice);

            if ($this->session->userdata('sliper_id') != '') {
                $this->db->where('sliper_id', $this->session->userdata('sliper_id'))->update('sliper', array(
                    'ordermove_id' => $order_id
                ));
            }
            $this->BQueryModel->update_point($sumpoint, $sumdiscountprice);
            $this->create_orderline($order_id);

            $this->deletemockup();
        }

    }

    function linenotify($order_ref, $members_name, $orderprice)
    {
        $message = "แจ้งการสั่งชื้อ ของ " .
            "\n" . "ชื่อ-นามสกุล : " . $members_name .
            "\n" . "หมายเลขบิล : " . $order_ref .
            "\n" . "ราคา : " . number_format($orderprice) . ' ฿';

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
        $mockupline = $data = $this->db->select('*')->from('cartmockupline')
            ->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->get()->result();
        foreach ($mockupline as $item) {
            $data = array(
                'ordermove_id' => $order_id,
                'product_id' => $item->product_id,
                'ordermoveline_total' => $item->product_total,
                'ordermoveline_price' => $item->product_price,
                'ordermoveline_create' => date('Y-m-d'),
                'ordermoveline_tranfer' => $item->product_tranfer,
                'ordermoveline_point' => $item->product_point
            );
            $this->db->insert('ordermoveline', $data);
        }
    }

    function deletemockup()
    {
        $this->db->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->delete('cartmockup');

        $this->db->where('cartmockup_id', $this->session->userdata('mockup_id'))
            ->delete('cartmockupline');

        $this->session->set_userdata(array('mockup_id' => '', 'sliper_id' => ''));
    }

    //end cart

    function create_subdirectory()
    {
        $subdomain = $_POST['subdomain'];
        $webname = $_POST['webname'];
        $keyword = $_POST['keyword'];
        $discription = $_POST['discription'];
        $analytics = $_POST['analytics'];
        $facebok_pixcel = $_POST['facebok_pixcel'];

        $this->db->insert('subdirectory', array(
            'subdirectory_name' => $subdomain,
            'subdirectory_webname' => $webname,
            'subdirectory_keyword' => $keyword,
            'subdirectory_description' => $discription,
            'subdirectory_analytics' => $analytics,
            'subdirectory_pixcel' => $facebok_pixcel,
            'subdirectory_date' => date('Y-m-d'),
            'member_id' => $this->session->userdata('member_login')
        ));
    }
    function create_contact()
    {
        $content_header = $_POST['content_header'];
        $editor = $_POST['editor'];

        $this->db->insert('question', array(
            'question_content' => $content_header,
            'question_detail' => $editor,
            'question_date' => date('Y-m-d'),
            'member_id' => $this->session->userdata('member_login')
        ));
    }
    function create_ans_contact()
    {
        $question_id = $_POST['question_id'];

        $editor = $_POST['editor'];

        $this->db->insert('answer_question', array(
            'question_id' => $question_id,
            'answer_question_detail' => $editor,
            'answer_question_date' => date('Y-m-d'),
            'answer_question_status' => 1
        ));
    }
    function selectGiftbox()
    {
        $gift_id = $_POST['gift_id'];
        $point = $_POST['point'];
        $giftbox_score = $_POST['giftbox_score'];
        $this->db->insert('selectgiftbox',array(
            'member_id'=>$_SESSION['member_login'],
            'member_point'=>$point,
            'giftbox_id'=>$gift_id,
            'selectgiftbox_date'=>date('Y-m-d'),
            'selectgiftbox_status'=>1,
            'selectgiftbox_droppoint'=>$giftbox_score
        ));
    }
}