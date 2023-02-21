<?php
require_once "../lib/phpqrcode/qrlib.php";
require_once (__DIR__."/../config.php");

class QrGeneratorcontroller {
    function __construct() {
        $param = $_GET['data']; // remember to sanitize that - it is user input!
        
    }

    public function generateQR($data)
    {
        include('config.php'); 
        // we need to be sure ours script does not output anything!!!
        // otherwise it will break up PNG binary!
        
        ob_start();
        
        // here DB request or some processing
        $codeText = ''.$param;
        
        // end of processing here
        $debugLog = ob_get_contents();
        ob_end_clean();
        
        // outputs image directly into browser, as PNG stream
         QRcode::png($codeText);      
    }
    public function saveQR($data)
    {
        # code...
    }
    
}
?>