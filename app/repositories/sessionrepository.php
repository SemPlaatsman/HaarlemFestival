<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/session.php';

class SessionRepository extends Repository
{
    public function getSession()
    {
        try {
            // Read all sessions
            $sessions = array();
            $stmt = $this->connection->prepare(" SELECT oh.`id`, oh.`restaurant_id`, r.`name`, oh.`day_of_week`, oh.`opening_time`, oh.`closing_time` 
            FROM `opening_hours` oh
            JOIN `restaurant` r ON oh.`restaurant_id` = r.`id`");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $session = new Session();
                $session->setId($row['id']);
                $session->setRestaurant_id($row['restaurant_id']);
                $session->setRestaurant_name($row['name']);
                $session->setDay_of_week($row['day_of_week']);
                $timeOpeningHour = DateTime::createFromFormat('H:i:s', $row['opening_time']);
                $session->setOpening_time($timeOpeningHour);
                $timeClosingHour = DateTime::createFromFormat('H:i:s', $row['closing_time']);
                $session->setClosing_time($timeClosingHour);
                array_push($sessions, $session);
            }
            return $sessions;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteSession(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT `id` FROM `opening_hours` WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Record with the given ID does not exist
                return false;
            }

            $stmt = $this->connection->prepare("DELETE FROM `opening_hours` WHERE id=:id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                // Failed to delete the record
                return false;
            }

            return true;
        } catch (PDOException $e) {
            // Handle the exception
            return false;
        }
    }
}
?>