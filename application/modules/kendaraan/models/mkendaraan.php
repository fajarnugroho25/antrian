<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mkendaraan extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {

        $this->db->select('*,kendaraan.status as stat_kend');
        $this->db->from('kendaraan');
        $this->db->join('unit', 'unit.unit_id = kendaraan.unit_id', 'left');
        $this->db->where('kendaraan.status !=', '9');
        $query = $this->db->get();
        return $query->result();
    }


    function tampilkanrequest()
    {

        $this->db->select('*,kendaraan.status as stat_kend');
        $this->db->from('kendaraan');
        $this->db->join('unit', 'unit.unit_id = kendaraan.unit_id', 'left');
        $this->db->where('kendaraan.status =', '0');

        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanditerima()
    {

        $this->db->select('*,kendaraan.status as stat_kend');
        $this->db->from('kendaraan');
        $this->db->join('unit', 'unit.unit_id = kendaraan.unit_id', 'left');
        $this->db->where('kendaraan.status =', '2');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanselesai()
    {

        $this->db->select('*,kendaraan.status as stat_kend');
        $this->db->from('kendaraan');
        $this->db->join('unit', 'unit.unit_id = kendaraan.unit_id', 'left');
        $this->db->where('kendaraan.status =', '1');
        $query = $this->db->get();
        return $query->result();
    }



    function simpan($id_permintaan, $waktu_diminta, $tujuan, $keperluan, $tgl_input, $keterangan, $user_peminta, $unit_id, $status)
    {

        $data = array(
            'id_permintaan' => $id_permintaan,
            'waktu_diminta' => $waktu_diminta,
            'tujuan' => $tujuan,
            'keperluan' => $keperluan,
            'tgl_input' => $tgl_input,
            'keterangan' => $keterangan,
            'user_peminta' => $user_peminta,
            'unit_id' => $unit_id,
            'status' => $status
        );


        $query = $this->db->insert('kendaraan', $data);

        return $query;
    }

    function verif($waktu_verif, $user_verif, $petugas, $keterangan, $status, $id_permintaan)
    {

        $data = array(
            'waktu_verif' => $waktu_verif,
            'user_verif' => $user_verif,
            'petugas' => $petugas,
            'keterangan' => $keterangan,
            'status' => $status,
            'id_permintaan' => $id_permintaan

        );
        $this->db->where('id_permintaan', $id_permintaan);
        return $this->db->update('kendaraan', $data);
    }

    function perbarui($waktu_diminta, $tujuan, $keperluan, $tgl_input, $keterangan, $user_peminta, $unit_id, $status, $id_permintaan)
    {

        $data = array(
            'waktu_diminta' => $waktu_diminta,
            'tujuan' => $tujuan,
            'keperluan' => $keperluan,
            'tgl_input' => $tgl_input,
            'keterangan' => $keterangan,
            'user_peminta' => $user_peminta,
            'unit_id' => $unit_id,
            'status' => $status

        );
        $this->db->where('id_permintaan', $id_permintaan);
        return $this->db->update('kendaraan', $data);
    }

    function get_by_id($id_permintaan)
    {
        $this->db->where('id_permintaan', $id_permintaan);
        $query = $this->db->get('kendaraan');
        return $query->result();
    }

    function no_trans_kendaraan()
    {

        $this->db->select('substring(max(kendaraan.id_permintaan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('kendaraan');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(kendaraan.id_permintaan),4) as id_permintaan ', false);
            $this->db->limit(1);
            $this->db->where('substring(kendaraan.id_permintaan,4,4) =' . $bln_now . '');
            $query = $this->db->get('kendaraan');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_permintaan = intval($data->id_permintaan) + 1;
            } else {
                $id_permintaan = 1;
            }
            $kodemax = str_pad($id_permintaan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "PK" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(kendaraan.id_permintaan),4) as id_permintaan ', false);
        $this->db->limit(1);
        $this->db->where('substring(kendaraan.id_permintaan,4,4) =' . $bln_now . '');
        $query = $this->db->get('kendaraan');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_permintaan = intval($data->id_permintaan) + 1;
        } else {
            $id_permintaan = 1;
        }
        $kodemax = str_pad($id_permintaan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "PK" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function combo_unit()
    {
        $query = "select * from unit order by unit_nama asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function combo_petugas()
    {
        $query = "select * from admin where unit_id='027' ";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

