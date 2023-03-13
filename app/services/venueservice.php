<?php
require_once __DIR__ . '/../repositories/venuerepository.php';

class VenueService
{
    public function getVenue()
    {
        $repository = new VenueRepository();

        return $repository->getVenue();
    }

    public function insertVenue(string $name, string $address, int $seats)
    {
        $repository = new VenueRepository();

        return $repository->insertVenue($name, $address, $seats);
    }

    public function updateVenue(int $id, string $name, string $address, int $seats)
    {
        $repository = new VenueRepository();

        return $repository->updateVenue($id, $name, $address, $seats);
    }

    public function deleteVenue(int $id)
    {
        $repository = new VenueRepository();

        return $repository->deleteVenue($id);
    }
}
?>