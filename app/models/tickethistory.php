<?php

class TicketHistory extends Item {
    protected int $id;
    protected int $tour_id;
    protected string $language;
    protected DateTime $datetime;
    protected int $employee_id;
    protected string $employee_name;
    protected int $nr_of_people;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
    int $id, int $tour_id, string $language, string $datetime, int $employee_id, string $employee_name, int $nr_of_people) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        $this->id = $id;
        $this->tour_id = $tour_id;
        $this->language = $language;
        $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->nr_of_people = $nr_of_people;
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
}
?>