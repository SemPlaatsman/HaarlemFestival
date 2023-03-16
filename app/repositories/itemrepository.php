<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
class ItemRepository extends Repository {

    public function insertItem(Item $item):int {
        try {
            $stmnt = $this -> connection -> prepare("INSERT INTO item (order_id, event_id, total_price, VAT, QR_Code) VALUES (:order_id, :event_id, :total_price, :VAT, :QR_Code)");
            $order_id = $item->getOrderId();
            $event_id = $item->getEventId();
            $total_price = $item->getTotalPrice();
            $VAT = $item->getVAT();
            $QR_Code = $item->getQRCode();
            $stmnt -> bindParam(':order_id', $order_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':event_id', $event_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':total_price', $total_price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':QR_Code', $QR_Code, PDO::PARAM_STR);
            $stmnt -> execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
            return $e;
        }
        
    }

    public function insertTicketDance(TicketDance $ticket_dance):int {
        try {
            $itemid = $this->insertItem($reservation);
            $stmnt = $this -> connection -> prepare("INSERT INTO `ticket_dance`(`item_id`, `performance_id`, `nr_of_people`) VALUES (:item_id, :performance_id, :nr_of_people)");
            $performance_id = $ticket_dance->getPerformanceId();
            $nr_of_people = $ticket_dance->getNrOfPeople();
            $stmnt -> bindParam(':performance_id', $performance_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_people', $nr_of_people, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            $stmnt -> execute();
        } catch (PDOException $e) {
            echo $e;
            return null;
        }        
    }

    public function insertTicketHistory(TicketHistory $ticket_history):int {
        try {
            $itemid = $this->insertItem($reservation);
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

    public function updateItem(Item $item):bool {
        try {
            $stmnt = $this -> connection -> prepare("UPDATE item SET order_id=:order_id, event_id=:event_id, total_price=:total_price, VAT=:VAT, QR_Code=:QR_Code WHERE id=:id;");
            $id = $item->getItemId();
            $order_id = $item->getOrderId();
            $event_id = $item->getEventId();
            $total_price = $item->getTotalPrice();
            $VAT = $item->getVAT();
            $QR_Code = $item->getQRCode();
            $stmnt -> bindParam(':id', $id, PDO::PARAM_STR);
            $stmnt -> bindParam(':order_id', $order_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':event_id', $event_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':total_price', $total_price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':QR_Code', $QR_Code, PDO::PARAM_STR);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
        
    }


    public function deleteItem(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("DELETE FROM item WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    

    public function getItem(int $id) : Item {
        try {
            $stmnt = $this -> connection -> prepare("SELECT id, order_id, event_id, total_price, VAT, QR_Code FROM item WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $item = $stmnt -> fetch();
        return $item;
        } catch (PDOException $e) {
            return null;
        }
        
    }
    public function getAllItems():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT id, order_id, event_id, total_price, VAT, QR_Code FROM item;");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return null;
        }
        
    }
}