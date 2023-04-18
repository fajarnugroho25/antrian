<?php


class mapiperbaikan extends CI_Model{   

    function get_listperbaikanhardware(){
        $query = "SELECT * FROM perbaikan
        left join unit on unit.unit_id = perbaikan.unit_id where id_jenis='01' and perbaikan.status!='2' order by prioritas, id_perbaikan ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function get_listperbaikansoftware(){
        $query = "SELECT * FROM perbaikan
        left join unit on unit.unit_id = perbaikan.unit_id where id_jenis='02' and perbaikan.status!='2' order by prioritas, id_perbaikan ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function get_listperbaikanumum(){
        $query = "SELECT * FROM perbaikan
        left join unit on unit.unit_id = perbaikan.unit_id 
        left JOIN jenis_perbaikan ON jenis_perbaikan.id_jenis = perbaikan.id_jenis
        LEFT JOIN admin ON admin.USER = perbaikan.petugas

        where jenis_perbaikan.`status`='IPSRS' and perbaikan.status!='2' and perbaikan.petugas !='' order by prioritas, id_perbaikan ";
        $result = $this->db->query($query);
        return $result->result_array();

    }

    function get_prioritas(){
        $query = "select * from prioritas";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function get_unit(){
        $query = "select * from unit order by unit_nama";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function get_jenis_perbaikan(){
        $query = "select * from jenis_perbaikan";
        $result = $this->db->query($query);
        return $result->result_array();

    }

     function get_perbaikandetil($id_perbaikan){
            $query = "SELECT * FROM perbaikan
        left join unit on unit.unit_id = perbaikan.unit_id  
      WHERE perbaikan.id_perbaikan = '{$id_perbaikan}' ";
       
                $result = $this->db->query($query);
                return $result->result_array();

        }


    function up_rate($id_perbaikan,$datarating){
        $this->db->where('id_perbaikan',$id_perbaikan);
        $this->db->update('perbaikan',$datarating);


    }

    function up_respon($id_perbaikan,$datarespon){
        $this->db->where('id_perbaikan',$id_perbaikan);
        $this->db->update('perbaikan',$datarespon);


    }



 function no_perbaikan()
    {

        $this->db->select('substring(max(perbaikan.id_perbaikan), 4,4) as bln_surat ', false);
        $this->db->limit(1);
        $query2 = $this->db->get('perbaikan');
        $data2 = $query2->row();
        $bln_now = date("m") . "" . date("y");
        $bln_db = $data2->bln_surat;
        //echo $bln_db;
        //echo $bln_now;

        if ($bln_now == $bln_db) {

            $this->db->select('right(max(perbaikan.id_perbaikan),4) as id_perbaikan ', false);
            $this->db->limit(1);
            $this->db->where('substring(perbaikan.id_perbaikan,4,4) =' . $bln_now . '');
            $query = $this->db->get('perbaikan');


            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $id_perbaikan = intval($data->id_perbaikan) + 1;
            } else {
                $id_perbaikan = 1;
            }
            $kodemax = str_pad($id_perbaikan, 4, "0", STR_PAD_LEFT);
            $kodejadi  = "PB" . "-" . $bln_db . "-" . $kodemax;
            return $kodejadi;
        } else
            $this->db->select('right(max(perbaikan.id_perbaikan),4) as id_perbaikan ', false);
        $this->db->limit(1);
        $this->db->where('substring(perbaikan.id_perbaikan,4,4) =' . $bln_now . '');
        $query = $this->db->get('perbaikan');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id_perbaikan = intval($data->id_perbaikan) + 1;
        } else {
            $id_perbaikan = 1;
        }
        $kodemax = str_pad($id_perbaikan, 4, "0", STR_PAD_LEFT);
        $kodejadi  = "PB" . "-" . $bln_now . "-" . $kodemax;
        return $kodejadi;
       
    }


   function inputperbaikan($id_perbaikan, $tgl_input, $unit_id, $user_peminta, $keluhan, $prioritas, $id_jenis, $status)
    {

        $data = array(
            'id_perbaikan' => $id_perbaikan,
            'tgl_input' => $tgl_input,
            'unit_id' => $unit_id,
            'user_peminta' => $user_peminta,
            'keluhan' => $keluhan,
            'prioritas' => $prioritas,
            'id_jenis' => $id_jenis,
            'status' => $status

        );


        $query = $this->db->insert('perbaikan', $data);

        return $query;
    }

}

 ?>
