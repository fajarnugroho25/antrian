<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chat extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      // $this->load->model('mchat');

   }

   public function tampilkan()
  {
            if ($this->session->userdata('login') == TRUE){
            // $data['pasien']= $this->mriwayat->tampilkan();
            $isi =  $this->template->display('vchat');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
  }




  public function getUserName(){
    if (!$_POST) {
      return;

    }
    // $post = $this->input->post();
    $output = '
    <div class="chat_list">
              <div class="chat_people">


          <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"width="80" alt="sunil"> </div>
                <div class="chat_ib">
            <a href="'.base_url('index.php/chat/chat_detail/'.$this->input->post('user_id')).'">
                <h5> '.$this->input->post('user_id').' </h5>

              </a>
              </div>
              </div>
            </div>';
    echo $output;
    return;

  }



  //load data table..
      public function ajaxListchat(){
        $post = $this->input->post();
            $data=array();

            $no=1;
        //cacah data

            $a= json_decode($post['tanggal']);


            $row = array();
            $row[] = $no;
            // $row[] = $tanggal;
            // $row[] = $nomorrm;
            $data[] = $row;



        $output = array(
            "data"=>$data,
            );
        echo json_encode( $a );
        }




  public function chat_detail() {
     if ($this->session->userdata('login') == TRUE){
            // $data['pasien']= $this->mriwayat->tampilkan();



    $id_user = $this->uri->segment(3);
    if ($id_user) {
      $usr = 'RS';

      $data['pasien_name'] = $id_user;
      $pasien = json_decode(json_encode($id_user),true);
      $me = json_decode(json_encode($usr),true);
      $data['pasien'] = $pasien;
      $data['me']=$usr;
      $data['user'] = 'selamat datang';

      // var_dump($data['me']);
      $isi =  $this->template->display('visichat',$data);
            $this->load->view('utama/vutama',$isi);

      } else { redirect('clogin'); }


  }}



  public function sendpushnotification() {
    // $request = json_decode(file_get_contents('php://input'),true);
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids'  => 'csdttPtmeo0:APA91bHdZ0dtiZv_YxP5EtLxwJwzVnNk1SCRUN7-niGY7v1ypmj0xHH4ZY21_qQuFsmfPNQ4vKg3IqcusYYWS2uvDn-D4wWoYg1eZ0jMHYoZ1DBf-tUlMCmuz4bNi_NPHCswp9FTJLFI',
        'data'              => array( "message" => "Hello this is test push notification" ),
    );
    $headers = array(
        'Authorization: key=AAAABdDqim0:APA91bEOsKSlY2I9UsVa_1lxadVPNcdTAkn4OZPXyqzblnI7PqxiITmEzg_PUpZrNUTWshwlrmoZ14Iem3rg6kG000jBiPJYw6UGnGZJQctiSmJ8N8O88S7XXk-O86KA34ohpIkUb4IV',
        'Content-Type: application/json'
    );


    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url );

    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

    // Avoids problem with https certificate
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute post
    $result = curl_exec($ch);
    curl_close($ch);
    echo json_encode($result);
}


  // function notification(){

  //    $res = array();
  //       $res['data']['title'] = 'This is an FCM notification message!';
  //       $res['data']['message'] = 'FCM Message';
  //       $fields = array(
  //           'token' => 'csdttPtmeo0:APA91bHdZ0dtiZv_YxP5EtLxwJwzVnNk1SCRUN7-niGY7v1ypmj0xHH4ZY21_qQuFsmfPNQ4vKg3IqcusYYWS2uvDn-D4wWoYg1eZ0jMHYoZ1DBf-tUlMCmuz4bNi_NPHCswp9FTJLFI',
  //           'data' => $res
  //       );

  //       // Set POST variables
  //       $url = $this->input->post('');

  //       $headers = array(
  //           'Authorization: key=AAAABdDqim0:APA91bEOsKSlY2I9UsVa_1lxadVPNcdTAkn4OZPXyqzblnI7PqxiITmEzg_PUpZrNUTWshwlrmoZ14Iem3rg6kG000jBiPJYw6UGnGZJQctiSmJ8N8O88S7XXk-O86KA34ohpIkUb4IV',
  //           'Content-Type: application/json'
  //       );
  //       // Open connection
  //       $ch = curl_init();

  //       // Set the url, number of POST vars, POST data
  //       // $json = json_encode($fields);


  //       // $result = $this->curl->post($url,$fields);
  //       curl_setopt($ch, CURLOPT_URL, $url);

  //       curl_setopt($ch, CURLOPT_POST, true);
  //       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  //       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  //       // Disabling SSL Certificate support temporarly
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  //       curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($fields) );

  //       // Execute post
  //       $result = curl_exec($ch);
  //       if ($result === FALSE) {
  //           die('Curl failed: ');
  //       }
  //       else{
  //           $this->response($result);
  //       }

  //       // Close connection
  //       // curl_close($ch);

  //       return $result;

  // }


function test(){
  $json = file_get_contents('file:///C:/Users/EDP10/Downloads/rskisolo-messages-export.json');
  $array = (array) json_decode($json,true);

  var_dump($array);

//   foreach ($array as $k=>$v){
//     var_dump($v);
// }
}



}
