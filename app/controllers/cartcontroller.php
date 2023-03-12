<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/cartservice.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        $this->cartService = new CartService();
    }

    public function index() {
        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        $model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        $this->displayView($model);
    }
}
?>