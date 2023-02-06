<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pks extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mpks');
      $this->load->model('menu/mmenu');
     
   }
	
	
     
    public function tambahpks()
    {
            
        if ($this->session->userdata('login') == TRUE ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['kodejadi'] = $this->mpks->code_otomatis();
            $data['cbjenis'] = $this->mpks->combo_jenis();
            $isi =  $this->template->display('pks/vtambahpks',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

                

    public function editpks()
    {
            
        if ($this->session->userdata('login') == TRUE  ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['pks'] = $this->mpks->get_by_id($this->uri->segment(3));
            $data['cbjenis'] = $this->mpks->combo_jenis();
            $isi =  $this->template->display('pks/vtambahpks',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

	public function tambah()
	{

            $perusahaan = $this->input->post('perusahaan');
			$mulai = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');
			$jenis = $this->input->post('jenis');
			$ket = $this->input->post('ket');
			$id_pks =  $this->mpks->code_otomatis('kodejadi');              
    
            if ($this->input->post('perusahaan')==''){
                echo "<script>alert('Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpks->simpan($ket, $jenis, $akhir, $mulai, $perusahaan, $id_pks);
                   if ($result){
                   echo "<script>alert('Data PKS Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
    
    public function datapks()
    {
            
        if ($this->session->userdata('login') == TRUE  ){
            $data['pks']= $this->mpks->tampilkan();  
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub();  
            $isi =  $this->template->display('pks/vdatapks',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }
    
        public function perbarui()
	{
            $id_pks = $this->input->post('id_pks');
            $perusahaan = $this->input->post('perusahaan');
			$mulai = $this->input->post('mulai');
           		   $akhir = $this->input->post('akhir');
           		   $jenis = $this->input->post('jenis');
				   $ket = $this->input->post('ket');
           
            if ($this->input->post('perusahaan')==''){
                echo "<script>alert('Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpks->perbarui($ket, $jenis, $akhir, $mulai, $perusahaan, $id_pks);
                   if ($result){
                   echo "<script>alert('Data PKS Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function delete(){
            
        $this->mpks->hapus($this->uri->segment(3));
        
        redirect('chome/datapks');    

    }
}
