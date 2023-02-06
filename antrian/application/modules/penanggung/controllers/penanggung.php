<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penanggung extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mpenanggung');
      $this->load->model('menu/mmenu');
     
   }
	
     
    public function tambahpenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['kodejadi'] = $this->mpenanggung->code_otomatis();
            $isi =  $this->template->display('penanggung/vtambahpenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

                

    public function editpenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['penanggung'] = $this->mpenanggung->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('penanggung/vtambahpenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

	public function tambah()
	{

            $nama_penanggung = $this->input->post('nama_penanggung');
            $id_penanggung =  $this->mpenanggung->code_otomatis('kodejadi');              
    
            if ($this->input->post('nama_penanggung')==''){
                echo "<script>alert('Ups, nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpenanggung->simpan($nama_penanggung, $id_penanggung);
                   if ($result){
                   echo "<script>alert('Data Penanggung Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbarui()
	{
            $id_penanggung = $this->input->post('id_penanggung');
            $nama_penanggung = $this->input->post('nama_penanggung');
           
    
            if ($this->input->post('nama_penanggung')==''){
                echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpenanggung->perbarui($nama_penanggung, $id_penanggung);
                   if ($result){
                   echo "<script>alert('Data Penanggung Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function delete(){
            
        $this->mpenanggung->hapus($this->uri->segment(3));
        
        redirect('chome/datapenanggung');    

    }
}
