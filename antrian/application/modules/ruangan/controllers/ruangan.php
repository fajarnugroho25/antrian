<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mruangan');
        $this->load->model('menu/mmenu');


    }



    public function datapeminjaman()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['ruangan'] = $this->mruangan->tampilkan();
            $isi =  $this->template->display('ruangan/vdatapeminjaman', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function datasnack()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['ruangan'] = $this->mruangan->tampilkansnack();
            $isi =  $this->template->display('ruangan/vdatasnack', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahpermintaan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mruangan->no_permintaan();
            $data['cbruang'] = $this->mruangan->combo_ruangan();
            $data['cbunit'] = $this->mruangan->combo_unit();
            $isi =  $this->template->display('ruangan/vaddpeminjaman', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

  
    public function tambah()
    {
        $id_peminjaman =  $this->mruangan->no_permintaan('kodejadi');
        $ruangan = $this->input->post('ruangan');
        $lainnya = $this->input->post('lainnya');
        $tanggal = $this->input->post('tanggal');
        $waktu = $this->input->post('waktu');
        $durasi = $this->input->post('durasi');
        $keperluan = $this->input->post('keperluan');
        $unit = $this->input->post('unit');
        $user_peminta = $this->input->post('user_peminta');
        $perlengkapan = $this->input->post('perlengkapan');
        $addperlengkapan = implode(",", $perlengkapan);
        $tgl_input = $this->input->post('tgl_input');


        // var_dump( $add );exit;
        // Simpan Data
        $result = $this->mruangan->simpan($id_peminjaman, $ruangan, $lainnya, $tanggal, $waktu, $durasi, $keperluan, $unit, $user_peminta, $addperlengkapan,$tgl_input );
        if ($result) {
            echo "<script>alert('Data Permintaan Berhasil disimpan !');</script>";
            redirect('ruangan/datapeminjaman');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function edit()
    {
        $id_peminjaman =  $this->input->post('id_peminjaman');
        $ruangan = $this->input->post('ruangan');
        $tanggal = $this->input->post('tanggal');
        $waktu = $this->input->post('waktu');
        $durasi = $this->input->post('durasi');
        $keperluan = $this->input->post('keperluan');
        $unit = $this->input->post('unit');
        $user_peminta = $this->input->post('user_peminta');
        $perlengkapan = $this->input->post('perlengkapan');
        $addperlengkapan = implode(",", $perlengkapan);
        $tgl_input = $this->input->post('tgl_input');


        
        // Simpan Data
        $result = $this->mruangan->edit($ruangan,$tanggal, $waktu, $durasi, $keperluan, $unit, $user_peminta, $addperlengkapan,$tgl_input,$id_peminjaman);

        if ($result) {
            echo "<script>alert('Perubahan Berhasil disimpan !');</script>";
            redirect('ruangan/datapeminjaman');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

     public function verif()
    {
        $id_peminjaman =  $this->input->post('id_peminjaman');
        $ruangan = $this->input->post('ruangan');
        $status = $this->input->post('status');
        $verif_ruangan = $this->input->post('verif_ruangan');

        // var_dump($status);exit;
        // Simpan Data
        
        $result = $this->mruangan->verif($id_peminjaman, $ruangan, $status, $verif_ruangan); 
        if ($result) {
            echo "<script>alert('Data Verifikasi Berhasil Disimpan !');</script>";
            redirect('ruangan/datapeminjaman');
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

      public function editruangan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['ruangan'] = $this->mruangan->get_by_id($this->uri->segment(3));
            $data['cbruang'] = $this->mruangan->combo_ruangan();
            $data['cbunit'] = $this->mruangan->combo_unit();
            $isi =  $this->template->display('ruangan/vaddpeminjaman', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function verifpeminjam()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['ruangan'] = $this->mruangan->get_by_id($this->uri->segment(3));
            $data['cbruang'] = $this->mruangan->combo_ruangan();
            $data['cbunit'] = $this->mruangan->combo_unit();
            $isi =  $this->template->display('ruangan/verifpeminjam', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }
    public function verifsnack()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['ruangan'] = $this->mruangan->get_by_id($this->uri->segment(3));
            $data['cbruang'] = $this->mruangan->combo_ruangan();
            $data['cbunit'] = $this->mruangan->combo_unit();
            $isi =  $this->template->display('ruangan/verifsnack', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function cetakruangan()
    {

        if ($this->session->userdata('login') == true) {

            $data['ruangan'] = $this->mruangan->cetak_ruangan($this->uri->segment(3));

            $isi =  $this->template->display('ruangan/vaddpeminjaman', $data);
            $this->load->view('ruangan/print/vprint_ruangan', $isi);
        } else {
            redirect('clogin');
        }
    }
}


