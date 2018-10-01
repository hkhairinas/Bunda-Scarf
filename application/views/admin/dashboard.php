<div id="page-wrapper">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Selamat Datang Admin <?php echo ucfirst($this->session->userdata('nama_user')) ?> !</h1>
  <p>Ingin Menambah User atau Menambah Supplier?</p>
  <a class="btn btn-primary btn-lg" href="<?php echo site_url('user/tambah_user');?>" role="button">Tambah User</a>
  <a class="btn btn-primary btn-lg" href="<?php echo site_url('supplier/tambah_supp');?>" role="button">Tambah Supplier</a>
  </div>
</div>
</div>
</div>