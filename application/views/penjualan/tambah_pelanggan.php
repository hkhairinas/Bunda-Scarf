<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
<div class="col-md-6">
<div class="row">
<div class="panel panel-default">
<div class="panel-body">

<!-- <form action="admin/tambah_user" method="post" style="">
 -->
<?php echo form_open('customer/tbh_plgn_aksi'); ?>
<h2 class="page-header">Tambah Pelanggan</h2>
<label>Id Pelanggan</label>
<input type="text" name="idCust" class="form-control" value="<?php echo $idCust;?>" readonly>
<label>Nama Pelanggan</label>
<input type="text" name="nama" class="form-control">
<label>Alamat</label>
<input type="textarea" name="alamat" class="form-control">
<label>Email</label>
<input type="email" name="email" class="form-control">
<br>
<button class="btn btn-md btn-primary" type="submit">Tambah</button>
<button class="btn btn-md btn-danger" type="reset" value="">Batal</button>
<?php echo form_close(); ?>
<!-- </form>
 -->
 </div>
</div>
</div>
<div class="col-sm-3"></div>
</div>
</div>