<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class RegistrationController extends Controller {
    private $userService;

    function __construct() {
        $this->userService = new UserService();
    }

    public function index() {
        $this->displayView();
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
            $this->handlePost();
        }
    }

    public function handlePost() {
        if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['password1']) && !empty($_POST['password2']) && isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password1']) && isset($_POST['password2'])) {
            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $password1 = htmlspecialchars($_POST['password1']);
            $password2 = htmlspecialchars($_POST['password2']);
            if($password1 == $password2){
                $isAdmin = false;
                $currentDatetime = date('Y-m-d H:i:s');
                $time_created = DateTime::createFromFormat('Y-m-d H:i:s', $currentDatetime);
                $this->userService->insertUser($email, $password1, $time_created, $isAdmin, $name);
                header('Location: home');
                exit();
            }
        }
    }
}
?>