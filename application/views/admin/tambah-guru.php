<div class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-md-offset-1 ">
				<div class="card p-5">
					
				
				<form action="<?=base_url()?>/admin/prosesGuru" method="post" enctype="multipart/form-data">
					
					<input type="hidden" name="id" value="">
					<input type="hidden" name="statuses" value="guru">
					
					<div class="row">

						<div class="col-12 mb-3">
							<div class="form-group">
								<label for="nama_guru" class=""><b>Nama Guru</b></label>
								<input type="text" class="form-control" name="nama_guru" id="nama_guru">
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label for="id_guru" class=""><b>Kode Guru</b></label>
								<input type="text" class="form-control" name="id_guru" id="id_guru">
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label for="mata_pelajaran" class=""><b>Mata Pelajaran</b></label>
								<input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran">
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label for="email" class=""><b>Email Guru</b></label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label for="password_guru" class=""><b>Password Guru</b></label>
								<input type="text" class="form-control" name="password_guru" id="password_guru">
							</div>
						</div>

						<div class="col-12 mb-3 form-group">
							<img src="" width="50" height="50" alt="" class="form-control-file">
							<input type="file" name="foto" id="foto">
						</div>

					</div>


					
					<button type="submit" class="btn btn-lg btn-primary">Edit Data</button>

				</form>
				</div>
			</div>
		</div>
	</div>
</div>