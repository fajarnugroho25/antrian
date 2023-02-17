<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class moperasi extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($nama_operasi, $id){   
    $data = array(
        'nama_operasi'=>$nama_operasi,
        'id'=>$id
       
    );    
    $query = $this->db->insert('operasi', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('operasi');
        return $query->result();    
        
    }
    
    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('operasi');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('operasi');
        return $query;
    }
    
 
     function code_otomatis(){
            $this->db->select('Right(operasi.id,5) as id ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('operasi');
            if($query->num_rows()<>0){
                $data = $query->row();
                $id = intval($data->id)+1;
            }else{
                $id = 1;

            }
            $kodemax = str_pad($id,5,"0",STR_PAD_LEFT);
            $kodejadi  = "OP".$kodemax;
            return $kodejadi;

    }

   function perbarui($nama_operasi, $id){   
    $data = array(
        'nama_operasi'=>$nama_operasi
       
    );    
        $this->db->where('id', $id);
        return $this->db->update('operasi', $data); 
    
    }
    
    
   
}
