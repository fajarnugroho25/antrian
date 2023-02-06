<?php
class cbuku extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('mmenu');
  }
  function index()
  {

    $data['menu_list'] = $this->mmenu->tampilkan();
    $data['submenu'] = $this->mmenu->tampilkansub();
    $this->load->view('menu/menu', $data);
  }
}
 