<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <a href="tambah-siswa.php"><button type="button" name="tambahSiswa" class="btn btn-primary">Tambah Siswa</button></a>
      </div>
        <div class="col-md-12">
          <div class="card">
          <div class="card-header card-header-primary">
          <h4 class="card-title ">Daftar Pelajar</h4>
          <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
          <div class="table-responsive">
          <table class="table">
          <thead class=" text-primary">
          <td>No</td>
          <td>Foto</td>
          <td>Nama</td>
          <td>Kelas</td>
          <td>Action</td>
          </thead>
          <tbody>

          <?php
          //$id_siswa=mysqli_query($db, "SELECT * FROM siswa LIMIT $awalData, $jumlahDataPerHalaman");
          //$kelas_siswa=mysqli_query($db, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
          ?>


          <?php $num=1; ?>
          <?php //while($class=mysqli_fetch_assoc($kelas_siswa)): ?>
          <?php //while($noID=mysqli_fetch_assoc($id_siswa)):?>
          <tr>
          <td><?=$num;?></td>
          <td><img src="<?= //BASE_URL.'/images/user/'.$noID['foto']; ?>" width="50" height="50" alt="Foto"></td>
          <td><?php// echo $noID['nama_siswa']; ?></td>
          <td><?php// echo $class['prefix_kelas'].'-'.$class['nama_kelas']; ?></td>
          <td>
          <a href="<?=// BASE_URL.'/admin/edit-siswa.php?id='.$noID['id']; ?>" class="btn btn-primary">Ubah</a>
          <a href="" class="btn btn-danger">Hapus</a>
          </td>
          </tr>
          <?php $num++; ?>
          <?php //endwhile; ?>
          <?php //endwhile; ?>
          </tbody>
          </table>
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12">
          <nav aria-label="Page navigation example">
          <ul class="pagination">
          <?php //for($i = 1; $i <= $jumlahHalaman; $i++): ?>
          <?php //if($i == $halamanAktif ): ?>
          <li class="page-item active" aria-current="page">
          <a  class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          </li>
          <?php //else: ?>
          <li class="page-item">
          <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          </li>
          <?php //endif; ?>
          <?php //endfor; ?>
          </ul>
          </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
