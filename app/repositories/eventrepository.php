<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/event.php';

class EventRepository extends Repository
{
    public function getEvent()
    {
        try {
            // Read all events
            $events = array();
            $stmt = $this->connection->prepare("SELECT `id`, `name`, `start_date`, `end_date` FROM `event`");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $event = new Event();
                $event->setId($row['id']);
                $event->setName($row['name']);
                $dateStart = DateTime::createFromFormat('Y-m-d', $row['start_date']);
                $event->setStart_date($dateStart);
                $dateEnd = DateTime::createFromFormat('Y-m-d', $row['end_date']);
                $event->setEnd_date($dateEnd);
                array_push($events, $event);
            }
            return $events;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertEvent(string $name, DateTime $start_date, DateTime $end_date)
    {
        try {
            // Create a venue
            $stmt = $this->connection->prepare("INSERT INTO `event` (name, start_date, end_date) VALUES (:name, :start_date, :end_date)");


            // Bind the parameters
            $formattedStart_Date = $start_date->format('Y-m-d');
            $formattedEnd_Date = $end_date->format('Y-m-d');

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':start_date', $formattedStart_Date, PDO::PARAM_STR);
            $stmt->bindParam(':end_date', $formattedEnd_Date, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateEvent(int $id, string $name, DateTime $start_date, DateTime $end_date)
    {
        try {
            // Update a venue
            $stmt = $this->connection->prepare("UPDATE `event` SET name=:name, start_date=:start_date, end_date=:end_date WHERE id=:id");

            // Bind the parameters
            $formattedStart_Date = $start_date->format('Y-m-d');
            $formattedEnd_Date = $end_date->format('Y-m-d');

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':start_date', $formattedStart_Date, PDO::PARAM_STR);
            $stmt->bindParam(':end_date', $formattedEnd_Date, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteEvent(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT `id` FROM `event` WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Record with the given ID does not exist
                return false;
            }

            $stmt = $this->connection->prepare("DELETE FROM `event` WHERE id=:id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Failed to delete the record
                return false;
            }

            return true;
        } catch (PDOException $e) {
            // Handle the exception
            return false;
        }
    }
}
?>