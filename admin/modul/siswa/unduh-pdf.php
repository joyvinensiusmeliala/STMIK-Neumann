<?php

require_once __DIR__ . '../../../../vendor/autoload.php';

$content = file_get_contents("mpdf/data-siswa.php");

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($content);
$mpdf->Output('filename.pdf', 'D');

?>