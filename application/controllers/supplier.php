<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class supplier extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE){
		if($this->session->userdata('Admin')!= TRUE){
	      $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
	      redirect('login');}
	    }else
	    {
		$this->load->model('m_admin');
		}
	}
	public function index(){
		$ttl=array('title'=>'Supplier Bunda Scarf');
		$data['datasupp']=$this->m_admin->tampil_supplier();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_admin');
		$this->load->view('admin/tampil_supp',$data);
		$this->load->view('layout/footer');

	}
	public function tambah_supp(){
		$ttl=array('title'=>'Tambah Supplier',
					'idSupp'=>$this->m_admin->getidSupp());
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_admin');
		$this->load->view('admin/tambah_supp');
		$this->load->view('layout/footer');

	}
	public function tambah_supp_aksi(){
		$ID_SUPP = $this->input->post('id');
		$NAMA_SUPP = $this->input->post('nama');
		$NO_TELP_SUPP = $this->input->post('notelp');

		$data = array(
			'ID_SUPP' => $ID_SUPP,
			'NAMA_SUPP' => $NAMA_SUPP,
			'NO_TELP_SUPP'=>$NO_TELP_SUPP
		);

		$this->m_admin->tambah_supplier($data);
		redirect('supplier');
			
	}
	public function delete_supp($ID_SUPP){
		$ID_SUPP =  $this->uri->segment(3);

		$this->m_admin->delete_supplier($ID_SUPP);
		redirect('supplier');
	} 
}
?>