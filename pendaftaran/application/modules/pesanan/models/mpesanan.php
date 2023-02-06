<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mpesanan extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

  function tampilkan(){
    
    $this->db->select('*') ;
    $this->db->from('registrasi_periksa');
    $this->db->join('daftar_asuransi', 'daftar_asuransi.id_asuransi = registrasi_periksa.id_asuransi', 'left');
    $this->db->join('poli_dokter', 'poli_dokter.id_poli_dokter = registrasi_periksa.id_poli_dokter', 'left');
    $this->db->join('daftar_dokter', 'poli_dokter.id_dokter = daftar_dokter.id_dokter', 'left');
    $this->db->join('daftar_poli', 'poli_dokter.id_poli = daftar_poli.id_poli', 'left');     
    $this->db->where('keterangan ',NULL);
    $this->db->order_by('create_at','DESC');

    $query = $this->db->get();
    return $query->result();


    }

      function get_by_id($id){

    $this->db->select('*') ;
    $this->db->from('registrasi_periksa');
    $this->db->join('daftar_asuransi', 'daftar_asuransi.id_asuransi = registrasi_periksa.id_asuransi', 'left');
    $this->db->join('poli_dokter', 'poli_dokter.id_poli_dokter = registrasi_periksa.id_poli_dokter', 'left');
    $this->db->join('daftar_dokter', 'poli_dokter.id_dokter = daftar_dokter.id_dokter', 'left');
    $this->db->join('daftar_poli', 'poli_dokter.id_poli = daftar_poli.id_poli', 'left');     
    $this->db->where('id_registrasi_periksa', $id);

    $query = $this->db->get();
    return $query->result();

       
        
    }

    function persetujuan($status_persetujuan, $keterangan, $id){   
    $data = array(
        'status_persetujuan'=>$status_persetujuan,  
        'keterangan'=>$keterangan            
                );    
        $this->db->where('id_registrasi_periksa', $id);
        return $this->db->update('registrasi_periksa', $data); 
    
    }
    

}