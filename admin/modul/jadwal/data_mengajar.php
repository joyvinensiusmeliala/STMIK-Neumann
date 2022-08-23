<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Jadwal</h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Jadwal Mengajar</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Daftar Jadwal Mengajar</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="?page=jadwal&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>

                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Dosen</th>
                              <th>Mata Pelajaran</th>
                              <th>Hari</th>
                              <th>Jam</th>
                              <th>Kelas</th>
                              <th>Semester</th>
                              <th>Kurikulum</th>
                              <th>Tahun Pelajaran</th>
                              <th>Opsi </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                              $mapel = mysqli_query($con,"SELECT * FROM tb_mengajar 
                            INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
                            INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
                            INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

                            -- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
                            INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
                               ");
                              foreach ($mapel as $d) {

                                $carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
                            INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
                            INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
                            INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
                            WHERE tb_silabus.id_silabus='$d[id_silabus]'
                            -- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
                            -- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

                            -- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
                            -- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
                               ");
                              foreach ($carimapel as $cm) {
                              }  
                             ?>

                            <tr>
                              <th scope="row"><b><?=$no++; ?>.</b></th>
                              <td><?=$d['nama_dosen'] ?></td>
                              <td><?=$cm['mapel'] ?></td>
                              <td><?=$d['hari'] ?></td>
                              <td><?=$d['jam_mengajar'] ?></td>
                              <td><?=$d['nama_kelas'] ?></td>
                              <td><?=$cm['semester'] ?></td>
                              <td><?=$cm['nama_kurikulum'] ?></td>
                              <td><?=$d['tahun_ajaran'] ?></td>
                              <td>
                                <a href="?page=jadwal&act=cancel&id=<?=$d['id_mengajar'];?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</a>

                                <!-- <a  href="?page=nilai&mapel=<?=$d['id_pelajaran'];?>" class="btn btn-success btn-sm"><i class="fas fa-file-contract"></i> Lihat Absen</a> -->
                              </td>
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

 