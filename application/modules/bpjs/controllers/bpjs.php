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
            //data['cbjenis'] = $this->mpks->combo_jenis();
            $isi =  $this->template->display('bpjs/vtambahbpjs',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

    public function Simpan()
	{

            $no_reg = $this->input->post('no_reg');
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
                echo "<script>alert('Nilai Grouping Belum Masuk !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mbpjs->simpan($no_reg, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan);
                   if ($result){
                   echo "<script>alert('Data Pasien BPJS Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Data Pasien BPJS Sudah Tersimpan:( !'); history.go(-1)</script>";   

                   }   

            }
	}
}