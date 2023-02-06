<?php 
// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class api extends REST_Controller {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->library('email');
        $this->load->model('M_api');
        $this->load->database();
    }

	function trip_get() {
       
        $a = $this->M_api->get_trip();
        $data['trip'] = $a;
        $this->response($data, 200);
        // echo json_encode($data,JSON_PRETTY_PRINT);
    }

    function trip_bycategory_post() {
        $category = $this->input->post('category');
        $limit = $this->input->post('limit');
        
        if ($category == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else {
            $tripcat = $this->M_api->get_trip_category($category,$limit);
            $data['trip_category'] = $tripcat;
        }
        $this->response($data, 200);
        // echo json_encode($data,JSON_PRETTY_PRINT);
    }

    function category_get() {
       
        $a = $this->M_api->get_category();
        $data['category'] = $a;
        $this->response($data, 200);
        // echo json_encode($data,JSON_PRETTY_PRINT);
    }

    function city_get() {
       
        $a = $this->M_api->get_city();
        $data['city'] = $a;
        $this->response($data, 200);
    }

    function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

    function detail_trip_post(){
    	 $id = $this->input->post('id');
         $trip = $this->M_api->get_detail($id)[0]['price'];
         $a = $this->multiexplode(array(",","|"), $trip);
         // $data['a'] = $a; 
         print_r($a);

        // if ($id == '') {
           
        // } else {
        //     $trip = $this->M_api->get_detail($id)[0]['detail'];
        //     $trip1 = $this->M_api->get_detail_trip($id);
        //     $a = str_split($trip1);
        //     $strip= strip_tags(trim($trip));
        //     $data['detail_trip'] = $strip;
        //     $data['detail_trip'] =$trip1;
        // }
        // var_dump($a);

    }

    function similer_trip_post(){
        $id = $this->input->post('id');
        $category = $this->input->post('category');

        if ($id == '' | $category == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $trip = $this->M_api->get_similer_trip($id,$category);
            $data['similer_trip'] = $trip;
        }
        $this->response($data, 200);

    }

    function list_booking_get(){
        $a = $this->M_api->list_booking();
        $this->response($a, 200);

    }

    function listbooking_user_post(){
        $username = $this->input->post('username');

        if ($username == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $booking = $this->M_api->listbooking_user($username);
        }
        $this->response($booking, 200);
    }

    function listbooking_active_post(){
        $username = $this->input->post('username');

        if ($username == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $booking = $this->M_api->listbooking_active($username);
            $data['booking_active'] = $booking;
        }
        $this->response($booking, 200);
    }

    function listbooking_history_post(){
        $username = $this->input->post('username');

        if ($username == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $booking = $this->M_api->listbooking_history($username);
            $data['booking_history'] = $booking;
        }
        $this->response($booking, 200);
    }



    function create_booking_post(){
        $tripId=  $this->input->post('trip_id');
        $guest= $this->input->post('guest');
        $username= $this->input->post('username');
        $date=$this->input->post('date');
        $amount=$this->input->post('amount');
        $time=date('d-m-Y h:i:sa');
        $status='unpaid';
        
        $id=sha1($date.$username.$time);

        $data['booking']       = array(
                    'invoice_id'    =>  $id ,
                    'item_id'       =>  $tripId,
                    'item_type'     =>  'trip' ,
                    'guest'         =>  $guest ,
                    'booking_date'  =>  $date,
                    'amount'        =>  $amount
                );
        $data['invoice'] = array(
                    'invoice_id'    => $id,
                    'username'      => $username,
                    'booking_status'=> $status,
                    'total'         => $amount
                );

        $insert = $this->db->insert('booking',$data['booking']);
        $insert = $this->db->insert('invoice',$data['invoice']);
        if ($insert) {
            $this->response($data, 200);
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
    }


    function user_profile_post(){
        $alias = $this->input->post('alias');

        if ($alias == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $profile = $this->M_api->get_profile_user($alias);
            $data['profile'] = $profile;
        }
        $this->response($profile, 200);


    }

    function search_trip_post(){
        $input = $this->input->post('input');
        $input1 = preg_replace('/[^A-Za-z0-9\-]/', '', $input);

        if ($input1 == '') {
             echo json_encode('false');
        } else {
            $search = $this->M_api->get_search_trip($input1);
            $data['search'] = $search;
        }
        $this->response($search, 200);

    }

    function login_user_post(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $cek_verify = $this->M_api->cek_verify_image($email);
        
        if ($cek_verify[0]['image_path'] === ""  ) {
            $this->response('a', 200);
        //     if ($email == '' && $password == '') {
        //      echo json_encode('email dan password kosong');
        // } else {
        //     $login = $this->M_api->login($email,$password);
        //     $data['login'] = $login;
        }
        
        //     # code...
        // }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
        

    }

    // 7e240de74fb1ed08fa08d38063f6a6a91462a815

    function registar_post(){

        $email = $this->input->post('email');
        $first_name = $this->input->post("first_name");

        $data= array(
                    'first_name'   => $first_name,
                    'last_name'   => $this->input->post('last_name'),
                    'email'   => $email,
                    'password'   => md5($this->input->post('password')),
                    'phone_number'   => $this->input->post('phone_number'),
                    'alias'  => sha1($this->input->post("first_name").$this->input->post('last_name').$this->input->post('email')),

                );
        $insert = $this->db->insert('users',$data);

         //enkripsi id
            $encrypted_id = md5($insert);
  
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "sofiamalikhah13@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "cantik12"; // isi dengan password kamu
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email
   
            $this->email->initialize($config);
    //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Verifikasi Akun");
            $this->email->message(
            "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
            site_url("api/verification/$encrypted_id"));
  
            if($this->email->send())
                {
                    $this->response("Berhasil melakukan registrasi, silahkan cek email kamu", 200);
            }else
                {
                    $this->response("Berhasil melakukan registrasi, namu gagal mengirim verifikasi email", 200);
            }
   
    }

        // $insert = $this->db->insert('users',$data);
        // if ($insert) {
        //     $this->response($data, 200);
        // }
        // else{
        //     $this->response(array('Status' => 'Forbidden', 403));
        // }
    // }


    public function verification($key)
        {
        $this->load->helper('url');
        $this->load->model('m_register');
        $this->m_register->changeActiveState($key);
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
        }


    function update_profile_friend_post(){
        // $uploaddir = '/home/me/public_html/uploads/';

        // $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        $alias= $this->input->post('alias');
        $password = $this->input->post('password');

            if ($password!= '') {
                $data = array(
                    'first_name'   => $this->input->post("first_name"),
                    'last_name'   => $this->input->post('last_name'),
                    'password'   =>  md5($password)

                );
            }
            else{
                $data = array(
                    'first_name'   => $this->input->post("first_name"),
                    'last_name'   => $this->input->post('last_name')

                );
            }
        // $this->response($a, 200);

        $this->db->where('alias',$alias);
        $update = $this->db->update('users',$data);
        if ($update) {
            $this->response($data, 200);
            # code...
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
      
    }

    function update_profile_Lfriend_post(){
        // $uploaddir = '/home/me/public_html/uploads/';

        // $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        

        $alias= $this->input->post('alias');
        $password = $this->input->post('password');

        if ($password!= '') {
            $data = array(
                    'first_name'   => $this->input->post("first_name"),
                    'last_name'   => $this->input->post('last_name'),
                    'self_description'   => $this->input->post('self_description'),
                    'password'   => md5($password)

                );
        }
        else{
            $data = array(
                    'first_name'   => $this->input->post("first_name"),
                    'last_name'   => $this->input->post('last_name'),
                    'self_description'   => $this->input->post('self_description')

                );
        }

        // $this->response($a, 200);

        $this->db->where('alias',$alias);
        $update = $this->db->update('users',$data);
        if ($update) {
            $this->response($data, 200);
            # code...
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
      
    }

    function upload_foto_post1(){
        // $uploaddir = './assets/img/';
        // $file_name = underscore($_FILES['file']['name']);
        // $uploadfile = $uploaddir.$file_name;
        // $alias= $this->input->post('alias');
        // // $image = UploadedFile::getInstanceByName('file');
        // $cloudinaryImage = Cloudinary\Uploader::upload($image->tempName);
        $data['image_path'] = \Cloudinary\Uploader::upload("./assets/img/img.jpg");

        // $data['image_path'] = $file_name;

        // $this->db->where('alias',$alias);
        // $update = $this->db->update('users',$data);
     
        // if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile) && $update) {
        //     $data['status'] = 'success';       
        //     $data['image_path'] = $file_name;
            
        //  } else {
        //     $data['status'] =  'failure';       
        //  }
         $this->response($data, 200);
    
        // $this->db->where('alias',$alias);
        // $update = $this->db->update('users',$data);
        // if ($update) {
        //     $this->response($data, 200);
        //     # code...
        // }
        // else{
        //     $this->response(array('Status' => 'Forbidden', 403));
        // }
      
    }

    //api for upload photo
     function upload_foto_post(){
        $alias= $this->input->post('alias');
        $data = array(
            'image_path'  => $this->upload_data_post('foto')
                );
        $this->response($data, 200);
    
        // $this->db->where('alias',$alias);
        // $update = $this->db->update('users',$data);
        // if ($update) {
        //     $profile = $this->M_api->get_profile($alias);
        //     $datas['login'] = $profile;
        //     $this->response($datas, 200);
        // }
        // else{
        //     $this->response(array('Status' => 'Upload failed', 403));
        // }
      
    }

    function profile_list_post(){
        $alias = $this->input->post('alias');
        if ($alias == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else {
            $profile = $this->M_api->get_profile($alias);
            $data['list_profile'] = $profile;
        }
        $this->response($data, 200);
    }

    function tambah_trip_post(){
        
        $host_id=$this->input->post('alias');
        $title=$this->input->post('title');
        $detail=$this->input->post('detail');
        $price=$this->input->post('price');
        $city=$this->input->post('city');   
        $category=$this->input->post('category');
        $capacity=$this->input->post('capacity');
        $min_capacity=$this->input->post('min_capacity');
        $duration=$this->input->post('duration');
        $condition_detail = $this->input->post('condition_detail');
        $transportation=$this->input->post('transportation');
        $language=$this->input->post('language');
        $itin=$this->input->post('itin');
        $include=$this->input->post('include');
        $exclude=$this->input->post('exclude');
        $cover=$this->input->post('cover');
        $photo=$this->input->post('photo');
        $id=sha1($title);

        $data= array(
                    'id'                =>  $id,
                    'host_id'           =>  $host_id ,
                    'title'             =>  $title,
                    'detail'            =>  $detail ,
                    'price'             =>  $price ,
                    'city'              =>  $city,
                    'category'          =>  $category,
                    'capacity'          =>  $capacity ,
                    'min_capacity'      =>  $min_capacity ,
                    'duration'          =>  $duration,
                    'detail'            =>  $detail ,
                    'transportation'    =>  $transportation,
                    'language'          =>  $language,
                    'condition_detail'  =>  $condition_detail,
                    'itin'              =>  $itin,
                    'include'           =>  $include ,
                    'exclude'           =>  $exclude,
                    'cover'             =>  $cover,
                    'photo'             =>  $photo

                );


        $insert = $this->db->insert('trip',$data);
        if ($insert) {
            $this->response($data, 200);  
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }


    }


    function update_trip_post(){
        $id = $this->input->post('id');
        $title=$this->input->post('title');
        $detail=$this->input->post('detail');
        $price=$this->input->post('price');
        $city=$this->input->post('city');
        $category=$this->input->post('category');
        $capacity=$this->input->post('capacity');
        $duration=$this->input->post('duration');
        $transportation=$this->input->post('transportation');
        $language=$this->input->post('language');
       

        $data= array(
                    'title'             =>  $title,
                    'detail'            =>  $detail ,
                    'price'             =>  $price ,
                    'city'              =>  $city,
                    'category'          =>  $category,
                    'capacity'          =>  $capacity ,
                    'duration'          =>  $duration,
                    'transportation'    =>  $transportation ,
                    'language'          =>  $language
                    
                );

        $this->db->where('id',$id);
        $update = $this->db->update('trip',$data);
        if ($update) {
            $this->response($data, 200);  
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }


    }

    function delete_trip_post(){
        $id = $this->input->post('id');

        $this->db->where('id',$id);
        $delete = $this->db->delete('trip');

        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    function read_more_post(){
        
        $user_id=$this->input->post('user_id');
        $trip_id=$this->input->post('trip_id');
        $host_id=$this->input->post('host_id');
        $date=("d-m-Y");
        $data = array(
                    'user_id'                => $user_id,
                    'trip_id'           =>  $trip_id ,
                    'host_id'             =>  $host_id
                );

        $insert = $this->db->insert('tb_read_more',$data);
        if ($insert) {
            $datas['read_more'] = $data;
            $this->response($datas, 200);  

        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }


    }

    function detail_booking_post(){
        $id = $this->input->post('id');

        if ($id == '') {
           $this->response(array('Status' => 'Forbidden', 403));
        } else {
            $booking = $this->M_api->get_detail_booking($id);
            $data['booking_detail'] = $booking;
        }
        $this->response($data, 200);
    }

    function wishlist_get(){
        $wishlist = $this->M_api->get_wishlist();
        $data['wishlist'] = $wishlist;
        $this->response($data, 200);
    }

    function wishlistdel_post(){
        $user_id = $this->input->post('user_id');
        $trip_id = $this->input->post('trip_id');
 

        $this->db->where('user_id',$user_id);
        $this->db->where('trip_id',$trip_id);
        $delete = $this->db->delete('tb_wishlist');
        if ($delete) {
            $datas['wishlist'] = array();
            $this->response($datas);
           
        }
        else{
             $this->response(array('Status' => 'gagal'));
        }
    }

    function wishlistinput_post(){
        $user_id = $this->input->post('user_id');
        $trip_id = $this->input->post('trip_id');
        $logs = date('Y-m-d H:i:s');
        
        $data = array(
                    'user_id' =>$user_id, 
                    'trip_id' =>$trip_id,
                    'logs'    =>$logs); 

        $insert = $this->db->insert('tb_wishlist',$data);
        if ($insert) {
            $datas['wishlist'] = $data;
            $this->response($datas, 200);
        }
        else{
             $this->response(array('Status' => 'Forbidden', 403));
        }
    }



    function trip_byhostid_post() {
        $host_id = $this->input->post('host_id');

        
        if ($host_id == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else {
            $tripcat = $this->M_api->get_trip_host($host_id);
            $data['trip_host_id'] = $tripcat;
        }
        $this->response($data, 200);
        // echo json_encode($data,JSON_PRETTY_PRINT);
    }

    function review_trip_post() {
        $trip_id = $this->input->post('trip_id');
        $limit = $this->input->post('limit');
        
        if ($trip_id == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else {
            $review = $this->M_api->review_rat($trip_id,$limit);
            $data['review_trip'] = $review;
        }
        $this->response($data, 200);
        // echo json_encode($data,JSON_PRETTY_PRINT);
    }

    function gcmid_post(){
        
        $alias=$this->input->post('alias');
        $gcmid=$this->input->post('gcmid');
        $data['gcmid'] = $gcmid;

        $this->db->where('alias',$alias);
        $update = $this->db->update('users',$data);
        if ($update) {
            $datas['gcmid'] = $gcmid;
            $this->response($datas, 200);  
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
    }


    function add_review_post(){

        $trip_id =$this->input->post("trip_id");
        $user_id =$this->input->post("user_id");
        $rating  =$this->input->post("rating");
        $review  =$this->input->post("review");
        $review_created = date('d-m-Y h:i:sa');;
        $data = array(
                    'trip_id'   => $trip_id,
                    'user_id'   =>$user_id  ,
                    'rating'   => $rating,
                    'review'   => $review,
                    'review_created'   =>$review_created                   

                );
        $insert = $this->db->insert('rating_review',$data);
        if ($insert) {
            $datas['add_review']=$data;
            $this->response($datas, 200);
        }
        else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
    }


     // sending push message to single user by firebase reg id
    public function send_post() {
        $to =$this->input->post("to");
        $title =$this->input->post("title");
        $message =$this->input->post("message");

        $res = array();
        $res['data']['title'] = $title;
        $res['data']['message'] = $message;
        $fields = array(
            'to' => $to,
            'data' => $res
        );
        
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=AIzaSyCyJrs9Qd4ApTNT2cFIU9T8m_Tztz5bw2g',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($fields) );

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ');
        }
        else{
            $this->response($result);
        }

        // Close connection
        // curl_close($ch);

        return $result;
    }


    function verifikasi_post(){
        $alias = $this->input->post('alias');

        if ($alias == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else{
            $data = $this->M_api->get_user_verify($alias);
            $datas['verifikasi'] = $data;

        }
        $this->response($datas);
    }


    function update_verifikasi_post(){
        $alias = $this->input->post('alias');
        $phone_verified = $this->input->post('phone_verified');
        $code_verify = $this->input->post('code_verify');
        $id_verified = $this->input->post('id_verified');
        $bank_verified = $this->input->post('bank_verified');

        $data = array(
                        'phone_verified' => $phone_verified,
                        'code_verify' => $code_verify,
                        'id_verified' => $id_verified,
                        'bank_verified' => $bank_verified );

        $this->db->where('alias',$alias);
        $update = $this->db->update('users',$data);


        if ($update) {
            $datas['update_verified'] = $data;
            $this->response($datas);

        }else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
    }

     public function upload_data_post(){

        $sourcePath = $_FILES['foto']['tmp_name'];       // Storing source path of the file in a variable
            $targetPath = "public/images/".$_FILES['foto']['name']; // Target path where file is to be stored
            $sourceName = $_FILES['foto']['name'];
            // $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
            $result = move_uploaded_file($sourcePath, $targetPath) ;    // Moving Uploaded file

            if ($result == 1) {
                $this->load->library('cloudinarylib');

                $randName = 'p_'.mt_rand(100000,999999);
                $fileDate = date("YmdHis");
                $ext = pathinfo($sourceName, PATHINFO_EXTENSION);
                $newFileName = $randName.'_'.$fileDate.'.'.$ext;
                $thumbnail_size = $this->config->item("thumbnail_size");
                // print_r($newFileName);

                if(file_exists("public/images/".$sourceName)){
                    rename("public/images/".$sourceName, "public/images/".$newFileName);

                    $source_image = "public/images/".$newFileName;

                    $imageupload = \Cloudinary\Uploader::upload(base_url($source_image),
                        array( 
                            "eager" => array(
                                array("width" => 358, "height" => 250, "crop" => "pad")
                                ),
                            "tags" => array('trip'),
                            "public_id" => str_replace('.'.$ext, "", $newFileName)
                        )
                    );

                    $image = cloudinary_url($imageupload['public_id'].'.'.$imageupload['format'], 
                        array(
                            "transformation"=>array(
                              array("gravity"=>"custom", "height"=>250, "width"=>250, "crop"=>"lfill")
                        )
                        )
                    );

                    $result = array('image' => $image
                    , 'imageupload' => $imageupload);
                     
                    // print_r(json_encode($imageupload['public_id'].'.'.$imageupload['format']));
                    $photo = $imageupload['public_id'].'.'.$imageupload['format'];
                   
                    $data= $imageupload['public_id'].'.png';
                    return $data;

                }
            }
        }

    function tampil_order_post(){
        $alias = $this->input->post('alias');

        if ($alias == '') {
            $this->response(array('Status' => 'Forbidden', 403));
        }else {
            $tripcat = $this->M_api->get_order($alias);
            $data['tampil_order'] = $tripcat;
        }
        $this->response($data, 200);

    }


    function sms_post(){
        $url = "http://103.16.199.187/masking/send_post.php";
            $hp = $this->input->post('hp');
            $alias = $this->input->post('alias');
            $kode = rand(11111,99999);
            $data = array('code_verify' => $kode);
            $this->db->where('alias',$alias);
            $update = $this->db->update('users',$data);
            $rows = array (
            'username' => 'jaotour_travel',
            'password' => '123456789',
            'hp' => $hp,
            'message' => 'kode verifikasi anda adalah '.$kode
            );
                $curl = curl_init();
                curl_setopt( $curl, CURLOPT_URL, $url );
                curl_setopt( $curl, CURLOPT_POST, TRUE );
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query($rows) );
                curl_setopt( $curl, CURLOPT_HEADER, FALSE );
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        $htm = curl_exec($curl);
        if(curl_errno($curl) !== 0) {
        error_log('cURL error when connecting to ' . $url . ': ' . curl_error($curl));
        }
        curl_close($curl);

        print_r($htm);
        
        }

        function sms_regis_post($phone_number,$kode){
        $url = "http://103.16.199.187/masking/send_post.php";
            $data = array('code_verify' => $kode);
            $rows = array (
            'username' => 'jaotour_travel',
            'password' => '123456789',
            'hp' => $phone_number,
            'message' => 'kode verifikasi anda adalah '.$kode
            );
                $curl = curl_init();
                curl_setopt( $curl, CURLOPT_URL, $url );
                curl_setopt( $curl, CURLOPT_POST, TRUE );
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query($rows) );
                curl_setopt( $curl, CURLOPT_HEADER, FALSE );
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        $htm = curl_exec($curl);
        if(curl_errno($curl) !== 0) {
        error_log('cURL error when connecting to ' . $url . ': ' . curl_error($curl));
        }
        curl_close($curl);
        
        }


        function verify_sms_post(){
            $alias = $this->input->post('alias');
            $kode = $this->input->post('kode');
            $trip = $this->M_api->verify($alias,$kode);

            if ($trip) {
                $this->response('berhasil');
                $data['phone_verified'] = 1;
                $this->db->where('alias',$alias);
                $this->db->update('users',$data);
            }
            else{
                $this->response('gagal');
            }
        }



   //      function registar_post(){
   //      $kode = rand(11111,99999);
   //      $email = $this->input->post('email');
   //      $first_name = $this->input->post("first_name");
   //      $cek_email = $this->M_api->cek_email($email);
   //      $phone_number=$this->input->post('phone_number');
   //      if ($cek_email) {
   //          $dat['regis']=array();
   //           $this->response($dat, 200);
   //      }else{

   //      $data= array(
   //                  'first_name'   => $first_name,
   //                  'last_name'   => $this->input->post('last_name'),
   //                  'email'   => $email,
   //                  'password'   => md5($this->input->post('password')),
   //                  'phone_number'   => $phone_number,
   //                  'image_path '=> $this->upload_data_post('foto'),
   //                  'id_card_path'=> $this->upload_data_post('ktp'),
   //                  'code_verify' => $kode,
   //                  'alias'  => sha1($this->input->post("first_name").$this->input->post('last_name').$this->input->post('email')),

   //              );
   //      $insert = $this->db->insert('users',$data);
   //      $datas['regis']=$data;
   //      if($insert){
   //              $this->response($datas, 200);
   //              $this->sms_regis_post($phone_number,$kode);
                
   //      }else{
   //              $this->response($dat, 200);
   //      }

   // }
   //  }

    function list_order_post(){
        $username = $this->input->post('username');
        $a = $this->M_api->list_order($username);
        $data['list_order'] = $a;
        $this->response($data, 200);
    }


    function listapprove_post(){
        $invoice_id = $this->input->post('invoice_id');
        $bookingstatus = $this->input->post('bookingstatus');
        $data = array('booking_status' => $bookingstatus);

        $this->db->where('invoice_id',$invoice_id);
        $update = $this->db->update('invoice',$data);
        if ($update) {
            $datas['listapprove'] = $data;
            $this->response($datas);

        }else{
            $this->response(array('Status' => 'Forbidden', 403));
        }
    }


    function view_detail_post(){
        
    }


    function updateLatLong_post(){
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $alias = $this->input->post('alias');
        $data = array('latitude' => $latitude,
                        'longitude' => $longitude);

        $this->db->where('alias',$alias);
        $update = $this->db->update('users',$data);
        if ($update) {
            $profile = $this->M_api->get_profile($alias);
            $datas['login'] = $profile;
            $this->response($datas, 200);

        }else{
            $this->response(array('Status' => 'Forbidden', 403));
        }

    }

}


 ?>