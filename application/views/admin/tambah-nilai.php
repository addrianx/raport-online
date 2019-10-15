
<div class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-md-offset-1">
			
			<?php echo form_open_multipart('admin/tambah_nilai');?>
				
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>
			
				<div class="card pt-5 pb-5 pl-3 pr-3">
					
						<div class="row">

							<div class="p-3"><h4><strong>Tambah Nilai Siswa</strong></h4></div>

							<div class="col-6 col-lg-4">
								<div class="form-group">
									<label for="agama">Kelas Siswa</label>
									<select class="form-control" id="agama" name="agama">
										<option value="islam">Kelas Siswa</option>
									</select>
								</div>
							</div>

							<div class="col-6 col-lg-4">
								<div class="form-group">
									<label for="agama">Nama Siswa</label>
									<select class="form-control" id="agama" name="agama">
										<option value="islam">Nama Siswa</option>
									</select>
								</div>
							</div>
							
						</div> <!-- row -->		



					<div class="row">

						<div class="col-12">
							<div class="mt-4"><h4><strong>Data Kelas</strong></h4></div>
							<div class="form-group">
								<label for="kelas">Pilih Kelas</label>
								<select class="form-control" id="kelas" name="kelas">
									<option value="0701">7</option>
									<option value="0801">8</option>
									<option value="0901">9</option>
								</select>
							</div>					
						</div>

					<input type="hidden" name="statuses" value="siswa">

					 <div class="col-6">
					 	<button type="submit" class="btn btn-lg btn-primary">Tambah Siswa</button>	
					 </div>
					 
					</div> <!-- row -->	
				 </form>
				</div>				 
		</div>
	</div>
</div>

