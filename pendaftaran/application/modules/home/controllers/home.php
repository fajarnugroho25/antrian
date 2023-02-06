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
     
     
      $this->load->model('admin/madmin');
      //$this->load->model('mpasien');
      //$this->load->model('moperasi');
      //$this->load->model('mdokter');
      //$this->load->model('mpenanggung');
      //$this->load->model('mfilterlaporan');
     
    
   }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE){
            //$data['pasien']= $this->mpasien->tampilkan();             
            $isi =  $this->template->display('vmenuutama');            
            $this->load->view('/utama/vutama',$isi);

            } else { redirect('clogin'); }
	}

   
    public function tambahpasien()
    { 
            
        if ($this->session->userdata('login') == TRUE){
            $data['kodejadi'] = $this->mpasien->code_pasien();
            //$data['combo'] = $this->mpasien->combo_operasi(); 
            //$data['cbdokter'] = $this->mpasien->combo_dokter();  
            //$data['cbkelas'] = $this->mpasien->combo_kelas(); 
            //$data['cbkelasminta'] = $this->mpasien->combo_kelas_minta(); 
            //$data['cbpenanggung'] = $this->mpasien->combo_penanggung();              
            $isi =  $this->template->display('pendaftaran/vtambahpasien',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

 /*       
   
        public function datapasien()
	{
            if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mpasien->tampilkan();    
            $isi =  $this->template->display('admin/content/vdatapasien',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
      public function datapasien_sudah_op()
    {
            if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mpasien->tampilkan_sudah_op();    
            $isi =  $this->template->display('admin/content/vdatapasien_sudah_op',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }   

      public function datapasien_batal()
    {
            if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mpasien->tampilkan_batal();    
            $isi =  $this->template->display('admin/content/vdatapasien_batal',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }    

        public function dataadmin()
	{ 
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['admin']= $this->madmin->tampilkan();  
            $isi =  $this->template->display('admin/content/vdataadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
	}
        
        public function dataoperasi()
	{
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['operasi']= $this->moperasi->tampilkan();   
            $isi =  $this->template->display('admin/content/vdataoperasi',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function datadokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['dokter']= $this->mdokter->tampilkan();   
            $isi =  $this->template->display('admin/content/vdatadokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }

    public function datapenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['penanggung']= $this->mpenanggung->tampilkan();   
            $isi =  $this->template->display('admin/content/vdatapenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }
        public function tambahoperasi()
	{
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['kodejadi'] = $this->moperasi->code_otomatis();
            $isi =  $this->template->display('admin/content/vtambahoperasi',$data);
            $this->load->view('admin/vutama',$isi);

            } else { redirect('clogin'); }
	}
        
         public function tambahdokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['kodejadi'] = $this->mdokter->code_otomatis();
            $isi =  $this->template->display('admin/content/vtambahdokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }
     public function tambahpenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['kodejadi'] = $this->mpenanggung->code_otomatis();
            $isi =  $this->template->display('admin/content/vtambahpenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }

        public function editoperasi()
	{
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['operasi'] = $this->moperasi->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahoperasi',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}

          public function editdokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['dokter'] = $this->mdokter->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahdokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }

        public function editpenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['penanggung'] = $this->mpenanggung->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahpenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }
       
        
        public function tambahpasien()
	{ 
            
        if ($this->session->userdata('login') == TRUE){
            $data['kodejadi'] = $this->mpasien->code_pasien();
            $data['combo'] = $this->mpasien->combo_operasi(); 
            $data['cbdokter'] = $this->mpasien->combo_dokter();  
            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta(); 
            $data['cbpenanggung'] = $this->mpasien->combo_penanggung();              
            $isi =  $this->template->display('admin/content/vtambahpasien',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}

        public function editpasien()
	{ 
            
        if ($this->session->userdata('login') == TRUE){
           
            $data['combo'] = $this->mpasien->combo_operasi();
            $data['cbdokter'] = $this->mpasien->combo_dokter();   
            $data['pasien'] = $this->mpasien->get_by_id($this->uri->segment(3));
            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();  
            $data['cbpenanggung'] = $this->mpasien->combo_penanggung(); 
            $isi =  $this->template->display('admin/content/vtambahpasien',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
      public function editpasien_x()
    { 
            
        if ($this->session->userdata('login') == TRUE){
           
            $data['combo'] = $this->mpasien->combo_operasi();
            $data['cbdokter'] = $this->mpasien->combo_dokter();   
            $data['pasien'] = $this->mpasien->get_by_id($this->uri->segment(3));
            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();  
            $isi =  $this->template->display('admin/content/vtambahpasien_x',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }    
        public function tambahadmin()
	{
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $isi =  $this->template->display('admin/content/vtambahadmin');
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
	}

        public function editadmin()
	{
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['admin'] = $this->madmin->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } 
	}
 
   

    public function lap_detil()
    {
            
        if ($this->session->userdata('login') == TRUE){
            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();  
            $data['cbkelas'] = $this->mfilterlaporan->combo_kelas(); 
            $data['cbkelasminta'] = $this->mfilterlaporan->combo_kelas_minta();  
            $isi =  $this->template->display('admin/content/vlap_detil',$data);            
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }


    public function lap_rekap()    {
            
        if ($this->session->userdata('login') == TRUE){
            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();            
            $isi =  $this->template->display('admin/content/vlap_rekap',$data);            
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
    }
  */
}
