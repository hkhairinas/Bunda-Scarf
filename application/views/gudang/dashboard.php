 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hai <?php echo ucfirst($this->session->userdata('nama_user')) ?> !</h1>
                        <?php 
                            foreach ($data_produk as $data) {
                            echo "<div style='padding:6px' class='alert alert-warning'><span class='fa fa-info-circle'></span> Stok  <a style='color:red'>". $data['NAMA_PROD']."</a> yang tersisa sudah kurang dari 20 . Diharapkan segera melakukan Pemesanan ! </div>"; 
                        }
                        ?>
                        <hr>
                        <p> Ingin menambah Produk atau memesan Produk?</p>
                        <a class="btn btn-primary btn-lg" href="tambah_produk" role="button">Tambah Produk</a>
                        <a class="btn btn-primary btn-lg" href="pesan_produk" role="button">Pesan Produk</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->