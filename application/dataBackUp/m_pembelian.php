 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pembelian extends CI_Model {

    public function getPembelian(){
        $sql = $this->db->get('pembelian');
        return $sql->result_array();
    }

    public function getdetailBeli($id)
    {
        return $this->db->query("SELECT a.ID_PEMBELIAN, a.ID_PROD, b.ID_PEMBELIAN, a.JUMLAH, b.ID_SUPP, c.NAMA_PROD, c.HARGA_BELI, d.NAMA_SUPP from pembelian_produk a join pembelian b on a.ID_PEMBELIAN=b.ID_PEMBELIAN join produk c on a.ID_PROD=c.ID_PROD join supplier d on b.ID_SUPP=d.ID_SUPP where a.ID_PEMBELIAN='$id'")->result();
    }

    public function getDataBeli($id){
        return $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.ID_KATEGORI, a.ID_SUB, a.STOK, a.HARGA_BELI, b.NAMA_KATEGORI, c.JENIS_PRODUK,d.ID_PROD, d.S, d.M, d.L, d.XL, e.ID_SUPP, e.NAMA_SUPP from produk a join kategori b on a.ID_KATEGORI=b.ID_KATEGORI join kategori_sub c on a.ID_SUB=c.ID_SUB join produk_stok d on a.ID_PROD=d.ID_PROD join supplier e on a.ID_SUPP=e.ID_SUPP where a.ID_PROD='$id'")->result();
    }

    public function getIdBeli()
    {
        $i = $this->db->query("select MAX(RIGHT(ID_PEMBELIAN,4)) as id_max from pembelian");
        $kd = "";
        if($i->num_rows()>0)
        {
            foreach($i->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "BL-".$kd;
    }

    public function getTambahStok($id_produk,$tambah)
    {
        $q = $this->db->query("select STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK + $tambah;
        }
        return $stok;
    }

    public function getTambahS($id,$tambahs)
    {
        $q = $this->db->query("SELECT S from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->S + $tambahs;
        }
        return $stok;
    }
    public function getTambahM($id,$tambahs)
    {
        $q = $this->db->query("SELECT M from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->M + $tambahs;
        }
        return $stok;
    }
    public function getTambahL($id,$tambahs)
    {
        $q = $this->db->query("SELECT L from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->L + $tambahs;
        }
        return $stok;
    }
    public function getTambahXL($id,$tambahs)
    {
        $q = $this->db->query("SELECT XL from produk_stok where ID_PROD='".$id."'");
        $stok ="";
        foreach ($q->result() as $d) {
            $stok = $d->XL + $tambahs;
        }
        return $stok;
    }
    public function getKurangStok($id_produk,$kurangi)
    {
        $q = $this->db->query("select STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK - $kurangi;
        }
        return $stok;
    }
    public function getKembalikanStok($id_produk)
    {
        $q = $this->db->query("select STOK from produk where ID_PROD='".$id_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->STOK;
        }
        return $stok;
    }

    public function getProdBeli(){
        return $this->db->query ("SELECT * from produk where STOK < 20")->result();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
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
?>