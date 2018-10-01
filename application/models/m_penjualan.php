 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_penjualan extends CI_Model {

    public function getdetailJual($id)
    {
        return $this->db->query("SELECT a.ID_PENJUALAN, a.ID_PROD, b.ID_PENJUALAN, a.JUMLAH, b.ID_CUST, b.TANGGAL_PENJUALAN, b.TOTAL, b.TOTAL_DISK, b.DISK , c.NAMA_PROD, c.HARGA_JUAL, d.NAMA_CUST, e.ID_USER, e.NAMA_USER from penjualan_produk a join penjualan b on a.ID_PENJUALAN=b.ID_PENJUALAN join produk c on a.ID_PROD=c.ID_PROD join pelanggan d on b.ID_CUST=d.ID_CUST join user e on b.ID_USER=e.ID_USER where a.ID_PENJUALAN='$id'")->result();
    }

    public function getNota($id)
    {

        return $this->db->query("SELECT * from penjualan where ID_PENJUALAN='".$id."'")->result_array();
    }

    public function getStok($id){
    	return $this->db->query("SELECT STOK from produk where ID_PROD='$id'");
    	$query=$this->db->get();
    	$result=$query->result_array();

    	foreach ($result as $k) {
    		$stok = $k['STOK'];
    	}
    	return $stok;
    }

}
?>