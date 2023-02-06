<?php
// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;
// require APPPATH .'/libraries/PHPMailer/class.phpmailer.php';
require APPPATH . '/libraries/REST_Controller.php';

class Android extends REST_Controller {


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
        $this->load->model('M_api');
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');

    }

    // get all data berita 
	function berita_get() {
        $a = $this->M_api->get_berita();
        $data['berita'] = $a;
        $this->response($data, 200);
    }

    // get user login 
    function login_post() {
        if ($this->input->post() == []) {
            # code...
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $username = $params["username"];
            $password = $params["password"];
        } else { 
            $username = $this->input->post('username');
            $password = $this->input->post('password');
        }

        if ($username == '' && $password == '') {
            $this->response(array('login' => 'username dan password tidak boleh kosong', 403));
        } else {
            $login = $this->M_api->login($username,$password);
            if ($login) {
                $keys = $this->M_api->keys();
                $data['data'] = $login[0];
                $data['data']['keys'] = $keys->key;
                $this->response($data, 200);
                # code...
            }else{
                $data['data'] = $this->response("maaf data tidak sesuai", 401);

            }
            
            
        }
        

        // exclude endpoint from api auth
        // code
        // get input username and password
        // check if exist
        // if exist return user with api key, get api key from keys table
        // if not exist return error with code 401
    }

    // get all berita detail
    function berita_detail_get() {
        $id = $this->get('id');
        $konten_jenis = $this->M_api->get_konten_jenis($id)[0]['konten_jenis'];
        if ($konten_jenis == '1' || $konten_jenis == '3') {
            $a = $this->M_api->get_berita_detail($id);
            $data['berita'] = $a[0];
        }
        else{

            $a = $this->M_api->get_detail_image($id);
            $b = $this->M_api->get_detail_judul($id);
            $data['berita'] = $b[0];
            $data['berita']['images'] = $a;

        }

        $this->response($data, 200);
    }


    //API for get slider
    function slider_get() {
        $slider = $this->M_api->get_slider();
        $data['slider'] = $slider;
        $this->response($data, 200);
    }

   

    // API for get all daftar dokter
    function DaftarDokter_get(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://192.168.0.236/api.php?mod=api&cmd=get_doctor&return_type=json%20",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E0cmVhbA==",
            "Postman-Token: ca75b801-b0ae-47ba-99a0-661cd6b19314",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }


    // API get jadwal dokter by id dokter 
    function jadwalDokter_get(){
        $id = $this->get('doctor_id');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.0.236/api.php?mod=api&cmd=get_schedule_doctor&return_type=json&doctor_id=".$id."%20",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E0cmVhbA==",
        "Postman-Token: d1ed0a72-e3d6-4268-a3eb-caa3171f76e4",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
    }

    //get jadwal cuti dokter by id dokter
    function jadwalCuti_get(){
        $id = $this->get('doctor_id');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.0.236/api.php?mod=api&cmd=get_leave_doctor&return_type=json&doctor_id=".$id."%20",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E0cmVhbA==",
        "Postman-Token: d1ed0a72-e3d6-4268-a3eb-caa3171f76e4",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
    }


    // API function for update pass 
    function ubahpass_post(){


        if ($this->input->post() == []) {
            # code...
            $params = json_decode(file_get_contents('php://input'), TRUE);
            $passbaru = $params["passbaru"];
            $passlama = $params["passlama"];
            $id = $params["id"];
        } else {
            $passbaru = $this->input->post('passbaru');
            $passlama = $this->input->post('passlama');
            $id = $this->input->post('id');
        }

        $kataSandibr = sha1($passbaru);
        $kataSandilm = sha1($passlama);
        $data_post = array('pass' => $kataSandibr);
        $data['user'] = $this->M_api->get_password($id)[0];
        $kataSandi = $data['user']['pass'];


            if ($kataSandi == $kataSandilm) {
                $this->M_api->rubahpass($id,$data_post);
                $berhasil['data'] = "1";
                $this->response($berhasil, 200);
            } else {
                $gagal['data'] = "0";
                $this->response($gagal);
            }
    }







}
