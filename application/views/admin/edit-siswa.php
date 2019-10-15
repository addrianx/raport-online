<div class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-10 col-lg-8">

				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>

				<?= form_open_multipart('admin/edit_siswa/'.$siswa['siswa_id']);?>
				<div class="form-group">
					<label for="no_siswa" class="">No Siswa</label>
					<input type="text" class="form-control" name="no_siswa" value="<?=$siswa['no_siswa'];?>" id="no_siswa">
				</div>

							

				<div class="form-group">
					<label for="nama_siswa" class="">Nama Siswa</label>
					<input type="text" class="form-control" name="nama_siswa" value="<?=$siswa['nama_siswa'];?>" id="nama_siswa">
				</div>
							

				 <div class="form-group">
				     <label for="email" class="">Email</label>
				     <input type="email" class="form-control" name="email" value="<?=$siswa['email'];?>" id="email" autocomplete="off">
				 </div>



				<div class="form-group">
					<label for="no_telepon" class="">No kontak/HP Siswa</label>
					<input type="text" class="form-control" name="no_telepon" value="<?=$siswa['no_telepon'];?>" id="no_telepon">
				</div>


				  	<label for="foto">Upload Foto</label><br>
				  	<img src="<?=base_url();?>public/images/user/siswa/<?=$siswa['foto'];?>" width="50" height="50" alt="">
				  	<input type="file" value="" name="foto" id="foto">

				<div class="form-group">
					<label for="kelas_sekarang">Kelas Sekarang</label>
					<input type="text" name="" id="" readonly="" value="<?=$siswa['no_kelas'];?> - <?=$siswa['nama_kelas'];?>" class="form-control">
				</div>

				<hr>
				
				
				<div class="row">

				<div class="col-12 col-md-10">
					<h5 class="text-center">Ubah Data Kelas</h5>
				</div>	
				<div class="col-12 col-md-2 d-flex justify-content-center">
					<button class="btn btn-sm btn-danger" id="button-eklas">Edit Kelas</button>
				</div>

					<div class="col-12 col-md-5">
						<div class="form-group">
							<label for="kode_kelas" class="">Kelas</label>
							<select name="kode_kelas" id="kode_kelas" class="form-control" disabled>
								<option value="">- Pilih Kelas -</option>
								<?php foreach ($kelas as $kls) : ?>
									<option value="<?=$kls['no_kelas'];?>" data-id="<?=$kls['no_kelas'];?>"><?= $kls['no_kelas']; ?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="col-12 col-md-7">
						<div class="form-group">
							<label for="nama_kelas" class="">Nama Kelas</label>
							<select name="nama_kelas" id="nama_kelas" class="form-control" disabled>
								
							</select>
						</div>
					</div>	
				</div>

			  	<button type="submit" class="btn btn-lg btn-primary">Update Siswa</button>

				</form>

			</div>
		</div>
	</div>
</div>



