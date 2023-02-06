<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class riwayat extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mriwayat');
     
   }

   public function tampilkan()
  {
            if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mriwayat->tampilkan();    
            $isi =  $this->template->display('vriwayat',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
  }

}
