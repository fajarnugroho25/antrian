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


      function simpan($no_reg, $rm, $nama_pasien, $tgl_lahir, $alamat, $dpjp, $sep, $tagihan, $grouping, $icdix, $icdx, $catatan){   
        $data = array(
         'no_reg'=>$no_reg,
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
    
}