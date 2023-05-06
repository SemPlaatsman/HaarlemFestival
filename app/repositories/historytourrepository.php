<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tour.php';

class HistoryTourRepository extends Repository
{

    // public function insertTour(Tour $tour): int
    // {
    //     try {
    //         $stmnt = $this->connection->prepare("INSERT INTO tour (id, order_id, event_id, total_price, VAT, QR_Code) VALUES (:id, :order_id, :event_id, :total_price, :VAT, :QR_Code)");
    //         $language = $tour->getLanguage();
    //         $employee_id = $tour->getEmployeeId();
    //         $employee_name = $tour->getEmployeeName();
    //         $capacity = $tour->getCapacity();
    //         $price  = $tour->getPrice();
    //         $group_price = $tour->getGroupPrice();




    //         $stmnt->execute();
    //         return $this->connection->lastInsertId();
    //     } catch (PDOException $e) {
    //         echo $e;
    //         return null;
    //     }
    // }

    // public function updateTour(Tour $tour): bool
    // {
    //     try {
    //         $stmnt = $this->connection->prepare("UPDATE tour SET order_id=:order_id, event_id=:event_id, total_price=:total_price, VAT=:VAT, QR_Code=:QR_Code WHERE id=:id;");
    //         $language = $tour->getLanguage();
    //         $employee_id = $tour->getEmployeeId();
    //         $employee_name = $tour->getEmployeeName();
    //         $capacity = $tour->getCapacity();
    //         $price  = $tour->getPrice();
    //         $group_price = $tour->getGroupPrice();


    //         return $stmnt->execute();
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }


    // public function deleteTour(int $id): bool
    // {
    //     try {
    //         $stmnt = $this->connection->prepare("DELETE FROM tour WHERE id = :id");
    //         $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
    //         return $stmnt->execute();
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }

    public function getToursByLanguage(string $language): array
    {
        try {
            $stmnt = $this->connection->prepare("SELECT `id`,`language`,`datetime`,`gathering_location`,`employee_id`,`employee_name`,`capacity`,`price`,`group_price` FROM `history_tours`  WHERE language = :language ORDER BY `datetime` ASC;" );
            $stmnt->bindParam(':language', $language, PDO::PARAM_STR);
            $stmnt->execute();
            $data = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            $tours = array();

            foreach ($data as $row) {
                $tour = new Tour($row['id'],$row['language'],  $row['datetime'], $row['gathering_location'] ,$row['employee_id'], $row['employee_name'], $row['capacity'], $row['price'], $row['group_price']);
                $tours[] = $tour;
            }
            return $tours;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function getAllTours(): array
    {
        try {
            $stmnt = $this->connection->prepare("SELECT `id`, `language`, `datetime`, `gathering_location`, `employee_id`, `employee_name`, `capacity`, `price`, `group_price` FROM `history_tours`;");
            $stmnt->execute();
            $stmnt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
    
            // if rowMapper function is already loaded, don't load it again
            if (!function_exists('rowMapperTour')) {
                // rowMapper based on this stackoverflow post: https://stackoverflow.com/questions/12368035/pdo-fetch-class-pass-results-to-constructor-as-parameters
                function rowMapperTour(int $id, string $language, string $datetime, string $gathering_location, int $employee_id, string $employee_name, int $capacity, float $price, float $group_price) {
                    return new Tour($id, $language, $datetime, $gathering_location, $employee_id, $employee_name, $capacity, $price, $group_price);
                }
            }
    
            return $stmnt->fetchAll(PDO::FETCH_FUNC, 'rowMapperTour');
        } catch (PDOException $e) {
            return null;
        }
    }
}
