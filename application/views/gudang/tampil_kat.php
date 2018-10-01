<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Tabel Kategori Produk</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-bordered table-striped" id="myTable">
	<thead>
		<tr>
			<th>
				No.
			</th>
			<th>
				Kode Kategori
			</th>
			<th>
				Nama Kategori
			</th>
			<th><a href="<?php echo site_url('kategori/tambah');  ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a></th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($datakat as $data) {
		?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data['ID_KATEGORI']; ?>
			</td>
			<td>
			<?php echo $data['NAMA_KATEGORI']; ?>
			</td>

			<td>
			<a href="<?php echo site_url('kategori/updateKategori/'.$data['ID_KATEGORI'])?>" class="btn btn-sm btn-primary"> Edit <i class="fa fa-edit"></i>
			</a>
			<a href="<?php echo site_url('kategori/delete_kategori/'.$data['ID_KATEGORI'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <i class="fa fa-trash-o"></i></a>
			</td>

		</tr>

		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>