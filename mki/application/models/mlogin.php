<?php if (!defined('BASEPATH')) exit ('no direct script access allowed');

class mlogin extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
        
    }
    
    
    function login($username, $password){
   
    //$this->db->where('user', $username);
    //$this->db->where('pass', $password); 
    $this->db->where('user', $username);
    $this->db->where('pass', $password); 
    $this->db->where('status', '1'); 
  
    $this->db->limit(1);
    $query = $this->db->get('user');
    return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
    
     
}