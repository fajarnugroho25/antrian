<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbpjs extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function tampilkan(){
        
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(date_birth) as tgl_lahir, max(alamat) as alamat, 
                    max(dpjp) as DPJP, max(no_sep) as SEP, SUM(real_amount) AS tagihan
                    FROM
                    (
                    SELECT 
                    R.no_reg, R.regpid, R.pid, R.current_dept_nr, 
                    P.name_real, P.date_birth, (P.addr_str1 || P.kelurahan || P.kecamatan ||  P.kabupaten || P.addr_province) as alamat,
                    R.doctor_id, D.name_real AS dpjp, R.reg_date, R.no_sep, T.description, T.real_amount
                    
                    
                    FROM regpatient R 
                    LEFT JOIN person P ON P.pid = R.pid
                    LEFT JOIN person D ON D.pid = R.doctor_id
                    LEFT JOIN bill_patient_row T ON T.no_reg = R.no_reg
                    
                    WHERE  R.is_discharged = false AND R.is_inpatient = true
                    
                    ) G
                    GROUP BY no_reg ";
        $q = $otherdb->query($query);
        return $q->result();
        
    }
  

    function get_by_id($no_reg){
        
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = "SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(date_birth) as tgl_lahir, max(alamat) as alamat, 
                    max(dpjp) as DPJP, max(no_sep) as SEP, SUM(real_amount) AS tagihan
                    FROM
                    (
                    SELECT 
                    R.no_reg, R.regpid, R.pid, R.current_dept_nr, 
                    P.name_real, P.date_birth, (P.addr_str1 || P.kelurahan || P.kecamatan ||  P.kabupaten || P.addr_province) as alamat,
                    R.doctor_id, D.name_real AS dpjp, R.reg_date, R.no_sep, T.description, T.real_amount
                    
                    
                    FROM regpatient R 
                    LEFT JOIN person P ON P.pid = R.pid
                    LEFT JOIN person D ON D.pid = R.doctor_id
                    LEFT JOIN bill_patient_row T ON T.no_reg = R.no_reg
                    
                    WHERE  R.is_discharged = false AND R.is_inpatient = true AND R.no_reg = '{$no_reg}'
                    
                    ) G
                    GROUP BY no_reg ";
          
          $result = $otherdb->query($query);
          return $result->result();   
          
      }


      function simpan($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan){   
        $data = array(
         'no_reg'=>$no_reg1,
            'rm'=>$rm,
             'nama_pasien'=>$nama_pasien,
              'tgl_lahir'=>$tgl_lahir,
               'alamat'=>$alamat,
                'dpjp'=>$dpjp,
                'sep'=>$sep,
                'tagihan'=>$tagihan,
                'grouping'=>$grouping,
                'icdix'=>$icdix,
                'icdx'=>$icdx,
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

          function get_by_reg1($no_reg1){
            $this->db->select('no_reg');
            $this->db->where('no_reg', $no_reg1);
            $query = $this->db->get('bpjs');
            return $query->result();    
              
          }

          function edit($no_reg1, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan){   
            $data = array(
                 'rm'=>$rm,
                 'nama_pasien'=>$nama_pasien,
                  'tgl_lahir'=>$tgl_lahir,
                   'alamat'=>$alamat,
                    'dpjp'=>$dpjp,
                    'sep'=>$sep,
                    'tagihan'=>$tagihan,
                    'grouping'=>$grouping,
                    'icdix'=>$icdix,
                    'icdx'=>$icdx,
                    'catatan'=>$catatan,
            
            );    
            $this->db->where('no_reg', $no_reg1);
            return $this->db->update('bpjs', $data); 
            }

           
            function updatebpjsnow()
            {
                // $otherdb = $this->load->database('otherdb', TRUE);
                // $query = "SELECT no_reg, max(pid) as RM, max(name_real) as nama_pasien, max(date_birth) as tgl_lahir, max(alamat) as alamat, 
                //              max(dpjp) as DPJP, max(no_sep) as SEP, SUM(real_amount) AS tagihan
                //             FROM
                //             (
                //             SELECT 
                //             R.no_reg, R.regpid, R.pid, R.current_dept_nr, 
                //             P.name_real, P.date_birth, (P.addr_str1 || P.kelurahan || P.kecamatan ||  P.kabupaten || P.addr_province) as alamat,
                //             R.doctor_id, D.name_real AS dpjp, R.reg_date, R.no_sep, T.description, T.real_amount
                            
                            
                //             FROM regpatient R 
                //             LEFT JOIN person P ON P.pid = R.pid
                //             LEFT JOIN person D ON D.pid = R.doctor_id
                //             LEFT JOIN bill_patient_row T ON T.no_reg = R.no_reg
                            
                //             WHERE  R.is_discharged = false AND R.is_inpatient = true
                            
                //             ) G
                //             GROUP BY no_reg  ";
                // $q = $otherdb->query($query);
                // if ($q->num_rows() > 0) {
                //     $i = 0;
                //     $quer_del = $this->db->empty_table('bpjs_temp'); //hapus semua data di tabel BPJS
                //     foreach ($q->result() as $row) {
                //         $data[] = $row;
        
                //         $quer = $this->db->insert('bpjs_temp', $data[$i]); //isi data baru tabel BPJS
                //         $i++;
                //     }
        
                    $qwr= "UPDATE bpjs A, bpjs_temp B
                            SET A.no_reg = B.no_reg, A.rm = B.rm,
                            A.nama_pasien = B.nama_pasien, A.tgl_lahir = B.tgl_lahir, 
                            A.alamat = B.alamat, A.dpjp = B.dpjp,
                            A.sep = B.sep, A.tagihan = B.tagihan
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