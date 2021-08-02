<?php

/**
 * Created by PhpStorm.
 * User: title
 * Date: 7/26/2021
 * Time: 6:25 PM
 */
class RegisterAndLogin extends CI_Controller
{
    function confirm_register()
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
        $upline_id = $_POST['upline_id'];
        $email = $_POST['email'];
        $line = $_POST['line'];
        $facebook = $_POST['facebook'];

        $six_degit_random = mt_rand(000000, 999999);

        $data = array(
            'member_sex' => $sex,
            'member_name' => $username,
            'member_phone' => $telephone,
            'member_address' => $address,
            'province_id' => $province,
            'zipcode' => $zipcode,
            'member_upline' => $upline_id,
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
        $this->db->insert('member',$data);
        $member_id = $this->db->insert_id();
        $this->session->set_userdata(array('register_member_name' => $username, 'register_member_pwd' => $six_degit_random));
        $member_code = $this->FQueryModel->check_membercode($member_id);

        $this->linenotify($member_code, $username, $idcard);

    }

    function linenotify($members_code, $members_name, $members_idcard)
    {
        $message = "แจ้งสมัครสมาชิก ของ " .
            "\n" . "ชื่อ-นามสกุล : " . $members_name .
            "\n" . "หมายเลขสมาชิก : " . $members_code .
            "\n" . "รหัสบัตรประชาชน : " . $members_idcard;

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
    function clear_userregister()
    {
        $this->session->sess_destroy();
        redirect('welcome/index','refresh');
        exit();
    }
    function LoginAdmin()
    {
        $this->load->view('admin/login/index');
    }
    function checkLoginAdmin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->db->select('*')->from('admin')->where('admin_username',$username)->where('admin_userpwd',$password)
            ->get()->result();
        if(count($result) > 0){
            $this->session->set_userdata(array('admin_login' => '1', 'admin_user' => 'admin'));
            redirect('AController/index', 'refresh');
            exit();
        }else{
            redirect('RegisterAndLogin/LoginAdmin','refresh');
            exit();
        }
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('welcome/index','refresh');
        exit();
    }

    function checkLoginMembers()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->db->select('*')->from('member')->where('member_code',$username)
            ->where('member_pwd',$password)
            ->where('member_status',1)
            ->get()->result();

        if(count($result) > 0){
            foreach ($result as $item){
                $this->session->set_userdata(array(
                    'member_login'=>$item->member_id,
                    'member_name'=>$item->member_name,
                    'member_image'=>$item->member_image,
                    'member_code'=>$username
                ));
            }
            redirect('Backend/index','refresh');
            exit();
        }else{
            redirect('welcome/login?status=false','refresh');
            exit();
        }
    }
}