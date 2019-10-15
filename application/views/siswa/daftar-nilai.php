<div class="content">
   <div class="container-fluid">

      <div class="d-flex">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive" style="overflow-x: auto;">
                  <table class="table table-hover nowrap display compact text-center" id="myTable">

                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Mata Pelajaran</th>
                              <th>Nilai</th>
                           </tr>
                        </thead>

                        <tbody>
                           <?php $num = 1; ?>
                           <?php foreach( $nilai as $data ): ?>
                              <tr class="datatable">
                                 <td><?=$num;?></td>
                                 <td><p><?= $data['nama_matpel']; ?></p></td>
                                 <td>
                                    <a href="<?= base_url('siswa/detail_nilai/'.$data['nl_id']); ?>" class="btn btn-primary">Lihat Nilai</a>
                                 </td>
                              </tr>
                              <?php $num++; ?>
                           <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                           <tr>
                              <th>No</th>
                              <th>Mata Pelajaran</th>
                              <th>Nilai</th>
                           </tr>
                        </tfoot>

                     </table>
                  </div> <!--table-body -->
               </div>
          </div>
      </div>

   </div>
</div>