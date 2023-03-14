<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/restaurant.php';
class ItemRepository extends Repository {

    public function insertItem(Item $item):int {
        try {
            $stmnt = $this -> connection -> prepare("INSERT INTO item (id, order_id, event_id, total_price, VAT, QR_Code) VALUES (:id, :order_id, :event_id, :total_price, :VAT, :QR_Code)");
            //$id = $item->getItemId();
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
            $stmnt -> execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
            return null;
        }
        
    }

    public function insertReservation(Reservation $reservation):int {
        try {
            $itemid = insertItem($reservation);
            $stmnt = $this -> connection -> prepare("INSERT INTO `reservation`(`restaurant_id`, `final_check`, `item_id`, `nr_of_adults`, `nr_of_kids`, `datetime`) VALUES (:restaurant_id, :final_check, :item_id, :nr_of_adults :nr_of_kids, :'datetime')");
            $restaurant = $reservation->getRestaurant();
            $restaurant_id = $restaurant->getId();
            $final_check = $reservation->getFinalCheck();
            $nr_of_adults = $reservation->getNrOfAdults();
            $nr_of_kids = $reservation->getNrOfKids();
            $datetime = $reservation->getDatetime();
            $stmnt -> bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':final_check', $final_check, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_adults', $nr_of_adults, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_kids', $nr_of_kids, PDO::PARAM_STR);
            $stmnt -> bindParam(':datetime', $datetime, PDO::PARAM_STR);
            $stmnt -> execute();
        } catch (PDOException $e) {
            echo $e;
            return null;
        }        
    }

    public function insertTicketDance(TicketDance $ticket_dance):int {
        try {
            $itemid = insertItem($reservation);
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
            $itemid = insertItem($reservation);
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
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
        
    }

    public function deleteReservation(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("SELECT `item_id` FROM `reservation` WHERE :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $item_id = $stmnt -> fetch();
            $stmnt = $this -> connection -> prepare("DELETE FROM item WHERE id = :id");
            $stmnt -> bindParam(':id', $item_id, PDO::PARAM_INT);
            $stmnt -> execute();
            $stmnt = $this -> connection -> prepare("DELETE FROM reservation WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
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