<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mstokobat extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function simpan($nama_dokter, $id)
    {
        $data = array(
            'nama_dokter' => $nama_dokter,
            'id' => $id

        );
        $query = $this->db->insert('dokter', $data);

        return $query;
    }

    function tampilkan()
    {

        $query = $this->db->get('obat');
        return $query->result();
    }

    function tampilkanstokranap()
    {

        $this->db->select('*,obat.kode_brg, obat.nama_brg,');
        $this->db->from('obat');
        $this->db->join('obat_ranap_temp', 'obat.kode_brg = obat_ranap_temp.kode_brg', 'inner');

        $query = $this->db->get();
        return $query->result();
    }

    function tampilkanstokrajal()
    {

        $this->db->select('*,obat.kode_brg, obat.nama_brg,');
        $this->db->from('obat');
        $this->db->join('obat_rajal_temp', 'obat.kode_brg = obat_rajal_temp.kode_brg', 'inner');

        $query = $this->db->get();
        return $query->result();
    }


    function hitungulang()
    {

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
        if ($q->num_rows() > 0) {
            $i = 0;
            $quer_del = $this->db->empty_table('obat_temp'); //hapus semua data di tabel obat
            foreach ($q->result() as $row) {
                $data[] = $row;

                $quer = $this->db->insert('obat_temp', $data[$i]); //isi data baru tabel obat
                $i++;
            }

            $qwr= "SELECT kode_brg,nama_brg,kode_satuan,golongan,leadtime FROM obat_temp WHERE kode_brg NOT IN (SELECT kode_brg FROM obat)";
        $qsyc = $this->db->query($qwr);
        if ($qsyc->num_rows() > 0) {
            $i = 0;           
            foreach ($qsyc->result() as $row) {
                $data[] = $row;
                $quer = $this->db->insert('obat', $data[$i]); //isi data baru tabel obat
                $i++;
            }        
        }
            return $data;
        }

 
    }

    // function hitungulang()
    // {

    //     $otherdb = $this->load->database('otherdb', TRUE);
    //     $query = "SELECT aa.kode_brg, cc.nama_brg, cc.kode_satuan, ff.golongan                    
    //                         FROM
    //                 gl_transdetail aa
    //                 LEFT JOIN barang_satuan bb ON (aa.kode_brg=bb.kode_brg AND aa.kode_satuan=bb.kode_satuan)
    //                 INNER JOIN mst_barang cc ON (aa.kode_brg=cc.kode_brg)
    //                 INNER JOIN mst_kel_brg ee ON (ee.kel_brg=cc.kel_brg AND ee.coa_inv=aa.coaid )
    //                 INNER JOIN mst_golongan ff ON(ff.kode_golongan=cc.kode_golbrg )
    //                 LEFT JOIN mst_setup_minimal dd ON(aa.kode_brg=dd.kode_brg AND aa.kode_gk=dd.kode_gk )                    
    //                 WHERE cc.is_aktif= 't'  AND dd.kode_gk=1  or dd.kode_gk=79                      
    //                             AND aa.kode_brg IS NOT NULL AND aa.kode_gk IS NOT NULL AND aa.vol IS NOT NULL AND aa.vol != 0
    //                             AND aa.reff_date IS NOT NULL AND aa.kode_satuan IS NOT NULL
    //                             AND aa.gttid IS NOT NULL                    
    //                 GROUP BY aa.coaid, aa.kode_brg, cc.nama_brg, cc.kode_satuan, cc.kode_golbrg, cc.is_aktif, ff.golongan ";
    //     $q = $otherdb->query($query);
    //     if ($q->num_rows() > 0) {
    //         $i = 0;
    //         $quer_del = $this->db->empty_table('obat_temp'); //hapus semua data di tabel obat
    //         foreach ($q->result() as $row) {
    //             $data[] = $row;

    //             $quer = $this->db->insert('obat_temp', $data[$i]); //isi data baru tabel obat
    //             $i++;
    //         }

    //         return $data;
    //     }
    // }

    function hitungulangtemp($tgl,$gudang)

    {


        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT aa.kode_brg, cc.nama_brg, cc.kode_satuan, ff.golongan,

                        ABS(ROUND((SUM(CASE WHEN aa.vol <= 0
                    AND date(aa.trans_date) BETWEEN date('$tgl') - interval '3 month' AND date('$tgl')
                    THEN aa.vol ELSE 0 END )))) AS total3bln,
                    
                        ABS(ROUND((SUM(CASE WHEN aa.vol <= 0
                    AND date(aa.trans_date) BETWEEN date('$tgl') - interval '3 month' AND date('$tgl')
                    THEN aa.vol ELSE 0 END ))/90, 2)) AS rata3Bln,     
                    
                    SUM(aa.vol*bb.isikecil)::NUMERIC(8,2) AS stok
                            FROM
                        gl_transdetail aa
                        LEFT JOIN barang_satuan bb ON (aa.kode_brg=bb.kode_brg AND aa.kode_satuan=bb.kode_satuan)
                        INNER JOIN mst_barang cc ON (aa.kode_brg=cc.kode_brg)
                        INNER JOIN mst_kel_brg ee ON (ee.kel_brg=cc.kel_brg AND ee.coa_inv=aa.coaid )
                        INNER JOIN mst_golongan ff ON(ff.kode_golongan=cc.kode_golbrg )
                        LEFT JOIN mst_setup_minimal dd ON(aa.kode_brg=dd.kode_brg AND aa.kode_gk=dd.kode_gk )
                        
                        WHERE cc.is_aktif= 't'  AND dd.kode_gk=$gudang
                        AND date(aa.trans_date) <= date('$tgl')
                                AND aa.kode_brg IS NOT NULL AND aa.kode_gk IS NOT NULL AND aa.vol IS NOT NULL AND aa.vol != 0
                                AND aa.reff_date IS NOT NULL AND aa.kode_satuan IS NOT NULL
                                AND aa.gttid IS NOT NULL

                        
                GROUP BY aa.kode_brg, cc.nama_brg, cc.kode_satuan, ff.golongan ";
        $q = $otherdb->query($query);
        if ($q->num_rows() > 0) {
            $i = 0;
            if($gudang==1){$gd='obat_ranap_temp';} else if($gudang=79){$gd='obat_rajal_temp';}

            $quer_del = $this->db->empty_table($gd); //hapus semua data di tabel obat
            foreach ($q->result() as $row) {
                $data[] = $row;

                $quer = $this->db->insert($gd, $data[$i]); //isi data baru tabel obat
                $i++;
            }

            return $data;
        }
    }

    function get_by_id($kode_brg)
    {
        $this->db->where('kode_brg', $kode_brg);
        $query = $this->db->get('obat');
        return $query->result();
    }

    function perbarui($leadtime, $kode_brg)
    {
        $data = array(
            'leadtime' => $leadtime

        );
        $this->db->where('kode_brg', $kode_brg);
        return $this->db->update('obat', $data);
    }
}
