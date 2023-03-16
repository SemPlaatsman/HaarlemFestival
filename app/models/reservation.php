<?php
require_once __DIR__ . '/item.php';
require_once __DIR__ . '/restaurant.php';

class Reservation extends Item {
    private int $id;
    private Restaurant $restaurant;
    private float $final_check;
    private int $nr_of_adults;
    private int $nr_of_kids;
    private DateTime $datetime;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
    int $id, Restaurant $restaurant, float $final_check, int $nr_of_adults, int $nr_of_kids, string $datetime) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        $this->id = $id;
        $this->restaurant = $restaurant;
        $this->final_check = $final_check;
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
     * Get the value of restaurant
     */ 
    public function getRestaurant()
    {
        return $this->restaurant;
    }
    
    /**
     * Get the value of final_check
     */ 
    public function getFinalCheck()
    {
        return $this->final_check;
    }

    public function getFinalCheckFormatted()
    {
        return "€ " . number_format($this->final_check, 2);
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

    public function getDatetimeFormatted()
    {
        return date_format($this->datetime, 'd-m-Y H:i');
    }
}
?>