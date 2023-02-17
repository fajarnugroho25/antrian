<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpasien');
        $this->load->model('menu/mmenu');
    }

    public function datapasien()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mpasien->tampilkan();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pasien/vdatapasien', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function datapasien_sudah_panggil()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mpasien->tampilkan_sudah_panggil();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pasien/vdatapasien_sudah_panggil', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function datapasien_sudah_op()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mpasien->tampilkan_sudah_op();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pasien/vdatapasien_sudah_op', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function datapasien_batal()
    {
        if ($this->session->userdata('login') == true) {
            $data['pasien'] = $this->mpasien->tampilkan_batal();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('pasien/vdatapasien_batal', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    # fungsi untuk mengecek status username dari db
    function cek_status_rm()
    {
        # ambil username dari form
        $no_rm = $_POST['no_rm'];
        $dokter = $_POST['dokter'];

        # select ke model member username yang diinput user
        $hasil_no_rm = $this->mpasien->cek_rm($no_rm, $dokter);



        # pengecekan value $hasil_no_rm
        if (count($hasil_no_rm) != 0) {
            # kalu value $hasil_no_rm tidak 0
            # echo 1 untuk pertanda rm sudah ada pada db    
            echo "1";
        } else {
            # kalu value $hasil_no_rm = 0
            # echo 2 untuk pertanda rm belum ada pada db
            echo "2";
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
        $jenis_kelamin = $profile['data']['jenis_kelamin'];
        if ($jenis_kelamin == 'm') {
            $kelamin = 'L';
        } else {
            $kelamin = 'P';
        }

        $data = array(
            'nama'      =>  $profile['data']['nama_pasien'],
            'alamat'      =>  $profile['data']['alamat'],
            'tgl_lahir'      =>  $profile['data']['tgl_lahir'],
            'telp'      =>  $profile['data']['telepon'],
            'jenis_kelamin'      =>  $kelamin,
        );
        echo json_encode($data);
    }

    public function tambahpasien()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mpasien->code_pasien();
            $data['combo'] = $this->mpasien->combo_operasi();
            $data['cbdokter'] = $this->mpasien->combo_dokter();
            $data['cbkelas'] = $this->mpasien->combo_kelas();
            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();
            $data['cbpenanggung'] = $this->mpasien->combo_penanggung();
            $isi =  $this->template->display('pasien/vtambahpasien', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function editpasien()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['combo'] = $this->mpasien->combo_operasi();
            $data['cbdokter'] = $this->mpasien->combo_dokter();
            $data['pasien'] = $this->mpasien->get_by_id($this->uri->segment(3));
            $data['cbkelas'] = $this->mpasien->combo_kelas();
            $data['cbkelasminta'] = $this->mpasien->combo_kelas_minta();
            $data['cbpenanggung'] = $this->mpasien->combo_penanggung();
            $isi =  $this->template->display('pasien/vtambahpasien', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambah()
    {
        $id =  $this->mpasien->code_pasien('kodejadi');
        $no_rm = $this->input->post('no_rm');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $telp = $this->input->post('telp');
        $telp2 = $this->input->post('telp2');
        $kelamin = $this->input->post('kelamin');
        $keluarga_dekat = $this->input->post('keluarga_dekat');
        $operasi = $this->input->post('operasi');
        $dokter = $this->input->post('dokter');
        $status = $this->input->post('status');
        $tgl_antri = $this->input->post('tgl_antri');
        $tgl_permintaan = $this->input->post('tgl_permintaan');

        $prioritas = $this->input->post('prioritas');
        $ket_prioritas = $this->input->post('ket_prioritas');
        $ket_panggilan = $this->input->post('ket_panggilan');
        $hak_kelas = $this->input->post('hak_kelas');
        $kelas_diminta = $this->input->post('kelas_diminta');
        $tgl_realisasi = $this->input->post('tgl_realisasi');
        $tgl_realisasi = $this->input->post('tgl_realisasi');
        $penanggung = $this->input->post('penanggung');
        $diagnosa = $this->input->post('diagnosa');
        $user = $this->input->post('user');


        if ($this->input->post('no_rm') == '') {
            echo "<script>alert('Ups, no_rm Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('nama') == '') {
            echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('alamat') == '') {
            echo "<script>alert('Ups, alamat Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('telp') == '') {
            echo "<script>alert('Ups, telp Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('operasi') == '') {
            echo "<script>alert('Ups, operasi Masih Kosong !'); history.go(-1);</script>";
        }
        // Simpan Data
        $result = $this->mpasien->simpan($id, $no_rm, $nama, $alamat, $tgl_lahir, $telp, $telp2, $keluarga_dekat, $kelamin, $operasi, $dokter, $status,  $tgl_antri,  $tgl_permintaan, $prioritas, $ket_prioritas, $ket_panggilan, $hak_kelas, $kelas_diminta,  $tgl_realisasi,  $penanggung, $diagnosa, $user);
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }


    public function perbarui()
    {
        $id = $this->input->post('id');
        $no_rm = $this->input->post('no_rm');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $telp = $this->input->post('telp');
        $telp2 = $this->input->post('telp2');
        $kelamin = $this->input->post('kelamin');
        $keluarga_dekat = $this->input->post('keluarga_dekat');
        $operasi = $this->input->post('operasi');
        $dokter = $this->input->post('dokter');
        $status = $this->input->post('status');
        //$tgl_antri = $this->input->post('tgl_antri');
        $tgl_permintaan = $this->input->post('tgl_permintaan');

        $prioritas = $this->input->post('prioritas');
        $ket_prioritas = $this->input->post('ket_prioritas');
        $ket_panggilan = $this->input->post('ket_panggilan');
        $hak_kelas = $this->input->post('hak_kelas');
        $tgl_realisasi = $this->input->post('tgl_realisasi');
        $kelas_diminta = $this->input->post('kelas_diminta');
        $penanggung = $this->input->post('penanggung');
        $diagnosa = $this->input->post('diagnosa');
        $user = $this->input->post('user');


        if ($this->input->post('id') == '') {
            echo "<script>alert('Ups, Kode Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('nama') == '') {
            echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('alamat') == '') {
            echo "<script>alert('Ups, alamat Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('telp') == '') {
            echo "<script>alert('Ups, telp Masih Kosong !'); history.go(-1);</script>";
        } else if ($this->input->post('operasi') == '') {
            echo "<script>alert('Ups, operasi Masih Kosong !'); history.go(-1);</script>";
        }
        // Simpan Data
        $result = $this->mpasien->perbarui($no_rm, $nama, $alamat, $tgl_lahir, $telp, $telp2, $keluarga_dekat, $kelamin, $operasi, $dokter, $status,  $tgl_permintaan, $prioritas, $ket_prioritas, $ket_panggilan, $hak_kelas, $kelas_diminta, $tgl_realisasi, $penanggung, $diagnosa, $user, $id);
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil diperbarui !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }


    function delete()
    {

        $this->mpasien->hapus($this->uri->segment(3));

        redirect('chome/datapasien');
    }
}
