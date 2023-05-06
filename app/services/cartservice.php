<?php

use Mpdf\Tag\PageBreak;

require_once __DIR__ . '/../repositories/cartrepository.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/restaurant.php';
require_once __DIR__ . '/../models/ticketdance.php';
require_once __DIR__ . '/../models/performance.php';
require_once __DIR__ . '/../models/tickethistory.php';
require_once __DIR__ . '/../models/tour.php';

class CartService {
    private $cartRepository;

    function __construct() {
        $this->cartRepository = new CartRepository();
    }

    public function getCart(int $userId) : array {
        try {
            return $this->cartRepository->getCart($userId);
        } catch (Exception $e) {
            return ['ticketsHistory' => 3, 'ticketsDance' => 2, 'reservations' => 1];
        }
    }

    public function updateReservation(int $reservationId, int $nrOfAdults, int $nrOfKids, string $datetime) : bool {
        try {
            if ($nrOfAdults < 1 || $nrOfKids < 0 || DateTime::createFromFormat('Y-m-d H:i:s', $datetime) < new DateTime()) {
                throw new Exception("Invalid input!");
            }
            return $this->cartRepository->updateReservation($reservationId, $nrOfAdults, $nrOfKids, $datetime);
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateTicketDance(int $ticketDanceId, int $nrOfPeople) : bool {
        try {
            if ($nrOfPeople < 1) {
                throw new Exception("Invalid input!");
            }
            return $this->cartRepository->updateTicketDance($ticketDanceId, $nrOfPeople);
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateTicketHistory(int $ticketHistoryId, int $nrOfPeople) : bool {
        try {
            if ($nrOfPeople < 1) {
                throw new Exception("Invalid input!");
            }
            return $this->cartRepository->updateTicketHistory($ticketHistoryId, $nrOfPeople);
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteItem(int $itemId) : bool {
        try {
            return $this->cartRepository->deleteItem($itemId);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getRestaurant(int $restaurantId) : Restaurant {
        try {
            return $this->cartRepository->getRestaurant($restaurantId);
        } catch (Exception $e) {
            return null;
        }
    }

    public function getPerformance(int $performanceId) : Performance {
        try {
            return $this->cartRepository->getPerformance($performanceId);
        } catch (Exception $e) {
            return null;
        }
    }

    public function getTour(int $tourId) : Tour {
        try {
            return $this->cartRepository->getTour($tourId);
        } catch (Exception $e) {
            return null;
        }
    }

    public function addToCart(Item $item) : bool {
        try {
            (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
            $userId = unserialize($_SESSION['user'])->getId();
            switch ($item) {
                case $item instanceof Reservation:
                    if ($item->getNrOfAdults() < 1 || $item->getNrOfKids() < 0 || $item->getDatetime() < new DateTime()) {
                        throw new Exception("Invalid input!");
                    }
                    $item->setRestaurant($this->getRestaurant($item->getRestaurant()->getId()));
                    break;
                case $item instanceof TicketDance:
                    if ($item->getNrOfPeople() < 1) {
                        throw new Exception("Invalid input!");
                    }
                    $item->setPerformance($this->getPerformance($item->getPerformance()->getId()));
                    break;
                case $item instanceof TicketHistory:
                    if ($item->getNrOfPeople() < 1) {
                        throw new Exception("Invalid input!");
                    }
                    $item->setTour($this->getTour($item->getTour()->getId()));
                    break;
            }
            return $this->cartRepository->addItemToCart($item, $userId);
        } catch (Exception $e) {
            return false;
        }
    }
}
?>