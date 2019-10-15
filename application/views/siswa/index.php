<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-6 col-12">
        <div class="card" style="min-height: 100%;">
          <div class="card-header card-header-danger">
            <h4 class="card-title"><i class="fa fa-user-o"></i> Data Diri</h4>
            <p class="card-category">Daftar Nilai Semester 1 - Tahun Ajaran 2018/2019</p>

          </div>

            <div class="card-body table-responsive" width="100%">
              <div class="row">
                  <div class="col-4 text-center">
                    <img width="100" src="<?=base_url('public/images/user/siswa/'.$user['foto']);?>" class="img-fluid" alt="">
                  </div>
                  <div class="col-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                              <th>Nama Siswa</th>
                                <td><?= $biodata['nama_siswa'] ?></td>
                            </tr>
                            <tr>
                              <th>Tanggal Lahir</th>
                                <td><?= $biodata['tanggal_lahir'] ?></td>
                            </tr>
                            <tr>
                              <th>Agama</th>
                                <td><?= $biodata['agama'] ?></td>
                            </tr>
                            <tr>
                              <th>Jenis Kelamin</th>
                                <td><?= $biodata['jenis_kelamin'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                     <a class="btn btn-primary" href="<?=base_url('siswa/edit_biodata');?>">Edit Biodata</a>
                  </div>
                  <div class="col-12 p-2">
                    <?php //var_dump($user); ?>
                  </div>
              </div>
            </div>
        </div>
      </div>

    <div class="col-lg-6 col-12">
      <div class="card" style="min-height: 100%;">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Tasks:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">

                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    Tugas Siswa
                    <div class="ripple-container"></div>
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Tugas Makalah Bahasa Indonesia - Senin 23 Juli 2019</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Presentasi Kelompok 3 - Senin 6 Juni 2019
                    </td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

    </div>
  </div>
</div>
