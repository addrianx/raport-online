<div class="content">
   <div class="container-fluid">
      <div class="d-flex">
         
         <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">

               <div class="table-responsive">
                  <table class="table display nowrap" id="myTable">
                     <thead>
                     <tr>
                     <th rowspan="2">No</th>
                     <th class="text-center" rowspan="2">Nama Siswa</th>
                     <th class="text-center" rowspan="2">NIS</th>
                     <th class="text-center" rowspan="2">Kelas</th>
                     <th class="text-center" colspan="3">Kehadiran</th>
                     <th class="text-center" rowspan="2">Tanggal</th>
                  </tr>
                  <tr>
                        <th class="text-center">Sakit </th>
                        <th class="text-center">Izin </th>
                        <th class="text-center">Tanpa Keterangan</th>
                  </tr>
                     </thead>
                     <tbody>
                     <?php $i=1;?>
                     <?php foreach($absensi as $abs) :?>
                        <tr class="text-center">
                           <td><?=$i;?></td>
                           <td><?=$abs['nama_siswa'];?></td>
                           <td><?=$abs['no_siswa'];?></td>
                           <td><?=$abs['no_kelas'];?>-<?=$abs['nama_kelas'];?></td>
                           <td>&#10004;</td>
                           <td></td>
                           <td></td>
                           <td>Senin 12-April-2019</td>
                        </tr>
                        <?php $i++;?>
                     <?php endforeach;?>
                     </tbody>
                  </table>
               </div>

            </div>
         </div>

      </div>
   </div>
</div>