<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kendaraan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mkendaraan');
        $this->load->model('menu/mmenu');
    }



    public function dapeskendaraan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->tampilkan();
            $isi =  $this->template->display('kendaraan/vdatakendaraan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function kendaraanditerima()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->tampilkanditerima();
            $isi =  $this->template->display('kendaraan/vkendaraanditerima', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function kendaraanselesai()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->tampilkanselesai();
            $isi =  $this->template->display('kendaraan/vkendaraanselesai', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function antriankendaraan()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->tampilkanrequest();
            $isi =  $this->template->display('kendaraan/vlistantriankendaraan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function tambahtranskendaraan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mkendaraan->no_trans_kendaraan();
            $data['cbunit'] = $this->mkendaraan->combo_unit();
            $isi =  $this->template->display('kendaraan/vaddtranskendaraan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }

    public function edittranskendaraan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->get_by_id($this->uri->segment(3));
            $data['cbunit'] = $this->mkendaraan->combo_unit();
            $isi =  $this->template->display('kendaraan/vaddtranskendaraan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }


    public function verifkendaraan()
    {

        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kendaraan'] = $this->mkendaraan->get_by_id($this->uri->segment(3));
            $data['cbunit'] = $this->mkendaraan->combo_unit();
            $data['cbpetugas'] = $this->mkendaraan->combo_petugas();
            $isi =  $this->template->display('kendaraan/vverifkendaraan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('clogin');
        }
    }



    public function tambah()
    {
        $id_permintaan =  $this->mkendaraan->no_trans_kendaraan('kodejadi');
        $waktu_diminta = $this->input->post('waktu_diminta');
        $tujuan = $this->input->post('tujuan');
        $keperluan = $this->input->post('keperluan');
        $tgl_input = $this->input->post('tgl_input');
        $keterangan = $this->input->post('keterangan');
        $user_peminta = $this->input->post('user_peminta');
        $unit_id = $this->input->post('unit_id');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->mkendaraan->simpan($id_permintaan, $waktu_diminta, $tujuan, $keperluan, $tgl_input, $keterangan, $user_peminta, $unit_id,  $status);
        if ($result) {
            echo "<script>alert('Data Permintaan Berhasil disimpan !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function perbarui()
    {
        $id_permintaan =  $this->input->post('id_permintaan');
        $waktu_diminta = $this->input->post('waktu_diminta');
        $tujuan = $this->input->post('tujuan');
        $keperluan = $this->input->post('keperluan');
        $tgl_input = $this->input->post('tgl_input');
        $keterangan = $this->input->post('keterangan');
        $user_peminta = $this->input->post('user_peminta');
        $unit_id = $this->input->post('unit_id');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->mkendaraan->perbarui($waktu_diminta, $tujuan, $keperluan, $tgl_input, $keterangan, $user_peminta, $unit_id,  $status, $id_permintaan);
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil diperbarui !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    public function verifpermintaan()
    {
        $id_permintaan =  $this->input->post('id_permintaan');
        $waktu_verif = $this->input->post('waktu_verif');
        $user_verif = $this->input->post('user_verif');
        $petugas = $this->input->post('petugas');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');

        // Simpan Data
        $result = $this->mkendaraan->verif($waktu_verif, $user_verif, $petugas, $keterangan, $status, $id_permintaan);
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil diperbarui !'); history.go(-1)</script>";
        } else {
            echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
        }
    }

    function delete()
    {

        $this->mkendaraan->hapus($this->uri->segment(3));

        redirect('chome/dapeskendaraan');
    }
}
