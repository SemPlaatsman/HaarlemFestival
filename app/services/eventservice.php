<?php
require_once __DIR__ . '/../repositories/eventrepository.php';

class EventService
{

    private $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function getEvent()
    {
        return $this->eventRepository->getEvent();
    }

    public function insertEvent(string $name, DateTime $start_date, DateTime $end_date)
    {
        return $this->eventRepository->insertEvent($name, $start_date, $end_date);
    }

    public function updateEvent(int $id, string $name, DateTime $start_date, DateTime $end_date)
    {
        return $this->eventRepository->updateEvent($id, $name, $start_date, $end_date);
    }

    public function deleteEvent(int $id)
    {
        return $this->eventRepository->deleteEvent($id);
    }
}
?>