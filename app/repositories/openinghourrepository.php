<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/openinghour.php';

class OpeningHourRepository extends Repository
{
    public function getOpeningHour()
    {
        try {
            // Read all openingHours
            $openingHours = array();
            $stmt = $this->connection->prepare(" SELECT oh.`id`, oh.`restaurant_id`, r.`name`, oh.`day_of_week`, oh.`opening_time`, oh.`closing_time` 
            FROM `opening_hours` oh
            JOIN `restaurant` r ON oh.`restaurant_id` = r.`id`");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $openingHour = new OpeningHour();
                $openingHour->setId($row['id']);
                $openingHour->setRestaurant_id($row['restaurant_id']);
                $openingHour->setRestaurant_name($row['name']);
                $openingHour->setDay_of_week($row['day_of_week']);
                $timeOpeningHour = DateTime::createFromFormat('H:i:s', $row['opening_time']);
                $openingHour->setOpening_time($timeOpeningHour);
                $timeClosingHour = DateTime::createFromFormat('H:i:s', $row['closing_time']);
                $openingHour->setClosing_time($timeClosingHour);
                array_push($openingHours, $openingHour);
            }
            return $openingHours;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertOpeningHour(int $restaurantId, int $dayOfWeek, DateTime $openingTime, DateTime $closingTime)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `opening_hours` (`restaurant_id`, `day_of_week`, `opening_time`, `closing_time`) 
            VALUES (:restaurant_id, :day_of_week, :opening_time, :closing_time)");

            $formattedOpeningTime = $openingTime->format('H:i:s');
            $formattedClosingTime = $closingTime->format('H:i:s');

            $stmt->bindParam(':restaurant_id', $restaurantId, PDO::PARAM_INT);
            $stmt->bindParam(':day_of_week', $dayOfWeek, PDO::PARAM_INT);
            $stmt->bindParam(':opening_time', $formattedOpeningTime, PDO::PARAM_STR);
            $stmt->bindParam(':closing_time', $formattedClosingTime, PDO::PARAM_STR);

            $result = $stmt->execute();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateOpeningHour(int $id, int $dayOfWeek, DateTime $openingTime, DateTime $closingTime)
    {
        try {
            // Update a venue
            $stmt = $this->connection->prepare("UPDATE `opening_hours` SET day_of_week=:day_of_week, opening_time=:opening_time, closing_time=:closing_time WHERE id=:id");

            // Bind the parameters
            $formattedOpeningTime = $openingTime->format('H:i:s');
            $formattedClosingTime = $closingTime->format('H:i:s');

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':day_of_week', $dayOfWeek, PDO::PARAM_INT);
            $stmt->bindParam(':opening_time', $formattedOpeningTime, PDO::PARAM_STR);
            $stmt->bindParam(':closing_time', $formattedClosingTime, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function deleteOpeningHour(int $id)
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