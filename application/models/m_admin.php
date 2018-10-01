<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {
	public function tampil_user(){
		$sql = $this->db->get('user');
		return $sql->result_array();
	}

	public function getidUser(){
        $i = $this->db->query("select MAX(RIGHT(ID_USER,3)) as id_max from user");
        $kd = "";
        if($i->num_rows()>0)
        {
            foreach($i->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "U".$kd;
    }

    public function getidSupp(){
        $i = $this->db->query("select MAX(RIGHT(ID_SUPP,3)) as id_max from supplier");
        $kd = "";
        if($i->num_rows()>0)
        {
            foreach($i->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
    
	public function tambah_user($data){

		return $this->db->insert('user',$data);
	}

	public function tampil_supplier(){
		$sql = $this->db->get('supplier');
		return $sql->result_array();
	}
	public function tambah_supplier($data){

		return $this->db->insert('supplier',$data);
	}
	public function delete_user($data){
		return $this->db->where('ID_USER',$data)->delete('user');
	}
	public function delete_supplier($data){
		return $this->db->where('ID_SUPP',$data)->delete('supplier');
	}

}
?>