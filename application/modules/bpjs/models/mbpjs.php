<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbpjs extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function tampilkan(){
        
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(dpjp) as DPJP, MAX(reg_date) AS tgl_reg,  max(waktu) as masa_inap, SUM(ROUND(real_amount)) AS tagihan, 
                    max(room_prefix) as bangsal,  max(class_name) as kelas
                    FROM
                    (
                    
                    SELECT 
                    R.no_reg, R.regpid, R.pid, R.current_dept_nr, (CASE WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),3,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),1) 
                    WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),4,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),2) ELSE '1' END) AS waktu,
                    P.name_real, P.date_birth, (P.addr_str1 || P.kelurahan || P.kecamatan ||  P.kabupaten || P.addr_province) as alamat,
                    D.name_real AS dpjp,  to_char(R.reg_date, 'yyyy-mm-dd HH:mm:ss') AS reg_date, R.no_sep, T.description, (CASE WHEN (T.real_amount)  = 0 THEN (T.cost_dr + T.sales_rs) ELSE T.real_amount END) AS real_amount , 
                    H.room_prefix, C.class_name, B.hak_kelas_peserta
                    
                    FROM bill_patient_row T 
                    LEFT JOIN regpatient R ON R.regpid = T.regpid
                    LEFT JOIN person P ON P.pid = R.pid
                    LEFT JOIN person D ON D.pid = R.doctor_id
                    LEFT JOIN hotel_bed K ON  K.hbid = R.current_bed_nr
                    LEFT JOIN hotel_room H ON H.hrid = K.hrid
                    LEFT JOIN hotel_class C ON C.hcid = H.hcid
                    LEFT JOIN verifikasi_bpjs B ON B.regpid = R.regpid
                    WHERE   R.is_discharged = false AND R.is_inpatient = TRUE AND R.no_sep <> '' --R.no_reg = '2303200761' 
                    
                    ) G
                    GROUP BY no_reg ";
        $q = $otherdb->query($query);
        return $q->result();
        
    }
  

    function get_by_id($no_reg){
        
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(date_birth) as tgl_lahir, max(alamat) as alamat, 
                max(dpjp) as DPJP, MAX(reg_date) AS tgl_reg,  max(waktu) as masa_inap, max(no_sep) as SEP, SUM(ROUND(real_amount)) AS tagihan, 
                max(room_prefix) as bangsal,  max(class_name) as kelas, 
                max(hak_kelas_peserta) as hak_kelas
                FROM
                (
                
                SELECT 
                R.no_reg, R.regpid, R.pid, R.current_dept_nr, (CASE WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),3,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),1) 
                WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),4,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),2) ELSE '1' END) AS waktu,
                P.name_real, P.date_birth, (P.addr_str1 ||' '|| P.kelurahan ||' '|| P.kecamatan ||' '||   P.kabupaten ||' '|| P.addr_province) as alamat,
                D.name_real AS dpjp, to_char(R.reg_date, 'yyyy-mm-dd HH:mm:ss') AS reg_date, R.no_sep, T.description, (CASE WHEN (T.real_amount)  = 0 THEN (T.cost_dr + T.sales_rs) ELSE T.real_amount END) AS real_amount , 
                H.room_prefix, C.class_name, B.hak_kelas_peserta
                
                FROM bill_patient_row T 
                LEFT JOIN regpatient R ON R.regpid = T.regpid
                LEFT JOIN person P ON P.pid = R.pid
                LEFT JOIN person D ON D.pid = R.doctor_id
                LEFT JOIN hotel_bed K ON  K.hbid = R.current_bed_nr
                LEFT JOIN hotel_room H ON H.hrid = K.hrid
                LEFT JOIN hotel_class C ON C.hcid = H.hcid
                LEFT JOIN verifikasi_bpjs B ON B.regpid = R.regpid
                WHERE   R.is_discharged = false AND R.is_inpatient = TRUE AND R.no_sep <> '' AND R.no_reg = '{$no_reg}' --R.no_reg = '2303200761' 
                
                ) G
                GROUP BY no_reg ";
          
          $result = $otherdb->query($query);
          return $result->result();   
          
      }


      function simpan($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $tgl_reg, $masa_inap, $sep, $bangsal, $kelas, $hak_kelas, $tagihan, $grouping, $iur, $selisih_tagihan, $icdx, $icdx2, $icdx3, $icdx4, $icdix, $icdix2, $icdix3, $icdix4, $catatan){   
        $data = array(
         'no_reg'=>$no_reg1,
            'rm'=>$rm,
             'nama_pasien'=>$nama_pasien,
              'tgl_lahir'=>$tgl_lahir,
               'alamat'=>$alamat,
                'dpjp'=>$dpjp,
                'tgl_reg'=>$tgl_reg,
                'masa_inap'=>$masa_inap,
                'sep'=>$sep,
                'bangsal'=>$sep,
                'kelas'=>$kelas,
                'hak_kelas'=>$hak_kelas,
                'tagihan'=>$tagihan,
                'grouping'=>$grouping,
                'iur'=>$iur,
                'selisih_tagihan'=>$selisih_tagihan,
                'icdx'=>$icdx,
                'icdx_2'=>$icdx2,
                'icdx_3'=>$icdx3,
                'icdx_4'=>$icdx4,
                'icdix'=>$icdix,
                'icdix_2'=>$icdix2,
                'icdix_3'=>$icdix3,
                'icdix_4'=>$icdix4,
                'catatan'=>$catatan,
        
        );    
        $query = $this->db->insert('bpjs', $data);
        return $query;
        }

        function tampilkandatabpjs(){
            $query = $this->db->get('bpjs');
            return $query->result();    
            
        }
    
        function get_by_reg($no_reg){
            $this->db->where('no_reg', $no_reg);
            $query = $this->db->get('bpjs');
            return $query->result();    

          }

        
          function edit($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $iur, $selisih_tagihan, $icdx, $icdx2, $icdx3, $icdx4, $icdix, $icdix2, $icdix3, $icdix4, $catatan){   
            $data = array(
                 'rm'=>$rm,
                 'nama_pasien'=>$nama_pasien,
                  'tgl_lahir'=>$tgl_lahir,
                   'alamat'=>$alamat,
                    'dpjp'=>$dpjp,
                    'sep'=>$sep,
                    'tagihan'=>$tagihan,
                    'grouping'=>$grouping,
                    'iur'=>$iur,
                    'selisih_tagihan'=>$selisih_tagihan,
                    'icdx'=>$icdx,
                    'icdx_2'=>$icdx2,
                    'icdx_3'=>$icdx3,
                    'icdx_4'=>$icdx4,
                    'icdix'=>$icdix,
                    'icdix_2'=>$icdix2,
                    'icdix_3'=>$icdix3,
                    'icdix_4'=>$icdix4,
                    'catatan'=>$catatan,
            
            );    
            $this->db->where('no_reg', $no_reg1);
            return $this->db->update('bpjs', $data); 
            }

           
            function updatebpjsnow()
            {
                $otherdb = $this->load->database('otherdb', TRUE);
                $query = " SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(date_birth) as tgl_lahir, max(alamat) as alamat, 
                            max(dpjp) as DPJP, MAX(reg_date) AS tgl_reg,  max(waktu) as masa_inap, max(no_sep) as SEP, SUM(ROUND(real_amount)) AS tagihan, 
                            max(room_prefix) as bangsal,  max(class_name) as kelas, 
                            max(hak_kelas_peserta) as hak_kelas
                            FROM
                            (
                            
                            SELECT 
                            R.no_reg, R.regpid, R.pid, R.current_dept_nr, (CASE WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),3,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),1) 
                            WHEN SUBSTR(CAST( AGE(R.reg_date) AS TEXT ),4,1) =  'd' THEN LEFT(CAST(AGE(R.reg_date)AS TEXT ),2) ELSE '1' END) AS waktu,
                            P.name_real, P.date_birth, (P.addr_str1 ||' '|| P.kelurahan ||' '|| P.kecamatan ||' '||   P.kabupaten ||' '|| P.addr_province) as alamat,
                            D.name_real AS dpjp, to_char(R.reg_date, 'yyyy-mm-dd HH:mm:ss') AS reg_date, R.no_sep, T.description, (CASE WHEN (T.real_amount)  = 0 THEN (T.cost_dr + T.sales_rs) ELSE T.real_amount END) AS real_amount , 
                            H.room_prefix, C.class_name, B.hak_kelas_peserta
                            
                            FROM bill_patient_row T 
                            LEFT JOIN regpatient R ON R.regpid = T.regpid
                            LEFT JOIN person P ON P.pid = R.pid
                            LEFT JOIN person D ON D.pid = R.doctor_id
                            LEFT JOIN hotel_bed K ON  K.hbid = R.current_bed_nr
                            LEFT JOIN hotel_room H ON H.hrid = K.hrid
                            LEFT JOIN hotel_class C ON C.hcid = H.hcid
                            LEFT JOIN verifikasi_bpjs B ON B.regpid = R.regpid
                            WHERE   R.is_discharged = false AND R.is_inpatient = TRUE AND R.no_sep <> '' 
                            
                            ) G
                            GROUP BY no_reg  ";
                $q = $otherdb->query($query);
                if ($q->num_rows() > 0) {
                    $i = 0;
                    $quer_del = $this->db->empty_table('bpjs_temp'); //hapus semua data di tabel BPJS
                    foreach ($q->result() as $row) {
                        $data[] = $row;
        
                        $quer = $this->db->insert('bpjs_temp', $data[$i]); //isi data baru tabel BPJS
                        $i++;
                    }
        
                    $qwr= "UPDATE bpjs A, bpjs_temp B
                            SET A.no_reg = B.no_reg, A.rm = B.rm,
                            A.nama_pasien = B.nama_pasien, A.tgl_lahir = B.tgl_lahir, 
                            A.alamat = B.alamat, A.dpjp = B.dpjp, A.tgl_reg = B.tgl_reg,
                            A.masa_inap = B.masa_inap, A.sep = B.sep, A.tagihan = B.tagihan,
                            A.bangsal = B.bangsal, A.kelas = B.kelas, A.hak_kelas = B.hak_kelas
                            WHERE A.no_reg = B.no_reg ";
                    $qsyc = $this->db->query($qwr);
                        // if ($qsyc->num_rows() > 0) {
                        //     $i = 0;           
                        //     foreach ($qsyc->result() as $row) {
                        //         $data[] = $row;
                        //         $this->db->where('no_reg', $no_reg1);
                        //         $quer = $this->db->update('bpjs', $data[$i]); //isi data baru tabel BPJS
                        //         $i++;
                        //     }        
                        // }
                   
        }
    }

    function search_icd10($title)
    {
        $this->db->select('icd_nama,icd_kode');
        $this->db->like('icd_nama', $title);
        $this->db->or_like('icd_kode', $title);
        $this->db->order_by('icd_nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('icd10')->result();
    }

    function search_icd9($title)
    {
        $this->db->select('icd_nama,icd_kode');
        $this->db->like('icd_nama', $title);
        $this->db->or_like('icd_kode', $title);
        $this->db->order_by('icd_nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('icd9')->result();
    }

 }