<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_cust extends CI_Model {
	public function tampil_pelanggan(){
		$sql = $this->db->get('pelanggan');
		return $sql->result_array();
	}

	public function getIdCust(){
		$i = $this->db->query("select MAX(RIGHT(ID_CUST,3)) as id_max from pelanggan");
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

	public function tambah_pelanggan($data){

		return $this->db->insert('pelanggan',$data);
	}
	public function delete_cust($data){
		return $this->db->where('ID_CUST',$data)->delete('pelanggan');
	}
}