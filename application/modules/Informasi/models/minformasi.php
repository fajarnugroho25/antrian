<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class minformasi extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
 
 ///////////////////////////////////////////////////////////////   LAPORAN DETIL /////////////////////////////////////////////////////////////////      


function addinformasi($data){
    $this->db->insert('informasi',$data);
   }


   function tamp_informasi(){
        $query = "SELECT * FROM informasi 
                    WHERE status = '1' ";

        $result = $this->db->query($query);
        return $result->result_array();

    }




   
}
