<?php
$_GET['pelajaran'];

?>

<?php 
$bulan = date('m');

?>

<?php 
	// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
	$qry = mysqli_query($con,"SELECT * FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	WHERE _logabsensi.id_mengajar='$_GET[pelajaran]' and tb_thajaran.status=1 and tb_semester.status=1
	GROUP BY MONTH(tgl_absen) ORDER BY MONTH(tgl_absen) DESC
	");

	foreach ($qry as $bulan) { ?>
	<?php 
	$bulan = date('m',strtotime($bulan['tgl_absen']));
  }?>
  

 <?php 
 $id = $_GET['id_siswa'];
if ($_GET['status_absen']='Request') {
$non = mysqli_query($con,"UPDATE _logabsensi SET status_absen='Approve' WHERE id_presensi='$_GET[id_presensi]'  ");

echo " <script>
window.location='?page=absen&act=absen_bulan&pelajaran=".$_GET[pelajaran]."&bulan=$bulan&kelas=".$_GET[id_kelas]."';
</script>";
}else{
$aktifkan = mysqli_query($con,"UPDATE _logabsensi SET status_absen='Rejected' WHERE id_siswa='$id' ");
echo " <script>
window.location='?page=absen&act=absen_bulan&pelajaran=".$_GET[pelajaran]."&bulan=$bulan&kelas=".$_GET[id_kelas]."';
</script>";  
}
  ?>
