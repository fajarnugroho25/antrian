<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class muserfront extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }

   


   function getdataBerita(){
        $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        JOIN image i ON i.uuim = k.konten
        where k.status ='1'
        order by k.id desc
        LIMIT 3

        ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function getdetailBerita($id){
        $query = "SELECT *,u.user as usr, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        WHERE k.id = {$id} and k.status ='1'";
        $result = $this->db->query($query);
        return $result->row();

    }

    function getdetailImage($id){
        $query = "SELECT *,u.user as usr, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        JOIN image i ON k.konten = i.uuim
        WHERE k.id = {$id} and k.status ='1'";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getrandomberita(){
        $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'
        order by RAND()
        limit 2
        ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function getAllBerita(){
        $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'
        order by k.id desc

        ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    public function get_cari($kunciCari,$kategori)
    {  
        if ($kategori == '') {
            $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'and judul LIKE '%{$kunciCari}%'";
        }
        else{
            $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'and judul LIKE '%{$kunciCari}%' and kategori = '{$kategori}'";
        }
        
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function get_cari2($kunciCari)
    {  
        $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'and judul LIKE '%{$kunciCari}%' 

                ";
        $result = $this->db->query($query);
        return $result->result_array();
    }


    function getkategori(){
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    function carifilter(){
        $query = "SELECT *,u.user as usr,YEAR(tgl_post) AS years, MONTHNAME(tgl_post) AS months, DAY(tgl_post) AS days, k.id as k_id FROM konten k 
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'and kategori = '{$kunciCari}'

                ";
        $result = $this->db->query($query);
        return $result->result_array();
    }


     function randomslider(){
         $query = "SELECT * FROM slider
         WHERE status = '1'
        order by RAND()
        limit 1
        ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

  


   
}
 