<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbpjs extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function tampilkan(){
        $query = $this->db->get('bpjs');
        return $query->result();    
        
    }
}