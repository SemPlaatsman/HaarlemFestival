<?php
require_once __DIR__ . '/../repositories/cartrepository.php';
require_once __DIR__ . '/../models/item.php';
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/ticketdance.php';
require_once __DIR__ . '/../models/tickethistory.php';

class CartService {
    private $cartRepository;

    function __construct() {
        $this->cartRepository = new CartRepository();
    }

    public function getCart(int $userId) : array {
        return $this->cartRepository->getCart($userId);
    }

    public function updateReservation(int $reservationId, int $nrOfAdults, int $nrOfKids, string $datetime) : bool {
        return $this->cartRepository->updateReservation($reservationId, $nrOfAdults, $nrOfKids, $datetime);
    }

    public function updateTicketDance(int $ticketDanceId, int $nrOfPeople) : bool {
        return $this->cartRepository->updateTicketDance($ticketDanceId, $nrOfPeople);
    }

    public function updateTicketHistory(int $ticketHistoryId, int $nrOfPeople) : bool {
        return $this->cartRepository->updateTicketHistory($ticketHistoryId, $nrOfPeople);
    }

    public function deleteItem(int $itemId) : bool {
        return $this->cartRepository->deleteItem($itemId);
    }

    public function getRestaurant(int $restaurantId) : Restaurant {
        return $this->cartRepository->getRestaurant($restaurantId);
    }

    public function getPerformance(int $performanceId) : Performance {
        return $this->cartRepository->getPerformance($performanceId);
    }

    public function getTour(int $tourId) : Tour {
        return $this->cartRepository->getTour($tourId);
    }

    public function addToCart(Item $item) : bool {
        switch (true) {
            case $item instanceof Reservation:
                return $this->cartRepository->addReservationToCart($item);
            case $item instanceof TicketDance:
                return $this->cartRepository->addTicketDanceToCart($item);
            case $item instanceof TicketHistory:
                return $this->cartRepository->addTicketHistoryToCart($item);
        }
        return false;
    }
}
?>