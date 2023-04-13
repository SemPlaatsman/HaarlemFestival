<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/restaurant.php';
require_once __DIR__ . '/../models/ticketdance.php';
require_once __DIR__ . '/../models/performance.php';
require_once __DIR__ . '/../models/artist.php';
require_once __DIR__ . '/../models/venue.php';
require_once __DIR__ . '/../models/tickethistory.php';
require_once __DIR__ . '/../models/tour.php';

class CartRepository extends Repository
{
    public function getCart(int $userId): array
    {
        $cart = [];
        $cart += ['ticketsHistory' => $this->getTicketsHistory($userId)];
        $cart += ['ticketsDance' => $this->getTicketsDance($userId)];
        $cart += ['reservations' => $this->getReservations($userId)];
        return $cart;
    }

    public function getTicketsHistory(int $userId): array {
        try {
            $query = $this->connection->prepare("SELECT ticket_history.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_history.id, ticket_history.tour_id, history_tours.language, history_tours.datetime, " . 
            "history_tours.gathering_location, history_tours.employee_id, history_tours.employee_name, history_tours.capacity, " . 
            "history_tours.price, history_tours.group_price, ticket_history.nr_of_people " .
            "FROM `item` JOIN `ticket_history` ON ticket_history.item_id = item.id JOIN `history_tours` ON history_tours.id = ticket_history.tour_id " .
            "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0);");
            $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'TicketHistory');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketHistory')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketHistory(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $tour_id, string $language, string $datetime, string $gathering_location, int $employee_id, 
                    string $employee_name, int $capacity, float $price, float $group_price, int $nr_of_people) {
                    return new TicketHistory($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, $id, new Tour($tour_id, 
                        $language, $datetime, $gathering_location, $employee_id, $employee_name, $capacity, $price, $group_price), $nr_of_people);
                }
            }

            $ticketsDance = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketHistory');
            return $ticketsDance;
        } catch (PDOException $pdoe) {
            return [];
        }
    }

    public function getTicketsDance(int $userId): array {
        try {
            $query = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " .
            "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " .
            "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
            "(SELECT venue.location FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_location', " . 
            "(SELECT venue.seats FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_seats', " .
            "performance.start_date, performance.end_date, performance.price as 'ticket_price', ticket_dance.nr_of_people " .
            "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id " .
            "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0);");
            $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketDance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, $venue_seats, 
                    string $start_date, string $end_date, $ticket_price, int $nr_of_people) {
                    return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                        $id, new Performance($performance_id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location, $venue_seats), $start_date, 
                        $end_date, $ticket_price), $nr_of_people);
                }
            }

            $ticketsDance = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketDance');
            return $ticketsDance;
        } catch (PDOException $pdoe) {
            return [];
        }
    }

    public function getReservations(int $userId) : array {
        try {
            $query = $this->connection->prepare("SELECT reservation.item_id, item.order_id, item.event_id, " . 
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, item.VAT, " . 
            "item.QR_Code, reservation.id, reservation.restaurant_id, restaurant.name as 'restaurant_name', restaurant.seats as 'restaurant_seats', " . 
            "restaurant.location as 'restaurant_location', restaurant.adult_price as 'restaurant_adult_price', restaurant.kids_price as 'restaurant_kids_price', " . 
            "restaurant.reservation_fee as 'restaurant_reservation_fee', reservation.final_check, reservation.nr_of_adults, reservation.nr_of_kids, reservation.datetime " . 
            "FROM `item` JOIN reservation ON reservation.item_id = item.id JOIN `restaurant` ON restaurant.id = reservation.restaurant_id " . 
            "WHERE order_id = (SELECT order_id FROM `orders` WHERE user_id = :user_id AND time_payed IS NULL AND payment_status = 0);");
            $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
    
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
    
            $reservations = $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperReservation');
            return $reservations;
        } catch (PDOException $pdoe) {
            return [];
        }
    }

    public function updateReservation(int $reservationId, int $nrOfAdults, int $nrOfKids, string $datetime) : bool {
        try {
            $query = $this->connection->prepare("UPDATE `item` JOIN `reservation` ON `reservation`.`item_id` = `item`.`id` " . 
            "JOIN `restaurant` ON `restaurant`.`id` = `reservation`.`restaurant_id` SET `reservation`.`nr_of_adults` = :nr_of_adults, `reservation`.`nr_of_kids` = :nr_of_kids, " . 
            "`reservation`.`datetime` = :datetime, `reservation`.`final_check` = ((:nr_of_adults * `restaurant`.`adult_price`) + (:nr_of_kids * `restaurant`.`kids_price`) - ((:nr_of_adults + :nr_of_kids) * `restaurant`.`reservation_fee`)), " . 
            "`item`.`total_price` = ((:nr_of_adults + :nr_of_kids) * `restaurant`.`reservation_fee`) WHERE `reservation`.`id` = :reservation_id; LIMIT 1");
            $query->bindParam(':reservation_id', $reservationId, PDO::PARAM_INT);
            $query->bindParam(':nr_of_adults', $nrOfAdults, PDO::PARAM_INT);
            $query->bindParam(':nr_of_kids', $nrOfKids, PDO::PARAM_INT);
            $query->bindParam(':datetime', $datetime, PDO::PARAM_STR);
            $query->execute();
            return boolval($query->rowCount() > 0);
        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function updateTicketDance(int $ticketDanceId, int $nrOfPeople) : bool {
        try {
            $query = $this->connection->prepare("UPDATE `item` JOIN `ticket_dance` ON `ticket_dance`.`item_id` = `item`.`id` SET `ticket_dance`.`nr_of_people` = :nr_of_people, " . 
            "`item`.`total_price` = (:nr_of_people * (SELECT `performance`.`price` FROM `performance` WHERE `performance`.`id` = `ticket_dance`.`performance_id`)) " . 
            "WHERE `ticket_dance`.`id` = :ticket_dance_id LIMIT 1;");
            $query->bindParam(':ticket_dance_id', $ticketDanceId, PDO::PARAM_INT);
            $query->bindParam(':nr_of_people', $nrOfPeople, PDO::PARAM_INT);
            $query->execute();
            return $query->rowCount() > 0;
        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function updateTicketHistory(int $ticketHistoryId, int $nrOfPeople) : bool {
        try {
            $query = $this->connection->prepare("UPDATE `item` JOIN `ticket_history` ON `ticket_history`.`item_id` = `item`.`id` " . 
            "JOIN `history_tours` ON `history_tours`.`id` = `ticket_history`.`tour_id` SET `ticket_history`.`nr_of_people` = :nr_of_people, " . 
            "`item`.`total_price` = ((:nr_of_people % 4) * `history_tours`.`price`) + (FLOOR(:nr_of_people / 4) * `history_tours`.`group_price`) " . 
            "WHERE `ticket_history`.`id` = :ticket_history_id");
            $query->bindParam(':ticket_history_id', $ticketHistoryId, PDO::PARAM_INT);
            $query->bindParam(':nr_of_people', $nrOfPeople, PDO::PARAM_INT);
            $query->execute();
            return $query->rowCount() > 0;
        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function deleteItem($itemId) : bool {
        try {
            $query = $this->connection->prepare("DELETE FROM `item` WHERE `id` = :id LIMIT 1");
            $query->bindParam(":id", $itemId, PDO::PARAM_INT);
            $query->execute();
            return $query->rowCount() > 0;
        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function getRestaurant(int $restaurantId) : Restaurant {
        try {
            $query = $this->connection->prepare("SELECT `id`, `name`, `seats`, `location`, `adult_price`, `kids_price`, `reservation_fee` FROM `restaurant` WHERE `id` = :id LIMIT 1;");
            $query->bindParam(":id", $restaurantId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Restaurant');
    
            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperRestaurant')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperRestaurant(int $id, string $name, int $seats, string $location, float $adult_price, float $kids_price, float $reservation_fee) {
                    return new Restaurant($id, $name, $seats, $location, $adult_price, $kids_price, $reservation_fee);
                }
            }
    
            return $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperRestaurant')[0];
        } catch (PDOException $pdoe) {
            return null;
        }
    }

    public function getPerformance(int $performanceId) : Performance {
        try {
            $query = $this->connection->prepare("SELECT `performance`.`id`, `artist_id`, `artist`.`name`, `venue_id`, `venue`.`name`, `venue`.`location`, " . 
            "`venue`.`seats`, `start_date`, `end_date`, `price` FROM `performance` JOIN `artist` ON `artist`.`id` = `performance`.`artist_id` " . 
            "JOIN `venue` ON `venue`.`id`	= `performance`.`venue_id` WHERE `performance`.`id` = :id LIMIT 1;");
            $query->bindParam(":id", $performanceId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Performance');
    
            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperPerformance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperPerformance(int $id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, int $venue_seats, string $start_date, string $end_date, float $price) {
                    return new Performance($id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location, $venue_seats), $start_date, $end_date, $price);
                }
            }
    
            return $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperPerformance')[0];
        } catch (PDOException $pdoe) {
            return null;
        }
    }

    public function getTour(int $tourId) : Tour {
        try {
            $query = $this->connection->prepare("SELECT `id`, `language`, `datetime`, `gathering_location`, `employee_id`, `employee_name`, `capacity`, `price`, `group_price` FROM `history_tours` WHERE `id` = :id LIMIT 1;");
            $query->bindParam(":id", $tourId, PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Tour');
    
            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTour')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTour(int $id, string $language, string $datetime, string $gathering_location, int $employee_id, string $employee_name, int $capacity, float $price, float $group_price) {
                    return new Tour($id, $language, $datetime, $gathering_location, $employee_id, $employee_name, $capacity, $price, $group_price);
                }
            }
    
            return $query->fetchAll(PDO::FETCH_FUNC, 'rowMapperTour')[0];
        } catch (PDOException $pdoe) {
            return null;
        }
    }

    public function addReservationToCart(Reservation $reservation) : bool {
        try {

        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function addTicketDanceToCart(TicketDance $reservation) : bool {
        try {

        } catch (PDOException $pdoe) {
            return false;
        }
    }

    public function addTicketHistoryToCart(TicketHistory $reservation) : bool {
        try {

        } catch (PDOException $pdoe) {
            return false;
        }
    }
}
?>