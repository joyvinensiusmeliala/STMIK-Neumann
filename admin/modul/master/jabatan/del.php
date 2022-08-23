<?php 
$del = mysqli_query($con,"DELETE FROM tb_jabatan WHERE id_jabatan=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=jabatan';
		</script>";	
}

 ?>