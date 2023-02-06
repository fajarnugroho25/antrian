<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mform extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {

        $this->db->select('*, laporaninsiden.status as stat');
        $this->db->from('laporaninsiden');
        $this->db->join('jenis_insiden', 'laporaninsiden.jenis_insiden = jenis_insiden.id_jenis', 'left');
        $this->db->join('unit', 'laporaninsiden.unit_utama = unit.unit_id','left');
        $query = $this->db->get();
        return $query->result();
    }