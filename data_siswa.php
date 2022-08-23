<?php
session_start();
 include 'config/db.php';

if (!isset($_SESSION['admin'])) {
?> <script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='login.php';
 </script>
<?php
}
?>
 

<?php

require_once ('vendor/autoload');

$mpdf = new \Mpdf\Mpdf();
$nama_file = 'Laporan Data Siswa';
ob_start();
?>


<br> <br>
<div id="footer" align="right">
  <b>Bandar Baru,<?php echo date (" d F Y") ?></b><br>
  <b>Kepala Sekolah</b><br> <br> <br> <br>
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
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>

