<?php 
$del = mysqli_query($con,"DELETE FROM tb_jurusan WHERE id_jurusan=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=jurusan	';
		</script>";	
}

 ?>