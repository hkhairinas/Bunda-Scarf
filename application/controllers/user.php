<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class user extends CI_Controller {
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
		$ttl=array('title'=>'User Bunda Scarf');

		$data['datauser']=$this->m_admin->tampil_user();
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_admin');
		$this->load->view('admin/tampil_user',$data);
		$this->load->view('layout/footer');

		}
	public function tambah_user(){
		$ttl=array('title'=>'Tambah User',
              'idUser'=>$this->m_admin->getidUser());
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_admin');
		$this->load->view('admin/tambah_user');
		$this->load->view('layout/footer');

	}
	public function tambah_user_aksi(){
		$ID_USER = $this->input->post('id');
		$NAMA_USER = $this->input->post('nama');
		$USERNAME = $this->input->post('username');
		$PASSWORD = $this->input->post('password');
		$LEVEL = $this->input->post('level');
		$NO_HP = $this->input->post('nomorhp');

		$data = array(
			'ID_USER' => $ID_USER,
			'NAMA_USER' => $NAMA_USER,
			'USERNAME'=>$USERNAME,
			'PASSWORD'=>$PASSWORD,
			'LEVEL'=>$LEVEL,
			'NO_HP'=>$NO_HP
		);
		
		$this->m_admin->tambah_user($data);
		redirect('user');
			
	}

	public function delete_usr($ID_USER){
		$ID_USER =  $this->uri->segment(3);

		$this->m_admin->delete_user($ID_USER);
		redirect('user');
	}
}
?>