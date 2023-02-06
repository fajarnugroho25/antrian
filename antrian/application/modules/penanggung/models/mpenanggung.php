<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mpenanggung extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($nama_penanggung, $id_penanggung){   
    $data = array(
        'nama_penanggung'=>$nama_penanggung,
        'id_penanggung'=>$id_penanggung
       
    );    
    $query = $this->db->insert('penanggung', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('penanggung');
        return $query->result();    
        
    }
    
    function get_by_id($id_penanggung){
        $this->db->where('id_penanggung', $id_penanggung);
        $query = $this->db->get('penanggung');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id_penanggung', $id_penanggung);
        $query = $this->db->delete('penanggung');
        return $query;
    }
    
 
     function code_otomatis(){
            $this->db->select('Right(id_penanggung,3) as id_penanggung ',false);
            $this->db->order_by('id_penanggung', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('penanggung');
            if($query->num_rows()<>0){
                $data = $query->row();
                $id_penanggung = intval($data->id_penanggung)+1;
            }else{
                $id_penanggung = 1;

            }
            $kodemax = str_pad($id_penanggung,3,"0",STR_PAD_LEFT);
            $kodejadi  = "PN".$kodemax;
            return $kodejadi;

    }

   function perbarui($nama_penanggung, $id_penanggung){   
    $data = array(
        'nama_penanggung'=>$nama_penanggung
       
    );    
        $this->db->where('id_penanggung', $id_penanggung);
        return $this->db->update('penanggung', $data); 
    
    }
    
    
   
}
