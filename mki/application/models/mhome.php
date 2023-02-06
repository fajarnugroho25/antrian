<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mhome extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   
   function insertKonten($data){
    $this->db->insert('konten',$data);
   }


   function getdata(){
        $query = "SELECT *,u.user as name,k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user";
        $result = $this->db->query($query);
        return $result->result_array();

    }

   
}
