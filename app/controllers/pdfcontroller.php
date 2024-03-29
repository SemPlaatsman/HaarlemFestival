<?php
class PDFController {
    function __construct(){
        require_once __DIR__.'/PDFGenerator.php';
       
        $pdfGenerator = new PDFGenerator();
        ob_start(); //Init the output buffering
        $owner = "owner";
        $event = "history";
        $date = "2020-12-12";
        $where = "here";
        $imgsrc  = "/generate?data=test";
        include_once(__DIR__.'/../views/pdf/index.php');
        $html = ob_get_clean(); //Get the content of the buffer and clean it
        $pdfGenerator->generate($html);
    }
}