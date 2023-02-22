<?php

class PDFGenerator {

    function __construct() {
        require_once '../vendor/autoload.php';

    }
    function generate($inputHtml){
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($inputHtml);
        $mpdf->Output();
    }

}