<?php
require_once __DIR__ . '/../repositories/orderrepository.php';

class OrderService {
    private $orderRepository;

    function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function completeOrder(int $orderId) : bool {
        return $this->orderRepository->completeOrder($orderId);
    }

    public function getOrderHistory(int $startID =null , int $endID =null) : array {
        return $this->orderRepository->getPayedOrderHistory();
    }
}
?>