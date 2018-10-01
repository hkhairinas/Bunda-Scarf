<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class gudang extends CI_Controller {
	public function __construct(){
			parent::__construct();
			if($this->session->userdata('isLogin') != TRUE)
		    {
		      $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
		      redirect('login');
		    }else{
			$this->load->model('m_gudang');
		}
	}
	public function index(){
		echo"<script>alert('Login Gudang Sukses')</script>";
		$ttl=array('title'=>'Gudang Bunda Scarf');
		$data['data_produk']=$this->m_gudang->getProdBeli();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/dashboard', $data);	
		$this->load->view('layout/footer');
		
	}
	public function produk(){
		$ttl=array('title'=>'Produk Bunda Scarf');
		$data['dataproduk']=$this->m_gudang->tampil_produk();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/produk', $data);
		$this->load->view('layout/footer');

	}

	public function detailProduk($ID_PROD){
		$data['product'] = $this->m_gudang->getProduk($ID_PROD); 
		$ttl= array('title' =>'Detail Produk');
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/detail_produk', $data);
		$this->load->view('layout/footer');
	}

	public function detailProdukPemesanan($ID_PROD){
		$data['product'] = $this->m_gudang->getProduk($ID_PROD); 
		$ttl= array('title' =>'Detail Produk');
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/detail_produkPesan', $data);
		$this->load->view('layout/footer');
	}

	public function pesan_produk(){
		$ttl=array('title'=>'Pemesanan Produk');
		$data['data_produk']=$this->m_gudang->getProdBeli();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/pemesanan_Produk',$data);
		$this->load->view('layout/footer');
	}

	public function tambah_produk(){
		$ttl=array('title'=>'Tambah Produk',
					'data_supplier'=>$this->m_gudang->getAllData('supplier'),
					'data_kategori'=>$this->m_gudang->getAllData('kategori'),
					'kode'=>$this->m_gudang->getIdProduk()
					);
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/tambah_produk');
		$this->load->view('layout/footer');

	}

	public function getidSub(){
		$id['id_kategori']=$this->input->post('id_kategori');
        $data=array(
            'det_sub'=>$this->m_gudang->getSelectedData('kategori_sub',$id)->result(),
        );
        $this->load->view('gudang/ajax_dSub' ,$data);
	}

	public function tambah_produk_aksi(){
		$data = array(
			'ID_PROD' => $this->input->post('kode'),
			'ID_SUPP' => $this->input->post('id_supplier'),
			'ID_KATEGORI' => $this->input->post('id_kategori'),
			'ID_SUB' => $this->input->post('id_sub'),
			'NAMA_PROD' => $this->input->post('nama'),
			'STOK' => $this->input->post('stok'),
			'HARGA_BELI' => $this->input->post('hrgb'),
			'HARGA_JUAL' => $this->input->post('hrgj'),
		);
		$this->m_gudang->insertData('produk', $data);

		$data_stok = array(
			'ID_PROD' => $this->input->post('kode'),
			'STOK' => $this->input->post('stok'),
			'S' => $this->input->post('s'),
			'M' => $this->input->post('m'),
			'L' => $this->input->post('l'),
			'XL' => $this->input->post('xl'),
			'ALL_SIZE' => $this->input->post('as'),
			's1' => $this->input->post('s1'),
			'm2' => $this->input->post('m2'),
			'l3' => $this->input->post('l3'),
			'xl4' => $this->input->post('xl4'),
			'as5' => $this->input->post('as5'),
					);
		
		$this->m_gudang->insertData('produk_stok', $data_stok);
		redirect('gudang/produk');
			
	}

	public function updateProduk($ID_PROD) 
	{
        $data['product'] = $this->m_gudang->getProduk($ID_PROD); 
		$ttl=array('title'=>'Edit Produk');
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
        $this->load->view('gudang/edit_Produk', $data);
        $this->load->view('layout/footer');
	}

	public function updateProduKDb()
	{
        $data = array(
					'NAMA_PROD' => $this->input->post('nama'),
					'STOK' => $this->input->post('stok'),
					'HARGA_BELI' => $this->input->post('hrgb'),
					'HARGA_JUAL' => $this->input->post('hrgj')
				);

        $condition['ID_PROD'] = $this->input->post('id_prod');      
		$this->m_gudang->updateProduk($data, $condition);
		redirect('gudang/produk');
	}

	public function delete_prod($ID_PROD){
		$hapus['ID_PROD']=  $this->uri->segment(3);
		$this->m_gudang->delete_produk('produk',$hapus);
		$this->m_gudang->delete_produk('produk_stok',$hapus);
		redirect('gudang/produk');
	}
}
?>