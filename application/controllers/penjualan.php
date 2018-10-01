<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE){
	      $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
	      redirect('login','refresh');
	    }
	    else{
        $this->load->model('m_kasir');
		$this->load->model('m_gudang');
		$this->load->model('m_penjualan');
		}
	}
	public function index(){	
        echo"<script>alert('Login Penjualan Sukses')</script>";
		$ttl=array('title'=>'Penjualan Bunda Scarf');
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_kasir');
		$this->load->view('penjualan/dashboard');	
		$this->load->view('layout/footer');
	}
    public function detail($ID_PENJUALAN){
        $data['jual'] = $this->m_penjualan->getdetailJual($ID_PENJUALAN); 
        $ttl= array('title' =>'Detail Penjualan');
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_kasir');
        $this->load->view('penjualan/detail_penjualan', $data);
        $this->load->view('layout/footer');
    }
    public function detailProduk($ID_PROD){
        $data['product'] = $this->m_gudang->getProduk($ID_PROD); 
        $ttl= array('title' =>'Detail Produk');
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_kasir');
        $this->load->view('penjualan/detail_produk', $data);
        $this->load->view('layout/footer');
    }

    public function produk(){
        $ttl=array('title'=>'Produk Bunda Scarf');
        $data['dataproduk']=$this->m_gudang->tampil_produk();
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_kasir');
        $this->load->view('penjualan/produk', $data);
        $this->load->view('layout/footer');

    }

    public function hapus($ID_PENJUALAN){
        $hapus['ID_PENJUALAN'] = $this->uri->segment(3);
        $q = $this->m_kasir->getSelectedData("penjualan_produk",$hapus);
        foreach($q->result() as $d){
            $d_u['STOK'] = $this->m_kasir->getTambahStok($d->ID_PROD,$d->JUMLAH);
            $key['ID_PROD'] = $d->ID_PROD;
            $this->m_kasir->updateData("produk",$d_u,$key);
        }
        $this->m_kasir->deleteData("penjualan",$hapus);
        $this->m_kasir->deleteData("penjualan_produk",$hapus);
        redirect('transaksi/datapenjualan','refresh');
    }   

    public function cetak($ID_PENJUALAN,$TANGGAL_PENJUALAN){
        $data['cetak'] = $this->m_penjualan->getdetailJual($ID_PENJUALAN);
        $ttl= array('title' =>'Laporan Penjualan',
                    'id_jual' => $ID_PENJUALAN,
                    'tgl_jual' => $TANGGAL_PENJUALAN,
                    'kasir' => $this->session->userdata('nama_user'),);
        $this->load->view('layout/header', $ttl);
        $this->load->view('laporan/penjualan/NotaPenjualan', $data);
    }

}
?>