<?php
require_once __DIR__ . '/itemrepository.php';
require_once __DIR__ . '/../models/ticketdance.php';
class TicketDanceRepository extends ItemRepository {

    public function insertTicketDance(TicketDance $ticket_dance):int {
        try {
            $itemid = $this->insertItem($ticket_dance);
            $stmnt = $this -> connection -> prepare("INSERT INTO `ticket_dance`(`item_id`, `performance_id`, `nr_of_people`) VALUES (:item_id, :performance_id, :nr_of_people)");
            $performance_id = $ticket_dance->getPerformance()->getId();
            $nr_of_people = $ticket_dance->getNrOfPeople();
            $stmnt -> bindParam(':performance_id', $performance_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_people', $nr_of_people, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            $stmnt -> execute();
            return $itemid;
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
    
    public function updateTicketDance(TicketDance $ticket_dance) : bool {
        try {
            $this->updateItem($ticket_dance);
            $stmnt = $this -> connection -> prepare("UPDATE ticket_dance SET id=:ticket_dance_id, item_id=:item_id, performance_id=:performance_id, nr_of_people=:nr_of_people WHERE id=:ticket_dance_id;");
            $id = $ticket_dance->getId();
            $item_id = $ticket_dance->getItemId();
            $performance_id = $ticket_dance->getPerformance()->getId();
            $nr_of_people = $ticket_dance->getNrOfPeople();
            $stmnt -> bindParam(':ticket_dance_id', $id, PDO::PARAM_STR);
            $stmnt -> bindParam(':performance_id', $performance_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':nr_of_people', $nr_of_people, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_id', $itemid, PDO::PARAM_STR);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    

    public function getTicketDance(int $id) : Item {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " .
            "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " .
            "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
            "(SELECT venue.location FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_location', " .
            "performance.start_date, performance.end_date, performance.price as 'ticket_price', ticket_dance.nr_of_people " .
            "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id " .
            "WHERE ticket_dance.id = :id;");
            $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketDance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, 
                    string $start_date, string $end_date, $ticket_price, int $nr_of_people) {
                    return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                        $id, new Performance($performance_id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location), $start_date, 
                        $end_date, $ticket_price), $nr_of_people);
                }
            }

            $ticketsDance = $stmnt->fetch(PDO::FETCH_FUNC, 'rowMapperTicketDance');
            return $ticketsDance;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getTicketDanceForOrder(int $orderId) : Array {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " .
            "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " .
            "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
            "(SELECT venue.location FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_location', " .
            "performance.start_date, performance.end_date, performance.price as 'ticket_price', ticket_dance.nr_of_people " .
            "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id " .
            "WHERE item.order_id = :id;");
            $stmnt->bindParam(":orderId", $orderId, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketDance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, 
                    string $start_date, string $end_date, $ticket_price, int $nr_of_people) {
                    return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                        $id, new Performance($performance_id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location), $start_date, 
                        $end_date, $ticket_price), $nr_of_people);
                }
            }

            $ticketsDance = $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketDance');
            return $ticketsDance;
        } catch (PDOException $e) {
            
            return null;
        }
    }

    public function getAllTicketsDance():array  {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " .
            "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " .
            "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
            "(SELECT venue.location FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_location', " .
            "performance.start_date, performance.end_date, performance.price as 'ticket_price', ticket_dance.nr_of_people " .
            "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id;");
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketDance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, 
                    string $start_date, string $end_date, $ticket_price, int $nr_of_people) {
                    return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                        $id, new Performance($performance_id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location), $start_date, 
                        $end_date, $ticket_price), $nr_of_people);
                }
            }
            $ticketsDance = $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperTicketDance');
            return $ticketsDance;
        } catch (PDOException $e) {
            echo($e);
            return null;
        }
    }

    public function getTicketDanceForQR(string $QR_Code) : Item {
        try {
            $stmnt = $this->connection->prepare("SELECT ticket_dance.item_id, item.order_id, item.event_id, " .
            "(SELECT event.name FROM `event` WHERE event.id = item.event_id) as 'event_name', item.total_price, " .
            "item.VAT, item.QR_Code, ticket_dance.id, ticket_dance.performance_id, performance.artist_id, " .
            "(SELECT name FROM `artist` WHERE artist.id = performance.artist_id) as 'artist_name', performance.venue_id, " .
            "(SELECT venue.name FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_name', " . 
            "(SELECT venue.location FROM `venue` WHERE venue.id = performance.venue_id) as 'venue_location', " .
            "performance.start_date, performance.end_date, performance.price as 'ticket_price', ticket_dance.nr_of_people " .
            "FROM `item` JOIN ticket_dance ON ticket_dance.item_id = item.id JOIN `performance` ON performance.id = ticket_dance.performance_id " .
            "WHERE item.QR_Code = :QR_Code;");
            $stmnt->bindParam(":item.QR_Code", $QR_Code, PDO::PARAM_INT);
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'TicketDance');

            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTicketDance')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTicketDance(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code,
                    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, 
                    string $start_date, string $end_date, $ticket_price, int $nr_of_people) {
                    return new TicketDance($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code, 
                        $id, new Performance($performance_id, new Artist($artist_id, $artist_name), new Venue($venue_id, $venue_name, $venue_location), $start_date, 
                        $end_date, $ticket_price), $nr_of_people);
                }
            }

            $ticketsDance = $stmnt->fetch(PDO::FETCH_FUNC, 'rowMapperTicketDance');
            return $ticketsDance;
        } catch (PDOException $e) {
            return null;
        }
    }
}