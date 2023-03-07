<?php
require_once __DIR__ . '/../repositories/cartrepository.php';

class CartService {
    private $cartRepository;

    function __construct() {
        $this->cartRepository = new CartRepository();
    }
}
?>