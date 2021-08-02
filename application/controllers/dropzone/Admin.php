<?php

class Admin extends  CI_Controller{

    private $upload_path = "./images/products/";

    public function upload()
    {
        $config['upload_path'] = './images/products/';
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

    public function remove()
    {
        $file = $this->input->post("file");
        if ($file && file_exists($this->upload_path . "/" . $file)) {
            unlink($this->upload_path . "/" . $file);
        }
        $this->db->where('mockupimage_text', $file)
            ->where('admin_id',1)
            ->delete('mockupimage');
    }

    public function list_files()
    {
        $this->load->helper("file");
        $arr = [];
        $mysql = $this->db->select('*')->from('mockupimage')
            ->where('admin_id',1)->get()->result();
        foreach ($mysql as $item) {
            array_push($arr, $item->mockupimage_text);
        }
//		$files = get_filenames($this->upload_path);

        // we need name and size for dropzone mockfile
        foreach ($arr as &$file) {
            $file = array(
                'name' => $file,
                'size' => filesize($this->upload_path . "/" . $file)
            );
        }

        header("Content-type: text/json");
        header("Content-type: application/json");
        echo json_encode($arr);
    }


    function insertdb()
    {
        $nameimg = $_POST['nameimg'];
        $this->db->insert('mockupimage', array('mockupimage_text' => $nameimg,
            'admin_id' => 1));
    }

    // edit product
    public function edit_upload()
    {
        if (!empty($_FILES)) {
            $config["upload_path"] = $this->upload_path;
            $config["allowed_types"] = "gif|jpg|png|jpeg";
            $config['max_size'] = 0;
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $config['overwrite'] = FALSE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("file")) {
                echo "failed to upload file(s)";
            }
        }
    }
    function edit_remove()
    {
        $file = $this->input->post("file");
        if ($file && file_exists($this->upload_path . "/" . $file)) {
            unlink($this->upload_path . "/" . $file);
        }
        $this->db->where('product_img', $file)
            ->where('member_id',0)
            ->where('product_id',$_GET['product_id'])
            ->delete('product_image');
    }
    public function edit_list_files()
    {
        $this->load->helper("file");
        $arr = [];
        $mysql = $this->db->select('*')->from('product_image')
            ->where('product_id',$_GET['product_id'])->get()->result();
        foreach ($mysql as $item) {
            array_push($arr, $item->product_img);
        }
//		$files = get_filenames($this->upload_path);

        // we need name and size for dropzone mockfile
        foreach ($arr as &$file) {
            $file = array(
                'name' => $file,
                'size' => filesize($this->upload_path . "/" . $file)
            );
        }

        header("Content-type: text/json");
        header("Content-type: application/json");
        echo json_encode($arr);
    }
    function edit_insertdb()
    {
        $nameimg = $_POST['nameimg'];
        $this->db->insert('product_image', array('product_img' => $nameimg, 'product_id'=>$_GET['product_id'],
            'admin_id'=>1));
    }
}