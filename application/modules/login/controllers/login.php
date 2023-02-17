<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('login/mlogin');
      $this->load->model('admin/madmin');
      $this->load->model('menu/mmenu');
    
   }

	public function index()
	{
            $data['error']='';
            // $this->load->view('underconstruction',$data);
             $this->load->view('vlogin',$data);
	}
        
         // Proses Login
    function masuk(){
    
    $user = $this->input->post('username');
    $pass = $this->input->post('password');
    $admin_status = $this->input->post('admin_status');
    
    // Cek Inputan Username dan Password
    if (empty($user) || empty($pass)) {
    $data['error']='Username atau Password Kosong!';
    $this->load->view('vlogin',$data);
    } else {
    $password = sha1($pass);    
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username 
    $data = array('user_name' => $result->user,'user_id' => $result->id, 'akses' => $result->akses,'akses_item' => $result->akses_item ,'kprs' => $result->kprs,'admin_ruang' => $result->admin_ruang , 'tglawalcb' => $result->tglawalcb, 'login' => TRUE);
    $this->session->set_userdata($data);
    $this->session->set_userdata('admin_status',$result->admin_status);
    $this->session->set_userdata('status_perizinan',$result->status_perizinan);
    $this->session->set_userdata('unit_id',$result->unit_id);
    $this->session->set_userdata('gudang',$result->gudang_id);
    $this->session->set_userdata('ttd',$result->ttd);
    $this->session->set_userdata('maccess',$result->maccess);
    $this->session->set_userdata('nama',$result->nama);
    $this->session->set_userdata('nama_dokter',$result->nama_dokter);
    $this->session->set_userdata('personauto',$result->personauto);
    $this->session->set_userdata('nik',$result->nik);
    $this->session->set_userdata('id_dokter',$result->id_dokter);
     $this->session->set_userdata('kprs',$result->kprs);
     $this->session->set_userdata('admin_ruang',$result->admin_ruang);
     $this->session->set_userdata('tglawalcb',$result->tglawalcb);
    echo $result->admin_status;
    
    redirect('home');
    
    } else {
    $password = sha1($pass);    
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username 
    $data = array('user_name' => $result->user, 'user_id' => $result->id, 'akses' => $result->akses,'akses_item' => $result->akses_item ,'kprs' => $result->kprs,'admin_ruang' => $result->admin_ruang, 'tglawalcb' => $result->tglawalcb,'login' => TRUE);
    $this->session->set_userdata($data);
    $this->session->set_userdata('admin_status',$result->admin_status);
    $this->session->set_userdata('unit_id',$result->unit_id);
    $this->session->set_userdata('nama',$result->nama);
    $this->session->set_userdata('kprs',$result->kprs);
    $this->session->set_userdata('admin_ruang',$result->admin_ruang);
    $this->session->set_userdata('tglawalcb',$result->tglawalcb);
    redirect('home');
    
    } else {
        //'Username atau Password Salah!'
    // $data['error']= $user . ''. $password;
        $data['error']= 'Username atau Password Salah!';
    $this->load->view('vlogin',$data);    
    }
    
    
    } // End Jika Pada Tabel User Tidak Ketemu
    } // End else Jika Inputan Valid
    } // End Fungsi

    // Logout
    function logout(){
    $array_items = array('tglawal', 'tglakhir','kelompok', 'unit' ,'unitm','kunik' );
    $this->session->unset_userdata($array_items);
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();  
    redirect('login');
    
    }

     public function editpassword()
    {
            
        if ($this->session->userdata('login') == TRUE  ){
            $data['menu_list']=$this->mmenu->tampilkan();  
            $data['submenu_list']=$this->mmenu->tampilkansub(); 
            $data['admin'] = $this->madmin->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/veditpassword',$data);
            $this->load->view('admin/vutama',$isi);
            } else { echo "<script>alert('Ups, Anda Tidak Punya Akses !!'); history.go(-1);</script>";  } 
    }
        
      
}
