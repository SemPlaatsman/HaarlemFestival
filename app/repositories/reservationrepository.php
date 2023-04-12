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
            return $itemid;
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

    public function updateReservation(Reservation $reservation) : bool {
        try {
            $this->updateItem($reservation);
            $stmnt = $this -> connection -> prepare("UPDATE reservation SET id=:reservation_id, restaurant_id=:restaurant_id, final_check=:final_check, item_id=:item_id, nr_of_adults=:nr_of_adults, nr_of_kids=:nr_of_kids, 'datetime'=:'datetime' WHERE id=:reservation_id;");
            $id = $reservation->getId();
            $restaurant = $reservation->getRestaurant();
            $restaurant_id = $restaurant->getId();
            $final_check = $reservation->getFinalCheck();
            $nr_of_adults = $reservation->getNrOfAdults();
            $nr_of_kids = $reservation->getNrOfKids();
            $datetime = $reservation->getDatetime()->format('Y-m-d H:i:s');
            $stmnt -> bindParam(':reservation_id', $id, PDO::PARAM_STR);
            $stmnt -> bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':final_check', $final_check, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_adults', $nr_of_adults, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_kids', $nr_of_kids, PDO::PARAM_STR);
            $stmnt -> bindParam(':datetime', $datetime, PDO::PARAM_STR);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getReservation(int $id) : Item {
        try {
            $stmnt = $this->connection->prepare("SELECT reservation.item_id, item.order_id, item.event_id, " . 
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, item.VAT, " . 
            "item.QR_Code, reservation.id, reservation.restaurant_id, restaurant.name as 'restaurant_name', restaurant.seats as 'restaurant_seats', " . 
            "restaurant.location as 'restaurant_location', restaurant.adult_price as 'restaurant_adult_price', restaurant.kids_price as 'restaurant_kids_price', " . 
            "restaurant.reservation_fee as 'restaurant_reservation_fee', reservation.final_check, reservation.nr_of_adults, reservation.nr_of_kids, reservation.datetime " . 
            "FROM `item` JOIN reservation ON reservation.item_id = item.id JOIN `restaurant` ON restaurant.id = reservation.restaurant_id " . 
            "WHERE reservation.id :id;");
            $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperReservation')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperReservation(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
                int $id, int $restaurant_id, string $restaurant_name, int $restaurant_seats, string $restaurant_location, float $restaurant_adults_price, 
                float $restaurant_kids_price, float $restaurant_reservation_fee , float $final_check, int $nr_of_adults, int $nr_of_kids, string $datetime) {
                    return new Reservation($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                    $id, new Restaurant($restaurant_id, $restaurant_name, $restaurant_seats, $restaurant_location, $restaurant_adults_price, 
                    $restaurant_kids_price, $restaurant_reservation_fee), $final_check, $nr_of_adults, $nr_of_kids, $datetime);
                }
            }

            $reservations = $stmnt->fetch(PDO::FETCH_FUNC, 'rowMapperReservation');
            return $reservations;
        } catch (PDOException $e) {
            echo($e);
            return $e;
        }
    }

    public function getReservationsForOrder(int $orderId) : array {
        try {
            $stmnt = $this->connection->prepare("SELECT reservation.item_id, item.order_id, item.event_id, " . 
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, item.VAT, " . 
            "item.QR_Code, reservation.id, reservation.restaurant_id, restaurant.name as 'restaurant_name', restaurant.seats as 'restaurant_seats', " . 
            "restaurant.location as 'restaurant_location', restaurant.adult_price as 'restaurant_adult_price', restaurant.kids_price as 'restaurant_kids_price', " . 
            "restaurant.reservation_fee as 'restaurant_reservation_fee', reservation.final_check, reservation.nr_of_adults, reservation.nr_of_kids, reservation.datetime " . 
            "FROM `item` JOIN reservation ON reservation.item_id = item.id JOIN `restaurant` ON restaurant.id = reservation.restaurant_id " . 
            "WHERE item.order :orderId;");
            $stmnt->bindParam(":orderId", $orderId, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperReservation')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperReservation(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
                int $id, int $restaurant_id, string $restaurant_name, int $restaurant_seats, string $restaurant_location, float $restaurant_adults_price, 
                float $restaurant_kids_price, float $restaurant_reservation_fee , float $final_check, int $nr_of_adults, int $nr_of_kids, string $datetime) {
                    return new Reservation($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                    $id, new Restaurant($restaurant_id, $restaurant_name, $restaurant_seats, $restaurant_location, $restaurant_adults_price, 
                    $restaurant_kids_price, $restaurant_reservation_fee), $final_check, $nr_of_adults, $nr_of_kids, $datetime);
                }
            }

            $reservations = $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperReservation');
            return $reservations;
        } catch (PDOException $e) {
            echo($e);
            return $e;
        }
    }

    public function getAllReservations():array  {
        try {
            $stmnt = $this->connection->prepare("SELECT reservation.item_id, item.order_id, item.event_id, " . 
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, item.VAT, " . 
            "item.QR_Code, reservation.id, reservation.restaurant_id, restaurant.name as 'restaurant_name', restaurant.seats as 'restaurant_seats', " . 
            "restaurant.location as 'restaurant_location', restaurant.adult_price as 'restaurant_adult_price', restaurant.kids_price as 'restaurant_kids_price', " . 
            "restaurant.reservation_fee as 'restaurant_reservation_fee', reservation.final_check, reservation.nr_of_adults, reservation.nr_of_kids, reservation.datetime " . 
            "FROM `item` JOIN reservation ON reservation.item_id = item.id JOIN `restaurant` ON restaurant.id = reservation.restaurant_id;");
            $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperReservation')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperReservation(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
                int $id, int $restaurant_id, string $restaurant_name, int $restaurant_seats, string $restaurant_location, float $restaurant_adults_price, 
                float $restaurant_kids_price, float $restaurant_reservation_fee , float $final_check, int $nr_of_adults, int $nr_of_kids, string $datetime) {
                    return new Reservation($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                    $id, new Restaurant($restaurant_id, $restaurant_name, $restaurant_seats, $restaurant_location, $restaurant_adults_price, 
                    $restaurant_kids_price, $restaurant_reservation_fee), $final_check, $nr_of_adults, $nr_of_kids, $datetime);
                }
            }

            $reservations = $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperReservation');
            return $reservations;
        } catch (PDOException $e) {
            return null;
        }
    }
}