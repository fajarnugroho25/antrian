<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operasi extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('moperasi');
      $this->load->model('menu/mmenu');
     
   }
	
 public function tambahoperasi()
  {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['kodejadi'] = $this->moperasi->code_otomatis();
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $isi =  $this->template->display('operasi/vtambahoperasi',$data);
            $this->load->view('admin/vutama',$isi);

            } else { redirect('login'); }
  }

   public function editoperasi()
  {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['operasi'] = $this->moperasi->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('operasi/vtambahoperasi',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
  }



	public function tambah()
	{

            $nama_operasi = $this->input->post('nama_operasi');
            $id = $this->input->post('id');           
    
            if ($this->input->post('nama_operasi')==''){
                echo "<script>alert('Ups, nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->moperasi->simpan($nama_operasi, $id);
                   if ($result){
                   echo "<script>alert('Data Operasi Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbarui()
	{
            $id = $this->input->post('id');
            $nama_operasi = $this->input->post('nama_operasi');
           
    
            if ($this->input->post('nama_operasi')==''){
                echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->moperasi->perbarui($nama_operasi, $id);
                   if ($result){
                   echo "<script>alert('Data Operasi Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function delete(){
            
        $this->moperasi->hapus($this->uri->segment(3));
        
        redirect('chome/dataoperasi');    

    }
}
