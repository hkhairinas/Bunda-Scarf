<?php defined('BASEPATH') OR exit('No direct script access allowed');

// session_start();

Class login extends CI_Controller {
public function __construct() {
parent::__construct();
// Load database
$this->load->model('m_login');
}

// Show login page
public function index() {
	$ttl=array('title'=>'Bunda Scarf');
    $this->load->view('layout/header', $ttl);
    $this->load->view('form_login');
    $this->load->view('layout/footer_login');

}

 
 // Berfungsi untuk melakukan validasi login
 public function validasi() { 
     $data=array(
     'USERNAME'=>$this->input->post('username'),
     'PASSWORD'=>$this->input->post('password')
     );

     $cek=$this->m_login->login_mod($data);
     if($cek->num_rows()==1) {
      foreach ($cek->result() as $data) {
        $_SESSION['id_user']  = $data->ID_USER;
        $_SESSION['username'] 	= $data->USERNAME;
        $_SESSION['nama_user'] 	= $data->NAMA_USER;
        $_SESSION['level'] 		= $data->LEVEL;  
    }

      
      if($this->session->userdata('level')=='Admin'){
        $this->session->set_userdata($cek);
         $this->session->set_userdata('isLogin', TRUE);        
      	 redirect('admin');
      	
      }
      elseif ($this->session->userdata('level')=='Gudang'){
        $this->session->set_userdata($cek);
         $this->session->set_userdata('isLogin', TRUE);                
      	 redirect('gudang');
      	
      }
      elseif ($this->session->userdata('level')=='Penjualan'){
        $this->session->set_userdata($cek);
         $this->session->set_userdata('isLogin', TRUE);        
       	 redirect('penjualan');
      }

    }else{
       // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
       $this->session->set_flashdata('notif','Username dan Password Salah!');
    	 redirect('login/index');
     }
}
 
//  // Berfungsi untuk menghapus session atau logout
 public function logout() {

  
 session_destroy();
 redirect('login');
 } 
}
?>