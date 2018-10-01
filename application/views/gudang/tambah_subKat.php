<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group">
			<?php echo form_open('kategori/tambah_sKat_aksi'); ?>
				<h2 class="page-header">Tambah Jenis Produk</h2>
				<label>Pilih Kategori</label>
				<select class="form-control" name="id_kategori">
					<option value="">--- Pilih Kategori ---</option>
	                <?php if(isset($data_kategori)){
	                      foreach($data_kategori as $row){
	                ?>
	            	<option value="<?php echo $row->ID_KATEGORI?>"><?php echo $row->NAMA_KATEGORI?></option>
	                 <?php } } ?>
				</select>


				<label>Jenis Produk Kategori</label>
				<input type="text" name="jenis" class="form-control">
		</div>
				<button class="btn btn-md btn-primary" type="submit">Tambah</button>
				<button class="btn btn-md btn-danger" type="reset" value="">Batal</button>
			<?php echo form_close(); ?>
		
	</div>
	</div>
	</div>
<div class="col-sm-3"></div>
</div>