<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group">
			<?php echo form_open('kategori/tambah_kat_aksi'); ?>
				<h2 class="page-header">Tambah Kategori Produk</h2>
				<label>Kode Kategori</label>
				<input type="text" name="kode" class="form-control" value="<?php echo $idKat;?>" readonly>

				<label>Nama Kategori</label>
				<input type="text" name="nama" class="form-control">
		</div>
				<button class="btn btn-md btn-primary" type="submit">Tambah</button>
				<button class="btn btn-md btn-danger" type="reset" value="">Batal</button>
			<?php echo form_close(); ?>
		
	</div>
	</div>
	</div>
<div class="col-sm-3"></div>
</div>