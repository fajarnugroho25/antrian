<?php 


	class Mtest extends CI_Model{


		function tampilData(){
			$this->db->select('*');
			$this->db->from('datamhs');
			$query = $this->db->get();
			return $query->result_array();
		}
		function insert($data){
			$this->db->insert('datamhs',$data);
		}
		function deletedata($id){
			$this->db->where('id',$id);
			$this->db->delete('datamhs');
		}
		function getdata($id){
			$this->db->select('*');
			$this->db->from('datamhs');
			$this->db->where('id',$id);
			$query = $this->db->get();
			return $query->result_array();
		}

		function update($data,$id){
			$this->db->set($data['mahasiswa']);
			$this->db->where('id',$id);
			$this->db->update('datamhs');

		}
	}
 ?>