<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tickethistory.php';
class TicketHistoryRepository extends ItemRepository {

    public function insertTicketHistory(TicketHistory $ticket_history) {
        try {
            $itemid = $this->insertItem($ticket_history);
            $stmnt = $this -> connection -> prepare("INSERT INTO `ticket_history`(`item_id`, `tour_id`, `nr_of_people`) VALUES (:item_id, :performance_id, :nr_of_people)");
            $tour_id = $ticket_history->getTour()->getId();
            $nr_of_people = $ticket_history->getNrOfPeople();
            $stmnt -> bindParam(':tour_id', $tour_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_people', $nr_of_people, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            $stmnt -> execute();
        } catch (PDOException $e) {
            echo $e;
            return null;
        }        
    }

    public function deleteTicketHistory(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("SELECT `item_id` FROM `ticket_history` WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $result = $stmnt -> fetch();
            $item_id = intval(($result['item_id']));
            $stmnt = $this -> connection -> prepare("DELETE FROM ticket_history WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $this->deleteItem($item_id);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateTicketHistory(TicketHistory $ticket_history) : bool {
        try {
            $this->updateItem($ticket_history);
            $stmnt = $this -> connection -> prepare("UPDATE ticket_history SET id=:history_id, item_id=:item_id, tour_id=:tour_id, nr_of_people=:nr_of_people WHERE id=:history_id;");
            $id = $ticket_history->getId();
            $item_id = $ticket_history->getItemId();
            $tour_id = $ticket_history->getTour()->getId();
            $nr_of_people = $ticket_history->getNrOfPeople();
            $stmnt -> bindParam(':history_id', $id, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $item_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':tour_id', $tour_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_people', $nr_of_people, PDO::PARAM_STR);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    

    public function getTicketHistory(int $id) : Item {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_history.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_history.id, ticket_history.tour_id, history_tours.language, history_tours.datetime, " . 
            "history_tours.gathering_location, history_tours.employee_id, history_tours.employee_name, " . 
            "ticket_history.nr_of_people, history_tours.price, history_tours.group_price " .
            "FROM `item` JOIN `ticket_history` ON ticket_history.item_id = item.id JOIN `history_tours` ON history_tours.id = ticket_history.tour_id " .
            "WHERE ticket_history.id = :id;");
            $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketHistory')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketHistory(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $tour_id, string $language, string $datetime, string $gathering_location, int $employee_id, 
                    string $employee_name, int $nr_of_people, float $price, float $group_price) {
                    return new TicketHistory($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, $id, $tour_id, 
                        $language, $datetime, $gathering_location, $employee_id, $employee_name, $nr_of_people, $price, $group_price);
                }
            }

            $ticketsHistory = $stmnt->fetch(PDO::FETCH_FUNC, 'rowMapperTicketHistory');
            return $ticketsHistory;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function getAllTicketHistory():array  {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_history.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_history.id, ticket_history.tour_id, history_tours.language, history_tours.datetime, " . 
            "history_tours.gathering_location, history_tours.employee_id, history_tours.employee_name, " . 
            "ticket_history.nr_of_people, history_tours.price, history_tours.group_price " .
            "FROM `item` JOIN `ticket_history` ON ticket_history.item_id = item.id JOIN `history_tours` ON history_tours.id = ticket_history.tour_id ");
            $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketHistory')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketHistory(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $tour_id, string $language, string $datetime, string $gathering_location, int $employee_id, 
                    string $employee_name, int $nr_of_people, float $price, float $group_price) {
                    return new TicketHistory($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, $id, $tour_id, 
                        $language, $datetime, $gathering_location, $employee_id, $employee_name, $nr_of_people, $price, $group_price);
                }
            }

            $ticketsHistory = $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketHistory');
            return $ticketsHistory;
        } catch (PDOException $e) {
            return null;
        }
    }
}