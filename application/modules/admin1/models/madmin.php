<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class madmin extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($user,$nama, $pass,  $unit_id,$gudang_id,$nik, $admin_status, $status){
    $passw = sha1($pass);    
    $data = array(
        'user'=>$user,
        'nama'=>$nama,
        'pass'=>$passw,
        
        'unit_id' => $unit_id,
        'gudang_id' =>$gudang_id,
        'nik' =>$nik,
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
    
    function get_by_idedit($id){
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        return $query->result();   
        
    }

    function get_by_id($id){
      $query = "SELECT a.*, GROUP_CONCAT(DISTINCT g.nama_gudang
        SEPARATOR ',') as ng FROM `admin` a
                INNER JOIN gudang g ON (CONCAT(',', a.gudang_id, ',') LIKE CONCAT('%,', g.gudang_id, ',%'))
                WHERE `id` = '{$id}'";

        $result = $this->db->query($query);
        return $result->result();   
        
    }


    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('admin');
        return $query;
    }
    
    
    function perbarui($id, $user,$nama, $pass ,$gudang_id, $admin_status, $status,$unitkary){
    if ($pass =='') {
    $data = array(
        'user'=>$user,
        'nama'=>$nama,
        // 'unit_id' => $unit_id,
        'gudang_id' =>$gudang_id,
        'admin_status'=>$admin_status,
        'status'=>$status,
        'unituser'=>$unitkary,

    );
    }
    else{
        $password1 =  sha1($pass);
    $data = array(
        'user'=>$user,
        'nama'=>$nama,
        'pass'=>$password1,
        'unit_id' => $unit_id,
        'gudang_id' =>$gudang_id,
        'admin_status'=>$admin_status,
        'status'=>$status

    );

    }
    

        $this->db->where('id', $id);
        return $this->db->update('admin', $data); 
    
    }


    function perbaruipass($id, $pass ){
    $password =  sha1($pass);
    $data = array(
        'pass'=>$password,

    );      
        $this->db->where('id', $id);
        return $this->db->update('admin', $data); 
    
    }
    

    function perbaruiakses($id, $user ,$akses, $akses_item){
   
     $data = array(
        'user'=>$user,        
        'akses'=>$akses,
        'akses_item'=>$akses_item
       

    );      
        $this->db->where('id', $id);
        return $this->db->update('admin', $data); 
    
    }

    function combo_unit()
    {
        $query = "select * from unit";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
    }

    function combo_gudang()
    {
        $query = "select * from gudang";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
    } 



   
    
}
