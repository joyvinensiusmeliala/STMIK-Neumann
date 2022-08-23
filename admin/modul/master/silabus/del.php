<?php 
$del = mysqli_query($con,"DELETE FROM tb_silabus WHERE id_silabus=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=silabus';
		</script>";	
}

 ?>