<?php
require __DIR__ . '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

//if(isset($_POST["generar"])){
try {//recojer el contenido del otro php
    ob_start(); //este es un bufer que recoje los datos de la otra pagina
    require_once './mstdatos.php';
    $html = ob_get_clean();


    $html2pdf = new Html2Pdf();
    $html2pdf = new HTML2PDF('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->output('historia clinica.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
//}
?>



