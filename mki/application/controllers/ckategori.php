<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ckategori extends CI_Controller {

    public function __construct()
   {
   
    parent::__construct();

     //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
        $this->load->model('madmin');
        $this->load->model('mpasien');
        $this->load->model('mkategori');
        $this->load->library('sessionchecker');
        $this->sessionchecker->CheckHakAkses();
     
    
   }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE){
            //$data['pasien']= $this->mpasien->tampilkan(); 

            $isi =  $this->template->display('vmenuutama'); 
                     
            $this->load->view('/utama/vutama',$isi);
            
            } else { redirect('clogin'); }
	}

         
     
    public function tambahposting()
    { 
        if ($this->session->userdata('login') == TRUE){             
            $isi =  $this->template->display('posting/tambahposting');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

    public function editberita($id)
    {  
        if ($this->session->userdata('login') == TRUE){           
           
            $berita = $this->mkategori->getberita($id);
            $data['berita'] = json_decode(json_encode($berita),true);
            // var_dump($data);
            $isi =  $this->template->display('posting/editfile',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }



    function addKategori(){
        $post=$this->input->post();       
                // jika tidak uplop file atau gagal upload file foto
                $data['nama_kategori']=$post['kategori'];
                $data['timestamp']=date('Y-m-d H:i:s');
                $data['user_id']=$this->session->userdata('user_id');
                $data['status']='1';
                $this->mkategori->insertKategori($data);
                $info="Kategori Berhasil disimpan";
                 echo json_encode($info);   
               
           }

        function editKategori(){
        $post=$this->input->post();       
                // jika tidak uplop file atau gagal upload file foto
                $id=$post['id'];
                $data['nama_kategori']=$post['kategori'];
                $data['user_id']=$this->session->userdata('user_id');
                $this->mkategori->updateall($id,$data);
                $info="Kategori Berhasil diubah";
                echo json_encode($data);   
               
           }
       
     
  
    public function list_kategori()
	   {
        if ($this->session->userdata('login') == TRUE){
        // $data['pasien']= $this->mpasien->tampilkan();    
        $isi =  $this->template->alllist('kategori/listkategori');
        $this->load->view('utama/vutama',$isi);
        } else { redirect('clogin'); }
	   }


       //load data table..
        public function ajaxListKategori(){
            $data=array();
            $list = $this->mkategori->getdata();

            $no=1;
        //cacah data 
        foreach ( $list as $item ) {
        
            $row = array();
            $row[] = $no;
            $row[] = $item ['nama_kategori'];

            
             if ($item['status']=='1') {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['id_kategori']."'".","."'".$item['status']."'".')" checked>';
            } else {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['id_kategori']."'".","."'".$item['status']."'".')" unchecked>';
            } 
            $row[] = $item ['timestamp'];
            $row[] = '
            <a class="btn btn-sm btn-primary detail-'.$item['id_kategori'].'"
            data-id='."'".json_encode($item)."'".'  title="Edit" onclick="edit('."'".$item['id_kategori']."'".')">
            <i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteKat('."'".$item['id_kategori']."'".')">
            <i class="fa fa-trash-o"></i></a>
            </a> ';

        
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


        // change status active 
        function updateaktiv($data){
            $this->mkategori->updateaktiv($data);
        }
        //change status non active
        function updatepasive($data){
            $this->mkategori->updatepasive($data);
        }


        function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->mkategori->drop($id);

        }

        public function getKategori() {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->mkategori->sckategori() ) ) ;
    }




  
}
