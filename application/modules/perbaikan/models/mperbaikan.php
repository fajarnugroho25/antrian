<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mperbaikan extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }


    function tampilkan_perbaikan()
    {

        $this->db->select('*, perbaikan.status as stat_perb');
        $this->db->from('perbaikan');
        $this->db->join('unit', 'unit.unit_id = perbaikan.unit_id', 'left');
        $this->db->join('jenis_perbaikan', 'jenis_perbaikan.id_jenis = perbaikan.id_jenis', 'left');
        $this->db->join('prioritas', 'prioritas.id = perbaikan.prioritas', 'left');

        // $this->db->where('antrian_fisio.status !=', '9');
        $this->db->order_by("perbaikan.prioritas", "perbaikan.id_perbaikan", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    function no_perbaikan()
    {

        $this->db->select('substring(max(perbaikan.id_perbaikan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('perbaikan');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(perbaikan.id_perbaikan),4) as id_perbaikan ', false);
            $this->db->limit(1);
            $this->db->where('substring(perbaikan.id_perbaikan,4,4) =' . $bln_now . '');
            $query = $this->db->get('perbaikan');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_perbaikan = intval($data->id_perbaikan) + 1;
            } else {
                $id_perbaikan = 1;
            }
            $kodemax = str_pad($id_perbaikan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "PB" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(perbaikan.id_perbaikan),4) as id_perbaikan ', false);
        $this->db->limit(1);
        $this->db->where('substring(perbaikan.id_perbaikan,4,4) =' . $bln_now . '');
        $query = $this->db->get('perbaikan');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_perbaikan = intval($data->id_perbaikan) + 1;
        } else {
            $id_perbaikan = 1;
        }
        $kodemax = str_pad($id_perbaikan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "PB" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }



    function simpan($id_perbaikan, $tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status)
    {

        $data = array(
            'id_perbaikan' => $id_perbaikan,
            'tgl_input' => $tgl_input,
            'unit_id' => $unit_id,
            'user_peminta' => $user_peminta,
            'keluhan' => $keluhan,
            'prioritas' => $prioritas,
            'id_jenis' => $id_jenis,
            'status' => $status

        );


        $query = $this->db->insert('perbaikan', $data);

        return $query;
    }


    function get_by_id($id_perbaikan)
    {
        $this->db->where('id_perbaikan', $id_perbaikan);
        $query = $this->db->get('perbaikan');
        return $query->result();
    }

    function perbarui($tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status,  $id_perbaikan)
    {

        $data = array(
            'tgl_input' => $tgl_input,
            'unit_id' => $unit_id,
            'user_peminta' => $user_peminta,
            'keluhan' => $keluhan,
            'prioritas' => $prioritas,
            'id_jenis' => $id_jenis,
            'status' => $status,



        );
        $this->db->where('id_perbaikan', $id_perbaikan);
        return $this->db->update('perbaikan', $data);
    }



    function combo_unit()
    {
        $query = "select * from unit";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_prioritas()
    {
        $query = "select * from prioritas";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_jenis()
    {
        $query = "select * from jenis_perbaikan";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function hapus($id_perbaikan)
    {
        $this->db->where('id_perbaikan', $id_perbaikan);
        $query = $this->db->delete('perbaikan');
        return $query;
    }

    function tampilkan_laporan($tgl_1, $tgl_2, $jenis)
    {

        $data = array(
            'tgl_1' => $tgl_1,
            'tgl_2' => $tgl_2,
            'jenis' => $jenis
            

        );


        $my_query = "select * from perbaikan 
                left join unit on unit.unit_id = perbaikan.unit_id
                left join prioritas on prioritas.id=perbaikan.prioritas
                
                
                where     
                tgl_input between '" . $tgl_1 . "'  and  '" . $tgl_2 . " 23:59'
                and (id_jenis='".$jenis."' or '".$jenis."'='ALL') order by id_perbaikan

              
                ";



        $query_jadi = $my_query ;

        $query = $this->db->query($query_jadi);
        return $query->result();
    }
}
