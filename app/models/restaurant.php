<?php

class Restaurant {
    private int $id;
    private string $name;
    private int $seats;
    private string $location;
    private float $adult_price;
    private float $kids_price;
    private $reservation_fee;

    public function __construct($id, $name, $seats, $location, $adult_price, $kids_price, $reservation_fee) {
        $this->id = $id;
        $this->name = $name;
        $this->seats = $seats;
        $this->location = $location;
        $this->adult_price = $adult_price;
        $this->kids_price = $kids_price;
        $this->reservation_fee = $reservation_fee;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the value of adult_price
     */ 
    public function getAdultPrice()
    {
        return $this->adult_price;
    }

    public function getAdultPriceFormatted()
    {
        return "€ " . number_format($this->adult_price, 2);
    }

    /**
     * Get the value of kids_price
     */ 
    public function getKidsPrice()
    {
        return $this->kids_price;
    }

    public function getKidsPriceFormatted()
    {
        return "€ " . number_format($this->kids_price, 2);
    }

    /**
     * Get the value of reservation_fee
     */ 
    public function getReservationFee()
    {
        return $this->reservation_fee;
    }

    public function getReservationFeeFormatted()
    {
        return "€ " . number_format($this->reservation_fee, 2);
    }
}
?>