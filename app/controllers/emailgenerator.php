<?php
require_once "../vendor/autoload.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailGenerator {

    function __construct() {

    }


    function generate(string $body, string $subject, string $recipient){
        $mail = new PHPMailer();
        $mail->isSMTP();                                             
        $mail->Host       = 'smtp-relay.sendinblue.com';                        
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'janjaapvanlaar@gmail.com';                   
        $mail->Password   = 'V5JKvcpqUnz0GX6W';                     
        $mail->SMTPSecure = 'tls';                                  
        $mail->Port       = 587;                                    
        $mail->setFrom('Haarlem@festival.nl', 'Haarlem festival');
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($recipient, 'Recipient Name');
        $mail->Send();
        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

}
