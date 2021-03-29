<?php
require_once ('../vendor/autoload.php');
use  Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');

// Recoger la vista a imprimir
ob_start();
require_once ('../PlantillaReporte/pagos.php');
$html = ob_get_clean();

$html2pdf->writeHTML($html);
$html2pdf->output('pdf_generado.pdf');
?>