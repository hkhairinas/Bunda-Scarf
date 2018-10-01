
<link rel="stylesheet" href="<?php echo base_url('assets/css/teslogin.css'); ?>">

<div class="login-page">
  <div class="form">
    <?php echo form_open('login/validasi',array('class'=>'register-form')); ?>
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    <?php echo form_close(); ?>
    <?php echo form_open('login/validasi',array('class'=>'login-form')); ?>
    <h2>Bunda Scarf</h2><hr>
      <input type="text" placeholder="username" name="username" />
      <input type="password" placeholder="password" name="password" />
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    <?php echo form_close(); ?>
  </div>
</div>

<script type="text/javascript">
	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>