<?php 
// tampilkan data mengajar



$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
	INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	WHERE tb_mengajar.id_mkelas='$data[id_mkelas]' AND tb_thajaran.status=1
-- WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 
");

foreach ($kelasMengajar as $d) 

$carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
	INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
	INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
	INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
	WHERE tb_silabus.id_silabus='$d[id_silabus]'
	");
	
	foreach ($carimapel as $cm) 
$carimapel=$d['mapel'];
	?>

<?php 
	// $carimapel = mysqli_query($con,"SELECT * FROM tb_mengajar
	// -- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
	// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
	// INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
	// WHERE tb_mengajar.id_mkelas='$data[id_mkelas]'");
	
	// foreach ($carimapel as $cmp)
?>



<!-- 
<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						
					</div>
				</div> -->
<div class="page-inner">

	<div class="page-header">
<h4 class="page-title">Rekap Absen</h4> 
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
<a href="#">KELAS (<?=strtoupper($d['nama_kelas']) ?> )</a>
</li>

</ul>
</div>

		<!-- Link Tab  -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Data Rekap Absen Keseluruhan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Data Rekap Absen Per Mata Kuliah</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
                </li> -->
            </ul>
        <!-- End Link Tab  -->		
		<br>
	<div class="row">
		
		<div class="col-md-12 col-xs-12">	
						

			<div class="card">
				<div class="card-body">
					
					<!-- Tab panes -->
					<div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
								<div class="page-inner">
										<div class="page-header">
											<h4> DATA REKAP ABSENSI </h4>
											<ul class="breadcrumbs">
											<h4> <b style="text-transform: uppercase;"><code> <?=$data['nama_siswa'] ?></b></code></h4>
											</ul>
										</div>
							
										<div class="row">
                                                <div class="table-responsive">

                                        

                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
														<th>Nama Dosen</th>
														<th>Mata Kuliah</th>
                                                        <th>Hari</th>
														<th>Tanggal Absen</th>
														<th>Jam Mengajar</th>
														<th>Status</th>
                                                    </tr>
                                                </thead>  
                                                <tbody>
                  
												<!-- Menampilkan Data Mahasiswa  -->

												<?php 	
													$no=1;
													$jadwal_kuliah = mysqli_query($con,"SELECT * FROM _logabsensi
													INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar 
													WHERE _logabsensi.id_siswa='$data[id_siswa]' 
													ORDER BY tgl_absen DESC
													");
													
													foreach ($jadwal_kuliah as $g){

													$carimapelajaran = mysqli_query($con,"SELECT * FROM tb_mengajar
													-- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
													INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
													INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
													INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
													WHERE tb_mengajar.id_dosen='$g[id_dosen]' 
													-- AND tb_mengajar.id_silabus=tb_silabus.id_silabus
													AND tb_mengajar.id_silabus='$g[id_silabus]'

													");
													
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
													<td><?=$cmpl['mapel'];?></td>
													<td><?=$g['hari'];?></td>
													<td><?=$g['tgl_absen'];?></td>
													<td><?=$g['jam_mengajar'];?></td>
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
                            <div id="menu1" class="container tab-pane fade"><br>
                            
							<div class="page-inner">
										<div class="page-header">
											<h4> DATA ABSENSI PER MATAKULIAH </h4>
											<ul class="breadcrumbs">
											<h4> <b style="text-transform: uppercase;"><code> <?=$data['nama_siswa'] ?></b></code></h4>
											</ul>
										</div>
							<!-- Content Menu 1  -->

							<table class="table table-head-bg-primary table-xs">
										<thead>
											<tr>
												<th scope="col">No.</th>
												<th>Kode Pelajaran</th>
												<th scope="col">Mata Pelajaran</th>
												<th scope="col" align="center">Status</th>
											</tr>
										</thead>
										<tbody>
										<?php 	
													$no=1;
												


													$jadwal_kuliah = mysqli_query($con,"SELECT * FROM _logabsensi
													INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar 
													WHERE _logabsensi.id_siswa='$data[id_siswa]' 
													-- GROUP BY tb_mengajar.id_dosen='$data[id_dosen]' AND tb_mengajar.id_mengajar
													GROUP BY tb_mengajar.id_mengajar 
													ORDER BY tgl_absen DESC
													");
													
													foreach ($jadwal_kuliah as $g){

													$carimapelajaran = mysqli_query($con,"SELECT * FROM tb_mengajar
													-- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
													INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
													INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
													WHERE tb_mengajar.id_dosen='$g[id_dosen]' 
													AND tb_mengajar.id_silabus='$g[id_silabus]'
													-- WHERE _logabsensi.id_mengajar='$_GET[pelajaran]' and tb_thajaran.status=1 
													-- GROUP BY tb_mengajar.id_dosen='$g[id_dosen]' DESC
													");
													
													foreach ($carimapelajaran as $cm){ 
														$carimpl = mysqli_query($con,"SELECT * FROM tb_silabus 
														INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
														-- INNER JOIN tb_mengajar ON tb_silabus.id_mengajar=tb_mengajar.id_mengajar
														INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
														INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
														WHERE tb_silabus.id_silabus='$cm[id_silabus]' AND tb_silabus.id_mapel=tb_master_mapel.id_mapel
														
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
												<td><?=$no++; ?>.</td>
												<td><?=$cmpl['kode_mapel']; ?></td>
												<td><b><?=$cmpl['mapel']; ?></b><br>
												<code><?=$cm['nama_dosen']; ?></code>
												</td>
												<td>
												
												<!-- <a href="?page=rekap&act=rekap-perbulan&pelajaran=<?=$cm['id_mengajar'] ?>&kelas=<?=$_GET['kelas'] ?>" class="btn btn-success"> -->
												<a href="?page=rekap&act=approval&pelajaran=<?=$g['id_mengajar'] ?>&Dosen=<?=$cm['nama_dosen']?>" class="btn btn-success">
												<span class="btn-label">
												<i class="fas fa-clipboard"></i>
												</span>
												Approval
												</a>
												<a href="?page=rekap&act=request&pelajaran=<?=$g['id_mengajar'] ?>&Dosen=<?=$cm['nama_dosen']?>" class="btn btn-warning">
												
												<span class="btn-label">
												<i class="fas fa-clipboard"></i>
												</span>
												Request
												</a>
												<a href="?page=rekap&act=rejected&pelajaran=<?=$g['id_mengajar'] ?>&Dosen=<?=$cm['nama_dosen']?>" class="btn btn-danger">
												<span class="btn-label">
												<i class="fas fa-clipboard"></i>
												</span>
												Reject 
												</a>

												<a href="?page=rekap&act=keseluruhan&pelajaran=<?=$g[id_mengajar] ?>&Dosen=<?=$cm[nama_dosen]?>" class="btn btn-info">
												<span class="btn-label">
												<i class="fas fa-clipboard"></i>
												</span>
												Keseluruhan 
												</a>

												</td>
												
											</tr>
										<?php } ?>

										</tbody>
									</table>

							<!-- End Content Menu 1  -->
                            </div>
							</div>
                            
                                    </div>
                                    
                    <!-- End Tab  -->
				
				</div>
					
			</div>
		</div>
		
	</div>
					
				</div>