<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once "../vendor/autoload.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordController extends Controller {
    private $userService;

    function __construct() {
        $this->userService = new UserService();
    }

    public function index() {
        // handle POST
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
            
            if (!empty($_POST['email']) && isset($_POST['email'])) {
                $email = htmlspecialchars($_POST['email']);
                $user = $this->userService->getUserByEmail($email);
                if ($user != null) {
                    // sent email to reset password
                    //$user = $this->validateUser($email, "test");
                    $this->sentResetPasswordMail($email);
                }
            }
        }
        $this->displayView();
    }

    public function validateUser(string $email, string $password) : ?User {
        echo("test");
    }

    function sentResetPasswordMail(string $email) {
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5($email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        $this->userService->addResetTocken($email, $key, $expDate);

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="localhost/resetpassword?key='.$key.'&email='.$email.'&action=reset" target="_blank">
        localhost/resetpassword?key='.$key.'&email='.$email.'&action=reset</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser.
        The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action 
        is needed, your password will not be reset. However, you may want to log into 
        your account and change your security password as someone may have guessed it.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>The festival Team</p>';
        $body = $output; 
        $subject = "Password Recovery - visithaarlem.nl";

        $email;
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
        $mail->AddAddress($email, 'Recipient Name');
        $mail->Send();
        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
?>