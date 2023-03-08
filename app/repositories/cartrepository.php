<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';

class CartRepository extends Repository {
    public function getCart(int $userId) : array {
        $query = $this->connection->prepare("SELECT id, order_id as 'orderId', event_id as 'eventId', total_price as 'totalPrice', VAT, QR_Code as 'QRCode' " .
        "FROM `item` WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0)");
        $query->bindParam(":user_id", $userId);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $cart = $query->fetchAll();
        return $cart;
    }
}
?>