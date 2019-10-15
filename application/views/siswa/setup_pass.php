
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-lg-8">

			<h3 class="p-2">Hallo <span class="text-danger"><?=$data_session['email'];?></span></h3>

			<h6 class="p-2">Sepertinya anda belum punya password login, silahkan buat password login dahulu</h6>

			<div class="<?=$this->session->flashdata('css')?>"><?=$this->session->flashdata('alert');?></div>		

			<form action="<?=base_url('set_password/save_password');?>" method="post" class="p-2">

				<div class="form-group">
					<label for="password">Password Anda</label>
					<input type="password" class="pass1 form-control" name="password1">
				</div>

				<div class="form-group">
					<label for="password2">Password Konfirmasi</label>
					<input type="password" class="pass2 form-control" name="password2">
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Atur Password</button>
				</div>
				
			</form>

			<?php var_dump($data_session);?>			

		</div>
	</div>
</div>


