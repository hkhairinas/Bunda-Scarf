<div id="page-wrapper">
<div class='col-lg-10'>
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Tabel Pelanggan</h1>
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
				Nama Pelanggan
			</th>
			<th>
				Alamat
			</th>
			<th>
				Email
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($datacust as $data) {
		?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data['NAMA_CUST']; ?>
			</td>
			<td>
			<?php echo $data['ALAMAT']; ?>
			</td>
			<td>
			<?php echo $data['EMAIL']; ?>
			</td>
			<th>
			<a href="<?php echo site_url('customer/delete_cust/'.$data['ID_CUST'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <span class="fa fa-trash-o"></span></a>
			</th>
		</tr>

		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>