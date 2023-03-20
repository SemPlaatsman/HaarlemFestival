<?php

class TicketHistory extends Item {
    protected int $id;
    protected int $tour_id;
    protected string $language;
    protected DateTime $datetime;
    private string $gathering_location;
    protected int $employee_id;
    protected string $employee_name;
    protected int $nr_of_people;
    private float $price;
    private float $group_price;


    //maybe implement the tour object into this class


    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, int $tour_id = null, string $language = null, string $datetime = null, string $gathering_location = null, int $employee_id = null, 
    string $employee_name = null, int $nr_of_people = null, float $price = null, float $group_price = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        if($id != null){
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
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tour_id
     */ 
    public function getTourId()
    {
        return $this->tour_id;
    }

    /**
     * Set the value of tour_id
     *
     * @return  self
     */ 
    public function setTourId($tour_id) : self
    {
        $this->tour_id = $tour_id;

        return $this;
    }

    /**
     * Get the value of language
     */ 
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set the value of language
     *
     * @return  self
     */ 
    public function setLanguage($language) : self
    {
        $this->language = $language;

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
    public function setDatetime($datetime) : self
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get the value of gathering_location
     */ 
    public function getGatheringLocation()
    {
        return $this->gathering_location;
    }

    /**
     * Set the value of gathering_location
     *
     * @return  self
     */
    public function setGatheringLocation($gathering_location) : self
    {
        $this->gathering_location = $gathering_location;

        return $this;
    }

    /**
     * Get the value of employee_id
     */ 
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * Set the value of employee_id
     *
     * @return  self
     */ 
    public function setEmployeeId($employee_id) : self
    {
        $this->employee_id = $employee_id;

        return $this;
    }

    /**
     * Get the value of employee_name
     */ 
    public function getEmployeeName()
    {
        return $this->employee_name;
    }

    /**
     * Set the value of employee_name
     *
     * @return  self
     */ 
    public function setEmployeeName($employee_name) : self
    {
        $this->employee_name = $employee_name;

        return $this;
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
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price) : self
    {
        $this->price = $price;

        return $this;
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

    /**
     * Set the value of group_price
     *
     * @return  self
     */
    public function setGroupPrice($group_price) : self
    {
        $this->group_price = $group_price;

        return $this;
    }
}
?>