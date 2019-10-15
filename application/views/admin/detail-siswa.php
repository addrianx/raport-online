<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-profile">
            
               <div class="card-avatar">
                  <img src="<?=base_url();?>public/images/user/siswa/<?= $siswa['foto'] ;?>" alt="" class="img">
               </div>
               
               <div class="card-body">
                  <h3 style="font-weight: 500;" class="card-title"><?= $siswa['nama_siswa'] ;?></h3>
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <h4 style="font-weight: 600;">Kelas</h4>
                        <p><?= $siswa['prefix_kelas'].' - '.$siswa['nama_kelas'];?></p>
                     </div>
                     <div class="col-12 col-md-6">
                        <h4 style="font-weight: 600;">Wali Kelas</h4>
                        <p></p>
                     </div>
                  </div>
               </div>
             </div> <!--card card-profile -->

            <table class="table table-striped">
               <tbody>
                  <tr>
                     <th scope="row">Tempat Lahir</th>
                     <td><?=ucfirst($siswa['tempat_lahir']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Tanggal Lahir</th>
                     <td><?=$siswa['tanggal_lahir'];?></td>
                  </tr>
                  <tr>
                     <th scope="row">Jenis Kelamin</th>
                     <td><?=ucfirst($siswa['jenis_kelamin']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Agama</th>
                     <td><?=ucfirst($siswa['agama']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Golongan Darah</th>
                     <td><?=ucfirst($siswa['golongan_darah']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Alamat tinggal</th>
                     <td><?=ucfirst($siswa['alamat']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Telepon</th>
                     <td><?=ucfirst($siswa['no_telepon']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Email</th>
                     <td><?=ucfirst($siswa['email']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Nama Ayah</th>
                     <td><?=ucfirst($siswa['nama_ayah']);?></td>
                  </tr>
                  <tr>
                     <th scope="row">Nama Ibu</th>
                     <td><?=ucfirst($siswa['nama_ibu']);?></td>
                  </tr>
               </tbody>
               </table>

         </div>
      </div>
   </div>
</div>