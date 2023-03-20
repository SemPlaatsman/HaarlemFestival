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
            $stmnt = $this->connection->prepare("SELECT `language`,`datetime`,`employee_id`,`employee_name`,`capacity`,`price`,`group_price` FROM `history_tours`  WHERE language = :language ORDER BY `datetime` ASC;" );
            $stmnt->bindParam(':language', $language, PDO::PARAM_STR);
            $stmnt->execute();
            $data = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            $tours = array();

            foreach ($data as $row) {
                $date = new DateTime($row['datetime']);
                $tour = new Tour($row['language'],  $date,  $row['employee_id'], $row['employee_name'], $row['capacity'], $row['price'], $row['group_price']);
                $tours[] = $tour;
            }
            return $tours;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    // public function getAllTours(): array
    // {
    //     try {
    //         $stmnt = $this->connection->prepare("SELECT `language`,`datetime`,`employee_id`,`employee_name`,`capacity`,`price`,`group_price` FROM `history_tours`;");
    //         $stmnt->setFetchMode(PDO::FETCH_ASSOC);
    //         $stmnt->execute();
    //         $data = $stmnt->fetch(PDO::FETCH_ASSOC);
    //         $tour = new Tour($data['language'], $data['datetime'], $data['employee_id'], $data['employee_name'], $data['capacity'], $data['price'], $data['group_price']);
    //         return $tour;
    //     } catch (PDOException $e) {
    //         return null;
    //     }
    // }
}
