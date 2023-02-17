<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mpasien extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function cek_rm($no_rm, $dokter)
    {


        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('no_rm', $no_rm);
        $this->db->where('dokter', $dokter);
        $this->db->where('status', '1');

        $query = $this->db->get();
        return $query->result();
    }



    function simpan($id, $no_rm, $nama, $alamat, $tgl_lahir, $telp, $telp2, $keluarga_dekat, $kelamin, $operasi, $dokter, $status, $tgl_antri, $tgl_permintaan,  $prioritas, $ket_prioritas, $ket_panggilan, $hak_kelas, $kelas_diminta, $tgl_realisasi,  $penanggung, $diagnosa, $user)
    {
        if ($status == 0) {
            $data = array(
                'id' => $id,
                'no_rm' => $no_rm,
                'nama' => $nama,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'telp' => $telp,
                'telp2' => $telp2,
                'keluarga_dekat' => $keluarga_dekat,
                'kelamin' => $kelamin,
                'operasi' => $operasi,
                'dokter' => $dokter,
                'status' => $status,
                'tgl_antri' => $tgl_antri,
                'tgl_permintaan' => $tgl_permintaan,
                'prioritas' => $prioritas,
                'ket_prioritas' => $ket_prioritas,
                'ket_panggilan' => $ket_panggilan,
                'hak_kelas' => $hak_kelas,
                'kelas_diminta' => $kelas_diminta,
                'tgl_realisasi' => $tgl_realisasi,
                'penanggung' => $penanggung,
                'diagnosa' => $diagnosa,
                'user' => $user

            );
        } else {
            $data = array(
                'id' => $id,
                'no_rm' => $no_rm,
                'nama' => $nama,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'telp' => $telp,
                'telp2' => $telp2,
                'keluarga_dekat' => $keluarga_dekat,
                'kelamin' => $kelamin,
                'operasi' => $operasi,
                'dokter' => $dokter,
                'status' => $status,
                'tgl_antri' => $tgl_antri,
                'tgl_permintaan' => $tgl_permintaan,
                'prioritas' => $prioritas,
                'ket_prioritas' => $ket_prioritas,
                'ket_panggilan' => $ket_panggilan,
                'hak_kelas' => $hak_kelas,
                'kelas_diminta' => $kelas_diminta,
                'tgl_realisasi' => '',
                'penanggung' => $penanggung,
                'diagnosa' => $diagnosa,
                'user' => $user
            );
        }

        $query = $this->db->insert('pasien', $data);

        return $query;
    }

    function tampilkan()
    {

        $this->db->select('pasien.*,nama_kelas,pasien.id as id_pasien, dokter.id as id_dokter,dokter.nama_dokter, operasi.*,  kelamin as gender');
        $this->db->from('pasien');
        $this->db->join('operasi', 'pasien.operasi = operasi.id', 'left');
        $this->db->join('dokter', 'pasien.dokter = dokter.id', 'left');
        $this->db->join('kelas', 'pasien.kelas_diminta = kelas.id_kelas', 'left');
        $this->db->where('pasien.status', '1');
        $this->db->order_by('pasien.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkan_sudah_panggil()
    {

        $this->db->select('pasien.*,nama_kelas,pasien.id as id_pasien, dokter.id as id_dokter,dokter.nama_dokter, operasi.*,  kelamin as gender');
        $this->db->from('pasien');
        $this->db->join('operasi', 'pasien.operasi = operasi.id', 'left');
        $this->db->join('dokter', 'pasien.dokter = dokter.id', 'left');
        $this->db->join('kelas', 'pasien.kelas_diminta = kelas.id_kelas', 'left');
        $this->db->where('pasien.status', '2');
        $this->db->order_by('pasien.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkan_sudah_op()
    {

        $this->db->select('pasien.*,nama_kelas,pasien.id as id_pasien, dokter.id as id_dokter,dokter.nama_dokter, operasi.*,  kelamin as gender');
        $this->db->from('pasien');
        $this->db->join('operasi', 'pasien.operasi = operasi.id', 'left');
        $this->db->join('dokter', 'pasien.dokter = dokter.id', 'left');
        $this->db->join('kelas', 'pasien.kelas_diminta = kelas.id_kelas', 'left');
        $this->db->where('pasien.status', '0');
        $this->db->order_by('pasien.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function tampilkan_batal()
    {

        $this->db->select('pasien.*,nama_kelas,pasien.id as id_pasien, dokter.id as id_dokter,dokter.nama_dokter, operasi.*,  kelamin as gender');
        $this->db->from('pasien');
        $this->db->join('operasi', 'pasien.operasi = operasi.id', 'left');
        $this->db->join('dokter', 'pasien.dokter = dokter.id', 'left');
        $this->db->join('kelas', 'pasien.kelas_diminta = kelas.id_kelas', 'left');
        $this->db->where('pasien.status', '9');
        $this->db->order_by('pasien.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pasien');
        return $query->result();
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('pasien');
        return $query;
    }

    function code_pasien()
    {
        $this->db->select('Right(pasien.id,8) as id ', false);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('pasien');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->id) + 1;
        } else {
            $id = 1;
        }
        $kodemax = str_pad($id, 8, "0", STR_PAD_LEFT);
        $kodejadi  = $kodemax;
        return $kodejadi;
    }

    function perbarui($no_rm, $nama, $alamat, $tgl_lahir, $telp, $telp2, $keluarga_dekat, $kelamin, $operasi, $dokter, $status,  $tgl_permintaan, $prioritas, $ket_prioritas, $ket_panggilan, $hak_kelas, $kelas_diminta, $tgl_realisasi,  $penanggung, $diagnosa, $user, $id)
    {
        if ($status == 1 && $status == 9) {
            $data = array(
                'no_rm' => $no_rm,
                'nama' => $nama,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'telp' => $telp,
                'telp2' => $telp2,
                'keluarga_dekat' => $keluarga_dekat,
                'kelamin' => $kelamin,
                'operasi' => $operasi,
                'dokter' => $dokter,
                'status' => $status,
                'tgl_permintaan' => $tgl_permintaan,
                'prioritas' => $prioritas,
                'ket_prioritas' => $ket_prioritas,
                'ket_panggilan' => $ket_panggilan,
                'hak_kelas' => $hak_kelas,
                'kelas_diminta' => $kelas_diminta,
                'tgl_realisasi' => '',
                'penanggung' => $penanggung,
                'diagnosa' => $diagnosa,
                'user' => $user

            );
        } else {
            $data = array(
                'no_rm' => $no_rm,
                'nama' => $nama,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'telp' => $telp,
                'telp2' => $telp2,
                'keluarga_dekat' => $keluarga_dekat,
                'kelamin' => $kelamin,
                'operasi' => $operasi,
                'dokter' => $dokter,
                'status' => $status,
                'tgl_permintaan' => $tgl_permintaan,
                'prioritas' => $prioritas,
                'ket_prioritas' => $ket_prioritas,
                'ket_panggilan' => $ket_panggilan,
                'hak_kelas' => $hak_kelas,
                'kelas_diminta' => $kelas_diminta,
                'tgl_realisasi' => $tgl_realisasi,
                'penanggung' => $penanggung,
                'diagnosa' => $diagnosa,
                'user' => $user
            );
        }
        $this->db->where('id', $id);
        return $this->db->update('pasien', $data);
    }

    // get data dropdown
    function combo_operasi()
    {
        $query = "select * from operasi";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // get data dropdown
    function combo_dokter()
    {
        $query = "select * from dokter order by nama_dokter";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_kelas()
    {
        $query = "select * from kelas";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function combo_kelas_minta()
    {
        $query = "select * from kelas";
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
}
