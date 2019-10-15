<div class="content">
   <div class="container-fluid">
      <div class="row justify-content-center">

         <div class="col col-lg-8">

            <?php if($this->session->flashdata()==TRUE):?>
               <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
                  <strong><?=$this->session->flashdata('flash');?> </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif;?>

            <div class="row">
               <div class="col-6 col-md-5">
                  <button type="button" class="btn btn-primary btn-tambah-matapel" data-toggle="modal" data-target="#modalMatPel">Tambah Mata Pelajaran</button>
               </div>
            </div>

            <div class="card">
               <div class="card-header card-header-danger">
                  <h4 class="card-title mt-0"> Daftar Mata Pelajaran</h4>
               </div>

               <div class="card-body">
                  <div class="table-responsive" style="overflow-x: auto;">
                     <table class="table table-hover nowrap display compact" id="myTable">
                        <thead>
                           <tr>
                              <th>
                                 <input type="checkbox" name="check_all" id="check_all">
                              </th>
                              <th>No</th>
                              <th>Nama Mata Pelajaran</th>
                              <th>Kode Mata Pelajaran</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $num=1; ?>
                        <?php foreach($mata_pelajaran as $matpel) :?>
                           <tr>
                              <td>
                                 <input type="checkbox" name="check[]" id="check[]">
                              </td>
                              <td><?=$num?></td>
                              <td><?=$matpel['nama_matpel'];?></td>
                              <td><?=$matpel['id_matpel'];?></td>
                              <td>
                              <button class="btn btn-sm btn-default btn-edit" data-id="<?=$matpel['matpel_id'];?>" data-toggle="modal" data-target="#modalMatPel">Edit</button>
                              <a class="btn btn-sm btn-danger" href="<?=base_url('admin/hapus_mata_pelajaran/'.$matpel['matpel_id']);?>" onclick="return confirm('Data Akan Dihapus, Anda Yakin ?');">Hapus</a>
                              </td>
                           </tr>
                        <?php $num++;?>
                        <?php endforeach;?>
                        </tbody>
                     </table>
                  </div>
               </div>

            </div> <!-- card -->

         </div>

      </div>
   </div>
</div>







<!-- Modal -->
<div class="modal fade" id="modalMatPel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form action="" method="post">

         <div class="modal-header">
            <h5 class="modal-title" id="judul_modal">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body"></div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
         </div>

      </form>

    </div>
  </div>
</div>