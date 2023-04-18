<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mpengajuancuti extends CI_Model
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

    function insertpengajuancuti($data){
    $this->db->insert('pengajuancuti',$data);
   }


   function editdatauser($nik, $data){
    $this->db->where('nik',$nik);
    $this->db->update('admin',$data);
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

     function getdatacb($nik){
        $query = "SELECT sudahambilcb from admin                     
                    where nik ='{$nik}'";
        $result = $this->db->query($query);
        return $result->row();

    }

     function gettglsama($nik,$tglsama)
    {
        $this->db->select('mohonizintglawal,nik');
        $this->db->from('pengajuancuti');
        $this->db->where('nik', $nik);
        $this->db->where('mohonizintglawal', $tglsama);
        $query = $this->db->get();
        return $query->row();
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
        $query = "SELECT SUM(diizinkanhari) as jml FROM `pengajuancuti` WHERE nik = '{$nik}' AND sisacutitahun = '{$year}' AND jenis_cuti = 'Cuti Tahunan' AND statusizin IN ('2','1')";
        $result = $this->db->query($query);
        return $result->row();

    }

    function getdatacutiBesar($nik){
        $query = "SELECT SUM(diizinkanhari) as jml FROM `pengajuancuti` WHERE nik = '{$nik}' AND jenis_cuti = 'Cuti Besar' AND statusizin IN ('2','1')";
        $result = $this->db->query($query);
        return $result->row();

    }
    function gethakcuti($nik){
        $query = "SELECT hakcuti,hakcutibesar,tglawalcb FROM `admin` WHERE nik = '{$nik}'";
        $result = $this->db->query($query);
        return $result->row();

    }


    //Fungsi untuk memberikan kode otomatis
    public function getkode_cuti(){
        $this->db->select('MAX(RIGHT(idcuti,5)) as idcuti ', FALSE);
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
              $tgl=date('dm'); 
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "CT-".$tgl."-".$batas;  //format kode
              return $kodetampil;  
    }


    function tamp_cutipribadi($nik)
    {
        $query = "SELECT idcuti,mohonizinhari,mohonizintglawal,mohonizintglakhir,diizinkanhari, statusizin,jenis_cuti
        FROM `pengajuancuti` 
        WHERE nik = '{$nik}'
        ORDER BY tanggalinput DESC";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    function tamp_cutikaryawan($unit,$getunituser){
    $personauto = $this->session->userdata('personauto');
    $jeniscuti=$this->session->userdata('jeniscuti');
    $maccess=$this->session->userdata('maccess');

        if ($getunituser == '510' ) {
                $where = '';
        }
        elseif ( $maccess == 1 ) {
            $where = "WHERE a.nik IN ({$personauto})";
        }
        
        elseif ($unit !='' &&  $personauto !='') {
             $where = "WHERE a.unituser IN ({$unit}) OR a.nik IN ({$personauto})";  
        }
        elseif ($unit =='' &&  $personauto !='') {
             $where = "WHERE a.nik IN ({$personauto})";  
        }

        elseif ($unit !='' &&  $personauto =='') {
             $where = "WHERE a.unituser IN ({$unit})";  
        }



            if ($jeniscuti != '') {

                if ($getunituser == '510' ) {
                    $query = "SELECT pc.*,a.unit_id,a.unituser,a.nama,u.unit_nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON pc.nik = a.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    WHERE jenis_cuti='{$jeniscuti}'
                    ORDER BY  statusizin ASC,tanggalinput DESC";     
                       } 
                else{
                    $query = "SELECT pc.*,a.unit_id,a.unituser,a.nama,u.unit_nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON pc.nik = a.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    {$where} AND jenis_cuti='{$jeniscuti}'
                    ORDER BY  statusizin ASC,tanggalinput DESC";  
                }    
                }

            else{
                $query = "SELECT pc.*,a.unit_id,a.unituser,a.nama,u.unit_nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON pc.nik = a.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    {$where}
                    ORDER BY  statusizin ASC,tanggalinput DESC";
            }
        

        $result = $this->db->query($query);
        return $result->result_array();

    }

    function tamp_cutiAllkaryawan(){
        $query = "SELECT pc.*,a.unit_id,a.unituser,a.nama,u.unit_nama  FROM `pengajuancuti` pc 
                    LEFT JOIN admin a ON pc.nik = a.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    ORDER BY  statusizin ASC,tanggalinput DESC";

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



     function datakar($nik){
        $query = "SELECT u.unit_nama,a.unituser,a.nama, a.nik  FROM admin a
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                        WHERE nik = '{$nik}'";

        $result = $this->db->query($query);
        return $result->row();

    }

    function getinfokar($id){
        $query = "SELECT a.nik,a.nama  FROM `admin` a
            WHERE id = '{$id}'";

        $result = $this->db->query($query);
        return $result->row();

    }


    function getsuratmutasi($idcuti)
    {
        $query = "SELECT pc.*, a.nama, a.tglawalcb, u.unit_nama FROM `pengajuancuti` pc
                    LEFT JOIN admin a ON a.nik = pc.nik
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    WHERE idcuti = '{$idcuti}'";
        $result = $this->db->query($query);
        return $result->row();
    }



     function getcutitahun($nik)
    {
        $jeniscuti=$this->session->userdata('jeniscuti');
        $tahun=$this->session->userdata('tahun');
        $query = "SELECT * FROM `pengajuancuti` pc
                    WHERE nik = '{$nik}' AND jenis_cuti = '{$jeniscuti}' AND sisacutitahun = '{$tahun}'";
        $result = $this->db->query($query);
        return $result->result_array();
    }



     function getcutibesar($nik)
    {
        $jeniscuti=$this->session->userdata('jeniscuti');
        $tahun=$this->session->userdata('tahun');
        $query = "SELECT * FROM `pengajuancuti` pc
                    WHERE nik = '{$nik}' AND jenis_cuti = 'Cuti Besar'";
        $result = $this->db->query($query);
        return $result->result_array();
    }


    function getnama($nik)
    {
        $query = "SELECT nama, unit_nama FROM `admin` a
                    LEFT JOIN unit u ON a.unituser = u.unit_id
                    WHERE nik = '{$nik}'";
        $result = $this->db->query($query);
        return $result->row();
    }

    function getdatforupdate($idcuti){
        $query = "SELECT idcuti,yangmemohon,mohonizinhari,mohonizintglawal,mohonizintglakhir,unit_nama,sisacutitahun,keperluan,jenis_cuti
        FROM `pengajuancuti` pc
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

   function editcutibesar($data,$id){
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
   }

    function editunit($data,$nik){
    $this->db->where('nik',$nik);
    $this->db->update('admin',$data);
   }


   function tamp_rekaplaporan1()
    {
        $tglawal= $this->session->userdata('tglawal');
        $tglakhir=$this->session->userdata('tglakhir');
        $unit=$this->session->userdata('unit');

        if($tglawal !=''&&  $tglakhir!='' && $unit!=''){
            $where = "WHERE diizinkantglawal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND unituser = '{$unit}' ";
        }
        else if ($tglawal!='' &&  $tglakhir!='' && $unit=='') {
            $where = "WHERE diizinkantglawal BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        else if($tglawal==''&&  $tglakhir=='' && $unit!=''){
            $where = "WHERE unituser = '{$unit}' ";
        }
        else{
            $where = "";

        }

        $query = "SELECT
    a.nik,a.nama,u.unit_nama,SUM(diizinkanhari) as jumlah,
    CONCAT(CASE WHEN SUM(1 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '1',
    CONCAT(CASE WHEN SUM(2 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '2',
    CONCAT(CASE WHEN SUM(3 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '3',
    CONCAT(CASE WHEN SUM(4 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '4',
    CONCAT(CASE WHEN SUM(5 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '5',
    CONCAT(CASE WHEN SUM(6 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '6',
    CONCAT(CASE WHEN SUM(7 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '7',
    CONCAT(CASE WHEN SUM(8 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '8',
    CONCAT(CASE WHEN SUM(9 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '9',
    CONCAT(CASE WHEN SUM(10 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '10',
    CONCAT(CASE WHEN SUM(11 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '11',
    CONCAT(CASE WHEN SUM(12 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '12',
    CONCAT(CASE WHEN SUM(13 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '13',
    CONCAT(CASE WHEN SUM(14 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '14',
    CONCAT(CASE WHEN SUM(15 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '15',
    CONCAT(CASE WHEN SUM(16 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '16',
    CONCAT(CASE WHEN SUM(17 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '17',
    CONCAT(CASE WHEN SUM(18 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '18',
    CONCAT(CASE WHEN SUM(19 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '19',
    CONCAT(CASE WHEN SUM(20 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '20',
    CONCAT(CASE WHEN SUM(21 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '21',
    CONCAT(CASE WHEN SUM(22 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '22',
    CONCAT(CASE WHEN SUM(23 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '23',
    CONCAT(CASE WHEN SUM(24 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '24',
    CONCAT(CASE WHEN SUM(25 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '25',
    CONCAT(CASE WHEN SUM(26 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '26',
    CONCAT(CASE WHEN SUM(27 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '27',
    CONCAT(CASE WHEN SUM(28 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '28',
    CONCAT(CASE WHEN SUM(29 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '29',
    CONCAT(CASE WHEN SUM(30 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '30',
    CONCAT(CASE WHEN SUM(31 BETWEEN DAY(diizinkantglawal) AND DAY(diizinkantglakhir))  THEN 'cuti' ELSE '-' END) AS '31'
FROM
    pengajuancuti pc
LEFT JOIN admin a ON a.nik = pc.nik
LEFT JOIN unit u ON a.unituser = u.unit_id
{$where}
GROUP BY  a.nik";
    $result = $this->db->query($query);
    return $result->result_array();
  
   
        
    }

    function tamp_rekapcuti()
    {
            
        $unit=$this->session->userdata('unit');
        $jeniscuti=$this->session->userdata('jeniscuti');
        $tahun=$this->session->userdata('tahun');
        $tahunold = $tahun - 1;



        if($unit!='' &&  $tahun==''&& $jeniscuti!='' ){
            $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.unituser = '{$unit}' AND jenis_cuti = '{$jeniscuti}' AND a.status = '1'
                    GROUP BY a.nik";
        }
        else if($unit!='' && $tahun!=''&& $jeniscuti==''){
            $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.unituser = '{$unit}' AND sisacutitahun = '{$tahun}'  AND (jenis_cuti = '{$jeniscuti}' || jenis_cuti IS NULL) AND a.status = '1'
                    GROUP BY a.nik
                    UNION

                    SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, (a.hakcuti*0)  as digunakan, a.hakcuti as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE  a.unituser = '{$unit}' AND  a.cutitahun = '{$tahunold}'
                    AND (jenis_cuti = '{$jeniscuti}'  OR jenis_cuti IS NULL) AND a.status = '1'
                    GROUP BY nik
                    ";
        }

        else if($unit!='' && $tahun!=''&& $jeniscuti!=''){
            $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.unituser = '{$unit}' AND sisacutitahun = '{$tahun}' AND jenis_cuti = '{$jeniscuti}' AND a.status = '1'
                    GROUP BY a.nik
                    UNION

                    SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, (a.hakcuti*0)  as digunakan, a.hakcuti as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE  a.unituser = '{$unit}' AND  a.cutitahun = '{$tahunold}' AND jenis_cuti = '{$jeniscuti}' AND a.status = '1'
                    
                    GROUP BY nik
                    ";
        }

         else if($unit=='' && $tahun!='' && $jeniscuti!=''){
            $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE jenis_cuti = '{$jeniscuti}' AND sisacutitahun = '{$tahun}'  AND a.status = '1'
                    GROUP BY a.nik

                    UNION

                    SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, (a.hakcuti*0)  as digunakan, a.hakcuti as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE  jenis_cuti = '{$jeniscuti}' AND  a.cutitahun = '{$tahunold}' AND a.status = '1'
                    
                    GROUP BY nik
                    ";
        }
        // else if($unit=='' && $tahun=='' && $jeniscuti!=''){
        //     $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
        //             LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
        //             LEFT JOIN unit u ON u.unit_id = a.unituser 
        //             WHERE jenis_cuti = '{$jeniscuti}' AND sisacutitahun = '2020'  AND a.status = '1'
        //             GROUP BY a.nik";
        // }

       
        else if($tahun!='' ){
            $query = "SELECT a.nik, a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE sisacutitahun = '{$tahun}'  AND (jenis_cuti = 'Cuti Tahunan'  OR jenis_cuti IS NULL) AND a.status = '1'
                    GROUP BY a.nik";
        }
        else{
            $query = "SELECT a.nik,a.nama,u.unit_nama, a.hakcuti, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcuti-IFNULL(SUM(diizinkanhari),0) as sisa FROM admin a
                         LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik 
                         LEFT JOIN unit u ON u.unit_id = a.unituser 
                         WHERE a.status = '1' AND jenis_cuti = 'Cuti Tahunan'  OR jenis_cuti IS NULL  
                         GROUP BY a.nik 
                         ORDER BY a.unituser asc , a.nama asc";

        }

        
        $result = $this->db->query($query);
        return $result->result_array();
        
    }

    function updatecuti(){
        $query2 =" UPDATE admin a 
                left join `pengajuancuti` b on a.nik = b.nik
                SET sudahambilcb ='1'
                where b.jenis_cuti = 'Cuti Besar' 
            ";

    $q = $this->db->query($query2);
    return $q->result_array();
    }


     function tamp_rekapcutibesar()
    {
            
    $unit=$this->session->userdata('unit');
    $tahun=$this->session->userdata('tahun');
    

    if ($unit != '' && $tahun !='') {
        $query = "SELECT a.nik,a.tglawalcb, a.nama, u.unit_nama, a.hakcutibesar, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcutibesar-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.unituser = '{$unit}' AND YEAR(a.tglawalcb) = '{$tahun}' AND a.sudahambilcb != '0' AND (jenis_cuti = 'Cuti Besar' OR jenis_cuti IS NULL ) AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY a.nik 
                    
                    
                    UNION
                    
                    SELECT a.nik, a.tglawalcb, a.nama,u.unit_nama, a.hakcutibesar, (a.hakcutibesar*0)  as digunakan, a.hakcutibesar as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.unituser = '{$unit}'  AND  YEAR(a.tglawalcb) = '{$tahun}' AND a.sudahambilcb = '0' AND (jenis_cuti IS NULL  OR jenis_cuti != 'Cuti Besar')AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY nik
                    ";
    }

    elseif ($tahun !='') {
        $query = "SELECT a.nik,a.tglawalcb, a.nama, u.unit_nama, a.hakcutibesar, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcutibesar-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE YEAR(a.tglawalcb) = '{$tahun}' AND a.sudahambilcb != '0' AND (jenis_cuti = 'Cuti Besar' OR jenis_cuti IS NULL ) AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY a.nik 
                    
                    
                    UNION
                    
                    SELECT a.nik, a.tglawalcb, a.nama,u.unit_nama, a.hakcutibesar, (a.hakcutibesar*0)  as digunakan, a.hakcutibesar as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE YEAR(a.tglawalcb) = '{$tahun}' AND a.sudahambilcb = '0' AND (jenis_cuti IS NULL  OR jenis_cuti != 'Cuti Besar')AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY nik
                    ";
    }
    else{
        $query = "SELECT a.nik, a.nama, u.unit_nama, a.hakcutibesar, IFNULL(SUM(diizinkanhari),0) as digunakan, a.hakcutibesar-IFNULL(SUM(diizinkanhari),0) as sisa  FROM admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.sudahambilcb != '0' AND (jenis_cuti = 'Cuti Besar' OR jenis_cuti IS NULL ) AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY a.nik
                    
                    
                     UNION

                    SELECT a.nik, a.nama, u.unit_nama, a.hakcutibesar, (a.hakcutibesar*0)  as digunakan, a.hakcutibesar as sisa  FROM  admin a
                    LEFT JOIN `pengajuancuti` pc  ON a.nik = pc.nik
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE a.sudahambilcb = '0' AND(jenis_cuti IS NULL OR jenis_cuti != 'Cuti Besar' )AND a.status = '1' AND a.hakcutibesar !='0'
                    GROUP BY nik
                    ";
    }
    
    $result = $this->db->query($query);
    return $result->result_array();


    

 }

    function tamp_hakcutbesar()
    {
        $unit=$this->session->userdata('unit');

        if($unit!=''){
            $query = "SELECT a.id, u.unit_nama,a.nik,a.nama,a.hakcutibesar, a.hakcuti  FROM admin a
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    WHERE unituser = '{$unit}'
                    GROUP BY a.nik";
        }
        else{
            $query = "SELECT a.id,u.unit_nama,a.nik,a.nama,a.hakcutibesar, a.hakcuti FROM admin a
                    LEFT JOIN unit u ON u.unit_id = a.unituser 
                    GROUP BY a.nik";

        }

        
        $result = $this->db->query($query);
        return $result->result_array();
  
   
        
    }




    function tamp_rekapall()
    {
        $query = "SELECT u.unit_nama, SUM(a.hakcuti) as hakcuti, SUM(diizinkanhari) as digunakan, SUM(a.hakcuti)-SUM(diizinkanhari) as sisa  FROM `pengajuancuti` pc 
            LEFT JOIN admin a ON a.nik = pc.nik
            LEFT JOIN unit u ON u.unit_id = a.unituser
            GROUP BY a.unituser";
        
        $result = $this->db->query($query);
        return $result->result_array(); 
    }


    function tamp_rekapallctbesar()
    {
        $query = "SELECT u.unit_nama, SUM(a.hakcutibesar) as hakcutibesar, SUM(diizinkanhari) as digunakan, SUM(a.hakcutibesar)-SUM(diizinkanhari) as sisa  FROM `pengajuancuti` pc 
            LEFT JOIN admin a ON a.nik = pc.nik
            LEFT JOIN unit u ON u.unit_id = a.unituser
            WHERE jenis_cuti = 'Cuti Besar'
            GROUP BY a.unituser";
        
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    function drop($id){
      $this->db->where('idcuti',$id);
      $this->db->delete('pengajuancuti');
    }


    
    function hakcutied($nik,$data){
    $this->db->where('nik',$nik);
    $this->db->update('admin',$data);
   }


   function hakcutibsred($nik,$data){
    $this->db->where('nik',$nik);
    $this->db->update('admin',$data);
   }






    
}

