<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mfisio extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }


    function tampilkan_pasien()
    {

        $this->db->select('*');
        $this->db->from('antrian_fisio');
        $this->db->join('poliklinik', 'poliklinik.id_poli = antrian_fisio.poliklinik', 'left');
        $this->db->join('penanggung', 'penanggung.id_penanggung = antrian_fisio.penanggung', 'left');
        $this->db->where('antrian_fisio.status !=', '9');
        $this->db->order_by("antrian_fisio.tgl_periksa", "desc");
        $this->db->limit(2000);
        $query = $this->db->get();
        return $query->result();
    }

    function no_fisio()
    {

        $this->db->select('substring(max(antrian_fisio.id_fisio), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('antrian_fisio');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(antrian_fisio.id_fisio),4) as id_fisio ', false);
            $this->db->limit(1);
            $this->db->where('substring(antrian_fisio.id_fisio,4,4) =' . $bln_now . '');
            $query = $this->db->get('antrian_fisio');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_fisio = intval($data->id_fisio) + 1;
            } else {
                $id_fisio = 1;
            }
            $kodemax = str_pad($id_fisio, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "FS" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(antrian_fisio.id_fisio),4) as id_fisio ', false);
        $this->db->limit(1);
        $this->db->where('substring(antrian_fisio.id_fisio,4,4) =' . $bln_now . '');
        $query = $this->db->get('antrian_fisio');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_fisio = intval($data->id_fisio) + 1;
        } else {
            $id_fisio = 1;
        }
        $kodemax = str_pad($id_fisio, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "FS" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function combo_poli()
    {
        $query = "select * from poliklinik where status = '2'";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_dokter()
    {
        $query = "select * from dokter where status_dokter='FIS' order by nama_dokter ";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_penanggung()
    {
        $query = "select * from penanggung";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function simpan($id_fisio, $no_rm, $nama_pasien, $tgl_daftar, $tgl_periksa, $penanggung, $poliklinik, $dokter, $shift, $status,  $user)
    {

        $data = array(
            'id_fisio' => $id_fisio,
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'tgl_daftar' => $tgl_daftar,
            'tgl_periksa' => $tgl_periksa,
            'penanggung' => $penanggung,
            'poliklinik' => $poliklinik,
            'dokter' => $dokter,
            'shift' => $shift,
            'status' => $status,
            'user' => $user
        );


        $query = $this->db->insert('antrian_fisio', $data);

        return $query;
    }


    function get_by_id($id_fisio)
    {
        $this->db->where('id_fisio', $id_fisio);
        $query = $this->db->get('antrian_fisio');
        return $query->result();
    }

    function perbarui($no_rm, $nama_pasien, $tgl_periksa, $penanggung, $poliklinik, $dokter, $shift, $status, $user, $id_fisio)
    {

        $data = array(
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'tgl_periksa' => $tgl_periksa,
            'penanggung' => $penanggung,
            'poliklinik' => $poliklinik,
            'dokter' => $dokter,
            'shift' => $shift,
            'status' => $status,
            'user' => $user

        );
        $this->db->where('id_fisio', $id_fisio);
        return $this->db->update('antrian_fisio', $data);
    }

    function tampilkan_laporan($tgl_periksa, $penanggung, $poliklinik, $shift)
    {

        $data = array(
            'tgl_periksa' => $tgl_periksa,
            'penanggung' => $penanggung,
            'poliklinik' => $poliklinik,
            'shift' => $shift

        );


        $my_query = "select * from antrian_fisio 
                left join penanggung on penanggung.id_penanggung = antrian_fisio.penanggung
                left join poliklinik on poliklinik.id_poli = antrian_fisio.poliklinik
                left join dokter on dokter.id = antrian_fisio.dokter
                where 

               

                (penanggung= '" . $penanggung . "' or '" . $penanggung . "' = 'ALL' ) and 
                (poliklinik= '" . $poliklinik . "' or '" . $poliklinik . "' = 'ALL' ) and 
                (shift= '" . $shift . "' or '" . $shift . "' = 'ALL' ) and 
               
               
                tgl_periksa = '" . $tgl_periksa . "' 
                ";




        $query_sort = "order by tgl_daftar,id_fisio asc";



        $query_jadi = $my_query . $query_sort;

        $query = $this->db->query($query_jadi);
        return $query->result();
    }

    function hapus($id_fisio)
    {
        $this->db->where('id_fisio', $id_fisio);
        $query = $this->db->delete('antrian_fisio');
        return $query;
    }
}

