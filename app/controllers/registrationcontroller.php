<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../services/loginservice.php';
require_once __DIR__ . '/emailgenerator.php';

class RegistrationController extends Controller {
    private $userService;
    private $emailGenerator;
    private $loginService;
    public $passwordError;

    function __construct() {
        $this->userService = new UserService();
        $this->loginService = new LoginService();
        $this->emailGenerator = new EmailGenerator();
        $this->passwordError = "";
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
            
            $this->handlePost();
        }
        $this->displayView();
    }

    public function handlePost() {
        if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
            if ($this->Hcaptcha()){
                $email = htmlspecialchars($_POST['email']);
                $name = htmlspecialchars($_POST['name']);
                $password = htmlspecialchars($_POST['password']);
                $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
                if($password == $confirmpassword && $this->userService->getUserByEmail($email)==null){
                    $isAdmin = false;
                    $currentDatetime = date('Y-m-d H:i:s');
                    $time_created = DateTime::createFromFormat('Y-m-d H:i:s', $currentDatetime);
                    $this->userService->insertUser($email, $password, $time_created, $isAdmin, $name);
                    $output="<p>Dear ".$name.",</p>";
                    $output.='<p>Thank you for registrating at the haarlem festival site.</p>';
                    $output.='<p>You can login at:</p>';
                    $output.='<p><a href="localhost">
                    localhost</a></p>';
                    $output.='<p>If you did not register at our site please contact us.</p>';  	
                    $output.='<p>Kind regards,</p>';
                    $output.='<p>The festival Team</p>';
                    $body = $output; 
                    $subject = "Registration - visithaarlem.nl";
                    $this->emailGenerator->generate($body, $subject, $email);
                    $user = $this->loginService->validateUser($email, $password);
                    if ($user != null) {
                        // start session if it hasn't been started 
                        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
                        $_SESSION['user'] = serialize($user);
                        // redirect to dashboard
                        header('Location: home');
                        exit();
                    }
                }
            }
        }
    }

    function Hcaptcha(){
        include __DIR__ . '/../dbconfig.php';
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
        $responseData = json_decode($response);
        if($responseData->success) {
            return true;
        } 
        else {
            return false;
        }
    }

    function validatePassword($password, $confirmpassword) {
        // Check if the password meets your validation criteria
        if (strlen($password) < 8) {
            $this->passwordError = "<p class='text-center invalid-feedback text-light fs-6 p-1 my-0 mt-3 bg-danger rounded'>Password must be at least 8 characters!</p>";
        }
        else if ($password != $confirmpassword) {
            $this->passwordError = "<p class='text-center invalid-feedback text-light fs-6 p-1 my-0 mt-3 bg-danger rounded'>Passwords do not match!</p>";
        }
    }
}
?>