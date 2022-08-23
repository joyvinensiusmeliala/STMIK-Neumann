

 <?php 
 $id = $_GET['id'];
if ($_GET['status']=='Request') {
$non = mysqli_query($con,"UPDATE _logabsensi SET status='Approve' WHERE id_siswa='$id' ");

echo " <script>
window.location='?page=master&act=semester';
</script>";
}else{
$aktifkan = mysqli_query($con,"UPDATE tb_semester SET status='Rejected' WHERE id_siswa='$id' ");
echo " <script>
window.location='?page=master&act=semester';
</script>";  
}
  ?>
