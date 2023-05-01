<?php
require_once __DIR__ . '/../repositories/performancerepository.php';

class PerformanceService
{
    private $performanceRepository;

    public function __construct()
    {
        $this->performanceRepository = new PerformanceRepository();
    }

    public function getPerformance()
    {
        return $this->performanceRepository->getPerformance();
    }
}

?>