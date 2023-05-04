<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/emailgenerator.php';
class ForgotPasswordController extends Controller {
    private $userService;
    private $emailGenerator;

    function __construct() {
        $this->userService = new UserService();
        $this->emailGenerator = new EmailGenerator();
    }

    public function index() {
        // handle POST
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
            
            if (!empty($_POST['email']) && isset($_POST['email'])) {
                $email = htmlspecialchars($_POST['email']);
                $user = $this->userService->getUserByEmail($email);
                if ($user != null) {
                    // sent email to reset password
                    $this->sentResetPasswordMail($email);
                }
            }
        }
        $this->displayView();
    }

    function sentResetPasswordMail(string $email) {
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5($email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        $this->userService->addResetTocken($email, $key, $expDate);
        //naar view
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
        $this->emailGenerator->generate($body, $subject, $email);
        header('Location: login');
        exit();
    }
}
?>