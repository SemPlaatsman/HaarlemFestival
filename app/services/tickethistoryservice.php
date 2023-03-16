<?php
require_once __DIR__ . '/../repositories/itemrepository.php';

class ReservationService
{
    private $reservationRepository;

    function __construct() {
        $this->reservationRepository = new ReservationRepository();
    }

    public function insertReservation(Reservation $reservation):int 
    {
        return $this->itemRepository->insertReservation($reservation);
    }

    public function deleteReservation(int $id) : bool
    {
        return $this->itemRepository->deleteReservation($id);
    }

    public function updateReservation(Reservation $reservation):bool 
    {
        return $this->itemRepository->updateReservation($id);
    }

    public function getReservation(int $id) : Item
    {
        return $this->itemRepository->getReservation($id);
    }

    function getReservations() : array 
    {
        return $this->itemRepository->getAllReservations();
    }
}
?>