<video autoplay muted loop id="myVideo">
  <source src="<?=base_url();?>public/vbck/background.webm" type="video/webm">
  Your browser does not support HTML5 video.
</video>

<div class="d-flex align-items-center bg-dark clearfix" style="min-height: 100%; min-width:100%;">
	<div class="container" style>
	<div class="row justify-content-center">
		<div class="col-lg-6">

				<?php if($this->session->flashdata()==TRUE):?>
               <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
                  <strong><?=$this->session->flashdata('alert');?> </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif;?>

		<div class="bg-white p-4">
			<form class="login100-form validate-form" method="post" action="<?=base_url('login/login_cek');?>">
				<h3 class="login100-form-title p-b-49">
					Login
				</h3>
		
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Email Harus Diisi">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="email" placeholder="Type your email">
					<?=form_error('email','<small class="text-danger">','</small>');?>
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="pass" placeholder="Password harus diisi">
					<?=form_error('pass','<small class="text-danger">','</small>');?>
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>
				
				<div class="text-right p-t-8 p-b-31">
					<a href="<?=base_url('login/forgot');?>">
						Lupa password?
					</a>
				</div>
				
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</div>

			</form>
			</div>	
		</div>
		</div>
	</div>
</div>
