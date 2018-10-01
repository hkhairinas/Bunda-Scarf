
<div class="col-sm-4"></div>
<div class="col-sm-4">
<br>
<style type="text/css">
.box{
	color: #444;
    display: block;
    padding: 10px;
    position: relative;}
	
</style>
<div class="panel panel-default">
<div class="panel-body">
	<div class="box">
		<div class="row">
			<div>
			<img class="img-responsive" src="<?php echo base_url('assets/uploads/logo.png')  ?>" alt="" style="width:210px; height:105px; margin: 0 auto;"></img></div>
		</div>
		<div class="text-center"><h2><span style="color: #964B00;">Toko</span> <span style="color: red"> Bunda Scarf	</span>
			</h2> 			  		
		</div>
	</div>

	<?php echo form_open('login/validasi'); ?>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		<input type="text" id="username" name="username" class="form-control" placeholder="Username"/>
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
	</div>
	<br>
	<button class="btn btn-lg btn-warning btn-block" type="submit" >Login</button>
	<br>
	<input name="remember" type="checkbox" value="Remember Me"> Remember Me
	<br>
	<b><?php echo('Belum Punya Akun?').'</b> '. anchor('home/daftar', 'Daftar','class = ""'); ?>
	<?php echo form_close(); ?>
	<hr>
			<?php
            $message = $this->session->flashdata('notif');
            if($message){
                echo '<p class="alert alert-danger text-center">'.$message .'</p>';
            }?>
	

<!-- </form> -->
</div></div></div>
<div class="col-sm-4"></div>

