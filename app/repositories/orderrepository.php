<?php
require_once __DIR__ . '/repository.php';

class OrderRepository extends Repository
{
    public function completeOrder(int $orderId) : bool {
        $query = $this->connection->prepare("UPDATE `orders` SET `time_payed`=DATE_ADD(NOW(), INTERVAL 1 HOUR),`payment_status`=true WHERE `id`=:id;");
        $query->bindParam(":id", $orderId, PDO::PARAM_INT);
        $query->execute();
        return $query->rowCount() > 0;
    }
}
?>