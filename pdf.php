<?php
include('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$htmlpdf='Hello World';
$dompdf->loadHtml($htmlpdf);
$dompdf->setPaper('A4','lnandscape');
$dompdf->render();
//$dompdf->stream();
$pdf=$dompdf->output();
file_put_contents("pdfleave/filesaya.pdf",$pdf);
?>
