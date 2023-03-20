<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tickethistory.php';
class TicketHistoryRepository extends ItemRepository {

    public function insertTicketHistory(TicketHistory $ticket_history):int {
        try {
            $itemid = $this->insertItem($ticket_history);
            $stmnt = $this -> connection -> prepare("INSERT INTO `ticket_history`(`item_id`, `tour_id`, `nr_of_people`) VALUES (:item_id, :performance_id, :nr_of_people)");
            $tour_id = $ticket_history->getPerformanceId();
            $nr_of_people = $ticket_history->getNrOfPeople();
            $stmnt -> bindParam(':tour_id', $performance_id, PDO::PARAM_STR);
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
            $tour_id = $ticket_history->getTourID();
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
            $stmnt = $this -> connection -> prepare("SELECT ticket_history.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, ticket_history.id AS id, tour_id, nr_of_people, language, datetime, nr_of_people, employee_id FROM item JOIN ticket_history ON item.id = ticket_history.item_id JOIN history_tours ON ticket_history.tour_id = history_tours.id WHERE ticket_history.id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');
            $stmnt -> execute();
            $item = $stmnt -> fetch();
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function getAllTicketHistory():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT ticket_history.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, ticket_history.id AS id, tour_id, nr_of_people, language, datetime, nr_of_people, employee_id FROM item JOIN ticket_history ON item.id = ticket_history.item_id JOIN history_tours ON ticket_history.tour_id = history_tours.id");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }
}