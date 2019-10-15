<div class="content">
   <div class="container-fluid">
      <div class="row">


         <div class="col-md-12">

            <?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>



            <?php if($this->session->flashdata()==TRUE):?>
               <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
                  <strong><?=$this->session->flashdata('flash');?> </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif;?>


            <button type="button" class="btn btn-primary tambah-kelas" data-toggle="modal" data-target="#exampleModal">
               Tambah Kelas
            </button>

            
               <div class="card">
                  <div class="card-header card-header-danger">
                     <h4 class="card-title mt-0">Daftar Kelas</h4>
                  </div>



                  <!-- Kolom Sorting Data Siswa Berdasarkan Kelas -->

                  <form action="" id="sortirKelas" method="post">
                     <div class="row p-3">

                           <div class="col-sm-4 col-md-2 form-group">
                              <label for="no_kelas">Kelas</label>

                              <select class="form-control sort_no_kelas" id="no_kelas" name="no_kelas">
                                 <option value="123">- Pilih Kelas -</option>
                              <?php foreach($kelas as $kls) :?>
                                 <option data-id="<?=$kls['no_kelas'];?>"><?=$kls['no_kelas'];?></option>
                              <?php endforeach;?>
                              </select>
                           </div>



                           <div class="col-sm-4 col-md-2 p-4 form-group">
                              <button type="submit" class="btn btn-success">Filter Data</button>
                           </div>
                     </div>
                  </form>



                  <!-- Akhir Kolom Sorting Data Siswa Berdasarkan Kelas --> 

                  <div class="card-body mt-3 bg-white">
                     <div class="table-responsive">
                     <table class="table nowrap display compact text-center" id="myTable">
                     <h4>Daftar Kelas</h4>

                        <thead>
                           <tr>
                              <th class="text-left">
                                 <input type="checkbox" name="check_all" id="check_all">
                              </th>
                              <th>No</th>
                              <th>Kelas</th>
                              <th>Nama Kelas</th>
                              <th>Kode Kelas</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>

                        <tbody>
                        <?php $num=1;?>
                           <?php foreach($kelasall as $klsa):?>
                              <tr>
                                 <td class="text-left">
                                    <input type="checkbox" name="check[]" id="check[]">
                                 </td>
                                 <td><?=$num;?></td>
                                 <td><?=$klsa['no_kelas'];?></td>
                                 <td><?=$klsa['nama_kelas'];?></td>
                                 <td><?=$klsa['kode_kelas'];?></td>
                                 <td>
                                    <a href="" class="btn btn-sm btn-info btn-edit-kelas" data-toggle="modal" data-target="#exampleModal" data-id="<?=$klsa['id_cab'];?>">Edit</a>
                                    <a href="<?= base_url('admin/hapus_kelas/'.$klsa['id_cab']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Kelas Akan Dihapus, Anda Yakin ?');">Hapus</a>
                                 </td>
                              </tr>
                           <?php $num++;?>
                           <?php endforeach;?>
                        </tbody>

                        <tfoot>
                           <tr>
                              <th>No</th>
                              <th>Kelas</th>
                              <th>Nama Kelas</th>
                              <th>Kode Kelas</th>
                              <th>Aksi</th>
                           </tr>
                        </tfoot>
                     </table>
                     </div>
                  </div>  <!-- card-body -->
               </div> <!-- card card-plain -->

            </div>  <!-- col-md-12 -->
         </div>
      </div>

   </div>








<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="judul-modal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>