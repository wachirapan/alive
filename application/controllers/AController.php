<?php

class AController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') == '') {
            redirect('RegisterAndLogin/LoginAdmin', 'refresh');
            exit();
        }
    }

    function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    function checkregister($index = 1)
    {
        if (!isset($_GET['status'])) {
            $row = 50;
            $result['checkregister'] = $this->AQueryModel->check_register($index, $row, '');
            $result['links'] = $this->getpagination('AController/checkregister', $this->AQueryModel->check_register_count(''), 3, $row);
        } else {
            $row = 50;
            $result['checkregister'] = $this->AQueryModel->check_register($index, $row, $_GET['status']);
            $result['links'] = $this->getpagination('AController/checkregister', $this->AQueryModel->check_register_count($_GET['status']), 3, $row);
        }

        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/checkregister', $result);
        $this->load->view('admin/template/footer');
    }

    function register()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/register');
        $this->load->view('admin/template/footer');
    }

    function confirmprofile()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/confirmprofile');
        $this->load->view('admin/template/footer');
    }

    function listrepresentative($index = 1)
    {
        $row = 50;
        $result['members'] = $this->AQueryModel->get_members($index, $row);
        $result['links'] = $this->getpagination('AController/listrepresentative', $this->AQueryModel->get_members_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/listrepresentative', $result);
        $this->load->view('admin/template/footer');
    }

    function search_members($index = 1)
    {
        $member_name = $_GET['member_name'];
        $row = 50;
        $result['members'] = $this->AQueryModel->search_memberline($index, $row, $member_name);
        $result['links'] = $this->getpagination('AController/search_members', $this->AQueryModel->search_memberline_count($member_name), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/search_members', $result);
        $this->load->view('admin/template/footer');
    }

    function editprofilemember()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/editmember');
        $this->load->view('admin/template/footer');
    }

    function crm($index = 1)
    {
        $row = 50;
        $result['crm'] = $this->AQueryModel->get_crm($index, $row);
        $result['links'] = $this->getpagination('AController/crm', $this->AQueryModel->get_crm_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/crm/index", $result);
        $this->load->view('admin/template/footer');
    }

    function listcategory($index = 1)
    {
        $row = 25;
        $result['category'] = $this->AQueryModel->get_category($index, $row);
        $result['links'] = $this->getpagination('AController/listcategory', $this->AQueryModel->get_category_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/category/listcategory', $result);
        $this->load->view('admin/template/footer');
    }

    function create_category()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/category/createcategory');
        $this->load->view('admin/template/footer');
    }

    function edit_category()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/category/editcategory');
        $this->load->view('admin/template/footer');
    }

    function product($index = 1)
    {
        if (!isset($_GET['status'])) {
            $row = 50;
            $result['product'] = $this->AQueryModel->productstatus($index, $row, '');
            $result['links'] = $this->getpagination('AController/product', $this->AQueryModel->productstatus_count(''), 3, $row);
        } else {
            $row = 50;
            $result['product'] = $this->AQueryModel->productstatus($index, $row, 3);
            $result['links'] = $this->getpagination('AController/product', $this->AQueryModel->productstatus_count(3), 3, $row);
        }

        $this->load->view('admin/template/header');
        $this->load->view('admin/product/listproduct', $result);
        $this->load->view('admin/template/footer');
    }

    function createproduct()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/create');
        $this->load->view('admin/template/footer');
    }

    function edit_product()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/edit');
        $this->load->view('admin/template/footer');
    }

    function checkproduct_saler($index = 1)
    {
        $row = 50;
        $result['product'] = $this->AQueryModel->checkproductsaler($index, $row);
        $result['links'] = $this->getpagination('AController/checkproduct_saler', $this->AQueryModel->checkproductsaler_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/product/request_or_sale', $result);
        $this->load->view('admin/template/footer');
    }

    function checkproduct_saler_detail()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/request_detail');
        $this->load->view('admin/template/footer');
    }

    function product_member($index = 1)
    {
        if (!isset($_GET['status'])) {
            $row = 50;
            $result['product'] = $this->AQueryModel->product_member($index, $row, '');
            $result['links'] = $this->getpagination('AController/product_member', $this->AQueryModel->product_member_count(''), 3, $row);
        } else {
            $row = 50;
            $result['product'] = $this->AQueryModel->product_member($index, $row, 3);
            $result['links'] = $this->getpagination('AController/product_member', $this->AQueryModel->product_member_count(3), 3, $row);
        }
        $this->load->view('admin/template/header');
        $this->load->view('admin/product/listproductmember', $result);
        $this->load->view('admin/template/footer');
    }

    function purchase($index = 1)
    {
        $row = 50;
        $result['product'] = $this->AQueryModel->get_productall($index, $row);
        $result['links'] = $this->getpagination('AController/purchase', $this->AQueryModel->get_productall_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/index', $result);
        $this->load->view('admin/template/footer');
    }

    function purchase_ordersearch($index = 1)
    {
        $main_cate = $_GET['main_cate'];
        $row = 50;
        $result['product'] = $this->AQueryModel->get_productallSearch($index, $row, $main_cate);
        $result['links'] = $this->getpagination('AController/purchase_ordersearch', $this->AQueryModel->get_productallSearch_count($main_cate), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/index', $result);
        $this->load->view('admin/template/footer');
    }

    function cartshoping()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/cartshoping');
        $this->load->view('admin/template/footer');
    }

    function purchaseorder($index = 1)
    {
        $row = 50;
        $result['purchase'] = $this->AQueryModel->get_purchaseorder($index, $row);
        $result['links'] = $this->getpagination('AController/purchaseorder', $this->AQueryModel->get_purchaseorder_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/purchaseorder', $result);
        $this->load->view('admin/template/footer');
    }

    function orderpurchasedetail()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/orderpurchasedetail');
        $this->load->view('admin/template/footer');
    }
    function sendingcomplete($index = 1)
    {
        $row = 50;
        $result['sending'] = $this->AQueryModel->get_sendingcomplete($index, $row);
        $result['links'] = $this->getpagination('AController/sendingcomplete', $this->AQueryModel->get_sendingcomplete_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/purchase/sendingcomplete', $result);
        $this->load->view('admin/template/footer');
    }

    function score($index = 1)
    {
        if (!isset($_GET['status'])) {
            $row = 25;
            $result['giftbox'] = $this->AQueryModel->get_giftvoicher($index, $row, '');
            $result['links'] = $this->getpagination('AController/score', $this->AQueryModel->get_giftvoicher_count(''), 3, $row);
        } else {
            $row = 25;
            $result['giftbox'] = $this->AQueryModel->get_giftvoicher($index, $row, 2);
            $result['links'] = $this->getpagination('AController/score', $this->AQueryModel->get_giftvoicher_count(2), 3, $row);
        }

        $this->load->view('admin/template/header');
        $this->load->view('admin/score/index', $result);
        $this->load->view("admin/template/footer");
    }

    function create_score()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/score/create');
        $this->load->view('admin/template/footer');
    }

    function edit_score()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/score/edit');
        $this->load->view('admin/template/footer');
    }

    function category_blogs($index = 1)
    {
        $row = 25;
        $result['blogs'] = $this->AQueryModel->get_categoryblog($index, $row);
        $result['links'] = $this->getpagination('AController/category_blogs', $this->AQueryModel->get_categoryblog_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/blogs/category',$result);
        $this->load->view('admin/template/footer');
    }
    function review($index = 1)
    {
        $row = 25;
        $result['blogs'] = $this->AQueryModel->get_blogs($index, $row);
        $result['links'] = $this->getpagination('AController/review', $this->AQueryModel->get_blogs_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/blogs/review',$result);
        $this->load->view('admin/template/footer');
    }
    function create_review()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/blogs/createreview');
        $this->load->view('admin/template/footer');
    }
    function edit_review()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/blogs/editreview');
        $this->load->view('admin/template/footer');
    }
    function course_manual($index = 1)
    {
        $row = 25;
        $result['course'] = $this->AQueryModel->get_learnonline($index, $row, 'video');
        $result['links'] = $this->getpagination('AController/course_manual', $this->AQueryModel->get_learnonline_count('video'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/course/manual', $result);
        $this->load->view("admin/template/footer");
    }

    function course_sound($index = 1)
    {
        $row = 25;
        $result['course'] = $this->AQueryModel->get_learnonline($index, $row, 'sound');
        $result['links'] = $this->getpagination('AController/course_sound', $this->AQueryModel->get_learnonline_count('sound'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/course/sound', $result);
        $this->load->view("admin/template/footer");
    }

    function gallary_promote($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'promote');
        $result['links'] = $this->getpagination('AController/gallary_promote', $this->AQueryModel->get_gallary_count('promote'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/gallary/promote",$result);
        $this->load->view('admin/template/footer');
    }
    function gallary_image($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'image');
        $result['links'] = $this->getpagination('AController/gallary_image', $this->AQueryModel->get_gallary_count('image'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/gallary/image",$result);
        $this->load->view('admin/template/footer');
    }
    function gallary_video($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'video');
        $result['links'] = $this->getpagination('AController/gallary_video', $this->AQueryModel->get_gallary_count('video'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/gallary/video",$result);
        $this->load->view('admin/template/footer');
    }
    function gallary_artwork($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'artwork');
        $result['links'] = $this->getpagination('AController/gallary_artwork', $this->AQueryModel->get_gallary_count('artwork'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/gallary/artwork",$result);
        $this->load->view('admin/template/footer');
    }
    function gallary_caption($index = 1)
    {
        $row = 50;
        $result['gallary'] = $this->AQueryModel->get_gallary($index, $row, 'caption');
        $result['links'] = $this->getpagination('AController/gallary_caption', $this->AQueryModel->get_gallary_count('caption'), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view("admin/gallary/caption",$result);
        $this->load->view('admin/template/footer');
    }
    function order_discount($index = 1)
    {
        $row = 50;
        $result['discount'] = $this->AQueryModel->get_order_discount($index, $row);
        $result['links'] = $this->getpagination('AController/order_discount', $this->AQueryModel->get_order_discount_cont(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/order_discount', $result);
        $this->load->view('admin/template/footer');
    }
    function amount_discount($index = 1)
    {
        $row = 50;
        $result['discount'] = $this->AQueryModel->amount_discount($index, $row);
        $result['links'] = $this->getpagination('AController/amount_discount', $this->AQueryModel->amount_discount_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/amount_discount', $result);
        $this->load->view('admin/template/footer');
    }
    function setting_lineup($index = 1)
    {
        $row = 50;
        $result['lineup'] = $this->AQueryModel->get_setting_lineup($index, $row);
        $result['links'] = $this->getpagination('AController/setting_lineup', $this->AQueryModel->get_setting_lineup_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/setting_lineup', $result);
        $this->load->view('admin/template/footer');
    }
    function allsale($index = 1)
    {
        $row = 50;
        $result['allsale'] = $this->AQueryModel->get_allsale($index, $row);
        $result['links'] = $this->getpagination('AController/allsale', $this->AQueryModel->get_allsale_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/allsale', $result);
        $this->load->view('admin/template/footer');
    }
    function linetoken($index = 1)
    {
        $row = 50;
        $result['linetoken'] = $this->AQueryModel->get_linetoken($index, $row);
        $result['links'] = $this->getpagination('AController/linetoken', $this->AQueryModel->get_linetoken_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/linetoken', $result);
        $this->load->view('admin/template/footer');
    }
    function about_us()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/about');
        $this->load->view('admin/template/footer');
    }
    function social()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/social');
        $this->load->view('admin/template/footer');
    }
    function banner($index = 1)
    {
        $row = 50;
        $result['banner'] = $this->AQueryModel->get_banners($index, $row);
        $result['links'] = $this->getpagination('AController/banner', $this->AQueryModel->get_banners_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/setting/banner', $result);
        $this->load->view('admin/template/footer');
    }

    function company()
    {
        $this->load->view('admin/template/header');
        $result['profile'] = $this->AQueryModel->checkCompany();
        if(count($result['profile']) == 0){
            $this->load->view('admin/setting/profile');
        }else{
            $this->load->view('admin/setting/editprofile',$result);
        }
        $this->load->view('admin/template/footer');
    }
    function contact_us($index = 1)
    {
        $row = 50;
        $result['contact'] = $this->AQueryModel->get_contact($index, $row);
        $result['links'] = $this->getpagination('AController/contact_us', $this->AQueryModel->get_contact_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/contact/list',$result);
        $this->load->view('admin/template/footer');
    }

    function contactdetail()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/contact/detail');
        $this->load->view('admin/template/footer');
    }
    function answer_contact()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/contact/answer');
        $this->load->view('admin/template/footer');
    }
    //-----------------------REPORT
    function procress($index = 1)
    {
        $row = 50;
        $result['groupday'] = $this->AQueryModel->get_orderprsent($index, $row);
        $result['links'] = $this->getpagination('AController/procress', $this->AQueryModel->get_orderprsent_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/procress',$result);
        $this->load->view('admin/template/footer');
    }
    function detailgroupday($index = 1)
    {
        $groupbyday_id = $_GET['groupbyday_id'];
        $row = 50;
        $result['ordermove'] = $this->AQueryModel->get_detailgroupday($index, $row, $groupbyday_id);
        $result['links'] = $this->getpagination('WAController/detailgroupday', $this->AQueryModel->get_detailgroupday_count($groupbyday_id), 3, $row);
        $result['groupbyday_id'] = $groupbyday_id;

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/detailprocress',$result);
        $this->load->view('admin/template/footer');

    }

    function report_position($index = 1)
    {
        $row = 50;
        $result['position'] = $this->AQueryModel->get_positionreport($index, $row);
        $result['links'] = $this->getpagination('AController/report_position', $this->AQueryModel->get_positionreport_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/position',$result);
        $this->load->view('admin/template/footer');
    }
    function detailposition($index = 1)
    {
        $group_id = $_GET['group_id'];
        $row = 50;
        $result['position'] = $this->AQueryModel->get_positiondetailreport($index, $row, $group_id);
        $result['links'] = $this->getpagination('AController/detailposition', $this->AQueryModel->get_positiondetailreport_count($group_id), 3, $row);


        $this->load->view('admin/template/header');
        $this->load->view('admin/report/detailposition',$result);
        $this->load->view('admin/template/footer');
    }
    function reportgrouplineup($index = 1)
    {
        $row = 50;
        $result['position'] = $this->AQueryModel->get_positionreport($index, $row);
        $result['links'] = $this->getpagination('AController/reportgrouplineup', $this->AQueryModel->get_positionreport_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/lineup',$result);
        $this->load->view('admin/template/footer');
    }
    function detailreportgrouplineup($index = 1)
    {
        $group_id = $_GET['group_id'];
        $row = 50;
        $result['position'] = $this->AQueryModel->get_positiondetailreport($index, $row, $group_id);
        $result['links'] = $this->getpagination('WAController/detailposition', $this->AQueryModel->get_positiondetailreport_count($group_id), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/detaillineup',$result);
        $this->load->view('admin/template/footer');
    }

    function report_month($index = 1)
    {
        $row = 50;
        $result['moveorder'] = $this->AQueryModel->get_positionreport($index, $row);
        $result['links'] = $this->getpagination('AController/report_month', $this->AQueryModel->get_positionreport_count(), 3, $row);


        $this->load->view('admin/template/header');
        $this->load->view('admin/report/month',$result);
        $this->load->view('admin/template/footer');
    }

    function reportdetail_mounth($index = 1)
    {
        $compilemount_id = $_GET['compilemount_id'];
        $row = 50;
        $result['month_end_summary'] = $this->AQueryModel->get_month_end_summary($index, $row, $compilemount_id);
        $result['links'] = $this->getpagination('AController/reportdetail_mounth', $this->AQueryModel->get_month_end_summary_count($compilemount_id), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/report/detailmonth',$result);
        $this->load->view('admin/template/footer');

    }
    function detailmonth_member()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/report/subdetailmonth');
        $this->load->view('admin/template/footer');
    }

    //-----------------------REPORT
    function lineup()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/agents/lineup');
        $this->load->view('admin/template/footer');
    }
    function selectgiftbox($index = 1)
    {
        $row = 50;
        $result['giftbox'] = $this->AQueryModel->get_giftboxselect($index, $row);
        $result['links'] = $this->getpagination('AController/selectgiftbox', $this->AQueryModel->get_giftboxselect_count(), 3, $row);

        $this->load->view('admin/template/header');
        $this->load->view('admin/score/selectgiftbox',$result);
        $this->load->view('admin/template/footer');
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