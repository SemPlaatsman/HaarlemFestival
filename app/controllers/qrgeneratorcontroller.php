<?php
require_once "../lib/phpqrcode/qrlib.php";
require_once (__DIR__."/../dbconfig.php");

class QrGeneratorcontroller {



    public function generateQR()
    {
        // we need to be sure ours script does not output anything!!!
        // otherwise it will break up PNG binary!
        $param = $_GET['data']; // remember to sanitize that - it is user input!

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