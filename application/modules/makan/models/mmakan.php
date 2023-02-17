<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mmakan extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function simpan($nik, $id_trans, $waktu, $keterangan, $nama)
    {

        $data = array(
            'nik' => $nik,
            'id_trans' => $id_trans,
            'waktu' => $waktu,
            'keterangan' => $keterangan,
            'nama' => $nama

        );

        $tgl = date("d");
        $bln = date("m");
        $tahun = date("Y");
       
        $dbsqlsrv = $this->load->database('dbsqlsrv', TRUE);

        $qkaryawan = "SELECT karynama from Karyawan where KaryNomor='$nik'";
        $qmakan = "SELECT * from karyawan_makan where KaryNomor='$nik'";
        $qsudahmakan = "SELECT * from absensi_makan where nik='$nik' AND DAY(waktu)='$tgl'  AND month(waktu)='$bln'  AND year(waktu)='$tahun' ";
       

        $qkary = $dbsqlsrv->query($qkaryawan);
       
        $qmak = $dbsqlsrv->query($qmakan);
        $qsdmakan = $this->db->query($qsudahmakan);
        
        if ($qkary->num_rows() > 0  ) {
            if ($qmak->num_rows() > 0) {
                if ($qsdmakan->num_rows() > 0) {

                    echo "<script>
                    new Audio('/antrian/public/audio/sudah.mp3').play();
                    alert('Anda Sudah Tercatat Mengambil Jatah Makan Hari Ini !'); 
                    new Audio('/antrian/public/audio/adjustment.mp3').play();
                    if (confirm('Klik OK Untuk Melakukan Adjustment !'))  {
                        // Save it!                        
                        window.location.href = 'tambahmakanadj?nik=$nik';
                        console.log('Thing was saved to the database.');                        
                    } else  { 
                        // Do nothing!
                        history.go(-1);
                        console.log('Thing was not saved to the database.');
                    }
                    
                    </script>";
                    exit;
                }             

                $query = $this->db->insert('absensi_makan', $data);               
                return $query;
               
            }
            echo "<script>
            new Audio('/antrian/public/audio/tidak.mp3').play();
            alert('Tidak Terjadwal Makan Hari Ini !'); 
            new Audio('/antrian/public/audio/adjustment.mp3').play();
            if (confirm('Klik OK Untuk Melakukan Adjustment !')) {
                // Save it!
                window.location.href = 'tambahmakanadj?nik=$nik';
                console.log('Thing was saved to the database.');
              } else {
                 history.go(-1);
                // Do nothing!
                console.log('Thing was not saved to the database.');
              }
            </script>";
        }
        echo "<script>
        new Audio('/antrian/public/audio/bukan.mp3').play();
        alert('Tidak Terdaftar Sebagai Karyawan !'); 
        new Audio('/antrian/public/audio/adjustment.mp3').play();
        if (confirm('Klik OK Untuk Melakukan Adjustment !')) {
            // Save it!
            window.location.href = 'tambahmakanadj?nik=$nik';
            console.log('Thing was saved to the database.');
          } else {
            history.go(-1);
            // Do nothing!
            console.log('Thing was not saved to the database.');
          }
       </script>";
    }


    function simpanadj($nik, $id_trans, $waktu, $keterangan, $nama)
    {
        $data = array(
            'nik' => $nik,
            'id_trans' => $id_trans,
            'waktu' => $waktu,
            'keterangan' => $keterangan,
            'nama' => $nama


        );
        $query = $this->db->insert('absensi_makan', $data);
        return $query;
    }

    function tampilkan()
    {
        $datenow =  date("Y-m-d");       
        $qtampilabsen = "SELECT *, absensi_makan.nik as absnik from absensi_makan where date(waktu)='$datenow'";
        $qtampil = $this->db->query($qtampilabsen);
        
        
        return $qtampil->result();
    }

    function ambil_nama($nik)
    {

        $dbsqlsrv = $this->load->database('dbsqlsrv', TRUE);
        $qkaryawan = "SELECT karynama from Karyawan where KaryNomor='$nik'";  
        $qkary = $dbsqlsrv->query($qkaryawan);
        return $qkary->result();
        
    }

    

    function no_trans_makan()
    {

        $this->db->select('substring(max(absensi_makan.id_trans), 8,8) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('absensi_makan');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(absensi_makan.id_trans),8) as id_permintaan ', false);
            $this->db->limit(1);
            $this->db->where('substring(absensi_makan.id_trans,4,4) =' . $bln_now . '');
            $query = $this->db->get('absensi_makan');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_trans = intval($data->id_trans) + 1;
            } else {
                $id_trans = 1;
            }
            $kodemax = str_pad($id_trans, 8, "0", STR_PAD_LEFT);
            $kodejadi  = "MK" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(absensi_makan.id_trans),8) as id_trans ', false);
        $this->db->limit(1);
        $this->db->where('substring(absensi_makan.id_trans,4,4) =' . $bln_now . '');
        $query = $this->db->get('absensi_makan');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_trans = intval($data->id_trans) + 1;
        } else {
            $id_trans = 1;
        }
        $kodemax = str_pad($id_trans, 8, "0", STR_PAD_LEFT);
        $kodejadi  = "MK" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
    }
}
