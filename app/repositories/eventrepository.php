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
            $stmt = $this->connection->prepare("SELECT * FROM Event");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $event = new Event();
                $event->setId($row['id']);
                $event->setName($row['name']);
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['date']);
                $event->setDate($date);
                array_push($events, $event);
            }
            return $events;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertEvent(string $name, DateTime $date)
    {
        try {
            // Create a venue
            $stmt = $this->connection->prepare("INSERT INTO Event (name, date) VALUES ( :name, :date)");


            // Bind the parameters
            $formattedDate = $date->format('Y-m-d H:i:s');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':date', $formattedDate, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateEvent(int $id, string $name, DateTime $date)
    {
        try {
            // Update a venue
            $stmt = $this->connection->prepare("UPDATE Event SET name=:name, date=:date WHERE id=:id");

            // Bind the parameters
            $formattedDate = $date->format('Y-m-d H:i:s');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':date', $formattedDate, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteEvent(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Event WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>