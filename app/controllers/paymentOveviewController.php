<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';

class PaymentOveviewController extends Controller {
    public $orderService;
    
    function __construct() {
        $this->orderService = new OrderService();
    }

    public function index() {
     
        $orderService   = $this->orderService->getOrderHistory(); 
        try{
            $data = [
                'orderhistory' => $orderService
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }



    }

}