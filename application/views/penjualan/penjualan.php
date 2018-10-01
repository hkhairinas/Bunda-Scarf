<div id="page-wrapper">
<div class='col-lg-12'>
<div class="row">
 <div class="col-lg-12">
 	<h1 class="page-header">Tabel Transaksi Penjualan</h1>
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
				Tanggal Penjualan
			</th>
			<th>
				Id Penjualan
			</th>
			<th>
				Id Pelanggan
			</th>
			<th>
				Kasir
			</th>
			<th>
				Aksi
			</th>

		</tr>
	</thead>

	<tbody>
		<?php 
		$no=1;
		foreach ($datajual as $data) {
		?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data['TANGGAL_PENJUALAN']; ?>
			</td>
			<td>
			<?php echo $data['ID_PENJUALAN']; ?>
			</td>
			<td>
			<?php echo $data['ID_CUST']; ?>
			</td>
			<td>
			<?php echo $data['KASIR']; ?>
			</td>
			<th>
			<a href="<?php echo site_url('penjualan/cetak/' .$data['ID_PENJUALAN'].'/'.$data['TANGGAL_PENJUALAN'])?>" class="btn btn-sm btn-primary"> <span class="fa fa-print"></span> Cetak 
			</a>
			<a href="<?php echo site_url('penjualan/detail/' .$data['ID_PENJUALAN'])?>" class="btn btn-sm btn-info"> <span class="fa fa-info"></span> Detail 
			</a>
			<a href="<?php echo site_url('penjualan/hapus/'.$data['ID_PENJUALAN'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus ?')"> Delete <span class="fa fa-trash-o"></span></a>
			</th>
			
		</tr>

		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>