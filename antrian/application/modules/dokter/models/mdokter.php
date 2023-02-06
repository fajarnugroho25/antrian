<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mdokter extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }


    function tampilkan_resume_medis()
    {

        $this->db->select('*,dokter.nama_dokter as nama_dokter');
        $this->db->from('resume_medis');
        $this->db->join('dokter', 'dokter.id = resume_medis.id_dpjp', 'left');
        $this->db->where('resume_medis.status !=', '9');
        $query = $this->db->get();
        return $query->result();
    }


    function tampilkan_hasil_radiologi()
    {
        $this->db->select('*');
        $this->db->from('hasil_radiologi');
        $this->db->join('poliklinik', 'poliklinik.id_poli = hasil_radiologi.poli', 'left');
        $this->db->where('hasil_radiologi.status !=', '9');


        $query = $this->db->get();
        return $query->result();
    }


    function no_resume()
    {

        $this->db->select('substring(max(resume_medis.id_resume), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('resume_medis');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(resume_medis.id_resume),4) as id_resume ', false);
            $this->db->limit(1);
            $this->db->where('substring(resume_medis.id_resume,4,4) =' . $bln_now . '');
            $query = $this->db->get('resume_medis');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_resume = intval($data->id_resume) + 1;
            } else {
                $id_resume = 1;
            }
            $kodemax = str_pad($id_resume, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "RE" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(resume_medis.id_resume),4) as id_resume ', false);
        $this->db->limit(1);
        $this->db->where('substring(resume_medis.id_resume,4,4) =' . $bln_now . '');
        $query = $this->db->get('resume_medis');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_resume = intval($data->id_resume) + 1;
        } else {
            $id_resume = 1;
        }
        $kodemax = str_pad($id_resume, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "RE" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function no_hasil_rad()
    {

        $this->db->select('substring(max(hasil_radiologi.id_hasil_rad), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('hasil_radiologi');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(hasil_radiologi.id_hasil_rad),4) as id_hasil_rad ', false);
            $this->db->limit(1);
            $this->db->where('substring(hasil_radiologi.id_hasil_rad,4,4) =' . $bln_now . '');
            $query = $this->db->get('hasil_radiologi');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_hasil_rad = intval($data->id_hasil_rad) + 1;
            } else {
                $id_hasil_rad = 1;
            }
            $kodemax = str_pad($id_hasil_rad, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "RO" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(hasil_radiologi.id_hasil_rad),4) as id_hasil_rad ', false);
        $this->db->limit(1);
        $this->db->where('substring(hasil_radiologi.id_hasil_rad,4,4) =' . $bln_now . '');
        $query = $this->db->get('hasil_radiologi');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_hasil_rad = intval($data->id_hasil_rad) + 1;
        } else {
            $id_hasil_rad = 1;
        }
        $kodemax = str_pad($id_hasil_rad, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "RO" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }

    function simpan($id_resume, $no_rm, $nama_pasien, $alamat, $tgl_lahir, $ruang, $tgl_masuk, $tgl_keluar, $diag_sementara, $sebab_dirawat, $penemuan_fisik, $diag_terpenting, $terapi, $diag_utama, $diag_sekunder1, $diag_sekunder2, $diag_sekunder3, $tindakan_dilakukan1, $tindakan_dilakukan2, $tindakan_dilakukan3, $diet, $anjuran_edukasi, $kondisi_keluar, $id_dpjp, $status, $tgl_input, $user)
    {
        $data = array(
            'id_resume' => $id_resume,
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'ruang' => $ruang,
            'tgl_masuk' => $tgl_masuk,
            'tgl_keluar' => $tgl_keluar,
            'diag_sementara' => $diag_sementara,
            'sebab_dirawat' => $sebab_dirawat,
            'penemuan_fisik' => $penemuan_fisik,
            'diag_terpenting' => $diag_terpenting,
            'terapi' => $terapi,
            'diag_utama' => $diag_utama,
            'diag_sekunder1' => $diag_sekunder1,
            'diag_sekunder2' => $diag_sekunder2,
            'diag_sekunder3' => $diag_sekunder3,
            'tindakan_dilakukan1' => $tindakan_dilakukan1,
            'tindakan_dilakukan2' => $tindakan_dilakukan2,
            'tindakan_dilakukan3' => $tindakan_dilakukan3,
            'diet' => $diet,
            'anjuran_edukasi' => $anjuran_edukasi,
            'kondisi_keluar' => $kondisi_keluar,
            'id_dpjp' => $id_dpjp,
            'status' => $status,
            'tgl_input' => $tgl_input,
            'user' => $user

        );

        $query = $this->db->insert('resume_medis', $data);

        return $query;
    }

    function perbarui($no_rm, $nama_pasien, $alamat, $tgl_lahir, $ruang, $tgl_masuk, $tgl_keluar, $diag_sementara, $sebab_dirawat, $penemuan_fisik, $diag_terpenting, $terapi, $diag_utama, $diag_sekunder1, $diag_sekunder2, $diag_sekunder3, $tindakan_dilakukan1, $tindakan_dilakukan2, $tindakan_dilakukan3, $diet, $anjuran_edukasi, $kondisi_keluar, $id_dpjp, $status, $tgl_input, $user, $id_resume)
    {

        $data = array(
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'ruang' => $ruang,
            'tgl_masuk' => $tgl_masuk,
            'tgl_keluar' => $tgl_keluar,
            'diag_sementara' => $diag_sementara,
            'sebab_dirawat' => $sebab_dirawat,
            'penemuan_fisik' => $penemuan_fisik,
            'diag_terpenting' => $diag_terpenting,
            'terapi' => $terapi,
            'diag_utama' => $diag_utama,
            'diag_sekunder1' => $diag_sekunder1,
            'diag_sekunder2' => $diag_sekunder2,
            'diag_sekunder3' => $diag_sekunder3,
            'tindakan_dilakukan1' => $tindakan_dilakukan1,
            'tindakan_dilakukan2' => $tindakan_dilakukan2,
            'tindakan_dilakukan3' => $tindakan_dilakukan3,
            'diet' => $diet,
            'anjuran_edukasi' => $anjuran_edukasi,
            'kondisi_keluar' => $kondisi_keluar,
            'id_dpjp' => $id_dpjp,
            'status' => $status,
            'tgl_input' => $tgl_input,
            'user' => $user


        );
        $this->db->where('id_resume', $id_resume);
        return $this->db->update('resume_medis', $data);
    }

    function simpanhasil($id_hasil_rad, $no_rm, $nama_pasien, $alamat, $tgl_lahir, $poli, $kelamin, $no_photo, $tgl_pemeriksaan, $dpjp_pengirim, $pemeriksaan, $hasil, $penjamin, $status, $tgl_input, $user, $JP,$lain)
    {
        $data = array(
            'id_hasil_rad' => $id_hasil_rad,
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'poli' => $poli,
            'kelamin' => $kelamin,
            'no_photo' => $no_photo,
            'tgl_pemeriksaan' => $tgl_pemeriksaan,
            'dpjp_pengirim' => $dpjp_pengirim,
            'pemeriksaan' => $pemeriksaan,
            'hasil' => $hasil,
            'penjamin' => $penjamin,
            'status' => $status,
            'tgl_input' => $tgl_input,
            'user' => $user,
            'jenis_pemeriksa' => $JP.','.$lain

        );

        $query = $this->db->insert('hasil_radiologi', $data);

        return $query;
    }

    function perbaruihasil($no_rm, $nama_pasien, $alamat, $tgl_lahir, $poli, $kelamin, $no_photo, $tgl_pemeriksaan, $dpjp_pengirim,  $pemeriksaan, $hasil, $penjamin, $status, $tgl_input, $user, $id_hasil_rad,$JP,$lain)
    {

        $data = array(
            'id_hasil_rad' => $id_hasil_rad,
            'no_rm' => $no_rm,
            'nama_pasien' => $nama_pasien,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'poli' => $poli,
            'kelamin' => $kelamin,
            'no_photo' => $no_photo,
            'tgl_pemeriksaan' => $tgl_pemeriksaan,
            'dpjp_pengirim' => $dpjp_pengirim,
            'pemeriksaan' => $pemeriksaan,
            'hasil' => $hasil,
            'penjamin' => $penjamin,
            'status' => $status,
            'tgl_input' => $tgl_input,
            'user' => $user,
            'jenis_pemeriksa' => $JP.','.$lain



        );
        $this->db->where('id_hasil_rad', $id_hasil_rad);
        return $this->db->update('hasil_radiologi', $data);
    }

    function get_by_id($id_resume)
    {
        $this->db->where('id_resume', $id_resume);
        $query = $this->db->get('resume_medis');
        return $query->result();
    }

    function get_by_id_hasil($id_hasil_rad)
    {
        $this->db->where('id_hasil_rad', $id_hasil_rad);
        $query = $this->db->get('hasil_radiologi');
        return $query->result();
    }


    function search_icd10($title)
    {
        $this->db->select('icd_nama,icd_kode');
        $this->db->like('icd_nama', $title);
        $this->db->or_like('icd_kode', $title);
        $this->db->order_by('icd_nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('icd10')->result();
    }

    function search_icd9($title)
    {
        $this->db->select('icd_nama,icd_kode');
        $this->db->like('icd_nama', $title);
        $this->db->or_like('icd_kode', $title);
        $this->db->order_by('icd_nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('icd9')->result();
    }

    function print_by_no_resume($id_resume)
    {
        $this->db->select('a.*,j.nama_dokter as dpjp_nama,           
            c.icd_nama as nama_diag_utama,
            d.icd_nama as nama_diag_sekunder1,
            e.icd_nama as nama_diag_sekunder2,
            f.icd_nama as nama_diag_sekunder3,
            g.icd_nama as nama_tindakan_dilakukan1,
            h.icd_nama as nama_tindakan_dilakukan2,
            i.icd_nama as nama_tindakan_dilakukan3,

            ');
        $this->db->from('resume_medis as a');

        $this->db->join('icd10 as c', 'c.icd_kode = a.diag_utama', 'left');
        $this->db->join('icd10 as d', 'd.icd_kode = a.diag_sekunder1', 'left');
        $this->db->join('icd10 as e', 'e.icd_kode = a.diag_sekunder2', 'left');
        $this->db->join('icd10 as f', 'f.icd_kode = a.diag_sekunder3', 'left');
        $this->db->join('icd9 as g', 'g.icd_kode = a.tindakan_dilakukan1', 'left');
        $this->db->join('icd9 as h', 'h.icd_kode = a.tindakan_dilakukan2', 'left');
        $this->db->join('icd9 as i', 'i.icd_kode = a.tindakan_dilakukan3', 'left');
        $this->db->join('dokter as j', 'j.id = a.id_dpjp', 'left');
        $this->db->where('id_resume', $id_resume);
        $query = $this->db->get();
        return $query->result();
    }
    function print_by_no_hasil($id_hasil_rad)
    {
        $this->db->select('a.*,b.nama_poli as nama_poli, c.nama_dokter as dpjp_nama');
        $this->db->from('hasil_radiologi as a');
        $this->db->join('poliklinik as b', 'b.id_poli = a.poli', 'left');
        $this->db->join('dokter as c', 'c.id = a.dpjp_pengirim', 'left');
        $this->db->where('id_hasil_rad', $id_hasil_rad);
        $query = $this->db->get();
        return $query->result();
    }

    function combo_poli()
    {
        $query = "select * from poliklinik where status = '1'";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function dokter_pjp()
    {
        $query = "select * from dokter";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function hapus($id_hasil_rad)
    {
        $this->db->where('id_hasil_rad', $id_hasil_rad);
        $query = $this->db->delete('hasil_radiologi');
        return $query;
    }
}

