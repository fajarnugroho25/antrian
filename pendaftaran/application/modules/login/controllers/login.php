<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mlogin');
      $this->load->model('admin/madmin');

   }

	public function index()
	{
            $data['error']='';
            $this->load->view('vlogin',$data);
	}

         // Proses Login
    function masuk(){

    $user = $this->input->post('username');
    $pass = $this->input->post('password');
    $admin_status = $this->input->post('admin_status');

    // Cek Inputan Username dan Password
    if (empty($user) || empty($pass)) {
    $data['error']='Username atau Password Kosong!';
    $this->load->view('vlogin',$data);
    } else {
    //$password = sha1($pass);
    $password = $pass;
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username
    $data = array('user_name' => $result->user,'user_id' => $result->id, 'login' => TRUE);
    $this->session->set_userdata($data);
    //$this->session->set_userdata('admin_status',$result->admin_status);
    echo $result->admin_status;

    redirect('home');

    } else {
    $password = sha1($pass);
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username
    $data = array('user_name' => $result->user,'user_id' => $result->id, 'login' => TRUE);
    $this->session->set_userdata($data);
    //$this->session->set_userdata('admin_status',$result->admin_status);
    redirect('home');

    } else {
    $data['error']='Username atau Password Salah!';
    $this->load->view('vlogin',$data);
    }


    } // End Jika Pada Tabel User Tidak Ketemu
    } // End else Jika Inputan Valid
    } // End Fungsi

    // Logout
    function logout(){
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();
    redirect('login');

    }

     public function editpassword()
    {

        if ($this->session->userdata('login') == TRUE  ){
            $data['admin'] = $this->madmin->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/veditpassword',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
    }


}
