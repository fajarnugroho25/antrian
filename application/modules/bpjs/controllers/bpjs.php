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
         
        $tagihan = $this->input->post('tagihan');
        $resulttagihan = preg_replace("/[^0-9]/", "", $tagihan);

        $grouping = $this->input->post('grouping');
        $resultgrouping = preg_replace("/[^0-9]/", "", $grouping);

        $iur = $this->input->post('iur');
        $resultiur = preg_replace("/[^0-9]/", "", $iur);

        $selisih_tagihan = $this->input->post('selisih_tagihan');
        $resultselisih_tagihan = preg_replace("/[^0-9\-]/", "", $selisih_tagihan);

            $no_reg1 = $this->input->post('no_reg');
			$rm = $this->input->post('rm');
			$nama_pasien = $this->input->post('nama_pasien');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$alamat = $this->input->post('alamat');
			$dpjp =  $this->input->post('dpjp'); 
            $tgl_reg = $this->input->post('tgl_reg');
            $masa_inap = $this->input->post('masa_inap');       
            $sep = $this->input->post('sep');
            $bangsal = $this->input->post('bangsal'); 
            $kelas = $this->input->post('kelas'); 
            $hak_kelas = $this->input->post('hak_kelas');
			$tagihan = $resulttagihan ;
            $grouping = $resultgrouping ;
            $iur = $resultiur ;
            $selisih_tagihan = $this->input->post('selisih_tagihan') ;
            $icdx =  $this->input->post('icdx');    
            $icdx2 =  $this->input->post('icdx2'); 
            $icdx3 =  $this->input->post('icdx3'); 
            $icdx4 =  $this->input->post('icdx4'); 
            $icdix =  $this->input->post('icdix');    
            $icdix2 =  $this->input->post('icdix2'); 
            $icdix3 =  $this->input->post('icdix3'); 
            $icdix4 =  $this->input->post('icdix4'); 
            $catatan =  $this->input->post('catatan');          
    
            $this->db->where('no_reg', $no_reg1);
            $query = $this->db->get('bpjs');

             
            if ($query->num_rows() > 0){
                echo "<script>alert('No Registrasi sudah dimasukkan !'); history.go(-2);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mbpjs->simpan($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $tgl_reg, $masa_inap, $sep, $bangsal, $kelas, $hak_kelas, $tagihan, $grouping, $iur, $selisih_tagihan, $icdx, $icdx2, $icdx3, $icdx4, $icdix, $icdix2, $icdix3, $icdix4, $catatan);
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
            $tagihan = $this->input->post('tagihan');
            $resulttagihan = preg_replace("/[^0-9]/", "", $tagihan);

            $grouping = $this->input->post('grouping');
            $resultgrouping = preg_replace("/[^0-9]/", "", $grouping);

            $iur = $this->input->post('iur');
            $resultiur = preg_replace("/[^0-9]/", "", $iur);

            $selisih_tagihan = $this->input->post('selisih_tagihan');
            $resultselisih_tagihan = preg_replace("/[^0-9\-]/", "", $selisih_tagihan);

                $no_reg1 = $this->input->post('no_reg');
                $rm = $this->input->post('rm');
                $nama_pasien = $this->input->post('nama_pasien');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $alamat = $this->input->post('alamat');
                $dpjp =  $this->input->post('dpjp');        
                $sep = $this->input->post('sep');
                $tagihan = $resulttagihan ;
                $grouping = $resultgrouping ;
                $iur = $resultiur ;
                $selisih_tagihan = $resultselisih_tagihan ;
                $icdx =  $this->input->post('icdx');    
                $icdx2 =  $this->input->post('icdx2'); 
                $icdx3 =  $this->input->post('icdx3'); 
                $icdx4 =  $this->input->post('icdx4'); 
                $icdix =  $this->input->post('icdix');    
                $icdix2 =  $this->input->post('icdix2'); 
                $icdix3 =  $this->input->post('icdix3'); 
                $icdix4 =  $this->input->post('icdix4'); 
                $catatan =  $this->input->post('catatan');        
        
                if ($this->input->post('grouping')==''){
                    echo "<script>alert('Nilai Grouping Belum Masuk !'); history.go(-2);</script>";   
                }
                else {
                        // Edit Data
                       $result = $this->mbpjs->edit($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $iur, $selisih_tagihan, $icdx, $icdx2, $icdx3, $icdx4, $icdix, $icdix2, $icdix3, $icdix4, $catatan);
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
                $data['bpjs'] = $this->mbpjs->updatebpjsnow();
                $data['menu_list'] = $this->mmenu->tampilkan();
                $data['submenu_list'] = $this->mmenu->tampilkansub();
                echo "<script>alert('Data Pasien BPJS Terupdate !'); history.go(-1)</script>";     
            } else {
                redirect('login');
            }

         }

     

    function get_autocomplete_icd10()
    {

        $data = array();
        $icd10_name = $this->input->get('term');

        if (!empty($icd10_name)) {

            $result = $this->mbpjs->search_icd10($icd10_name);

            if (count($result) > 0) {

                foreach ($result as $icd10) {
                    $aRow = array();
                    $aRow['label'] = $icd10->icd_nama;
                    $aRow['value'] = $icd10->icd_kode;

                    $data[] = $aRow;
                }
            }
        }

        echo json_encode($data);
    }


    function get_autocomplete_icd9()
    {

        $data = array();
        $icd9_name = $this->input->get('term');

        if (!empty($icd9_name)) {

            $result = $this->mbpjs->search_icd9($icd9_name);

            if (count($result) > 0) {

                foreach ($result as $icd9) {
                    $aRow = array();
                    $aRow['label'] = $icd9->icd_nama;
                    $aRow['value'] = $icd9->icd_kode;

                    $data[] = $aRow;
                }
            }
        }

        echo json_encode($data);
    }

}