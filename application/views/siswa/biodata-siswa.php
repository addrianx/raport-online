<div class="content">
	<div class="container">
		<div class="row justify-content-center">
			
			<div class="col-12 col-lg-8">
				
				 <?php if($this->session->flashdata()==TRUE):?>
		            <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
		               <?=$this->session->flashdata('alert');?>
		               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		               </button>
		            </div>
		         <?php endif;?>

				<form action="" class="p-2" method="post">

					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?=$biodata['tempat_lahir'];?>">
					</div>

					<div class="form-group">
						<label for="">Tanggal Lahir</label>
						<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?=$biodata['tanggal_lahir'];?>">
					</div>

					<div class="form-group">
						<label for="gender">Jenis Kelamin</label>
						<select name="gender" id="gender" class="form-control">
							<?php foreach($gender as $gender): ?>
							<option value="<?=$gender;?>" <?php if(strtolower($biodata['jenis_kelamin']) == $gender) echo"selected" ;?>><?=$gender;?></option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group">
						<label for="agama">Agama</label>
						<select name="agama" id="agama" class="form-control">
							<?php foreach($agama as $religion): ?>
							<option value="<?=$religion;?>" <?php if(strtolower($biodata['agama']) == $religion) echo"selected"; ?>><?=$religion;?></option>
							<?php endforeach;?>
						</select>
					</div>	

					<div class="form-group">
						<label for="goldarah">Golongan Darah</label>
						<select name="goldarah" id="goldarah" class="form-control">
							<?php foreach ($darah as $goldarah ) : ?>
							<option value="<?=$goldarah;?>" <?php if(strtolower($biodata['golongan_darah'])==$goldarah) echo "selected"; ?> ><?=$goldarah;?></option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group">
						<label for="ayah">Nama Ayah</label>
						<input type="text" name="ayah" id="ayah" class="ayah form-control" value="<?=$biodata['nama_ayah'];?>">
					</div>

					<div class="form-group">
						<label for="ibu">Nama Ibu</label>
						<input type="text" name="ibu" id="ibu" class="ibu form-control" value="<?= $biodata['nama_ibu']; ?>">
					</div>

					<div class="form-group">
						<label for="alamat">Alamat Rumah</label>
						<input type="text" name="alamat" id="alamat" class="alamat form-control" value="<?=$biodata['alamat'];?>">
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Simpan Biodata</button>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>