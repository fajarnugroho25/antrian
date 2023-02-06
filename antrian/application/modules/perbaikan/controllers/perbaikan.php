<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perbaikan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('mperbaikan');
      $this->load->model('menu/mmenu');
      date_default_timezone_set('Asia/Jakarta');
   }

   public function dataperbaikan()
   {
      if ($this->session->userdata('login') == true) {
         $data['perbaikan'] = $this->mperbaikan->tampilkan_perbaikan();
         $data['menu_list'] = $this->mmenu->tampilkan();
         $data['submenu_list'] = $this->mmenu->tampilkansub();
         $isi =  $this->template->display('perbaikan/vdataperbaikan', $data);
         $this->load->view('admin/vutama', $isi);
      } else {
         redirect('login');
      }
   }

   public function tambahperbaikan()
   {

      if ($this->session->userdata('login') == true) {
         $data['menu_list'] = $this->mmenu->tampilkan();
         $data['submenu_list'] = $this->mmenu->tampilkansub();
         $data['kodejadi'] = $this->mperbaikan->no_perbaikan();
         $data['cbunit'] = $this->mperbaikan->combo_unit();
         $data['cbjenis'] = $this->mperbaikan->combo_jenis();
         $data['cbprioritas'] = $this->mperbaikan->combo_prioritas();

         $isi =  $this->template->display('perbaikan/vadd_perbaikan', $data);
         $this->load->view('admin/vutama', $isi);
      } else {
         redirect('login');
      }
   }

   public function tambah()
   {
      $id_perbaikan =  $this->mperbaikan->no_perbaikan('kodejadi');
      $tgl_input = date("Y-m-d H:i:s");
      $unit_id = $this->input->post('unit_id');
      $user_peminta = $this->input->post('user_peminta');
      $keluhan = $this->input->post('keluhan');
      $prioritas = $this->input->post('prioritas');
      $id_jenis = $this->input->post('id_jenis');
      $status = $this->input->post('status');


      // Simpan Data
      $result = $this->mperbaikan->simpan($id_perbaikan, $tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status);
      if ($result) {
         echo "<script>alert('Data Perbaikan Berhasil disimpan !'); history.go(-1)</script>";
      } else {
         echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
      }
   }

   public function editperbaikan()
   {

      if ($this->session->userdata('login') == true) {
         $data['menu_list'] = $this->mmenu->tampilkan();
         $data['submenu_list'] = $this->mmenu->tampilkansub();
         $data['perbaikan'] = $this->mperbaikan->get_by_id($this->uri->segment(3));
         $data['cbunit'] = $this->mperbaikan->combo_unit();
         $data['cbjenis'] = $this->mperbaikan->combo_jenis();
         $data['cbprioritas'] = $this->mperbaikan->combo_prioritas();
         $isi =  $this->template->display('perbaikan/vadd_perbaikan', $data);
         $this->load->view('admin/vutama', $isi);
      } else {
         redirect('login');
      }
   }

   public function perbarui()
   {
      $id_perbaikan = $this->input->post('id_perbaikan');
      $tgl_input = $this->input->post('tgl_input');
      $unit_id = $this->input->post('unit_id');
      $user_peminta = $this->input->post('user_peminta');
      $keluhan = $this->input->post('keluhan');
      $prioritas = $this->input->post('prioritas');
      $id_jenis = $this->input->post('id_jenis');
      $status = $this->input->post('status');

      // Simpan Data
      $result = $this->mperbaikan->perbarui($tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status,  $id_perbaikan);
      if ($result) {
         echo "<script>alert('Data Antrian Berhasil disimpan !'); history.go(-1)</script>";
      } else {
         echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";
      }
   }

   function delete()
   {

      $this->mperbaikan->hapus($this->uri->segment(3));

      redirect('perbaikan/dataperbaikan');
   }

   public function laporan()
   {

      if ($this->session->userdata('login') == true) {
         $data['menu_list'] = $this->mmenu->tampilkan();
         $data['submenu_list'] = $this->mmenu->tampilkansub();
         $data['cbjenis'] = $this->mperbaikan->combo_jenis();
         $isi =  $this->template->display('perbaikan/ctk_laporan', $data);
         $this->load->view('admin/vutama', $isi);
      } else {
         redirect('login');
      }
   }

   public function print_laporan()
   {
      $tgl_1 = $this->input->post('tgl_1');
      $tgl_2 = $this->input->post('tgl_2');
      $jenis =  $this->input->post('jenis');


      if ($this->session->userdata('login') == true) {
         $data['perbaikan'] = $this->mperbaikan->tampilkan_laporan($tgl_1, $tgl_2, $jenis);
         if ($jenis == 'ALL') {
            $isi =  $this->template->display('perbaikan/print/vprint_lap_perbaikan_rekap', $data);
            $this->load->view('perbaikan/print/vprint_lap_perbaikan_rekap', $isi);
         } else {
            $isi =  $this->template->display('perbaikan/print/vprint_lap_perbaikan', $data);
            $this->load->view('perbaikan/print/vprint_lap_perbaikan', $isi);
         }
      } else {
         redirect('login');
      }
   }
}
