<?php
class pdfcontroller{
    function __construct(){
        require_once __DIR__.'/PDFGenerator.php';
       
        $pdfGenerator = new PDFGenerator();
        $html = file_get_contents(__DIR__.'/../../public/views/pdfView/pdfView.php');
        $pdfGenerator->generate($html);
    }
}