<?php if (!defined('BASEPATH')) exit ('no direct script access allowed');

class mlogin extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
        
    }
    
    
    function login($username, $password){
    $this->db->select('admin.user,dokter.nama_dokter as nama_dokter,pass,akses,unit_id,unituser,nama, admin.id,dokter.id as id_dokter,akses_item, admin_status,status,unit_id,ttd,status_perizinan,gudang_id,nik,personauto,kprs, admin_ruang, tglawalcb, maccess');
    $this->db->from('admin');
    $this->db->join('dokter', 'dokter.user = admin.user', 'left');  
    $this->db->where('admin.user', $username);
    $this->db->where('pass', $password); 
    $this->db->where('status', '1'); 
    $this->db->limit(1);     
        $query = $this->db->get(); 
       return ($query->num_rows() > 0) ? $query->row() : FALSE;


   
  
    
    //$query = $this->db->get('admin');
    //return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
    
     
}