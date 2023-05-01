<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/performance.php';

class PerformanceRepository extends Repository
{
    public function getPerformance(): array
    {
        $performances = array();
        $stmnt = $this->connection->prepare("SELECT p.id, a.id AS artist_id, a.name AS artist_name, v.id AS venue_id, v.name AS venue_name, p.start_date, p.end_date, p.price FROM performance p JOIN artist a ON p.artist_id = a.id JOIN venue v ON p.venue_id = v.id");
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();
        $performanceData = $stmnt->fetchAll();
        foreach ($performanceData as $row) {
            $artist = new Artist($row['artist_id'], $row['artist_name']);
            $venue = new Venue($row['venue_id'], $row['venue_name']);
            $performanceObject = new Performance($row['id'], $artist, $venue, $row['start_date'], $row['end_date'], $row['price']);
            array_push($performances, $performanceObject);
        }
        return $performances;
    }
}

?>