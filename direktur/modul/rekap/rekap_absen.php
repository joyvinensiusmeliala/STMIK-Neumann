<?php
$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
	INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
	INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

	-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
	WHERE tb_mengajar.id_mkelas='$_GET[kelas]'
		");
		foreach ($kelasMengajar as $kls) 			
?>

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
<a href="#">KELAS (<?=$kls['nama_kelas']?> )</a>
</li>

</ul>
</div>

					
					<div class="row">
						
						<div class="col-md-12 col-xs-12">	
										

							<div class="card">
								<div class="card-body">

									<table class="table table-head-bg-danger table-xs">
										<thead>
											<tr>
												<th scope="col">No.</th>
												<th>Kode Pelajaran</th>
												<th scope="col">Mata Pelajaran</th>
												<th scope="col">Absensi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no=1;
									

												$carijadwal = mysqli_query($con,"SELECT * FROM tb_mengajar
												WHERE tb_mengajar.id_mkelas='$_GET[kelas]'	");
												foreach ($carijadwal as $j) {
													$kelas = $j['id_mkelas'];
													$semester = $j['id_mkelas'];
													$id_silabus = $j['id_silabus'];
												 


												$carimpl = mysqli_query($con,"SELECT * FROM tb_silabus 
												INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
												INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
												INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
												WHERE tb_silabus.id_silabus='$id_silabus'
												-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
												-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

												-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
												-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
													");
													foreach ($carimpl as $cmp) {
														$mapel = $cmp['mapel'];
														?>
														<?php
													}}
											
											$no=1;
												$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
											INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
											INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
											INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

											-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
											INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
											WHERE tb_mengajar.id_mkelas='$_GET[kelas]'
												");
												foreach ($kelasMengajar as $d) {

													
											?>
											<tr>
												<td><?=$no++; ?>.</td>
												<td><?=$d['kode_pelajaran']; ?></td>
												
												<td>
													<b><?php 	$carimpl = mysqli_query($con,"SELECT * FROM tb_silabus 
												INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
												INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
												INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
												WHERE tb_silabus.id_silabus='$d[id_silabus]'
												-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
												-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

												-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
												-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
													");
													foreach ($carimpl as $cmp) {
														$mapel = $cmp['mapel'];
														?>
														<b><?=$mapel;?></b><br> <?php }?>
													</b><br>
													<code><?=$d['nama_dosen']; ?></code>
												</td>
												<td>
												<a href="?page=rekap&act=rekap-perbulan&pelajaran=<?=$d['id_mengajar'] ?>&kelas=<?=$_GET[kelas] ?>" class="btn btn-default">
												<span class="btn-label">
												<i class="fas fa-clipboard"></i>
												</span>
												Rekap Absen
												</a>
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