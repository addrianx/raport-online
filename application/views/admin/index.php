      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-xl-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <p class="card-category">Jumlah Guru</p>
                  <h3 class="card-title"><?= $jumlahGuru; ?>
                    <small>Guru</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?= base_url('admin/daftar-guru'); ?>"><i class="fa fa-list text-danger"></i> Semua Daftar Guru...</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <p class="card-category">Jumlah Siswa</p>
                  <h3 class="card-title"><?= $jumlahSiswa; ?>
                  <small>Siswa</small>
                 </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?= base_url('admin/daftar-siswa'); ?>"><i class="fa fa-list text-danger"></i> Semua Daftar Siswa...</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-book"></i>
                  </div>
                  <p class="card-category">Mata Pelajaran</p>
                  <h3 class="card-title"><?= $jumlahPelajaran; ?><small> Pelajaran</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?= base_url('admin/mata-pelajaran'); ?>"><i class="fa fa-list text-danger"></i> Daftar Mata Pelajaran...</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Daftar Kelas</p>
                  <h3 class="card-title"><?= $jumlahKelas; ?> <small>Kelas</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <a href="<?= base_url('admin/daftar-kelas'); ?>"><i class="fa fa-list text-danger"></i> Semua kelas...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Indeks Prestasi Mingguan</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> Pertambahan prestasi siswa.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Grup diskusi siswa</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Tugas yang terkumpul</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          
          <div class="row">
            <div class="col-xl-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="fa fa-user-o"></i> Daftar Guru</h4>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive" style="overflow-x: auto;">
                  <table class="table table-striped table-bordered nowrap" id="myTable">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Mata Ajar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num=1; ?>
                        <?php foreach($guru as $data) : ?>
                      <tr>
                        <td><?=$num;?></td>
                        <td><img src="<?=base_url();?>public/images/user/guru/<?=$data['foto'];?>" alt="" width="50" height="50"></td>
                        <td><strong><?= $data['nama_guru']; ?></strong></td>
                        <td><strong><?= $data['nama_matpel']; ?></strong></td>
                        <?php $num++; ?>
                        <?php endforeach; ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary ">
                  <a href="<?= base_url(); ?>/admin/daftar_siswa"><h4 class="card-title"><i class="fa fa-graduation-cap"></i> Daftar Siswa</h4></a>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-bordered no-wrap" id="myTable2">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num=1; ?>
                      <?php foreach( $siswa as $data ): ?>
                      <tr>
                        <td><?= $num; ?></td>
                        <td><img src="<?=base_url();?>public/images/user/siswa/<?=$data['foto'];?>" alt="" width="50" height="50"></td>
                        <td><strong><?= $data['nama_siswa']; ?></strong></td>
                        <td><strong><?= $data['no_kelas'].' - '.$data['nama_kelas']; ?></strong></td>
                      </tr>
                      <?php $num++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
