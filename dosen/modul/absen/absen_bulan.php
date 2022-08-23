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

	// tampilkan data absen

	$qry = mysqli_query($con,"SELECT * FROM _logabsensi 
		INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'
    -- WHERE _logabsensi.id_mengajar='$_GET[pelajaran]'
	  GROUP BY _logabsensi.id_siswa DESC ");

    foreach ($qry as $db)

    $carimapel = mysqli_query($con,"SELECT * FROM tb_silabus 
			INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
			INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
			INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
			WHERE tb_silabus.id_silabus='$db[id_silabus]'
			-- INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
			-- INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
		
			-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
			-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
				");
				foreach ($carimapel as $cmp)

	// tampilkan data walikelas
$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas INNER JOIN tb_dosen ON tb_walikelas.id_dosen=tb_dosen.id_dosen WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");
foreach ($walikelas as $walas) 

$tglBulan = $db['tgl_absen'];
$tglTerakhir = date('t',strtotime($tglBulan));


 ?>

 <?php 
$bulan = $_GET['bulan'];
// tampilkan data mengajar
$kepsek = mysqli_query($con,"SELECT * FROM tb_kepsek ");

foreach ($kepsek as $ks) 

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
                <h4 class="page-title">
                <?php 
                $carimapel = mysqli_query($con,"SELECT * FROM tb_mengajar
                INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
                WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]'");
                
                foreach ($carimapel as $cmp){
                
                echo $cmp['mapel'];?></h4>
                <ul class="breadcrumbs">
                    <div class="card-title">
                      <h3 class="h4"><?php echo $_GET['Guru'];?></h3>
                    </div>
                </ul>
              </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              
  <tr>
  <th>NO</th>
  <th>Nama Siswa</th>
					<th>Mata Kuliah</th>
					<th>Hari</th>
					<th>Tanggal Absen</th>
					<th>Jam Mengajar</th>
					<th>Status</th>
					<th>Action</th>
  </tr>
  </thead>  
              <tbody>
  	<?php 
			// tampilkan absen siswa
			$no=1;
			foreach ($qry as $ds) {
				 $warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

				?>
	<tr>

  <tr bgcolor="<?=$warna; ?>">
    <td align="center"><?=$no++; ?></td>
    <td><?=$db['nama_siswa'];?></td>
    <td><?=$cmp['mapel'];?></td>
    <td><?=$db['hari'];?></td>
    <td><?=$db['tgl_absen'];?></td>
    <td><?=$db['jam_mengajar'];?></td>
    <td>
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
					
					</td>
          <td>
          <?php 
          if ($ds['status_absen']=='Request') {
            ?>
            <a onclick="return confirm('Yakin Menyetujui Kehadiran  ??')" href="?page=absen&act=set_absen&pelajaran=<?=$ds['id_mengajar'] ?>&id_presensi=<?=$ds['id_presensi']?>&id_kelas=<?=$ds['id_mkelas']?>&status_absen=<?=$ds['status_absen']?>" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Approve</a>
            <!-- <a href="?page=absen&act=absen_bulan&pelajaran=<?=$_GET[pelajaran] ?>&bulan=<?=$bulan;?>&kelas=<?=$d['id_mkelas'] ?>" style="text-decoration: none;" class="text-primary"> -->
            <?php
            
          }else{
            ?>
            <a onclick="return confirm('Yakin Tidak Menyetujui Kehadiran  ??')" href="?page=absen&act=set_absen&id_siswa=<?=$ds['id_siswa'] ?>&id_presensi=<?=$ds['id_presensi']?>&status_absen=<?=$ds['status_absen']?>" class="btn btn-dark btn-sm"><i class="far fa-times-circle"></i> Reject</a>
            <?php
          }

          ?> 
          </td>

					<td>
                             							<?php } ?>

							
							

					
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

