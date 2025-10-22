<?php
include('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$htmlpdf=file_get_contents('pdf1.php');
$dompdf->loadHtml($htmlpdf);
$dompdf->setPaper('A4','lnandscape');
$dompdf->render();
//$dompdf->stream();
$pdf=$dompdf->output();
file_put_contents("pdfleave/filesaya3.pdf",$pdf);
?>
