<?php
require_once __DIR__ . '/../repositories/reservationrepository.php';

class ReservationService
{
    private $reservationRepository;

    function __construct() {
        $this->reservationRepository = new ReservationRepository();
    }

    public function insertReservation(Reservation $reservation):int 
    {
        return $this->reservationRepository->insertReservation($reservation);
    }

    public function deleteReservation(int $id) : bool
    {
        return $this->reservationRepository->deleteReservation($id);
    }

    public function updateReservation(Reservation $reservation):bool 
    {
        return $this->reservationRepository->updateReservation($id);
    }

    public function getReservation(int $id) : Item
    {
        return $this->reservationRepository->getReservation($id);
    }

    function getAllReservations() : array 
    {
        return $this->reservationRepository->getAllReservations();
    }
}
?>