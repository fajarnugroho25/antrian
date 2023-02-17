<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
   {

      
      parent::__construct();
      $this->load->library('cfpdf');
      $this->load->model('laporan/mfilterlaporan');
      $this->load->model('pasien/mpasien');   
      $this->load->model('menu/mmenu'); 
     
   }


 public function lap_detil()
    {
            
        if ($this->session->userdata('login') == TRUE){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();  
            $data['cbkelas'] = $this->mfilterlaporan->combo_kelas(); 
            $data['cbkelasminta'] = $this->mfilterlaporan->combo_kelas_minta(); 
            $data['cbpenanggung'] = $this->mfilterlaporan->combo_penanggung();   
            $isi =  $this->template->display('laporan/vlap_detil',$data);            
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }


    public function lap_rekap()    {
        $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            
        if ($this->session->userdata('login') == TRUE){
            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();            
            $isi =  $this->template->display('admin/vlap_rekap',$data);            
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

///////////////////////////////////////////////////////////////   LAPORAN REKAP /////////////////////////////////////////////////////////////////   

    public function laporan_rekap(){
        $status = $this->input->post('status'); 
        $dokter = $this->input->post('dokter');  
        $tgl_1 =  $this->input->post('tgl_1');
        $tgl_2 =  $this->input->post('tgl_2');
        $tgl_real_1 =  $this->input->post('tgl_real_1');
        $tgl_real_2 =  $this->input->post('tgl_real_2');
        $periode = ' Periode '.$tgl_1.' s/d '.$tgl_2;
         if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mfilterlaporan->tampilkan_rekap($dokter, $status, $tgl_real_1, $tgl_real_2, $tgl_1, $tgl_2);    
            $isi =  $this->template->display('laporan/print/vprint_lap_rekap',$data);
            $this->load->view('laporan/print/vprint_lap_rekap',$isi);
            } else { redirect('clogin'); }
    }

///////////////////////////////////////////////////////////////   LAPORAN PASIEN /////////////////////////////////////////////////////////////////   

    public function laporan_detil(){
     $status = $this->input->post('status'); 
     $prioritas = $this->input->post('prioritas');  
     $operasi = $this->input->post('operasi');  
     $dokter = $this->input->post('dokter');  
     $hak_kelas = $this->input->post('hak_kelas'); 
     $kelas_diminta = $this->input->post('kelas_diminta'); 
     $penanggung = $this->input->post('penanggung');   
     $tgl_1 =  $this->input->post('tgl_1');
     $tgl_2 =  $this->input->post('tgl_2');
     $judul =  $this->input->post('judul');
     $tgl_real_1 =  $this->input->post('tgl_real_1');
     $tgl_real_2 =  $this->input->post('tgl_real_2');

         if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mfilterlaporan->tampilkan($status, $prioritas, $operasi, $dokter, $hak_kelas, $kelas_diminta, $tgl_1, $tgl_2,  $tgl_real_1,  $tgl_real_2, $penanggung); 
            $isi =  $this->template->display('laporan/print/vprint_lap_detil',$data);
            $this->load->view('laporan/print/vprint_lap_detil',$isi);
            } else { redirect('clogin'); }
    }



}
