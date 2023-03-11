<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/ticketdance.php';
require_once __DIR__ . '/../models/tickethistory.php';

class CartRepository extends Repository {
    public function getCart(int $userId) : array {
        $cart = [];
        $cart += ['ticketsHistory' => $this->getTicketsHistory($userId)];
        $cart += ['ticketsDance' => $this->getTicketsDance($userId)];
        $cart += ['reservations' => $this->getReservations($userId)];
        return $cart;
    }

    public function getTicketsHistory(int $userId) : array {
        $query = $this->connection->prepare("SELECT ticket_history.item_id, item.order_id, item.event_id, " . 
        "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " . 
        "item.VAT, item.QR_Code, ticket_history.id, ticket_history.tour_id, history_tours.language, " . 
        "history_tours.datetime, history_tours.employee_id, history_tours.employee_name, ticket_history.nr_of_people " . 
        "FROM `item` JOIN `ticket_history` ON ticket_history.item_id = item.id JOIN `history_tours` ON history_tours.id = ticket_history.tour_id " . 
        "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0);");
        $query->bindParam(":user_id", $userId);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');

        // if rowMapper function is already loaded, don't load it again
        if (!function_exists('rowMapperTicketHistory')) {
            // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
            function rowMapperTicketHistory(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
            int $id, int $tour_id, string $language, string $datetime, int $employee_id, string $employee_name, int $nr_of_people) {
                return new TicketHistory($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                $id, $tour_id, $language, $datetime, $employee_id, $employee_name, $nr_of_people);
            }
        }

        $ticketsDance = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketHistory');
        return $ticketsDance;
    }

    public function getTicketsDance(int $userId) : array {
        $query = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " . 
        "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " . 
        "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " . 
        "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " . 
        "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
        "performance.start_date, performance.end_date, ticket_dance.nr_of_people " . 
        "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id " . 
        "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0);");
        $query->bindParam(":user_id", $userId);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

        // if rowMapper function is already loaded, don't load it again
        if (!function_exists('rowMapperTicketDance')) {
            // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
            function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
            int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $start_date, string $end_date, int $nr_of_people) {
                return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                $id, $performance_id, $artist_id, $artist_name, $venue_id, $venue_name, $start_date, $end_date, $nr_of_people);
            }
        }

        $ticketsDance = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketDance');
        return $ticketsDance;
    }

    public function getReservations(int $userId) : array {
        $query = $this->connection->prepare("SELECT reservation.item_id, item.order_id, item.event_id, " . 
        "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', " . 
        "item.total_price, item.VAT, item.QR_Code, reservation.id, reservation.restaurant_id, " . 
        "(SELECT restaurant.name FROM `restaurant` WHERE restaurant.id = reservation.restaurant_id) as 'restaurant_name', " . 
        "reservation.nr_of_adults, reservation.nr_of_kids, reservation.datetime " . 
        "FROM `item` JOIN reservation ON reservation.item_id = item.id " . 
        "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id " . 
        "AND time_payed IS NULL AND payment_status = 0);");
        $query->bindParam(":user_id", $userId);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Reservation');

        // if rowMapper function is already loaded, don't load it again
        if (!function_exists('rowMapperReservation')) {
            // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
            function rowMapperReservation(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
            int $id, int $restaurant_id, string $restaurant_name, int $nr_of_adults, int $nr_of_kids, string $datetime) {
                return new Reservation($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                $id, $restaurant_id, $restaurant_name, $nr_of_adults, $nr_of_kids, $datetime);
            }
        }

        $reservations = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperReservation');
        return $reservations;
    }
}
?>