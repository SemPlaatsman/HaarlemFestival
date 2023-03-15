<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../services/itemservice.php';
require_once  'imageslidercontroller.php';
require_once 'breadcrumbcontroller.php';

class HistoryController extends Controller {
    private $itemService;

    function __construct() {
        $this->itemService = new ItemService();
    }

    public function index() {
        //(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        //$model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
     

        $this->displayView();

       
        

        require_once __DIR__."/../views/history/ticketform.php"; 


        
        if(isset($_POST['submit'])) {
            $this->insertItem();
        }
    }

    public function insertItem()
    {
        try {
            $id = 10;
            $order_id = 2;
            $event_id = 2;
            $total_price = 1;
            $VAT = 1;
            $QR_Code = 1;
            $item = new Item($id, $order_id, $event_id, $total_price, $VAT, $QR_Code);

            $result = $this->itemService->deleteItem(10);

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