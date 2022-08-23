<?php 
// tampilkan data mengajar
date_default_timezone_set('Asia/Jakarta');

$tanggal = date('Y-m-d');
$day = date('D', strtotime($tanggal));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);

$hari_ini = $dayList[$day];

$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
-- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar = '$_GET[pelajaran]' AND tb_mengajar.hari = '$hari_ini' 
AND tb_mengajar.id_mkelas='$data[id_mkelas]'  AND tb_thajaran.status=1 
-- WHERE tb_mengajar.id_mapel='$data[id_mapel]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

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




<!-- 
<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						
					</div>
				</div> -->
<div class="page-inner">

	<div class="page-header">

    
<h5 class="page-title"><?=$d['nama_dosen']?></h5>
<ul class="breadcrumbs" style="font-weight: bold;">
<li class="nav-home">
<a href="#">
<i class="flaticon-home"></i>
</a>
</li>
<li class="separator">
<i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
<a href="#">Mata Kuliah : <?=$cm['mapel']; ?></a>
</li>
<li class="separator">
<i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
<a href="#">Kelas : <?=$d['nama_kelas']; ?></a>
</li>
</ul>

</div>

					
					<div class="row">
						
						
						<?php 
								// dapatkan pertemuan terakhir di tb izin
								$last_pertemuan = mysqli_query($con,"SELECT * FROM _logabsensi WHERE
								_logabsensi.id_siswa='$data[id_siswa]' AND id_mengajar='$_GET[pelajaran]' GROUP BY pertemuan_ke ORDER BY pertemuan_ke DESC LIMIT 1  ");
								$cekPertemuan = mysqli_num_rows($last_pertemuan);
								$jml = mysqli_fetch_array($last_pertemuan);

								if ($cekPertemuan > 0 ) {
								$pertemuan = $jml['pertemuan_ke']+1;
								}else{
								 $pertemuan = 1;
									
								}

                                $mata_kuliah = $d['mapel'];

								?>

							<div class="card">
								<div class="card-body">
									<form action="" method="post">
									<!-- <div class="card-title fw-mediumbold">DAFTAR HADIR SISWA</div> -->
									<p>
									<span class="badge badge-default" style="padding: 7px;font-size: 14px;"><b>Daftar Hadir Siswa</b>
									</span>
									<span class="badge badge-primary" style="padding: 7px;font-size: 14px;">
									Pertemuan Ke : <b><?=$pertemuan; ?></b>
									</span>
									</p>
									  
									<div class="card-list">
										
										
								
									
									<input type="deat" name="tgl" class="form-control" value="<?=date('l, d-m-Y') ?>" style="background-color: #212121;color: #FFEB3B;">
									
									<input type="hidden" name="pertemuan" class="form-control" value="<?=$pertemuan; ?>">
										<?php 

										// tampilakan data siswa berdasarkan kelas yang dipilih
                                        if ($hari_ini = $d['hari'])
                                        {

                                        
										$siswa = mysqli_query($con,"SELECT * FROM tb_siswa WHERE nis='$data[nis]'");
										$jumlahSiswa = mysqli_num_rows($siswa);
										foreach ($siswa as $i =>$s) {?>

										<div class="item-list">
										<!-- <div class="avatar">
												<img src="../assets/img/user/<?=$s['foto'] ?>" class="avatar-img rounded-circle">
											</div>  -->


                                            
										
											<div class="info-user">
												<div class="username">
													<b class="text-success"><?=$s['nama_siswa']  ?></b>
<?php 
// tampilkan data yg sudah absen
$tgl_hari_ini = date('Y-m-d');
$siswa_telah_absen_hari_ini = mysqli_query($con,"SELECT * FROM _logabsensi 
INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa 
WHERE _logabsensi.id_siswa='$data[id_siswa]' AND _logabsensi.tgl_absen='$tgl_hari_ini' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND _logabsensi.ket='' ");
if (mysqli_num_rows($siswa_telah_absen_hari_ini) < 1) {

// echo '<span class="badge badge-danger">Belum Absen</span>';

}

?>
													<!-- (<code><?=$s['nis'] ?></code>) -->
													<input type="hidden" name="id_siswa-<?=$i;?>" value="<?=$s['id_siswa'] ?>">
                                                    <input type="hidden" name="tgl" value="<?php echo $tgl_hari_ini; ?>">
													<input type="hidden" name="pelajaran" value="<?=$_GET['pelajaran'] ?>">
												</div>
												<div class="status mt-0">
													<div class="form-check">
														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="H">
														<span class="form-check-sign">H</span>
														</label>

														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="I" >
														<span class="form-check-sign">I</span>
														</label>
															<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="S" >
														<span class="form-check-sign">S</span>
														</label> 

														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="T">
														<span class="form-check-sign">T</span>
														</label>

														<label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="A">
														<span class="form-check-sign">A</span>
														</label>

														

														<!-- <label class="form-check-label">
														<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="C">
														<span class="form-check-sign">C</span>
														</label> -->
						<label>
								
						</label>

													</div>


														

													

													
												</div>
											</div>
											
											
										</div>
									<?php }
                                     ?>								
									
										
									
										
									</div>
									<!-- <input type="submit" name="absen" class="btn btn-info"> -->
									<center>
										<button type="submit" name="absen" class="btn btn-success">
										<i class="fa fa-check"></i> Selesai
									</button>

									<!-- <a href="?page=absen&act=update&pelajaran=<?=$_GET['pelajaran']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Update Absesnsi</a> -->

								<!-- 	<a href="index.php" class="btn btn-default"><i class="fas fa-arrow-circle-left"></i> Kembali</a> -->

									</center>
								</div>
								</form>

								<?php 
									if (isset($_POST['absen'])) {
										
										$total = $jumlahSiswa-1;
										$today = $_POST['tgl'];
										$pertemuan = $_POST['pertemuan'];

										for ($i =0; $i <=$total ; $i++) {

											$id_siswa = $_POST['id_siswa-'.$i];
											$status = $_POST['status_absen'];
											$pelajaran = $_POST['pelajaran'];
											$ket = $_POST['ket-'.$i];


											$cekAbsesnHariIni = mysqli_num_rows(mysqli_query($con,
											"SELECT * FROM _logabsensi 
											WHERE id_siswa='$data[id_siswa]' AND tgl_absen='$today' 
											AND id_mengajar='$pelajaran' 
											"));

											if ($cekAbsesnHariIni>=1) {
													echo "
													<script type='text/javascript'>
													setTimeout(function () { 

													swal('Sorry!', 'Absen Hari ini sudah dilakukan $data[nama_siswa]', {
													icon : 'error',
													buttons: {        			
													confirm: {
													className : 'btn btn-danger'
													}
													},
													});    
													},10);  
													window.setTimeout(function(){ 
													window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
													} ,3000);   
													</script>";
							
											}else{

												$insert = mysqli_query($con,"INSERT INTO _logabsensi VALUES (NULL,'$pelajaran','$id_siswa','$today','$ket','$pertemuan','Request')");

										if ($insert) {


											echo "
											<script type='text/javascript'>
											setTimeout(function () { 

											swal('Berhasil', 'Absen hari ini telah tersimpan!', {
											icon : 'success',
											buttons: {        			
											confirm: {
											className : 'btn btn-success'
											}
											},
											});    
											},10);  
											window.setTimeout(function(){ 
											window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
											} ,3000);   
											</script>";


											}


										



										}	
										}
									}
                                }else{
                                    echo"Tidak Ada Mata Kuliah" .  $mata_kuliah . "<br>"
                                    ;}
								 ?>
								 
							</div>
						</div>



						
					</div>
					</div>
				</div>

					