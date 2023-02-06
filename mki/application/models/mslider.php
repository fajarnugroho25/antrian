<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mslider extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   
   function insertSlider($data){
    $this->db->insert('slider',$data);
   }

   function getdata(){
        $query = "SELECT *,s.status as stat FROM slider s
        JOIN user u ON u.id = s.id_user";
        $result = $this->db->query($query);
        return $result->result_array();

    }

           // update line topik aktiv
    function updateaktiv($data){
      $this->db->where('slider_id', $data);
      $this->db->set('status', '1');
      $this->db->update('slider');
  }
  // update line topik aktiv


  // update line topik passive
    function updatepasive($data){
      $this->db->where('slider_id', $data);
      $this->db->set('status', '0');
      $this->db->update('slider');
  }


    function drop($id){
      $this->db->where('slider_id',$id);
      $this->db->delete('slider');
    }


  
    }

   

