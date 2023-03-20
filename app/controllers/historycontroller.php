<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../services/itemservice.php';
require_once  'imageslidercontroller.php';
//require_once 'breadcrumbcontroller.php';

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

    public function getSchedule(?int $week, ?int $year,String $language) {
        return $this->itemService->getSchedule($week, $year, $language);
    }

    public function insertItem()
    {
        try {
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>