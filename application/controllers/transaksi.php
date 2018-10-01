<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// session_start();
class transaksi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE){
	      $this->session->set_flashdata('notif','Login Gagal! Percobaan Hacking!');
	      redirect('login','refresh');
	    }
	    else{
		$this->load->model('m_kasir');
		$this->load->model('m_gudang');
        $this->load->model('m_penjualan');
		}
	}

/*MULAI TRANSAKSI*/
	public function index(){

		$ttl=array('title'=>'Transaksi Penjualan',
					'active_penjualan'=>'active',
		            'id_penjualan'=>$this->m_kasir->getIdJual(),
		            'data_pelanggan'=>$this->m_kasir->getAllData('pelanggan'),
                    'data_produk'=>$this->m_kasir->getProdJual(),
                    'data_kat'=>$this->m_kasir->getKat(),
                    'nama_user'=>$this->session->userdata('nama_user'),
		            );
		$this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_kasir');
		$this->load->view('penjualan/transaksi');	
		$this->load->view('layout/footer');

	}

	public function datapenjualan(){
        $ttl=array('title'=>'Data Transaksi Penjualan Bunda Scarf');
        $data['datajual']=$this->m_kasir->getPenjualan();
        $this->load->view('layout/header', $ttl);
        $this->load->view('layout/navbar_kasir');
        $this->load->view('penjualan/penjualan', $data);            
        $this->load->view('layout/footer');
	}

	public function tbhPenjualan(){
        $ttl=array(
            'title'=>'Tambah Penjualan Barang',
            'active_penjualan'=>'active',
            'id_penjualan'=>$this->m_kasir->getIdJual(),
            'data_produk'=>$this->m_kasir->getProdJual(),
            'data_kat'=>$this->m_kasir->getKat(),
            'data_pelanggan'=>$this->m_kasir->getAllData('pelanggan'),
            'nama_user'=>$this->session->userdata('nama_user'),
        );
        $this->load->view('layout/header', $ttl);
		$this->load->view('layout/navbar_kasir');
		$this->load->view('penjualan/transaksi');	
		$this->load->view('layout/footer');
    }
    public function get_dProd(){
        $id=$this->input->post('id_kategori');
            $data=array(
                'det_prod'=>$this->m_kasir->getDataKat($id)
                );
            $this->load->view('penjualan/ajax_dKategori',$data);
    }

	public function get_dProduk(){
        $ID_PROD=$this->input->post('ID_PROD');
            $data=array(
                'detail_produk'=>$this->m_kasir->getDataJual($ID_PROD));
            $this->load->view('penjualan/ajax_dProduk',$data);
    }

    public function get_dProduk2(){
        $ID_PROD=$this->input->post('ID_PROD');
            $data=array(
                'detail_produk2'=>$this->m_kasir->getDataJual2($ID_PROD));
            $this->load->view('penjualan/ajax_dProduk2',$data);
    }


/*
    public function get_dPelanggan(){
        $id['ID_CUST']=$this->input->post('id_pelanggan');
        $data=array(
            'detail_pelanggan'=>$this->m_kasir->getSelectedData('pelanggan',$id)->result(),
        );
        $this->load->view('penjualan/ajax_dPelanggan',$data);
    }*/

    public function tambah_penjualan_to_cart(){
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
            's1'=> $this->input->post('is1'),
            'm2'=> $this->input->post('im2'),
            'l3'=> $this->input->post('il3'),
            'xl4'=> $this->input->post('ixl4'),
            'as5'=> $this->input->post('ias5'),
        );
        $this->cart->insert($data);
        redirect('transaksi/tbhPenjualan');
    }

	public function simpan_penjualan(){
        $data = array(
            'ID_PENJUALAN'=>$this->input->post('id_penjualan'),
            'ID_CUST'=>$this->input->post('id_pelanggan'),
            'TOTAL_DISK'=>$this->input->post('tot'),
            'TOTAL'=>$this->input->post('total_harga'),
            'TANGGAL_PENJUALAN'=>date("Y-m-d",strtotime($this->input->post('tanggal_penjualan'))),
            'ID_USER'=>$this->session->userdata('id_user'),
            'KASIR'=>$this->session->userdata('nama_user'),
            'DISK'=>$this->input->post('diskont'),
        );
        $this->m_kasir->insertData("penjualan",$data);

        foreach($this->cart->contents() as $items){
            $nm_prod = $items['name'];
            $ID_PROD = $items['id'];
            $qty = $items['qty'];
            $s = $items['s'];
            $m = $items['m'];
            $l = $items['l'];
            $xl = $items['xl'];
            $as = $items['as'];
            $s1 = $items['s1'];
            $m2 = $items['m2'];
            $l3 = $items['l3'];
            $xl4 = $items['xl4'];
            $as5 = $items['as5'];
            $data_detail = array(
                'ID_PENJUALAN' => $this->input->post('id_penjualan'),
                'NAMA_PROD'=> $nm_prod,
                'ID_PROD'=> $ID_PROD,
                'JUMLAH'=>$qty,
            );
            $this->m_kasir->insertData("penjualan_produk",$data_detail);
            $update['STOK'] = $this->m_kasir->getKurangStok($ID_PROD,$qty);
            $key['ID_PROD'] = $ID_PROD;
            $this->m_kasir->updateData("produk",$update,$key);
            $this->m_kasir->updateData("produk_stok",$update,$key);
            $ups['S'] = $this->m_kasir->getKurangS($ID_PROD,$s);
            $upm['M'] = $this->m_kasir->getKurangM($ID_PROD,$m);
            $upl['L'] = $this->m_kasir->getKurangL($ID_PROD,$l);
            $upxl['XL'] = $this->m_kasir->getKurangXL($ID_PROD,$xl);
            $upas['ALL_SIZE'] = $this->m_kasir->getKurangAS($ID_PROD,$as);
            $ups['s1'] = $this->m_kasir->getKurangS($ID_PROD,$s1);
            $upm['m2'] = $this->m_kasir->getKurangM($ID_PROD,$m2);
            $upl['l3'] = $this->m_kasir->getKurangL($ID_PROD,$l3);
            $upxl['xl4'] = $this->m_kasir->getKurangXL($ID_PROD,$xl4);
            $upas['as5'] = $this->m_kasir->getKurangAS($ID_PROD,$as5);
            $keys['ID_PROD'] = $ID_PROD;
            $this->m_kasir->updateData("produk_stok",$ups,$keys);
            $this->m_kasir->updateData("produk_stok",$upm,$keys);
            $this->m_kasir->updateData("produk_stok",$upl,$keys);
            $this->m_kasir->updateData("produk_stok",$upxl,$keys);
            $this->m_kasir->updateData("produk_stok",$upas,$keys);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('transaksi/datapenjualan');
    }


    public function hapus_barang(){
        $id= $this->uri->segment(3);
        $bc=$this->m_kasir->getSelectedData("penjualan",$id);
        foreach($bc->result() as $dph){
            $sess_data['ID_PENJUALAN'] = $dph->id_penjualan;
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
            $hps['ID_PENJUALAN'] = $kode[2];
            $hps['ID_PROD'] = $kode[3];
            $this->m_kasir->deleteData("penjualan_produk",$hps);

            $key_barang['ID_PROD'] = $hps['ID_PROD'];
            $d_u['STOK'] = $kode[4]+$kode[5];
            $this->m_kasir->updateData("produk",$d_u,$key_barang);
        }
        redirect('transaksi/pages_edit/'.$this->session->userdata('ID_PENJUALAN'));
    }
}
?>