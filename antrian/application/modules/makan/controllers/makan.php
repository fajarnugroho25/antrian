<?php
defined('BASEPATH') or exit('No direct script access allowed');

class makan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mmakan');
        $this->load->model('menu/mmenu');
    }


    public function tambahmakan()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mmakan->no_trans_makan();
            $data['makan'] = $this->mmakan->tampilkan();
            $isi =  $this->template->display('makan/vtambahmakan', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function tambahmakanadj()
    {

        if ($this->session->userdata('login') == TRUE) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['kodejadi'] = $this->mmakan->no_trans_makan();
            $data['makan'] = $this->mmakan->tampilkan();
            $isi =  $this->template->display('makan/vtambahmakanadj', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

    public function addmakan()
    {

        $nik = $this->input->post('nik');
        $id_trans =  $this->mmakan->no_trans_makan('kodejadi');
        $waktu = $this->input->post('waktu');
        $keterangan = $this->input->post('keterangan');          
        $a = $data['karynama'] = $this->mmakan->ambil_nama($nik);  
        if (!empty($a)) {
            $nama= $a[0]->karynama;
          } else { $nama= '';}
       
      
        // var_dump($nama);
        if ($this->input->post('nik') == '') {
            echo "<script>alert('Ups, baaaaaaaaa !'); history.go(-1);</script>";
        } else {
            // Simpan Data
            $result = $this->mmakan->simpan($nik, $id_trans, $waktu, $keterangan, $nama);
            if ($result) {
                echo "<script>history.go(-1)</script>";;
            }
        }
    }

    public function addmakanadj()
    {

        $nik = $this->input->post('nik');
        $id_trans =  $this->mmakan->no_trans_makan('kodejadi');
        $waktu = $this->input->post('waktu');
        $keterangan = $this->input->post('keterangan');       
        $a = $data['karynama'] = $this->mmakan->ambil_nama($nik);          
        if (!empty($a)) {
            $nama= $a[0]->karynama;
          } else { $nama= '';}
       

        if ($this->input->post('nik') == '') {
            echo "<script>alert('Ups, baaaaaaaaa !'); history.go(-1);</script>";
        } else {
            // Simpan Data
            $result = $this->mmakan->simpanadj($nik, $id_trans, $waktu, $keterangan, $nama);
            if ($result) {
                echo "<script>window.location.href = 'tambahmakan';</script>";;
            }
        }
    }
}
