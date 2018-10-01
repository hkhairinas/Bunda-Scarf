<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class customer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE){
			$this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
		    redirect('login');
		}
		else{
		$this->load->model('m_cust');}
	}

	public function index(){
		$ttl=array('title'=>'Pelanggan Bunda Scarf');
		$data['datacust']=$this->m_cust->tampil_pelanggan();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_kasir');
		$this->load->view('penjualan/pelanggan',$data);	
		$this->load->view('layout/footer');
	}

	public function tbh_plgn(){
		$ttl=array('title'=>'Tambah Pelanggan',
					'idCust'=>$this->m_cust->getIdCust());
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_kasir');
		$this->load->view('penjualan/tambah_pelanggan');
		$this->load->view('layout/footer');

	}
	public function tbh_plgn_aksi(){
		$ID_CUST = $this->input->post('idCust');
		$NAMA_CUST = $this->input->post('nama');
		$ALAMAT = $this->input->post('alamat');
		$EMAIL = $this->input->post('email');
		$data = array(
			'ID_CUST' => $ID_CUST,
			'NAMA_CUST' => $NAMA_CUST,
			'ALAMAT' => $ALAMAT,
			'EMAIL' => $EMAIL,
		);
		
		$this->m_cust->tambah_pelanggan($data);
		redirect('customer');
			
	}	

	public function delete_cust($ID_CUST){
		$ID_CUST =  $this->uri->segment(3);

		$this->m_cust->delete_cust($ID_CUST);
		redirect('customer');
	}


}