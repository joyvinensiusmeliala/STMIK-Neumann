
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
</ul>
</div>

					
<div class="row mt-4">

		<?php 

		$mengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

		INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
		INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

		-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE tb_mengajar.id_dosen='$data[id_dosen]' AND tb_thajaran.status=1 ");

		foreach ($mengajar as $jd) {
		
			$carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
			INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
			INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
			INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
			WHERE tb_silabus.id_silabus='$jd[id_silabus]'
			-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
			-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
		
			-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
			-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
				");
				foreach ($carimapel as $cm){
				}
		?>
	<div class="col-md-5 col-xs-12">

		<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		<strong><h3><?=$cm['mapel']; ?></h3></strong>
		<hr>
		<ul>
			<li>
				Hari : <?=$jd['hari']; ?>
			</li>
			<li>
				Jam Ke : <?=$jd['jamke']; ?>
			</li>
			<li>
				Waktu : <?=$jd['jam_mengajar']; ?>
			</li>
			<li>
				Kelas : <?=$jd['nama_kelas']; ?>
			</li>
		</ul>
		<hr>
		<!-- <a href="?page=absen&pelajaran=<?=$jd['id_mengajar'] ?> " class="btn btn-default btn-block text-left">
			<i class="fas fa-clipboard-check"></i>
			Isi Absen
		</a> -->
		<a href="?page=rekap&pelajaran=<?=$jd['id_mengajar'] ?> " class="btn btn-secondary btn-block text-left">
			<i class="fas fa-list-alt"></i>
			Rekap Absen
		</a>
		</div>	
</div>
	<?php } ?>

</div>
	<a href="javascript:history.back()" class="btn btn-default"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
</div>
					