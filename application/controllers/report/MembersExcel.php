<?php

/**
 * Created by PhpStorm.
 * User: nongarpo
 * Date: 10/6/2021 AD
 * Time: 16:05
 */
class MembersExcel extends CI_Controller
{
    function report_score()
    {
        $month = $_GET['month'];
        $date = date_create($month);
        $statdate = date_format($date,"Y-m-").'1';
        $enddate = date('Y-m-t',strtotime($month)) ;

        $result['ordermove'] = $this->ReportQuery->get_score($statdate, $enddate);

        $this->load->view('backend/report/excel/score',$result);

    }
    function detailposition()
    {
        $group_id = $_GET['group_id'];
        $result['position'] = $this->BQueryModel->get_positiondetailreport($group_id) ;

        $this->load->view('backend/report/excel/position',$result);

    }
}