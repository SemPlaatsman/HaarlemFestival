<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/sessionservice.php';

class SessionController extends Controller
{
    private $sessionservice;

    function __construct()
    {
        $this->sessionservice = new SessionService();
    }

    public function index()
    {
        try {
            $session = $this->sessionservice->getSession();
            $data = [
                'session' => $session,
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteSession()
    {
        try {
            $id = htmlspecialchars($_POST['id']);
            $result = $this->sessionservice->deleteSession($id);
            if ($result) {
                // return success response
                header("Location: /session");
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