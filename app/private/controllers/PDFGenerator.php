<?php
require_once __DIR__."/pdfcontroller.php";

class PDFGenerator {

    function __construct() {
        $mpdf = new \Mpdf\Mpdf();
        $pdfHtml = '<h1>PDF</h1>';
        $mpdf->WriteHTML($pdfHtml);
        $mpdf->Output();
    }

}