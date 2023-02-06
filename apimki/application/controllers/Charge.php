<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'VT-server-7Pi6VYtdcoh90E1PDrJz65nN', 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

  public function index()
  {
      // $api_url = 'https://app.midtrans.com/snap/v1/transactions';
        $request_body = json_decode(file_get_contents('php://input'));
  //       $server_key='VT-server-7Pi6VYtdcoh90E1PDrJz65nN';
  //      $ch = curl_init();
  //       $curl_options = array(
  //   CURLOPT_URL => $api_url,
  //   CURLOPT_RETURNTRANSFER => 1,
  //   CURLOPT_POST => 1,
  //   // Add header to the request, including Authorization generated from server key
  //   CURLOPT_HTTPHEADER => array(
  //     'Content-Type: application/json',
  //     'Accept: application/json',
  //     'Authorization: Basic ' . base64_encode($server_key . ':')
  //   ),

  //   CURLOPT_POSTFIELDS => $request_body
  // );
  // curl_setopt_array($ch, $curl_options);
  // $result = curl_exec($ch);
  // echo $result;

  	echo json_encode(array('token'=>$this->midtrans->getSnapToken($request_body)));

  //echo $result;
  }
}
