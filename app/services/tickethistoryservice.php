<?php
require_once __DIR__ . '/../repositories/itemrepository.php';

class ReservationService
{
    private $reservationRepository;

    function __construct() {
        $this->ticketHistoryRepository = new ReservationRepository();
    }

    public function insertTicketHistory(TicketHistory $ticketHistory):int 
    {
        return $this->ticketHistoryRepository->insertTicketHistory($reservation);
    }

    public function deleteTicketHistory(int $id) : bool
    {
        return $this->ticketHistoryRepository->deleteTicketHistory($id);
    }

    public function updateTicketHistory(TicketHistory $ticketHistory):bool 
    {
        return $this->ticketHistoryRepository->updateTicketHistory($id);
    }

    public function getTicketHistory(int $id) : Item
    {
        return $this->ticketHistoryRepository->getTicketHistory($id);
    }

    function getAllTicketHistory() : array 
    {
        return $this->ticketHistoryRepository->getAllReservations();
    }
}
?>