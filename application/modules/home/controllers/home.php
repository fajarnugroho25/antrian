<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      
     //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
     $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
     $this->output->set_header('Pragma: no-cache');
     $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
     
      
     //this->load->model('admin/madmin');   
      $this->load->model('menu/mmenu');    
    
    
   }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE){          
            
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub();
             
            $isi =  $this->template->display('vmenuutama',$data);       
            $this->load->view('admin/vutama',$isi);          
           
            } else { redirect('login'); }
	}
        


 
}
