<?php
require_once __DIR__ . '/../repositories/openinghourrepository.php';

class OpeningHourService
{

    private $openingHourRepository;

    public function __construct()
    {
        $this->openingHourRepository = new OpeningHourRepository();
    }

    public function getOpeningHour()
    {
        return $this->openingHourRepository->getOpeningHour();
    }

    public function insertOpeningHour(int $restaurantId, int $dayOfWeek, Datetime $openingTime, Datetime $closingTime)
    {
        return $this->openingHourRepository->insertOpeningHour($restaurantId, $dayOfWeek, $openingTime, $closingTime);
    }

    public function updateOpeningHour(int $id, int $dayOfWeek, Datetime $openingTime, Datetime $closingTime)
    {
        return $this->openingHourRepository->updateOpeningHour($id, $dayOfWeek, $openingTime, $closingTime);
    }

    public function deleteOpeningHour(int $id)
    {
        return $this->openingHourRepository->deleteOpeningHour($id);
    }
}
?>