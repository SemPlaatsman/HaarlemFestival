<?php

class TicketHistory extends Item {
    protected int $id;
    protected int $tour_id;
    protected string $language;
    protected DateTime $datetime;
    protected int $employee_id;
    protected string $employee_name;
    protected int $nr_of_people;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, int $tour_id = null, string $language = null, string $datetime = null, int $employee_id = null, string $employee_name = null, int $nr_of_people = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        if($id != null){
            $this->id = $id;
            $this->tour_id = $tour_id;
            $this->language = $language;
            $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
            $this->employee_id = $employee_id;
            $this->employee_name = $employee_name;
            $this->nr_of_people = $nr_of_people;
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
     * Set the value of tour_id
     *
     * @return  self
     */ 
    public function setTour_id($tour_id)
    {
        $this->tour_id = $tour_id;

        return $this;
    }

    /**
     * Set the value of language
     *
     * @return  self
     */ 
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Set the value of datetime
     *
     * @return  self
     */ 
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Set the value of employee_id
     *
     * @return  self
     */ 
    public function setEmployee_id($employee_id)
    {
        $this->employee_id = $employee_id;

        return $this;
    }

    /**
     * Set the value of employee_name
     *
     * @return  self
     */ 
    public function setEmployee_name($employee_name)
    {
        $this->employee_name = $employee_name;

        return $this;
    }

    /**
     * Set the value of nr_of_people
     *
     * @return  self
     */ 
    public function setNr_of_people($nr_of_people)
    {
        $this->nr_of_people = $nr_of_people;

        return $this;
    }
}
?>