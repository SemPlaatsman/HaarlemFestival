<?php
require_once __DIR__ . '/itemrepository.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/restaurant.php';
class ReservationRepository extends ItemRepository {

    public function insertReservation(Reservation $reservation):int {
        try {
            $itemid = $this->insertItem($reservation);
            $stmnt = $this->connection->prepare("INSERT INTO reservation (restaurant_id, final_check, item_id, nr_of_adults, nr_of_kids, `datetime`) VALUES (:restaurant_id, :final_check, :item_id, :nr_of_adults, :nr_of_kids, :datetime)");
            $restaurant = $reservation->getRestaurant();
            $restaurant_id = $restaurant->getId();
            $final_check = $reservation->getFinalCheck();
            $nr_of_adults = $reservation->getNrOfAdults();
            $nr_of_kids = $reservation->getNrOfKids();
            $datetime = $reservation->getDatetime()->format('Y-m-d H:i:s');
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

    public function deleteReservation(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("SELECT `item_id` FROM `reservation` WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $result = $stmnt -> fetch();
            $item_id = intval(($result['item_id']));
            $stmnt = $this -> connection -> prepare("DELETE FROM reservation WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> execute();
            $this->deleteItem($item_id);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getReservation(int $id) : Item {
        try {
            $stmnt = $this -> connection -> prepare("SELECT reservation.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, reservation.id AS id, restaurant_id, final_check, nr_of_adults, nr_of_kids, 'datetime' FROM item JOIN reservation ON item.item_id = reservation.id WHERE reservation.id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Reservation');
            $stmnt -> execute();
            $reservation = $stmnt -> fetch();
            return $reservation;
        } catch (PDOException $e) {
            echo($e);
            return $e;
        }
    }
    public function getAllReservations():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT reservation.item_id AS item_id, order_id, event_id, total_price, VAT, QR_Code, reservation.id AS id, restaurant_id, final_check, nr_of_adults, nr_of_kids, 'datetime' FROM item JOIN reservation ON item.id = reservation.item_id");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Reservation');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }
}