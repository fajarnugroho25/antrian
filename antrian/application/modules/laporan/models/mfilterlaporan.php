<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mfilterlaporan extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
 
 ///////////////////////////////////////////////////////////////   LAPORAN DETIL /////////////////////////////////////////////////////////////////      
   
     function tampilkan($status, $prioritas,$operasi,$dokter, $hak_kelas, $kelas_diminta, $tgl_1, $tgl_2, $tgl_real_1, $tgl_real_2,$penanggung){

      $data = array(       
        'status'=>$status,
        'prioritas'=>$prioritas,    
        'operasi'=>$operasi,
        'dokter'=>$dokter,
        'hak_kelas'=>$hak_kelas,
        'kelas_diminta'=>$kelas_diminta,   
        'tgl_1'=>$tgl_1,
        'tgl_2'=>$tgl_2,
        'tgl_real_1'=>$tgl_real_1,
        'tgl_real_2'=>$tgl_real_2         
      );

    
    $my_query = "SELECT IF(tgl_realisasi,date_format(tgl_realisasi, '%d-%m-%Y'),'-') as tgl_real,DATE_FORMAT(tgl_antri, '%d-%m-%Y') as tgl_antri,pasien.no_rm,  
                pasien.nama,  pasien.alamat,pasien.kelas_diminta, pasien.telp, pasien.telp2,pasien.keluarga_dekat, 
                dokter.id as id_dokter, dokter.nama_dokter, operasi.*, kelamin as gender, penanggung.nama_penanggung
                FROM pasien 
                LEFT JOIN penanggung ON pasien.penanggung = penanggung.id_penanggung
                LEFT JOIN operasi ON pasien.operasi = operasi.id 
                LEFT JOIN dokter ON pasien.dokter = dokter.id WHERE 
                (pasien.status='".$status."' or '".$status."' = 'ALL') AND
                (pasien.prioritas='".$prioritas."' or '".$prioritas."' = 'ALL') AND
                (pasien.operasi='".$operasi."' or '".$operasi."' = 'ALL') AND
                (pasien.dokter='".$dokter."' or '".$dokter."' = 'ALL' )AND
                (pasien.hak_kelas='".$hak_kelas."' or '".$hak_kelas."' = 'ALL') AND
                (pasien.kelas_diminta='".$kelas_diminta."' or '".$kelas_diminta."' = 'ALL') AND
                (tgl_antri between '".$tgl_1."' and '".$tgl_2." 23:59') AND
                (pasien.penanggung='".$penanggung."' or '".$penanggung."' = 'ALL') 
               
                ";

    //if ($status=="ALL") {$my_query2="";} elseif ($status==1) {$my_query2=""}            
    if ($status ==0)  {$my_query2 = "AND (tgl_realisasi between '".$tgl_real_1."' and '".$tgl_real_2." 23:59')";}  else {$my_query2="";}
                 
    $query_sort = "order by pasien.id asc";  

   

    $query_jadi = $my_query.$my_query2.$query_sort;

    $query = $this->db->query($query_jadi);
    return $query->result();


    }


///////////////////////////////////////////////////////////////   LAPORAN REKAP /////////////////////////////////////////////////////////////////   

     function tampilkan_rekap($dokter, $status, $tgl_real_1, $tgl_real_2,$tgl_1,$tgl_2){

      $data = array(       
        'status'=>$status,
        'dokter'=>$dokter,
        'tgl_1'=>$tgl_1,
        'tgl_2'=>$tgl_2,
        'tgl_real_1'=>$tgl_real_1,
        'tgl_real_2'=>$tgl_real_2                  
      );

    
    $my_query = "SELECT  B.nama_dokter, C.nama_operasi, COUNT(A.id) AS jumlah FROM PASIEN A 
                LEFT JOIN dokter B ON B.id = A.dokter
                LEFT JOIN operasi C ON C.ID = A.OPERASI WHERE
                (a.status='".$status."' or '".$status."' = 'ALL')  
                AND (tgl_antri between '".$tgl_1."' and '".$tgl_2." 23:59')               
                ";
    $query_sort = "ordeR by b.id asc ";  
    $query_group = "GROUP BY C.id, B.id "; 

    if ($status !="ALL") {$my_query2 = "AND (tgl_realisasi between '".$tgl_real_1."' and '".$tgl_real_2." 23:59')";} else {$my_query2="";}

    $query_jadi = $my_query.$my_query2.$query_group.$query_sort;

    $query = $this->db->query($query_jadi);
    return $query->result();

    }


///////////////////////////////////////////////////////////////   FUNCTION MASTER /////////////////////////////////////////////////////////////////   

    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('dokter');
        return $query->result();   
        
    }   
      
    // get data dropdown
    function combo_operasi()
    {
        $query = "select * from operasi";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
     }

        // get data dropdown
    function combo_dokter()
    {
        $query = "select * from dokter";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
     }

 function combo_kelas()
    {
        $query = "select * from kelas";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
     }

 function combo_kelas_minta()
    {
        $query = "select * from kelas";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
     } 


function combo_penanggung()
    {
        $query = "select * from penanggung";
        $q=$this->db->query($query);
        if($q->num_rows()>0){
            foreach ($q->result() as $row) {
                $data[]=$row;
            }
            return $data;
        }     
     }      
    

   
}
