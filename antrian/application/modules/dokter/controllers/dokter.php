<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdokter');
        $this->load->model('menu/mmenu');
        $this->load->helper(array('url')); //load helper url  
    }

    public function data_resume_medis()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['resume'] = $this->mdokter->tampilkan_resume_medis();
            $isi =  $this->template->display('dokter/vdata_resume_medis', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function data_hasil_radiologi()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['rad'] = $this->mdokter->tampilkan_hasil_radiologi();
            $isi =  $this->template->display('dokter/vdata_hasil_radiologi', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambah_resume_medis()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mdokter->no_resume();
            $isi =  $this->template->display('dokter/vadd_resume_medis', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function edit_resume()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['resume'] = $this->mdokter->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('dokter/vadd_resume_medis', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function tambah_hasil_rad()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbpoli'] = $this->mdokter->combo_poli();
            $data['kodejadi'] = $this->mdokter->no_hasil_rad();
            $data['dpjp'] = $this->mdokter->dokter_pjp();
            $isi =  $this->template->display('dokter/vadd_hasil_rad', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function edit_hasil_rad()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbpoli'] = $this->mdokter->combo_poli();
            $data['rad'] = $this->mdokter->get_by_id_hasil($this->uri->segment(3));
            $isi =  $this->template->display('dokter/vadd_hasil_rad', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    #bridging pasien ke hisys
    function cek_hisys()
    {

        $no_rm = $_POST['no_rm'];

        function http_request($url)
        {
            // persiapkan curl
            $ch = curl_init();

            // set url 
            curl_setopt($ch, CURLOPT_URL, $url);

            // set user agent    
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

            // return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // otorisasi 
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E=",
                    "Cache-Control: no-cache",
                    "Postman-Token: 9ccd433e-68fc-431b-b143-0082c27a494d"
                )
            );



            // $output contains the output string 
            $output = curl_exec($ch);

            // tutup curl 
            curl_close($ch);

            // mengembalikan hasil curl
            return $output;
        }

        $profile = http_request("http://192.168.0.236/api.php?mod=api&cmd=get_patient&no_rm=" . $no_rm . "&return_type=json");

        // ubah string JSON menjadi array
        $profile = json_decode($profile, true);

        //$nama=$profile['data']['nama_pasien'];
        //$alamat=$profile['data']['alamat'];
        //$tgl_lahir=$profile['data']['tgl_lahir'];
        $jenis_kelamin = $profile['data']['jenis_kelamin'];
        if ($jenis_kelamin == 'm') {
            $kelamin = 'L';
        } else {
            $kelamin = 'P';
        }

        $data = array(
            'nama_pasien'      =>  $profile['data']['nama_pasien'],
            'alamat'      =>  $profile['data']['alamat'],
            'tgl_lahir'      =>  $profile['data']['tgl_lahir'],
            'telp'      =>  $profile['data']['telepon'],
            'jenis_kelamin'      =>  $kelamin,
        );
        echo json_encode($data);
    }

    public function tambah()
    {
        $id_resume =  $this->mdokter->no_resume('kodejadi');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $ruang = $this->input->post('ruang');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $diag_sementara = $this->input->post('diag_sementara');
        $sebab_dirawat = $this->input->post('sebab_dirawat');
        $penemuan_fisik = $this->input->post('penemuan_fisik');
        $diag_terpenting = $this->input->post('diag_terpenting');
        $terapi = $this->input->post('terapi');
        $diag_utama = $this->input->post('diag_utama');
        $diag_sekunder1 = $this->input->post('diag_sekunder1');
        $diag_sekunder2 = $this->input->post('diag_sekunder2');
        $diag_sekunder3 = $this->input->post('diag_sekunder3');
        $tindakan_dilakukan1 = $this->input->post('tindakan_dilakukan1');
        $tindakan_dilakukan2 = $this->input->post('tindakan_dilakukan2');
        $tindakan_dilakukan3 = $this->input->post('tindakan_dilakukan3');
        $diet = $this->input->post('diet');
        $anjuran_edukasi = $this->input->post('anjuran_edukasi');
        $kondisi_keluar = $this->input->post('kondisi_keluar');
        $id_dpjp = $this->input->post('id_dpjp');
        $status = $this->input->post('status');
        $tgl_input = $this->input->post('tgl_input');
        $user = $this->input->post('user');

        // Simpan Data
        $result = $this->mdokter->simpan($id_resume, $no_rm, $nama_pasien, $alamat, $tgl_lahir, $ruang, $tgl_masuk, $tgl_keluar, $diag_sementara, $sebab_dirawat, $penemuan_fisik, $diag_terpenting, $terapi, $diag_utama, $diag_sekunder1, $diag_sekunder2, $diag_sekunder3, $tindakan_dilakukan1, $tindakan_dilakukan2, $tindakan_dilakukan3, $diet, $anjuran_edukasi, $kondisi_keluar, $id_dpjp, $status, $tgl_input, $user);
        if ($result) {
            echo "<script>alert('Data Resume Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function perbarui()
    {
        $id_resume = $this->input->post('id_resume');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $ruang = $this->input->post('ruang');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $diag_sementara = $this->input->post('diag_sementara');
        $sebab_dirawat = $this->input->post('sebab_dirawat');
        $penemuan_fisik = $this->input->post('penemuan_fisik');
        $diag_terpenting = $this->input->post('diag_terpenting');
        $terapi = $this->input->post('terapi');
        $diag_utama = $this->input->post('diag_utama');
        $diag_sekunder1 = $this->input->post('diag_sekunder1');
        $diag_sekunder2 = $this->input->post('diag_sekunder2');
        $diag_sekunder3 = $this->input->post('diag_sekunder3');
        $tindakan_dilakukan1 = $this->input->post('tindakan_dilakukan1');
        $tindakan_dilakukan2 = $this->input->post('tindakan_dilakukan2');
        $tindakan_dilakukan3 = $this->input->post('tindakan_dilakukan3');
        $diet = $this->input->post('diet');
        $anjuran_edukasi = $this->input->post('anjuran_edukasi');
        $kondisi_keluar = $this->input->post('kondisi_keluar');
        $id_dpjp = $this->input->post('id_dpjp');
        $status = $this->input->post('status');
        $tgl_input = $this->input->post('tgl_input');
        $user = $this->input->post('user');

        // Simpan Data
        $result = $this->mdokter->perbarui($no_rm, $nama_pasien, $alamat, $tgl_lahir, $ruang, $tgl_masuk, $tgl_keluar, $diag_sementara, $sebab_dirawat, $penemuan_fisik, $diag_terpenting, $terapi, $diag_utama, $diag_sekunder1, $diag_sekunder2, $diag_sekunder3, $tindakan_dilakukan1, $tindakan_dilakukan2, $tindakan_dilakukan3, $diet, $anjuran_edukasi, $kondisi_keluar, $id_dpjp, $status, $tgl_input, $user, $id_resume);
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil diperbarui !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }


    public function tambahhasil()
    {
        $id_hasil_rad =  $this->mdokter->no_hasil_rad('kodejadi');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $poli = $this->input->post('poli');
        $kelamin = $this->input->post('kelamin');
        $no_photo = $this->input->post('no_photo');
        $tgl_pemeriksaan = $this->input->post('tgl_pemeriksaan');
        $dpjp_pengirim = $this->input->post('dpjp_pengirim');
        $pemeriksaan = $this->input->post('pemeriksaan');
        $hasil = $this->input->post('hasil');
        $penjamin = $this->input->post('penjamin');
        $status = $this->input->post('status');
        $tgl_input = $this->input->post('tgl_input');
        $user = $this->input->post('user');
        $JP = $this->input->post('JP');
        $lain = $this->input->post('lain');
        // var_dump($dpjp_pengirim);

        // Simpan Data
        $result = $this->mdokter->simpanhasil($id_hasil_rad, $no_rm, $nama_pasien, $alamat, $tgl_lahir, $poli, $kelamin, $no_photo, $tgl_pemeriksaan, $dpjp_pengirim, $pemeriksaan, $hasil, $penjamin, $status, $tgl_input, $user, $JP,$lain);
        if ($result) {
            echo "<script>alert('Data Hasil Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function perbaruihasil()
    {

        $id_hasil_rad = $this->input->post('id_hasil_rad');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $poli = $this->input->post('poli');
        $kelamin = $this->input->post('kelamin');
        $no_photo = $this->input->post('no_photo');
        $tgl_pemeriksaan = $this->input->post('tgl_pemeriksaan');
        $dpjp_pengirim = $this->input->post('dpjp_pengirim');
        $pemeriksaan = $this->input->post('pemeriksaan');
        $hasil = $this->input->post('hasil');
        $penjamin = $this->input->post('penjamin');
        $status = $this->input->post('status');
        $tgl_input = $this->input->post('tgl_input');
        $user = $this->input->post('user');
        $JP = $this->input->post('JP');
        $lain = $this->input->post('lain');

        // Simpan Data
        $result = $this->mdokter->perbaruihasil($no_rm, $nama_pasien, $alamat, $tgl_lahir, $poli, $kelamin, $no_photo, $tgl_pemeriksaan, $dpjp_pengirim, $pemeriksaan, $hasil, $penjamin, $status, $tgl_input, $user, $id_hasil_rad,$JP,$lain);
        if ($result) {
            echo "<script>alert('Data Hasil Berhasil diperbarui !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    function get_autocomplete_icd10()
    {

        $data = array();
        $icd10_name = $this->input->get('term');

        if (!empty($icd10_name)) {

            $result = $this->mdokter->search_icd10($icd10_name);

            if (count($result) > 0) {

                foreach ($result as $icd10) {
                    $aRow = array();
                    $aRow['label'] = $icd10->icd_nama;
                    $aRow['value'] = $icd10->icd_kode;

                    $data[] = $aRow;
                }
            }
        }

        echo json_encode($data);
    }


    function delete()
    {

        $this->mdokter->hapus($this->uri->segment(3));

        redirect('dokter/data_hasil_radiologi');
    }



    function get_autocomplete_icd9()
    {

        $data = array();
        $icd9_name = $this->input->get('term');

        if (!empty($icd9_name)) {

            $result = $this->mdokter->search_icd9($icd9_name);

            if (count($result) > 0) {

                foreach ($result as $icd9) {
                    $aRow = array();
                    $aRow['label'] = $icd9->icd_nama;
                    $aRow['value'] = $icd9->icd_kode;

                    $data[] = $aRow;
                }
            }
        }

        echo json_encode($data);
    }


    //////////////////////////////////////////PRINT RESUME MEDIS///////////////////////////////

    public function print_resume_medis()
    {

        if ($this->session->userdata('login') == true) {

            $data['resume'] = $this->mdokter->print_by_no_resume($this->uri->segment(3));
            $isi =  $this->template->display('print/vprint_resume', $data);
            $this->load->view('print/vprint_resume', $isi);
        } else {
            redirect('login');
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////   
    //////////////////////////////////////////PRINT RUJUKAN///////////////////////////////
    public function print_hasil_rad()
    {

        if ($this->session->userdata('login') == true) {

            $data['rad'] = $this->mdokter->print_by_no_hasil($this->uri->segment(3));
            $isi =  $this->template->display('print/vprint_radiologi', $data);
            $this->load->view('print/vprint_radiologi', $isi);
        } else {
            redirect('login');
        }
    }
}
