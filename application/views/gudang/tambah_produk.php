<div id="page-wrapper">
<br>
<div class="col-sm-2"></div>
	<div class="col-md-8">
	<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group">
			<?php echo form_open('gudang/tambah_produk_aksi'); ?>
			<h2 class="page-header">Tambah Produk</h2>

				<div class="col-md-6">
				<label>Pilih Kategori</label>
				<select class="form-control" name="id_kategori" id="id_kategori">
					<option value="">--- Pilih Kategori ---</option>
	                <?php if(isset($data_kategori)){
	                      foreach($data_kategori as $row){
	                ?>
	            	<option value="<?php echo $row->ID_KATEGORI?>"><?php echo $row->NAMA_KATEGORI?></option>
	                 <?php } } ?>
				</select>
				</div>

				<div class="col-md-6">
				<label>Pilih Jenis</label>
				<select class="form-control" name="id_sub" id="id_sub">
	                	<option>--- Pilih Jenis Kategori ---</option>
				</select>	
				</div>

	            <div class="col-md-6">
					<label>Kode Produk</label>
					<input type="text" name="kode" class="form-control" id="kode" value="<?php echo $kode;?>" readonly>
				</div>

				<div class="col-md-6">
				<label>Pilih Supplier</label>
				<select class="form-control" name="id_supplier">
	                <option value="">--- Pilih Supplier ---</option>
	                <?php if(isset($data_supplier)){
	                      foreach($data_supplier as $row){
	                ?>
	            	<option value="<?php echo $row->ID_SUPP?>"><?php echo $row->NAMA_SUPP?></option>
	                 <?php } } ?>
	            </select>
	            </div>

	            <div class="col-md-6">
					<label>Nama Produk</label>
					<input type="text" name="nama" class="form-control">
				</div>

				<div class="col-md-6">
					<label>Harga Beli</label>
					<input type="number" name="hrgb" class="form-control" id="hrgb">
				</div>

	            <div class="col-md-12" id="hrf" style="display: none">
	            	<div class="col-md-1"></div>
	            	<div class="col-md-2">
					<label>S</label>
					<input type="number" name="s" id="s" class="form-control">
					</div>
					<div class="col-md-2">
					<label>M</label>
					<input type="number" name="m" id="m" class="form-control">
					</div>
					<div class="col-md-2">
					<label>L</label>
					<input type="number" name="l" id="l" class="form-control">
					</div>
					<div class="col-md-2">
					<label>XL</label>
					<input type="number" name="xl" id="xl" class="form-control">
					</div>
					<div class="col-md-2">
					<label>ALL SIZE</label>
					<input type="number" name="as" id="as" class="form-control">
					</div>
				</div>

				<div class="col-md-12" id="agk" style="display: none">
	            	<div class="col-md-1"></div>
	            	<div class="col-md-2">
					<label>1</label>
					<input type="number" name="s1" id="s1" class="form-control">
					</div>
					<div class="col-md-2">
					<label>2</label>
					<input type="number" name="m2" id="m2" class="form-control">
					</div>
					<div class="col-md-2">
					<label>3</label>
					<input type="number" name="l3" id="l3" class="form-control">
					</div>
					<div class="col-md-2">
					<label>4</label>
					<input type="number" name="xl4" id="xl4" class="form-control">
					</div>
					<div class="col-md-2">
					<label>5</label>
					<input type="number" name="as5" id="as5" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<label>Stok</label>
					<input type="number" name="stok" id="stok" class="form-control" readonly>
				</div>

				<div class="col-md-6">
					<label>Harga Jual</label>
					<input type="number" name="hrgj" class="form-control" id="hrgj" readonly>
				</div>

				<div class="col-md-8">
					<br>
					<button class="btn btn-md btn-primary" type="submit">Tambah</button>
					<button class="btn btn-md btn-danger" type="reset" value="">Batal</button>
				</div>		
			<?php echo form_close(); ?>
		</div>
	</div>
	</div>
	</div>
<div class="col-sm-2"></div>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$("#hrgb").keyup(function(){
		var hrgbeli = $("#hrgb").val();
		var hargajual = parseInt(hrgbeli)+parseInt(hrgbeli*(20/100));
		$("#hrgj").val(hargajual);
	});

	$("#id_kategori").change(function(){
		var id_kat = $("#id_kategori").val();
		if(id_kat!=2){
		$.ajax({
                type: "POST",
                url : "<?php echo base_url('gudang/getidSub'); ?>",
                data: "id_kategori="+id_kat,
                cache:false,
                success: function(data){
                  	$('#id_sub').html(data);

            }
        });
           	$('#hrf').css({"display":'block'});
           	$('#agk').css({"display":'none'});
            $('#s').val(0); $('#m').val(0); $('#l').val(0); $('#xl').val(0); $('#as').val(0);        
		}
        else{
        $.ajax({
                type: "POST",
                url : "<?php echo base_url('gudang/getidSub'); ?>",
                data: "id_kategori="+id_kat,
                cache:false,
                success: function(data){
                  	$('#id_sub').html(data);

            }
        });
        	$('#agk').css({"display":'block'});
        	$('#hrf').css({"display":'none'});
            $('#s1').val(0); $('#m2').val(0); $('#l3').val(0); $('#xl4').val(0); $('#as5').val(0);
        }     
	});

	/*PILIHAN HURUF*/
	$("#s").keyup(function(){
		var s = $("#s").val();
		var m = $("#m").val();
		var l = $("#l").val();
		var xl = $("#xl").val();
		var as = $("#as").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#s").val(0);}
		
	});
	$("#m").keyup(function(){
		var s = $("#s").val();
		var m = $("#m").val();
		var l = $("#l").val();
		var xl = $("#xl").val();
		var as = $("#as").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#m").val(0);}
	});
	$("#l").keyup(function(){
		var s = $("#s").val();
		var m = $("#m").val();
		var l = $("#l").val();
		var xl = $("#xl").val();
		var as = $("#as").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#l").val(0);}
	});
	$("#xl").keyup(function(){
		var s = $("#s").val();
		var m = $("#m").val();
		var l = $("#l").val();
		var xl = $("#xl").val();
		var as = $("#as").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#xl").val(0);}
	});
	$("#as").keyup(function(){
		var s = $("#s").val();
		var m = $("#m").val();
		var l = $("#l").val();
		var xl = $("#xl").val();
		var as = $("#as").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){
			$("#stok").val(jml);
		}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#as").val(0);}
	});
	
	/*PILIHAN ANGKA*/
	$("#s1").keyup(function(){
		var s = $("#s1").val();
		var m = $("#m2").val();
		var l = $("#l3").val();
		var xl = $("#xl4").val();
		var as = $("#as5").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#s1").val(0);}
		
	});
	$("#m2").keyup(function(){
		var s = $("#s1").val();
		var m = $("#m2").val();
		var l = $("#l3").val();
		var xl = $("#xl4").val();
		var as = $("#as5").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#m2").val(0);}
		
	});
	$("#l3").keyup(function(){
		var s = $("#s1").val();
		var m = $("#m2").val();
		var l = $("#l3").val();
		var xl = $("#xl4").val();
		var as = $("#as5").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#l3").val(0);}
		
	});
	$("#xl4").keyup(function(){
		var s = $("#s1").val();
		var m = $("#m2").val();
		var l = $("#l3").val();
		var xl = $("#xl4").val();
		var as = $("#as5").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#xl4").val(0);}
		
	});
	$("#as5").keyup(function(){
		var s = $("#s1").val();
		var m = $("#m2").val();
		var l = $("#l3").val();
		var xl = $("#xl4").val();
		var as = $("#as5").val();
		var jml = parseInt(s)+parseInt(m)+parseInt(l)+parseInt(xl)+parseInt(as);
		if(jml>=0){$("#stok").val(jml);}
		else{
			alert('Stok yang anda masukkan salah!');
			$("#as5").val(0);}
		
	});
		
})
</script>