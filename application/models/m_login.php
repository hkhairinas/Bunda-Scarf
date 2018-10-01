<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {
  // Berfungsi untuk mengambil data pada tabel user yang ada di database kita
  public function login_mod($data){   
    $user = $this->db->get_where('user',$data);  
    return $user;
  }


  // public function login($username, $password) {
  //       //create query to connect user login database
  //       $this->db->select('*');
  //       $this->db->from('user');
  //       $this->db->where('USERNAME', $username);
  //       $this->db->where('PASSWORD', $password);
  //       $this->db->limit(1);

  //       //get query and processing
  //       $query = $this->db->get();
  //       if($query->num_rows() == 1) {
  //           return $query->result(); //if data is true
  //       } else {
  //           return false; //if data is wrong
  //       }
  //   }
}
?>