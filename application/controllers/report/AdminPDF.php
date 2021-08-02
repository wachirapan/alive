<?php

class AdminPDF extends CI_Controller
{
    function procress()
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


        $groupbyday_id = $_GET['groupbyday_id'];
        $result['ordermove'] = $this->ReportQuery->get_detailgroupday($groupbyday_id);
        $result['groupbyday_id'] = $groupbyday_id;

        $name = 'score-'.date('Y-m-d') ;

        $html = $this->load->view('admin/report/pdf/procress',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in
    }
    function position()
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
        $result['position'] = $this->ReportQuery->get_positiondetailreport($group_id);

        $name = 'position-'.date('Y-m-d') ;

        $html = $this->load->view('admin/report/pdf/position',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in
    }
    function lineup()
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
        $result['position'] = $this->ReportQuery->get_positiondetailreport( $group_id);

        $name = 'position-'.date('Y-m-d') ;

        $html = $this->load->view('admin/report/pdf/lineup',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in
    }
    function exceldetail_mounth()
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


        $compilemount_id = $_GET['compilemount_id'];
        $result['month_end_summary'] = $this->ReportQuery->excelmonth_end_summary($compilemount_id);

        $name = 'position-'.date('Y-m-d') ;

        $html = $this->load->view('admin/report/pdf/month',$result,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in
    }
}