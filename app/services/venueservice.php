<?php
require_once __DIR__ . '/../repositories/venuerepository.php';

class VenueService
{
    private $venueRepository;

    public function __construct()
    {
        $this->venueRepository = new VenueRepository();
    }

    public function getVenue()
    {
        return $this->venueRepository->getVenue();
    }

    public function insertVenue(string $name, string $address, int $seats)
    {
        return $this->venueRepository->insertVenue($name, $address, $seats);
    }

    public function updateVenue(int $id, string $name, string $address, int $seats)
    {
        return $this->venueRepository->updateVenue($id, $name, $address, $seats);
    }

    public function deleteVenue(int $id)
    {
        return $this->venueRepository->deleteVenue($id);
    }
}
?>