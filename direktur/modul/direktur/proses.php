<?php 

if (isset($_POST['saveDirektur'])) {

    $pass= sha1($_POST['nip']);

		$sumber = @$_FILES['foto']['tmp_name'];
		$target = '../assets/img/user/';
		$nama_gambar = @$_FILES['foto']['name'];
		$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
		if ($pindah) {
			$save= mysqli_query($con,"INSERT INTO tb_direktur VALUES(NULL,'$_POST[nip]','$_POST[nama]','$_POST[email]','$pass','$nama_gambar','Y') ");
			if ($save) {
				echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=direktur');
				} ,3000);   
				</script>";
			}

		}


  }elseif (isset($_POST['editDirektur'])) {

  	 $pass= sha1($_POST['email']);
		$gambar = @$_FILES['foto']['name'];
		if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
		$ganti = mysqli_query($con,"UPDATE tb_direktur SET foto='$gambar' WHERE id_direktur='$_POST[id]' ");
		}
		$editDirektur= mysqli_query($con,"UPDATE tb_direktur SET nama_direktur='$_POST[nama]',email='$_POST[email]' WHERE id_direktur='$_POST[id]' ");

		if ($editDirektur) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=direktur');
				} ,3000);   
				</script>";
		}


  }
 ?>