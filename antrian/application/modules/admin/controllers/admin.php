<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('admin/madmin');
      $this->load->model('menu/mmenu');
      $this->load->model('operasi/moperasi');
      $this->load->model('dpjp/mdpjp');
      $this->load->model('penanggung/mpenanggung');
    
   }
	
 public function dataadmin()
  { 
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['admin']= $this->madmin->tampilkan();  
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $isi =  $this->template->display('admin/vdataadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
  }
        
        public function dataoperasi()
  {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['operasi']= $this->moperasi->tampilkan();   
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $isi =  $this->template->display('operasi/vdataoperasi',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
  }
        
        public function datadokter()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['dokter']= $this->mdpjp->tampilkan();
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub();    
            $isi =  $this->template->display('dpjp/vdatadokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

    public function datapenanggung()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['penanggung']= $this->mpenanggung->tampilkan();  
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub();  
            $isi =  $this->template->display('penanggung/vdatapenanggung',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }
       


 public function tambahadmin()
  {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['data_submenu']=$this->mmenu->tampilkansub(); 
            $data['cbunit'] = $this->madmin->combo_unit();
            $data['cbgudang'] = $this->madmin->combo_gudang();  
            $isi =  $this->template->display('admin/vtambahadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
  }


      public function editadmin()
  {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['cbunit'] = $this->madmin->combo_unit();  
            $data['cbgudang'] = $this->madmin->combo_gudang();  

            $data['admin'] = $this->madmin->get_by_idedit($this->uri->segment(3));
            $isi =  $this->template->display('admin/vtambahadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } 
  }

   public function editakses()
    {
            
        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['data_submenu']=$this->mmenu->data_submenu(); 
            $data['data_menu']=$this->mmenu->data_menu();
            $data['admin'] = $this->madmin->get_by_idedit($this->uri->segment(3));
            $isi =  $this->template->display('admin/veditakses',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } 
    }

	public function tambah()
	{
            $user = $this->input->post('user');
            $nama = $this->input->post('nama');
            $pass = $this->input->post('pass');
            //$akses = $this->input->post('akses');
            //$akses_item = $this->input->post('akses_item');
            $unit_id = $this->input->post('unit_id');
            $nik = $this->input->post('nik');
            // $addunit = implode($unit_id);
            $gudang_id = $this->input->post('gudang_id');
            $addgudang = implode(",", $gudang_id);
            $admin_status = $this->input->post('admin_status');
            $status = $this->input->post('status');
                    
    
            if ($this->input->post('user')==''){
                echo "<script>alert('Ups, Username Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('pass')==''){
                echo "<script>alert('Ups, Password Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->madmin->simpan($user,$nama, $pass, $unit_id,$addgudang, $admin_status, $status,$nik);
                   if ($result){
                   echo "<script>alert('Data Admin Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbarui()
  {
            $id = $this->input->post('id');
            $user = $this->input->post('user');
            $nama = $this->input->post('nama');
            $pass = $this->input->post('pass');            
            $unituser = $this->input->post('unit_id');
            // $addunit = implode(",", $unit_id);
            $admin_status = $this->input->post('admin_status');
            $status = $this->input->post('status');
            $gudang_id = $this->input->post('gudang_id');

            if ($gudang_id != '') {
              
              $addgudang = implode(",", $gudang_id);
            }else{
               $addgudang = '';

            }
            

            // var_dump($unituser);
    
            if ($this->input->post('user')==''){
                echo "<script>alert('Ups, Username Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->madmin->perbarui($id, $user,$nama, $pass,$addgudang,$unituser, $admin_status, $status);
                   if ($result){
                   echo "<script>alert('Data Admin Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
  }


        public function editpass()
  {
            $id = $this->input->post('id');
            $pass = $this->input->post('pass');
                // Simpan Data
              $result = $this->madmin->perbaruipass($id, $pass);
              if ($result){
              echo "<script>alert('Data Admin Berhasil diperbarui !'); history.go(-1)</script>";    
              } else {
               echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   
              }   

            
  }

    public function perbaruiakses()
  {
            $id = $this->input->post('id');
            $user = $this->input->post('user');
            //$pass = $this->input->post('pass');
            $akses = $this->input->post('akses');
            $akses_item = $this->input->post('akses_item');
           
    
            if ($this->input->post('user')==''){
                echo "<script>alert('Ups, Username Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->madmin->perbaruiakses($id, $user, $akses, $akses_item);
                   if ($result){
                   echo "<script>alert('Data Admin Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
  }
 
        function delete(){
          if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
        $this->madmin->hapus($this->uri->segment(3));
        
        redirect('chome/dataadmin');    }
        { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } //redirect('clogin'); }

    }





}
