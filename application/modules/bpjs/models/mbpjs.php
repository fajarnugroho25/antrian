<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbpjs extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function tampilkan(){
        //$query = $this->db->get('bpjs');
        //return $query->result();    

        $this->db->select('*');
        $this->db->from('regpatient');
        $this->db->where('obat_ranap_temp', 'obat.kode_brg = obat_ranap_temp.kode_brg', 'inner');





        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT aa.kode_brg, cc.nama_brg, cc.kode_satuan, ff.golongan                    
                            FROM
                    gl_transdetail aa
                    LEFT JOIN barang_satuan bb ON (aa.kode_brg=bb.kode_brg AND aa.kode_satuan=bb.kode_satuan)
                    INNER JOIN mst_barang cc ON (aa.kode_brg=cc.kode_brg)
                    INNER JOIN mst_kel_brg ee ON (ee.kel_brg=cc.kel_brg AND ee.coa_inv=aa.coaid )
                    INNER JOIN mst_golongan ff ON(ff.kode_golongan=cc.kode_golbrg )
                    LEFT JOIN mst_setup_minimal dd ON(aa.kode_brg=dd.kode_brg AND aa.kode_gk=dd.kode_gk )                    
                    WHERE cc.is_aktif= 't'  AND dd.kode_gk=1  or dd.kode_gk=79                      
                                AND aa.kode_brg IS NOT NULL AND aa.kode_gk IS NOT NULL AND aa.vol IS NOT NULL AND aa.vol != 0
                                AND aa.reff_date IS NOT NULL AND aa.kode_satuan IS NOT NULL
                                AND aa.gttid IS NOT NULL                    
                    GROUP BY aa.coaid, aa.kode_brg, cc.nama_brg, cc.kode_satuan, cc.kode_golbrg, cc.is_aktif, ff.golongan ";
        $q = $otherdb->query($query);





        $query = $this->db->get();
        return $query->result();
        
    }
}