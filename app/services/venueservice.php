<?php
require_once __DIR__ . '/../repositories/venuerepository.php';

class VenueService
{
    public function getVenue()
    {
        $repository = new VenueRepository();

        return $repository->getVenue();
    }

    public function insertVenue(string $name, DateTime $date, string $address, int $seats)
    {
        $repository = new VenueRepository();

        return $repository->insertVenue($name, $date, $address, $seats);
    }

    public function updateVenue(int $id, string $name, DateTime $date, string $address, int $seats)
    {
        $repository = new VenueRepository();

        return $repository->updateVenue($id, $name, $date, $address, $seats);
    }

    public function deleteVenue(int $id)
    {
        $repository = new VenueRepository();

        return $repository->deleteVenue($id);
    }
}
?>