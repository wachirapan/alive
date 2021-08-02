<?php

class AInsertData extends CI_Controller
{
    function open_memnbers()
    {
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $user = $_POST['user'];
        $password = $_POST['password'];

        $this->db->where('member_id', $_POST['member_id'])->update('member', array(
            'member_status' => 1
        ));
        $this->send_smsconfirm($phone, $name, $user, $password);
    }

    function send_smsconfirm($telephone, $name, $user, $pwd)
    {
        $to = preg_replace('/^0/', '66', $telephone);
        $username = "tanagtam2020";
        $password = "esm78027";
        $from = "Alive Dropship";
        $text = "Hello " . $name . " Alive dropship has been activated. Userloggin : " . $user . ' Password :' . $pwd;
        $url = "https://www.easysendsms.com/sms/bulksms-api/bulksms-api?username=$username&password=$password&from=$from&to=$to&text=$text&type=1";
        $url = str_replace(" ", '%20', $url);
        $result = file_get_contents($url);
//        return $result;
    }

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

    function create_category()
    {
        $review_picture = $_POST['review_picture'];
        $category_name = $_POST['category_name'];
        $seraillab = $_POST['seraillab'];
        $editor = $_POST['editor'];
        $category_subname = $_POST['category_subname'];

        $data = array(
            'category_name' => $category_name,
            'category_image' => $review_picture,
            'category_create' => date('Y-m-d'),
            'category_seraillab' => $seraillab,
            'category_detail'=>$editor,
            'category_subname'=>$category_subname,
            'category_drop'=>'1'
        );
        $this->db->insert('category', $data);
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
            'product_status' => 1,  //1.ปกติ 2.รอตรวจสอบ 3.ปิดใช้
            'product_create' => date('Y-m-d'),
            'product_stock' => $product_total,
            'product_admin' => 1,
            'product_detail' => $editor,
            'category_id' => $category,
            'product_tranfer' => $product_express,
            'product_point' => $product_score,
            'product_promotion'=>$promotion,
            'product_queryty'=>$queryty,
            'product_properties'=>$editor2
        );
        $this->db->insert('product', $data);
        $product_id = $this->db->insert_id();

        $this->product_image($product_id);
    }
    function product_image($product_id)
    {
        $mockupimage = $this->db->select('*')->from('mockupimage')
            ->where('admin_id', 1)
            ->get()->result();
        foreach ($mockupimage as $item) {
            $this->db->insert('product_image', array(
                'product_id' => $product_id,
                'product_img' => $item->mockupimage_text,
                'admin_id' => 1
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
        $member_id = $_POST['member_id'];
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


            $txt_member_name = $this->AQueryModel->check_membername($member_id);

            $data = array(
                'ordermove_ref'=>'',
                'ordermove_price'=>$sumdiscountprice,
                'ordermove_point'=>$sumpoint,
                'ordermove_amountdiscount'=>$discount,
                'ordermove_create'=>date('Y-m-d h:i:sa'),
                'ordermove_tranfer'=>$sumtranfer,
                'ordermove_payments'=>2,
                'members_id'=>0,
                'computeday_id'=>0,
                'computemonth_id'=>0,
                'owner_id'=>0,
                'member_original_id'=>$original_member_id,
                'ordermove_status_sending'=>'',
                'ordermove_settlement'=>$status
            );
            $this->db->insert('ordermove',$data);
            $order_id = $this->db->insert_id();

            $order_ref = $this->FQueryModel->create_ordermove($order_id);

            $this->linenotify($order_ref, $txt_member_name ,$sumdiscountprice);

            if($this->session->userdata('sliper_id') != ''){
                $this->db->where('sliper_id',$this->session->userdata('sliper_id'))->update('sliper',array(
                    'ordermove_id'=>$order_id
                ));
            }

        }else{
            $txt_member_name = $this->AQueryModel->check_membername($member_id);

            $data = array(
                'ordermove_ref'=>'',
                'ordermove_price'=>$sumdiscountprice,
                'ordermove_point'=>$sumpoint,
                'ordermove_amountdiscount'=>$discount,
                'ordermove_create'=>date('Y-m-d h:i:sa'),
                'ordermove_tranfer'=>$sumtranfer,
                'ordermove_payments'=>2,
                'members_id'=>$member_id,
                'computeday_id'=>0,
                'computemonth_id'=>0,
                'owner_id'=>0,
                'member_original_id'=>0,
                'ordermove_status_sending'=>'',
                'ordermove_settlement'=>$status
            );
            $this->db->insert('ordermove',$data);
            $order_id = $this->db->insert_id();

            $order_ref = $this->FQueryModel->create_ordermove($order_id);

            $this->linenotify($order_ref, $txt_member_name ,$sumdiscountprice);

            if($this->session->userdata('sliper_id') != ''){
                $this->db->where('sliper_id',$this->session->userdata('sliper_id'))->update('sliper',array(
                    'ordermove_id'=>$order_id
                ));
            }


        }
        $this->create_orderline($order_id);

        $this->deletemockup();

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

    function create_giftbox()
    {
        $review_picture = $_POST['review_picture'];
        $header_content = $_POST['header_content'];
        $score_user = $_POST['score_user'];
        $editor = $_POST['editor'];

        $this->db->insert('giftbox',array(
            'giftbox_content'=>$header_content,
            'giftbox_score'=>$score_user,
            'giftbox_detail'=>$editor,
            'giftbox_create'=>date('Y-m-d'),
            'giftbox_drop'=>1,
            'giftbox_img'=>$review_picture
        ));
    }
    function create_category_blogs()
    {
        $blogs = $_POST['blogs'];

        $this->db->insert('category_blogs', array(
            'category_blog_name' => $blogs
        ));

        $blog_id = $this->db->insert_id();

        echo json_encode($blog_id);
    }
    function create_blogs()
    {
        $review_picture = $_POST['review_picture'];
        $category = $_POST['category'];
        $content_detail = $_POST['content_detail'];
        $content = $_POST['content'];
        $editor = $_POST['editor'];

        $data = array(
            'blogs_img' => $review_picture,
            'blogs_content' => $content,
            'blogs_description'=>$content_detail,
            'blogs_detail' => $editor,
            'blogs_create' => date('Y-m-d'),
            'category_blog_id' => $category
        );
        $this->db->insert('blogs', $data);
    }
    function create_learn_online()
    {
        $tearcher = $_POST['tearcher'];
        $content = $_POST['content'];
        $link = $_POST['linkcourse'];
        $status = $_POST['status'];

        $this->db->insert("learn_online",array(
            'learn_content'=>$content,
            'learn_link'=>$link,
            'learn_create'=>date('Y-m-d'),
            'learn_Instructor'=>$tearcher,
            'learn_type'=>$status
        ));
    }
    function create_gallary()
    {
        $content = $_POST['content'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $image = $_POST['image'];

        $this->db->insert("gallary",array(
            'gallary_content'=>$content,
            'gallary_link'=>$link,
            'gallary_date'=>date('Y-m-d'),
            'gallary_type'=>$status,
            'gallary_img'=>$image
        ));
    }
    function create_orderdiscount()
    {
        $discount_before = $_POST['discount_before'];
        $discount_after = $_POST['discount_after'];
        $discount_payback = $_POST['discount_payback'];
        $this->db->insert('order_discount', array(
            'order_discount_before' => $discount_before,
            'order_discount_after' => $discount_after,
            'order_discount_payback' => $discount_payback,
            'order_discount_create' => date('Y-m-d'),
            'order_discount_drop' => 1
        ));
    }
    function create_amountdiscount()
    {
        $amount_before = $_POST['amount_before'];
        $amount_after = $_POST['amount_after'];
        $amount_payback = $_POST['amount_payback'];
        $this->db->insert("amount_discount", array(
            'score_before' => $amount_before,
            'score_after' => $amount_after,
            'amount_discount_payback' => $amount_payback,
            'amount_discount_create' => date('Y-m-d'),
            'amount_discount_drop' => 1
        ));
    }
    function create_setting_lineup()
    {
        $setting_lineup_layer = $_POST['setting_lineup_layer'];
        $setting_lineup_payback = $_POST['setting_lineup_payback'];
        $lineup_members = $_POST['lineup_members'];
        $lineup_members_to = $_POST['lineup_members_to'];

        $this->db->insert('setting_lineup', array(
            'setting_lineup_layer' => $setting_lineup_layer,
            'setting_lineup_payback' => $setting_lineup_payback,
            'lineup_members' => $lineup_members,
            'lineup_members_to' => $lineup_members_to,
            'setting_lineup_date' => date('Y-m-d'),
            'setting_lineup_drop' => 1
        ));
    }

    function create_position()
    {
        $position_name = $_POST['position_name'];
        $position_price = $_POST['position_price'];
        $position_to = $_POST['position_to'];
        $postion_payback = $_POST['postion_payback'];
        $this->db->insert('position', array(
            'position_name' => $position_name,
            'position_price' => $position_price,
            'position_to' => $position_to,
            'postion_payback' => $postion_payback,
            'postion_date' => date('Y-m-d'),
            'postion_drop' => 1
        ));
    }
    function create_linetoken()
    {
        $linetoken = $_POST['linetoken'];
        $review_picture = $_POST['review_picture'];

        $this->db->insert('linetoken', array(
            'linetoken_name' => $linetoken,
            'linetoken_date' => date('Y-m-d'),
            'linetoken_img'=>$review_picture
        ));
    }

    function sendmessageline()
    {
        $linetoken = $_POST['linetoken'];
        $message = $_POST['message'];

        $this->messagingtoken($linetoken);
        header('Content-Type: text/html; charset=utf8');
        $res = $this->notify_message_token($message);
    }


    function messagingtoken($token)
    {
        // LINE LINE_API https://notify-api.line.me/api/notify
        // LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu แนะนำให้ใช้ของตัวเองนะครับเพราะของผมยกเลิกแล้วไม่สามารถใช้ได้
        define('LINE_API', "https://notify-api.line.me/api/notify");
        define('LINE_TOKEN', $token);

    }

    function notify_message_token($message)
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
    function create_about()
    {
        $editor = $_POST['editor'];
        $this->db->insert('abount',array(
            'abount_detal'=>$editor,
            'admin'=>1
        ));
    }
    function create_facebook()
    {
        $this->db->where('social_id',1)->update('social',array(
            'social_link'=>$_POST['facebook']
        ));
    }
    function create_line()
    {
        $this->db->where('social_id',2)->update('social',array(
            'social_link'=>$_POST['line']
        ));
    }
    function create_instagram()
    {
        $this->db->where('social_id',3)->update('social',array(
            'social_link'=>$_POST['instagram']
        ));
    }
    function create_youtube()
    {
        $this->db->where('social_id',4)->update('social',array(
            'social_link'=>$_POST['youtube']
        ));
    }
    function create_banner()
    {
        $review_picture = $_POST['review_picture'];
        $link = $_POST['link'];
        $this->db->insert('banner',array(
            'banner_link'=>$link,
            'banner_img'=>$review_picture,
            'banner_date'=>date('Y-m-d')
        ));
    }
    function createCompany()
    {
        $comp_name = $_POST['comp_name'];
        $comp_phone = $_POST['comp_phone'];
        $comp_tax = $_POST['comp_tax'];
        $comp_address = $_POST['comp_address'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $subdistrict = $_POST['subdistrict'];
        $comp_zipcode = $_POST['comp_zipcode'];

        $this->db->insert('company',array(
            'company_name'=>$comp_name,
            'company_tax_id'=>$comp_tax,
            'company_phone'=>$comp_phone,
            'company_address'=>$comp_address,
            'company_subdistrict'=>$subdistrict,
            'company_district'=>$district,
            'company_province'=>$province,
            'company_zipcode'=>$comp_zipcode
        ));

    }
    function create_ans_contact()
    {
        $question_id = $_POST['question_id'];

        $editor = $_POST['editor'];

        $this->db->insert('answer_question',array(
            'question_id'=>$question_id,
            'answer_question_detail'=>$editor,
            'answer_question_date'=>date('Y-m-d'),
            'answer_question_status'=>2
        ));
    }
}