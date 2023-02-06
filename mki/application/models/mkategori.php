<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mkategori extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   
   function insertKategori($data){
    $this->db->insert('kategori',$data);
   }


   function getdata(){
        $query = "SELECT * FROM kategori";
        $result = $this->db->query($query);
        return $result->result_array();

    }


        // update line topik aktiv
    function updateaktiv($data){
      $this->db->where('id_kategori', $data);
      $this->db->set('status', '1');
      $this->db->update('kategori');
  }
  // update line topik aktiv


  // update line topik passive
    function updatepasive($data){
      $this->db->where('id_kategori', $data);
      $this->db->set('status', '0');
      $this->db->update('kategori');
  }

  function drop($id){
    $this->db->where('id_kategori',$id);
    $this->db->delete('kategori');
    }


    function updateall($id,$data){
      $this->db->where('id_kategori',$id);
    $this->db->update('kategori',$data);

    }


    public function sckategori()
    {
      $this->db->select('id_kategori,nama_kategori');
      $this->db->from('kategori');
      $this->db->where('status','1');
                // $this->db->where('status',1);
    $query = $this->db->get();
    return $query->result_array();
    }

   
}
