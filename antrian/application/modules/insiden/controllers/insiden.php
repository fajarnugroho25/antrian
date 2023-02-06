<?php
defined('BASEPATH') or exit('No direct script access allowed');

class insiden extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('minsiden');
        $this->load->model('menu/mmenu');
    }

    public function datainsiden()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['datainsiden'] = $this->minsiden->tampilkan();
            $isi =  $this->template->display('insiden/vdatainsiden', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function laporan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data['laporaninsiden'] = $this->minsiden->tampil_laporan($tgl_awal, $tgl_akhir);
            $isi =  $this->template->display('insiden/vlaporanfilter', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function load_laporan()
    {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $tgl_1 = $this->input->post('tgl_1');
        $tgl_2 = $this->input->post('tgl_2');
        $jenis =  $this->input->post('jenis');


        if ($this->session->userdata('login') == true) {
            $data['laporaninsiden'] = $this->minsiden->tampilkan_laporan($tgl_1, $tgl_2, $jenis);
            if ($jenis == 'ALL') {
                $data['menu_list'] = $this->mmenu->tampilkan();
                $data['submenu_list'] = $this->mmenu->tampilkansub();
                $isi =  $this->template->display('insiden/vlaporan', $data);               
                $this->load->view('admin/vutama', $isi);
               
            } else {
                $isi =  $this->template->display('perbaikan/print/vprint_lap_perbaikan', $data);
                $this->load->view('perbaikan/print/vprint_lap_perbaikan', $isi);
            }
        } else {
            redirect('login');
        }
    }


      public function datak3()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['datak3'] = $this->minsiden->tampilkank3();
            $isi =  $this->template->display('insiden/vdatak3', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

     public function laporank3()
    {
        

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('insiden/vlaporank3filter', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function load_laporank3()
    {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $tgl_1 = $this->input->post('tgl_1');
        $tgl_2 = $this->input->post('tgl_2');
        $kejadian = $this->input->post('kejadian');

        if ($this->session->userdata('login') == true) {
            $data['laporank3'] = $this->minsiden->tampilkan_laporank3($tgl_1, $tgl_2, $kejadian);
            if ($kejadian == 'ALL') {
                $data['menu_list'] = $this->mmenu->tampilkan();
                $data['submenu_list'] = $this->mmenu->tampilkansub();
                $isi =  $this->template->display('insiden/vlaporank3', $data);               
                $this->load->view('admin/vutama', $isi);
               
            } else {
                $isi =  $this->template->display('perbaikan/print/vprint_lap_perbaikan', $data);
                $this->load->view('perbaikan/print/vprint_lap_perbaikan', $isi);
            }
        } else {
            redirect('login');
        }
    }

    public function databudayakeselamatan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['databudaya'] = $this->minsiden->tampilkanbudaya();
            $isi =  $this->template->display('insiden/vdatabudaya', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

     public function laporanbudayakeselamatan()
    {
        

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('insiden/vlaporanbudayafilter', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

     public function load_laporanbudaya()
    {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $tgl_1 = $this->input->post('tgl_1');
        $tgl_2 = $this->input->post('tgl_2');
        $kejadian = $this->input->post('kejadian');

        if ($this->session->userdata('login') == true) {
            $data['laporanbudaya'] = $this->minsiden->tampilkan_laporanbudaya($tgl_1, $tgl_2, $kejadian);
            if ($kejadian == 'ALL') {
                $data['menu_list'] = $this->mmenu->tampilkan();
                $data['submenu_list'] = $this->mmenu->tampilkansub();
                $isi =  $this->template->display('insiden/vlaporanbudaya', $data);               
                $this->load->view('admin/vutama', $isi);
               
            } else {
                $isi =  $this->template->display('perbaikan/print/vprint_lap_perbaikan', $data);
                $this->load->view('perbaikan/print/vprint_lap_perbaikan', $isi);
            }
        } else {
            redirect('login');
        }
    }

      public function datapajanan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $tgl_awal = $this->input->post('tgl_awal');
            $data['datapajanan'] = $this->minsiden->tampilkanpajanan($tgl_awal);
            $isi =  $this->template->display('insiden/vdatapajanan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function forminsiden()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['insiden'] = $this->minsiden->tampilkan();
            $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbunit2'] = $this->minsiden->combo_unit();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            $data['kodejadi'] = $this->minsiden->id_insiden();
            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

      public function forminsidenk3()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['insiden'] = $this->minsiden->tampilkan();
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbkejadian'] = $this->minsiden->combo_kejadian();
        $data['kodejadi'] = $this->minsiden->id_laporan();
        $isi =  $this->template->display('insiden/vaddk3', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    public function formbudayakeselamatan()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['insiden'] = $this->minsiden->tampilkan();
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbbudaya'] = $this->minsiden->combo_budaya();
        $data['kodejadi'] = $this->minsiden->id_budaya();
        $isi =  $this->template->display('insiden/vaddbudaya', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

     public function formpajananA()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['insiden'] = $this->minsiden->tampilkan();
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['kodejadi'] = $this->minsiden->id_pajanan();
        $isi =  $this->template->display('insiden/vaddpajanan', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }

    }
     public function formpajananB()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['insiden'] = $this->minsiden->tampilkan();
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbbudaya'] = $this->minsiden->combo_budaya();
        $data['kodejadi'] = $this->minsiden->id_budaya();
        $isi =  $this->template->display('insiden/vaddbudaya', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    public function tambah()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $nama_pasien = $this->input->post('nama_pasien');
        $no_rm = $this->input->post('no_rm');
        $ruangan = $this->input->post('ruangan');
        $umur = $this->input->post('umur');
        $kelompokumur = $this->input->post('kelompok_umur');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $penanggung = $this->input->post('penanggung');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $pembuat = $this->input->post('pembuat');
        $tgl_insiden = $this->input->post('tgl_insiden');
        $insiden = $this->input->post('insiden');
        $kronologis = $this->input->post('kronologis');
        $jenis_insiden = $this->input->post('jenis_insiden');
        $pelapor_insiden = $this->input->post('pelapor_insiden');
        $insiden_terjadi = $this->input->post('insiden_terjadi');
        $insiden_pasien = $this->input->post('insiden_pasien');
        $tempat_insiden = $this->input->post('tempat_insiden');
        $spesialisasi = $this->input->post('spesialisasi');
        $unit_utama = $this->input->post('unit_utama');
        $akibat_insiden = $this->input->post('akibat_insiden');
        $tindakankejadian = $this->input->post('tindakankejadian');
        $tindakanoleh = $this->input->post('tindakan_oleh');
        $pernahterjadi = $this->input->post('pernahterjadi');
        if ($pernahterjadi == 'Ya') {
            $unit_dulu = $this->input->post('unit_dulu');
            $langkahunit = $this->input->post('langkahunit');
        } else {
            $unit_dulu = '';
            $langkahunit = '';
        }
        $tgl_buat = $this->input->post('tgl_buat');
        $tgl_terima = $this->input->post('tgl_terima');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->simpan($id_insiden, $nama_pasien, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian, $tindakanoleh, $unit_dulu, $langkahunit, $tgl_buat, $tgl_terima, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Berhasil Masuk'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }

    public function perbarui()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $nama_pasien = $this->input->post('nama_pasien');
        $no_rm = $this->input->post('no_rm');
        $ruangan = $this->input->post('ruangan');
        $umur = $this->input->post('umur');
        $kelompokumur = $this->input->post('kelompok_umur');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $penanggung = $this->input->post('penanggung');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $pembuat = $this->input->post('pembuat');
        $tgl_insiden = $this->input->post('tgl_insiden');
        $insiden = $this->input->post('insiden');
        $kronologis = $this->input->post('kronologis');
        $jenis_insiden = $this->input->post('jenis_insiden');
        $pelapor_insiden = $this->input->post('pelapor_insiden');
        $insiden_terjadi = $this->input->post('insiden_terjadi');
        $insiden_pasien = $this->input->post('insiden_pasien');
        $tempat_insiden = $this->input->post('tempat_insiden');
        $spesialisasi = $this->input->post('spesialisasi');
        $unit_utama = $this->input->post('unit_utama');
        $akibat_insiden = $this->input->post('akibat_insiden');
        $tindakankejadian = $this->input->post('tindakankejadian');
        $tindakanoleh = $this->input->post('tindakan_oleh');
        $pernahterjadi = $this->input->post('pernahterjadi');
        if ($pernahterjadi == 'Ya') {
            $unit_dulu = $this->input->post('unit_dulu');
            $langkahunit = $this->input->post('langkahunit');
        } else {
            $unit_dulu = '';
            $langkahunit = '';
        }
        $tgl_buat = $this->input->post('tgl_buat');
        $tgl_terima = $this->input->post('tgl_terima');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->perbarui($id_insiden, $nama_pasien, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian, $tindakanoleh, $unit_dulu, $langkahunit, $tgl_buat, $tgl_terima, $status);

        if ($result) {
            echo "<script>alert('Data Berhasil Diperbarui'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }

    public function verif()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $grading = $this->input->post('grading');
        $status = $this->input->post('status');
        $verifikator = $this->input->post('verifikator');

        // Simpan Data
        $result = $this->minsiden->verif($id_insiden, $tgl_terima, $grading, $status, $verifikator );

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }
    public function editlaporan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
            $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbunit2'] = $this->minsiden->combo_unit();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            // $data['kodejadi'] = $this->minsiden->id_insiden();
            // $waktu_diminta = $this->input->post('waktu_diminta');
            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function veriflaporan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
            $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbunit2'] = $this->minsiden->combo_unit();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            $data['kodejadi'] = $this->minsiden->id_insiden();
            $isi =  $this->template->display('insiden/veriflaporan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function cetakinsiden()
    {

        if ($this->session->userdata('login') == true) {

            $data['datainsiden'] = $this->minsiden->cetak_insiden($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('insiden/print/vprint_ctk_insiden', $isi);
        } else {
            redirect('clogin');
        }
    }

     public function cetakk3()
    {

        if ($this->session->userdata('login') == true) {

            $data['datak3'] = $this->minsiden->cetak_k3($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddk3', $data);
            $this->load->view('insiden/print/vprint_ctk_k3', $isi);
        } else {
            redirect('clogin');
        }
    }

     public function cetakbudaya()
    {

        if ($this->session->userdata('login') == true) {

            $data['databudaya'] = $this->minsiden->cetak_budaya($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddbudaya', $data);
            $this->load->view('insiden/print/vprint_ctk_budaya', $isi);
        } else {
            redirect('clogin');
        }
    }


    
     public function tambahk3()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $kejadian = $this->input->post('kejadian');
        $kronologi_kejadian = $this->input->post('kronologi_kejadian');
        $pembuat = $this->input->post('pembuat');
        $tgl_input = $this->input->post('tgl_input');
        $status = $this->input->post('status');
        // Simpan Data
        $result = $this->minsiden->simpank3($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $pembuat, $tgl_input, $status);
       
        if ($result) {
           echo "<script>alert('Data Sudah Berhasil Masuk'); </script>"; redirect('insiden/datak3');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/datak3');
        }
    }

    public function tambahbudaya()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $kejadian = $this->input->post('kejadian');
        $kronologi_kejadian = $this->input->post('kronologi_kejadian');
        $pembuat = $this->input->post('pembuat');
        $tgl_input = $this->input->post('tgl_input');
        $status = $this->input->post('status');
        // Simpan Data
        $result = $this->minsiden->simpanbudaya($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $pembuat, $tgl_input, $status);
       
        if ($result) {
           echo "<script>alert('Data Sudah Berhasil Masuk'); </script>"; redirect('insiden/databudayakeselamatan');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/databudayakeselamatan');
        }
    }


     public function verifkejadian()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datak3'] = $this->minsiden->get_by_id2($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbkejadian'] = $this->minsiden->combo_kejadian();
        $data['kodejadi'] = $this->minsiden->id_laporan();
        $isi =  $this->template->display('insiden/verifk3', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    public function verifbudaya()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['databudaya'] = $this->minsiden->get_by_id3($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbbudaya'] = $this->minsiden->combo_budaya();
        $data['kodejadi'] = $this->minsiden->id_laporan();
        $isi =  $this->template->display('insiden/verifbudaya', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

      public function verifk3()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $kejadian = $this->input->post('kejadian');
        $kronologi_kejadian = $this->input->post('kronologi_kejadian');
        $verifikasi = $this->input->post('verifikasi');
        $tindaklanjut = $this->input->post('tindaklanjut');
        $verifikator = $this->input->post('verifikator');
        $status = $this->input->post('status');
      
        // Simpan Data
        $result = $this->minsiden->verifk3($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $verifikasi, $tindaklanjut, $verifikator, $status);
       
        if ($result) {
           echo "<script>alert('Data Berhasil Diupdate'); </script>"; redirect('insiden/datak3');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/datak3');
        }
    }
    public function verifbudayakes()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $kejadian = $this->input->post('kejadian');
        $kronologi_kejadian = $this->input->post('kronologi_kejadian');
        $verifikasi = $this->input->post('verifikasi');
        $tindaklanjut = $this->input->post('tindaklanjut');
        $verifikator = $this->input->post('verifikator');
        $status = $this->input->post('status');
      
        // Simpan Data
        $result = $this->minsiden->verifbudayakes($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $verifikasi, $tindaklanjut, $verifikator, $status);
       
        if ($result) {
           echo "<script>alert('Data Berhasil Diupdate'); </script>"; redirect('insiden/databudayakeselamatan');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/databudayakeselamatan');
        }
    }



}
