<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/venue.php';

class VenueRepository extends Repository
{
    public function getVenue()
    {
        try {
            // Read all venues
            $venues = array();
            $stmt = $this->connection->prepare("SELECT * FROM venue");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $venue = new Venue();
                $venue->setId($row['id']);
                $venue->setName($row['name']);
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['date']);
                $venue->setDate($date);
                $venue->setLocation($row['location']);
                $venue->setSeats($row['seats']);
                array_push($venues, $venue);
            }
            return $venues;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertVenue(string $name, DateTime $date, string $location, int $seats)
    {
        try {
            // Create a venue
            $stmt = $this->connection->prepare("INSERT INTO venue (name, date, location, seats) VALUES ( :name, :date, :location, :seats)");


            // Bind the parameters
            $formattedDate = $date->format('Y-m-d H:i:s');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':date', $formattedDate, PDO::PARAM_STR);
            $stmt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmt->bindParam(':seats', $seats, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateVenue(int $id, string $name, DateTime $date, string $location, int $seats)
    {
        try {
            // Update a venue
            $stmt = $this->connection->prepare("UPDATE venue SET name=:name, date=:date, location=:location, seats=:seats WHERE id=:id");

            // Bind the parameters
            $formattedDate = $date->format('Y-m-d H:i:s');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':date', $formattedDate, PDO::PARAM_STR);
            $stmt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmt->bindParam(':seats', $seats, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteVenue(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM venue WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>