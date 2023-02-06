<?php


class M_api extends CI_Model{


	function get_berita(){
		$query = "SELECT *,k.id as k_id,k.status as k_stat FROM konten k
        JOIN kategori ka ON ka.id_kategori = k.kategori
        where k.status ='1'
        group by k.konten
        order by k.id desc";
        $result = $this->db->query($query);
		return $result->result_array();

	}

    function get_konten_jenis($id){
        $query = "SELECT konten_jenis FROM konten k
                WHERE k.id= {$id}";
        $result = $this->db->query($query);
        return $result->result_array();

        }


    function get_berita_detail($id){
                $query = "SELECT k.*,u.user as usr, k.id as k_id FROM konten k
        JOIN user u  ON u.id = k.user
        JOIN kategori ka ON ka.id_kategori = k.kategori
        WHERE k.id = {$id} and k.status ='1'";
                $result = $this->db->query($query);
                return $result->result_array();

        }
    function get_detail_judul($id){
                $query = "SELECT k.judul, k.konten_jenis FROM konten k
        WHERE k.id = {$id} and k.status ='1'";
                $result = $this->db->query($query);
                return $result->result_array();

        }

      function get_detail_image($id){
        $query = "SELECT i.*,k.judul,k.konten_jenis FROM image i
            JOIN konten k ON k.konten = i.uuim
            WHERE k.id = {$id} and k.status ='1'";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function get_slider(){
        $query = "SELECT * FROM slider s
        where s.status ='1' 
        order by s.slider_id desc";
        $result = $this->db->query($query);
        return $result->result_array();

    }

   

    function login($username,$password){
        $pass=sha1($password);
        $query = "SELECT u.id, u.user FROM user u
            WHERE user = '{$username}' AND `pass` = '{$pass}' AND status = '1'";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    function keys(){
        $query = "SELECT `key` FROM `keys`";
        $result = $this->db->query($query);
        return $result->row();

    }

    function rubahpass($id,$data){
        $this->db->where('id',$id);
        $this->db->update('user',$data);

    }


    public function get_password($id) {
        $this->db->select('pass');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }







}

 ?>
