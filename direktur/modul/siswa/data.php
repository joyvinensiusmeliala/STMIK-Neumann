<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Mahasiswa</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="#">Data Siswa</a>
      </li>
      
    </ul>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header d-flex align-items-center">
                <h3 class="h4">Form Entry Siswa</h3>
                <ul class="breadcrumbs">
                    <div class="card-title">
                      <!-- <a href="../mpdf/data_siswa.php" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Unduh PDF</a> -->
                      <!-- <a href="?page=siswa&act=unduhpdf" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Unduh PDF</a> -->
                      
                      <!-- <a href="?page=siswa&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a> -->
                      <a href="../admin/modul/siswa/mpdf/data_siswa.php" class="btn btn-danger btn-sm text-white"><i class="fa fa-download"></i> Unduh PDF</a>
                    </div>
                </ul>
              </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
                <tr>
                <th>#</th>
                    <th>Nama Siswa</th>
                    <th>NIS/NISN</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <th>Foto</th>
                </tr>
            </thead>  
            
              <tbody>
                  
                <!-- Menampilkan Data Mahasiswa  -->

                  <?php 
                    $no=1;
                    $siswa = mysqli_query($con,"SELECT *
          
                    FROM tb_siswa
                    INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
                    INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
                    INNER JOIN tb_jurusan ON tb_siswa.id_jurusan=tb_jurusan.id_jurusan
                    ");
                    foreach ($siswa as $g) {
                  ?>

                  <tr>
                      <td><?=$no++;?>.</td>                          
                      
                      <td><?=$g['nama_siswa'];?></td>
                      <td><?=$g['nis'];?></td>
                      <td><?=$g['nama_jurusan'];?></td>
                      <td><?=$g['nama_kelas'];?></td>
                      <td><?=$g['semester'];?></td>
                      <td><?=$g['th_angkatan'];?></td>
                      <td><?php if ($g['status']==1) {
                          echo "<span class='badge badge-success'>Aktif</span>";
                          
                      }else {
                          echo "<span class='badge badge-danger'>Off</span>";
                      } ?></td>
                      <td><img src="../assets/img/user/<?=$g['foto'] ?>" width="45" height="45"></td>
                        <!-- <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=siswa&act=del&id=<?=$g['id_siswa'] ?>"><i class="fas fa-trash"></i></a>
                      <a class="btn btn-info btn-sm" href="?page=siswa&act=edit&id=<?=$g['id_siswa'] ?>"><i class="far fa-edit"></i></a>
                      </td> -->
                  </tr>
              <?php } ?>
              </tbody>                        
            </table>
      </div>
        </div>
          </div>
            </div>

  </div>
</div>