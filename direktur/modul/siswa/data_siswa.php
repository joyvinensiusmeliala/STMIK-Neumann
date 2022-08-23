<?php
session_start();
 include '../../../../config/db.php';

if (!isset($_SESSION['admin'])) {
?> <script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='index.php';
 </script>

 

<?php
error_reporting(0);
$nama_dokumen='Laporan Data Siswa'; //Beri nama file PDF hasil.
include('../../../../mpdf60/');//lokasi folder mpdf
require_once("../../../../mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait
$mpdf->setFooter('{PAGENO}');// memberikan footer nomor halaman

ob_start();
?>


<!-- Template Main CSS File -->
<link href="assets/css/mpdf.css" rel="stylesheet">
<!DOCTYPE html>
<html>
<head>
  <!-- <title> Laporan Data Absensi/title> -->
</head>
<body>
<div id="header" align="center" style="font-family: Cooper Black; ">
  <img src="logo-neumann.png" width='70' height='70' alt='user'><br>
  <b style="font-size: 24px;">DATA SISWA</b><br>
  STMIK Neumann
  <hr style="border:1px solid; color: black;">
</div>

<!-- Default Table -->

<table id="table2" >
  <thead>
    <tr>
      <th align="left" width="50">No</th>
      <th align="left" width="100">Nama Siswa</th>
      <th align="left" width="150">NIS/NISN</th>
      <th align="left" width="100">Jurusan</th>
      <th align="left" width="150">Kelas</th>
      <th align="left" width="100">Semester</th>
      <th align="left" width="100">Tahun Masuk</th>
      <th align="left" width="100">Status</th>
    </tr>
  </thead>

  <tbody>
      <?php 
      $no=1;
      // include '../../config/db.php'; 
      $con = new mysqli ("localhost","root","","db_imas") or die(mysqli_error($con));
			$siswa = mysqli_query($con,"SELECT *
      FROM tb_siswa
      INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
      INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
      INNER JOIN tb_jurusan ON tb_siswa.id_jurusan=tb_jurusan.id_jurusan
      ");
        foreach ($siswa as $g) {?>
        <tr>
            <td><?=$no++;?>.</td>                          
            
            <td><?=$g['nama_siswa'];?></td>
            <td><?=$g['nis'];?></td>
            <td><?=$g['nama_jurusan'];?></td>
            <td><?=$g['nama_kelas'];?></td>
            <td><?=$g['semester'];?></td>
            <td><?=$g['th_angkatan'];?></td>
            <td><?php if ($g['status']==1) {
                echo "<span class='badge badge-success'>Aktif</span>";
            }else {
                echo "<span class='badge badge-danger'>Off</span>";
            } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>      
    </table>
    </div>
    <br> <br>
    <div id="footer" align="right">
      <b>Medan,<?php echo date (" d F Y") ?></b><br>
      <b>Direktur</b><br> <br> <br> <br>
      <img src="logo-neumann.png" width='70' height='70' alt='user'><br>
      <b style="text-decoration: underline">Drs,ISFAR,M.Pd</b><br>
      NIP.196106021984101002
</div>
</body>
<script>

</script>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
// $pdf = new mPDF('utf-8', 'A4');
$mpdf->Output("". $nama_dokumen.".pdf" ,'I');

exit;
?>
<?php
}
?>