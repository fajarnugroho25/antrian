<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mrujukan extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan_suket($no_surat, $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diag_primer,  $diag_sekunder,  $alasan, $rencana, $tgl_penggunaan, $status, $tgl_input, $user){   
    $data = array(
        'no_surat'=>$no_surat,
        'no_rm'=>$no_rm,
        'nama'=>$nama,
        'alamat'=>$alamat,
        'tgl_lahir'=>$tgl_lahir,
        'kelamin'=>$kelamin,
        'dokter'=>$dokter,
        'diag_primer'=>$diag_primer,
        'diag_sekunder'=>$diag_sekunder,
        'alasan'=>$alasan,
        'rencana'=>$rencana,
        'tgl_penggunaan'=>$tgl_penggunaan,
        'status'=>$status,
        'tgl_input'=>$tgl_input,
        'user'=>$user
       
    );    
    $query = $this->db->insert('suratketerangan', $data);
    
    return $query;
    }

    function simpan_rujukan($no_surat, $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diagnosa, $obat, $kepada, $tgl_balik, $keterangan, $status, $tgl_input, $user){ 
    $data = array(
        'no_surat'=>$no_surat,
        'no_rm'=>$no_rm,
        'nama'=>$nama,
        'alamat'=>$alamat,
        'tgl_lahir'=>$tgl_lahir,
        'kelamin'=>$kelamin,
        'dokter'=>$dokter,
        'diagnosa'=>$diagnosa,
        'obat'=>$obat,
        'kepada'=>$kepada,
        'tgl_balik'=>$tgl_balik,
        'keterangan'=>$keterangan,
        'status'=>$status,
        'tgl_input'=>$tgl_input,
        'user'=>$user
       
    );    
    $query = $this->db->insert('suratrujukan', $data);
    
    return $query;
    }
    
    function tampilkan_suket(){
    
    $this->db->select('no_surat,no_rm,nama,alamat,nama_dokter,diag_primer,diag_sekunder,tgl_penggunaan') ;
    $this->db->from('suratketerangan');    
    $this->db->join('dokter', 'suratketerangan.dokter = dokter.id', 'left');   
    $this->db->where('suratketerangan.status','1');
    $this->db->order_by('no_surat','asc'); 
    $query = $this->db->get();
    return $query->result();


    }

    function tampilkan_rujukan(){
    
    $this->db->select('no_surat,no_rm,nama,alamat,nama_dokter,diagnosa,obat,kepada') ;
    $this->db->from('suratrujukan');    
    $this->db->join('dokter', 'suratrujukan.dokter = dokter.id', 'left');   
    $this->db->where('suratrujukan.status','1');
    $this->db->order_by('no_surat','asc'); 
    $query = $this->db->get();
    return $query->result();


    }
    
    function get_by_no_surat_skd($no_surat){
        $this->db->where('no_surat', $no_surat);
        $query = $this->db->get('suratketerangan');
        return $query->result();   
        
    }

    function get_by_no_surat_rujukan($no_surat){
        $this->db->where('no_surat', $no_surat);
        $query = $this->db->get('suratrujukan');
        return $query->result();   
        
    }

    function print_by_no_surat_skd($no_surat){
        $this->db->select('no_surat,no_rm,nama,alamat,nama_dokter,diag_primer,diag_sekunder,tgl_penggunaan,tgl_lahir,alasan,rencana') ;
        $this->db->from('suratketerangan');    
        $this->db->join('dokter', 'suratketerangan.dokter = dokter.id', 'left');   
        $this->db->where('no_surat', $no_surat);
        $query = $this->db->get();
        return $query->result();   
        
    }
    
    function print_by_no_surat_rujukan($no_surat){
        $this->db->select('no_surat,no_rm,nama,alamat,nama_dokter,tgl_lahir,diagnosa,obat,kepada,tgl_balik,keterangan') ;
        $this->db->from('suratrujukan');    
        $this->db->join('dokter', 'suratrujukan.dokter = dokter.id', 'left');   
        $this->db->where('no_surat', $no_surat);
        $query = $this->db->get();
        return $query->result();   
        
    }


    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('dokter');
        return $query;
    }
    
 
     function no_skd(){

        $this->db->select('substring(max(suratketerangan.no_surat), 10,4) as bln_surat ',false);            
        $this->db->limit(1);
        $query2 = $this->db->get('suratketerangan');
        $data2 = $query2->row();
        $bln_now = date("m")."".date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if($bln_now == $bln_db) {

            $this->db->select('right(max(suratketerangan.no_surat),6) as no_surat ',false);
            $this->db->limit(1);
            $this->db->where('substring(suratketerangan.no_surat,10,4) ='.$bln_now.'');
            $query = $this->db->get('suratketerangan');        


            if($query->num_rows()<>0){
                $data = $query->row();
                $no_surat = intval($data->no_surat)+1;
            }else{
                $no_surat = 1;

            }
            $kodemax = str_pad($no_surat,6,"0",STR_PAD_LEFT);
            $kodejadi  = "RSKI-SKD"."-".$bln_db."-".$kodemax;
            return $kodejadi;
        }
         else
            $this->db->select('right(max(suratketerangan.no_surat),6) as no_surat ',false);
            $this->db->limit(1);
            $this->db->where('substring(suratketerangan.no_surat,10,4) ='.$bln_now.'');
            $query = $this->db->get('suratketerangan');        


            if($query->num_rows()<>0){
                $data = $query->row();
                $no_surat = intval($data->no_surat)+1;
            }else{
                $no_surat = 1;

            }
            $kodemax = str_pad($no_surat,6,"0",STR_PAD_LEFT);
            $kodejadi  = "RSKI-SKD"."-".$bln_now."-".$kodemax;
            return $kodejadi;
        
    }

     function no_rujuk(){
        $this->db->select('substring(max(suratrujukan.no_surat), 8,4) as bln_surat ',false);            
        $this->db->limit(1);
        $query2 = $this->db->get('suratrujukan');
        $data2 = $query2->row();
        $bln_now = date("m")."".date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if($bln_now == $bln_db) {

            $this->db->select('right(max(suratrujukan.no_surat),6) as no_surat ',false);
            $this->db->limit(1);
            $this->db->where('substring(suratrujukan.no_surat,8,4) ='.$bln_now.'');
            $query = $this->db->get('suratrujukan');        


            if($query->num_rows()<>0){
                $data = $query->row();
                $no_surat = intval($data->no_surat)+1;
            }else{
                $no_surat = 1;

            }
            $kodemax = str_pad($no_surat,6,"0",STR_PAD_LEFT);
            $kodejadi  = "RSKI-R"."-".$bln_db."-".$kodemax;
            return $kodejadi;
        }
         else
            $this->db->select('right(max(suratrujukan.no_surat),6) as no_surat ',false);
            $this->db->limit(1);
            $this->db->where('substring(suratrujukan.no_surat,8,4) ='.$bln_now.'');
            $query = $this->db->get('suratrujukan');        


            if($query->num_rows()<>0){
                $data = $query->row();
                $no_surat = intval($data->no_surat)+1;
            }else{
                $no_surat = 1;

            }
            $kodemax = str_pad($no_surat,6,"0",STR_PAD_LEFT);
            $kodejadi  = "RSKI-R"."-".$bln_now."-".$kodemax;
            return $kodejadi;

    }

   function perbarui_suket( $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diag_primer,  $diag_sekunder,  $alasan, $rencana, $tgl_penggunaan, $status, $tgl_input, $user, $no_surat){  
    $data = array(
        'no_surat'=>$no_surat,
        'no_rm'=>$no_rm,
        'nama'=>$nama,
        'alamat'=>$alamat,
        'tgl_lahir'=>$tgl_lahir,
        'kelamin'=>$kelamin,
        'dokter'=>$dokter,
        'diag_primer'=>$diag_primer,
        'diag_sekunder'=>$diag_sekunder,
        'alasan'=>$alasan,
        'rencana'=>$rencana,
        'tgl_penggunaan'=>$tgl_penggunaan,
        'status'=>$status,
        'tgl_input'=>$tgl_input,
        'user'=>$user
       
    );    
        $this->db->where('no_surat', $no_surat);
        return $this->db->update('suratketerangan', $data); 
    
    }

    function perbarui_rujukan( $no_rm, $nama, $alamat, $tgl_lahir, $kelamin, $dokter, $diagnosa,  $obat,  $kepada, $tgl_balik, $keterangan, $status, $tgl_input, $user,$no_surat){  
    $data = array(
        'no_surat'=>$no_surat,
        'no_rm'=>$no_rm,
        'nama'=>$nama,
        'alamat'=>$alamat,
        'tgl_lahir'=>$tgl_lahir,
        'kelamin'=>$kelamin,
        'dokter'=>$dokter,
        'diagnosa'=>$diagnosa,
        'obat'=>$obat,
        'kepada'=>$kepada,
        'tgl_balik'=>$tgl_balik,
        'keterangan'=>$keterangan,
        'status'=>$status,
        'tgl_input'=>$tgl_input,
        'user'=>$user
       
    );    
        $this->db->where('no_surat', $no_surat);
        return $this->db->update('suratrujukan', $data); 
    
    }
    
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
   
}
