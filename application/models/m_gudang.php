<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_gudang extends CI_Model {
	public function tampil_produk(){
		$sql = $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.STOK, a.HARGA_JUAL, b.ID_KATEGORI, b.NAMA_KATEGORI, c.ID_SUB, c.JENIS_PRODUK from produk a join kategori b on a.ID_KATEGORI=b.ID_KATEGORI join kategori_sub c on a.ID_SUB=c.ID_SUB GROUP BY ID_PROD ORDER BY NAMA_KATEGORI ASC");
		return $sql->result_array();
	}

	public function tampil_kat(){
		/*return $this->db->query("SELECT kategori.ID_KATEGORI, kategori.NAMA_KATEGORI, kategori.UKURAN, kategori_sub.JENIS_PRODUK from kategori, kategori_sub where kategori.ID_KATEGORI=kategori_sub.ID_KATEGORI")->result_array();*/
		$sql = $this->db->get('kategori');
		return $sql->result_array();
	}

	public function tampil_Skat(){
		/*return $this->db->query("SELECT kategori.ID_KATEGORI, kategori.NAMA_KATEGORI, kategori.UKURAN, kategori_sub.JENIS_PRODUK from kategori, kategori_sub where kategori.ID_KATEGORI=kategori_sub.ID_KATEGORI")->result_array();*/
		$sql = $this->db->get('kategori_sub');
		return $sql->result_array();
	}

	public function getIdProduk(){
		$i = $this->db->query("select MAX(RIGHT(ID_PROD,5)) as id_max from produk");
        $kd = "";

        if($i->num_rows()>0)
        {
            foreach($i->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return 'PRD-'.$kd;
	}

	public function getidKat(){
		$i = $this->db->query("select MAX(RIGHT(ID_KATEGORI,3)) as id_max from kategori");
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

	public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    
	public function tambah_kat($data){
		return $this->db->insert('kategori',$data);
	}

	public function tambah_produk($data){
		return $this->db->insert('produk',$data);
	}

	public function getProdBeli(){
        return $this->db->query ("SELECT a.ID_PROD, a.NAMA_PROD, a.HARGA_BELI, a.HARGA_JUAL, a.STOK, b.ID_SUPP, b.NAMA_SUPP from produk a join supplier b on a.ID_SUPP=b.ID_SUPP where STOK < 20")->result_array();
    }
	public function getProduk($id)
	{
        return $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.HARGA_BELI, a.HARGA_JUAL, a.STOK, b.ID_SUPP, b.NAMA_SUPP, c.ID_STOK, c.S, c.M, c.L, c.XL, c.ALL_SIZE, c.s1, c.m2, c.l3, c.xl4, c.as5, d.ID_KATEGORI, d.NAMA_KATEGORI, e.ID_KATEGORI, e.JENIS_PRODUK from produk a join supplier b on a.ID_SUPP=b.ID_SUPP join produk_stok c on a.ID_PROD=c.ID_PROD join kategori d on a.ID_KATEGORI=d.ID_KATEGORI join kategori_sub e on a.ID_KATEGORI=e.ID_KATEGORI where a.ID_PROD='".$id."' GROUP BY ID_PROD")->result();
	}

	public function updateProduk($data, $condition)
	{
        $this->db->where($condition);
        $this->db->update('produk', $data);
	}

	public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

	public function delete_produk($table,$data){
		$this->db->delete($table,$data);
	}
}
?>