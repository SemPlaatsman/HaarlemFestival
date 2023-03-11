<?php
require_once __DIR__ . '/item.php';

class Reservation extends Item {
    private int $id;
    private int $restaurant_id;
    private string $restaurant_name;
    private int $nr_of_adults;
    private int $nr_of_kids;
    private DateTime $datetime;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
    int $id, int $restaurant_id, string $restaurant_name, int $nr_of_adults, int $nr_of_kids, string $datetime) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        $this->id = $id;
        $this->restaurant_id = $restaurant_id;
        $this->restaurant_name = $restaurant_name;
        $this->nr_of_adults = $nr_of_adults;
        $this->nr_of_kids = $nr_of_kids;
        $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of restaurant_id
     */ 
    public function getRestaurantId()
    {
        return $this->restaurant_id;
    }

    /**
     * Get the value of restaurant_name
     */ 
    public function getRestaurantName()
    {
        return $this->restaurant_name;
    }

    /**
     * Get the value of nr_of_adults
     */ 
    public function getNrOfAdults()
    {
        return $this->nr_of_adults;
    }

    /**
     * Get the value of nr_of_kids
     */ 
    public function getNrOfKids()
    {
        return $this->nr_of_kids;
    }

    /**
     * Get the value of datetime
     */ 
    public function getDatetime()
    {
        return $this->datetime;
    }
}
?>