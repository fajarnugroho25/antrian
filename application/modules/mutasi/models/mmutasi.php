<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mmutasi extends CI_Model
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
        $this->db->where("datamutasi.status", '1');
        $this->db->order_by('tanggal_input', 'DESC');

        if ($status == '5' || $status == '1') {
        $query = $this->db->get();
        }
        elseif ($status != '1') {
        $this->db->where("bagian in ($unit_id)");

        $query = $this->db->get();
        }
        

        
        return $query->result();
    }




    function tamp_BarangJual()
    {
        $status = $this->session->userdata('status_perizinan');
        $this->db->select('jb.*,nama_gudang');
        $this->db->from('jualbarang jb');
        $this->db->join('gudang', 'gudang.gudang_id = jb.gudang', 'left');
        $this->db->order_by('tanggal', 'DESC');

        if ($status == '5' || $status == '1') {
        $query = $this->db->get();
        }
        else  {

        $query = $this->db->get();
        }
        
        return $query->result();
    }

    function tamp_TerimaBarangMutasi($gudang)
    {
        $status = $this->session->userdata('status_perizinan');
        $this->db->select('datamutasi.*,nama_gudang,unit_nama');
        $this->db->from('datamutasi');
        $this->db->join('gudang', 'gudang.gudang_id = datamutasi.id_gudang', 'left');
        $this->db->join('unit', 'unit.unit_id = datamutasi.bagian', 'left');
        $this->db->order_by('tanggal_input', 'DESC');

        if ($status == '3') {
        $this->db->where("status_doc in (3,4)");
        }
        elseif ($status == '2') {

        $this->db->where("status_doc in (1,2,3,4)");
        }
        
        else{
        $this->db->where("id_gudang in ($gudang)");
        $this->db->where("status_doc in (2,3,4)");
        }

        $query = $this->db->get();
        return $query->result();
    }


    function alldatamutasi()
    {
        $this->db->select('datamutasi.*,nama_gudang,unit_nama');
        $this->db->from('datamutasi');
        $this->db->join('gudang', 'gudang.gudang_id = datamutasi.id_gudang', 'left');
        $this->db->join('unit', 'unit.unit_id = datamutasi.bagian', 'left');
        $this->db->where("status_doc in (1,2,3,4)");
        

        $query = $this->db->get();
        return $query->result();
    }



    function tamp_LaporanMutasi()
    {
        
        $tglawal= $this->session->userdata('tglawal');
        $tglakhir=$this->session->userdata('tglakhir');
        $kelompok=$this->session->userdata('kelompok');
        $unitm=$this->session->userdata('unitm');

        if ($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unitm=='') {
            $where = "Where tanggal_input BETWEEN '{$tglawal}' AND '{$tglakhir}'";
          
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unitm==''){
            $where = "Where assetkelompok = '{$kelompok}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unitm!=''){
            $where = "Where bagian = '{$unitm}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unitm!=''){
            $where = "Where assetkelompok = '{$kelompok}' AND  bagian = '{$unitm}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unitm!=''){
            $where = "Where tanggal_input BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}' AND  bagian = '{$unitm}'";
        }
        else{
            $where = "";

        }

        $query = "SELECT mutasi_id,tanggal_input,nama_barang,assetbelijumlah,nokodebarang,unit_nama,nama_gudang,kuantitas,satuan,alasan_mutasi FROM `datamutasi` dm
                    LEFT JOIN gudang g ON g.gudang_id = dm.id_gudang
                    LEFT JOIN unit u ON u.unit_id = dm.bagian
                    LEFT JOIN databarang db ON db.kdetmutasi = dm.kdetmutasi
                    LEFT JOIN datainventaris di ON di.assetnomor = db.nokodebarang
                    {$where}";
        $result = $this->db->query($query);
        return $result->result_array();
    }


  
    function tamp_LaporanMutasiExport()
    {
            $tglawal= $this->session->userdata('tglawal');
            $tglakhir=$this->session->userdata('tglakhir');
            $kelompok=$this->session->userdata('kelompok');
            $unitm=$this->session->userdata('unitm');


         if ($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unitm=='') {
            $where = "Where tanggal_input BETWEEN '{$tglawal}' AND '{$tglakhir}'";
          
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unitm==''){
            $where = "Where assetkelompok = '{$kelompok}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unitm!=''){
            $where = "Where bagian = '{$unitm}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unitm!=''){
            $where = "Where assetkelompok = '{$kelompok}' AND  bagian = '{$unitm}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unitm!=''){
            $where = "Where tanggal_input BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}' AND  bagian = '{$unitm}'";
        }
        else{
            $where = "";

        }


        $query = "SELECT mutasi_id,tanggal_input,nama_barang,assetbelijumlah,nokodebarang,unit_nama,nama_gudang,kuantitas,satuan,alasan_mutasi FROM `datamutasi` dm
                    LEFT JOIN gudang g ON g.gudang_id = dm.id_gudang
                    LEFT JOIN unit u ON u.unit_id = dm.bagian
                    LEFT JOIN databarang db ON db.kdetmutasi = dm.kdetmutasi
                    LEFT JOIN datainventaris di ON di.assetnomor = db.nokodebarang
                    {$where}";

        $result = $this->db->query($query);
        return $result->result();
    }



    function tamp_BarangInventaris()
    {
        $tglawal= $this->session->userdata('tglawal');
        $tglakhir=$this->session->userdata('tglakhir');
        $kelompok=$this->session->userdata('kelompok');
        $unt=$this->session->userdata('unt');
        $subkel=$this->session->userdata('subkel');

        if ($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt=='' && $subkel =='') {
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel ==''){
            $where = "WHERE assetkelompok = '{$kelompok}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel ==''){
            $where = "WHERE assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetunit = '{$unt}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt!=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'  AND  assetunit = '{$unt}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt==''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}'  ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt==''  && $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt!=''&& $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}' ";
        }
        else{
            $where = "";

        }

        $query = "SELECT assetnomor,assetnoreff, assettanggal,assetnama,namasubkel2,namasubkel,nama,namaunit2,assetstatus,assetmerk,assettype,assetnoseri FROM `datainventaris` i 
                    JOIN dkelompok k ON k.id_kelompok = i.assetkelompok
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2
                    LEFT JOIN dunit2 du ON du.id_unit2 = i.assetunit {$where} ORDER BY assettanggal DESC";

         

        $result = $this->db->query($query);
        return $result->result_array();
    }


    function Exportexcelinventaris()
    {
           $tglawal= $this->session->userdata('tglawal');
        $tglakhir=$this->session->userdata('tglakhir');
        $kelompok=$this->session->userdata('kelompok');
        $unt=$this->session->userdata('unt');
        $subkel=$this->session->userdata('subkel');
        if ($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt=='' && $subkel =='') {
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel ==''){
            $where = "WHERE assetkelompok = '{$kelompok}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel ==''){
            $where = "WHERE assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetunit = '{$unt}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt!=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'  AND  assetunit = '{$unt}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt==''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}'  ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt==''  && $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt!=''&& $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}' ";
        }
        else{
            $where = "";

        }

        $query = "SELECT assetnomor,assetnoreff, assetunit, assettanggal,assetnama,namasubkel2,namasubkel,nama,namaunit2,assetstatus,assetmerk,assettype,assetnoseri FROM `datainventaris` i 
                    JOIN dkelompok k ON k.id_kelompok = i.assetkelompok
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2

                    JOIN dunit2 du ON du.id_unit2 = i.assetunit {$where}";

        $result = $this->db->query($query);
        return $result->result();
    }


    function Laporaninven()
    {
        $tglawal= $this->session->userdata('tglawal');
        $tglakhir=$this->session->userdata('tglakhir');
        $kelompok=$this->session->userdata('kelompok');
        $unt=$this->session->userdata('unt');
        $subkel=$this->session->userdata('subkel');

        if ($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt=='' && $subkel =='') {
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel ==''){
            $where = "WHERE assetkelompok = '{$kelompok}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel ==''){
            $where = "WHERE assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}'";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt!=''){
            $where = "WHERE assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok!=''&& $unt=='' && $subkel !=''){
            $where = "WHERE assetkelompok = '{$kelompok}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal==''&&  $tglakhir==''&& $kelompok==''&& $unt!='' && $subkel !=''){
            $where = "WHERE assetunit = '{$unt}'  AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt!=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}'  AND  assetunit = '{$unt}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt==''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}'  ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok==''&& $unt==''  && $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetsubkelompok = '{$subkel}' ";
        }
        else if($tglawal!=''&&  $tglakhir!=''&& $kelompok!=''&& $unt!=''&& $subkel !=''){
            $where = "WHERE assettanggal BETWEEN '{$tglawal}' AND '{$tglakhir}' AND assetkelompok = '{$kelompok}' AND  assetunit = '{$unt}' AND assetsubkelompok = '{$subkel}' ";
        }
        else{
            $where = "";

        }

        $query = "SELECT assetnomor,assetnoreff, assettanggal,assetnama,namasubkel2,namasubkel,nama,namaunit2,assetstatus,assetmerk,assettype,assetnoseri FROM `datainventaris` i 
                    JOIN dkelompok k ON k.id_kelompok = i.assetkelompok
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2
                    JOIN dunit2 du ON du.id_unit2 = i.assetunit {$where} ORDER BY assetnama ASC";

         

        $result = $this->db->query($query);
        return $result->result();
    }


    function getkelompok($kelompok){
         
         $query = "SELECT nama FROM `dkelompok` i 
                    WHERE id_kelompok = {$kelompok}";

        $result = $this->db->query($query);
        return $result->row();


    }


    function Det_BarangMutasi($mutasi_id)
    {

        $this->db->select('datamutasi.*,databarang.*, `nama_gudang`,nokodebarang, `datamutasi`.`bagian`');
        $this->db->from('datamutasi');
        $this->db->join('databarang', 'databarang.kdetmutasi = datamutasi.kdetmutasi', 'left');
        $this->db->join('gudang', 'gudang.gudang_id = datamutasi.id_gudang', 'left');
        $this->db->where('mutasi_id =', $mutasi_id);
        $query = $this->db->get();
        return $query->result();
    }


    function Det_JualBarang($kodebarang)
    {

        $this->db->select('kodebarang,gudang,tanggal, barangdijual.*');
        $this->db->from('jualbarang' );
        $this->db->join('barangdijual', 'barangdijual.kunik = jualbarang.kunik', 'left');
        $this->db->join('gudang', 'gudang.gudang_id = jualbarang.gudang', 'left');
        $this->db->where('kodebarang =', $kodebarang);
        $query = $this->db->get();
        return $query->result();
    }



    function Get_data($mutasi_id)
    {

        $this->db->select('*');
        $this->db->from('datamutasi');
        $this->db->join('gudang', 'gudang.gudang_id = datamutasi.id_gudang');
        $this->db->join('unit', 'unit.unit_id = datamutasi.bagian');
        // $this->db->join('datainventaris', 'datainventaris.assetnomor = datamutasi.bagian');
        $this->db->where('mutasi_id =', $mutasi_id);
        $query = $this->db->get();
        return $query->row();
    }


    function Get_dataJual($kodebarang)
    {

        $this->db->select('*');
        $this->db->from('jualbarang');
        $this->db->join('gudang', 'gudang.gudang_id = jualbarang.gudang', 'left');
        // $this->db->join('datainventaris', 'datainventaris.assetnomor = datamutasi.bagian');
        $this->db->where('kodebarang =', $kodebarang);
        $query = $this->db->get();
        return $query->row();
    }

    

    function getunit($unit){
        $query = "SELECT unit_nama,unit_id FROM unit where unit_id in ({$unit})";
        $result = $this->db->query($query);
        return $result->result();

    }

    function getEditInventaris($nomorasset){
        $query = "SELECT assetnomor,assetnoreff, assettanggal,assetkelompok,assetsubkelompok,assetsubkelompok2,assetnama,assetmerk,assettype,assetnoseri,assetunit,assetlokasi,assetsatuan,assetbanyak,assetbelinama,assetbelialamat,assetbelijumlah,assetketerangan,assetstatus,assetstatus FROM `datainventaris` i 
                    LEFT JOIN dkelompok k ON k.id_kelompok = i.assetkelompok 
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok 
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2 
                    LEFT JOIN dunit2 du ON du.id_unit2 = i.assetunit
                    WHERE assetnomor = '{$nomorasset}'";

        $result = $this->db->query($query);
        return $result->row();


    }

    function editasset($data,$assetno){
    $this->db->where('assetnomor',$assetno);
    $this->db->update('datainventaris',$data);
   }


    function insertBarangMutasi($data){
    $this->db->insert('databarang',$data);
   }


    function insertbarangjual($data){
    $this->db->insert('barangdijual',$data);
   }


    function insertDataMutasi($data){
    $this->db->insert('datamutasi',$data);
   }

   function insertjualbarang($data){
    $this->db->insert('jualbarang',$data);
   }

   function insertDataInventaris($data){
    $this->db->insert('datainventaris',$data);
   }

   function insertkelompok($data){
    $this->db->insert('dkelompok',$data);
   }

   function insertsubkelompok($data){
    $this->db->insert('dsubkelompok',$data);
   }

   function insertsubkelompok2($data){
    $this->db->insert('dsubkelompok2',$data);
   }

   function insertdunit($data){
    $this->db->insert('dunit2',$data);
   }

   function Upnomer($id,$data){
    $this->db->where('mutasi_id',$id);
    $this->db->update('datamutasi',$data);
   }

   function Upjual($id,$data){
    $this->db->where('kodebarang',$id);
    $this->db->update('jualbarang',$data);
   }
   function upstatusinven($noinven,$data1){
    $this->db->where('assetnoreff',$noinven);
    $this->db->update('datainventaris',$data1);
   }

   

   


   function getdata(){
        $query = "SELECT assetnomor,assetnoreff,assetnama,namasubkel,nama,namaunit2,assetmerk,assettype,assetnoseri FROM `datainventaris` i 
                    LEFT JOIN dkelompok k ON k.id_kelompok = i.assetkelompok 
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok 
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2 
                    LEFT JOIN dunit2 du ON du.id_unit2 = i.assetunit";

        $result = $this->db->query($query);
        return $result->result_array();

    }

function getdatawithkode($kodeunit){
        $query = "SELECT assetnomor,assetnoreff,assetnama,namasubkel,nama,namaunit2,assetmerk,assettype,assetnoseri FROM `datainventaris` i 
                    LEFT JOIN dkelompok k ON k.id_kelompok = i.assetkelompok 
                    LEFT JOIN dsubkelompok ds ON ds.id_subkel= i.assetsubkelompok 
                    LEFT JOIN dsubkelompok2 ds2 ON ds2.idsubkel2 = i.assetsubkelompok2 
                    LEFT JOIN dunit2 du ON du.id_unit2 = i.assetunit
                    WHERE id_unit2 = '{$kodeunit}'";

        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getbarangmutasi($cekKode){
        $query = "SELECT * FROM databarang WHERE kdetmutasi = '{$cekKode}'";
        $result = $this->db->query($query);
        return $result->result_array();

    }


    function getbarangjual($kodeunik){
        $query = "SELECT bj.* FROM barangdijual bj
        LEFT JOIN datainventaris di ON bj.noinventaris=di.assetnoreff
        WHERE kunik = '{$kodeunik}' AND di.statusinventaris = '0'";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getsupplier(){
        $query = "SELECT supp_id,suppKode,supnama,supalamat,supkota FROM supplier";
        $result = $this->db->query($query);
        return $result->result_array();

    }

   

    function getmaxnomor(){
        $query = "SELECT MAX(nomor) as nomornota from datamutasi";
        $result = $this->db->query($query);
        $hasil = $result->row();
        return $hasil->nomornota;

    }

    function getmaxnokelompok(){
        $query = "SELECT MAX(id_kelompok) as nokelompok from dkelompok";
        $result = $this->db->query($query);
        $hasil = $result->row();
        return $hasil->nokelompok;

    }

    function getmaxnoDunit(){
        $query = "SELECT MAX(id_unit2) as noDunit from dunit2";
        $result = $this->db->query($query);
        $hasil = $result->row();
        return $hasil->noDunit;

    }


    function getkel(){
        $query = "SELECT nama FROM dkelompok";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getsubkel(){
        $query = "SELECT id_subkel,namasubkel FROM dsubkelompok";
        $result = $this->db->query($query);
        return $result->result_array();

    }
    function getsubkel2(){
        $query = "SELECT idsubkel2,namasubkel2 FROM dsubkelompok2";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function unitget(){
        $query = "SELECT id_unit2,namaunit2 FROM dunit2";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getsubkode($kel){
        $query = "SELECT MAX(id_subkel) as idmax FROM dsubkelompok where khusus = '$kel'";
        $result = $this->db->query($query);
        return $result->row();

    }

    function getsubkel2kode($subkelompok){
        $query = "SELECT MAX(idsubkel2) as idmax FROM dsubkelompok2 where khusus = '$subkelompok'";
        $result = $this->db->query($query);
        return $result->row();

    }

    function getmaxasset($subkel,$kel){
        $query = "SELECT COUNT(SUBSTRING_INDEX(assetnoreff, '/', -1)) as idmax FROM `datainventaris` where assetsubkelompok = '$subkel'  AND assetkelompok = '$kel'";
        $result = $this->db->query($query);
        return $result->row();

    }



    function no_hasil_mutasi()
    {

       $this->db->select('substring(max(datamutasi.mutasi_id), 3,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('datamutasi');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(datamutasi.mutasi_id),4) as mutasi_id ', false);
            $this->db->limit(1);
            $this->db->where('substring(datamutasi.mutasi_id,3,4) =' . $bln_now . '');
            $query = $this->db->get('datamutasi');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $mutasi_id = intval($data->mutasi_id) + 1;
            } else {
                $mutasi_id = 1;
            }
            $kodemax = str_pad($mutasi_id, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "M" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(datamutasi.mutasi_id),4) as mutasi_id ', false);
        $this->db->limit(1);
        $this->db->where('substring(datamutasi.mutasi_id,3,4) =' . $bln_now . '');
        $query = $this->db->get('datamutasi');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $mutasi_id = intval($data->mutasi_id) + 1;
        } else {
            $mutasi_id = 1;
        }
        $kodemax = str_pad($mutasi_id, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "M" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }


    function no_jualbarang()
    {

       $this->db->select('substring(max(jualbarang.kodebarang), 3,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('jualbarang');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(jualbarang.kodebarang),4) as kodebarang ', false);
            $this->db->limit(1);
            $this->db->where('substring(jualbarang.kodebarang,3,4) =' . $bln_now . '');
            $query = $this->db->get('jualbarang');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kodebarang = intval($data->kodebarang) + 1;
            } else {
                $kodebarang = 1;
            }
            $kodemax = str_pad($kodebarang, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "J" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(jualbarang.kodebarang),4) as kodebarang ', false);
        $this->db->limit(1);
        $this->db->where('substring(jualbarang.kodebarang,3,4) =' . $bln_now . '');
        $query = $this->db->get('jualbarang');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kodebarang = intval($data->kodebarang) + 1;
        } else {
            $kodebarang = 1;
        }
        $kodemax = str_pad($kodebarang, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "J" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }



    function no_hasil_Inventaris()
    {

        $this->db->select('substring(max(datainventaris.assetnomor), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('datainventaris');
        $data2 = $query2->row();
        $bln_now = date("y"). "" . date("m");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(datainventaris.assetnomor),4) as assetnomor ', false);
            $this->db->limit(1);
            $this->db->where('substring(datainventaris.assetnomor,4,4) =' . $bln_now . '');
            $query = $this->db->get('datainventaris');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $noasset = intval($data->assetnomor) + 1;
            } else {
                $noasset = 1;
            }
            $kodemax = str_pad($noasset, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "IV" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(datainventaris.assetnomor),4) as assetnomor ', false);
        $this->db->limit(1);
        $this->db->where('substring(datainventaris.assetnomor,4,4) =' . $bln_now . '');
        $query = $this->db->get('datainventaris');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $noasset = intval($data->assetnomor) + 1;
        } else {
            $noasset = 1;
        }
        $kodemax = str_pad($noasset, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "IV" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }



    function kelompok()
    {
        $query = "select * from dkelompok ";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function subkelompok()
    {
        $query = "select * from dsubkelompok";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function subkelompok2()
    {
        $query = "select * from dsubkelompok2";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function unit()
    {
        $query = "select * from dunit2";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }



    function unitmutasi()
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


     function GudangPenerima()
    {
        $query = "select * from gudang ORDER BY nama_gudang ASC";
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

    function drop($id){
      $this->db->where('barangmutasi_id',$id);
      $this->db->delete('databarang');
    }

    function dropmutasi($id){
        $data['status'] = '0';
      $this->db->where('mutasi_id',$id);
      $this->db->update('datamutasi',$data );
    }
    

    function dropjual($id){
        $data['status'] = '0';
      $this->db->where('idbarang',$id);
      $this->db->update('barangdijual',$data );
    }

    function upinventaris($noinven,$data){
            
      $this->db->where('assetnoreff',$noinven);
      $this->db->update('datainventaris',$data);
    }


    function edsub1($id,$data){
        $this->db->where('id_subkel',$id);
        $this->db->update('dsubkelompok',$data);

    }

    function edsub2($id,$data){
        $this->db->where('idsubkel2',$id);
        $this->db->update('dsubkelompok2',$data);

    }
    function eunit($id,$data){
        $this->db->where('id_unit2',$id);
        $this->db->update('dunit2',$data);

    }

    function upNoinven($id,$data){
        $this->db->where('barangmutasi_id',$id);
        $this->db->update('databarang',$data);

    }

    

    
}

