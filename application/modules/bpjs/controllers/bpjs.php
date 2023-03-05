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

    public function editbpjs()
    {
            
        if ($this->session->userdata('login') == TRUE  ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['bpjs'] = $this->mbpjs->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('bpjs/vtambahbpjs',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

    public function Simpan()
	{
           $data['bpjs'] = $this->mbpjs->get_by_reg1($this->uri->segment(3));

            $no_reg1 = $this->input->post('no_reg');
			$rm = $this->input->post('rm');
			$nama_pasien = $this->input->post('nama_pasien');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$alamat = $this->input->post('alamat');
			$dpjp =  $this->input->post('dpjp');        
            $sep = $this->input->post('sep');
			$tagihan = $this->input->post('tagihan');
            $grouping = $this->input->post('grouping');
            $icdix =  $this->input->post('icdix');     
            $icdx =  $this->input->post('icdx');     
            $catatan =  $this->input->post('catatan');        
    
              //var_dump($no_reg1);  cek 
            if ($data == $no_reg1 ){
                echo "<script>alert('No Registrasi sudah dimasukkan !'); history.go(-2);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mbpjs->simpan($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan);
                   if ($result){
                   echo "<script>alert('Data Pasien BPJS Berhasil disimpan !'); history.go(-2)</script>";    
                   } else {
                    echo "<script>alert('Data Pasien BPJS Sudah Tersimpan:( !'); history.go(-2)</script>";   

                   }   

            }

        }

        public function databpjs()
        {
                
            if ($this->session->userdata('login') == TRUE  ){
                $data['bpjs']= $this->mbpjs->tampilkandatabpjs();  
                $data['menu_list']=$this->mmenu->tampilkan();  
                $data['submenu_list']=$this->mmenu->tampilkansub();  
                $isi =  $this->template->display('bpjs/vdatabpjs',$data);
                $this->load->view('admin/vutama',$isi);
                } else { redirect('login'); }
        } 

        public function editdatabpjs()
        {
                
            if ($this->session->userdata('login') == TRUE  ){
                $data['menu_list']=$this->mmenu->tampilkan();  
                $data['submenu_list']=$this->mmenu->tampilkansub(); 
                $data['bpjs'] = $this->mbpjs->get_by_reg($this->uri->segment(3));
                //data['cbjenis'] = $this->mpks->combo_jenis();
                $isi =  $this->template->display('bpjs/veditbpjs',$data);
                $this->load->view('admin/vutama',$isi);
                } else { redirect('login'); }
        }

        public function edit()
        {
    
                $no_reg1 = $this->input->post('no_reg');
                $rm = $this->input->post('rm');
                $nama_pasien = $this->input->post('nama_pasien');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $alamat = $this->input->post('alamat');
                $dpjp =  $this->input->post('dpjp');        
                $sep = $this->input->post('sep');
                $tagihan = $this->input->post('tagihan');
                $grouping = $this->input->post('grouping');
                $icdix =  $this->input->post('icdix');     
                $icdx =  $this->input->post('icdx');     
                $catatan =  $this->input->post('catatan');        
        
                if ($this->input->post('grouping')==''){
                    echo "<script>alert('Nilai Grouping Belum Masuk !'); history.go(-2);</script>";   
                }
                else {
                        // Edit Data
                       $result = $this->mbpjs->edit($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan);
                       if ($result){
                       echo "<script>alert('Data Pasien BPJS Berhasil disimpan !'); history.go(-2)</script>";    
                       } else {
                        echo "<script>alert('Data Pasien BPJS Sudah Tersimpan:( !'); history.go(-2)</script>";   
    
                       }   
    
                }
    
            }

        public function updatebpjs()
        {
            if ($this->session->userdata('login') == TRUE) {
                $data['obat'] = $this->mbpjs->updatebpjsnow();
                $data['menu_list'] = $this->mmenu->tampilkan();
                $data['submenu_list'] = $this->mmenu->tampilkansub();
                echo "<script>alert('Data Pasien BPJS Berhasil disimpan !'); history.go(-1)</script>";     
            } else {
                redirect('login');
            }

         }
}