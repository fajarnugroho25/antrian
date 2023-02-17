<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mdpjp extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($nama_dokter, $id){   
    $data = array(
        'nama_dokter'=>$nama_dokter,
        'id'=>$id
       
    );    
    $query = $this->db->insert('dokter', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('dokter');
        return $query->result();    
        
    }
    
    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('dokter');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('dokter');
        return $query;
    }
    
 
     function code_otomatis(){
            $this->db->select('Right(dokter.id,5) as id ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('dokter');
            if($query->num_rows()<>0){
                $data = $query->row();
                $id = intval($data->id)+1;
            }else{
                $id = 1;

            }
            $kodemax = str_pad($id,5,"0",STR_PAD_LEFT);
            $kodejadi  = "DOK".$kodemax;
            return $kodejadi;

    }

   function perbarui($nama_dokter, $id){   
    $data = array(
        'nama_dokter'=>$nama_dokter
       
    );    
        $this->db->where('id', $id);
        return $this->db->update('dokter', $data); 
    
    }
    
    
   
}
