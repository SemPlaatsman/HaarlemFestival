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

    public function getOrderPrice(int $orderId) : int {
        $stmnt = $this->connection->prepare("SELECT SUM(`item`.`total_price`) AS test FROM `orders` JOIN `item` ON `item`.`order_id` = `orders`.`id` WHERE `orders`.`id` = :id;");
        $stmnt->bindParam(":id", $orderId, PDO::PARAM_INT);
        $stmnt->setFetchMode(PDO::FETCH_NUM);
        $stmnt->execute();
        
        $result = $stmnt->fetch();;
        return $result[0];
    }
}
?>