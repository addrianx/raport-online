
<div class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8">
			
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>
			
					<?php echo form_open_multipart('admin/tambah_siswa');?>
						<div class="card">
							<div class="card-body">
						
								<div class="form-group">
									<label for="no_siswa" class="">No Siswa</label>
									<input type="text" class="form-control" name="no_siswa" id="no_siswa">
								</div>		
								<div class="form-group">
									<label for="nama_siswa" class="">Nama Siswa</label>
									<input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
								</div>
											
								<div class="form-group">
									<label for="email" class="">Email</label>
									<input type="email" class="form-control" name="email" id="email" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="no_telepon" class="">No kontak/HP Siswa</label>
									<input type="text" class="form-control" name="no_telepon" id="no_telepon">
								</div>
									<label for="foto">Upload Foto</label><br>
									<img src="" width="50" height="50" alt="">
									<input type="file" name="foto" id="foto">
								
								<hr>

								<div class="form-group">
									<label for="kode_kelas" class="">Kelas</label>
									<select class="form-control" name="kode_kelas" id="kode_kelas">
										<?php foreach($no_kelas as $nokls):?>
											<option value="<?= $nokls['no_kelas'];?>" data-id="<?=$nokls['no_kelas'];?>"><?=$nokls['no_kelas'];?></option>
										<?php endforeach;?>
									</select>
								</div>

								<div class="form-group">
									<label for="nama_kelas" class="">Nama Kelas</label>
									<select class="form-control" name="nama_kelas" id="nama_kelas"></select>
								</div>

								<div class="form-group">
									<label for="status" class="">Status</label>
									<input readonly type="text" class="form-control" name="status" value="siswa" id="status">
								</div>
								<button type="submit" class="btn btn-lg btn-primary">Update Siswa</button>
						</form>
					</div>
				</div>
			</div>				 
		</div>
	</div>
</div>
