<?php
require_once __DIR__ . '/../repositories/cartrepository.php';

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

    public function deleteItem(int $itemId) : bool {
        return $this->cartRepository->deleteItem($itemId);
    }
}
?>