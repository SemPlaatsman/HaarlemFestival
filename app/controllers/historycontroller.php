<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../services/reservationservice.php';


class HistoryController extends Controller {
    private $itemService;

    function __construct() {
        $this->itemService = new ReservationService();
    }

    public function index() {
        //(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        //$model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        $this->displayView();
        if(isset($_POST['submit'])) {
            $this->insertItem();
        }
    }

    public function insertItem()
    {
        try {
            $item_id = 10;
            $order_id = 1;
            $event_id = 1;
            $total_price = 1;
            $VAT = 1;
            $QR_Code = 1;
            $id = 0;
            $restaurant = new Restaurant(1, "restaurant", 50, "Haarlem", 10, 5, 10);
            $item = new Reservation($item_id, $order_id, $event_id, "test", $total_price, $VAT, $QR_Code, $id, $restaurant, 90, 1, 1, '2023-04-13 00:00:00');
            //$this->itemService->insertReservation($item);
            $result = $this->itemService->deleteReservation(9);
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