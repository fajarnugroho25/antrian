<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class msekretariat extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {

        $this->db->select('*');
        $this->db->from('sekretariat');
        $query = $this->db->get();
        return $query->result();
    }

    public function input($data,$tabel)
    {
        $input = $this->db->insert($tabel,$data);
        return $input;
    }
     function pengajuan()
    {
        $this->db->select('surat.*, sekretariat.nama_bagian');
        $this->db->from('surat');
        $this->db->order_by('data_date', 'DESC');
        $this->db->join('sekretariat', 'sekretariat.kode_bagian = surat.kode_bagian');
        $query = $this->db->get();
        return $query->result();
    }



    public function surat($where){
        $this->db->where($where);
        return $this->db->get('surat');
    }
    public function detailsurat($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }


    function pengajuaninternal()
    {
        $this->db->select('suratinternal.*, sekretariat.nama_bagian');
        $this->db->from('suratinternal');
        $this->db->order_by('data_date', 'DESC');
        $this->db->join('sekretariat', 'sekretariat.kode_bagian = suratinternal.kode_bagian');
        $query = $this->db->get();
        return $query->result();
    }

    public function suratinternal($where){
        $this->db->where($where);
        return $this->db->get('suratinternal');
    }

    function pengajuanmasuk()
    {
        $this->db->select('suratmasuk.*');
        $this->db->from('suratmasuk');
        $this->db->order_by('nomor', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function suratmasuk($where){
        $this->db->where($where);
        return $this->db->get('suratmasuk');
    }
}


