<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chome extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      
     //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
        $this->load->model('madmin');
        $this->load->model('mpasien');
        $this->load->model('mhome');
  
     
    
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
            //$data['kodejadi'] = $this->mpasien->code_pasien();
            //$data['combo'] = $this->mpasien->combo_operasi(); 
            //$data['cbdokter'] = $this->mpasien->combo_dokter();  
            //$data['cbkelas'] = $this->mpasien->combo_kelas(); 
            //$data['cbkelasminta'] = $this->mpasien->combo_kelas_minta(); 
            //$data['cbpenanggung'] = $this->mpasien->combo_penanggung();              
            $isi =  $this->template->display('posting/tambahposting');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }


     public function tambahgambar()
    { 
            
        if ($this->session->userdata('login') == TRUE){
            //$data['kodejadi'] = $this->mpasien->code_pasien();
            //$data['combo'] = $this->mpasien->combo_operasi(); 
            //$data['cbdokter'] = $this->mpasien->combo_dokter();  
            //$data['cbkelas'] = $this->mpasien->combo_kelas(); 
            //$data['cbkelasminta'] = $this->mpasien->combo_kelas_minta(); 
            //$data['cbpenanggung'] = $this->mpasien->combo_penanggung();              
            $isi =  $this->template->display('posting/tambahgambar');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }


 public function upload_image()
{
    if ($_FILES['file']['name']) {
        if (!$_FILES['file']['error']) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[1];
            $destination = './asset/img/' . $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo base_url().'asset/img/' . $filename;//change this URL
        }
        else
        {
            echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
        }
    }
}


        function addKonten(){
        $post=$this->input->post();       
        
                // jika tidak uplop file atau gagal upload file foto
                $data['judul']=$post['judul'];
                $data['konten']=$post['konten'];
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='1';
                $data['status']='1';
                $this->mhome->insertKonten($data);
                $info="Data Blog Berhasil disimpan";
                 echo json_encode($data);   
               
           }
       


  
        public function list_berita()
	{
            if ($this->session->userdata('login') == TRUE){
            // $data['pasien']= $this->mpasien->tampilkan();    
            $isi =  $this->template->display('posting/list_berita');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
	}


       //load data table..
        public function ajaxListBerita(){
            $data=array();
            $list = $this->mhome->getdata();

            $no=1;
        //cacah data 
        foreach ( $list as $item ) {
            // $foto = $item ['image'];
            // if ($foto!=' ') {
            //     $filefoto=base_url().'assets/dist/img/'.$foto;
            // } else {
            //     $filefoto=base_url().'assets/dist/img/bus.jpg';
            // }

            $isiKonten= $item ['konten'];
            $row = array();
            $row[] = $no;
            $row[] = $item ['judul'];
            $row[] = substr($isiKonten, 0, 50);
            $row[] = $item ['tgl_post'];
            $row[] = $item ['name'];
            // $row[] = '<div class="media-object"><img src="'.$filefoto.'" alt="" class="img"></div>';
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="Edit" onclick="update_blog('."'".$item['k_id']."'".')">
            <i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-sm btn-primary"  title="delete" onclick="delete_blog('."'".$item['k_id']."'".')">
            <i class="fa fa-trash-o"></i></a>';

        
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }

        
 //      public function datapasien_sudah_op()
 //    {
 //            if ($this->session->userdata('login') == TRUE){
 //            $data['pasien']= $this->mpasien->tampilkan_sudah_op();    
 //            $isi =  $this->template->display('admin/content/vdatapasien_sudah_op',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }   

 //      public function datapasien_batal()
 //    {
 //            if ($this->session->userdata('login') == TRUE){
 //            $data['pasien']= $this->mpasien->tampilkan_batal();    
 //            $isi =  $this->template->display('admin/content/vdatapasien_batal',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }    

 //        public function dataadmin()
	// { 
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['admin']= $this->madmin->tampilkan();  
 //            $isi =  $this->template->display('admin/content/vdataadmin',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
	// }
        
 //        public function dataoperasi()
	// {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['operasi']= $this->moperasi->tampilkan();   
 //            $isi =  $this->template->display('admin/content/vdataoperasi',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
	// }
        
 //        public function datadokter()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['dokter']= $this->mdokter->tampilkan();   
 //            $isi =  $this->template->display('admin/content/vdatadokter',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }

 //    public function datapenanggung()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['penanggung']= $this->mpenanggung->tampilkan();   
 //            $isi =  $this->template->display('admin/content/vdatapenanggung',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }
 //        public function tambahoperasi()
	// {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['kodejadi'] = $this->moperasi->code_otomatis();
 //            $isi =  $this->template->display('admin/content/vtambahoperasi',$data);
 //            $this->load->view('admin/vutama',$isi);

 //            } else { redirect('clogin'); }
	// }
        
 //         public function tambahdokter()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['kodejadi'] = $this->mdokter->code_otomatis();
 //            $isi =  $this->template->display('admin/content/vtambahdokter',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }
 //     public function tambahpenanggung()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['kodejadi'] = $this->mpenanggung->code_otomatis();
 //            $isi =  $this->template->display('admin/content/vtambahpenanggung',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }

 //        public function editoperasi()
	// {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['operasi'] = $this->moperasi->get_by_id($this->uri->segment(3));
 //            $isi =  $this->template->display('admin/content/vtambahoperasi',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
	// }

 //          public function editdokter()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['dokter'] = $this->mdokter->get_by_id($this->uri->segment(3));
 //            $isi =  $this->template->display('admin/content/vtambahdokter',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }

 //        public function editpenanggung()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['penanggung'] = $this->mpenanggung->get_by_id($this->uri->segment(3));
 //            $isi =  $this->template->display('admin/content/vtambahpenanggung',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }
       
        
 //        public function tambahpasien()
	// { 
            
 //        if ($this->session->userdata('login') == TRUE){
 //            $data['kodejadi'] = $this->mpasien->code_pasien();
 //            $data['combo'] = $this->mpasien->combo_operasi(); 
 //            $data['cbdokter'] = $this->mpasien->combo_dokter();  
 //            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
 //            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta(); 
 //            $data['cbpenanggung'] = $this->mpasien->combo_penanggung();              
 //            $isi =  $this->template->display('admin/content/vtambahpasien',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
	// }

 //        public function editpasien()
	// { 
            
 //        if ($this->session->userdata('login') == TRUE){
           
 //            $data['combo'] = $this->mpasien->combo_operasi();
 //            $data['cbdokter'] = $this->mpasien->combo_dokter();   
 //            $data['pasien'] = $this->mpasien->get_by_id($this->uri->segment(3));
 //            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
 //            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();  
 //            $data['cbpenanggung'] = $this->mpasien->combo_penanggung(); 
 //            $isi =  $this->template->display('admin/content/vtambahpasien',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
	// }
 //      public function editpasien_x()
 //    { 
            
 //        if ($this->session->userdata('login') == TRUE){
           
 //            $data['combo'] = $this->mpasien->combo_operasi();
 //            $data['cbdokter'] = $this->mpasien->combo_dokter();   
 //            $data['pasien'] = $this->mpasien->get_by_id($this->uri->segment(3));
 //            $data['cbkelas'] = $this->mpasien->combo_kelas(); 
 //            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();  
 //            $isi =  $this->template->display('admin/content/vtambahpasien_x',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }    
 //        public function tambahadmin()
	// {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $isi =  $this->template->display('admin/content/vtambahadmin');
 //            $this->load->view('admin/vutama',$isi);
 //            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  }
	// }

 //        public function editadmin()
	// {
            
 //        if ($this->session->userdata('login') == TRUE and $this->session->admin_status == 1 ){
 //            $data['admin'] = $this->madmin->get_by_id($this->uri->segment(3));
 //            $isi =  $this->template->display('admin/content/vtambahadmin',$data);
 //            $this->load->view('admin/vutama',$isi);
 //            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } 
	// }
 
   

 //    public function lap_detil()
 //    {
            
 //        if ($this->session->userdata('login') == TRUE){
 //            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
 //            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();  
 //            $data['cbkelas'] = $this->mfilterlaporan->combo_kelas(); 
 //            $data['cbkelasminta'] = $this->mfilterlaporan->combo_kelas_minta();  
 //            $isi =  $this->template->display('admin/content/vlap_detil',$data);            
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }


 //    public function lap_rekap()    {
            
 //        if ($this->session->userdata('login') == TRUE){
 //            $data['combo'] = $this->mfilterlaporan->combo_operasi(); 
 //            $data['cbdokter'] = $this->mfilterlaporan->combo_dokter();            
 //            $isi =  $this->template->display('admin/content/vlap_rekap',$data);            
 //            $this->load->view('admin/vutama',$isi);
 //            } else { redirect('clogin'); }
 //    }
  
}
