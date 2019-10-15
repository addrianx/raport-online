<div class="content">
	<div class="container-fluid">
		<div class="row">


			<div class="col-12 col-lg-6">
				<a href="<?=base_url('admin/daftar-nilai/tambah-nilai');?>" class="btn btn-primary tambah_modal" data-toggle="modal" data-target="#nilaiMdl">Tambah Kelas</a>
			</div>

			<div class="col-12 p-0">
		
			<?php if($this->session->flashdata()==TRUE):?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong><?=$this->session->flashdata('flash');?> </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif;?>


      	<div class="card">
         <div class="card-header card-header-danger">
            <h4 class="card-title mt-0">Daftar Nilai Siswa</h4>
         </div>
			<!-- Kolom Sorting Data Siswa Berdasarkan Kelas -->

			<form action="" id="sortirKelas" method="post">
				<div class="row px-2">
					<h4 class="col-12 mb-0 my-2"><b>Sortir Data Nilai</b></h4>

						<div class="col-sm-3 col-md-2 form-group">
							<label for="no_kelas">Kelas</label>
							<select class="form-control sort_no_kelas" id="no_kelas" name="no_kelas">
								<option value="123">- Pilih Kelas -</option>
								<?php foreach($sortKelas as $kls) :?>
								<option data-id="<?=$kls['no_kelas'];?>"><?=$kls['no_kelas'];?></option>
								<?php endforeach;?>
							</select>
						</div>

						<div class="col-sm-3 col-md-2 form-group">
							<label for="nama_kelas">Nama Kelas</label>
							<select class="form-control sort_nama_kelas" id="nama_kelas" name="nama_kelas">
								<option value="123">- Pilih Nama Kelas -</option>
							</select>
						</div>

						<div class="col-sm-3 col-md-2 form-group">
							<label for="nama_kelas">Mata Pelajaran</label>
							<select class="form-control sort_mata_pelajaran" id="mata_pelajaran" name="mata_pelajaran">
								<option value="123">- Pilih Mata Pelajaran -</option>
							</select>
						</div>

						<div class="col-sm-3 col-md-2 form-group">
							<label for="nama_kelas">Pengajar</label>
							<select class="form-control sort_pengajar" id="pengajar" name="pengajar">
								<option value="123">- Pilih Pegajar -</option>
							</select>
						</div>

						<div class="col-sm-4 col-md-2 p-4 form-group">
							<button type="submit" class="btn btn-success btn-sort-data">Filter Data</button>
						</div>
						
				</div>
			</form>
         	<div class="card-body p-0 m-2">
					<div class="table-responsive" style="overflow-x: auto;">
						<table class="table table-hover nowrap display compact" id="myTable">
								<thead>
									<tr>
										<th>
											
										</th>
										<th>No</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Mata Pelajaran</th>
										<th>Nilai Harian</th>
										<th>Nilai Tugas</th>
										<th>Nilai Mandiri</th>
										<th>Nilai UTS</th>
										<th>Nilai UAS</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<?php if(!empty($daftarNilai)) : ?>
										<?php foreach($daftarNilai as $d) :?>
											<tr>
												<td></td>
												<td></td>
												<td><?=$d['no_siswa'];?></td>
												<td><?=$d['kode_kelas'];?></td>
												<td><?=$d['kode_guru'];?></td>
												<td>
													<a class="btn btn-info btn-sm harian_modal"  href="<?= base_url() ;?>admin/daftar-nilai/edit-nilai/<?=$d['no_siswa']; ?>" data-toggle="modal" data-target="#nilaiMdl" data-id="<?=$d['no_siswa']; ?>" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-pencil"></i><span class="ml-2">EDIT</span></a>
												</td>
												<td>
													<a class="btn btn-info btn-sm tugas_modal"  href="<?= base_url() ;?>admin/daftar-nilai/edit-nilai/<?=$d['no_siswa']; ?>" data-toggle="modal" data-target="#nilaiMdl" data-id="<?=$d['no_siswa']; ?>" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-pencil"></i><span class="ml-2">EDIT</span></a>												
												</td>
												<td>
													<a class="btn btn-info btn-sm mandiri_modal"  href="<?= base_url() ;?>admin/daftar-nilai/edit-nilai/<?=$d['no_siswa']; ?>" data-toggle="modal" data-target="#nilaiMdl" data-id="<?=$d['no_siswa']; ?>" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-pencil"></i><span class="ml-2">EDIT</span></a>													
												</td>
												<td>
													<a class="btn btn-info btn-sm uts_modal"  href="<?= base_url() ;?>admin/daftar-nilai/edit-nilai/<?=$d['no_siswa']; ?>" data-toggle="modal" data-target="#nilaiMdl" data-id="<?=$d['no_siswa']; ?>" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-pencil"></i><span class="ml-2">EDIT</span></a>													
												</td>
												<td>
													<a class="btn btn-info btn-sm uas_modal"  href="<?= base_url() ;?>admin/daftar-nilai/edit-nilai/<?=$d['no_siswa']; ?>" data-toggle="modal" data-target="#nilaiMdl" data-id="<?=$d['no_siswa']; ?>" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-pencil"></i><span class="ml-2">EDIT</span></a>	
												</td>
												<td>
												<a href="" class="btn btn-sm btn-danger hapus_modal" data-id="<?=$d['no_siswa']; ?>" onclick="sweet()" data-matpel="<?=$d['matpel_id']; ?>"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
										<?php endforeach;?>
									<?php endif;?>

								</tbody>
								<tfoot>
									<tr>
										<th></th>
										<th>No</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Mata Pelajaran</th>
										<th>Nilai Harian</th>
										<th>Nilai Tugas</th>
										<th>Nilai Mandiri</th>
										<th>Nilai UTS</th>
										<th>Nilai UAS</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
							</table>
							<button class="btn btn-danger" data-uri="DeleteNilaiSiswa" id="tombol_hapus" disabled>Hapus Data</button>
						</div> <!--table-body -->
					</div> <!--card-body-->
				</div>
			</div>

		</div> <!--row-->
	</div> <!--contianer-fluid-->
</div> <!--content-->

	<div class="modal fade" id="nilaiMdl" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="nilaiModallabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="judul_modal">Nilai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form class="form" action="" method="post">
				
						<div class="row" id="col-nilai"></div> <!-- row -->	
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary btn-form">Simpan Nilai</button>
						</div> 
					</form>
				</div>
				
			</div>
		</div>
	</div>

<script>
		function sweet (){
		swal("Good job!", "You clicked the button!", "success");
		}

</script>