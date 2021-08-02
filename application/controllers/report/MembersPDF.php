<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MembersPDF extends CI_Controller
{
    function report_score()
    {
        $mpdf = new \Mpdf\Mpdf();

        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/fonts',
            ]),
            'fontdata' => $fontData + [
                    'thsarabun' => [
                        'R' => 'THSarabun.ttf',
                        //'I' => 'THSarabunNew Italic.ttf',
                        //'B' => 'THSarabunNew Bold.ttf',
                    ]
                ],
            'default_font' => 'thsarabun'
        ]);

        $month = $_GET['month'];
        $date = date_create($month);
        $statdate = date_format($date,"Y-m-").'1';
        $enddate = date('Y-m-t',strtotime($month)) ;

        $result['ordermove'] = $this->ReportQuery->get_score($statdate, $enddate);

        $name = 'score-'.date('Y-m-d') ;
        $html = $this->load->view('backend/report/pdf/score',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in

    }
    function detailposition()
    {
        $mpdf = new \Mpdf\Mpdf();

        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/fonts',
            ]),
            'fontdata' => $fontData + [
                    'thsarabun' => [
                        'R' => 'THSarabun.ttf',
                        //'I' => 'THSarabunNew Italic.ttf',
                        //'B' => 'THSarabunNew Bold.ttf',
                    ]
                ],
            'default_font' => 'thsarabun'
        ]);


        $group_id = $_GET['group_id'];
        $result['position'] = $this->BQueryModel->get_positiondetailreport($group_id) ;

        $name = 'score-'.date('Y-m-d') ;
        $html = $this->load->view('backend/report/pdf/position',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in
    }
}