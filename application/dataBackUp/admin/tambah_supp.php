<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
<!-- <form action="<?php echo base_url().'admin/tambah_supp_aksi'; ?>" method="post"> -->
<?php echo form_open('supplier/tambah_supp_aksi'); ?>
<h2 class="page-header">Tambah Supplier</h2>
<label>Id Supplier</label>
<input type="text" name="id" class="form-control" value="<?php echo $idSupp;?>" readonly>
<label>Nama</label>
<input type="text" name="nama" class="form-control">
<label>No Telp</label>
<input type="number" name="notelp" class="form-control"><br>
<button class="btn btn-md btn-primary" type="submit">Tambah</button>
<button class="btn btn-md btn-danger" type="reset" value="">Batal</button>
<!-- </form> -->
<?php echo form_close(); ?>
</div>
</div>
</div>
<div class="col-sm-3"></div>
</div>