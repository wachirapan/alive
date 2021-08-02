<?php

class CompileDay extends CI_Controller
{
    function index()
    {
        $status = 'false';
        $check = $this->db->select('*')->from('compileday')->where('compileday_date',date('Y-m-d'))
            ->get()->result();
        if(count($check) == 0){
            $status = 'true';
            $this->db->insert('compileday',array(
                'compileday_date'=>date('Y-m-d')
            ));
            $compile_id = $this->db->insert_id();

            $ordermove = $this->db->select("*")->from('ordermove')->where('computeday_id',0)->get()->result();
            foreach ($ordermove as $item){
                $this->db->where('ordermove_id',$item->ordermove_id)->update('ordermove',array(
                    'computeday_id'=>$compile_id
                ));
            }
        }
        echo json_encode($status);

    }
}