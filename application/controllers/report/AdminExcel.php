<?php

class AdminExcel extends CI_Controller
{
    function procress()
    {
        $groupbyday_id = $_GET['groupbyday_id'];

        $result['ordermove'] = $this->ReportQuery->get_detailgroupday($groupbyday_id);
        $result['groupbyday_id'] = $groupbyday_id;

        $this->load->view('admin/report/excel/procress',$result);
    }
    function position()
    {
        $group_id = $_GET['group_id'];
        $result['position'] = $this->ReportQuery->get_positiondetailreport($group_id);

        $this->load->view('admin/report/excel/position',$result);
    }
    function lineup()
    {
        $group_id = $_GET['group_id'];
        $result['position'] = $this->ReportQuery->get_positiondetailreport( $group_id);

        $this->load->view('admin/report/excel/lineup',$result);

    }
    function exceldetail_mounth()
    {
        $compilemount_id = $_GET['compilemount_id'];

        $result['month_end_summary'] = $this->ReportQuery->excelmonth_end_summary($compilemount_id);

        $this->load->view('admin/report/excel/month',$result);
    }
}