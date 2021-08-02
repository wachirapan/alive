<?php

class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($_SESSION['member_login'] == ''){
            redirect('welcome/login','refresh');
            exit();
        }
    }
    function index()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/index');
        $this->load->view('backend/template/footer');
    }
    function editprofile()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/profile/editprofile');
        $this->load->view('backend/template/footer');
    }
    function changepassword()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/changepassword/index');
        $this->load->view('backend/template/footer');
    }
    function cardmember()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/cardmember/index');
        $this->load->view('backend/template/footer');
    }
    function form_register_agent()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/agent/form_register');
        $this->load->view('backend/template/footer');
    }
    function confirmprofile()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/agent/confirmprofile');
        $this->load->view('backend/template/footer');
    }
    function linkregister()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/linkregister/index');
        $this->load->view('backend/template/footer');
    }
    function listrepresentative($index = 1)
    {
        $row = 50;
        $result['members'] = $this->BQueryModel->lineupmemberagent($index, $row);
        $result['links'] = $this->getpagination('Backend/listrepresentative', $this->BQueryModel->lineupmemberagent_count(), 3, $row);

        $this->load->view("backend/template/header");
        $this->load->view('backend/representative/listrepresentative',$result);
        $this->load->view('backend/template/footer');
    }

    function search_members($index = 1)
    {
        $member_name = $_GET['member_name'];
        $row = 50;
        $result['members'] = $this->BQueryModel->search_memberline($index, $row, $member_name);
        $result['links'] = $this->getpagination('Backend/search_members', $this->BQueryModel->search_memberline_count($member_name), 3, $row);

        $this->load->view("backend/template/header");
        $this->load->view('backend/representative/search_members',$result);
        $this->load->view('backend/template/footer');
    }
    function backend_crm($index = 1)
    {
        $row = 50;
        $result['order'] = $this->BQueryModel->salerscrm($index, $row);
        $result['links'] = $this->getpagination('Backend/backend_crm', $this->BQueryModel->salerscrm_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/crm/index',$result);
        $this->load->view('backend/template/footer');
    }
    function line_group($index = 1)
    {
        $row = 50 ;
        $result['linegroup'] = $this->BQueryModel->linegroup($index, $row) ;
        $result['links']  = $this->getpagination('Backend/line_group',$this->BQueryModel->linegroup_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/linegroup/index',$result);
        $this->load->view('backend/template/footer');
    }
    function product($index = 1)
    {
        if(!isset($_GET['status'])){
            $row = 50;
            $result['product'] = $this->BQueryModel->get_productforme($index, $row, '');
            $result['links'] = $this->getpagination('Backend/product', $this->BQueryModel->get_productforme_count(''), 3, $row);
        }else{
            $row = 50;
            $result['product'] = $this->BQueryModel->get_productforme($index, $row, 3);
            $result['links'] = $this->getpagination('Backend/product', $this->BQueryModel->get_productforme_count(3), 3, $row);
        }


        $this->load->view('backend/template/header');
        $this->load->view('backend/product/listproduct',$result);
        $this->load->view('backend/template/footer');
    }
    function create_prouduct()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/product/create_product');
        $this->load->view('backend/template/footer');
    }
    function edit_product()
    {
        $this->load->view('wbackend/template/header');
        $this->load->view('wbackend/product/edit_product');
        $this->load->view('wbackend/template/footer');
    }
    function purchase_order($index = 1)
    {
        $row = 50;
        $result['product'] = $this->BQueryModel->get_productall($index, $row);
        $result['links'] = $this->getpagination('Backend/purchase_order', $this->BQueryModel->get_productall_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/purchase/productlist',$result);
        $this->load->view('backend/template/footer');
    }
    function cartshoping($index = 1)
    {
        $row = 50;
        $result['purchase'] = $this->BQueryModel->orderpurchase($index, $row);
        $result['links'] = $this->getpagination('Backend/cartshoping', $this->BQueryModel->orderpurchase_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/purchase/cart',$result);
        $this->load->view('backend/template/footer');
    }

    function purchase_senderorder($index = 1)
    {
        $row = 50;
        $result['order'] = $this->BQueryModel->orderpurchase($index, $row);
        $result['links'] = $this->getpagination('Backend/purchase_senderorder', $this->BQueryModel->orderpurchase_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/purchase_senderorder/list',$result);
        $this->load->view('backend/template/footer');
    }

    function score($index = 1)
    {
        $row = 25;
        $result['giftbox'] = $this->BQueryModel->get_giftvoicher($index, $row);
        $result['links'] = $this->getpagination('Backend/score', $this->BQueryModel->get_giftvoicher_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/score/index',$result);
        $this->load->view('backend/template/footer');
    }

    function profile()
    {
        $result['subdomain'] = $this->BQueryModel->check_subdoamin();
        $this->load->view('backend/template/header');
        $checksubdomain = $this->BQueryModel->check_subdoamin();
        if(count($checksubdomain) == 0){
            $this->load->view('backend/profile/index');
        }else{
            $this->load->view('backend/profile/editprofilesub',$result);
        }

        $this->load->view('backend/template/footer');
    }

    function report_score($index = 1)
    {
        $row = 50;
        $result['score'] = $this->BQueryModel->report_score($index, $row);
        $result['links'] = $this->getpagination('Backend/report_score', $this->BQueryModel->report_score_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/report/score',$result);
        $this->load->view('backend/template/footer');
    }
    function report_position($index = 1)
    {
        $row = 50 ;
        $result['position'] = $this->BQueryModel->get_positionreport($index, $row) ;
        $result['links']  = $this->getpagination('Backend/report_position',$this->BQueryModel->get_positionreport_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/report/position',$result);
        $this->load->view('backend/template/footer');
    }
    function reportgrouplineup($index = 1)
    {
        $row = 50 ;
        $result['position'] = $this->BQueryModel->get_positionreport($index, $row) ;
        $result['links']  = $this->getpagination('Backend/reportgrouplineup',$this->BQueryModel->get_positionreport_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/report/lineup',$result);
        $this->load->view('backend/template/footer');

    }
    function recommend_value($index = 1)
    {
        $row = 50 ;
        $result['position'] = $this->BQueryModel->get_positionreport($index, $row) ;
        $result['links']  = $this->getpagination('Backend/recommend_value',$this->BQueryModel->get_positionreport_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/report/recommend',$result);
        $this->load->view('backend/template/footer');

    }

    function online_course()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/online_course/index');
        $this->load->view('backend/template/footer');
    }

    function filesound($index = 1)
    {
        $row = 50;
        $result['onlinecourse'] = $this->BQueryModel->coursesound($index, $row);
        $result['links'] = $this->getpagination('Backend/filesound', $this->BQueryModel->coursesound_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/online_course/filesound',$result);
        $this->load->view('backend/template/footer');
    }

    function gallary_promote($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->BQueryModel->get_gallary($index, $row, 'promote');
        $result['links'] = $this->getpagination('Backend/gallary_promote', $this->BQueryModel->get_gallary_count('promote'), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view("backend/gallary/promote",$result);
        $this->load->view('backend/template/footer');
    }
    function gallary_image($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'image');
        $result['links'] = $this->getpagination('Backend/gallary_image', $this->AQueryModel->get_gallary_count('image'), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view("backend/gallary/image",$result);
        $this->load->view('backend/template/footer');
    }

    function gallary_artwork($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'artwork');
        $result['links'] = $this->getpagination('Backend/gallary_artwork', $this->AQueryModel->get_gallary_count('artwork'), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view("backend/gallary/artwork",$result);
        $this->load->view('backend/template/footer');
    }
    function gallary_caption($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'caption');
        $result['links'] = $this->getpagination('Backend/gallary_caption', $this->AQueryModel->get_gallary_count('caption'), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view("backend/gallary/caption",$result);
        $this->load->view('backend/template/footer');
    }
    function contact_us($index = 1)
    {
        $row = 50;
        $result['contact'] = $this->BQueryModel->get_contactus($index, $row);
        $result['links'] = $this->getpagination('Backend/contact_us', $this->BQueryModel->get_contactus_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/contact/index',$result);
        $this->load->view('backend/template/footer');
    }
    function create_contact()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/contact/create');
        $this->load->view('backend/template/footer');
    }
    function contactdetail()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/contact/detail');
        $this->load->view('backend/template/footer');
    }
    function answer_contact()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/contact/answer');
        $this->load->view('backend/template/footer');
    }
    function lineup()
    {
        $this->load->view('backend/template/header');
        $this->load->view('backend/agent/lineup');
        $this->load->view('backend/template/footer');
    }
    function scoreselect($index = 1)
    {
        $row = 50;
        $result['giftbox'] = $this->BQueryModel->get_selectGiftbox($index, $row);
        $result['links'] = $this->getpagination('Backend/scoreselect', $this->BQueryModel->get_selectGiftbox_count(), 3, $row);

        $this->load->view('backend/template/header');
        $this->load->view('backend/score/scoreselect',$result);
        $this->load->view('backend/template/footer');
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