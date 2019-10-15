

<div class="limiter">
		<div class="container-login100 fullscreen-bg" >
			<video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
				<source src="<?=base_url();?>public/vbck/background.mp4" type="video/mp4">
			</video>
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				<form class="login100-form validate-form" method="post" action="<?=base_url('login/login_cek');?>">
					<span class="login100-form-title p-b-49">
						Login
					</span>
			
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Type your email">
						<?=form_error('email','<small class="text-danger">','</small>');?>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<?=form_error('pass','<small class="text-danger">','</small>');?>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
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
	

	<div id="dropDownSelect1"></div>