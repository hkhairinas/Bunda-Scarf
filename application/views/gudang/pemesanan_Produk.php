
<div id="page-wrapper">
<div class='col-lg-12'>
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Stok Produk yang Kurang</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
	<div class="alert alert-warning"><i class="fa fa-info-circle"></i> Harap Segera <span style="color:red">Cetak </span>dan <span style="color:red"> <a> Hubungi Admin </a></span> untuk Melakukan Pembelian Barang! </div> <hr>
	<table class="table table-bordered table-striped" id="myTable">
	<thead>
		<tr>
			<th>
				No.
			</th>
			<th>
				Id Produk
			</th>
			<th>
				Nama Produk
			</th>
			<th>
				Nama Supplier
			</th>
			<th>
				Sisa Stok
			</th>
<!-- 			<th>
				Harga Beli
			</th>
			<th>
				Harga Jual
			</th> -->
			<th>
				Aksi
			</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($data_produk as $data) {
		?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data['ID_PROD']; ?>
			</td>
			<td>
			<?php echo $data['NAMA_PROD']; ?>
			</td>
			<td>
			<?php echo $data['NAMA_SUPP']; ?>
			</td>
			<td>
			<?php echo $data['STOK']; ?>
			</td>
			<!-- <td>
			Rp. <?php echo $data['HARGA_BELI']; ?>,00
			</td>
			<td>
			Rp. <?php echo $data['HARGA_JUAL']; ?>,00
			</td> -->

			<th>
			<a href="<?php echo site_url('gudang/detailProdukPemesanan/'.$data['ID_PROD'])?>" class="btn btn-block btn-default"><i class="fa fa-info"></i> Detail 
			</a>
			
			</th>

		</tr>

		<?php } ?>
	</tbody>
</table>
	<hr>
			<a href="<?php echo site_url('laporan/cetakPemesanan'); ?>" class="btn btn-info pull-right"><i class="fa fa-print"></i> Cetak</a>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script> 