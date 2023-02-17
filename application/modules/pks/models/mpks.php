<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mpks extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($ket, $jenis, $akhir, $mulai, $perusahaan, $id_pks){   
    $data = array(
	 'id_pks'=>$id_pks,
        'perusahaan'=>$perusahaan,
		 'mulai'=>$mulai,
		  'akhir'=>$akhir,
		   'jenis'=>$jenis,
		    'ket'=>$ket,
    
    );    
    $query = $this->db->insert('pks', $data);
    
    return $query;
    }
    
    function tampilkan(){
        $query = $this->db->get('pks');
        return $query->result();    
        
    }
    
    function get_by_id($id_pks){
        $this->db->where('id_pks', $id_pks);
        $query = $this->db->get('pks');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id_pks', $id_pks);
        $query = $this->db->delete('perusahaan');
        return $query;
    }
    
 
     function code_otomatis(){
            $this->db->select('Right(id_pks,6) as id_pks ',false);
            $this->db->order_by('id_pks', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pks');
            if($query->num_rows()<>0){
                $data = $query->row();
                $id_pks = intval($data->id_pks)+1;
            }else{
                $id_pks = 1;

            }
            $kodemax = str_pad($id_pks,6,"0",STR_PAD_LEFT);
            $kodejadi  = "PKS".$kodemax;
            return $kodejadi;

    }


  function combo_jenis()
    {
        $query = "select * from jenis_pks order by jenis asc";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

   function perbarui($ket, $jenis, $akhir, $mulai, $perusahaan, $id_pks){   
    $data = array(
        'perusahaan'=>$perusahaan,
		 'mulai'=>$mulai,
		  'akhir'=>$akhir,
		   'jenis'=>$jenis,
		    'ket'=>$ket
			 
    );    
        $this->db->where('id_pks', $id_pks);
        return $this->db->update('pks', $data); 
    
    }
    
    
   
}
