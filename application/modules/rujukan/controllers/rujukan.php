<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rujukan extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mrujukan');
      $this->load->model('menu/mmenu');
    
   }

    public function suketdokter()
    {
            if ($this->session->userdata('login') == TRUE){
                $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['pasien']= $this->mrujukan->tampilkan_suket();    
            $isi =  $this->template->display('rujukan/vdata_suketdokter',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

      public function surujukbalik()
    {
            if ($this->session->userdata('login') == TRUE){
                $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['pasien']= $this->mrujukan->tampilkan_rujukan();    
            $isi =  $this->template->display('rujukan/vdata_surujukbalik',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }
public function tambahsuket()
    {             
        if ($this->session->userdata('login') == TRUE){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['kodejadi'] = $this->mrujukan->no_skd();
            $data['cbdokter'] = $this->mrujukan->combo_dokter(); 
                         
            $isi =  $this->template->display('rujukan/vtambahsuket',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }

  public function tambahsuratrujuk()
    {             
        if ($this->session->userdata('login') == TRUE){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['kodejadi'] = $this->mrujukan->no_rujuk();
            $data['cbdokter'] = $this->mrujukan->combo_dokter(); 
                         
            $isi =  $this->template->display('rujukan/vtambahrujukan',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }  

   public function editsuket()
    { 
            
        if ($this->session->userdata('login') == TRUE){           
           $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['cbdokter'] = $this->mrujukan->combo_dokter();   
            $data['pasien'] = $this->mrujukan->get_by_no_surat_skd($this->uri->segment(3));           
            $isi =  $this->template->display('rujukan/vtambahsuket',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }   

    public function editrujukan()
    { 
            
        if ($this->session->userdata('login') == TRUE){         
           $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['cbdokter'] = $this->mrujukan->combo_dokter();   
            $data['pasien'] = $this->mrujukan->get_by_no_surat_rujukan($this->uri->segment(3));           
            $isi =  $this->template->display('rujukan/vtambahrujukan',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('login'); }
    }    


	public function tambah_suket()
	{
            $no_surat =  $this->mrujukan->no_skd('kodejadi');         
            $no_rm = $this->input->post('no_rm');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tgl_lahir = $this->input->post('tgl_lahir');           
            $kelamin = $this->input->post('kelamin');           
            $dokter = $this->input->post('dokter');
            $diag_primer = $this->input->post('diag_primer');
            $diag_sekunder = $this->input->post('diag_sekunder');
            $alasan = $this->input->post('alasan');
            $rencana = $this->input->post('rencana');
            $tgl_penggunaan = $this->input->post('tgl_penggunaan');
            $status = $this->input->post('status');          
            $tgl_input = $this->input->post('tgl_input');
            $user = $this->input->post('user');

    
                    // Simpan Data
                   $result = $this->mrujukan->simpan_suket($no_surat, $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diag_primer,  $diag_sekunder,  $alasan, $rencana, $tgl_penggunaan, $status, $tgl_input, $user);
                   if ($result){
                   echo "<script>alert('Data Surat Pasien Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	
    public function tambah_rujukan()
    {
            $no_surat =  $this->mrujukan->no_rujuk('kodejadi');         
            $no_rm = $this->input->post('no_rm');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tgl_lahir = $this->input->post('tgl_lahir');           
            $kelamin = $this->input->post('kelamin');           
            $dokter = $this->input->post('dokter');
            $diagnosa = $this->input->post('diagnosa');
            $obat = $this->input->post('obat');
            $kepada = $this->input->post('kepada');
            $tgl_balik = $this->input->post('tgl_balik');
            $keterangan = $this->input->post('keterangan');        
            $status = $this->input->post('status');          
            $tgl_input = $this->input->post('tgl_input');
            $user = $this->input->post('user');

    
                    // Simpan Data
                   $result = $this->mrujukan->simpan_rujukan($no_surat, $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diagnosa,  $obat,  $kepada, $tgl_balik, $keterangan, $status, $tgl_input, $user);
                   if ($result){
                   echo "<script>alert('Data Surat Pasien Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
    
        
    public function perbarui_suket()
	{
            $no_surat =  $this->input->post('no_surat');        
            $no_rm = $this->input->post('no_rm');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tgl_lahir = $this->input->post('tgl_lahir');           
            $kelamin = $this->input->post('kelamin');           
            $dokter = $this->input->post('dokter');
            $diag_primer = $this->input->post('diag_primer');
            $diag_sekunder = $this->input->post('diag_sekunder');
            $alasan = $this->input->post('alasan');
            $rencana = $this->input->post('rencana');
            $tgl_penggunaan = $this->input->post('tgl_penggunaan');
            $status = $this->input->post('status');          
            $tgl_input = $this->input->post('tgl_input');
            $user = $this->input->post('user');

    
            
            // Simpan Data
                   $result = $this->mrujukan->perbarui_suket($no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diag_primer,  $diag_sekunder,  $alasan, $rencana, $tgl_penggunaan, $status, $tgl_input, $user, $no_surat);
                   if ($result){
                   echo "<script>alert('Data Surat Pasien Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }

        public function perbarui_rujukan()
    {
            $no_surat =  $this->input->post('no_surat');       
            $no_rm = $this->input->post('no_rm');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tgl_lahir = $this->input->post('tgl_lahir');           
            $kelamin = $this->input->post('kelamin');           
            $dokter = $this->input->post('dokter');
            $diagnosa = $this->input->post('diagnosa');
            $obat = $this->input->post('obat');
            $kepada = $this->input->post('kepada');
            $tgl_balik = $this->input->post('tgl_balik');
            $keterangan = $this->input->post('keterangan');        
            $status = $this->input->post('status');          
            $tgl_input = $this->input->post('tgl_input');
            $user = $this->input->post('user');

    
            
            // Simpan Data
                   $result = $this->mrujukan->perbarui_rujukan( $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diagnosa,  $obat,  $kepada, $tgl_balik, $keterangan, $status, $tgl_input, $user,$no_surat);
                   if ($result){
                   echo "<script>alert('Data Surat Pasien Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }     
	
 
        function delete(){
            
        $this->mpasien->hapus($this->uri->segment(3));
        
        redirect('chome/datapasien');    

    }


//////////////////////////////////////////PRINT SUKET///////////////////////////////

     public function print_suket()
    { 
            
        if ($this->session->userdata('login') == TRUE){             
         
            $data['pasien'] = $this->mrujukan->print_by_no_surat_skd($this->uri->segment(3));           
            $isi =  $this->template->display('print/vprint_suket',$data);
            $this->load->view('print/vprint_suket',$isi);
            } else { redirect('clogin'); }
    }   
////////////////////////////////////////////////////////////////////////////////////   
//////////////////////////////////////////PRINT RUJUKAN///////////////////////////////
  public function print_rujukan()
    { 
            
        if ($this->session->userdata('login') == TRUE){             
         
            $data['pasien'] = $this->mrujukan->print_by_no_surat_rujukan($this->uri->segment(3));           
            $isi =  $this->template->display('print/vprint_rujukan',$data);
            $this->load->view('print/vprint_rujukan',$isi);
            } else { redirect('clogin'); }
    }    

}
