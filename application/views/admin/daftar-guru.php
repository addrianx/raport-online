<!-- End Navbar -->

<div class="content">

  <div class="container">

    <div class="row">

      <div class="col-12">



      <?php if($this->session->flashdata()==TRUE):?>
         <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
            <strong><?=$this->session->flashdata('flash');?> </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
      <?php endif;?>



      <a href="<?=base_url()?>admin/daftar-guru/tambah-guru" class="btn btn-info">Tambah Guru</a>
        <div class="card">



          <div class="card-header card-header-danger">
            <h4 class="card-title ">Daftar Guru</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>


          <div class="card-body">
            <div class="table-responsive">
              <table table class="table table-hover nowrap compact display" id="myTable">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="check_all" id="check_all">
                    </th>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Guru</th>
                    <th>Kode Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>


                  <tbody>
                  <?php $num = 1; ?>
                  <?php foreach( $guru as $data ): ?>
                  <tr>
                    <td>
                      <input type="checkbox" name="check[]" id="check[]">
                    </td>
                    <td><?php echo $num; ?></td>
                    <td><img src="<?=base_url();?>public/images/user/guru/<?=$data['foto'];?>" width="60" height="60" alt=""></td>
                    <td><a href=""><?= $data['nama_guru']; ?></a></td>
                    <td><strong><?= $data["id_guru"]; ?></strong></td>
                    <td><strong><?= $data["nama_matpel"]; ?></strong></td>
                    <td>
                      <a href="<?= base_url() ;?>admin/daftar-guru/edit-guru/<?= $data['guru_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                      <a href="<?= base_url() ;?>admin/hapusGuru/<?= $data['guru_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Guru Akan Hilang anda yakin ?');">Hapus</a>
                    </td>
                  </tr>

                  <?php $num++;

                    endforeach; ?>

                </tbody>

                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Guru</th>
                    <th>Kode Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>

              </table>

            </div> <!-- card-body -->
          </div> <!-- card-body -->

        </div> <!-- card -->
      </div> <!-- col-12 -->
    </div> <!-- row -->
  </div><!-- container-fluid -->



</div> <!-- content -->

