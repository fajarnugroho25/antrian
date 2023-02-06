<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function __construct()
   {

      
      parent::__construct();
      $this->load->library('cfpdf');
      $this->load->model('Informasi/minformasi');
      $this->load->model('menu/mmenu');
   
     
   }


 public function tambahinformasi()
    {
         $data['menu_list']=$this->mmenu->tampilkan();  
        $data['submenu_list']=$this->mmenu->tampilkansub(); 
            
        if ($this->session->userdata('login') == TRUE){
             $nik = $this->session->userdata('nama');
            
            $isi =  $this->template->display('informasi/vtambahinformasi', $data);
            $this->load->view('admin/vutama', $isi);
            } else { redirect('login'); }
    }



public function datainformasi()
    {
         $data['menu_list']=$this->mmenu->tampilkan();  
        $data['submenu_list']=$this->mmenu->tampilkansub(); 
            
        if ($this->session->userdata('login') == TRUE){
             $nik = $this->session->userdata('nama');
            
            $isi =  $this->template->display('informasi/vdatainformasi', $data);
            $this->load->view('admin/vutama', $isi);
            } else { redirect('login'); }
    }




function addFile(){
        $post=$this->input->post();
        // konfigurasi upload
        $config['upload_path'] = "./public/assets/file";
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp|pdf';
        $config['max_size'] = 10024 * 10;
        //random name
        $new_name = time()."-".$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $foto = 'file';
        $this->upload->initialize($config);
        $file_foto=$post['file'];
        $judul = $post['judul'];
         if (!$this->upload->do_upload($foto)) {
            //if upload file failed
                $info="gagal";
           }else {
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                $data['judulinformasi']=$post['judul'];
                $data['jenisinformasi']='1';
                $data['isiinformasi']=$file_name;
                $data['status']='1';
                $data['tglinput']=date('Y-m-d H:i:s');
                $data['userinput']=$this->session->userdata('nama');
                $this->minformasi->addinformasi($data);
                
                $info="Konten File berhasil disimpan ";
                echo json_encode($data);   
        
           }
        

          }

public function ajaxListinformasi(){
            
           
            $data=array();
            
            $list= $this->minformasi->tamp_informasi();

            $no=1;

        //cacah data
        foreach ( $list as $item ) {


           

           
            $row = array();
            $row[] = $no;
            $row[] = $item ['judulinformasi'];
            if ($item ['jenisinformasi'] == 1) {
                $row[] = '<a href="'.base_url().'public/assets/file/'.$item['isiinformasi'].'" target="_blank" class="btn btn-success">lihat</a>
                    ' ;
            }
            else{
                $row[] = '<a href="'.base_url().'public/assets/image/'.$item['isiinformasi'].'" target="_blank" class="btn btn-success">lihat</a>
                    ' ;
            }
            

            

            
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }



}
