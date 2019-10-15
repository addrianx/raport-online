<?php //require '../header.php'; ?>

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <p class="card-category">Daftar Guru</p>
                  <h3 class="card-title"><?= //jumlahGuru(); ?>
                    <small>Guru</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="#pablo"><i class="fa fa-list text-danger"></i> Semua Daftar Guru...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <p class="card-category">Daftar Siswa</p>
                  <h3 class="card-title"><?= //jumlahSiswa(); ?>
                  <small>Siswa</small>
                 </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="#pablo"><i class="fa fa-list text-danger"></i> Semua Daftar Siswa...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-book"></i>
                  </div>
                  <p class="card-category">Mata Pelajaran</p>
                  <h3 class="card-title"><?= //jumlahPelajaran(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="#pablo"><i class="fa fa-list text-danger"></i> Daftar Mata Pelajaran...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Artikel</p>
                  <h3 class="card-title">+25</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <a href="#pablo"><i class="fa fa-list text-danger"></i> Semua Post...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
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
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="fa fa-user-o"></i> Daftar Guru</h4>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <?php
                //$guru=mysqli_query($db, "SELECT * FROM guru INNER JOIN mata_pelajaran ON guru.id_matpel = mata_pelajaran.id_matpel");
                ?>
                <div class="card-body table-responsive" width="100%">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Mata Ajar</th>

                    </thead>
                    <tbody>
                      <?php $num=1; ?>
                      <?php //while($row=mysqli_fetch_assoc($guru)): ?>
                      <tr>
                        <td><?=$num;?></td>
                        <td><img src="<?= //BASE_URL.'/images/user/'.$row['foto'];?>" alt="" width="50" hegiht="50"></td>
                        <td><strong><?= //ucfirst($row['nama_guru']); ?></strong></td>
                        <td><strong><?= //$row['nama_matpel'] ?></strong></td>

                      </tr>
                      <?php //$num++; ?>
                    <?php //endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary ">
                  <a href="<?= //BASE_URL.'/daftar-siswa.php'; ?>"><h4 class="card-title"><i class="fa fa-graduation-cap"></i> Daftar Siswa</h4></a>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">

                  <?php //$users= mysqli_query($db, "SELECT * FROM siswa LIMIT 5"); ?>

                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Gambar</th>
                      <th>Nama</th>
                      <th>Email</th>
                    </thead>
                    <tbody>
                      <?php $num=1; ?>
                      <?php //while( $row = mysqli_fetch_assoc($users) ): ?>
                      <tr>
                        <td><?= //$num; ?></td>
                        <td><img src="" alt="" width="50" height="50"></td>
                        <td><strong><?= //ucfirst($row['nama_siswa']); ?></strong></td>
                        <td><strong><?= //$row['no_telepon'];?></strong></td>
                      </tr>
                      <?php //$num++; ?>
                    <?php //endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


<?php require'../footer.php';?>
