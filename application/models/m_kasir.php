<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kasir extends CI_Model {

	public function getPenjualan(){
		$sql = $this->db->get('penjualan');
		return $sql->result_array();
	}

	//    ID PENJUALAN
    public function getIdJual()
    {
        $i = $this->db->query("SELECT MAX(RIGHT(ID_PENJUALAN,4)) as kd_max from penjualan");
        $kd = "";
        if($i->num_rows()>0)
        {
            foreach($i->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "JL-".$kd;
    }

    public function getTambahStok($id_produk,$tambah)
    {
        $q = $this->db->query("SELECT STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK + $tambah;
        }
        return $stok;
    }

    public function getKurangS($id,$kurangs)
    {
        $q = $this->db->query("SELECT S from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->S - $kurangs;
        }
        return $stok;
    }
    public function getKurangM($id,$kurangs)
    {
        $q = $this->db->query("SELECT M from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->M - $kurangs;
        }
        return $stok;
    }
    public function getKurangL($id,$kurangs)
    {
        $q = $this->db->query("SELECT L from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->L - $kurangs;
        }
        return $stok;
    }
    public function getKurangXL($id,$kurangs)
    {
        $q = $this->db->query("SELECT XL from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->XL - $kurangs;
        }
        return $stok;
    }
    public function getKurangAS($id,$kurangs)
    {
        $q = $this->db->query("SELECT ALL_SIZE from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->ALL_SIZE - $kurangs;
        }
        return $stok;
    }
    public function getKurangS1($id,$kurangs)
    {
        $q = $this->db->query("SELECT s1 from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->s1 - $kurangs;
        }
        return $stok;
    }
    public function getKurangM2($id,$kurangs)
    {
        $q = $this->db->query("SELECT m2 from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->m2 - $kurangs;
        }
        return $stok;
    }
    public function getKurangL3($id,$kurangs)
    {
        $q = $this->db->query("SELECT l3 from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->l3 - $kurangs;
        }
        return $stok;
    }
    public function getKurangXL4($id,$kurangs)
    {
        $q = $this->db->query("SELECT xl4 from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->xl4 - $kurangs;
        }
        return $stok;
    }
    public function getKurangAS5($id,$kurangs)
    {
        $q = $this->db->query("SELECT as5 from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->as5 - $kurangs;
        }
        return $stok;
    }

    public function getKurangStok($id_produk,$kurangi)
    {
        $q = $this->db->query("SELECT STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK - $kurangi;
        }
        return $stok;
    }
    public function getKembalikanStok($id_produk)
    {
        $q = $this->db->query("SELECT STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK;
        }
        return $stok;
    }

    public function getKat(){
        return $this->db->query("SELECT * from kategori")->result();
    }

    public function getProdJual(){
        return $this->db->query ("SELECT * from produk")->result();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

    public function getDataJual($id){
        return $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.ID_KATEGORI, a.ID_SUB, a.STOK, a.HARGA_JUAL, b.NAMA_KATEGORI, c.JENIS_PRODUK,d.ID_PROD, d.S, d.M, d.L, d.XL, d.ALL_SIZE from produk a join kategori b on a.ID_KATEGORI=b.ID_KATEGORI join kategori_sub c on a.ID_SUB=c.ID_SUB join produk_stok d on a.ID_PROD=d.ID_PROD where a.ID_PROD='$id'")->result();
    }

    public function getDataJual2($id){
        return $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.ID_KATEGORI, a.ID_SUB, a.STOK, a.HARGA_JUAL, b.NAMA_KATEGORI, c.JENIS_PRODUK,d.ID_PROD, d.s1, d.m2, d.l3, d.xl4, d.as5 from produk a join kategori b on a.ID_KATEGORI=b.ID_KATEGORI join kategori_sub c on a.ID_SUB=c.ID_SUB join produk_stok d on a.ID_PROD=d.ID_PROD where a.ID_PROD='$id'")->result();
    }

    public function getDataKat($id){
        return $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.ID_KATEGORI, a.ID_SUB, a.STOK, a.HARGA_JUAL, b.NAMA_KATEGORI, c.JENIS_PRODUK,d.ID_PROD, d.S, d.M, d.L, d.XL, d.ALL_SIZE from produk a join kategori b on a.ID_KATEGORI=b.ID_KATEGORI join kategori_sub c on a.ID_SUB=c.ID_SUB join produk_stok d on a.ID_PROD=d.ID_PROD where a.ID_KATEGORI='$id'")->result();
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    public function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

}