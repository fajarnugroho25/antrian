<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class minsiden extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {
        $kprs=$this->session->kprs;
        if($kprs == 1){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit v ON v.unit_id = a.unit_utama OR v.unit_id = a.unit_terpajan OR v.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '1'
                    ORDER BY tgl_input ASC";
        }
        else if($kprs == 2){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit v ON v.unit_id = a.unit_utama OR v.unit_id = a.unit_terpajan OR v.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '1' OR a.k_insiden = '2' OR a.k_insiden = '4' OR a.k_insiden = '5'
                    ORDER BY tgl_input ASC";
        }
        else if($kprs == 3){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit w ON w.unit_id = a.unit_utama OR w.unit_id = a.unit_terpajan OR w.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    
                    ORDER BY tgl_input ASC";
        }
        else if($kprs == 4){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit t ON t.unit_id = a.unit_utama OR t.unit_id = a.unit_terpajan OR t.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    ORDER BY tgl_input ASC";
        }
         else if($kprs == 5){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit s ON s.unit_id = a.unit_utama OR s.unit_id = a.unit_terpajan OR s.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '1'
                    ORDER BY tgl_input ASC";
        }
         else if($kprs == 6){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit p ON p.unit_id = a.unit_utama OR p.unit_id = a.unit_terpajan OR p.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '2' OR a.k_insiden = '4' OR a.k_insiden = '5'
                    ORDER BY tgl_input ASC";
        }
        else if($kprs == 7){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit w ON w.unit_id = a.unit_utama OR w.unit_id = a.unit_terpajan OR w.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '1' OR a.k_insiden = '2' OR a.k_insiden = '4' OR a.k_insiden = '5'
                    ORDER BY tgl_input ASC";
        }
        else if($kprs == ''){
            $query = "SELECT *,a.status as stat  FROM laporaninsiden a 
                    LEFT JOIN jenis_insiden b  ON a.jenis_insiden = b.id_jenis
                    LEFT JOIN unit u ON u.unit_id = a.unit_utama
                    LEFT JOIN unit t ON t.unit_id = a.unit_utama OR t.unit_id = a.unit_terpajan OR t.unit_id = a.ruang
                    LEFT JOIN k_insiden k ON k.id_klasifikasi = a.k_insiden
                    WHERE a.k_insiden = '1' OR a.k_insiden = '2' OR a.k_insiden = '4' OR a.k_insiden = '5'
                    ORDER BY tgl_input ASC";
        }
        // $this->db->select('*, laporaninsiden.status as stat');
        // $this->db->from('laporaninsiden');
        // $this->db->order_by('tgl_input', 'DESC');
        // $this->db->join('jenis_insiden', 'laporaninsiden.jenis_insiden = jenis_insiden.id_jenis', 'left');
        // $this->db->join('unit', 'laporaninsiden.unit_utama = unit.unit_id','left');
        // $this->db->join('k_insiden', 'laporaninsiden.k_insiden = k_insiden.id_klasifikasi','left');

        $result = $this->db->query($query);
        return $result->result();
    }

    function tampil_laporan($tgl_awal,$tgl_akhir)
    {
        // $data = array(
        //     'tgl_awal' => $tgl_awal,
        //     'tgl_akhir' => $tgl_akhir
        // );

        $this->db->from('laporaninsiden as a');
        $this->db->join('jenis_insiden as b', 'b.id_jenis = a.jenis_insiden', 'left' );
        // $this->db->where('tgl_insiden >=',$tgl_awal);
        // $this->db->where('tgl_insiden <=',$tgl_akhir);
        $this->db->select('jenis, 
            sum(case grading when "Biru" then 1 else 0 end) as jum_biru, 
            sum(case grading when "Hijau" then 1 else 0 end) as jum_hijau, 
            sum(case grading when "Kuning" then 1 else 0 end) as jum_kuning, 
            sum(case grading when "Merah" then 1 else 0 end) as jum_merah');
        $this->db->group_by('b.jenis');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkan_laporank3($tgl_1, $tgl_2)
    {

        $data = array(
            'tgl_1' => $tgl_1,
            'tgl_2' => $tgl_2,          

        );


        $my_query = "SELECT `unit_nama`, 
        sum(case kejadian when '1' then 1 else 0 end) as kk, 
        sum(case kejadian when '2' then 1 else 0 end) as pak, 
        sum(case kejadian when '3' then 1 else 0 end) as kfv 

        FROM `laporank3` as `a` 
        LEFT JOIN `unit` as `b` ON `b`.`unit_id` = `a`.`tempat_kejadian` 
        where     
        a.tgl_kejadian between '" . $tgl_1 . "'  and  '" . $tgl_2 . " 23:59'
        Group By b.unit_id





        ";



        $query_jadi = $my_query ;

        $query = $this->db->query($query_jadi);
        return $query->result();
    }


    function tampilkank3()
    {

        $this->db->select('*, laporank3.status as stat');
        $this->db->from('laporank3');
        $this->db->join('kejadiank3', 'laporank3.kejadian = kejadiank3.id_kejadian', 'left');
        $this->db->join('unit', 'laporank3.tempat_kejadian = unit.unit_id','left');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanbudaya()
    {

        $this->db->select('*, laporanbudaya.status as stat');
        $this->db->from('laporanbudaya');
        $this->db->join('budayakeselamatan', 'laporanbudaya.kejadian = budayakeselamatan.id_kejadian', 'left');
        $this->db->join('unit', 'laporanbudaya.tempat_kejadian = unit.unit_id','left');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanpajananA()
    {

        $this->db->select('*, laporaninsiden.status as stat');
        $this->db->from('laporaninsiden');
        $this->db->join('unit', 'laporaninsiden.unit_terpajan = unit.unit_id','left');
        
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanpajananB()
    {

        $this->db->select('*, laporanpajananB.status as stat');
        $this->db->from('laporanpajananB');
        $this->db->join('unit', 'laporanpajananB.ruang = unit.unit_id','left');
        
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkan_laporanbudaya($tgl_1, $tgl_2)
    {

        $data = array(
            'tgl_1' => $tgl_1,
            'tgl_2' => $tgl_2,          

        );


        $my_query = "SELECT `unit_nama`, 
        sum(case kejadian when '1' then 1 else 0 end) as ptk, 
        sum(case kejadian when '2' then 1 else 0 end) as pd, 
        sum(case kejadian when '3' then 1 else 0 end) as pm,
        sum(case kejadian when '4' then 1 else 0 end) as ps 

        FROM `laporanbudaya` as `a` 
        LEFT JOIN `unit` as `b` ON `b`.`unit_id` = `a`.`tempat_kejadian` 
        where     
        a.tgl_kejadian between '" . $tgl_1 . "'  and  '" . $tgl_2 . " 23:59'
        Group By b.unit_id





        ";



        $query_jadi = $my_query ;

        $query = $this->db->query($query_jadi);
        return $query->result();
    }

    public function input($data,$tabel)
    {
        $input = $this->db->insert($tabel,$data);
        return $input;
    }

    function combo_penanggung()
    {
        $query = "select * from penanggung order by id_penanggung asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_unit()
    {
        $query = "select * from unit order by unit_id asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_umur()
    {
        $query = "select * from kelompokumur order by id_umur asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_insiden()
    {
        $query = "select * from k_insiden order by id_klasifikasi asc";
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
        $query = "select * from jenis_insiden order by id_jenis asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_pelapor()
    {
        $query = "select * from pelaporinsiden order by id_pelapor asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_spesialisasi()
    {
        $query = "select * from spesialisasi order by id_spesialisasi asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_pasien()
    {
        $query = "select * from jenis_pasien order by id_pasien asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_terjadi()
    {
        $query = "select * from insidenpada order by id asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_akibat()
    {
        $query = "select * from akibat_insiden order by id_akibat asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_tindakan()
    {
        $query = "select * from tindakanoleh order by id_tindakan asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_probabilitas()
    {
        $query = "select * from probabilitas order by id_probabilitas asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

     function combo_tipe()
    {
        $query = "select * from tipe_insiden order by id_tipe asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_kejadian()
    {
        $query = "select * from insiden_k3 order by id_k3 asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    
    function combo_budaya()
    {
        $query = "select * from budayakeselamatan order by id_kejadian asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    

    function get_by_id($id_insiden)
    {
        $this->db->where('id_insiden', $id_insiden);
        $query = $this->db->get('laporaninsiden');
        return $query->result();
    }

    function get_by_id2($id_laporan)
    {
        $this->db->where('id_laporan', $id_laporan);
        $query = $this->db->get('laporank3');
        return $query->result();
    }

    function get_by_id3($id_laporan)
    {
        $this->db->where('id_laporan', $id_laporan);
        $query = $this->db->get('laporanbudaya');
        return $query->result();
    }

    function get_by_id4($id_laporan)
    {
        $this->db->where('id_laporan', $id_laporan);
        $query = $this->db->get('laporanpajananA');
        return $query->result();
    }



    function cetak_insiden($id_insiden)
    {
        $this->db->select('*,a.unit_nama as unit_utama,b.unit_nama as unit_dulu,laporaninsiden.status as stat');
        $this->db->from('laporaninsiden');
        $this->db->join('jenis_insiden', 'laporaninsiden.jenis_insiden = jenis_insiden.id_jenis', 'left');
        $this->db->join('tipe_insiden', 'laporaninsiden.tipe_insiden = tipe_insiden.id_tipe', 'left');
        $this->db->join('insiden_k3', 'laporaninsiden.jenis_insiden = insiden_k3.id_k3', 'left');
        $this->db->join('unit a', 'laporaninsiden.unit_utama = a.unit_id','left');
        $this->db->join('unit b', 'laporaninsiden.unit_dulu = b.unit_id','left');
        $this->db->join('unit c', 'laporaninsiden.unit_terpajan = c.unit_id','left');
        $this->db->join('unit d', 'laporaninsiden.ruang = d.unit_id','left');
        $this->db->join('penanggung', 'laporaninsiden.penanggung = penanggung.id_penanggung','left');
        $this->db->join('kelompokumur', 'laporaninsiden.kelompok_umur = kelompokumur.id_umur','left');
        $this->db->join('k_insiden', 'laporaninsiden.k_insiden = k_insiden.id_klasifikasi','left');
        $this->db->join('pelaporinsiden', 'laporaninsiden.pelapor_insiden = pelaporinsiden.id_pelapor','left');
        $this->db->join('insidenpada', 'laporaninsiden.insiden_terjadi = insidenpada.id','left');
        $this->db->join('jenis_pasien', 'laporaninsiden.insiden_pasien = jenis_pasien.id_pasien','left');
        $this->db->join('spesialisasi', 'laporaninsiden.spesialisasi = spesialisasi.id_spesialisasi','left');
        $this->db->join('akibat_insiden', 'laporaninsiden.akibat_insiden = akibat_insiden.id_akibat','left');
        $this->db->join('tindakanoleh', 'laporaninsiden.tindakan_oleh = tindakanoleh.id_tindakan','left');
        $this->db->where('id_insiden', $id_insiden);
        $query = $this->db->get();
        return $query->result();

        
        

    }


    function cetak_k3($id_laporan)
    {
        $this->db->select('*,laporank3.status as stat');
        $this->db->from('laporank3');
        $this->db->join('kejadiank3', 'laporank3.kejadian = kejadiank3.id_kejadian', 'left');
        $this->db->join('unit', 'laporank3.tempat_kejadian = unit.unit_id','left');
        $this->db->where('id_laporan', $id_laporan);
        $query = $this->db->get();
        return $query->result();

    }

    function cetak_budaya($id_laporan)
    {
        $this->db->select('*,laporanbudaya.status as stat');
        $this->db->from('laporanbudaya');
        $this->db->join('budayakeselamatan', 'laporanbudaya.kejadian = budayakeselamatan.id_kejadian', 'left');
        $this->db->join('unit', 'laporanbudaya.tempat_kejadian = unit.unit_id','left');
        $this->db->where('id_laporan', $id_laporan);
        $query = $this->db->get();
        return $query->result();

    }

     function cetak_pajananA($id_insiden)
    {
        $this->db->select('*,a.unit_nama as unit_utama,b.unit_nama as unit_dulu,laporaninsiden.status as stat');
        $this->db->from('laporaninsiden');
        $this->db->join('jenis_insiden', 'laporaninsiden.jenis_insiden = jenis_insiden.id_jenis', 'left');
        $this->db->join('unit a', 'laporaninsiden.unit_utama = a.unit_id','left');
        $this->db->join('unit b', 'laporaninsiden.unit_dulu = b.unit_id','left');
        $this->db->join('penanggung', 'laporaninsiden.penanggung = penanggung.id_penanggung','left');
        $this->db->join('kelompokumur', 'laporaninsiden.kelompok_umur = kelompokumur.id_umur','left');
        $this->db->join('pelaporinsiden', 'laporaninsiden.pelapor_insiden = pelaporinsiden.id_pelapor','left');
        $this->db->join('insidenpada', 'laporaninsiden.insiden_terjadi = insidenpada.id','left');
        $this->db->join('jenis_pasien', 'laporaninsiden.insiden_pasien = jenis_pasien.id_pasien','left');
        $this->db->join('spesialisasi', 'laporaninsiden.spesialisasi = spesialisasi.id_spesialisasi','left');
        $this->db->join('akibat_insiden', 'laporaninsiden.akibat_insiden = akibat_insiden.id_akibat','left');
        $this->db->join('tindakanoleh', 'laporaninsiden.tindakan_oleh = tindakanoleh.id_tindakan','left');
        $this->db->where('id_insiden', $id_insiden);
        $query = $this->db->get();
        return $query->result();

        
        

    }


    function id_insiden()
    {

        $this->db->select('substring(max(laporaninsiden.id_insiden), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('laporaninsiden');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(laporaninsiden.id_insiden),4) as id_insiden ', false);
            $this->db->limit(1);
            $this->db->where('substring(laporaninsiden.id_insiden,4,4) =' . $bln_now . '');
            $query = $this->db->get('laporaninsiden');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_insiden = intval($data->id_insiden) + 1;
            } else {
                $id_insiden = 1;
            }
            $kodemax = str_pad($id_insiden, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "LI" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(laporaninsiden.id_insiden),4) as id_insiden ', false);
        $this->db->limit(1);
        $this->db->where('substring(laporaninsiden.id_insiden,4,4) =' . $bln_now . '');
        $query = $this->db->get('laporaninsiden');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_insiden = intval($data->id_insiden) + 1;
        } else {
            $id_insiden = 1;
        }
        $kodemax = str_pad($id_insiden, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "LI" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }


    function id_laporan()
    {

        $this->db->select('substring(max(laporank3.id_laporan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('laporank3');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(laporank3.id_laporan),4) as id_laporan ', false);
            $this->db->limit(1);
            $this->db->where('substring(laporank3.id_laporan,4,4) =' . $bln_now . '');
            $query = $this->db->get('laporank3');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_laporan = intval($data->id_laporan) + 1;
            } else {
                $id_laporan = 1;
            }
            $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "LK" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(laporank3.id_laporan),4) as id_laporan ', false);
        $this->db->limit(1);
        $this->db->where('substring(laporank3.id_laporan,4,4) =' . $bln_now . '');
        $query = $this->db->get('laporank3');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_laporan = intval($data->id_laporan) + 1;
        } else {
            $id_laporan = 1;
        }
        $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "LK" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function id_budaya()
    {

        $this->db->select('substring(max(laporanbudaya.id_laporan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('laporanbudaya');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(laporanbudaya.id_laporan),4) as id_laporan ', false);
            $this->db->limit(1);
            $this->db->where('substring(laporanbudaya.id_laporan,4,4) =' . $bln_now . '');
            $query = $this->db->get('laporanbudaya');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_laporan = intval($data->id_laporan) + 1;
            } else {
                $id_laporan = 1;
            }
            $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "LB" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(laporanbudaya.id_laporan),4) as id_laporan ', false);
        $this->db->limit(1);
        $this->db->where('substring(laporanbudaya.id_laporan,4,4) =' . $bln_now . '');
        $query = $this->db->get('laporanbudaya');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_laporan = intval($data->id_laporan) + 1;
        } else {
            $id_laporan = 1;
        }
        $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "LB" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function id_pajanan()
    {

        $this->db->select('substring(max(laporanpajananA.id_laporan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('laporanpajananA');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(laporanpajananA.id_laporan),4) as id_laporan ', false);
            $this->db->limit(1);
            $this->db->where('substring(laporanpajananA.id_laporan,4,4) =' . $bln_now . '');
            $query = $this->db->get('laporanpajananA');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_laporan = intval($data->id_laporan) + 1;
            } else {
                $id_laporan = 1;
            }
            $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "LPA" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(laporanpajananA.id_laporan),4) as id_laporan ', false);
        $this->db->limit(1);
        $this->db->where('substring(laporanpajananA.id_laporan,4,4) =' . $bln_now . '');
        $query = $this->db->get('laporanpajananA');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_laporan = intval($data->id_laporan) + 1;
        } else {
            $id_laporan = 1;
        }
        $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "LPA" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function id_pajananB()
    {

        $this->db->select('substring(max(laporanpajananB.id_laporan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('laporanpajananB');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(laporanpajananB.id_laporan),4) as id_laporan ', false);
            $this->db->limit(1);
            $this->db->where('substring(laporanpajananB.id_laporan,4,4) =' . $bln_now . '');
            $query = $this->db->get('laporanpajananB');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_laporan = intval($data->id_laporan) + 1;
            } else {
                $id_laporan = 1;
            }
            $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "LPB" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(laporanpajananB.id_laporan),4) as id_laporan ', false);
        $this->db->limit(1);
        $this->db->where('substring(laporanpajananB.id_laporan,4,4) =' . $bln_now . '');
        $query = $this->db->get('laporanpajananB');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_laporan = intval($data->id_laporan) + 1;
        } else {
            $id_laporan = 1;
        }
        $kodemax = str_pad($id_laporan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "LPB" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }


    function simpan($id_insiden, $nama, $alamat1, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $k_insiden, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $jenis_insidenk3, $jenis_insidenbudaya, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian, $tindakanoleh, $unit_dulu, $langkahunit, $tgl_input, $tgl_pajanan, $tempat_kejadian, $unit_terpajan, $atasan, $alamat2, $addroute, $addsumber, $bagian_tubuh, $kronologi, $imunisasi, $pelindung, $jenis_pelindung, $pertolongan, $addjp, $tempat_pertolongan, $kotak, $perhatian, $ruang, $pemantauan, $tgl_pemberitahuan, $diagnosa, $tgl_terima, $status)
    {

        $data = array(
           'id_insiden' => $id_insiden,
           'nama' =>$nama, 
           'alamat1' => $alamat1,
           'no_rm' => $no_rm, 
           'ruangan' => $ruangan, 
           'umur' => $umur, 
           'kelompok_umur' => $kelompokumur, 
           'jenis_kelamin' => $jenis_kelamin, 
           'penanggung' => $penanggung, 
           'tgl_masuk' => $tgl_masuk, 
           'pembuat' => $pembuat,
           'k_insiden' => $k_insiden,
           'tgl_insiden' => $tgl_insiden, 
           'insiden' => $insiden, 
           'kronologis' => $kronologis, 
           'jenis_insiden' => $jenis_insiden,
           'jenis_insidenk3' => $jenis_insidenk3,
           'jenis_insidenbudaya' => $jenis_insidenbudaya, 
           'pelapor_insiden' => $pelapor_insiden, 
           'insiden_terjadi' => $insiden_terjadi, 
           'insiden_pasien' => $insiden_pasien, 
           'tempat_insiden' => $tempat_insiden, 
           'spesialisasi' => $spesialisasi, 
           'unit_utama' => $unit_utama, 
           'akibat_insiden' => $akibat_insiden, 
           'tindakankejadian' => $tindakankejadian, 
           'tindakan_oleh' => $tindakanoleh, 
           'unit_dulu' => $unit_dulu,
           'langkahunit' => $langkahunit,
           'tgl_input' => $tgl_input,
           'tgl_pajanan' => $tgl_pajanan,
           'tempat_kejadian' => $tempat_kejadian, 
           'unit_terpajan' => $unit_terpajan,
           'atasan' => $atasan,
           'alamat2' => $alamat2,
           'route' => $addroute,
           'sumber' => $addsumber,
           'bagian_tubuh' => $bagian_tubuh,
           'kronologi_pajanan' => $kronologi,
           'imunisasi' => $imunisasi,
           'pelindung' => $pelindung,
           'jenis_pelindung' => $jenis_pelindung,
           'pertolongan' => $pertolongan,
           'jenis_pertolongan' => $addjp,
           'tempat_pertolongan' => $tempat_pertolongan,
           'kotak' => $kotak,
           'perhatian' => $perhatian,
           'ruang' => $ruang,
           'pemantauan' => $pemantauan,
           'tgl_pemberitahuan' => $tgl_pemberitahuan,
           'diagnosa' => $diagnosa,
           'tgl_terima' => $tgl_terima,
           'status' => $status
     );


        $query = $this->db->insert('laporaninsiden', $data);

        return $query;
    }

    function perbarui($id_insiden, $nama_pasien, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian,$tindakanoleh, $unit_dulu, $langkahunit, $tgl_buat, $tgl_terima)
    {

        $data = array(
         'id_insiden' => $id_insiden,
         'nama_pasien' =>$nama_pasien, 
         'no_rm' => $no_rm, 
         'ruangan' => $ruangan, 
         'umur' => $umur, 
         'kelompok_umur' => $kelompokumur, 
         'jenis_kelamin' => $jenis_kelamin, 
         'penanggung' => $penanggung, 
         'tgl_masuk' => $tgl_masuk, 
         'pembuat' => $pembuat, 
         'tgl_insiden' => $tgl_insiden, 
         'insiden' => $insiden, 
         'kronologis' => $kronologis, 
         'jenis_insiden' => $jenis_insiden, 
         'pelapor_insiden' => $pelapor_insiden, 
         'insiden_terjadi' => $insiden_terjadi, 
         'insiden_pasien' => $insiden_pasien, 
         'tempat_insiden' => $tempat_insiden, 
         'spesialisasi' => $spesialisasi, 
         'unit_utama' => $unit_utama, 
         'akibat_insiden' => $akibat_insiden, 
         'tindakankejadian' => $tindakankejadian, 
         'tindakan_oleh' => $tindakanoleh, 
         'unit_dulu' => $unit_dulu,
         'langkahunit' => $langkahunit,
         'tgl_buat' => $tgl_buat,
         'tgl_terima' => $tgl_terima,

     );

        $this->db->where('id_insiden', $id_insiden);
        $query = $this->db->update('laporaninsiden', $data);

        return $query;
    }

    function verif($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $status, $verifikator)
    {
        $status = '1';
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'probabilitas' => $probabilitas,
         'severity' => $severity,
         'grading' => $grading,
         'status' => $status,
         'verifikator' => $verifikator

     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

     function verifikp($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $tipe_insiden, $rekom, $komite, $status)
    {
        $status = '2';
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'probabilitas' => $probabilitas,
         'severity' => $severity,
         'grading' => $grading,
         'tipe_insiden' => $tipe_insiden,
         'rekom' => $rekom,
         'verifikator_komite' =>$komite,
         'status' => $status,

     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

     function verifkomitek3($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $rekom, $status)
    {
        $status = '2';
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'probabilitas' => $probabilitas,
         'severity' => $severity,
         'grading' => $grading,
         'rekom' => $rekom,
         'status' => $status,

     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

    function tampilkan_laporan($tgl_1, $tgl_2, $jenis)
    {

        $data = array(
            'tgl_1' => $tgl_1,
            'tgl_2' => $tgl_2,
            'jenis' => $jenis           

        );


        $my_query = "SELECT `jenis`, 
        sum(case grading when 'Biru' then 1 else 0 end) as jum_biru, 
        sum(case grading when 'Hijau' then 1 else 0 end) as jum_hijau, 
        sum(case grading when 'Kuning' then 1 else 0 end) as jum_kuning, 
        sum(case grading when 'Merah' then 1 else 0 end) as jum_merah 
        FROM `laporaninsiden` as `a` 
        LEFT JOIN `jenis_insiden` as `b` ON `b`.`id_jenis` = `a`.`jenis_insiden` 
        where     
        a.tgl_insiden between '" . $tgl_1 . "'  and  '" . $tgl_2 . " 23:59'
        and (id_jenis='".$jenis."' or '".$jenis."'='ALL') Group By b.id_jenis





        ";



        $query_jadi = $my_query ;

        $query = $this->db->query($query_jadi);
        return $query->result();
    }


    
    function simpank3($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $pembuat, $tgl_input, $status)
    {

        $data = array(
         'id_laporan' => $id_laporan,
         'tgl_kejadian' =>$tgl_kejadian, 
         'tempat_kejadian' => $tempat_kejadian, 
         'kejadian' => $kejadian, 
         'kronologi_kejadian' => $kronologi_kejadian,
         'pembuat' => $pembuat,
         'tgl_input' => $tgl_input,
         'status' => $status
     );


        $query = $this->db->insert('laporank3', $data);

        return $query;
    }

    function simpanbudaya($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $pembuat, $tgl_input, $status)
    {

        $data = array(
         'id_laporan' => $id_laporan,
         'tgl_kejadian' =>$tgl_kejadian, 
         'tempat_kejadian' => $tempat_kejadian, 
         'kejadian' => $kejadian, 
         'kronologi_kejadian' => $kronologi_kejadian,
         'pembuat' => $pembuat,
         'tgl_input' => $tgl_input,
         'status' => $status
     );


        $query = $this->db->insert('laporanbudaya', $data);

        return $query;
    }

    function simpanpajananA($id_laporan, $tgl_laporan, $tgl_pajanan, $tempat_kejadian, $unit_terpajan, $nama, $alamat1, $atasan, $alamat2,  $addroute, $addsumber, $bagian_tubuh, $kronologi, $imunisasi, $pelindung, $pertolongan, $jenis_pertolongan, $tempat_pertolongan, $pembuat, $status)
    {

        $data = array(
           'id_laporan' => $id_laporan,
           'tgl_laporan' => $tgl_laporan,
           'tgl_pajanan' => $tgl_pajanan,
           'tempat_kejadian' => $tempat_kejadian, 
           'unit_terpajan' => $unit_terpajan,
           'nama' => $nama,
           'alamat1' => $alamat1,
           'atasan' => $atasan,
           'alamat2' => $alamat2,
           'route' => $addroute,
           'sumber' => $addsumber,
           'bagian_tubuh' => $bagian_tubuh,
           'kronologi' => $kronologi,
           'imunisasi' => $imunisasi,
           'pelindung' => $pelindung,
           'pertolongan' => $pertolongan,
           'jenis_pertolongan' => $jenis_pertolongan,
           'tempat_pertolongan' => $tempat_pertolongan,
           'pembuat' => $pembuat,
           'status' => $status
       );


        $query = $this->db->insert('laporanpajananA', $data);

        return $query;
    }

    function simpanpajananB($id_laporan, $addkotak, $addperhatian, $nama, $rm, $ruang, $pemantauan, $tgl_pemberitahuan, $diagnosa, $tgl_input, $pembuat, $status)
    {

        $data = array(
           'id_laporan' => $id_laporan,
           'kotak' => $addkotak,
           'perhatian' => $addperhatian,
           'nama' => $nama,
           'rm' => $rm,
           'ruang' => $ruang,
           'pemantauan' => $pemantauan,
           'tgl_pemberitahuan' => $tgl_pemberitahuan,
           'diagnosa' => $diagnosa,
           'tgl_input' => $tgl_input,
           'pembuat' => $pembuat,
           'status' => $status,
       );


        $query = $this->db->insert('laporanpajananB', $data);

        return $query;
    }

    function verifpajananA($id_insiden, $tgl_terima, $rekom, $status, $verifikator)
    {
        
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'rekom' => $rekom,
         'status' => $status,
         'verifikator' => $verifikator

     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

      function verifkomitepajananA($id_insiden, $tgl_terima, $rekom, $status)
    {
        $status = '2';
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'rekom' => $rekom,
         'status' => $status,
     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

    function verifpajananB($id_insiden, $tgl_terima, $status, $verifikator)
    {
        
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'status' => $status,
         'verifikator' => $verifikator

     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

      function verifkomitepajananB($id_insiden, $tgl_terima, $rekom, $status)
    {
        $status = '2';
        $data = array(
         'id_insiden'=> $id_insiden,
         'tgl_terima' => $tgl_terima,
         'rekom' => $rekom,
         'status' => $status,
     );
        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

   

    function verifk3($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $verifikasi, $tindaklanjut, $verifikator, $status)
    {
        $status = '1';
        $data = array(
         'id_laporan' => $id_laporan,
         'tgl_kejadian' =>$tgl_kejadian, 
         'tempat_kejadian' => $tempat_kejadian, 
         'kejadian' => $kejadian, 
         'kronologi_kejadian' => $kronologi_kejadian, 
         'verifikasi' => $verifikasi, 
         'tindaklanjut' => $tindaklanjut,
         'verifikator' => $verifikator,
         'status' => $status
     );

        $this->db->where('id_laporan', $id_laporan);
        return $this->db->update('laporank3', $data);

        return $query;
    }

    function verifbudaya($id_insiden, $tgl_terima, $rekom, $verifikator, $status)
    {
        $status = '1';
        $data = array(
         'id_insiden' => $id_insiden,
         'tgl_terima' =>$tgl_terima, 
         'rekom' => $rekom, 
         'verifikator' => $verifikator,
         'status' => $status
     );

        $this->db->where('id_insiden', $id_insiden);
        return $this->db->update('laporaninsiden', $data);
    }

     function getGrading($id, $id_severity)
    {
        $this->db->select('grading');
        $this->db->from('grading_insiden');
        $this->db->where('probabilitas', $id);
        $this->db->where('severity', $id_severity);
        $query = $this->db->get();
        return $query->row();
    }
    function getGradingK3($id, $id_severity)
    {
        $this->db->select('grading');
        $this->db->from('grading_k3');
        $this->db->where('probabilitas', $id);
        $this->db->where('severity', $id_severity);
        $query = $this->db->get();
        return $query->row();
    }
}