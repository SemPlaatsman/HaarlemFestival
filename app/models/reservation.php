<?php
require_once __DIR__ . '/item.php';
require_once __DIR__ . '/restaurant.php';

class Reservation extends Item {
    private int $id;
    private Restaurant $restaurant;
    private float $final_check;
    private int $nr_of_adults;
    private int $nr_of_kids;
    private string $datetime;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, Restaurant $restaurant = null, float $final_check = null, int $nr_of_adults = null, int $nr_of_kids = null, string $datetime = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        if($id != null){
            $this->id = $id;
            $this->restaurant = $restaurant;
            $this->final_check = $final_check;
            $this->nr_of_adults = $nr_of_adults;
            $this->nr_of_kids = $nr_of_kids;
            $this->datetime = $datetime;
        }
        
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
     * Set the value of final_check
     *
     * @return  self
     */ 
    public function setFinalCheck($final_check) : self
    {
        $this->final_check = $final_check;
        return $this;
    }

    /**
     * Get the value of nr_of_adults
     */ 
    public function getNrOfAdults()
    {
        return $this->nr_of_adults;
    }

    /**
     * Set the value of nr_of_adults
     *
     * @return  self
     */ 
    public function setNrOfAdults($nr_of_adults) : self
    {
        $this->nr_of_adults = $nr_of_adults;
        return $this;
    }

    /**
     * Get the value of nr_of_kids
     */ 
    public function getNrOfKids()
    {
        return $this->nr_of_kids;
    }

    /**
     * Set the value of nr_of_kids
     *
     * @return  self
     */ 
    public function setNrOfKids($nr_of_kids) : self
    {
        $this->nr_of_kids = $nr_of_kids;
        return $this;
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

    /**
     * Set the value of datetime
     *
     * @return  self
     */ 
    public function setDatetime($datetime)
    {
        $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of restaurant
     *
     * @return  self
     */ 
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Set the value of final_check
     *
     * @return  self
     */ 
    public function setFinal_check($final_check)
    {
        $this->final_check = $final_check;

        return $this;
    }

        /**
         * Set the value of nr_of_adults
         *
         * @return  self
         */ 
        public function setNr_of_adults($nr_of_adults)
        {
                $this->nr_of_adults = $nr_of_adults;

                return $this;
        }

    /**
     * Set the value of nr_of_kids
     *
     * @return  self
     */ 
    public function setNr_of_kids($nr_of_kids)
    {
        $this->nr_of_kids = $nr_of_kids;

        return $this;
    }
}
?>