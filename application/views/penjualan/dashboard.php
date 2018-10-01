 <!-- Page Content -->
<div id="page-wrapper">
 	<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Hai Kasir <?php echo ucfirst($this->session->userdata('nama_user')) ?> !</h1>
				<p>Mulai Transaksi Hari Ini?</p>
				<p><a class="btn btn-primary btn-lg" href="<?php echo site_url('transaksi')?>" role="button">Transaksi</a></p>
				<hr>
				
				</div>
			</div>
	</div>
</div>
<!-- /#page-content-wrapper -->