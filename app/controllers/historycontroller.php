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

    public function insertItem()
    {
        try {
            $id = 1;
            $item_type_id = htmlspecialchars($_POST['date']);
            $price = 2;
            $VAT = 1;
            $shoppingcart_id = 1;
            $QR_Code = 1;

            $result = $this->itemService->insertItem($name, $date, $location, $seats);

            if ($result) {
                // return success response
                echo 'insert complete item';
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>