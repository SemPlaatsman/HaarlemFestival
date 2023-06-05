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
        $baseUrl = 'http://' . $_SERVER['HTTP_HOST'];
        $this->userService->addResetTocken($email, $key, $expDate);
        //get view for body
        ob_start();
        require_once __DIR__ . '/../views/forgotpassword/forgotpasswordemail.php';
        $body = ob_get_clean();

        $subject = "Password Recovery - visithaarlem.nl";
        $this->emailGenerator->sentEmail($body, $subject, $email, "");
        header('Location: login');
        exit();
    }
}
?>