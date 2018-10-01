<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Tabel Produk</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
	<table class="table table-bordered table-striped" id="myTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No.</th>
			<th>Id Produk</th>
			<th>Nama Kategori</th>
			<th>Nama Produk</th>
			<th>Jenis</th>
			<th>Ready Stok</th>
			<th>Harga Jual</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($dataproduk as $data) {
		?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data['ID_PROD']; ?>
			</td>
			<td>
			<?php echo $data['NAMA_KATEGORI']; ?>
			</td>
			<td>
			<?php echo $data['NAMA_PROD']; ?>
			</td>
			<td>
			<?php echo $data['JENIS_PRODUK']; ?>
			</td>
			<td>
			<?php echo $data['STOK']; ?>
			</td>
			<td>
			Rp. <?php echo number_format($data['HARGA_JUAL']); ?>
			</td>

			<th>
			<a href="<?php echo site_url('gudang/detailProduk/'.$data['ID_PROD'])?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Detail 
			</a>
			<a href="<?php echo site_url('gudang/updateProduk/'.$data['ID_PROD'])?>" class="btn btn-sm btn-primary"> Edit <i class="fa fa-edit"></i>
			</a>
			<a href="<?php echo site_url('gudang/delete_prod/'.$data['ID_PROD'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <i class="fa fa-trash-o"></i></a>
			</th>

		</tr>

		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>