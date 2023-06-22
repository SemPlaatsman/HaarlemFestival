<?php
require_once __DIR__ . '/../models/reservation.php';
require_once __DIR__ . '/../models/restaurant.php';
require_once __DIR__ . '/../models/ticketdance.php';
require_once __DIR__ . '/../models/performance.php';
require_once __DIR__ . '/../models/artist.php';
require_once __DIR__ . '/../models/venue.php';
require_once __DIR__ . '/../models/tickethistory.php';
require_once __DIR__ . '/../models/tour.php';
require_once __DIR__ . '/../repositories/cartrepository.php';

class GuestCartService {
    private $cartRepository;
    private $cartRef;
    private $cart;

    public function __construct(&$cart) {
        $this->cartRepository = new CartRepository();
        $this->cartRef = &$cart;
        $this->cart = unserialize($this->cartRef);
    }

    public function updateReservation(int $reservationId, int $nrOfAdults, int $nrOfKids, string $datetime) : bool {
        try {
            if ($nrOfAdults < 1 || $nrOfKids < 0 || DateTime::createFromFormat('Y-m-d H:i:s', $datetime) < new DateTime()) {
                throw new Exception("Invalid input!");
            }
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
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateTicketDance(int $ticketDanceId, int $nrOfPeople) : bool {
        try {
            if ($nrOfPeople < 1) {
                throw new Exception("Invalid input!");
            }
            foreach ($this->cart['ticketsDance'] as &$ticketDance) {
                if ($ticketDance->getId() == $ticketDanceId) {
                    $ticketDance->setNrOfPeople($nrOfPeople);
                    $ticketDance->setTotalPrice(($ticketDance->getNrOfPeople() * $ticketDance->getPerformance()->getPrice()));
                }
            }
            $this->cartRef = serialize($this->cart);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateTicketHistory(int $ticketHistoryId, int $nrOfPeople) : bool {
        try {
            if ($nrOfPeople < 1) {
                throw new Exception("Invalid input!");
            }
            foreach ($this->cart['ticketsHistory'] as &$ticketHistory) {
                if ($ticketHistory->getId() == $ticketHistoryId) {
                    $ticketHistory->setNrOfPeople($nrOfPeople);
                    $ticketHistory->setTotalPrice((($ticketHistory->getNrOfPeople() % 4) * $ticketHistory->getTour()->getPrice()) + (floor($ticketHistory->getNrOfPeople() / 4) * $ticketHistory->getTour()->getGroupPrice()));
                }
            }
            $this->cartRef = serialize($this->cart);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteItem(int $itemId) : bool {
        try {
            foreach ($this->cart as &$items) {
                foreach ($items as &$item) {
                    if ($item->getItemId() == $itemId) {
                        array_splice($items, array_keys($items, $item, true)[0], 1);
                        $this->cartRef = serialize($this->cart);
                        return true;
                    }
                }
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
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
        try {
            $nextItemId = 1;
            foreach ($this->cart as $cartItems) {
                foreach ($cartItems as $cartItem) {
                    if ($cartItem->getItemId() >= $nextItemId) {
                        $nextItemId = ($cartItem->getItemId() + 1);
                    }
                }
            }
            $item->setItemId($nextItemId);
            $this->fillItem($item);
            $this->cartRef = serialize($this->cart);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function fillItem(Item &$item) {
        switch ($item) {
            case $item instanceof Reservation:
                if ($item->getNrOfAdults() < 1 || $item->getNrOfKids() < 0 || $item->getDatetime() < new DateTime() || !$this->cartRepository->validateRestaurantOpeningHours($item->getRestaurant()->getId(), date_format($item->getDatetime(), 'Y-m-d H:i:s'))) {
                    throw new Exception("Invalid input!");
                }
                $item->setId((count($this->cart['reservations']) <= 0) ? 1 : (end($this->cart['reservations'])->getId() + 1));
                $item->setRestaurant($this->getRestaurant($item->getRestaurant()->getId()));
                $item->setTotalPrice();
                $item->setFinalCheck();
                $this->cart['reservations'][] = $item;
                break;
            case $item instanceof TicketDance:
                if ($item->getNrOfPeople() < 1) {
                    throw new Exception("Invalid input!");
                }
                $item->setId((count($this->cart['ticketsDance']) <= 0) ? 1 : (end($this->cart['ticketsDance'])->getId() + 1));
                $item->setPerformance($this->getPerformance($item->getPerformance()->getId()));
                $item->setTotalPrice();
                $this->cart['ticketsDance'][] = $item;
                break;
            case $item instanceof TicketHistory:
                if ($item->getNrOfPeople() < 1) {
                    throw new Exception("Invalid input!");
                }
                $item->setId((count($this->cart['ticketsHistory']) <= 0) ? 1 : (end($this->cart['ticketsHistory'])->getId() + 1));
                $item->setTour($this->getTour($item->getTour()->getId()));
                $item->setTotalPrice();
                $this->cart['ticketsHistory'][] = $item;
                break;
        }
    }
}
?>