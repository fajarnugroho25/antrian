<?php
// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;
// require APPPATH .'/libraries/PHPMailer/class.phpmailer.php';
require APPPATH . '/libraries/REST_Controller.php';

class apiperbaikan extends REST_Controller {


   function __construct($config = 'rest') {
        //cors
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct($config);
        // $this->load->library('encrypt');
        $this->load->model('mapiperbaikan');
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');

    }

 

    //API for get listperbaikan hardware
    function listperbaikanhardware_get() {
        $listperbaikanhardware = $this->mapiperbaikan->get_listperbaikanhardware();
        $data['data'] = $listperbaikanhardware;
        $this->response($data, 200);
    }

      //API for get listperbaikan software
    function listperbaikansoftware_get() {
        $listperbaikansoftware = $this->mapiperbaikan->get_listperbaikansoftware();
        $data['data'] = $listperbaikansoftware;
        $this->response($data, 200);
    }

     function prioritas_get() {
        $prioritas = $this->mapiperbaikan->get_prioritas();
        $data['prioritas'] = $prioritas;
        $this->response($data, 200);
    }

    function unit_get() {
        $unit = $this->mapiperbaikan->get_unit();
        $data['unit'] = $unit;
        $this->response($data, 200);
    }

    function jenis_perbaikan_get() {
        $jenis_perbaikan = $this->mapiperbaikan->get_jenis_perbaikan();
        $data['jenis_perbaikan'] = $jenis_perbaikan;
        $this->response($data, 200);
    }
 // get all  detail
    function perbaikandetil_get() {
        $id_perbaikan = $this->get('id_perbaikan');
        
        
            $a = $this->mapiperbaikan->get_perbaikandetil($id_perbaikan);
            $data['perbaikan'] = $a[0];
       

        $this->response($data, 200);
    }

    function RatingPerbaikan_post(){
        $id_perbaikan = $this->input->post('id_perbaikan');
        $rate = $this->input->post('rate');



        if ($this->input->post() == []) {
            # code...
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $id_perbaikan = $params["id_perbaikan"];
            $rate = $params["rate"];
            $selesai = date("Y-m-d H:i:s");
        } else {
            $id_perbaikan = $this->input->post('id_perbaikan');
            $rate = $this->input->post('rate');
            $selesai = date("Y-m-d H:i:s");
        }

        $datarating = array('rating' => $rate, 'tgl_selesai' => $selesai ,'status' => '2');
        $updateRate = $this->mapiperbaikan->up_rate($id_perbaikan,$datarating);
        $data['data'] = "Terima Kasih :)";
       

        $this->response($data, 200);

    } 

    function ResponPerbaikan_post(){
        $id_perbaikan = $this->input->post('id_perbaikan');
        
        if ($this->input->post() == []) {
            # code...
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $id_perbaikan = $params["id_perbaikan"];
            $respon = date("Y-m-d H:i:s");
           
        } else {
            $id_perbaikan = $this->input->post('id_perbaikan');
            $respon = date("Y-m-d H:i:s");
        }

        $datarespon = array('tgl_respon' => $respon, 'status' => '1');
        $updateRespon = $this->mapiperbaikan->up_respon($id_perbaikan,$datarespon);
        $data['data'] = "Terima Kasih :)";
       

        $this->response($data, 200);

    } 

      function InputPerbaikan_post(){        
        $id_perbaikan =  $this->mapiperbaikan->no_perbaikan('kodejadi');
        
        if ($this->input->post() == []) {
            # code...
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $id_perbaikan = $id_perbaikan;
            $keluhan = $params["keluhan"];
            $user_peminta = $params["user_peminta"];
            $unit_id = $params["unit_id"];
            $prioritas = $params["prioritas"];
            $id_jenis = $params["id_jenis"];
            $tgl_input = date("Y-m-d H:i:s");
            $status = "0";
           
        } else {
            $id_perbaikan = $id_perbaikan;                
            $unit_id = $this->input->post('unit_id');
            $keluhan = $this->input->post('keluhan');
            $user_peminta = $this->input->post('user_peminta');
            $prioritas = $this->input->post('prioritas');
            $id_jenis = $this->input->post('id_jenis');        
            $tgl_input = date("Y-m-d H:i:s");
            $status = "0";
           
        }

        $datainput = array('id_perbaikan' => $id_perbaikan, 'keluhan' => $keluhan, 'user_peminta' => $user_peminta, 'unit_id' => $unit_id, 'prioritas' => $prioritas, 'id_jenis' => $id_jenis, 'tgl_input' => $tgl_input, 'status' => $status);
        $inputperbaikan = $this->mapiperbaikan->inputperbaikan($id_perbaikan, $tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status);
        $data['data'] = "Terima Kasih :)";
       

        $this->response($data, 200);


    }





}
