<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mdatapasien extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }


    function tampilkan_pasienBD()
    {

        $this->db->select('*');
        $this->db->from('pasienbankdarah');
        $this->db->where('status','1');
        $query = $this->db->get();
        return $query->result();
    }


    function insertHasilBD($data){
    $this->db->insert('hasil_pemeriksaan',$data);
   }

    

    function insertdatapasien($data){
    $this->db->insert('daftarpasien',$data);
   }


    function inserthasil($data){
    $this->db->insert('diagnosapasien',$data);
   }



   function editkamar($idpasien,$data){
        $this->db->where('idpasien',$idpasien);
        $this->db->update('daftarpasien',$data);
    }

    function kamarpasien($nokamar,$data){
        $this->db->where('idkamar',$nokamar);
        $this->db->update('kamar',$data);
    }


    function pasienkeluar($id,$data){
        $this->db->where('idpasien',$id);
        $this->db->update('daftarpasien',$data);
    }

    function ubahkamar($id,$data){
        $this->db->where('idpasien',$id);
        $this->db->update('daftarpasien',$data);
    }

    function ubahpasienhuni($idkamar,$data){
        $this->db->where('idkamar',$idkamar);
        $this->db->update('kamar',$data);
    }

    function pasienhuni($idkamar,$data){
        $this->db->where('idkamar',$idkamar);
        $this->db->update('kamar',$data);
    }


   function getdata(){
        $query = "SELECT k.namakamar as nk,dp.namapasien as np,dp.alamatpasien as ap,dp.rmpasien as rp,dp.idpasien as idpasien, dp.keterangan as ket FROM  kamar k
                LEFT JOIN daftarpasien dp ON k.pasienhuni = dp.idpasien"
                    ;

        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getdataPasien($idpasien){
        $query = "SELECT * FROM daftarpasien dp
                    LEFT JOIN kamar k ON k.idkamar = dp.idkamar
                    LEFT JOIN dokter d ON d.id = dp.dokterdpjp
                    Where idpasien = '{$idpasien}'"
                    ;

        $result = $this->db->query($query);
        return $result->row();

    }
    
    function getpasien($idpasien){
        $query = "SELECT tglmasuk,idkamar FROM daftarpasien dp
                    Where idpasien = '{$idpasien}'"
                    ;

        $result = $this->db->query($query);
        return $result->row();

    }

    function getidkamar($id){
        $query = "SELECT idkamar FROM daftarpasien where idpasien = '{$id}'";
        $result = $this->db->query($query);
        return $result->row();

    }

    

    function gethasilpemeriksaan($rmpasien){
        $query = "SELECT * FROM diagnosapasien dp
        LEFT JOIN daftarpasien p ON dp.rmpasien = p.rmpasien

        WHERE dp.rmpasien = '{$rmpasien}' AND statushuni = '1'
        ORDER BY iddiagnosa DESC";
        $result = $this->db->query($query);
        return $result->result_array();

    }

   






    function drop($id){
      $this->db->where('id_hasil',$id);
      $this->db->delete('hasil_pemeriksaan');
    }

    function drop_date($id){
      $this->db->where('id_pasien',$id);
      $data = array(
            'status' => '0',
        );
      $this->db->update('pasienbankdarah',$data);
    }


    function get_by_id($id_pasien)
    {
        
        $this->db->select('*');
        $this->db->from('hasil_pemeriksaan as hp');
        $this->db->join('pasienbankdarah as pbd', 'hp.khasildarah = pbd.khasildarah', 'left');
        $this->db->where('pbd.id_pasien', $id_pasien);
        $query = $this->db->get();
        return $query->result();
    }


   //Fungsi untuk memberikan kode otomatis
    public function getkode_pasien(){
        $this->db->select('MAX(RIGHT(idpasien,4)) as idpasien ', FALSE);
          $this->db->order_by('idpasien','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('daftarpasien');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->idpasien) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('dmY'); 
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "P".$batas;  //format kode
              return $kodetampil;  
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

    function loadkamar()
    {
        $query = "select * from kamar where pasienhuni = '0'";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function loaddokter()
    {
        $query = "select * from dokter where doktercov = '1'";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function loadkamar2()
    {
        $query = "select * from kamar ";
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


    function get_pasien($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('pasienbankdarah as pbd');
        $this->db->join('dokter as d', 'd.id = pbd.dokter', 'left');
        $this->db->where('id_pasien', $id_pasien);
        $query = $this->db->get();
        return $query->result();
    }

    function getdata_hasil($khasildarah)
    {
        $this->db->select('hp.*');
        $this->db->from('pasienbankdarah as pbd');
        $this->db->join('hasil_pemeriksaan as hp', 'hp.khasildarah = pbd.khasildarah', 'left');
        $this->db->where('hp.khasildarah', $khasildarah);
        $query = $this->db->get();
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




    function get_hasil($id_pasien){
        $this->db->select('khasildarah');
        $this->db->from('pasienbankdarah');
        $this->db->where('id_pasien', $id_pasien);
        $query = $this->db->get();
        if($query->row()){
            return $query->row();
        } else {
            return False;
        }

    }


    function upHasil($id,$data){
        $this->db->where('id_hasil',$id);
        $this->db->update('hasil_pemeriksaan',$data);

    }
}

