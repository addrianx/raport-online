<div class="content">

	<div class="container-fluid">

		<div class="row justify-content-center">

			<div class="col-12 col-md-8">			

				<form action="<?=base_url('admin/edit_guru/'.$guru['guru_id']);?>" method="post" enctype="multipart/form-data">

					<input type="hidden" name="id" value="<?=$guru['guru_id'];?>">
					<input type="hidden" name="gambarLama" value="<?=$guru['foto'];?>">
					<input type="hidden" name="statuses" value="<?=$guru['statuses'];?>">

					<div class="card row justify-content-center">
						<div class="card-body">
							<div class="col-12">
								<div class="form-group">
									<label for="nama_guru" class=""><b>Nama Guru</b></label>
									<input type="text" class="form-control" value="<?=$guru['nama_guru'];?>" name="nama_guru" id="nama_guru">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="id_guru" class=""><b>Kode Guru</b></label>
									<input type="text" name="id_guru" id="if_guru" value="<?= $guru['id_guru']; ?>" class="form-control">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="mata_pelajaran" class=""><b>Mata Pelajaran</b></label>
									<select class="form-control" name="mata_pelajaran" id="mata_pelajaran">
									<?php foreach($mata_pelajaran as $matpel) : ?>
										<option value="<?= $matpel['matpel_id']; ?>" <?php if($guru['matpel_id']==$matpel['matpel_id']) echo"selected"; ?>><?= $matpel['nama_matpel']; ?></option>
									<?php endforeach;?>
									</select>
								</div>
							</div>


							<div class="col-12">
								<div class="form-group">
									<label for="email" class=""><b>Email Guru</b></label>
									<input type="email" class="form-control" value="<?=$guru['email'];?>" name="email" id="email">
								</div>
							</div>



							<div class="col-12">
								<img src="<?=base_url();?>public/images/user/guru/<?=$guru['foto'];?>" width="50" height="50" alt=""class="d-block">
								<input type="file" class="mt-1" name="foto" id="foto">
							</div>

							<div class="col-12 form-group">
								<button type="submit" class="btn btn-primary">Edit Data</button>
							</div>
							
						</div>
					</div>

					

				</form>
			</div>
		</div>
	</div>

</div>