<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
class ItemRepository extends Repository {

    public function insertItem(Item $item):int {
        try {
            $stmnt = $this -> connection -> prepare("INSERT INTO Item (id, order_id, event_id, total_price, VAT, QR_Code) VALUES (:id, :order_id, :event_id, :total_price, :VAT, :QR_Code)");
            $stmnt -> bindParam(':id', $item->id, PDO::PARAM_STR);
            $stmnt -> bindParam(':order_id', $item->order_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':event_id', $item->event_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':total_price', $item->total_price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $item->VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':QR_Code', $item->QR_Code, PDO::PARAM_STR);
            $stmnt -> execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            return null;
        }
        
    }
    public int $id;
       public int $order_id;
       public int $event_id;
       public float $total_price;
       public float $VAT;
       public int $QR_Code;

    public function updateItem(Item $item):bool {
        try {
            $stmnt = $this -> connection -> prepare("UPDATE Item SET order_id=:order_id, event_id=:event_id, total_price=:total_price, VAT=:VAT, QR_Code=:QR_Code WHERE id=:id;");
            $stmnt -> bindParam(':id', $item->id, PDO::PARAM_STR);
            $stmnt -> bindParam(':order_id', $item->order_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':event_id', $item->event_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':total_price', $item->total_price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $item->VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':QR_Code', $item->QR_Code, PDO::PARAM_STR);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
        
    }


    public function deleteItem(int $id) : bool {
        try {
            $stmnt = $this -> connection -> prepare("DELETE FROM Item WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            return $stmnt -> execute();
        } catch (PDOException $e) {
            return false;
        }
        
    }

    public function getItem(int $id) : Item {
        try {
            $stmnt = $this -> connection -> prepare("SELECT id, order_id, event_id, total_price, VAT, QR_Code FROM Item WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $item = $stmnt -> fetch();
        return $item;
        } catch (PDOException $e) {
            return null;
        }
        
    }
    public function getAllItems():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT id, order_id, event_id, total_price, VAT, QR_Code FROM Item;");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return null;
        }
        
    }
}