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
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats() : int
    {
        return $this->seats;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation() : string
    {
        return $this->location;
    }

    /**
     * Get the value of adult_price
     */ 
    public function getAdultPrice() : int
    {
        return $this->adult_price;
    }

    public function getAdultPriceFormatted() : string
    {
        return "€ " . number_format($this->adult_price, 2);
    }

    /**
     * Get the value of kids_price
     */ 
    public function getKidsPrice() : int
    {
        return $this->kids_price;
    }

    public function getKidsPriceFormatted(): string
    {
        return "€ " . number_format($this->kids_price, 2);
    }

    /**
     * Get the value of reservation_fee
     */ 
    public function getReservationFee() : int
    {
        return $this->reservation_fee;
    }

    public function getReservationFeeFormatted() : string
    {
        return "€ " . number_format($this->reservation_fee, 2);
    }
}
?>