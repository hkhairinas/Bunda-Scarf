<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    // session_start();
class Laporan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE){
          $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
          redirect('login','refresh');
        }
        else{
        $this->load->model('m_laporan');
        }
    }
    public function Pembelian(){
        
        $ttl=array(
            'title'=>'Laporan Pembelian',
            'data_penjualan'=>$this->m_laporan->getAllDataPembelian(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_admin');
        $this->load->view('laporan/admin/lap_Pembelian');   
        $this->load->view('layout/footer');
    }    

    public function cari_lapBeli(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapPembelian($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('laporan/admin/hsl_lapBeli',$data);

    }

    public function Penjualan(){
        
        $ttl=array(
            'title'=>'Laporan Penjualan',
            'data_penjualan'=>$this->m_laporan->getAllDataPenjualan(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_kasir');
        $this->load->view('laporan/penjualan/lap_Penjualan');   
        $this->load->view('layout/footer');
    }
    

    public function cari_lapJual(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapPenjualan($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        // $data['total']=$this->m_laporan->getTotalPenjualan($this->input->post('tglAwal'),$this->input->post('tglAkhir'));
        $this->load->view('laporan/penjualan/hsl_lapJual',$data);

    }

    public function cetaklapBeli(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataBeli']=$this->m_laporan->getLapPembelian($tglAwal,$tglAkhir);
        $this->load->view('laporan/admin/laporanPembelian', $data);
    } 

    public function cetaklapJual(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataJual']=$this->m_laporan->getLapPenjualan($tglAwal,$tglAkhir);
        $this->load->view('laporan/penjualan/laporanPenjualan', $data);
    } 

    public function cetakProduk() {
            $data['dataProd']=$this->m_laporan->getLapGudang();
            $this->load->view('laporan/gudang/laporanProduk', $data);
        }

    public function cetakPemesanan(){
            
            $data['data_prod']=$this->m_laporan->getProdBeli();
            $this->load->view('laporan/gudang/laporanPemesanan', $data);
        }
        
}
?>
