<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class mmenu extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function tampilkan()
    {
        $akses = $this->session->akses;
        if ($akses == '') {
            $akses = 'NULL';
        }
        $sql = "select menu, menu_id from menu where menu_id in ($akses) order by menu_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function tampilkansub()
    {

        $akses_item = $this->session->akses_item;
        if ($akses_item == '') {
            $akses_item = 'NULL';
        }
        $sql = "select submenu, menu_id,submenu_link from submenu where submenu_id in ($akses_item)";
        $query = $this->db->query($sql);
        return $query->result();
    }



    function data_submenu()
    {
        $this->db->from('submenu');
        $this->db->order_by("submenu_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    function data_menu()
    {
        $this->db->from('menu');
        $this->db->order_by("menu_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }
}
