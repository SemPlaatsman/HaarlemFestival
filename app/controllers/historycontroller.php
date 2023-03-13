<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../services/itemservice.php';


class HistoryController extends Controller {
    private $itemService;

    function __construct() {
        $this->itemService = new ItemService();
    }

    public function index() {
        //(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        //$model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        $this->displayView();
    }
    
}
?>