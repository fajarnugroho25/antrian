<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mcovid extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }


    function tamp_BarangMutasi($unit_id)
    {
        $status = $this->session->userdata('status_perizinan');
        $this->db->select('datamutasi.*,nama_gudang,unit_nama');
        $this->db->from('datamutasi');
        $this->db->join('gudang', 'gudang.gudang_id = datamutasi.id_gudang', 'left');
        $this->db->join('unit', 'unit.unit_id = datamutasi.bagian', 'left');

        if ($status != '1') {
        $this->db->where("bagian in ($unit_id)");
        // $this->db->where('bagian',$unit_id);
        }
        

        $query = $this->db->get();
        return $query->result();
    }

    function insertpemngirimspesimen($data){
    $this->db->insert('pemngirimspesimen',$data);
   }
   function insertidentitaspasien($data){
    $this->db->insert('identitaspasien',$data);
   }
   function insertriwayatperawatansus($data){
    $this->db->insert('riwayatperawatansus',$data);
   }
   function inserttandagejala($data){
    $this->db->insert('tandagejala',$data);
   }
   function insertpemeriksaanpenunjang($data){
    $this->db->insert('pemeriksaanpenunjang',$data);
   }
   function insertpengsample($data){
    $this->db->insert('pengsample',$data);
   }
   function insertpenyakitkomorbid($data){
    $this->db->insert('penyakitkomorbid',$data);
   }

    function insertperjalanan($data){
    $this->db->insert('perjalanan',$data);
   }

    function insertkontak($data){
    $this->db->insert('kontakorang',$data);
   }
   function insertkontakpaparan($data){
    $this->db->insert('kontakpaparan',$data);
   }



    function getunit($unit){
        $query = "SELECT unit_nama FROM unit where unit_id = {$unit}";
        $result = $this->db->query($query);
        return $result->row();

    }


     function Get_data($nik)
    {
        $this->db->select('unituser,nama,hakcuti');
        $this->db->from('admin');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->row();
    }

    function getEditInventaris($nomorasset){
        $query = "SELECT assetnomor,assetnoreff, assettanggal,assetkelompok,assetsubkelompok,assetsubkelompok2,assetnama,assetunit,assetlokasi,assetsatuan,assetbanyak,assetbelinama,assetbelialamat,assetbelijumlah,assetketerangan,assetstatus,assetstatus FROM `datainventaris` i 
                    JOIN dkelompok k ON k.id_kelompok = i.assetkelompok
                    JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok
                    JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2
                    JOIN dunit2 du ON du.id_unit2 = i.assetunit 
                    WHERE assetnomor = '{$nomorasset}'";

        $result = $this->db->query($query);
        return $result->row();
    }

    
    function getdatakary($nik){
        $query = "SELECT nama,unituser, u.unit_nama FROM `admin` a
                    LEFT JOIN unit u ON u.unit_id = a.unituser     
                    where nik ='{$nik}'";
        $result = $this->db->query($query);
        return $result->row();

    }


    function unitpengajuan()
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

    function getdatacuti($nik,$year){
        $query = "SELECT SUM(diizinkanhari) as jml FROM `pengajuancuti` WHERE nik = '{$nik}' AND sisacutitahun = '{$year}' AND statusizin = '2' AND jenis_cuti = 'Cuti Tahunan'";
        $result = $this->db->query($query);
        return $result->row();

    }
    function gethakcuti($nik){
        $query = "SELECT hakcuti FROM `admin` WHERE nik = '{$nik}'";
        $result = $this->db->query($query);
        return $result->row();

    }


    //Fungsi untuk memberikan kode otomatis
    public function getkode_cuti(){
        $this->db->select('RIGHT(pengajuancuti.idcuti,4) as idcuti', FALSE);
          $this->db->order_by('idcuti','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pengajuancuti');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->idcuti) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('dmY'); 
              $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "CT".$tgl.$batas;  //format kode
              return $kodetampil;  
    }


    function tamp_cutipribadi($nik)
    {
        $query = "SELECT idcuti,mohonizinhari,mohonizintglawal,mohonizintglakhir,diizinkanhari, statusizin 
        FROM `pengajuancuti` 
        WHERE nik = '{$nik}'
        ORDER BY tanggalinput DESC";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    function tamp_cutikaryawan($unit,$getunituser){
        if ($getunituser == '510') {
            $where = '';
            # code...
        }else{
          $where = "WHERE a.unituser IN ({$unit})";  

        }

        $query = "SELECT pc.*,a.unit_id,a.unituser,a.nama,u.unit_nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON pc.nik = a.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    {$where}
                    ORDER BY tanggalinput DESC";

        $result = $this->db->query($query);
        return $result->result_array();

    }
    function getdetdatkar($idcuti){
        $query = "SELECT idcuti, mohonizinhari,mohonizintglawal,mohonizintglakhir,u.unit_nama,a.unit_id,a.unituser,a.nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON a.nik = pc.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                        WHERE idcuti = '{$idcuti}'";

        $result = $this->db->query($query);
        return $result->row();

    }


    function getsuratmutasi($idcuti)
    {
        $query = "SELECT pc.*, a.nama, u.unit_nama FROM `pengajuancuti` pc
                    LEFT JOIN admin a ON a.nik = pc.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    WHERE idcuti = '{$idcuti}'";
        $result = $this->db->query($query);
        return $result->row();
    }


    function editpengajuan($data,$idcuti){
    $this->db->where('idcuti',$idcuti);
    $this->db->update('pengajuancuti',$data);
   }


 
    function tamp_pasien()
    {
            
            $query = "SELECT *  FROM identitaspasien
            ORDER BY idpasein desc";
        
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    function tamp_perjalanan()
    {
            $kode = $this->session->userdata('kodeunik');
            $query = "SELECT *  FROM perjalanan
            WHERE kodeunik = '{$kode}'";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }


    function tamp_kontak()
    {
            $kode = $this->session->userdata('kodeunik');
            $query = "SELECT *  FROM kontakorang
            WHERE kodeunik = '{$kode}'";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }


    function tamp_kontakorang($nomorpasien)
    {
        $query = "SELECT * FROM `kontakorang` KO
                    LEFT JOIN identitaspasien IP ON IP.kodeunik = KO.kodeunik
                    WHERE IP.idpasein = {$nomorpasien}";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    function tamp_perjlnan($nomorpasien)
    {
        $query = "SELECT * FROM `perjalanan` P
                LEFT JOIN identitaspasien IP ON IP.kodeunik = P.kodeunik
                WHERE IP.idpasein = {$nomorpasien}";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }




    function tamp_datapasien($nomorpasien)
    {
        $query = "SELECT * FROM `identitaspasien`  ip
            LEFT JOIN pemngirimspesimen  PS ON ip.kodeunik = PS.kodeunik
            LEFT JOIN pemeriksaanpenunjang PP ON PS.kodeunik =PP.kodeunik
            LEFT JOIN tandagejala TD ON TD.kodeunik = PP.kodeunik
            LEFT JOIN pengsample PES ON PES.kodeunik = TD.kodeunik
            LEFT JOIN riwayatperawatansus RP ON RP.kodeunik= PES.kodeunik
            LEFT JOIN penyakitkomorbid PK ON PK.kodeunik = RP.kodeunik
            LEFT JOIN kontakpaparan kp ON kp.kodeunik = PK.kodeunik
            WHERE idpasein = {$nomorpasien}";
        $result = $this->db->query($query);
        return $result->row(); 
    }

    function drop($id){
      $this->db->where('idcuti',$id);
      $this->db->delete('pengajuancuti');
    }



    
}

