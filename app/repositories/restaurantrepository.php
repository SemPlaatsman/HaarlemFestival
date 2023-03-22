<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';


class RestaurantRepository extends Repository
{

    public function insert(string $name, int $seats, string $location, int $adultPrice, int $kidsPrice, int $reservation_fee): int
    {
        $stmnt = $this->connection->prepare("INSERT INTO `restaurant`(`name`, `seats`, `location`, `adult_price`, `kids_price`, `reservation_fee`) VALUES (:name,:seats,:location,:aPrice,:kPrice,:rFee);");
        $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmnt->bindParam(':seats', $seats, PDO::PARAM_INT);
        $stmnt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmnt->bindParam(':aPrice', $adultPrice, PDO::PARAM_INT);
        $stmnt->bindParam(':kPrice', $kidsPrice, PDO::PARAM_INT);
        $stmnt->bindParam(':rFee', $reservation_fee, PDO::PARAM_INT);

        $stmnt->execute();
        return $this->connection->lastInsertId();
    }

    public function update(int $id, string $name, int $seats, string $location, int $adultPrice, int $kidsPrice, int $reservation_fee): int
    {
        try {
            $stmnt = $this->connection->prepare("UPDATE `restaurant` SET `name`=:name,`seats`=:seats,`location`=:location,`adult_price`=:aPrice,`kids_price`=:kPrice,`reservation_fee`=:rFee WHERE id = :id;");
            $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmnt->bindParam(':seats', $seats, PDO::PARAM_INT);
            $stmnt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmnt->bindParam(':aPrice', $adultPrice, PDO::PARAM_INT);
            $stmnt->bindParam(':kPrice', $kidsPrice, PDO::PARAM_INT);
            $stmnt->bindParam(':rFee', $reservation_fee, PDO::PARAM_INT);
            $stmnt->execute();
            //return $this->connection->lastInsertId();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete(int $id): int
    {
        /*$stmnt = $this->connection->prepare("DELETE FROM `restaurant` WHERE id = :id;");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->execute();
        return $this->connection->lastInsertId();*/
        try {
            $stmnt = $this->connection->prepare("SELECT `id` FROM `restaurant` WHERE id=:id;");
            $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt->execute();

            if ($stmnt->rowCount() === 0) {
                // Record with the given ID does not exist
                return false;
            }

            $stmnt = $this->connection->prepare("DELETE FROM `restaurant` WHERE id=:id LIMIT 1");
            $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt->execute();

            if ($stmnt->rowCount() === 0) {
                // Failed to delete the record
                return false;
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function get(int $id): Restaurant
    {
        $stmnt = $this->connection->prepare("SELECT `id`,`name`,`seats`,`location`,`adult_price`,`kids_price`,`reservation_fee` FROM `restaurant` WHERE id = :id ;");
        $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();
        $restaurant = $stmnt->fetch();
        $restaurantObject = new Restaurant($restaurant["id"], $restaurant["name"], $restaurant["seats"], $restaurant["location"], $restaurant["adult_price"], $restaurant["kids_price"], $restaurant["reservation_fee"]);
        if ($restaurant === false) {
            throw new Exception('Restaurant not found');
        }
        return $restaurantObject;
    }

    public function getAll(): array
    {
        $restaurants = array();
        $stmnt = $this->connection->prepare("SELECT `id`,`name`,`seats`,`location`,`adult_price`,`kids_price`,`reservation_fee`  FROM `restaurant`;");
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();
        $restaurant = $stmnt->fetchAll();
        foreach ($restaurant as $row) {
            $restaurantObject = new Restaurant($row['id'], $row['name'], $row['seats'], $row['location'], $row['adult_price'], $row['kids_price'], $row['reservation_fee']);
            array_push($restaurants, $restaurantObject);
        }
        return $restaurants;
    }
}