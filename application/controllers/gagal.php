<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class gagal extends CI_Controller {
    public function index()
    {
        echo "<script>alert('Halaman tidak ditemukan')</script>";
        echo "<hr>";
        echo "<center><h1>Halaman Tidak Ditemukan</h1></center>";
        echo "<hr>";
        
    }
 
}