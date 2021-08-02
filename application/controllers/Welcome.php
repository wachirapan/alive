<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    $this->load->view('fronts/template/header');
		$this->load->view('fronts/index');
		$this->load->view('fronts/template/footer');
	}
	function productdetail()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/product/productdetail');
        $this->load->view("fronts/template/footer");
    }
    function shoppingcart()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/cart/cartorder');
        $this->load->view("fronts/template/footer");
    }
    function blogs($index = 1)
    {
        $row = 50;
        $result['blogs'] = $this->FQueryModel->get_blogs($index, $row);
        $result['links'] = $this->getpagination('welcome/blogs', $this->FQueryModel->get_blogs_count(), 3, $row);

        $this->load->view("fronts/template/header");
        $this->load->view('fronts/blogs/listblogs',$result);
        $this->load->view("fronts/template/footer");
    }
    function lerningdetail()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/blogs/detail');
        $this->load->view("fronts/template/footer");
    }
    function confirm_shopping()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/cart/confirm_shopping');
        $this->load->view("fronts/template/footer");
    }
    function productall($index = 1)
    {
        $row = 50;
        $result['product'] = $this->FQueryModel->productall($index, $row);
        $result['links'] = $this->getpagination('welcome/productall', $this->FQueryModel->productall_count(), 3, $row);

        $this->load->view("fronts/template/header");
        $this->load->view('fronts/product/productall',$result);
        $this->load->view("fronts/template/footer");
    }
    function policy()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/member/policy');
        $this->load->view("fronts/template/footer");
    }
    function register()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/member/register');
        $this->load->view("fronts/template/footer");
    }
    function web_confirmprofile()
    {
        $this->load->view("fronts/template/header");
        $this->load->view('fronts/member/profile');
        $this->load->view("fronts/template/footer");
    }
    function login()
    {
        $this->load->view('fronts/template/header');
        $this->load->view('fronts/member/login');
        $this->load->view('fronts/template/footer');
    }
    function orderlist()
    {
        $this->load->view('fronts/template/header');
        $this->load->view('fronts/orderlist/orderlist');
        $this->load->view('fronts/template/footer');
    }
    function contact_us(){
        $this->load->view('fronts/template/header');
        $this->load->view('fronts/contact_us/index');
        $this->load->view('fronts/template/footer');
    }
    function getpagination($url, $all_row, $uri_segment, $row)
    {
        $config['base_url'] = base_url() . $url;
        $config['total_rows'] = $all_row;
        $config['per_page'] = $row;
        $config["uri_segment"] = $uri_segment;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

}
