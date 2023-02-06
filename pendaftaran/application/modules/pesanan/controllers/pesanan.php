<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mpesanan');
     
   }

   public function tampilkan()
  {
            if ($this->session->userdata('login') == TRUE){
            $data['pasien']= $this->mpesanan->tampilkan();    
            $isi =  $this->template->display('vpesanan',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
  }


 public function konfirm()
    {
            
        if ($this->session->userdata('login') == TRUE ){
            $data['dokter'] = $this->mpesanan->get_by_id($this->uri->segment(3));
             $isi =  $this->template->display('vkonfirm',$data);
             $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

 public function persetujuan()
    {
            $id =  $this->input->post('id');       
            $status_persetujuan = $this->input->post('status_persetujuan');
            $keterangan = $this->input->post('keterangan');
          
            
  
            // Simpan Data
                   $result = $this->mpesanan->persetujuan(  $status_persetujuan, $keterangan, $id );
                   if ($result){
                   echo "<script>alert('Data Berhasil dikonfirmasi !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

    }

  function cek_hisys(){
        
        $no_rm = $_POST['no_rm'];

        function http_request($url){
            // persiapkan curl
            $ch = curl_init(); 

            // set url 
            curl_setopt($ch, CURLOPT_URL, $url);
            
            // set user agent    
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

            // return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

            // otorisasi 
            curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
            "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E=",
            "Cache-Control: no-cache",
            "Postman-Token: 9ccd433e-68fc-431b-b143-0082c27a494d"
          )
            );
            


            // $output contains the output string 
            $output = curl_exec($ch); 

            // tutup curl 
            curl_close($ch);      

            // mengembalikan hasil curl
            return $output;
        }

        $profile = http_request("http://192.168.0.236/api.php?mod=api&cmd=get_patient&no_rm=".$no_rm."&return_type=json");

        // ubah string JSON menjadi array
        $profile = json_decode($profile, TRUE);

        //$nama=$profile['data']['nama_pasien'];
        //$alamat=$profile['data']['alamat'];
        //$tgl_lahir=$profile['data']['tgl_lahir'];
        $jenis_kelamin=$profile['data']['jenis_kelamin'];
        if($jenis_kelamin =='m'){$kelamin='L';} else {$kelamin='P';}

        $data = array(
            'nama'      =>  $profile['data']['nama_pasien'],
            'alamat'      =>  $profile['data']['alamat'],
            'tgl_lahir'      =>  $profile['data']['tgl_lahir'],
            'telp'      =>  $profile['data']['telepon'],
            'jenis_kelamin'      =>  $kelamin,
        );
        echo json_encode($data);
        
        
    }


}
