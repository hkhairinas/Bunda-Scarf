<div id="page-wrapper">
	<div class="row">
	 <div class="col-lg-12">
	 	<h1 class="page-header">Tabel Supplier</h1>
	 </div>
	 </div><!-- 
<div class="panel panel-default">
<div class="panel-body"> -->
	<table class="table table-bordered table-striped" id="myTable">
	<thead>
		<tr>
			<th>
				No.
			</th>
			<th>
				Nama
			</th>
			<th>
				No.Telp
			</th>
			<th>
				Aksi
			</th>

		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($datasupp as $data) {
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['NAMA_SUPP']; ?></td>
			<td><?php echo $data['NO_TELP_SUPP']; ?></td>
			<th>
			<!-- <a href="<?php echo site_url('admin/edit_supplier')?>" class="btn btn-sm btn-primary"> Edit <span class="glyphicon glyphicon-pencil"></span>
			</a> -->
			<a href="<?php echo site_url('admin/delete_supp/'.$data['ID_SUPP'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <span class="fa fa-trash-o"></span></a>
			</th>
			
		</tr>

		<?php } ?>
	</tbody>
</table>
</div><!-- 
</div>
</div> -->
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>