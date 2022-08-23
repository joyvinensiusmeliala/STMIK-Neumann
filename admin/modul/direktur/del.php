<?php 
$del = mysqli_query($con,"DELETE FROM tb_direktur WHERE id_direktur=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=direktur';
		</script>";	
}

 ?>