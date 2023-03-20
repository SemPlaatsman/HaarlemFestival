<?php
require_once __DIR__ . '/controller.php';



class breadcrumbcontroller extends Controller {

    function __construct() {
        $this->index();
    }


    public function index() {
        //(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        //$model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        $this->displayView();

       



       
    }
}

  
?>