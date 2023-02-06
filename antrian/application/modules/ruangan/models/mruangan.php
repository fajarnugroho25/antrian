<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mruangan extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {
        // $data = array(
        //     'tgl_awal' => $tgl_awal,
        // );

        // $query = "SELECT * FROM `ruangan` as `a`
        // LEFT JOIN `unit` as `b` ON `b`.`unit_id` = `a`.`unit`
        // LEFT JOIN `jenis_ruangan` as `c` ON `c`.`id_ruang` = `a`.`ruangan`
        // WHERE a.tanggal = {$tgl_awal} ";

        // $query_jadi = $this->db->query($query);
        // return $query->result();
        $this->db->select('*, ruangan.status as stat ');
        $this->db->from('ruangan');
        $this->db->order_by('tgl_input', 'desc');
        $this->db->join('jenis_ruangan', 'ruangan.ruangan = jenis_ruangan.id_ruang', 'left');
        $this->db->join('unit', 'ruangan.unit = unit.unit_id','left');
        // $user = $this->session->nama;
        // $where = "ruangan.user_peminta = '$user' AND ruangan.status = '0' OR ruangan.status = '2'";
        // $this->db->where($where);
        // // $this->db->where('ruangan.status =', '0' AND 'ruangan.status= ', '2');
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
     function tampilkansnack()
    {

        $this->db->select('*, ruangan.status as stat ');
        $this->db->from('ruangan');
        $this->db->order_by('tgl_input', 'desc');
        $this->db->join('jenis_ruangan', 'ruangan.ruangan = jenis_ruangan.id_ruang', 'left');
        $this->db->join('unit', 'ruangan.unit = unit.unit_id','left');
        $this->db->where('ruangan.status =', '1');
        $query = $this->db->get();
        return $query->result();
    }

    function no_permintaan()
    {

        $this->db->select('substring(max(ruangan.id_peminjaman), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('ruangan');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(ruangan.id_peminjaman),4) as id_permintaan ', false);
            $this->db->limit(1);
            $this->db->where('substring(ruangan.id_peminjaman,4,4) =' . $bln_now . '');
            $query = $this->db->get('ruangan');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_permintaan = intval($data->id_permintaan) + 1;
            } else {
                $id_permintaan = 1;
            }
            $kodemax = str_pad($id_permintaan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "PR" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
        $this->db->select('right(max(ruangan.id_peminjaman),4) as id_permintaan ', false);
        $this->db->limit(1);
        $this->db->where('substring(ruangan.id_peminjaman,4,4) =' . $bln_now . '');
        $query = $this->db->get('ruangan');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_permintaan = intval($data->id_permintaan) + 1;
        } else {
            $id_permintaan = 1;
        }
        $kodemax = str_pad($id_permintaan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "PR" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function combo_ruangan()
    {
        $query = "select * from jenis_ruangan order by id_ruang asc";
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

     function combo_verif()
    {
        $query = "select * from admin where kprs='5' ";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

     function simpan($id_peminjaman, $ruangan, $lainnya, $tanggal, $waktu, $durasi, $keperluan, $unit, $user_peminta, $addperlengkapan, $tgl_input)
    {

        $data = array(
            'id_peminjaman' => $id_peminjaman,
            'ruangan' => $ruangan,
            'lainnya' => $lainnya,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'durasi' => $durasi,
            'keperluan' => $keperluan,
            'unit' => $unit,
            'user_peminta' => $user_peminta,
            'perlengkapan' => $addperlengkapan,
            'tgl_input' => $tgl_input
        );
        // var_dump($data);exit;

        $query = $this->db->insert('ruangan', $data);

        return $query;
    }

       function edit($ruangan, $tanggal, $waktu, $durasi, $keperluan, $unit, $user_peminta, $addperlengkapan, $tgl_input, $id_peminjaman)
    {

        $data = array(
            'ruangan' => $ruangan,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'durasi' => $durasi,
            'keperluan' => $keperluan,
            'unit' => $unit,
            'user_peminta' => $user_peminta,
            'perlengkapan' => $addperlengkapan,
            'tgl_input' => $tgl_input
        );
        

        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('ruangan', $data);
    }

     function verif($id_peminjaman, $ruangan, $status, $verif_ruangan)
    {

        $data = array(
            'id_peminjaman' => $id_peminjaman,
            'ruangan' => $ruangan,
            'status' => $status,
            'verif_ruangan' => $verif_ruangan

        );
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('ruangan', $data);
    }

    function get_by_id($id_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $query = $this->db->get('ruangan');
        return $query->result();
    }

    public function getDataVerif_by_id($id_peminjaman)
    {
        // $this->db->where('id_product_unit', $id_product_unit);
        
        // $this->db->select('product_units.*, products.product_name, units.unit_name');
        // $this->db->from('product_units');
        $this->db->where('ruangan.id_peminjaman',$id_peminjaman);
        $this->db->join('jenis_ruangan', 'ruangan.ruangan = jenis_ruangan.id_ruang', 'left');
        $this->db->join('unit', 'ruangan.unit = unit.unit_id','left');
        $query = $this->db->get('ruangan');
        return $query->row();
    }

    function cetak_ruangan($id_peminjaman)
    {
        $this->db->select('*,ruangan.status as stat');
        $this->db->from('ruangan');
         $this->db->join('jenis_ruangan', 'ruangan.ruangan = jenis_ruangan.id_ruang', 'left');
        $this->db->join('unit', 'ruangan.unit = unit.unit_id','left');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $query = $this->db->get();
        return $query->result();
    }

}

