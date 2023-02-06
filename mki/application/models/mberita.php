<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mberita extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   
   function insertKonten($data){
    $this->db->insert('konten',$data);
   }


   function getdata(){
        $query = "SELECT *,u.user as name,k.id as k_id,k.status as k_stat FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        order by k.id desc";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getberita($id){
      $this->db->where('id', $id);
      $query = $this->db->get('konten');
    if($query->row()){
      return $query->row();
    } else {
      return False;
    }
    }

    function getphoto($id){
      $query = "SELECT *, k.id as k_id FROM konten k 
        JOIN image i ON k.konten = i.uuim
        WHERE k.id = {$id} and k.status ='1'";
        $result = $this->db->query($query);
        return $result->result_array();
    }



     function getimage($id){
      $this->db->select('konten');
          $this->db->from('konten');
          $this->db->where('id', $id);
      $tampil=$this->db->get();
       if ($tampil->row()) {
          return $tampil->row();
    } else {
      return False;
    }

    }

    function getgambar($uuim){
      $this->db->select('nama_image,id_image');
          $this->db->from('image');
          $this->db->where('uuim', $uuim);
      $tampil=$this->db->get();
       return $tampil->result();
    }

    function updateall($id,$data){
      $this->db->where('id',$id);
      $this->db->update('konten',$data);
    }


    function updateimage($id_image,$data){
      $this->db->where('id_image',$id_image);
      $this->db->update('image',$data);
    }

        // update line topik aktiv
    function updateaktiv($data){
      $this->db->where('id', $data);
      $this->db->set('status', '1');
      $this->db->update('konten');
  }
  // update line topik aktiv


  // update line topik passive
    function updatepasive($data){
      $this->db->where('id', $data);
      $this->db->set('status', '0');
      $this->db->update('konten');
  }

  function drop_berita($id){
    $this->db->where('id',$id);
    $this->db->delete('konten');
    }


    function drop_image($uuim){
    $this->db->where('uuim',$uuim);
    $this->db->delete('image');
    }


    function getkonten($id){
      $this->db->select('konten');
          $this->db->from('konten');
          $this->db->where('id', $id);
      $tampil=$this->db->get();
       if ($tampil->row()) {
          return $tampil->row();
    } else {
      return False;
    }

    }


    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from('image');
        if($id){
            $this->db->where('id_image',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('timestamp','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insertImageAll($data = array()){
        $insert = $this->db->insert_batch('image',$data);
        return $insert?true:false;
    }

    public function getId()
    {
      $query = "SELECT id, judul FROM `konten` ORDER BY tgl_post DESC limit 1";
      $result = $this->db->query($query);
      return $result->row();
    }


    



   
}
 