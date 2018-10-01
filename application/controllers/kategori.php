<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class kategori extends CI_Controller {
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
		$ttl=array('title'=>'Kategori Gudang Bunda Scarf');
		$data['datakat']=$this->m_gudang->tampil_kat();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/tampil_kat',$data);	
		$this->load->view('layout/footer');
	}

	public function tampil_sKat(){
		$ttl=array('title'=>'Jenis Kategori Bunda Scarf');
		$data['dataSkat']=$this->m_gudang->tampil_Skat();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/tampil_Skat',$data);	
		$this->load->view('layout/footer');
	}

	public function tambah(){
		$ttl=array('title'=>'Tambah Kategori Gudang Bunda Scarf',
					'idKat'=>$this->m_gudang->getidKat());
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/tambah_kategori');	
		$this->load->view('layout/footer');
	}

	public function tambah_kat_aksi(){
		$data = array(
			'ID_KATEGORI' => $this->input->post('kode'),
			'NAMA_KATEGORI' => $this->input->post('nama'),
			);
		$this->m_gudang->insertData("kategori", $data);
		redirect('kategori');
	}

	public function tambah_sKat(){
		$ttl=array('title'=>'Tambah Kategori Gudang Bunda Scarf',
					'data_kategori'=>$this->m_gudang->getAllData('kategori'));
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_gudang');
		$this->load->view('gudang/tambah_subKat');	
		$this->load->view('layout/footer');
	}

	public function tambah_sKat_aksi(){
		$data = array(
			'ID_KATEGORI' => $this->input->post('id_kategori'),
			'JENIS_PRODUK' => $this->input->post('jenis'),
		);
		
		$this->m_gudang->insertData("kategori_sub", $data);
		redirect('kategori/tampil_Skat');
	}

}