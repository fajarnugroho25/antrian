<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mform');
        $this->load->model('menu/mmenu');
    }

    public function datasurat()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['datasurat'] = $this->mform->tampilkan();
            $isi =  $this->template->display('pembelian/vdatasurat', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }

     public function formsurat()
    {
        if ($this->session->userdata('login') == true) {
            $data['menu_list'] = $this->mmenu->tampilkan();
            $data['submenu_list'] = $this->mmenu->tampilkansub();
            $data['pembelian'] = $this->mform->tampilkan();
            
            $isi =  $this->template->display('pembelian/vaddform', $data);
            $this->load->view('admin/vutama', $isi);
        } else {
            redirect('login');
        }
    }