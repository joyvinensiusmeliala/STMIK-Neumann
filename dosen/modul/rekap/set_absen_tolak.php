<?php


?>

<?php 
$bulan = date('m');

?>


 <?php 
 $id = $_GET['id'];
if ($_GET['status_absen']=='Request') {
$non = mysqli_query($con,"UPDATE _logabsensi SET ket='C', status_absen='Reject' WHERE id_presensi='$id'");

echo " <script>
window.location='?page=rekap&act=view&pelajaran=".$_GET['pelajaran']."&bulan=$bulan&kelas=".$_GET['id_kelas']."';
</script>";
}else{
// $aktifkan = mysqli_query($con,"UPDATE _logabsensi SET ket='C' AND status_absen='Reject' WHERE id_presensi='$id' ");
// echo " <script>
// window.location='?page=rekap&act=view&pelajaran=".$_GET['pelajaran']."&bulan=$bulan&kelas=".$_GET['id_kelas']."';
// </script>";  
}
  ?>

<!-- ?page=rekap&act=view&pelajaran=<?=$_GET['pelajaran'] ?>&bulan=<?=$bulan;?>&kelas=<?=$d['id_mkelas'] ?> -->