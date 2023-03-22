<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class ResetPasswordController extends Controller {
    private $userService;

    function __construct() {
        $this->userService = new UserService();
    }

    public function index() {
        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
            $key = $_GET["key"];
            $email = $_GET["email"];
            if($this->userService->checkResetKey($email, $key)){
                $this->displayView();
                if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
                    if (!empty($_POST['password1']) && !empty($_POST['password2']) && isset($_POST['password1']) && isset($_POST['password2'])) {
                        $password1 = htmlspecialchars($_POST['password1']);
                        $password2 = htmlspecialchars($_POST['password2']);
                        if($password1 == $password2){
                            $this->userService->resetPassword($email, $password1);
                            $this->userService->deleteKey($key);
                        }
                    }
                }
            }
            
        }
    }

    public function ceckKey(string $email, string $key) {
        if($this->userService->checkResetKey('5409281211028dde74f1da3dc11b88c28c45ea9038', 'janjaap.vanlaar2001@gmail.com')){
            $this->displayView();
        }
    }
}

?>