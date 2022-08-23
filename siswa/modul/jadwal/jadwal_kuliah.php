
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
<a href="#">Jadwal Kuliah</a>
</li>
<li class="separator">
<i class="flaticon-right-arrow"></i>
</li>
</ul>
</div>

					
<div class="row mt-4">

		<?php 	
			$no=1;

			
		// $semester = mysqli_query($con,"SELECT * FROM tb_siswa WHERE nis=$data[nis]");	
		// 		foreach ($semester as $s)
		// {$sem=$s['id_semester']; 
		// 	$kelas=$s['id_mkelas'];
		
		// $jadwal_kuliah = mysqli_query($con,"SELECT * FROM tb_mengajar WHERE id_semester=$sem and id_mkelas=$kelas");	
		// 		foreach ($jadwal_kuliah as $jd){
		// }$mapel = mysqli_query($con,"SELECT * FROM tb_master_mapel WHERE id_semester=$sem");
		// 		foreach ($mapel as $k) 
		// 		{
		
			$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
	INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
	INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
	-- WHERE tb_mkelas.id_siswa='$data[id_siswa]'
	-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran  
	WHERE tb_mkelas.id_mkelas = $data[id_mkelas]
		");
		foreach ($kelasMengajar as $jk) {

		$carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
	INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
	INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
	INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
	WHERE tb_silabus.id_silabus='$jk[id_silabus]' 
	-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
	-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

	-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
		");
		foreach ($carimapel as $cm) {
		}  

		?>

		
		

	<div class="col-md-5 col-xs-12">

		<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		<strong><h3><?=$cm['mapel']; ?> | <b style="text-transform: uppercase;"><code> <?=$cm['kode_mapel']; ?>  </h3></b></code></strong>
		<hr>
		<ul>
		<li>
				Nama Dosen : <?=$jk['nama_dosen']; ?>
			</li>
			<li>
				Hari : <?=$jk['hari']; ?>
			</li>
			<li>
				Jam Ke : <?=$jk['jamke']; ?>
			</li>
			<li>
				Waktu : <?=$jk['jam_mengajar']; ?>
			</li>
			<li>
				Kelas : <?=$jk['nama_kelas']; ?>
				
				
			</li>
		</ul>
		<hr>
		<a href="?page=absen&pelajaran=<?=$jk['id_mengajar'] ?> " class="btn btn-default btn-block text-left">
			<i class="fas fa-clipboard-check"></i>
			Isi Absen
		</a>
		<!-- <a href="?page=rekap&pelajaran=<?=$k['id_mapel'] ?> " class="btn btn-secondary btn-block text-left">
			<i class="fas fa-list-alt"></i>
			Rekap Absen
		</a> -->
		</div>	
</div>
	<?php } ?>
	

</div>
	<a href="javascript:history.back()" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
</div>
					