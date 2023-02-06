<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cutidokter extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mcutidokter');
     
   }

   public function tampilkan()
  {
            if ($this->session->userdata('login') == TRUE){
            $data['dokter']= $this->mcutidokter->tampilkan();    
            $isi =  $this->template->display('vcutidokter',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
  }

  public function editcuti()
    {
            
        if ($this->session->userdata('login') == TRUE ){
            $data['dokter'] = $this->mcutidokter->get_by_id($this->uri->segment(3));
             $isi =  $this->template->display('veditcutidokter',$data);
             $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

   public function perbarui()
    {
            $id =  $this->input->post('id');       
            $cuti_awal = $this->input->post('cuti_awal');
            $cuti_akhir = $this->input->post('cuti_akhir');
          
            
  
            // Simpan Data
                   $result = $this->mcutidokter->perbaruicuti(  $cuti_awal, $cuti_akhir, $id );
                   if ($result){
                   echo "<script>alert('Data Berhasil dikonfirmasi !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

    }

}
