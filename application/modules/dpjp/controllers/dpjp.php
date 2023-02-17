<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dpjp extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mdpjp');
       $this->load->model('menu/mmenu');
     
   }
	

  public function tambahdokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['kodejadi'] = $this->mdpjp->code_otomatis();
            $isi =  $this->template->display('dpjp/vtambahdokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

public function editdokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['dokter'] = $this->mdpjp->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('dpjp/vtambahdokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

	public function tambah()
	{

            $nama_dokter = $this->input->post('nama_dokter');
            $id =  $this->mdpjp->code_otomatis('kodejadi');              
    
            if ($this->input->post('nama_dokter')==''){
                echo "<script>alert('Ups, nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mdpjp->simpan($nama_dokter, $id);
                   if ($result){
                   echo "<script>alert('Data Dokter Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbaruidokter()
	{
            $id = $this->input->post('id');
            $nama_dokter = $this->input->post('nama_dokter');
           
    
            if ($this->input->post('nama_dokter')==''){
                echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mdpjp->perbarui($nama_dokter, $id);
                   if ($result){
                   echo "<script>alert('Data Dokter Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function deletedokkter(){
            
        $this->mdpjp->hapus($this->uri->segment(3));
        
        redirect('home/datadokter');    

    }
}
