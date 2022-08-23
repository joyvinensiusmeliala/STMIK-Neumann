<?php
session_start();
 include '../../../../config/db.php';

if (!isset($_SESSION['admin'])) {
?> 

<script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='login.php';
 </script>

<?php
}
?>



<?php

error_reporting(0);
$nama_dokumen = 'Laporan Data Siswa';
require_once('vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();
// $nama_file = 'Data Siswa';
ob_start();
?>



    
<style>
 	body{
 		font-family: arial;
 	}
 </style>
 <table width="100%">
 	<tr>
	 <td>
 			<img src="../../../../assets/img/logo-neumann.png" width="130">
 		</td>
 		<td>
 			<center>
 				
 				<h1>
 					Data Mahasiswa <br>
 					<small> STMIK Kristen NEUMANN Indonesia </small>
 				</h1>
 				<hr>
 				<em>
				 Jl. Jamin Ginting, Simpang Selayang,<br> Kec. Medan Tuntungan, Kota Medan, Provinsi Sumatera Utara, Kode Pos (20131) <br>
 				<b>Email : stmik.neuman@gmail.com Telp.(061) 8369306</b> 
 				</em>
 	
 			</center>
 		</td>
 		<td>

 			<table width="100%">
 
  
  
</table>
 		</td>
 	</tr>
 </table>

<hr style="height: 3px;border: 1px solid;">


    
<table width="100%" border="1" cellpadding="3" style="border-collapse: collapse;">
  <tr>
    <td rowspan="3" bgcolor="#EFEBE9" width="10" align="center">NO</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="150" align="center">Nama Mahasiswa</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="150" align="center">NIS / NISN</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="150" align="center">Jurusan</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="50" align="center">Kelas</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="100" align="center">Semester</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="100" align="center">Tahun Masuk</td>
    <td rowspan="3" bgcolor="#EFEBE9" width="50" align="center">Status</td>
  </tr>
  
  	
			<tr>
      <?php 
      $no=1;
      // include '../../config/db.php'; 
      // $con = new mysqli ("localhost","root","","db_imas") or die(mysqli_error($con));
			$siswa = mysqli_query($con,"SELECT *
      FROM tb_siswa
      INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
      INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
      INNER JOIN tb_jurusan ON tb_siswa.id_jurusan=tb_jurusan.id_jurusan
      ");
        foreach ($siswa as $g) {?>
        <tr>

  <tr bgcolor="<?=$warna; ?>">
    <td align="center"><?=$no++; ?></td>
    <td><?=$g['nama_siswa'];?></td>
    <td align="center"><?=$g['nis'];?></td>
    <td align="center"><?=$g['nama_jurusan'];?></td>
    <td align="center"><?=$g['nama_kelas'];?></td>
    <td align="center"><?=$g['semester'];?></td>
    <td align="center"><?=$g['th_angkatan'];?></td>
    <td align="center">
    <?php if ($g['status']==1) {
                echo "<span class='badge badge-success'>Aktif</span>";
            }else {
                echo "<span class='badge badge-danger'>Off</span>";
            } ?>
            </td>
</td>
		
	



   
  </tr>
  <?php } ?>
</table>

<p></p>
<table width="100%">
	<tr>
	<!-- 	<td align="left">
			<p>
				Mengetahui
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				-----------------------------
			</p>
		</td> -->
    <?php 
      $bulan = $_GET['bulan'];
      // tampilkan data mengajar
      $kepsek = mysqli_query($con,"SELECT * FROM tb_kepsek ");

      foreach ($kepsek as $ks) 

    ?>

		<td align="right">
			<p>
				Medan, <?php echo tanggal_indonesia(date('Y-m-d')); ?>
			</p>
			<p>
				Direktur
        <br>
        <br>
				<img src="../../../../assets/img/ttd/ttd.png" width="100">
        <br>
				<u><?=$ks['nama_kepsek'] ?></u><br>
				<!-- _____________________<br> -->
				NIP.197411092002102003
			</p>
		</td>
	</tr>
</table>

    <?php

    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output("". ".pdf", "I");

    exit;
    // $mpdf->Output("F);
    ?>

</body>
<script>

</script>
</html>



 
