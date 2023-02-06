<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class madmin extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($user, $pass, $admin_status, $status){
    $passw = sha1($pass);    
    $data = array(
        'user'=>$user,
        'pass'=>$passw,
        'admin_status'=>$admin_status,
        'status'=>$status
    );    
    $query = $this->db->insert('admin', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('admin');
        return $query->result();    
        
    }
    
    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('admin');
        return $query;
    }
    
    
    function perbarui($id, $user, $pass , $admin_status, $status){
    $password =  sha1($pass);
     $data = array(
        'user'=>$user,
        'pass'=>$password,
        'admin_status'=>$admin_status,
        'status'=>$status

    );      
        $this->db->where('id', $id);
        return $this->db->update('admin', $data); 
    
    }
    
    
}
