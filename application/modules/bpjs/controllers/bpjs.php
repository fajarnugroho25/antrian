<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bpjs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mbpjs');
        $this->load->model('menu/mmenu');


    }

   
    public function datapasieninap()
    {
            
        if ($this->session->userdata('login') == TRUE  ){
            $data['bpjs']= $this->mbpjs->tampilkan();  
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub();  
            $isi =  $this->template->display('bpjs/vdatapasieninap',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }
}