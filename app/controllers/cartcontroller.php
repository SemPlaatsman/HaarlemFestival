<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/cartservice.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        $cartService = new CartService();
    }

    public function index() {
        $this->displayView();
    }
}
?>