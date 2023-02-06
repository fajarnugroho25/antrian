<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class merm extends CI_Model
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




    public function getkode_cuti(){
        $this->db->select('MAX(RIGHT(idrerm,2)) as idrerm ', FALSE);
          $this->db->order_by('idrerm','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('reviewerm');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->idrerm) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('dmY'); 
              $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
              $kodetampil = "ERM".$tgl.$batas;  //format kode
              return $kodetampil;  
    }



function insertisierm($data){
    $this->db->insert('isierm',$data);
   }



function insertdatareviewrm($data){
    $this->db->insert('reviewerm',$data);
   }


function getisierm($cekid){
        $query = "SELECT * FROM isierm WHERE idrerm = '{$cekid}'";
        $result = $this->db->query($query);
        return $result->result_array();

    }


function getdatareview(){
        $query = "SELECT r.*,d.nama_dokter FROM reviewerm r
        JOIN dokter d ON d.id = r.namadpjp
        GROUP BY bulan, nama_dokter";
        $result = $this->db->query($query);
        return $result->result_array();

    }

function dataerm($iddokter){
        $query = "SELECT r.*,d.nama_dokter FROM reviewerm r
        JOIN dokter d ON d.id = r.namadpjp WHERE r.namadpjp = '{$iddokter}'";
        $result = $this->db->query($query);
        return $result->row();

    }


function isierm($bulan,$iddokter){
        $query = "SELECT * FROM `reviewerm` re 
                    JOIN isierm ie on ie.idrerm = re.idrerm
                    WHERE bulan = '{$bulan}' and namadpjp = '{$iddokter}'";
        $result = $this->db->query($query);
        return $result->result_array();

    }

function total($bulan,$iddokter){
        $query = "SELECT SUM(amlengkap)as totalleng1,COUNT(amlengkap) as ctotalleng1, SUM(amtlengkap)as totaltleng1,COUNT(amtlengkap) as ctotaltleng1,SUM(aklengkap)as totalleng2,COUNT(aklengkap) as ctotalleng2,SUM(aktlengkap)as totaltleng2,COUNT(aktlengkap) as ctotaltleng2 FROM `isierm`  ie
          JOIN `reviewerm` re  on ie.idrerm = re.idrerm
        WHERE  bulan = '{$bulan}' and namadpjp = '{$iddokter}'";
        $result = $this->db->query($query);
        return $result->row();

    }

function drop($id){
      $this->db->where('idermisi',$id);
      $this->db->delete('isierm');
    }




    
}

