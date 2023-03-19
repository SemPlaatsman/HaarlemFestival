<?php

class TicketHistory extends Item {
    private int $id;
    private int $tour_id;
    private string $language;
    private DateTime $datetime;
    private string $gathering_location;
    private int $employee_id;
    private string $employee_name;
    private int $nr_of_people;
    private float $price;
    private float $group_price;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
    int $id, int $tour_id, string $language, string $datetime, string $gathering_location, int $employee_id, string $employee_name, int $nr_of_people, float $price, float $group_price) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        $this->id = $id;
        $this->tour_id = $tour_id;
        $this->language = $language;
        $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
        $this->gathering_location = $gathering_location;
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->nr_of_people = $nr_of_people;
        $this->price = $price;
        $this->group_price = $group_price;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of tour_id
     */ 
    public function getTourId()
    {
        return $this->tour_id;
    }

    /**
     * Get the value of language
     */ 
    public function getLanguage()
    {
        return $this->language;
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
     * Get the value of gathering_location
     */ 
    public function getGatheringLocation()
    {
        return $this->gathering_location;
    }

    /**
     * Get the value of employee_id
     */ 
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * Get the value of employee_name
     */ 
    public function getEmployeeName()
    {
        return $this->employee_name;
    }

    /**
     * Get the value of nr_of_people
     */ 
    public function getNrOfPeople()
    {
        return $this->nr_of_people;
    }

    /**
     * Set the value of nr_of_people
     *
     * @return  self
     */ 
    public function setNrOfPeople($nr_of_people) : self
    {
        $this->nr_of_people = $nr_of_people;
        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceFormatted()
    {
        return "€ " . number_format($this->price, 2);
    }

    /**
     * Get the value of group_price
     */ 
    public function getGroupPrice()
    {
        return $this->group_price;
    }

    public function getGroupPriceFormatted()
    {
        return "€ " . number_format($this->group_price, 2);
    }
}
?>