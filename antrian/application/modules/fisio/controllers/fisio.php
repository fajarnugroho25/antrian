<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fisio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfisio');
        $this->load->model('menu/mmenu');
    }

    public function datapasienfisio()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mfisio->tampilkan_pasien();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('fisio/vdatapasienfisio', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahpasien()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbpoli'] = $this->mfisio->combo_poli();
            $data['cbdokter'] = $this->mfisio->combo_dokter();
            $data['kodejadi'] = $this->mfisio->no_fisio();
            $data['cbpenanggung'] = $this->mfisio->combo_penanggung();
            $isi =  $this->template->display('fisio/vadd_pasien_fisio', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function editpasienfisio()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['fisio'] = $this->mfisio->get_by_id($this->uri->segment(3));
            $data['cbpoli'] = $this->mfisio->combo_poli();
            $data['cbdokter'] = $this->mfisio->combo_dokter();
            $data['cbpenanggung'] = $this->mfisio->combo_penanggung();
            $isi =  $this->template->display('fisio/vadd_pasien_fisio', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function tambah()
    {
        $id_fisio =  $this->mfisio->no_fisio('kodejadi');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $tgl_periksa = $this->input->post('tgl_periksa');
        $penanggung = $this->input->post('penanggung');
        $poliklinik = $this->input->post('poliklinik');
        $dokter = $this->input->post('dokter');
        $shift = $this->input->post('shift');
        $status = $this->input->post('status');
        $user = $this->input->post('user');

        // Simpan Data
        $result = $this->mfisio->simpan($id_fisio, $no_rm, $nama_pasien, $tgl_daftar, $tgl_periksa, $penanggung, $poliklinik, $dokter, $shift, $status,  $user);
        if ($result) {
            echo "<script>alert('Data Antrian Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function perbarui()
    {
        $id_fisio = $this->input->post('id_fisio');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_periksa = $this->input->post('tgl_periksa');
        $penanggung = $this->input->post('penanggung');
        $poliklinik = $this->input->post('poliklinik');
        $dokter = $this->input->post('dokter');
        $shift = $this->input->post('shift');
        $status = $this->input->post('status');
        $user = $this->input->post('user');

        // Simpan Data
        $result = $this->mfisio->perbarui($no_rm, $nama_pasien, $tgl_periksa, $penanggung, $poliklinik, $dokter, $shift, $status, $user, $id_fisio);
        if ($result) {
            echo "<script>alert('Data Antrian Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function laporan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbpoli'] = $this->mfisio->combo_poli();
            $data['cbpenanggung'] = $this->mfisio->combo_penanggung();
            $isi =  $this->template->display('fisio/ctk_laporan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function print_laporan()
    {
        $tgl_periksa = $this->input->post('tgl_periksa');
        $penanggung = $this->input->post('penanggung');
        $poliklinik =  $this->input->post('poliklinik');
        $shift =  $this->input->post('shift');

        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mfisio->tampilkan_laporan($tgl_periksa, $penanggung, $poliklinik, $shift);
            $isi =  $this->template->display('fisio/print/vprint_laporan', $data);
            $this->load->view('fisio/print/vprint_laporan', $isi);
        } else {
            redirect('clogin');
        }
    }

    function delete()
    {

        $this->mfisio->hapus($this->uri->segment(3));

        redirect('fisio/datapasienfisio');
    }

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
                    "Authorization: Basic YWRtZWRpa2E6YWRtZWRpa2E0cmVhbA==",
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
        //$jenis_kelamin=$profile['data']['jenis_kelamin'];
        //if($jenis_kelamin =='m'){$kelamin='L';} else {$kelamin='P';}

        $data = array(
            'nama_pasien'      =>  $profile['data']['nama_pasien'],
            // 'alamat'      =>  $profile['data']['alamat'],
            // 'tgl_lahir'      =>  $profile['data']['tgl_lahir'],
            // 'telp'      =>  $profile['data']['telepon'],
            // 'jenis_kelamin'      =>  $kelamin,
        );
        echo json_encode($data);
    }
}

