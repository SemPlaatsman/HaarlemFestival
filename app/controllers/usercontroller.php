<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';

class UserController extends Controller
{
    private $userservice;

    function __construct()
    {
        $this->userservice = new UserService();
    }

    public function index()
    {
        try {
            $user = $this->userservice->getUser();
            $data = [
                'user' => $user
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertUser()
    {
        try {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $time_created = new DateTime();
            $isAdmin = isset($_POST['is_admin']);
            $name = htmlspecialchars($_POST['name']);

            $result = $this->userservice->insertUser($email, $password, $time_created, $isAdmin, $name);

            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The user: ' . $name . ' has been successfully inserted.';
                header("Location: /user");
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateUser()
    {
        try {
            $id = $_POST['id'];
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $isAdmin = isset($_POST['is_admin']);
            $name = htmlspecialchars($_POST['name']);

            $result = $this->userservice->updateUser($id, $email, $password, $isAdmin, $name);

            if ($result) {
                // return succes response
                $_SESSION['success_message'] = 'The user with id: ' . $id . ' has been successfully changed.';
                header("Location: /user");
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteUser()
    {
        try {
            $id = $_POST['id'];

            $result = $this->userservice->deleteUser($id);
            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The user with id: ' . $id . ' has been successfully deleted.';
                header("Location: /user");
            } else {
                // return failed response
                echo 'Something went wrong with the deletion';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>