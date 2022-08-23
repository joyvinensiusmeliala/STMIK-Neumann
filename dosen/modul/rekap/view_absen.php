<?php 
// tampilkan data mengajar

use Mpdf\Http\Request;


// $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
// INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
// INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// -- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
// WHERE tb_mengajar.id_dosen='$data[id_dosen]' AND tb_thajaran.status=1
// 	");
// 	foreach ($kelasMengajar as $d) 
	
	

// $carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
// 	INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
// 	INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
// 	INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
// 	WHERE tb_silabus.id_silabus='$d[id_silabus]'
// 	");
	
// 	foreach ($carimapel as $cm) 
// $carimapel=$d['mapel'];
// 	?>



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
                <!-- <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Data Rekap Absen Keseluruhan</a>
                </li> -->
               
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
                            


                            <div id="menu1" class="container tab-pane active"><br>
                            <?php 
include '../../../config/db.php';

 ?>

<?php 
$bulan = $_GET['bulan'];
// tampilkan data mengajar
// $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
// 	INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen

// INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
// WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1  ");

// foreach ($kelasMengajar as $d) 

$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_thajaran.status=1
	");
	foreach ($kelasMengajar as $d) {

		
	}
$kelas = mysqli_query($con,"SELECT * FROM tb_mkelas
INNER JOIN tb_jurusan ON tb_mkelas.id_jurusan = tb_jurusan.id_jurusan
WHERE tb_mkelas.id_mkelas='$d[id_mkelas]'
");
foreach ($kelas as $k) {

	$carijurusan = mysqli_query($con,"SELECT * FROM tb_jurusan 
	INNER JOIN tb_dosen ON tb_dosen.id_dosen = tb_jurusan.ka_prodi
	WHERE tb_jurusan.id_jurusan='$k[id_jurusan]'
	
		");
		foreach ($carijurusan as $jur) {
		}  

	$carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
WHERE tb_silabus.id_silabus='$d[id_silabus]'
	");
	foreach ($carimapel as $cm) {
	} 


	// tampilkan data absen

	$qry = mysqli_query($con,"SELECT * FROM _logabsensi 
		INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE 
		tb_mengajar.id_dosen='$data[id_dosen]' AND 
		MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1 
	 GROUP BY _logabsensi.id_presensi  ORDER BY _logabsensi.id_siswa ASC "); 
foreach ($qry as $db)

	// tampilkan data walikelas
$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas INNER JOIN tb_dosen ON tb_walikelas.id_dosen=tb_dosen.id_dosen WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");
foreach ($walikelas as $walas) 

$tglBulan = $db['tgl_absen'];
$tglTerakhir = date('t',strtotime($tglBulan));


 ?>

 <?php 
$bulan = $_GET['bulan'];
// tampilkan data mengajar
$direktur = mysqli_query($con,"SELECT * FROM tb_direktur ");

foreach ($direktur as $ks) 

?>

<?php } ?>
 <style>
 	body{
 		font-family: arial;
 	}
 </style>
 <table width="100%">
 	<tr>
	 <td>
 			&nbsp;<img src="../assets/img/logo-neumann.png" width="130">
 		</td>
 		<td>
 			<center>
 				
 				<h1>
 					Rekap Absensi Mahasiswa <br>
 					<small> STMIK Kristen NEUMANN Indonesia </small>
 				</h1>
 				<hr>
 				<em>
				 Jl. Jamin Ginting, Simpang Selayang,<br> Kec. Medan Tuntungan, Kota Medan, Provinsi Sumatera Utara, Kode Pos (20131) <br>
 				<b>Email : stmik.neuman@gmail.com Telp.(061) 8369306</b> 
 				</em>
 	
 			</center>
 		</td>
 		<td>
	 		<?php 
			foreach ($kelasMengajar as $dm)
			 ?>
 			<table width="100%">
  <tr>
    <td colspan="2"><b style="border: 2px solid;padding: 7px;">
    	KELAS ( <?=strtoupper($d['nama_kelas']) ?> )
    </b> </td>
    <td>
    	<b style="border: 2px solid;padding: 7px;">
    		<?=$d['semester'] ?> |
      <?=$d['tahun_ajaran'] ?>
  </b>
  </td>
    <td rowspan="5">
    	<ul>
    		<li>H= Hadir</li>
    		<li>S = Sakit</li>
    		<li>I = Izin</li>
    		<li>T = Terlambat</li>
    		<li>A = Tanpa Keterangan</li>
    		<!-- <li>C = Tanpa Keterangan</li> -->
    	</ul>
<!-- <p>H= Hadir</p>
<p>I = Izin</p>
<p>S = Sakit</p>
<p>A = Absesn    </p> -->
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Dosen </td>
    <td>:</td>
    <td><?=$d['nama_dosen'] ?></td>
  </tr>
  <tr>
    <td>Bidang Studi </td>
    <td>:</td>
    <td><?=$cm['mapel'] ?></td>
  </tr>
  <tr>
    <td>Kode Mata Kuliah </td>
    <td>:</td>
    <td><?=$cm['kode_mapel'] ?></td>
  </tr>
  <tr>
    <td>Wali Kelas </td>
    <td>:</td>
    <td><?=$walas['nama_dosen'] ?></td>
  </tr>
  <tr>
    <td>Kepala Prodi </td>
    <td>:</td>
    <td><?=$jur['nama_dosen'] ?></td>
  </tr>
</table>
 		</td>
 	</tr>
 </table>

<hr style="height: 3px;border: 1px solid;">





										<div class="page-header">
											<h4> PERTEMUAN BULAN : <b style="text-transform: uppercase;"><?php echo namaBulan($bulan);?> <?= date('Y',strtotime($tglBulan)); ?></b> </h4>
											<ul class="breadcrumbs">
											<a target="_blank" href="modul/rekap/rekap_bulan.php?pelajaran=<?=$_GET['pelajaran'] ?>&bulan=<?=$bulan;?>&kelas=<?=$d['id_mkelas'] ?>" 
									class="btn btn-primary btn-sm text-white"><i class="fa fa-download"></i> Download Absen</a>
											<h4> <b style="text-transform: uppercase;"><code> <?=$data['nama_siswa'] ?></b></code></h4>
											</ul>
										</div>
							<!-- Content Menu 1  -->

							<table class="table table-head-bg-primary table-xs">
										<thead>
										<tr>
												<th scope="col">No.</th>
												<th scope="col">Nama Mahasiswa</th>
												<th scope="col">Mata Kuliah</th>
												<th scope="col">Tanggal Absen</th>
												<th scope="col">Pertemuan Ke </th>
												<th scope="col">Ket Absen</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<?php 
											// tampilkan absen siswa
											$no=1;
											foreach ($qry as $ds) {
												$warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

												?>
											
										
										<tbody>
										
											<tr>
												<td><?=$no++; ?>.</td>
												<td><b><?=$ds['nama_siswa'];?></b></td>
												<td><b><?=$cm['mapel'];?></b></td>
												<td><b><?=$db['tgl_absen']; ?></b></td>
												<td><b><?=$db['pertemuan_ke']; ?></b></td>
												<!-- <td><b><?=$db['ket']; ?></b></td> -->
												<td>
													<?php
														if ($db['ket']=='H') {
															echo "<b style='color:#2196F3;'>H</b>";				
														}elseif ($db['ket']=='I') {
															echo "<b style='color:#4CAF50;'>I</b>";
														}elseif ($db['ket']=='S') {
															echo "<b style='color:#FFC107;'>S</b>";
														}elseif($db['ket']=='A'){
															echo "<b style='color:#D50000;'>A</b>";
														}elseif ($db['ket']=='T') {
															echo "<b style='color:#76FF03;'>T</b>";
														}elseif ($db['ket']=='Request') {
															echo "<span class='badge badge-warning'><b>Request</b></span>";
														}
														else{
															echo "<b style='color:#9C27B0;'>C</b>";
														}
													?>
												</td>
												<!-- <td>
													<?php if($ds['status_absen']=='Request')
														{ ?>
															<span class="badge badge-warning"></i> Request</span>
															
														<?php
														}
														if($ds['status_absen']=='Approve')
														{ ?>
															<span class="badge badge-success"></i> Approve</span>   
														<?php
														} 
														if($ds['status_absen']=='Rejected')
														{ ?>
															<span class="badge badge-danger"></i> Rejected</span> 
													<?php } ?> 
												
												</td> -->
												<td>
												<?php 
												if ($ds['status_absen']=='Request') {
												?>
												<a onclick="return confirm('Yakin Menyetui Kehadiran ??')" href="?page=rekap&act=set_absen_terima&id=<?=$ds['id_presensi'] ?>
												&pelajaran=<?=$_GET['pelajaran'] ?>
												&id_kelas=<?=$_GET['kelas'] ?>
												&status_absen=Request" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Setuji Kehadiran</a>
												<?php
												
												}if ($ds['status_absen']=='Request') {
													// echo "<b style='color:#2196F3;'>'$ds[ket]'</b>";	
												?>
												<a onclick="return confirm('Yakin Reject Kehadiran ??')" href="?page=rekap&act=set_absen_tolak&id=<?=$ds['id_presensi'] ?>
												&pelajaran=<?=$_GET['pelajaran'] ?>
												&id_kelas=<?=$_GET['kelas'] ?>
												&status_absen=Request" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i> Tolak Kehadiran</a>
												
												
												<!-- <a onclick="return confirm('Yakin Non-Aktifkan Ta  ??')" href="?page=master&act=set_ta&id=<?=$id['id_presensi']?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a> -->
												<?php
												}if ($ds['status_absen']=='Reject') {
													// echo "<b style='color:#2196F3;'>'$ds[ket]'</b>";	
												?>
												<span class="badge badge-danger"></i> Ditolak</span> 
												<!-- <a onclick="return confirm('Yakin Non-Aktifkan Ta  ??')" href="?page=master&act=set_ta&id=<?=$id['id_presensi']?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a> -->
												<?php
												}if ($ds['status_absen']=='Approve') {
													// echo "<b style='color:#2196F3;'>'$ds[ket]'</b>";	
												?>
												<span class="badge badge-success"></i> Sudah Disetujui</span> 
												<!-- <a onclick="return confirm('Yakin Non-Aktifkan Ta  ??')" href="?page=master&act=set_ta&id=<?=$id['id_presensi']?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a> -->
												<?php
												}
												?>
												</td>
												
												
											</tr>
											<?php } ?>
										</tbody>
									</table>

							<!-- End Content Menu 1  -->
                            </div>
							</div>
												
                                    
                    <!-- End Tab  -->
				
				</div>
					
			</div>
		</div>
		
		
	</div>
					
				</div>