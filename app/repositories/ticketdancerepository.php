<?php
require_once __DIR__ . '/itemrepository.php';
require_once __DIR__ . '/../models/ticketdance.php';
class TicketDanceRepository extends ItemRepository {

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


    public function deleteTicketDance(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("SELECT `item_id` FROM `ticket_dance` WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $result = $stmnt -> fetch();
            $item_id = intval(($result['item_id']));
            $stmnt = $this -> connection -> prepare("DELETE FROM ticket_dance WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $this->deleteItem($item_id);
        } catch (PDOException $e) {
            return false;
        }
    }
    

    public function getTicketDance(int $id) : Item {
        try {
            $stmnt = $this -> connection -> prepare("SELECT ticket_dance.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, ticket_dance.id AS id, performance.id AS performance_id, artist.id AS artist_id, artist.name AS artist_name, venue.id AS venue_id, venue.name AS venue_name, start_date, end_date, nr_of_people " .
            "FROM item JOIN ticket_dance ON item.id = ticket_dance.item_id JOIN performance ON ticket_dance.performance_id = performance.id JOIN artist ON artist.id =performance.artist_id JOIN venue ON venue.id = performance.venue_id WHERE ticket_dance.id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'TicketDance');
            $stmnt -> execute();
            $item = $stmnt -> fetch();
        return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function getAllTicketsDance():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT ticket_dance.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, ticket_dance.id AS id, performance.id AS performance_id, artist.id AS artist_id, artist.name AS artist_name, venue.id AS venue_id, venue.name AS venue_name, start_date, end_date, nr_of_people " .
            "FROM item JOIN ticket_dance ON item.id = ticket_dance.item_id JOIN performance ON ticket_dance.performance_id = performance.id JOIN artist ON artist.id =performance.artist_id JOIN venue ON venue.id = performance.venue_id");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'TicketDance');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }
}