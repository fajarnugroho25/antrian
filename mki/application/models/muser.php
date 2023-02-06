<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class muser extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   
   function insertUser($data){
    $this->db->insert('user',$data);
   }

   function updateall($id,$data){
    $this->db->where('id',$id);
    $this->db->update('user',$data);
   }


   function getdata(){
      $query = "SELECT * FROM user order by user asc";
      $result = $this->db->query($query);
      return $result->result_array();

    }

           // update line topik aktiv
    function updateaktiv($data){
      $this->db->where('id', $data);
      $this->db->set('status', '1');
      $this->db->update('user');
  }
  // update line topik aktiv


  // update line topik passive
    function updatepasive($data){
      $this->db->where('id', $data);
      $this->db->set('status', '0');
      $this->db->update('user');
  }


  function drop($id){
    $this->db->where('id',$id);
    $this->db->delete('user');
    }


 



    

   
}
