<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cberita extends CI_Controller {

    public function __construct()
   {
   
    parent::__construct();

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

        $this->load->model('madmin');
        $this->load->model('mpasien');
        $this->load->model('mberita');
    }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE ){

            $isi =  $this->template->display('vmenuutama'); 
                     
            $this->load->view('/utama/vutama',$isi);
            
            } else { redirect('clogin'); }
	}

         
     //view for tambah postingan
    public function tambahposting()
    { 
        if ($this->session->userdata('login') == TRUE ){             
            $isi =  $this->template->display('posting/tambahposting');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

    //view for tambah image
     public function tambahgambar()
    { 
        if ($this->session->userdata('login') == TRUE ){           
            $isi =  $this->template->display('posting/vmultipleupload');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }
    //view for tambah file
    public function tambahfile()
    {  
        if ($this->session->userdata('login') == TRUE){           
            $isi =  $this->template->display('posting/tambahfile');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

    //view for edit berita All
    public function editberita($id)
    {  
        if ($this->session->userdata('login') == TRUE ){           
           
            $berita = $this->mberita->getberita($id);
            $data['berita'] = json_decode(json_encode($berita),true);
            $data['image'] = $this->mberita->getphoto($id);
            $isi =  $this->template->display('posting/editfile',$data);
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
    }

    //fungsi for upload image in summernote
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

    // function for add content
    function addKonten(){
        $post=$this->input->post();
        //if can't data foto
        if (empty($_FILES["foto"]['name'])) {
                $data['judul']=$post['judul'];
                $data['konten']=$post['konten'];
                $data['kategori']=$post['kategori'];
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='1';
                $data['status']='1';
                $data['cover']='default.jpg';
                //input to database
                $this->mberita->insertKonten($data);
                //get id for notification 
                $idnew=$this->mberita->getId();
                //go to notification function 
                $this->notif($idnew->id, $idnew->judul);
        }else{

                $config['upload_path'] = "./asset/img";
                $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
                $config['max_size'] = 20024 * 8;
                //random name
                $new_name = time()."-".$_FILES["foto"]['name'];
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                $foto = 'foto';
                $this->upload->initialize($config);
            if (!$this->upload->do_upload($foto)) {
                //if upload file failed
                $info="gagal";
           }else {
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                //data for input in database
                $data['judul']=$post['judul'];
                $data['konten']=$post['konten'];
                $data['kategori']=$post['kategori'];
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='1';
                $data['status']='1';
                $data['cover']=$file_name;
                //input to database
                $this->mberita->insertKonten($data);
                $idnew=$this->mberita->getId();
                $this->notif($idnew->id, $idnew->judul);
                $info="Konten Berhasil disimpan";
           }
           echo json_encode($data);
       }
                
                
           }


        function notif($id,$judul){    

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => "",
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 30,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => "POST",
            //   CURLOPT_POSTFIELDS => "{\n    \"notification\": {\n        \"title\": \"New Notification has arrived\",\n        \"body\": \"Notification Body\",\n        \"sound\": \"default\",\n        \"click_action\": \"FCM_PLUGIN_ACTIVITY\",\n        \"icon\": \"fcm_push_icon\"\n    },\n    \"data\": {\n        \"id\": \"".$id."\"\n    },\n    \"to\": \"/topics/employee\",\n    \"priority\": \"high\",\n    \"restricted_package_name\": \"\"\n}",
            //   CURLOPT_HTTPHEADER => array(
            //     "Authorization: key=AAAAzedOkSg:APA91bHZHSldR0sGZQRu_MWk_TkSzuEbvv0EGb-cLbz5N5GKNoNUXAweRxMyvh0UatD9bK1te41opZFKuhFvuGj1Wcg-MTAsOw3hIiXuozY4borF747_AR2re0NW5kXoKour3iljh-fJ",
            //     "Content-Type: application/json",
            //     "Postman-Token: c02e5c68-3879-4aff-95eb-dd430be778f7",
            //     "cache-control: no-cache"
            //   ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);

            // curl_close($curl);

            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
            //   echo $response;
            // }

            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(

                'notification'              => array(
                                            'title'=> "Pengumuman Baru",
                                            'body'=> $judul,
                                            'sound'=> 'default',
                                            'click_action'=> 'FCM_PLUGIN_ACTIVITY',
                                            'icon'=> 'fcm_push_icon'),

                'data'                      => array( "id" => $id ),
                'to'                        => '/topics/employee',
                'priority'                  => 'high',
                'restricted_package_name'=> ''
            );
            $headers = array( 
                'Authorization: key=AAAAzedOkSg:APA91bHZHSldR0sGZQRu_MWk_TkSzuEbvv0EGb-cLbz5N5GKNoNUXAweRxMyvh0UatD9bK1te41opZFKuhFvuGj1Wcg-MTAsOw3hIiXuozY4borF747_AR2re0NW5kXoKour3iljh-fJ',
                'Content-Type: application/json'
                
            );


            // Open connection
            $ch = curl_init();

            // Set the url, number of POST vars, POST data
            curl_setopt( $ch, CURLOPT_URL, $url );

            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

            // Avoids problem with https certificate
            curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);

            // Execute post
            $result = curl_exec($ch);
            curl_close($ch);
            echo json_encode($result); 




        }



        // function for edit content
        function editKonten(){
        $post=$this->input->post();       
                $id=$post['id'];
                $data['judul']=$post['judul'];
                $data['konten']=$post['konten'];
                $data['kategori']=$post['kategori'];
                $data['user']=$this->session->userdata('user_id');
                $this->mberita->updateall($id,$data);
                $info="Konten Berhasil diubah";
                echo json_encode($data);   
               
           }
       
       
        function addImage(){
        $post=$this->input->post();
        // konfigurasi upload
        $config['upload_path'] = "./asset/img";
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
                $data['judul']=$post['judul'];
                $data['kategori']=$post['kategori'];
                $data['konten']=$file_name;
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='2';
                $data['status']='1';
                $this->mberita->insertKonten($data);
                $info="Konten gambar berhasil disimpan ";
           }
        echo json_encode($info);   

          }

    function addFile(){
        $post=$this->input->post();
        // konfigurasi upload
        $config['upload_path'] = "./asset/file";
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp|pdf';
        $config['max_size'] = 10024 * 8;
        //random name
        $new_name = time()."-".$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $foto = 'file';
        $this->upload->initialize($config);
        $file_foto=$post['file'];
         if (!$this->upload->do_upload($foto)) {
            //if upload file failed
                $info="gagal";
           }else {
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                $data['judul']=$post['judul'];
                $data['kategori']=$post['kategori'];
                $data['konten_pdf']=$post['kfile'];
                $data['konten']=$file_name;
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='3';
                $data['status']='1';
                $data['cover']='pdf.png';
                $this->mberita->insertKonten($data);
                $idnew=$this->mberita->getId();
                $this->notif($idnew->id, $idnew->judul);
                $info="Konten File berhasil disimpan ";
           }
        echo json_encode($info);   

          }


        // function UpadateGambar(){
        // $post=$this->input->post();
        // $id = $post['id'];
        // $imagelama = $this->mberita->getimage($id);
        // $image = $imagelama->konten;
        // //konfigurasi upload
        // $config['upload_path'] = "./asset/img";
        // $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        // $config['max_size'] = 1024 * 8;
        // //random name
        // $new_name = time()."-".$_FILES["foto"]['name'];
        // $config['file_name'] = $new_name;
        // $this->load->library('upload', $config);
        // $foto = 'foto';
        // $this->upload->initialize($config);
        // $file_foto=$post['foto'];
        //     if (!$this->upload->do_upload($foto)) {
        //         //jika tidak uplop file atau gagal upload file foto
        //         $data['judul']=$post['judul'];
        //         $data['kategori']=$post['kategori'];
        //         $data['user']=$this->session->userdata('user_id');
        //         $this->mberita->updateall($id,$data);
        //         $info="Data gambar Berhasil diubah";
        //    }else {
        //     if ($image!='' && $image!=' ') {
        //            unlink(FCPATH . "./asset/img/" . $image);
        //   }
        //         $file_data = $this->upload->data();
        //         //get nama file yg di upload
        //         $file_name = $file_data['file_name'];
        //         $data['judul']=$post['judul'];
        //         $data['kategori']=$post['kategori'];
        //         $data['user']=$this->session->userdata('user_id');
        //         $data['konten']=$file_name;
        //         $this->mberita->updateall($id,$data);
        //         $info="Data gambar Berhasil diubah dan foto berhasil di-upload ";
        //    }
        // echo json_encode($data);   

        //   }


        function editFile(){
        $post=$this->input->post();
        $id = $post['id'];
        $filelama = $this->mberita->getimage($id);
        $getfile = $filelama->konten;
        // konfigurasi upload
        $config['upload_path'] = "./asset/file";
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp|pdf';
        $config['max_size'] = 1024 * 8;
        //random name

        $new_name = time()."-".$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $foto = 'file';
        $this->upload->initialize($config);
        $file_foto=$post['file'];
            if (!$this->upload->do_upload($foto)) {
                $data['judul']=$post['judul'];
                $data['kategori']=$post['kategori'];
                $data['user']=$this->session->userdata('user_id');
                $this->mberita->updateall($id,$data);
                $info="Data File Berhasil diubah";
            }else {
                if ($getfile!='' && $getfile!=' ') {
                   unlink(FCPATH . "./asset/file/" . $getfile);
            }
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                $data['judul']=$post['judul'];
                $data['kategori']=$post['kategori'];
                $data['user']=$this->session->userdata('user_id');
                $data['konten']=$file_name;
                $this->mberita->updateall($id,$data);
                $info="Konten File berhasil diubah";
            }
        echo json_encode($info);   

          }

        //view for list berita 
        public function list_berita()
	{
            if ($this->session->userdata('login') == TRUE ){
            $isi =  $this->template->alllist('posting/list_berita');
            $this->load->view('utama/vutama',$isi);
            } else { redirect('clogin'); }
	}


       //load data table..
        public function ajaxListBerita(){
            $data=array();
            $list = $this->mberita->getdata();

            $no=1;
        //cacah data 
        foreach ( $list as $item ) {
            $kj = $item['konten_jenis'];
            
            if ($kj == '2') {
                $detail = base_url('index.php/cuserfront/detailImage/'.$item['k_id'].'');
            }
            else{
                $detail = base_url('index.php/cuserfront/detailBerita/'.$item['k_id'].'');
            }
            
           
            $row = array();
            $row[] = $no;
            $row[] = $item ['judul'];
            $row[] = $item ['nama_kategori'];
            $row[] = $item ['tgl_post'];
            $row[] = $item ['name'];
            // $row[] = '<div class="media-object"><img src="'.$filefoto.'" alt="" class="img"></div>';
             if ($item['k_stat']=='1') {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['k_id']."'".","."'".$item['k_stat']."'".')" checked>';
            } else {
                $row[] = '<input type="checkbox" 
                class="switchery" onclick="updatestat('."'".$item['k_id']."'".","."'".$item['k_stat']."'".')" unchecked>';
            } 
            $row[] = '
            <a class="btn btn-sm btn-primary"  title="delete" onclick="delete_berita('."'".$item['k_id']."'".')">
            <i class="fa fa-trash-o"></i></a>
            ';

        
            
            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        }


        //update status active
        function updateaktiv($data){
            $this->mberita->updateaktiv($data);
        }
        //update status non active
        function updatepasive($data){
            $this->mberita->updatepasive($data);
        }

        //function for delete berita 
        function deleteBerita(){
            $post= $this->input->post();
            $id= $post['id'];
            echo json_encode($id);
            $this->del_image_berita($id);
            $this->mberita->drop_berita($id);

        }

        // function for delete file in server
        public function del_image_berita($id){
        // get data team by id
        $imagelama = $this->mberita->getkonten($id);
        $a = pathinfo($imagelama->konten);
        $fileExtension = $a['extension'];
        
        // cek  jika hasil null
        if ($imagelama != false) {
            //cek name file img team
            $konten = $imagelama->konten;
            $path = pathinfo($konten);
            $fileExtension = $path['extension'];
            if ($fileExtension == 'jpg' || $fileExtension == 'png' ) {
               if ($konten != '' && $konten != ' ') {
                // jika file tidak null atau kosong maka hapus file
                 unlink(FCPATH . "./asset/img/" . $konten);
             }
            }

            elseif ($fileExtension == 'pdf') {
                if ($konten != '' && $konten != ' ') {
                // jika file tidak null atau kosong maka hapus file
                 unlink(FCPATH . "./asset/file/" . $konten);
             }
            }
            else{

            }
            
            
        }
    }       



    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
}


    function UpBeritaImg(){
       $post=$this->input->post();

        $post=$this->input->post();
        if (empty($_FILES["foto"]['name'])) {
                $uuim = $this->randomString();
                $data['judul']=$post['judul'];
                $data['kategori']=$post['Kategori_name'];
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='2';
                $data['status']='1';
                $data['konten']=$uuim;
                $data['cover']='default.jpg';
                //input to database
                $this->mberita->insertKonten($data);
                $this->uploadimage($uuim);
                $idnew=$this->mberita->getId();
                $this->notif($idnew->id, $idnew->judul);
        }else{


        $config['upload_path'] = "./asset/img";
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config['max_size'] = 1024 * 8;
        // $a = $_FILES["foto"]['name'];

        //random name
        $new_name = time()."-".$_FILES["foto"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $foto = 'foto';
        $this->upload->initialize($config);
            if (!$this->upload->do_upload($foto)) {
            //if upload file failed
                $info="gagal";
           }else {
                $file_data = $this->upload->data();
                //get nama file yg di upload
                $file_name = $file_data['file_name'];
                $uuim = $this->randomString();
                $data['judul']=$post['judul'];
                $data['kategori']=$post['Kategori_name'];
                $data['tgl_post']=date('Y-m-d H:i:s');
                $data['user']=$this->session->userdata('user_id');
                $data['konten_jenis']='2';
                $data['status']='1';
                $data['cover']=$file_name;
                $data['konten']=$uuim;
                $this->mberita->insertKonten($data);
                $this->uploadimage($uuim);
                $idnew=$this->mberita->getId();
                $this->notif($idnew->id, $idnew->judul);
                $info = "berhasil";
            }
                // $info="Konten gambar berhasil disimpan ";
        echo json_encode($info);
            }
    }


    function uploadimage($uuim){
        $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
                $new_name = time()."-".$_FILES['files']['name'][$i];
                $config['file_name'] = $new_name;
                $uploadPath = 'asset/img';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                   
                    $fileData = $this->upload->data();
                    $uploadData[$i]['nama_image'] = $fileData['file_name'];
                    $uploadData[$i]['uuim'] = $uuim;
                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->mberita->insertImageAll($uploadData);
                // Upload status message
                echo json_encode("sukses");
                // $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
    



         function editText(){
        // $file_data = $this->upload->data();
        $post=$this->input->post();
        //get nama file yg di upload
            $id= $post['id'];     
            $getuuim = $this->mberita->getberita($id);   
            $data['judul']=$post['judul'];
            $data['kategori']=$post['Kategori_name'];
            $data['user']=$this->session->userdata('user_id');
            $this->mberita->updateall($id,$data);
            $this->editImage($getuuim->konten);
            // $info="Konten gambar berhasil disimpan ";
        // echo json_encode($data);

    }

    function editImage($uuim){
        $imagelama = $this->mberita->getgambar($uuim);
        foreach ($imagelama as $key => $value) {
            $image = $value->nama_image;
            $id_image = $value->id_image;
            // echo json_encode($id_image);
        
        if (!empty($_FILES['files']['name'])) {
        $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
                $new_name = time()."-".$_FILES['files']['name'][$i];
                $config['file_name'] = $new_name;
                $uploadPath = 'asset/img';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['nama_image'] = $fileData['file_name'];
                    $uploadData[$i]['uuim'] = $uuim;
                    $insert = $this->mberita->drop_image($uuim);
                } 
            }

            if(!empty($uploadData)){
                // Insert files data into the database
                if ($image!='' && $image!=' ') {
                   unlink(FCPATH . "./asset/img/" . $image);
          }

                 $insert = $this->mberita->insertImageAll($uploadData);

                // Upload status message
                echo json_encode("sukses");
                // $this->session->set_flashdata('statusMsg',$statusMsg);
            }

        }else{
            echo json_encode("tidak upload");
        }
    }

        }
    



  
}
