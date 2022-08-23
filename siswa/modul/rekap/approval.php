<?php
$_GET['pelajaran'];

?>
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">
        Rekap Absensi Approval
    </h4>
    
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header d-flex align-items-center">
                <!-- <h4 class="page-title"> -->
                <?php 
                $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
                INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
                INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
                -- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
                -- WHERE tb_mengajar.id_mkelas='$data[id_mkelas]' AND tb_thajaran.status=1
              -- WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 
                WHERE tb_mengajar.id_mengajar = '$_GET[pelajaran]' 
                AND tb_mengajar.id_mkelas='$data[id_mkelas]'
              ");
              
              foreach ($kelasMengajar as $d) 
              
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
                  foreach ($carimapel as $cm) 
                  ?>
                
                <h4 class="card-title"><b><?=$cm['mapel'];?></b></h4>
                <ul class="breadcrumbs">
                <li class="nav-home">
                <li class="nav-item">
                <h4 class="card-title"> <b style="text-transform: uppercase;"><code> <?=$d['nama_dosen'] ?></code></h4>
               
              </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
                <tr>
                <th>#</th>
                    <th>Nama Dosen</th>
                    <th>Hari</th>
                    <th>Jam Mengajar</th>
                    <th>Tanggal Absen</th>
                    <th>Status</th>
                </tr>
            </thead>  
            
              <tbody>
                  
                <!-- Menampilkan Data Mahasiswa  -->

                <?php 	
                    // $no=1;
                    // $jadwal_kuliah = mysqli_query($con,"SELECT * FROM _logabsensi
                    // INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
                    // WHERE _logabsensi.id_siswa='$data[id_siswa]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]' AND status_absen='Approval'
                    // GROUP BY status_absen DESC
                    // ");
                    
                    // foreach ($jadwal_kuliah as $g){
                ?>

<?php 	
													$no=1;
													$jadwal_kuliah = mysqli_query($con,"SELECT * FROM _logabsensi
													INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar 
													WHERE _logabsensi.id_siswa='$data[id_siswa]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND status_absen='Approve'
													GROUP BY _logabsensi.id_mengajar ORDER BY status_absen DESC
													");
													
													foreach ($jadwal_kuliah as $g){

													$carimapelajaran = mysqli_query($con,"SELECT * FROM tb_mengajar
													-- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
													INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
													INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
													WHERE tb_mengajar.id_dosen='$g[id_dosen]'");
													
													foreach ($carimapelajaran as $cm){ 
														$carimpl = mysqli_query($con,"SELECT * FROM tb_silabus 
														INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
														INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
														INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
														WHERE tb_silabus.id_silabus='$cm[id_silabus]'
														-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
														-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

														-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
														-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
														");
														foreach ($carimpl as $cmpl) {
														}  


													}
												?>


                  <tr>
                      <td><?=$no++;?>.</td>                          
                      <td><?=$cm['nama_dosen'];?></td>
                      <td><?=$g['hari'];?></td>
                      <td><?=$g['jam_mengajar'];?></td>
                      <td><?=$g['tgl_absen'];?></td>
                      <td><?php if($g['status_absen']=='Request')
                      { ?>
                        <a class="btn btn-warning btn-sm text-white"></i> Request</a>
                        
                      <?php
                      }
                      if($g['status_absen']=='Approve')
                      { ?>
                        <a class="btn btn-success btn-sm text-white"></i> Approve</a>   
                      <?php
                      } 
                      if($g['status_absen']=='Rejected')
                      { ?>
                        <a class="btn btn-danger btn-sm text-white"></i> Rejected</a> 
                      <?php } ?> 
                      <?php } ?> 
                      
                     </td>
                      
                  </tr>
              </tbody>                        
            </table>
      </div>
        </div>
          </div>
            </div>

  </div>
</div>
