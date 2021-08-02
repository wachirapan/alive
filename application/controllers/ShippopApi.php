<?php

class ShippopApi extends CI_Controller
{
    private $key = 'dvb631eb7a2fbbaf2b86fcc8d32e86202e5f260dfcf12a2b3f87573def618cfc2a5603d0dde57da2611625119884';

    function shippoCheckprice()
    {
        $to_name = $_POST['to_name'];
        $to_address = $_POST['to_address'];
        $to_postcode = $_POST['to_postcode'];
        $to_phone = $_POST['to_phone'];

        $weight = $_POST['weight'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $height = $_POST['height'];

        $url = 'http://mkpservice.moaee.com/pricelist/';
        $data = array(
            'api_key'=>$this->key,
            'data'=>[[

                "from"=> [
                    "name"=> $this->ShippoModel->checkFromName(),
                    "address"=> $this->ShippoModel->checkAddress(),
                    "district"=> "-",
                    "state"=> "-",
                    "province"=> "-",
                    "postcode"=> $this->ShippoModel->checkZipcode(),
                    "tel"=> $this->ShippoModel->checkPhone()
                ],
                "to"=> [
                    "name"=> $to_name,
                    "address"=> $to_address,
                    "district"=> "-",
                    "state"=> "-",
                    "province"=> "-",
                    "postcode"=> $to_postcode,
                    "tel"=> $to_phone
                ],
                "parcel"=> [
                    "name"=> "-",
                    "weight"=> $weight,
                    "width"=> $width,
                    "length"=> $length,
                    "height"=> $height
                ],
                "showall"=> "1"

            ]]
        );

        $ch = curl_init( $url );

        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);



        $arr = [];
        $obj = json_decode($result, true);

        $jsondata = [];

        foreach($obj['data'][0] as $x => $val) {
//            echo '++++++++++++++++++++'.$x.'<br/>';
            $data = array();
            foreach ($val as $k=> $v){
                $data += array($k =>$v );
//                echo $k.' --- '.$v . "<br/>" ;
            }
            array_push($arr, $data);
        }

        for ($i = 0 ; $i < count($arr) ; $i++){
//            print_r($arr[$i]['courier_code'].' --- '.$arr[$i]['price'].' ----- '.$arr[$i]['courier_name'].'<br/>');
            $data =  array('courier_code'=>$arr[$i]['courier_code'], 'price'=>$arr[$i]['price'], 'estimate_time'=>$arr[$i]['estimate_time'],
                'courier_name'=>$arr[$i]['courier_name']);
            array_push($jsondata, $data);
        }
        echo json_encode($jsondata);

    }
    function createBookingOrder()
    {
        if(!isset( $_POST['to_name']) == ''){
            $to_name = $_POST['to_name'];
            $to_address = $_POST['to_address'];
            $to_postcode = $_POST['to_postcode'];
            $to_phone = $_POST['to_phone'];

            $weight = $_POST['to_weight'];
            $width = $_POST['to_width'];
            $length = $_POST['to_length'];
            $height = $_POST['to_height'];

            $ordermove_id = $_POST['ordermove_id'];
            $courier_code = $_POST['courier_code'];
            $courier_price = $_POST['courier_price'];
            $courier_name = $_POST['courier_name'];
            $estimate_time = $_POST['estimate_time'];

            $url = 'http://mkpservice.moaee.com/booking/';
            $data = array(
                "api_key"=>$this->key,
                "email"=> "youremail@domain.com",
                "url"=>[
                    "success" =>"http://shippop.com/?success",
                    "fail"=> "http://shippop.com/?fail"
                ],
                "data"=> [
                    [
                        "from"=> [
                            "name"=> $this->ShippoModel->checkFromName(),
                            "address"=>$this->ShippoModel->checkAddress(),
                            "district"=> "-",
                            "state"=> "-",
                            "province"=> "-",
                            "postcode"=> $this->ShippoModel->checkZipcode(),
                            "tel"=> $this->ShippoModel->checkPhone()
                        ],
                        "to"=> [
                            "name"=> $to_name,
                            "address"=> $to_address,
                            "district"=> "-",
                            "state"=> "-",
                            "province"=> "-",
                            "postcode"=> $to_postcode,
                            "tel"=> $to_phone
                        ],
                        "parcel"=> [
                            "name"=> "-",
                            "weight"=> $weight,
                            "width"=> $width,
                            "length"=> $length,
                            "height"=> $height
                        ],
                        "courier_code"=> $courier_code
                    ]
                ]
            );

            $ch = curl_init( $url );

            $payload = json_encode( $data );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result, true);

            $orderbooking = array('purchase_id'=>$obj['purchase_id'],'tracking_code'=> $obj['data'][0]['tracking_code'],
                'courier_tracking_code'=>$obj['data'][0]['courier_tracking_code'], 'origin_id'=>$obj['data'][0]['from']['origin_id'],
                'mem_id'=>$obj['data'][0]['from']['mem_id'],'dest_id'=> $obj['data'][0]['to']['dest_id'],
                'price'=>$courier_price,'courier_name'=>$courier_name,'estimate_time'=>$estimate_time,
                'to_name'=>$to_name,'to_address'=>$to_address,'postcode'=>$to_postcode,'tel'=>$to_phone,
                'ordermove_id'=>$ordermove_id);

            $this->load->view('admin/template/header');
            $this->load->view('admin/purchase/confirmBooking',$orderbooking);
            $this->load->view('admin/template/footer');

        }else{
            redirect('WAController/purchaseorder','refresh');
            exit();
        }

    }
    function confirmBooking()
    {
        $purchase_id = $_POST['purchase_id'];

        //database insert
        $courier_code = $_POST['courier_code'];
        $tracking_code = $_POST['tracking_code'];
        $courier_name = $_POST['courier_name'];
        $price = $_POST['price'];
        $origin_id = $_POST['origin_id'];
        $mem_id = $_POST['mem_id'];
        $dest_id = $_POST['dest_id'];
        $ordermove_id = $_POST['ordermove_id'];

        $express = array(
            'ordermove_id'=>$ordermove_id,
            'express_company'=>$courier_name,
            'express_serial'=>$tracking_code,
            'express_date'=>date('Y-m-d'),
            'purchase_id'=>$purchase_id,
            'total_price'=>$price,
            'origin_id'=>$origin_id,
            'mem_id'=>$mem_id,
            'dest_id'=>$dest_id,
            'courier_code'=>$courier_code
        );
        $this->expressCreate($express, $ordermove_id);
        //database insert

        $data = array(
            "api_key"=>$this->key,
            "purchase_id"=> $purchase_id
        );
        $url = 'http://mkpservice.moaee.com/confirm/';

        $ch = curl_init( $url );

        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        $status = false ;
        $obj = json_decode($result, true);
        if($obj['status'] == 1){
            $status = true;
        }else{
            $status = false;
        }
        echo json_encode($status);
    }
    function expressCreate($express, $ordermove_id)
    {
        $this->db->insert('express',$express);

        $this->db->where('ordermove_id',$ordermove_id)->update('ordermove',array(
            'ordermove_payments'=>4
        ));
    }
    function check_trackingorder()
    {
        $tracking = $_GET['tracking'];

        $data = array(
            "tracking_code"=> $tracking
        );
        $url = 'http://mkpservice.moaee.com/tracking/';


        $ch = curl_init( $url );

        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result, true);

        $status = $this->ShippoModel->checkStatusbooking($obj['order_status']);

        echo json_encode($status);
    }
    function printorderSender()
    {
        $purchase_id = $_GET['purchase_id'];
        $tracking_code = $_GET['tracking_code'];

        $data = array(
            "api_key"=> "dvb631eb7a2fbbaf2b86fcc8d32e86202e5f260dfcf12a2b3f87573def618cfc2a5603d0dde57da2611625119884",
            "purchase_id"=> $purchase_id,
            "tracking_code"=> $tracking_code,
            "size"=> "a4",
            "logo"=> base_url('assets/logoalive.png'),
            "type"=> "html"
        );

        $url = "http://mkpservice.moaee.com/label/";

        $ch = curl_init( $url );
        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result, true);

        print_r($obj['html']);

    }


    function mobileBookingOrder()
    {
        if(!isset( $_POST['to_name']) == ''){
            $to_name = $_POST['to_name'];
            $to_address = $_POST['to_address'];
            $to_postcode = $_POST['to_postcode'];
            $to_phone = $_POST['to_phone'];

            $weight = $_POST['to_weight'];
            $width = $_POST['to_width'];
            $length = $_POST['to_length'];
            $height = $_POST['to_height'];

            $ordermove_id = $_POST['ordermove_id'];
            $courier_code = $_POST['courier_code'];
            $courier_price = $_POST['courier_price'];
            $courier_name = $_POST['courier_name'];
            $estimate_time = $_POST['estimate_time'];

            $url = 'http://mkpservice.moaee.com/booking/';
            $data = array(
                "api_key"=>$this->key,
                "email"=> "youremail@domain.com",
                "url"=>[
                    "success" =>"http://shippop.com/?success",
                    "fail"=> "http://shippop.com/?fail"
                ],
                "data"=> [
                    [
                        "from"=> [
                            "name"=> $this->ShippoModel->checkFromName(),
                            "address"=>$this->ShippoModel->checkAddress(),
                            "district"=> "-",
                            "state"=> "-",
                            "province"=> "-",
                            "postcode"=> $this->ShippoModel->checkZipcode(),
                            "tel"=> $this->ShippoModel->checkPhone()
                        ],
                        "to"=> [
                            "name"=> $to_name,
                            "address"=> $to_address,
                            "district"=> "-",
                            "state"=> "-",
                            "province"=> "-",
                            "postcode"=> $to_postcode,
                            "tel"=> $to_phone
                        ],
                        "parcel"=> [
                            "name"=> "-",
                            "weight"=> $weight,
                            "width"=> $width,
                            "length"=> $length,
                            "height"=> $height
                        ],
                        "courier_code"=> $courier_code
                    ]
                ]
            );

            $ch = curl_init( $url );

            $payload = json_encode( $data );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result, true);

            $orderbooking = array('purchase_id'=>$obj['purchase_id'],'tracking_code'=> $obj['data'][0]['tracking_code'],
                'courier_tracking_code'=>$obj['data'][0]['courier_tracking_code'], 'origin_id'=>$obj['data'][0]['from']['origin_id'],
                'mem_id'=>$obj['data'][0]['from']['mem_id'],'dest_id'=> $obj['data'][0]['to']['dest_id'],
                'price'=>$courier_price,'courier_name'=>$courier_name,'estimate_time'=>$estimate_time,
                'to_name'=>$to_name,'to_address'=>$to_address,'postcode'=>$to_postcode,'tel'=>$to_phone,
                'ordermove_id'=>$ordermove_id);

            $this->load->view('admin/template/header');
            $this->load->view('admin/purchase/confirmBooking',$orderbooking);
            $this->load->view('admin/template/footer');

        }else{
            redirect('WAController/purchaseorder','refresh');
            exit();
        }

    }
    function checkOrderfront()
    {
        $ordermove_id = $_GET['ordermove_id'];
        $arr = [];
        $result = $this->db->select('*')->from('express')->where('ordermove_id',$ordermove_id)->get()->result();
        foreach ($result as $item){
            $data = array(
                'express_serial'=>$item->express_serial,
                'express_company'=>$item->express_company,
                'courier_code'=>$item->courier_code,
                'sending'=>$this->trackingorder($item->express_serial),
                'ordermove_price'=>$item->total_price
            );
            array_push($arr , $data);
        }
        echo json_encode($arr);

    }
    function trackingorder($express_serial)
    {
        $tracking = $express_serial;

        $data = array(
            "tracking_code"=> $tracking
        );
        $url = 'http://mkpservice.moaee.com/tracking/';


        $ch = curl_init( $url );

        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result, true);

        $status = $this->ShippoModel->checkStatusbooking($obj['order_status']);

        return $status;
    }
}