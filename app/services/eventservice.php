<?php
require_once __DIR__ . '/../repositories/eventrepository.php';

class EventService
{
    public function getEvent()
    {
        $repository = new EventRepository();

        return $repository->getEvent();
    }

    public function insertEvent(string $name, DateTime $start_date, DateTime $end_date)
    {
        $repository = new EventRepository();

        return $repository->insertEvent($name, $start_date, $end_date);
    }

    public function updateEvent(int $id, string $name, DateTime $start_date, DateTime $end_date)
    {
        $repository = new EventRepository();

        return $repository->updateEvent($id, $name, $start_date, $end_date);
    }

    public function deleteEvent(int $id)
    {
        $repository = new EventRepository();

        return $repository->deleteEvent($id);
    }
}
?>