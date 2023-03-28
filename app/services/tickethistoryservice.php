<?php
require_once __DIR__ . '/../repositories/tickethistoryrepository.php';

class TicketHistoryService
{
    private $ticketHistoryRepository;

    function __construct() {
        $this->ticketHistoryRepository = new TicketHistoryRepository();
    }

    public function insertTicketHistory(TicketHistory $ticketHistory) 
    {
        return $this->ticketHistoryRepository->insertTicketHistory($ticketHistory);
    }

    public function deleteTicketHistory(int $id) : bool
    {
        return $this->ticketHistoryRepository->deleteTicketHistory($id);
    }

    public function updateTicketHistory(TicketHistory $ticketHistory):bool 
    {
        return $this->ticketHistoryRepository->updateTicketHistory($ticketHistory);
    }

    public function getTicketHistory(int $id) : Item
    {
        return $this->ticketHistoryRepository->getTicketHistory($id);
    }

    function getAllTicketHistory() : array 
    {
        return $this->ticketHistoryRepository->getAllTicketHistory();
    }
}
?>