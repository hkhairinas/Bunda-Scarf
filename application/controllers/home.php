<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navbar_home');
		$this->load->view('layout/home_customer');
		$this->load->view('layout/footer');

		// $this->load->view('layout/header');
		// $this->load->view('form_login');
		// $this->load->view('layout/footer');
	}
	public function daftar(){
		$this->load->view('layout/header');
		$this->load->view('layout/navbar_home');
		$this->load->view('form_daftar');
		$this->load->view('layout/footer');


	}
	public function about(){
		$this->load->view('layout/header');
		$this->load->view('layout/navbar_home');
		$this->load->view('contact/about_us');
		$this->load->view('layout/footer');

	}
}
?>
