<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mcutidokter extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

  function tampilkan(){
    
    $this->db->select('*') ;
    $this->db->from('daftar_dokter');
    // $this->db->join('daftar_dokter', 'daftar_dokter.id_dokter = poli_dokter.id_dokter', 'left');
    // $this->db->join('daftar_poli', 'daftar_poli.id_poli = poli_dokter.id_poli', 'left');
    
   
    $this->db->order_by('nama_dokter','DESC');

    $query = $this->db->get();
    return $query->result();


    }

 function get_by_id($id){

    $this->db->select('*') ;
    $this->db->from('daftar_dokter');   
    $this->db->where('id_dokter', $id);

    $query = $this->db->get();
    return $query->result();

       
        
    }

  function perbaruicuti($cuti_awal, $cuti_akhir, $id){   
    $data = array(
        'cuti_awal'=>$cuti_awal,  
        'cuti_akhir'=>$cuti_akhir            
                );    
        $this->db->where('id_dokter', $id);
        return $this->db->update('daftar_dokter', $data); 
    
    }
}

