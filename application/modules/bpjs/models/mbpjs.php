<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbpjs extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function tampilkan(){
        
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT * FROM regpatient  WHERE no_reg = '2302070189' ";
        $q = $otherdb->query($query);
        return $q->result();
        
    }
}