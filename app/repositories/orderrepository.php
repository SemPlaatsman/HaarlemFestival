<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/order.php';

class OrderRepository extends Repository
{
    public function completeOrder(int $orderId): bool
    {
        $query = $this->connection->prepare("UPDATE `orders` SET `time_payed`=DATE_ADD(NOW(), INTERVAL 1 HOUR),`payment_status`=true WHERE `id`=:id;");
        $query->bindParam(":id", $orderId, PDO::PARAM_INT);
        $query->execute();
        return $query->rowCount() > 0;
    }

    public function getPayedOrderHistory(): array
    {
        $query = $this->connection->prepare("
        SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price` , `item`.`VAT`, 
`restaurant`.`name` as 'where', '' as 'who', `reservation`.`datetime` as 'when'  FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  
JOIN `reservation` on `item`.`event_id` = `reservation`.`item_id`
JOIN `restaurant` on `reservation`.`restaurant_id`  = `restaurant`.`id`

UNION ALL

#join dance
SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price` , `item`.`VAT`, 
`venue`.`name` as 'where', `artist`.`name` as 'who', `performance`.`start_date` as 'when' FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  
JOIN `ticket_dance` on `ticket_dance`.`item_id`= `item`.`event_id`
JOIN `performance` on `ticket_dance`.`performance_id` = `performance`.`id`
JOIN `artist` on  `performance`.`id` =  `artist`.`id`
JOIN `venue` on `performance`.`id` = `venue`.`id`

UNION ALL

#join history
SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price` , `item`.`VAT`, 
`history_tours`.`gathering_location` as 'where', '' as 'who' ,`history_tours`.`datetime` as 'when'  FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  

JOIN `ticket_history` on `ticket_history`.`item_id`= `item`.`id`
JOIN `history_tours` on `ticket_history`.`tour_id` = `history_tours`.`id`

WHERE `payment_status` = TRUE; 
        ");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Order');

        // if rowMapper function is already loaded, don't load it again
        if (!function_exists('rowMapperOrder')) {
            // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
            function rowMapperOrder($id, $time_payed, $payment_status, $total_price, $VAT, $where, $who, $when)
            {
                return new Order($id, new DateTime($time_payed), $payment_status, $total_price, $VAT, $where, $who, new DateTime($when));
            }
        }

        $orders = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperOrder');
        return $orders;

    public function getOrderPrice(int $orderId) : int {
        $stmnt = $this->connection->prepare("SELECT SUM(`item`.`total_price`) AS test FROM `orders` JOIN `item` ON `item`.`order_id` = `orders`.`id` WHERE `orders`.`id` = :id;");
        $stmnt->bindParam(":id", $orderId, PDO::PARAM_INT);
        $stmnt->setFetchMode(PDO::FETCH_NUM);
        $stmnt->execute();
        
        $result = $stmnt->fetch();;
        return $result[0];

    }
}
