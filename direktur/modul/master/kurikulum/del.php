<?php 
$del = mysqli_query($con,"DELETE FROM tb_kurikulum WHERE id_kurikulum=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=master&act=kurikulum';
		</script>";	
}

 ?>