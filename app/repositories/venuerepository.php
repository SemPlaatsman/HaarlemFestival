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
            $stmt = $this->connection->prepare("SELECT * FROM Venue");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $venue = new Venue();
                $venue->setId($row['id']);
                $venue->setName($row['name']);
                $venue->setDate($row['date']);
                $venue->setAddress($row['address']);
                $venue->setSeats($row['seats']);
                array_push($venues, $venue);
            }
            return $venues;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertVenue(int $id, string $name, DateTime $date, string $address, int $seats)
    {
        try {
            // Create a venue
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateVenue(int $id, string $name, DateTime $date, string $address, int $seats)
    {
        try {
            // Update a venue
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteVenue(int $id, string $name, DateTime $date, string $address, int $seats)
    {
        try {
            // Delete a venue
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
?>