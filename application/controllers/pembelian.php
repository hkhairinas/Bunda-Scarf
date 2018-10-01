<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    // session_start();
class pembelian extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE){
        if($this->session->userdata('Admin')!= TRUE){
          $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
          redirect('login');}
        }else
        {
        $this->load->model('m_gudang');
        $this->load->model('m_pembelian');
        }
    }
    public function index(){
        $ttl=array(
            'title'=>'Pembelian Produk Bunda Scarf',
            'active_pembelian'=>'active',
            'data_supplier'=>$this->m_pembelian->getAllData('supplier'),
            'data_produk'=>$this->m_pembelian->getProdBeli(),
            'ID_PEMBELIAN'=>$this->m_pembelian->getIdBeli(),
            );
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/pembelian_produk');
        $this->load->view('layout/footer');
    }

    public function dataPembelian(){
        $ttl=array('title'=>'Data Pembelian Bunda Scarf');
        $data['databeli']=$this->m_pembelian->getPembelian();
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/pembelian', $data);            
        $this->load->view('layout/footer');
    }

    public function detailPembelian($ID_PEMBELIAN){
        $data['beli'] = $this->m_pembelian->getdetailBeli($ID_PEMBELIAN); 
        $ttl= array('title' =>'Detail Penjualan');
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/detail_pembelian', $data);
        $this->load->view('layout/footer');
    }
// MULAI PEMBELIAN

    public function tbhpembelian(){
        $ttl=array(
            'title'=>'Tambah pembelian Barang',
            'active_pembelian'=>'active',
            'ID_PEMBELIAN'=>$this->m_pembelian->getIdBeli(),
            'data_produk'=>$this->m_pembelian->getProdBeli(),
            'data_supplier'=>$this->m_pembelian->getAllData('supplier'),
        );
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_admin');
        $this->load->view('admin/pembelian_produk');    
        $this->load->view('layout/footer');
    }

    public function get_dProduk(){
        $ID_PROD=$this->input->post('ID_PROD');
        $data=array(
            'detail_produk'=>$this->m_pembelian->getDataBeli($ID_PROD),
        );
        $this->load->view('admin/ajax_dProduk',$data);
    }/*

    public function get_dSupplier(){
        $id['ID_SUPP']=$this->input->post('id_supplier');
        $data=array(
            'detail_supplier'=>$this->m_pembelian->getSelectedData('supplier',$id)->result(),
        );
        $this->load->view('admin/ajax_dSupplier',$data);
    }*/

    public function tambah_pembelian_to_cart(){
        $data = array(
            'id'    => $this->input->post('id_prod'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nama_prod'),
            's'=> $this->input->post('is'),
            'm'=> $this->input->post('im'),
            'l'=> $this->input->post('il'),
            'xl'=> $this->input->post('ixl'),
            'as'=> $this->input->post('ias'),
            'supp'=> $this->input->post('supp'),
            'hrgb' => $this->input->post('harga'),
            'hrgj' => $this->input->post('hrgj'),
        );
        $this->cart->insert($data);
        redirect('pembelian/tbhpembelian');
    }

    public function simpan_pembelian(){
        foreach($this->cart->contents() as $items){
        $supp = $items['supp'];
        $data = array(
            'ID_PEMBELIAN'=>$this->input->post('ID_PEMBELIAN'),
            'ID_SUPP'=>$supp,
            'TANGGAL_PEMBELIAN'=>date("Y-m-d",strtotime($this->input->post('tanggal_pembelian'))),
            'TOTAL'=>$this->input->post('total'),
            'ID_USER'=>$this->session->userdata('id_user'),
            'ADMIN'=>$this->session->userdata('nama_user'),
        );
        $this->m_pembelian->insertData("pembelian",$data);
        }
        foreach($this->cart->contents() as $items){
            $nm_prod = $items['name'];
            $ID_PROD = $items['id'];
            $qty = $items['qty'];
            $s = $items['s'];
            $m = $items['m'];
            $l = $items['l'];
            $xl = $items['xl'];
            $as = $items['as'];
            $hrgb = $items['hrgb'];
            $hrgj = $items['hrgj'];
            $data_detail = array(
                'ID_PEMBELIAN' => $this->input->post('ID_PEMBELIAN'),
                'NAMA_PROD'=> $nm_prod,
                'ID_PROD'=> $ID_PROD,
                'JUMLAH'=>$qty,
            );
            $this->m_pembelian->insertData("pembelian_produk",$data_detail);

            $update['STOK'] = $this->m_pembelian->getTambahStok($ID_PROD,$qty);
            $key['ID_PROD'] = $ID_PROD;
            $updateH['HARGA_BELI'] = $hrgb;
            $updateJ['HARGA_JUAL'] = $hrgj;
            $this->m_pembelian->updateData("produk",$update,$key);
            $this->m_pembelian->updateData("produk_stok",$update,$key);
            $this->m_pembelian->updateData("produk",$updateH,$key);
            $this->m_pembelian->updateData("produk",$updateJ,$key);

            $ups['S'] = $this->m_pembelian->getTambahS($ID_PROD,$s);
            $upm['M'] = $this->m_pembelian->getTambahM($ID_PROD,$m);
            $upl['L'] = $this->m_pembelian->getTambahL($ID_PROD,$l);
            $upxl['XL'] = $this->m_pembelian->getTambahXL($ID_PROD,$xl);
            $upas['ALL_SIZE'] = $this->m_pembelian->getTambahAS($ID_PROD,$as);
            $keys['ID_PROD'] = $ID_PROD;
            $this->m_pembelian->updateData("produk_stok",$ups,$keys);
            $this->m_pembelian->updateData("produk_stok",$upm,$keys);
            $this->m_pembelian->updateData("produk_stok",$upl,$keys);
            $this->m_pembelian->updateData("produk_stok",$upxl,$keys);
            $this->m_pembelian->updateData("produk_stok",$upas,$keys);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('pembelian/dataPembelian');
    }


    public function hapus_barang(){
        $id= $this->uri->segment(3);
        $bc=$this->m_pembelian->getSelectedData("pembelian",$id);
        foreach($bc->result() as $dph){
            $sess_data['ID_PEMBELIAN'] = $dph->ID_PEMBELIAN;
            $this->session->unset_userdata($sess_data);
        }

        $kode = explode("/",$_GET['kode']);
        if($kode[0]=="tambah")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
        }
        else if($kode[0]=="edit")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
            $hps['ID_PEMBELIAN'] = $kode[2];
            $hps['ID_PROD'] = $kode[3];
            $this->m_pembelian->deleteData("pembelian_produk",$hps);

            $key_barang['ID_PROD'] = $hps['ID_PROD'];
            $d_u['STOK'] = $kode[4]+$kode[5];
            $this->m_pembelian->updateData("produk",$d_u,$key_barang);
        }
        redirect('pembelian/pages_edit/'.$this->session->userdata('ID_PEMBELIAN'));
    }

    public function hapus($ID_PEMBELIAN){
        $hapus['ID_PEMBELIAN'] = $this->uri->segment(3);
        $q = $this->m_pembelian->getSelectedData("pembelian_produk",$hapus);
        foreach($q->result() as $d){
            $d_u['STOK'] = $this->m_pembelian->getTambahStok($d->ID_PROD,$d->JUMLAH);
            $key['ID_PROD'] = $d->ID_PROD;
            $this->m_pembelian->updateData("produk",$d_u,$key);
        }
        $this->m_pembelian->deleteData("pembelian",$hapus);
        $this->m_pembelian->deleteData("pembelian_produk",$hapus);
        redirect('pembelian','refresh');
    }

}
?>