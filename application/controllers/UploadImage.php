<?php

class UploadImage extends CI_Controller
{
    function product_detail()
    {
        $config['upload_path'] = './images/product_detail/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function upload_category()
    {
        $config['upload_path'] = './images/category/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function product_properties()
    {
        $config['upload_path'] = './images/product_properties/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function upload_sliper()
    {

        $config['upload_path'] = './images/slipers/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }

    function upload_giftbox()
    {
        $config['upload_path'] = './images/gift_box/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function upload_blogs()
    {
        $config['upload_path'] = './images/blogs/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function blogs_detail()
    {
        $config['upload_path'] = './images/blogs_detail/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function upload_gallary()
    {
        $config['upload_path'] = './images/gallary/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 50000;
        $config['max_height'] = 50000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function lineqrcode()
    {
        $config['upload_path'] = './images/linetoken/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 50000;
        $config['max_height'] = 50000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function about_us()
    {
        $config['upload_path'] = './images/about/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function upload_banner()
    {
        $config['upload_path'] = './images/banner/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
    function updateload_contact()
    {
        $config['upload_path'] = './images/contactus/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }


    function upload_imageprofile()
    {
        $config['upload_path'] = './images/members/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            //เรียกใช้งาน view และ ส่งค่า $error ให้แสดงผลกรณีมี Error
            echo json_encode($error);

        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = array('success' => $this->upload->data());
            //เรียกใช้งาน view และ ส่งค่า $data ไปแสดงผลด้วย
            echo json_encode($data);
        }
    }
}