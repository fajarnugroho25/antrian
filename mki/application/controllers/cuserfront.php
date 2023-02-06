<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cuserfront extends CI_Controller {

    public function __construct()
   {
   
    parent::__construct();

     //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    $this->load->model('muserfront');
   }

	public function index()
	{

          if ($this->session->userdata('login') == TRUE){
            $brta = array();
            $berita = $this->muserfront->getdataBerita();
            $randomberita = $this->muserfront->getrandomberita();
            $kategori = $this->muserfront->getkategori();
            $slider = $this->muserfront->randomslider();
           
           
            $data['berita'] = $berita;
            $data['random'] = $randomberita;
            $data['kategori'] = $kategori;
            $data['popup'] = $slider;
            // var_dump($data['popup']);
            $isi =  $this->template->user('userfront/vuserfront',$data); 
            $this->load->view('/utamauser/vutamauser',$isi);
            } else { redirect('clogin'); }
            
	}

         
     
    public function detailBerita($id)
    { 

            if ($this->session->userdata('login') == TRUE){
            $detailberita = $this->muserfront->getdetailBerita($id);
            $randomberita = $this->muserfront->getrandomberita();
            $data['detail'] = json_decode(json_encode($detailberita),true);
            $data['random'] = $randomberita;
            // var_dump($data['random']);
            $isi =  $this->template->detail('userfront/vdetailberita',$data);
            $this->load->view('/utamauser/vutamauser',$isi);
            } else { redirect('clogin'); }
           
    }


     public function detailimage($id)
    { 

            if ($this->session->userdata('login') == TRUE){
            $detailberita = $this->muserfront->getdetailBerita($id);
            $randomberita = $this->muserfront->getrandomberita();
            $data['detail'] = json_decode(json_encode($detailberita),true);
            $data['image'] = $this->muserfront->getdetailImage($id);
            $data['random'] = $randomberita;
            // var_dump($data['random']);
            $isi =  $this->template->detail('userfront/vdetailimage',$data);
            $this->load->view('/utamauser/vutamauser',$isi);
            } else { redirect('clogin'); }
           
    }


    public function AllBerita()
    {       
            if ($this->session->userdata('login') == TRUE){
            $berita = $this->muserfront->getAllBerita();
            $randomberita = $this->muserfront->getrandomberita();
            $data['berita'] = $berita;
            $data['random'] = $randomberita;
            // var_dump($data['random']);
            $isi =  $this->template->detail('userfront/vallberita',$data);
            $this->load->view('/utamauser/vutamauser',$isi);
            } else { redirect('clogin'); }
           
    }


     public function tambahgambar()
    { 
        if ($this->session->userdata('login') == TRUE){           
            $isi =  $this->template->display('posting/tambahgambar');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }


    public function search(){
        if ($this->session->userdata('login') == TRUE){
        $kunciCari=htmlspecialchars($this->input->get('search'));
        $kategori=htmlspecialchars($this->input->get('Kategori_name'));
        $kunciCari1 = preg_replace('/[^A-Za-z0-9\  ]/', '', $kunciCari);
        

        $data['berita']   = $this->muserfront->get_cari($kunciCari1,$kategori);
        $randomberita = $this->muserfront->getrandomberita();
        $data['random'] = $randomberita;
        // var_dump($data['berita'] );
        
        $isi =  $this->template->detail('userfront/vsearchberita',$data);
            $this->load->view('/utamauser/vutamauser',$isi);
            } else { redirect('clogin'); }
    }

    public function searchfilter(){
        $get = $this->input->get();
        $kunciCari=htmlspecialchars($get['kategori']);
        $kunciCari1 = preg_replace('/[^A-Za-z0-9\  ]/', '', $kunciCari);
        // var_dump($kunciCari1);
        $data['berita']   = $this->muserfront->carifilter($kunciCari1);
        // var_dump($data['berita'] );
        $isi =  $this->template->detail('userfront/vsearchberita',$data);
            $this->load->view('/utamauser/vutamauser',$isi);
    }

    


    // function loginuser(){

    //         // var_dump($data['random']);
    //         $isi =  $this->template->loginuser('userfront/vloginuser');
    //         $this->load->view('/utamauser/vutamalogin',$isi);

    // }


    
  
}
