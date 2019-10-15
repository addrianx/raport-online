<div class="content">
<div class="container-fluid">
   <div class="row">


   <div class="col-12 col-lg-6">
      <a href="<?= base_url() ;?>admin/daftar-siswa/tambah-siswa" class="btn btn-primary">Tambah Siswa</a>
   </div>
   
      <div class="col-12">

         <?php if($this->session->flashdata()==TRUE):?>
            <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
              <strong><?=$this->session->flashdata('alert');?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif;?>

         <div class="card">
            <div class="card-header card-header-danger">
               <h4 class="card-title mt-0"> Daftar Murid</h4>
               <p class="card-category"> </p>
            </div>

      <!-- Kolom Sorting Data Siswa Berdasarkan Kelas -->
         <form action="<?=base_url('admin/daftar_siswa');?>" method="post">
            <div class="row p-3">

                  <div class="col-sm-4 col-md-2 form-group">
                     <label for="no_kelas">Kelas</label>
                     <select class="form-control sort_no_kelas" id="no_kelas" name="no_kelas">
                        <option>- Pilih Kelas -</option>
                     <?php foreach($kelas as $kls) :?>
                        <option data-id="<?=$kls['no_kelas'];?>"><?=$kls['no_kelas'];?></option>
                     <?php endforeach;?>
                     </select>
                  </div>

                  <div class="col-sm-4 col-md-2 form-group">
                     <label for="nama_kelas">Nama Kelas</label>
                     <select class="form-control nm_kelas" name="nama_kelas" id="nama_kelas" disabled>
                        <option>- PILIH -</option>
                     </select>
                  </div>

                  <div class="col-sm-4 col-md-2 p-4 form-group">
                     <button type="submit" class="btn btn-success">Filter Data</button>
                  </div>
            </div>
         </form>

      <!-- Akhir Kolom Sorting Data Siswa Berdasarkan Kelas --> 

               <div class="card-body">
                  <div class="table-responsive" style="overflow-x: auto;">
                     <table class="table table-hover nowrap compact display" id="myTable">
                        <thead>
                           <tr>
                              <td>
                                 
                              </td>
                              <th>ID</th>
                              <th>Gambar</th>
                              <th>Nama</th>
                              <th>Kelas</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $num = 1; ?>
                           <?php foreach( $siswa as $data ): ?>
                              <tr>
                                 <td>
                                    <input type="checkbox" name="check[]" id="[]">
                                 </td>
                                 <td><?=$num;?></td>
                                 <td><img src="<?= base_url() ;?>public/images/user/siswa/<?=$data['foto'];?>" width="60" height="60" alt=""></td>
                                 <td><a href="<?= base_url() ;?>admin/daftar-siswa/detail-siswa/<?= $data['siswa_id']; ?>"><?= $data['nama_siswa']; ?></a></td>
                                 <td><a href=""><?= $data['no_kelas'].' - '.$data['nama_kelas']; ?></a></td>							
                                 <td>
                                    <a href="<?= base_url() ;?>admin/daftar-siswa/edit-siswa/<?= $data['siswa_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= base_url() ;?>admin/hapusSiswa/<?= $data['siswa_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Hilang anda yakin ?');">Hapus</a>
                                 </td>
                              </tr>
                              <?php $num++; ?>
                           <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                           <tr>
                              <th></th>
                              <th>ID</th>
                              <th>Gambar</th>
                              <th>Nama</th>
                              <th>Kelas</th>
                              <th>Aksi</th>
                           </tr>
                        </tfoot>
                        
                     </table>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>