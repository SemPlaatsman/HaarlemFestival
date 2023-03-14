<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/venue.php';

class VenueRepository extends Repository
{
    public function getVenue()
    {
        try {
            // Read all venues
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