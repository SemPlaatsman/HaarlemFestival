<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/item.php';
class ItemRepository extends Repository {

    public function insertItem(Item item):int {
        try {
            $stmnt = $this -> connection -> prepare("INSERT INTO Item (id, item_type_id, price, VAT, shoppingcart_id, QR_Code) VALUES (:id, :item_type_id, :price, :VAT, :shoppingcart_id, :QR_Code)");
            $stmnt -> bindParam(':id', $item->id, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_type_id', $item->item_type_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':price', $item->price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $item->VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':shoppingcart_id', $item->shoppingcart_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':QR_Code', $item->QR_Code, PDO::PARAM_STR);
            $stmnt -> execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
        
    }

    public function updateItem(Item item):bool {
        try {
            $stmnt = $this -> connection -> prepare("UPDATE Item SET item_type_id=:item_type_id, price=:price, VAT=:VAT, shoppingcart_id=:shoppingcart_id, QR_Code=:QR_Code WHERE id=:id;");
            $stmnt -> bindParam(':id', $item->id, PDO::PARAM_STR);
            $stmnt -> bindParam(':item_type_id', $item->item_type_id, PDO::PARAM_STR);
            $stmnt -> bindParam(':price', $item->price, PDO::PARAM_STR);
            $stmnt -> bindParam(':VAT', $item->VAT, PDO::PARAM_STR);
            $stmnt -> bindParam(':shoppingcart_id', $item->shoppingcart_id, PDO::PARAM_STR);
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
            $stmnt = $this -> connection -> prepare("SELECT id, item_type_id, price, VAT, shoppingcart_id, QR_Code FROM Item WHERE id = :id");
            $stmnt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $item = $stmnt -> fetch();
        return $item;
        } catch (PDOException $e) {
            return false;
        }
        
    }
    public function getAllItems():array  {
        try {
            $stmnt = $this -> connection -> prepare("SELECT id, item_type_id, price, VAT, shoppingcart_id, QR_Code FROM Item;");
            $stmnt -> setFetchMode(PDO::FETCH_CLASS, 'Item');
            $stmnt -> execute();
            $items = $stmnt -> fetchAll();
            return $items;
        } catch (PDOException $e) {
            return false;
        }
        
    }
}