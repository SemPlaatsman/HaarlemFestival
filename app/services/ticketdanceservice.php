<?php
require_once __DIR__ . '/../repositories/ticketdancerepository.php';

class TicketDanceService
{
    private $ticketDanceRepository;

    function __construct() {
        $this->ticketDanceRepository = new TicketDanceRepository();
    }

    public function insertTicketDance(TicketDance $ticketDance):int 
    {
        return $this->ticketDanceRepository->insertTicketDance($ticketDance);
    }

    public function deleteTicketDance(int $id) : bool
    {
        return $this->ticketDanceRepository->deleteTicketDance($id);
    }

    public function updateTicketDance(TicketDance $ticketDance):bool 
    {
        return $this->ticketDanceRepository->updateTicketDance($ticketDance);
    }

    public function getTicketDance(int $id) : Item
    {
        return $this->ticketDanceRepository->getTicketDance($id);
    }

    function getAllTicketsDance() : array 
    {
        return $this->ticketDanceRepository->getAllTicketsDance();
    }
}
?>