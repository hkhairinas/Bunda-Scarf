<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
<div class="col-md-6">
<div class="row">
<div class="panel panel-default">
<div class="panel-body">

<!-- <form action="admin/tambah_user" method="post" style="">
 -->
<?php echo form_open('user/tambah_user_aksi'); ?>
<h2 class="page-header">Tambah User</h2>
<label>Id User</label>
<input type="text" name="id" class="form-control" value="<?php echo $idUser;?>" readonly>
<label>Nama</label>
<input type="text" name="nama" class="form-control">
<label>Username</label>
<input type="text" name="username" class="form-control">
<label>Password</label>
<input type="password" name="password" class="form-control">
<label>Level</label>
<select name="level" class="form-control">
	<option>
		--Pilih--
	</option>
	<option value="1">
		Admin
	</option>
	<option value="2">
		Gudang
	</option>
	<option value="3">
		Penjualan
	</option>
</select>	
<label>No Hp</label>	
<input type="text" name="nomorhp" class="form-control"><br>
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