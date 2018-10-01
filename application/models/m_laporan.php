<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_laporan extends CI_Model {

public function getAllDataPenjualan(){
    return $this->db->query("SELECT a.ID_PENJUALAN, a.TANGGAL_PENJUALAN, a.TOTAL,(select count(ID_PENJUALAN) as jum from penjualan_produk where ID_PENJUALAN=a.ID_PENJUALAN) as jumlah from penjualan a ORDER BY a.ID_PENJUALAN ASC")->result();
    }

public function getAllDataPembelian(){
        return $this->db->query("SELECT
                a.ID_PEMBELIAN,
                a.TANGGAL_PEMBELIAN,
                (select count(ID_PEMBELIAN) as jum from pembelian_produk where ID_PEMBELIAN=a.ID_PEMBELIAN) as jumlah
                from pembelian a
                ORDER BY a.ID_PEMBELIAN ASC")->result();
    }

public function getProdBeli(){
        return $this->db->query ("SELECT a.ID_PROD, a.NAMA_PROD, a.HARGA_BELI, a.HARGA_JUAL, a.STOK, b.ID_SUPP, b.NAMA_SUPP from produk a join supplier b on a.ID_SUPP=b.ID_SUPP where STOK < 20")->result_array();
    }

public function getLapGudang(){
	$sql = $this->db->query("SELECT a.ID_PROD, a.NAMA_PROD, a.STOK, a.HARGA_BELI, a.HARGA_JUAL, b.S, b.M, b.L, b.XL, b.ALL_SIZE from produk a join produk_stok b on a.ID_PROD=b.ID_PROD");
		return $sql->result_array();
	}

public function getLapJual(){
    $sql = $this->db->query("SELECT *,sum(a.TOTAL) as total_all from penjualan a
                left join pelanggan b on a.ID_CUST=b.ID_CUST
                left join user c on a.ID_USER=c.ID_USER
                where a.TANGGAL_PENJUALAN GROUP BY ID_PENJUALAN ORDER BY TANGGAL_PENJUALAN ASC");
        return $sql->result_array();
    }

public function getLapBeli(){
        $sql = $this->db->query("SELECT * from pembelian a
                left join supplier b on a.ID_SUPP=b.ID_SUPP
                left join user c on a.ID_USER=c.ID_USER
                left join pembelian_produk d on a.ID_PEMBELIAN=d.ID_PEMBELIAN
                where a.TANGGAL_PEMBELIAN GROUP BY ID_PEMBELIAN ORDER BY TANGGAL_PEMBELIAN ASC");
        return $sql->result_array();
    }

public function getLapPembelian($tglAwal,$tglAkhir){
        return $this->db->query("SELECT * from pembelian a
                left join supplier b on a.ID_SUPP=b.ID_SUPP
                left join user c on a.ID_USER=c.ID_USER
                left join pembelian_produk d on a.ID_PEMBELIAN=d.ID_PEMBELIAN
                where a.TANGGAL_PEMBELIAN between '$tglAwal' and '$tglAkhir' GROUP BY a.ID_PEMBELIAN ORDER BY TANGGAL_PEMBELIAN ASC")->result();
    }

public function getLapPenjualan($tglAwal,$tglAkhir){
        return $this->db->query("SELECT *,sum(a.TOTAL) as total_all from penjualan a
                left join pelanggan b on a.ID_CUST=b.ID_CUST
                left join user c on a.ID_USER=c.ID_USER
                where a.TANGGAL_PENJUALAN between '$tglAwal' and '$tglAkhir' GROUP BY ID_PENJUALAN ORDER BY TANGGAL_PENJUALAN ASC")->result();
		// return $this->db->query("SELECT * FROM penjualan WHERE TANGGAL_PENJUALAN between 'tglAwal' AND  '$tglAkhir'" )
    }
	
}
?>