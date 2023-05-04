<?php

class Restaurant
{
    private int $id;
    private string $name;
    private int $seats;
    private string $location;
    private float $adult_price;
    private float $kids_price;
    private float $reservation_fee;

    public function __construct($id = null, $name = null, $seats = null, $location = null, $adult_price = null, $kids_price = null, $reservation_fee = null)
    {
        $this->id = $id ?? 0;
        $this->name = $name ?? "";
        $this->seats = $seats ?? 0;
        $this->location = $location ?? "";
        $this->adult_price = $adult_price ?? 0;
        $this->kids_price = $kids_price ?? 0;
        $this->reservation_fee = $reservation_fee ?? 0;
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
    public function getName(): string

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

    public function getAdultPrice() : float
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

    public function getKidsPrice() : float
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

    public function getReservationFee() : float
    {
        return $this->reservation_fee;
    }



    public function getReservationFeeFormatted() : string
    {
        return "€ " . number_format($this->reservation_fee, 2);
    }
}
?>