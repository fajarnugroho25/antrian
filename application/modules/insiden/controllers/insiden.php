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
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
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
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            // $data['laporaninsiden'] = $this->minsiden->tampil_laporan($tgl_awal, $tgl_akhir);
            $isi =  $this->template->display('insiden/vlaporan', $data);
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

      public function datapajananA()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $tgl_awal = $this->input->post('tgl_awal');
            $data['datapajananA'] = $this->minsiden->tampilkanpajananA($tgl_awal);
            $isi =  $this->template->display('insiden/vdatapajananA', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function datapajananB()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $tgl_awal = $this->input->post('tgl_awal');
            $data['datapajananB'] = $this->minsiden->tampilkanpajananB($tgl_awal);
            $isi =  $this->template->display('insiden/vdatapajananB', $data);
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
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbkejadian'] = $this->minsiden->combo_kejadian();
            $data['cbbudaya'] = $this->minsiden->combo_budaya();
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
        $data['datapajananA'] = $this->minsiden->tampilkanpajananA();
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['kodejadi'] = $this->minsiden->id_pajanan();
        $isi =  $this->template->display('insiden/vaddpajananA', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }

    }

     public function verifpajananA()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
        $data['cbumur'] = $this->minsiden->combo_umur();
        $data['cbjenis'] = $this->minsiden->combo_jenis();
        $data['cbinsiden'] = $this->minsiden->combo_insiden();
        $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifpajananA', $data);
        $this->load->view('admin/vutama', $isi);
    } else {
        redirect('login');
    }
    }
    public function verifkomitepajananA()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
        $data['cbumur'] = $this->minsiden->combo_umur();
        $data['cbjenis'] = $this->minsiden->combo_jenis();
        $data['cbinsiden'] = $this->minsiden->combo_insiden();
        $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifkomitepajananA', $data);
        $this->load->view('admin/vutama', $isi);
    } else {
        redirect('login');
    }
    }

    public function inputverifpajananA()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $rekom = $this->input->post('rekomendasi');
        $status = $this->input->post('status');
        $verifikator = $this->input->post('verifikator');

        // Simpan Data
        $result = $this->minsiden->verifpajananA($id_insiden, $tgl_terima, $rekom, $status, $verifikator );

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }

    public function inputkomitepajananA()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $rekom = $this->input->post('rekomendasi');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->verifkomitepajananA($id_insiden, $tgl_terima, $rekom, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }




     public function verifpajananB()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
        $data['cbumur'] = $this->minsiden->combo_umur();
        $data['cbjenis'] = $this->minsiden->combo_jenis();
        $data['cbinsiden'] = $this->minsiden->combo_insiden();
        $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifpajananB', $data);
        $this->load->view('admin/vutama', $isi);
    } else {
        redirect('login');
    }
    }
    public function verifkomitepajananB()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
        $data['cbumur'] = $this->minsiden->combo_umur();
        $data['cbjenis'] = $this->minsiden->combo_jenis();
        $data['cbinsiden'] = $this->minsiden->combo_insiden();
        $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifkomitepajananB', $data);
        $this->load->view('admin/vutama', $isi);
    } else {
        redirect('login');
    }
    }

    public function inputverifpajananB()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $status = $this->input->post('status');
        $verifikator = $this->input->post('verifikator');

        // Simpan Data
        $result = $this->minsiden->verifpajananB($id_insiden, $tgl_terima, $status, $verifikator );

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }

    public function inputkomitepajananB()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $rekom = $this->input->post('rekomendasi');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->verifkomitepajananB($id_insiden, $tgl_terima, $rekom, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }






     public function formpajananB()
    {
     if ($this->session->userdata('login') == true) {
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
        $data['cbunit'] = $this->minsiden->combo_unit();
        $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifpajananB', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    public function tambah()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $nama = $this->input->post('nama');
        $alamat1 = $this->input->post('alamat1');
        $no_rm = $this->input->post('no_rm');
        $ruangan = $this->input->post('ruangan');
        $umur = $this->input->post('umur');
        $kelompokumur = $this->input->post('kelompok_umur');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $penanggung = $this->input->post('penanggung');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $pembuat = $this->input->post('pembuat');
        $k_insiden = $this->input->post('k_insiden');
        $tgl_insiden = $this->input->post('tgl_insiden');
        $insiden = $this->input->post('insiden');
        $kronologis = $this->input->post('kronologis');
        $jenis_insiden = $this->input->post('jenis_insiden');
        $jenis_insidenk3 = $this->input->post('jenis_insidenk3');
        $jenis_insidenbudaya = $this->input->post('jenis_insidenbudaya');
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
        $tgl_input = $this->input->post('tgl_input');
        $tgl_pajanan = $this->input->post('tgl_pajanan');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $unit_terpajan = $this->input->post('unit_terpajan');
        $atasan = $this->input->post('atasan');
        $alamat2 = $this->input->post('alamat2');
        $route = $this->input->post('route');
        $addroute = implode(",", $route);
        $sumber = $this->input->post('sumber');
        $addsumber = implode(",", $sumber);
        $bagian_tubuh = $this->input->post('bagian_tubuh');
        $kronologi = $this->input->post('kronologi');
        $imunisasi = $this->input->post('imunisasi');
        $pelindung = $this->input->post('pelindung');
        $jenis_pelindung = $this->input->post('jenis_pelindung');
        $pertolongan = $this->input->post('pertolongan');
        $jenis_pertolongan = $this->input->post('jenis_pertolongan');
        $addjp = implode(",", $jenis_pertolongan);
        $tempat_pertolongan = $this->input->post('tempat_pertolongan');
        $kotak1 = $this->input->post('kotak');
        $kotak = implode(",", $kotak1);
        $perhatian1 = $this->input->post('perhatian');
        $perhatian = implode(",", $perhatian1);
        $ruang = $this->input->post('ruang');
        $pemantauan = $this->input->post('pemantauan');
        $tgl_pemberitahuan = $this->input->post('tgl_pemberitahuan');
        $diagnosa = $this->input->post('diagnosa');
        $tgl_terima = $this->input->post('tgl_terima');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->simpan($id_insiden, $nama, $alamat1, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $k_insiden, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $jenis_insidenk3, $jenis_insidenbudaya, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian, $tindakanoleh, $unit_dulu, $langkahunit, $tgl_input, $tgl_pajanan, $tempat_kejadian, $unit_terpajan, $atasan, $alamat2, $addroute, $addsumber, $bagian_tubuh, $kronologi, $imunisasi, $pelindung, $jenis_pelindung, $pertolongan, $addjp, $tempat_pertolongan, $kotak, $perhatian, $ruang, $pemantauan, $tgl_pemberitahuan, $diagnosa, $tgl_terima, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Berhasil Terkirim'); history.go(-1) </script>";
            // redirect('insiden/forminsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            // redirect('insiden/forminsiden');
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
        $tgl_input = $this->input->post('tgl_input');
        $tgl_terima = $this->input->post('tgl_terima');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->perbarui($id_insiden, $nama_pasien, $no_rm, $ruangan, $umur, $kelompokumur, $jenis_kelamin, $penanggung, $tgl_masuk, $pembuat, $tgl_insiden, $insiden, $kronologis, $jenis_insiden, $pelapor_insiden, $insiden_terjadi, $insiden_pasien, $tempat_insiden, $spesialisasi, $unit_utama, $akibat_insiden, $tindakankejadian, $tindakanoleh, $unit_dulu, $langkahunit, $tgl_input, $tgl_terima, $status);

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
        $probabilitas = $this->input->post('probabilitas');
        $severity = $this->input->post('severity');
        $grading = $this->input->post('grading');
        $status = $this->input->post('status');
        $verifikator = $this->input->post('verifikator');

        // Simpan Data
        $result = $this->minsiden->verif($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $status, $verifikator );

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
            $data['cbprob'] = $this->minsiden->combo_probabilitas();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['kodejadi'] = $this->minsiden->id_insiden();
            $isi =  $this->template->display('insiden/veriflaporan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function verifikp()
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
            $data['cbprob'] = $this->minsiden->combo_probabilitas();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['cbtipe'] = $this->minsiden->combo_tipe();
            $data['kodejadi'] = $this->minsiden->id_insiden();
            $isi =  $this->template->display('insiden/verifikp', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

     public function inputverifikp()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $probabilitas = $this->input->post('probabilitas');
        $severity = $this->input->post('severity');
        $grading = $this->input->post('grading');
        $tipe_insiden = $this->input->post('tipe_insiden');
        $rekom = $this->input->post('rekomendasi');
        $komite = $this->input->post('komite');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->verifikp($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $tipe_insiden, $rekom, $komite, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
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

            $data['datak3'] = $this->minsiden->cetak_insiden($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddk3', $data);
            $this->load->view('insiden/print/vprint_ctk_k3', $isi);
        } else {
            redirect('clogin');
        }
    }

     public function cetakbudaya()
    {

        if ($this->session->userdata('login') == true) {

            $data['datainsiden'] = $this->minsiden->cetak_insiden($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('insiden/print/vprint_ctk_budaya', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function cetakpajananA()
    {

        if ($this->session->userdata('login') == true) {

            $data['datapajananA'] = $this->minsiden->cetak_insiden($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('insiden/print/vprint_ctk_pajananA', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function cetakpajananB()
    {

        if ($this->session->userdata('login') == true) {

            $data['datapajananB'] = $this->minsiden->cetak_insiden($this->uri->segment(3));

            $isi =  $this->template->display('insiden/vaddinsiden', $data);
            $this->load->view('insiden/print/vprint_ctk_pajananB', $isi);
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
            $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
            $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbunit2'] = $this->minsiden->combo_unit();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbkejadian'] = $this->minsiden->combo_kejadian();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            $data['cbprob'] = $this->minsiden->combo_probabilitas();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifk3', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    public function verifkomitek3()
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
            $data['cbkejadian'] = $this->minsiden->combo_kejadian();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            $data['cbprob'] = $this->minsiden->combo_probabilitas();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifkomitek3', $data);
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
            $data['datainsiden'] = $this->minsiden->get_by_id($this->uri->segment(3));
            $data['cbpenanggung'] = $this->minsiden->combo_penanggung();
            $data['cbunit'] = $this->minsiden->combo_unit();
            $data['cbunit2'] = $this->minsiden->combo_unit();
            $data['cbumur'] = $this->minsiden->combo_umur();
            $data['cbbudaya'] = $this->minsiden->combo_budaya();
            $data['cbjenis'] = $this->minsiden->combo_jenis();
            $data['cbpelapor'] = $this->minsiden->combo_pelapor();
            $data['cbspesial'] = $this->minsiden->combo_spesialisasi();
            $data['cbpasien'] = $this->minsiden->combo_pasien();
            $data['cbterjadi'] = $this->minsiden->combo_terjadi();
            $data['cbakibat'] = $this->minsiden->combo_akibat();
            $data['cbtindakan'] = $this->minsiden->combo_tindakan();
            $data['cbprob'] = $this->minsiden->combo_probabilitas();
            $data['cbinsiden'] = $this->minsiden->combo_insiden();
            $data['kodejadi'] = $this->minsiden->id_insiden();
        $isi =  $this->template->display('insiden/verifbudaya', $data);
        $this->load->view('admin/vutama', $isi);


    } else {
        redirect('login');
    }
    }

    //   public function verifk3()
    // {
    //     $id_laporan=  $this->input->post('id_laporan');
    //     $tgl_kejadian = $this->input->post('tgl_kejadian');
    //     $tempat_kejadian = $this->input->post('tempat_kejadian');
    //     $kejadian = $this->input->post('kejadian');
    //     $kronologi_kejadian = $this->input->post('kronologi_kejadian');
    //     $verifikasi = $this->input->post('verifikasi');
    //     $tindaklanjut = $this->input->post('tindaklanjut');
    //     $verifikator = $this->input->post('verifikator');
    //     $status = $this->input->post('status');
      
    //     // Simpan Data
    //     $result = $this->minsiden->verifk3($id_laporan, $tgl_kejadian, $tempat_kejadian, $kejadian, $kronologi_kejadian, $verifikasi, $tindaklanjut, $verifikator, $status);
       
    //     if ($result) {
    //        echo "<script>alert('Data Berhasil Diupdate'); </script>"; redirect('insiden/datak3');
    //     } else {
    //         echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/datak3');
    //     }
    // }

   public function inputkomitek3()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $probabilitas = $this->input->post('probabilitas');
        $severity = $this->input->post('severity');
        $grading = $this->input->post('grading');
        $rekom = $this->input->post('rekomendasi');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->minsiden->verifkomitek3($id_insiden, $tgl_terima, $probabilitas, $severity, $grading, $rekom, $status );

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }
   
    public function inputverifbudaya()
    {
        $id_insiden =  $this->input->post('id_insiden');
        $tgl_terima = $this->input->post('tgl_terima');
        $rekom = $this->input->post('rekomendasi');
        $verifikator = $this->input->post('verifikator');
        $status = $this->input->post('status');
        

        // Simpan Data
        $result = $this->minsiden->verifbudaya($id_insiden, $tgl_terima, $rekom, $verifikator, $status);

        if ($result) {
            echo "<script>alert('Data Sudah Diverifikasi'); </script>";
            redirect('insiden/datainsiden');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>";
            redirect('insiden/datainsiden');
        }
    }

     public function tambahpajananA()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $tgl_laporan = $this->input->post('tgl_laporan');
        $tgl_pajanan = $this->input->post('tgl_pajanan');
        $tempat_kejadian = $this->input->post('tempat_kejadian');
        $unit_terpajan = $this->input->post('unit_terpajan');
        $nama = $this->input->post('nama');
        $alamat1 = $this->input->post('alamat1');
        $atasan = $this->input->post('atasan');
        $alamat2 = $this->input->post('alamat2');
        $route = $this->input->post('route');
        $addroute = implode(",", $route);
        $sumber = $this->input->post('sumber');
        $addsumber = implode(",", $sumber);
        $bagian_tubuh = $this->input->post('bagian_tubuh');
        $kronologi = $this->input->post('kronologi');
        $imunisasi = $this->input->post('imunisasi');
        $pelindung = $this->input->post('pelindung');
        $pertolongan = $this->input->post('pertolongan');
        $jenis_pertolongan = $this->input->post('jenis_pertolongan');
        $addjp = implode(",", $jenis_pertolongan);
        $tempat_pertolongan = $this->input->post('tempat_pertolongan');
        $pembuat = $this->input->post('pembuat');
        $status = $this->input->post('status');
        // Simpan Data
        $result = $this->minsiden->simpanpajananA($id_laporan, $tgl_laporan, $tgl_pajanan, $tempat_kejadian, $unit_terpajan, $nama, $alamat1, $atasan, $alamat2, $addroute, $addsumber, $bagian_tubuh, $kronologi, $imunisasi, $pelindung, $pertolongan, $addjp, $tempat_pertolongan, $pembuat, $status);
       
        if ($result) {
           echo "<script>alert('Data Sudah Berhasil Masuk'); </script>"; redirect('insiden/datapajananA');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/datapajananA');
        }
    }

    // public function verifpajananA()
    // {
       
    //        $this->minsiden->verifpajananA($this->uri->segment(3));


    //   redirect('insiden/datainsiden');

   
    // }

     public function tambahpajananB()
    {
        $id_laporan=  $this->input->post('id_laporan');
        $kotak = $this->input->post('kotak');
        $perhatian = $this->input->post('perhatian');
        $nama = $this->input->post('nama');
        $rm = $this->input->post('rm');
        $ruang = $this->input->post('ruang');
        $pemantauan = $this->input->post('pemantauan');
        $tgl_pemberitahuan = $this->input->post('tgl_pemberitahuan');
        $diagnosa = $this->input->post('diagnosa');
        $tgl_input = $this->input->post('tgl_input');
        $pembuat = $this->input->post('pembuat');
        $status = $this->input->post('status');    
        $addkotak = implode(",", $kotak);
        $addperhatian = implode(",", $perhatian);
        
        // Simpan Data
        $result = $this->minsiden->simpanpajananB($id_laporan, $addkotak, $addperhatian, $nama, $rm, $ruang, $pemantauan, $tgl_pemberitahuan, $diagnosa, $tgl_input, $pembuat, $status);
       
        if ($result) {
           echo "<script>alert('Data Sudah Berhasil Masuk'); </script>"; redirect('insiden/datapajananB');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); </script>"; redirect('insiden/datapajananB');
        }
    }

    //  public function verifpajananB()
    // {
       
    //        $this->minsiden->verifpajananB($this->uri->segment(3));


    //   redirect('insiden/datapajananB');

   
    // }

    public function ajaxGrading($id_probabilitas, $id_severity){
        $hasil = $this->minsiden->getGrading($id_probabilitas, $id_severity);
        echo json_encode($hasil);
    }
     public function ajaxGradingK3($id_probabilitas, $id_severity){
        $hasil = $this->minsiden->getGradingK3($id_probabilitas, $id_severity);
        echo json_encode($hasil);
    }

    public function ajaxlaporan(){
            

           
            $data=array();
            $list = $this->minsiden->tampil_laporan();

            $no=1;


        //cacah data
        foreach ( $list as $item ) {


            $row = array();
            $row[] = $no;
            $row[] = $item ['jenis'];
            $row[] = $item ['jum_biru'];
            $row[] = $item ['jum_hijau'];
            $row[] = $item ['jum_kuning'];
            $row[] = $item ['jum_merah'];
            // $row[] = '<a href="printcutitahun/'.$item['nik'].' " target="_blank" class="btn btn-success">Surat</a>' ;

            $data[] = $row;
            $no++;
        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
        $array_items = array('tglawal','tglakhir','unit','jeniscuti','tahun');
        $this->session->unset_userdata($array_items);
        }

    public function getfilter(){
        $post=$this->input->post();
        // konfigurasi upload
        $this->session->set_userdata('tglawal',$post['tglawal']);
        $this->session->set_userdata('tglakhir',$post['tglakhir']);
        $this->session->set_userdata('kelompok',$post['kelompok']);
        $this->session->set_userdata('unit',$post['unit']);
        $this->session->set_userdata('tahun',$post['tahun']);

        $this->session->set_userdata('jeniscuti',$post['jeniscuti']);
           

            $info="berhasil ";

            echo json_encode($data);

          }

    public function chart_data()
    {
        $data = array(
        "January" => 50,
        "February" => 75,
        "March" => 100,
        "April" => 125,
        "May" => 150,
        "June" => 175,
        "July" => 200,
        "August" => 225,
        "September" => 250,
        "October" => 275,
        "November" => 300,
        "December" => 325
    );
        echo json_encode($data);
    }

}
