

 <?php 
 $id = $_GET['id'];
if ($_GET['status']==0) {
$non = mysqli_query($con,"UPDATE tb_kurikulum SET status=0 WHERE id_kurikulum='$id'");

echo " <script>
window.location='?page=master&act=kurikulum';
</script>";
}else{
$aktifkan = mysqli_query($con,"UPDATE tb_kurikulum SET status=1 WHERE id_kurikulum='$id'");
echo " <script>
window.location='?page=master&act=kurikulum';
</script>";  
}
  ?>
