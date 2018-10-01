<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE){
		if($this->session->userdata('Admin')!= TRUE){
	      $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
	      redirect('login');}
	    }else
	    {
		}
	}
	public function index(){
	      echo"<script>alert('Login Admin Sukses')</script>";
	      $ttl=array('title'=>'Admin Bunda Scarf');
		  $this->load->view('layout/header', $ttl);
		  $this->load->view('layout/navbar_admin');
		  $this->load->view('admin/dashboard');
		  $this->load->view('layout/footer');
	}

}
?>