<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cuser extends CI_Controller {

    public function __construct()
   {
   
    parent::__construct();

        //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
        $this->load->model('madmin');
        $this->load->model('mpasien');
        $this->load->model('muser');
        $this->load->library('sessionchecker');
        $this->sessionchecker->CheckHakAkses();
     
    
   }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE){

            $isi =  $this->template->alllist('user/vlistuser');
            $this->load->view('utama/vutama',$isi);
            
            } else { redirect('clogin'); }
	}

         
     

        function addUser(){
        $post=$this->input->post();       
                // jika tidak uplop file atau gagal upload file foto
                $data['user']=$post['Username'];
                $data['pass']=sha1($post['Password']);
                $data['admin_status']=$post['statusadmin'];
                $data['timestamp']=date('Y-m-d H:i:s');
                $data['status']='1';
                $this->muser->insertUser($data);
                $info="Kategori Berhasil disimpan";
                 echo json_encode($info);   
               
           }

        function editUser(){
        $post=$this->input->post();       
                // jika tidak uplop file atau gagal upload file foto
                $id=$post['id'];
                $pass = $post['pass'];
                if ($pass == '') {
                }
                else{
                    $data['pass']=sha1($pass);
                }
                $data['user']=$post['user'];
                $data['admin_status']=$post['statadmin'];
                $this->muser->updateall($id,$data);
                $info="Kategori Berhasil diubah";
                echo json_encode($data);   
               
           }
       
        public function list_user()
	{
            if ($this->session->userdata('login') == TRUE){
            // $data['pasien']= $this->mpasien->tampilkan();    
            $isi =  $this->template->alllist('user/vlistuser');
            $this->load->view('utama/vutama',$isi);
            } 
            else { redirect('clogin'); }
	}


       //load data table..
        public function ajaxListUser(){
            $data=array();
            $list = $this->muser->getdata();

            $no=1;
        //cacah data 
        foreach ( $list as $item ) {

            $adminuser = $item ['admin_status'];
            if ($adminuser == '1') {
                $stat = 'Admin';
            }
            else{
                $stat = 'Non Admin';
            }
        
            $row = array();
            $row[] = $no;
            $row[] = $item ['user'];
            $row[] = $stat;
            $row[] = $item ['timestamp'];
             if ($item['status']=='1') {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['id']."'".","."'".$item['status']."'".')" checked>';
            } else {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['id']."'".","."'".$item['status']."'".')" unchecked>';
            } 
            $row[] = '
            <a class="btn btn-sm btn-primary detail-'.$item['id'].'"
            data-id='."'".json_encode($item)."'".'  title="Edit" onclick="edit('."'".$item['id']."'".')">
            <i class="fa fa-pencil-square-o"></i></a>  <a class="btn btn-sm btn-primary detail-'.$item['id'].'"
            data-id='."'".json_encode($item)."'".'  title="Edit" onclick="drop('."'".$item['id']."'".')">
            <i class="fa fa-trash"></i></a>
           
            ';

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }

        function updateaktiv($data){
            $this->muser->updateaktiv($data);
        }

        function updatepasive($data){
            $this->muser->updatepasive($data);
        }


        function delete(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->muser->drop($id);

        }

        public function getKategori() {
            $data = $this->output
            ->set_content_type( "application/json" )
            ->set_output( json_encode( $this->mkategori->sckategori() ) ) ;
    }


          //function for delete berita 
        function deleteUser(){
            $post= $this->input->post();
            $id= $post['id'];
            $this->muser->drop($id);

        }






  
}
