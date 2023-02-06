<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cslider extends CI_Controller {

    public function __construct()
   {
   
    parent::__construct();

     //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
     $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
     $this->output->set_header('Pragma: no-cache');
     $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
     
     
      $this->load->model('madmin');
      $this->load->model('mpasien');
      $this->load->model('mslider');
      //$this->load->model('moperasi');
      //$this->load->model('mdokter');
      //$this->load->model('mpenanggung');
      //$this->load->model('mfilterlaporan');
     
    
   }

    public function index()
    {
            if ($this->session->userdata('login') == TRUE){
            //$data['pasien']= $this->mpasien->tampilkan(); 

            $isi =  $this->template->alllist('slider/vlistslider');
            $this->load->view('utama/vutama',$isi);
            
            } else { redirect('clogin'); }
    }

         
     
    public function tambahslider()
    { 
        if ($this->session->userdata('login') == TRUE){             
            $isi =  $this->template->display('slider/vinsertslider');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }


     function addSlider(){
        $post=$this->input->post();
        // konfigurasi upload
        $config['upload_path'] = "./asset/slider";
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config['max_size'] = 1024 * 8;
        
        //random name
        $new_name = time()."-".$_FILES["foto"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $foto = 'foto';
        $this->upload->initialize($config);
        $file_foto=$post['foto'];

        if (!$this->upload->do_upload($foto)) {
                //jika gagal upload file foto
                $info="gagal";
           }else {
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                $data['name_file']=$file_name;
                $data['timestamp']=date('Y-m-d H:i:s');
                $data['id_user']=$this->session->userdata('user_id');
                $data['status']='1';
                $this->mslider->insertSlider($data);
                $info="Konten gambar berhasil disimpan ";
           }
        echo json_encode($info);   

          }
     
  
        public function list_slider()
    {
            if ($this->session->userdata('login') == TRUE){
            // $data['pasien']= $this->mpasien->tampilkan();    
            $isi =  $this->template->alllist('slider/vlistslider');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }


       //load data table..
        public function ajaxListslider(){
            $data=array();
            $list = $this->mslider->getdata();

            $no=1;
        //cacah data 
        foreach ( $list as $item ) {
            $filefoto= base_url().'asset/slider/'.$item ['name_file'];

        
            $row = array();
            $row[] = $no;
            $row[] = '<div class="media-object"><img style="width: 100px; " src="'.$filefoto.'" alt="" class="img"></div>';

             if ($item['stat']=='1') {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['slider_id']."'".","."'".$item['stat']."'".')" checked>';
            } else {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['slider_id']."'".","."'".$item['stat']."'".')" unchecked>';
            } 

            $row[] = $item ['timestamp'];
            $row[] = $item ['user'];
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="deleteKat('."'".$item['slider_id']."'".')">
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



        function updateaktiv($data){
            $this->mslider->updateaktiv($data);
        }

        function updatepasive($data){
            $this->mslider->updatepasive($data);
        }


        function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->mslider->drop($id);

        }


        public function getKategori() {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->mkategori->sckategori() ) ) ;
    }




  
}
