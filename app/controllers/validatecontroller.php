<?php
class validateController{

        function Hcaptcha(){
            require_once __DIR__ . '/../config/dbconfig.php';

            $data = array(
                'secret' => $hCaptchaSecret,
                'response' => $_POST['h-captcha-response']
            );
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true); 
            $response = curl_exec($verify);
            var_dump($response);
            $responseData = json_decode($response);
            if($responseData->success) {
                return true;
            } 
            else {
                return false;
            }
        }


        function Gcaptcha(){
            require_once __DIR__ . '/../config/dbconfig.php';


            $data = array(
                'secret' => $reCAPTCHASecretV3,
                'response' => $_POST['g-recaptcha-response']
            );
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true); 
            $response = curl_exec($verify);
            $responseData = json_decode($response);

            if($responseData->success) {
                echo "\nyou passed: ";

                print_r($responseData);
            } 
            else {
               echo "\nyou did not pass cause: ";
               if(isset($responseData)){
                print_r( $responseData->{'error-codes'}[0]);
               }
            }
        }
}
