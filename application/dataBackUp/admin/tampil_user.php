<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Tabel User</h1>
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
				Nama
			</th>
			<th>
				Username
			</th>
			<th>
				Level
			</th>
			<th>
				No. Hp
			</th>
			<th>
				Aksi
			</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($datauser as $data) {
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['NAMA_USER']; ?></td>
			<td><?php echo $data['USERNAME']; ?></td>
			<td><?php echo $data['LEVEL']; ?></td>
			<td><?php echo $data['NO_HP']; ?></td>
			<th>
			<!-- <a href="<?php echo site_url('admin/updateusr')?>" class="btn btn-sm btn-primary"> Edit <span class="glyphicon glyphicon-pencil"></span>
			</a> -->
			<a href="<?php echo site_url('user/delete_usr/'.$data['ID_USER'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <span class="fa fa-trash-o"></span></a>
			</th>
		</tr>

		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>