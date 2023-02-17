<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stokobat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mstokobat');
        $this->load->model('menu/mmenu');
    }


    public function datastokranap()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['obat'] = $this->mstokobat->tampilkanstokranap();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('stokobat/vstokobatranap', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }


    public function datastokrajal()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['obat'] = $this->mstokobat->tampilkanstokrajal();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('stokobat/vstokobatrajal', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function leadtime()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['obat'] = $this->mstokobat->tampilkan();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('stokobat/vobatleadtime', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function reloadtemp()
    {
        $tgl = $this->input->post('tgl');
        $gudang = $this->input->post('gudang');
        $data['obat'] = $this->mstokobat->hitungulangtemp($tgl, $gudang);
        $data['menu_list'] = $this->mmenu->tampilkan();
        $data['submenu_list'] = $this->mmenu->tampilkansub();
        $isi =  $this->template->display('stokobat/vreloadstok', $data);
        $this->load->view('admin/vutama', $isi);
        if ($gudang == 1) {
            redirect('stokobat/datastokranap', 'refresh');
        } else if ($gudang = 79) {
            redirect('stokobat/datastokrajal', 'refresh');
        }
    }

    public function hitungulang()
    {
        if ($this->session->userdata('login') == TRUE) {
            $data['obat'] = $this->mstokobat->hitungulang();
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('stokobat/vobatleadtime', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function editleadtime()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['obat'] = $this->mstokobat->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('stokobat/veditleadtime', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function reloadstok()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $isi =  $this->template->display('stokobat/vreloadstok', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function perbaruileadtime()
    {
        $kode_brg = $this->input->post('kode_brg');
        $leadtime = $this->input->post('leadtime');


        if ($this->input->post('leadtime') == '') {
            echo "<script>alert('Ups,  Masih Kosong !'); history.go(-1);</script>";
        } else {
            // Simpan Data
            $result = $this->mstokobat->perbarui($leadtime, $kode_brg);
            if ($result) {
                echo "<script>alert('Data Berhasil diperbarui !'); history.go(-1)</script>";
            } else {
                echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
            }
        }
    }
}
