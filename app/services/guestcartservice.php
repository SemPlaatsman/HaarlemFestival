<?php

class GuestCartService {
    private $cartRepository;
    private $cartRef;
    private $cart;

    public function __construct(&$cart) {
        $this->cartRepository = new CartRepository();
        $this->cartRef = &$cart;
        $this->cart = unserialize($this->cartRef);
    }

    public function updateReservation(int $reservationId, int $nrOfAdults, int $nrOfKids, string $datetime) {
        foreach ($this->cart['reservations'] as &$reservation) {
            if ($reservation->getId() == $reservationId) {
                $reservation->setNrOfAdults($nrOfAdults);
                $reservation->setNrOfKids($nrOfKids);
                $reservation->setDatetime($datetime);
                $reservation->setTotalPrice(($reservation->getNrOfAdults() + $reservation->getNrOfKids()) * $reservation->getRestaurant()->getReservationFee());
                $reservation->setFinalCheck(($reservation->getNrOfAdults() * $reservation->getRestaurant()->getAdultPrice()) + ($reservation->getNrOfKids() * $reservation->getRestaurant()->getKidsPrice()) - $reservation->getTotalPrice());
            }
        }
        $this->cartRef = serialize($this->cart);
    }

    public function updateTicketDance(int $ticketDanceId, int $nrOfPeople) {
        foreach ($this->cart['ticketsDance'] as &$ticketDance) {
            if ($ticketDance->getId() == $ticketDanceId) {
                $ticketDance->setNrOfPeople($nrOfPeople);
                $ticketDance->setTotalPrice(($ticketDance->getNrOfPeople() * $ticketDance->getTicketPrice()));
            }
        }
        $this->cartRef = serialize($this->cart);
    }

    public function updateTicketHistory(int $ticketHistoryId, int $nrOfPeople) {
        foreach ($this->cart['ticketsHistory'] as &$ticketHistory) {
            if ($ticketHistory->getId() == $ticketHistoryId) {
                $ticketHistory->setNrOfPeople($nrOfPeople);
                $ticketHistory->setTotalPrice((($ticketHistory->getNrOfPeople() % 4) * $ticketHistory->getPrice()) + (floor($ticketHistory->getNrOfPeople() / 4) * $ticketHistory->getGroupPrice()));
            }
        }
        $this->cartRef = serialize($this->cart);
    }

    public function deleteItem(int $itemId){
        foreach ($this->cart as &$items) {
            foreach ($items as &$item) {
                if ($item->getItemId() == $itemId) {
                    array_splice($items, array_keys($items, $item, true)[0], 1);
                }
            }
        }
        $this->cartRef = serialize($this->cart);
    }
}
?>